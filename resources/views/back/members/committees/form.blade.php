<!-- start form row -->
<div class="row">
    <!-- form field name_ar -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="name_ar" class="form-label">
                {{ __('members.name_ar') }}
                <span class="text-danger">*</span>
            </label>
            {!! Form::text('name_ar', old(key: "name_ar"), [
            'id' => 'name_ar',
            "dir"=>"rtl",
            'class' => 'form-control ' . ($errors->has('name_ar') ? 'is-invalid' : ''),
            'placeholder' => __('members.name_ar_placeholder')
            ]) !!}
            @error('name_ar')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- form field name_fr -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="name_fr" class="form-label">
                {{ __('members.name_fr') }}
                <span class="text-danger">*</span>
            </label>
            {!! Form::text('name_fr', old(key: "name_fr"), [
            'id' => 'name_fr',
            'class' => 'form-control ' . ($errors->has('name_fr') ? 'is-invalid' : ''),
            'placeholder' => __('members.name_fr_placeholder')
            ]) !!}
            @error('name_fr')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- form field description_ar -->
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="description_ar" class="form-label">
                {{ __('members.description_ar') }}
                <span class="text-danger">*</span>
            </label>
            {!! Form::textarea('description_ar', old(key: "description_ar"), [
            'id' => 'description_ar',
            "rows"=>2,
            "dir"=>"rtl",
            'class' => 'form-control ' . ($errors->has('description_ar') ? 'is-invalid' : ''),
            'placeholder' => __('members.description_ar_placeholder')
            ]) !!}
            @error('description_ar')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- form field description_fr -->
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="description_fr" class="form-label">
                {{ __('members.description_fr') }}
                <span class="text-danger">*</span>
            </label>
            {!! Form::textarea('description_fr', old(key: "description_fr"), [
            'id' => 'description_fr',
            "rows"=>2,
            'class' => 'form-control ' . ($errors->has('description_fr') ? 'is-invalid' : ''),
            'placeholder' => __('members.description_fr_placeholder')
            ]) !!}
            @error('description_fr')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

