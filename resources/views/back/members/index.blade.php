@extends("back._layouts.master")

@section("title")
- {{ __("members.members_list") }}
@endsection

@section("content")
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3 text-capitalize">{{ __("members.members") }}</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a href="{{ route("admin.dashboard") }}">{{ __("global.dashboard") }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route("admin.members.index") }}">{{ __("members.members")}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __("global.list")}}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <div class="block-title">
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" id="dropdown-default-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list"></i>
                        {{ __("members.actions") }}
                    </button>
                    <div class="dropdown-menu text-lowercase" aria-labelledby="dropdown-default-primary">
                        <a href="{{ route("admin.members.create") }}" class="dropdown-item mb-0">
                            <i class="fa fa-plus-circle"></i>
                            {{ __("global.add") }}
                        </a>

                        <a href="{{ route("admin.members.export-members") }}" target="_blank" class="dropdown-item mb-0">
                            <i class="fa fa-file-pdf"></i>
                            {{ __("global.export_list") }}
                        </a>

                        <a href="{{ route("admin.members.generate-pdf-decisions",["type"=>"yearly"]) }}" target="_blank" class="dropdown-item mb-0">
                            <i class="fa fa-file-pdf"></i>
                            {{ __("members.yearly_decisions") }}
                        </a>

                        <a href="{{ route("admin.members.generate-pdf-decisions",["type"=>"monthly"]) }}" target="_blank" class="dropdown-item mb-0">
                            <i class="fa fa-file-pdf"></i>
                            {{ __("members.monthly_decisions") }}
                        </a>

                    </div>
                </div>
            </div>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                    <i class="si si-pin"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                    <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            {{ $dataTable->table() }}
        </div>
    </div>

</div>
<!-- END Page Content -->

<!-- includes -->
@include('back._includes.modals.show-record-info')
@include('back._includes.modals.delete-record')

@endsection

<!-- stylesheets -->
@push("css")
@include("back._includes.datatables.css")
@endpush

<!-- scripts -->
@push("js")
@include("back._includes.datatables.js")

<!-- ajax call ( get member information) -->
<script>
    $(() => {
        $("body").on("click", ".btn-record-info", function() {

            const url = $(this).data("url");
            const container_el = $("#container-info");
            const spiner_container_el = $(".spiner-container");

            spiner_container_el.removeClass('d-none');
            container_el.html("");

            $.ajax({
                url,
                method: 'GET',
                success: function(response, textStatus, jqXHR) {
                    if (jqXHR.done) {
                        spiner_container_el.addClass('d-none');
                        container_el.html(response);
                    } else {
                        alert("{{ __('global.try_again_later') }}");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("{{ __('global.try_again_later') }}");
                }
            });
        });

        // init tooltips
        setTimeout(() => {
            $("[data-bs-toggle='tooltip']").tooltip();
        }, 2000);
    })
</script>
@endpush
