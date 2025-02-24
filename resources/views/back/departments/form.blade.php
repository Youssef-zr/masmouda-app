<!-- start form row -->
<div class="row">
    <!-- form field name -->
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="name" class="form-label">
                {{ __('employees.name') }}
                <span class="text-danger">*</span>
            </label>
            {!! Form::text('name', old(key: "name"), [
            'id' => 'name',
            'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
            'placeholder' => __('employees.name_placeholder')
            ]) !!}
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- form field parents -->
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="parent_id" class="form-label">
                {{ __('employees.parent') }}
            </label>

            {!! Form::select("parent_id", $departments, old("parent_id"), [
            'id' => 'parent_id',
            'class' => 'js-select2 form-select form-control' . ($errors->has('parent_id') ? 'd-block is-invalid' : ''),
            'placeholder' => __('employees.parent_placeholder')
            ]) !!}

            @error('parent_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    
    <!-- form field description -->
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="description" class="form-label">
                {{ __('employees.description') }}
            </label>
            {!! Form::textarea('description', old(key: "description"), [
            'id' => 'description',
            "rows"=>3,
            'class' => 'form-control ' . ($errors->has('description') ? 'is-invalid' : ''),
            'placeholder' => __('employees.description_placeholder')
            ]) !!}
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


@push('css')
<link rel="stylesheet" href="{{ url('assets/back/js/plugins/select2/css/select2.min.css') }}">
@endpush

@push("js")
<script src="{{ url('assets/back/js/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    Dashmix.helpersOnLoad(['jq-select2']);
</script>
@endpush