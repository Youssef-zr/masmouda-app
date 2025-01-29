<?php

namespace App\DataTables;

use App\Models\RMember as Role;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
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
                $output = "<a href=" . route('admin.role-members.edit', $query->id) . " class='btn btn-sm btn-success'><i class='fa fa-pencil'></i></a>";
                $output .= "<a href=" . route('admin.role-members.show', parameters: $query->id) . "
                    data-bs-toggle='modal' data-bs-target='#role-info'
                    data-url='" . route("admin.role-members.show", $query->id) . "'
                    class='btn btn-sm btn-primary mx-1 btn-member-info'>
                    <i class='fa fa-eye'></i>
                </a>";
                $output .= "<a href='javascript:void(0)' data-bs-toggle='modal' data-bs-target='#delete-record'
                    data-url='" . route('admin.role-members.destroy', $query->id) . "'
                    class='btn btn-sm btn-danger delete-record-btn'>
                    <i class='fa fa-trash'></i>
                </a>";
                return $output;
            })
            ->editColumn('salary', function ($query) {
                $salary = number_format($query->salary, 2);
                $output = '<span class="badge bg-info">' . $salary . __("global.mad_currency") . '</span>';
                return $output;
            })
            ->setRowId('id')
            ->rawColumns(['action', 'salary']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Role $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('role-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0,'asc')
            ->selectStyleSingle()
        ;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->addClass('text-center'),
            Column::make('name_ar')
                ->addClass('text-center')
                ->title(__('members.name_ar')),
            Column::make('name_fr')
                ->addClass('text-center')
                ->title(__('members.name_fr')),
            Column::make('salary')
                ->addClass('text-center')
                ->title(__(key: 'members.salary')),
            Column::computed('action')
                ->addClass('text-center')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center')
                ->title(__(key: "members.actions")),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Role_' . date('YmdHis');
    }
}
