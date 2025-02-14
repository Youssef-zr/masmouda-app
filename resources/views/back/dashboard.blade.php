@extends("back._layouts.master")

@section("title")
- {{ __("members.members_list") }}
@endsection

@section("content")
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3 text-capitalize">{{ __("global.dashboard") }}</h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

</div>
<!-- END Page Content -->

@endsection
