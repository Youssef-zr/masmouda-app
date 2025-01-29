<?php

namespace App\DataTables;

use App\Models\Committee;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CommitteeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $output = "<a href=" . route('admin.committees.edit', $query->id) . " class='btn btn-sm btn-success'><i class='fa fa-pencil'></i></a>";
                $output .= "<a href=" . route('admin.committees.show', parameters: $query->id) . "
                        data-bs-toggle='modal' data-bs-target='#record-info'
                        data-url='" . route("admin.committees.show", $query->id) . "'
                        class='btn btn-sm btn-primary mx-1 btn-record-info'>
                        <i class='fa fa-eye'></i>
                    </a>";


                $output .= "<a href='javascript:void(0)' data-bs-toggle='modal' data-bs-target='#delete-record'
                data-url='" . route('admin.committees.destroy', $query->id) . "'
                class='btn btn-sm btn-danger delete-record-btn'>
                <i class='fa fa-trash'></i>
            </a>";

                return $output;
            })


            ->setRowId('id')
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Committee $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('committee-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0,'asc')
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make("id")
                ->addClass('text-center')
                ->title(__(key: 'members.id'))
                ->addClass('text-center'),
            Column::make("name_ar")
                ->title(__('members.name_ar'))
                ->addClass('text-center'),
            Column::make("name_fr")
                ->title(__('members.name_fr'))
                ->addClass('text-center'),
            Column::computed("action")
                ->exportable(false)
                ->printable(false)
                ->width(170)
                ->addClass('text-center')
                ->title(__(key: "members.actions")),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Committee_' . date('YmdHis');
    }
}
