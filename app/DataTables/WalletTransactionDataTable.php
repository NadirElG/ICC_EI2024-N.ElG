<?php

namespace App\DataTables;

use App\Models\WalletTransaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class WalletTransactionDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('user', function ($transaction) {
                return $transaction->user->name ?? 'Deleted User';
            })
            ->editColumn('type', function ($transaction) {
                return ucfirst($transaction->type);
            })
            ->editColumn('amount', function ($transaction) {
                return number_format($transaction->amount, 2) . ' €';
            })
            ->addColumn('action', function ($transaction) {
                return '<a href="#" class="btn btn-sm btn-info">Details</a>';
            })
            ->rawColumns(['action']);
    }

    public function query(WalletTransaction $model)
    {
        return $model->newQuery()->with('user'); // Eager load user relation
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('wallet-transactions-table')
            ->columns([
                ['data' => 'id', 'name' => 'id', 'title' => 'ID'],
                ['data' => 'user', 'name' => 'user.name', 'title' => 'User'],
                ['data' => 'type', 'name' => 'type', 'title' => 'Type'],
                ['data' => 'amount', 'name' => 'amount', 'title' => 'Amount'],
                ['data' => 'description', 'name' => 'description', 'title' => 'Description'],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Date'],
                ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
            ])
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'desc')
            ->buttons(
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    protected function filename(): string
    {
        return 'WalletTransactions_' . date('YmdHis');
    }
}
