<?php

namespace App\DataTables;

use App\Models\Department;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class DepartmentDataTable extends DataTable
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
            $btns = "<a href=" . route('admin.departments.edit', $query->id) . " 
            class='dropdown-item mb-0'><i class='fa fa-pencil'></i> " . __("global.edit") . "</a>";

            $btns .= "<a href=" . route('admin.departments.show', parameters: $query->id) . "
                data-bs-toggle='modal' data-bs-target='#record-info'
                data-url='" . route("admin.departments.show", $query->id) . "'
                class='dropdown-item mb-0 btn-record-info'>
                <i class='fa fa-eye'></i> " . __("global.show") . "</a>";

            $btns .= "<a href='javascript:void(0)' data-bs-toggle='modal' data-bs-target='#delete-record'
                data-url='" . route('admin.departments.destroy', $query->id) . "'
                class='dropdown-item mb-0 delete-record-btn'>
                <i class='fa fa-trash'></i>  " . __("global.delete") . "</a>";


            $output = '<div class="dropdown">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdown-default-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-list"></i> '.
                    __("employees.actions")
                .'</button>
                <div class="dropdown-menu text-lowercase border border-secondary mt-1" aria-labelledby="dropdown-default-primary">';

            $output .= $btns;

            $output .= '</div></div>';

            return $output;
        })

        ->editColumn('parent', function ($query) {
            $output = $query->parent?->name?? "---";
            return $output;
        })
    
        ->editColumn(name: 'description', content: function ($query) {
            $output = "<p class='text-wrap mb-0' style='line-height:1.5'
                            data-bs-toggle='tooltip'
                            title='" . $query->description . "'
                        >"
                    . Str::limit($query->description, 30, "...") .
                    "</p>";

            return $output;
        })

        ->setRowId('id')
        ->rawColumns(['action', 'parent','description']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Department $model): QueryBuilder
    {
        return $model->newQuery()->with("parent");
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('department-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
         return [
            Column::make("id")
                ->title(__(key: 'employees.id'))
                ->addClass('text-center'),
            Column::make("name")
                ->title(__('employees.name'))
                ->addClass('text-center'),
            Column::make(data: "description")
                ->title(__('employees.description'))
                ->addClass('text-center'),
            Column::make("parent")
                ->title(__('employees.parent'))
                ->sortable(false)
                ->addClass('text-center'),
            Column::computed("action")
                ->exportable(false)
                ->printable(false)
                ->width(170)
                ->addClass('text-center')
                ->title(__(key: "employees.actions")),
         ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Department_' . date('YmdHis');
    }
}
