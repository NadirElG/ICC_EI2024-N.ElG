<?php

namespace App\DataTables;

use App\Models\NewsletterSubscriber;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class NewsletterSubscriberDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
    return (new EloquentDataTable($query))
        ->addColumn('action', function ($row) {
            $deleteBtn = "<a href='" . route('admin.subscribers.destroy', $row->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
            return $deleteBtn;
        })
        ->addColumn('is_verified', function($query){
            if($query->is_verified == 1){
                return '<i class="badge  badge-success">Verified</i>';
                }else{
                    return '<i class="badge  badge-danger">Not Verified</i>';
                }
        })
        ->rawColumns(['action', 'is_verified'])
        ->setRowId('id');
    }


    public function query(NewsletterSubscriber $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('newslettersubscriber-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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
            
            Column::make('id'),
            Column::make('email'),
            Column::make('is_verified'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'NewsletterSubscriber_' . date('YmdHis');
    }
}
