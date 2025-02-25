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

    <!-- form field salary -->
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="salary" class="form-label">
                {{ __('members.salary') }}
                <span class="text-danger">*</span>
            </label>
            {!! Form::number('salary', old('salary'), [
            'id' => 'salary',
            'step' => '0.1',
            'class' => 'form-control ' . ($errors->has('salary') ? 'is-invalid' : ''),
            'placeholder' => __('members.salary_placeholder')
            ]) !!}
            @error('salary')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

