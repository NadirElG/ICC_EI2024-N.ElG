<?php

namespace App\DataTables;

use App\Models\Slot;
use Yajra\DataTables\Services\DataTable;

class SlotsDataTable extends DataTable
{
    /**
     * Construire le DataTable.
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('actions', function($slot) {
                $editUrl = route('coach.slots.edit', $slot->id);
                $deleteUrl = route('coach.slots.destroy', $slot->id);

                $buttons = '<a href="'.$editUrl.'" class="btn btn-sm btn-warning">Modifier</a>';
                $buttons .= '
                    <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;">
                        '.csrf_field().method_field('DELETE').'
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce slot ?\')">Supprimer</button>
                    </form>
                ';

                return $buttons;
            })
            ->rawColumns(['actions']);
    }

    /**
     * Obtenir la requête source de données.
     */
    public function query(Slot $model)
    {
        return $model->newQuery()->where('coach_id', auth()->id());
    }

    /**
     * Option de configuration du DataTable.
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('slots-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                'excel', 'csv', 'pdf', 'print', 'reset', 'reload'
            );
    }

    /**
     * Obtenir les colonnes du DataTable.
     */
    protected function getColumns()
    {
        return [
            'title' => ['title' => 'Titre'],
            'date' => ['title' => 'Date'],
            'start_time' => ['title' => 'Heure de début'],
            'end_time' => ['title' => 'Heure de fin'],
            'capacity' => ['title' => 'Capacité'],
            'actions' => ['title' => 'Actions', 'searchable' => false, 'orderable' => false, 'exportable' => false],
        ];
    }

    /**
     * Nom du fichier pour l'exportation.
     */
    public function filename(): string
    {
        return 'Slots_' . date('YmdHis');
    }
}
