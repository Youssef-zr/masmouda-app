<?php

namespace App\DataTables;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class MembersDataTable extends DataTable
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
                $output = "<a href=" . route('admin.members.edit', $query->id) . " class='btn btn-sm btn-success'><i class='fa fa-pencil'></i></a>";
                $output .= "<a href=" . route('admin.members.show', parameters: $query->id) . "
                    data-bs-toggle='modal' data-bs-target='#record-info'
                    data-url='" . route("admin.members.show", $query->id) . "'
                    class='btn btn-sm btn-primary mx-1 btn-record-info'>
                    <i class='fa fa-eye'></i>
                </a>";

                $output .= "<a href=" . route('admin.members.pdf.member-info', parameters: $query->cryptedId) . "
                    class='btn btn-sm btn-warning mx-1'
                    target='_blank'
                    data-bs-toggle='tooltip'
                    title='" . __('members.member_info_pdf') . "'>
                    <i class='fas fa-file-pdf'></i>
                </a>";

                $output .= "<a href='javascript:void(0)' data-bs-toggle='modal' data-bs-target='#delete-record'
                    data-url='" . route('admin.members.destroy', $query->id) . "'
                    class='btn btn-sm btn-danger delete-record-btn'>
                    <i class='fa fa-trash'></i>
                </a>";

                return $output;
            })
            ->editColumn('role', function ($query) {
                $role_name = "name_" . app()->getLocale();
                $output = "<p class='badge bg-info text-wrap' style='line-height:1.5'
                    data-bs-toggle='tooltip'
                    title='" . $query->role->$role_name . "'
                >"
                    . Str::limit($query->role->$role_name, 30, "...") .
                    "</p>";
                return $output;
            })
            ->editColumn("status", function ($query) {
                $output = "<select id='status' class='form-select text-white " . ($query->status == "enabled" ? " bg-success" : "bg-danger") . "'>";
                foreach (statues() as $key => $value) {
                    $output .= "<option value='" . $key . "'" . ($query->status == $key ? " selected" : "") . ">" . 
                    __('global.'.$key)
                    . "</option>";
                }

                $output .= "</select>";

                return $output;
            })

            ->setRowId('id')
            ->rawColumns(['action', 'role', 'status']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Member $model): QueryBuilder
    {
        return $model->newQuery()->with('role');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('members-table')
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
                ->addClass('text-center')
                ->title(__(key: 'members.id'))
                ->addClass('text-center'),
            Column::make("name")
                ->title(__('members.name'))
                ->addClass('text-center'),
            Column::make("role")
                ->title(__('members.role_name'))
                ->width(270)
                ->addClass('text-center'),
            Column::make("status")
                ->title(__(key: 'members.status'))
                ->width(160)
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
        return 'Members_' . date('YmdHis');
    }
}
