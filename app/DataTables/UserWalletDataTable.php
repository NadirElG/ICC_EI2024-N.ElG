<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class UserWalletDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('wallet_balance', function ($user) {
                return $user->wallet->balance ?? 0; // Assure-toi que la relation wallet existe
            })
            ->addColumn('role', function ($user) {
                return $user->role; 
            })
            
            ->addColumn('action', function ($query) {
                $view = "<a href='#' class='btn btn-primary'><i class='fas fa-eye'></i></a>";
                $edit = "<a href='#' class='btn btn-warning'><i class='fas fa-edit'></i></a>";
                $delete = "<a href='#' class='btn btn-danger delete-item'><i class='fas fa-trash'></i></a>";
                return $view . ' ' . $edit . ' ' . $delete;
            })

            ->addColumn('status', function($query){
                if($query->status === 'active'){ // Si le statut est stocké sous forme de texte
                    return '<span class="badge badge-success">Active</span>';
                } else if($query->status === 'inactive') {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
                return '<span class="badge badge-secondary">Unknown</span>';
            })
            
            ->editColumn('created_at', function ($user) {
                return \Carbon\Carbon::parse($user->created_at)->diffForHumans();
            })
            ->rawColumns(['wallet_balance', 'action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->with('wallet'); // Relation avec le modèle Wallet
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-wallet-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->addClass('text-center'),
            Column::make('name')->addClass('text-center'),
            Column::make('wallet_balance')->addClass('text-center'),
            Column::make('status')->addClass('text-center'),
            Column::make('role')->addClass('text-center'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UserWallet_' . date('YmdHis');
    }
}
