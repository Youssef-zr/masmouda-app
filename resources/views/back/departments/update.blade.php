@extends('back._layouts.master')

@section("title")
- {{ __("employees.edit_department") }}
@endsection

@section("content")
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3 text-capitalize">{{ __("employees.departments") }}</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a href="{{ route("admin.dashboard") }}">{{ __("global.dashboard") }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route("admin.departments.index") }}">{{ __("employees.departments")}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __("global.update")}}</li>
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
            <h3 class="block-title">
                <a href="{{ route("admin.departments.index") }}" class="btn btn-sm btn-warning px-2 py-1">
                    <i class="fa fa-arrow-left"></i>
                    {{ __("global.return") }}
                </a>
            </h3>
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
            <div class="block-content block-content-full">

                <!-- Start Form -->
                {!! Form::model($department, ['route' => ['admin.departments.update',$department->id], 'method' => 'post']) !!}
                @csrf
                @method('PUT')

                @include("back.departments.form")

                <!-- Submit -->
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                        {{ __('global.update') }}
                    </button>
                </div>
                <!-- END Submit -->
                {!! Form::close() !!}

                <!-- END Form -->
            </div>
        </div>
    </div>

</div>
<!-- END Page Content -->
@endsection
