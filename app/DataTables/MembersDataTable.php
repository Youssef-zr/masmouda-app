<?php

namespace App\DataTables;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Crypt;
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
                $btns = "<a href=" . route('admin.members.edit', $query->id) . " 
                class='dropdown-item mb-0'><i class='fa fa-pencil'></i> " . __("global.edit") . "</a>";

                $btns .= "<a href=" . route('admin.members.show', parameters: $query->id) . "
                    data-bs-toggle='modal' data-bs-target='#record-info'
                    data-url='" . route("admin.members.show", $query->id) . "'
                    class='dropdown-item mb-0 btn-record-info'>
                    <i class='fa fa-eye'></i> " . __("global.show") . "</a>";

                $btns .= "<a href=" . route('admin.members.pdf.member-info', parameters: Crypt::encryptString($query->id)) . "
                    class='dropdown-item mb-0'
                    target='_blank'>
                    <i class='fas fa-file-pdf'></i> " . __("global.export_pdf") ."</a>";

                $btns .= "<a href=" . route('admin.members.pdf.export-cin-card', parameters: Crypt::encryptString($query->id)) . "
                    class='dropdown-item mb-0'
                    target='_blank'>
                    <i class='fas fa-id-card'></i> " . __("global.show_cin") ."</a>";

                $btns .= "<a href='javascript:void(0)' data-bs-toggle='modal' data-bs-target='#delete-record'
                    data-url='" . route('admin.members.destroy', $query->id) . "'
                    class='dropdown-item mb-0 delete-record-btn'>
                    <i class='fa fa-trash'></i>  " . __("global.delete") . "</a>";


                $output = '<div class="dropdown">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdown-default-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list"></i> '.
                        __("members.actions")
                    .'</button>
                    <div class="dropdown-menu text-lowercase border border-secondary mt-1" aria-labelledby="dropdown-default-primary">';

                $output .= $btns;

                $output .= '</div></div>';

                return $output;
            })

            ->editColumn('role', function ($query) {
                $role_name = "name_" . app()->getLocale();
                $output = "<p class='text-wrap mb-0' style='line-height:1.5'
                            data-bs-toggle='tooltip'
                            title='" . $query->role->$role_name . "'
                        >"
                    . Str::limit($query->role->$role_name, 30, "...") .
                    "</p>";
                return $output;
            })

            ->editColumn("status", function ($query) {
                $output = "<div class='dropdown'>
                <button class='btn btn-sm " . ($query->status == "enabled" ? "btn-success" : "btn-danger") . " dropdown-toggle' type='button' id='statusDropdown' data-bs-toggle='dropdown' aria-expanded='false'>
                    " . __("global." . $query->status) . "
                </button>
                <ul class='dropdown-menu' aria-labelledby='statusDropdown'>";

                foreach (statues() as $key => $value) {
                    $output .= "<li>
                    <a class='dropdown-item' href='" . route('admin.members.change-status', [$query->id, $key]) . "' " . ($query->status == $key ? "style='font-weight: bold;'" : "") . ">" . __("global." . $key) . "</a>
                </li>";
                }

                $output .= "</ul></div>";

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
                ->title(__(key: 'members.id'))
                ->addClass('text-center'),
            Column::make("name")
                ->title(__('members.name'))
                ->addClass('text-center'),
            Column::make("phone")
                ->title(__('members.phone'))
                ->addClass('text-center'),
            Column::make("role")
                ->title(__('members.role_name'))
                ->sortable(false)
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
