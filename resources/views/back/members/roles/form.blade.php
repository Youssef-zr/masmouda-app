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

    <!-- form field permissions -->
    <div class="col-md-12">
        <div class="form-group mb-4
            @error('permissions')
                is-invalid
            @enderror
        ">
            <label for="permissions" class="form-label">
                {{ __('members.permissions') }}
                <span class="text-danger">*</span>
            </label>

            <!-- Start permision wrapper -->
            <div id="permissions-wrapper">
                @if(isset($role) and $role->permissions)

                @foreach($role->permissions as $permission)
                <div class="permission-item">
                    <div class="input-group mb-3">
                        {!! Form::text('permissions[]', $permission, [
                        'class' => 'form-control',
                        'required'=>true,
                        'placeholder' => __('members.permission_placeholder')
                        ]) !!}
                        <div class="input-group-text">
                            <button class="btn btn-danger btn-sm remove-permission" data-toggle='tooltip' title='{{ __('members.remove_permission') }}'>
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                <div class="permission-item">
                    <div class="input-group mb-3">
                        {!! Form::text('permissions[]', '', [
                        'class' => 'form-control',
                        'required'=>true,
                        'placeholder' => __('members.permission_placeholder')
                        ]) !!}
                        <div class="input-group-text">
                            <button class="btn btn-danger btn-sm remove-permission" data-toggle='tooltip' title='{{ __('members.remove_permission') }}'>
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- End permision wrapper -->

            <div class="add-permission-container float-right my-3">
                <button class="btn btn-primary btn-sm" data-toggle='tooltip' title='{{ __('members.add_permission') }}' id="add-permission">
                    <i class="fa fa-plus-circle"></i>
                </button>
            </div>

            @error('permissions')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


    </div>
    <!-- end form row -->


    @push("js")
    <script src="{{ url('assets/back/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script>
        Dashmix.helpersOnLoad(['jq-maxlength']);
    </script>

    <script>
        $(() => {
            // add permission
            $('#add-permission').on('click', function(e) {
                e.preventDefault();

                const wrapper = $('#permissions-wrapper');
                const newPermission = $('<div class="permission-item"></div>');
                newPermission.html(`
                    <div class="input-group mb-3">
                        {!! Form::text('permissions[]', "", [
                        'class' => 'form-control',
                        'required'=>true,
                        'placeholder' => __('members.permission_placeholder')
                        ]) !!}
                        <div class="input-group-text">
                            <button class="btn btn-danger btn-sm remove-permission" data-toggle='tooltip' title='{{ __('members.remove_permission') }}'>
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </div>
                    </div>
                `);
                wrapper.append(newPermission);
            });

            // remove persmission
            $("body").on('click', '.remove-permission', function(e) {
                e.preventDefault();
                $(this).closest('.permission-item').remove();
            });
        })
    </script>
    @endpush
