<!-- start form row -->
<div class="row">
    <!-- form field name -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="name" class="form-label">
                {{ __('members.name') }}
                <span class="text-danger">*</span>
            </label>

            <div class="input-group">
                <span class="input-group-text {{ $errors->has('name') ? 'bg-danger text-white border-danger' : ''}}">
                    <i class="far fa-user"></i>
                </span>

                {!! Form::text('name', old(key: "name"), [
                'id' => 'name',
                'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                'placeholder' => __('members.name_placeholder')
                ]) !!}

                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>

    <!-- form field email -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="email" class="form-label">
                {{ __('members.email') }}
            </label>

            <div class="input-group">
                <span class="input-group-text {{ $errors->has('email') ? 'bg-danger text-white border-danger' : ''}}">
                    <i class="far fa-envelope"></i>
                </span>

                {!! Form::email('email', old("email"), [
                'id' => 'email',
                'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''),
                'placeholder' => __('members.email_placeholder')
                ]) !!}

                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>

    <!-- form field adress -->
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="adress" class="form-label">
                {{ __('members.adress') }}
                <span class="text-danger">*</span>
            </label>

            <div class="input-group">
                <span class="input-group-text {{ $errors->has('adress') ? 'bg-danger text-white border-danger' : ''}}">
                    <i class="fa fa-map-marker-alt"></i>
                </span>

                {!! Form::text('adress', old("adress"), [
                'id' => 'adress',
                'class' => 'form-control ' . ($errors->has('adress') ? 'is-invalid' : ''),
                'placeholder' => __('members.adress_placeholder')
                ]) !!}

                @error('adress')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- form field phone -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="example-maxlength4" class="form-label">
                {{ __('members.phone') }}
                <span class="text-danger">*</span>
            </label>

            <div class="input-group">
                <span class="input-group-text {{ $errors->has('phone') ? 'bg-danger text-white border-danger' : ''}}">
                    <i class="fa fa-mobile-alt"></i>
                </span>

                {!! Form::text('phone', old("phone"), [
                "maxlength"=>"10",
                "data-always-show"=>"true",
                "data-separator"=>" / ",
                "id"=>"example-maxlength4",
                "data-placement"=>"bottom-right",
                'class' => 'js-maxlength form-control ' . ($errors->has('phone') ? 'is-invalid' : ''),
                'placeholder' => __('members.phone_placeholder')
                ]) !!}

                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- form field cin number -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="cin_number" class="form-label">
                {{ __('members.cin_number') }}
                <span class="text-danger">*</span>
            </label>

            <div class="input-group">
                <span class="input-group-text {{ $errors->has('cin_number') ? 'bg-danger text-white border-danger' : ''}}">
                    <i class="fa fa-id-card"></i>
                </span>

                {!! Form::text('cin_number', old("cin_number"), [
                'id' => 'cin_number',
                'class' => 'form-control ' . ($errors->has('cin_number') ? 'is-invalid' : ''),
                'placeholder' => __('members.cin_number_placeholder')
                ]) !!}

                @error('cin_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- form field bank name -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="bank_name" class="form-label">
                {{ __('members.bank_name') }}
                <span class="text-danger">*</span>
            </label>

            {!! Form::select("bank_name", moroccoBankAgencies(), old("bank_name"), [
            'id' => 'bank_name',
            'class' => 'js-select2 form-select form-control' . ($errors->has('bank_name') ? 'd-block is-invalid' : ''),
            'placeholder' => __('members.bank_name_placeholder')
            ]) !!}

            @error('bank_name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- form field rib number -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="example-maxlength9" class="form-label">
                {{ __('members.rib_number') }}
                <span class="text-danger">*</span>
            </label>

            <div class="input-group">
                <span class="input-group-text {{ $errors->has('rib_number') ? 'bg-danger text-white border-danger' : ''}}">
                    <i class="fa fa-credit-card"></i>
                </span>

                {!! Form::text('rib_number', old("rib_number"), [
                "inputmode"=>"numeric",
                "maxlength"=>"24",
                "data-always-show"=>"true",
                "data-separator"=>" / ",
                "id"=>"example-maxlength9",
                "data-placement"=>"bottom-right",
                'class' => 'js-maxlength form-control ' . ($errors->has('rib_number') ? 'is-invalid' : ''),
                'placeholder' => __('members.rib_number_placeholder')
                ]) !!}

                @error('rib_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- form field political_party -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="political_party" class="form-label">
                {{ __('members.political_party') }}
                <span class="text-danger">*</span>
            </label>

            {!! Form::select("political_party", political_parties(), old("political_party"), [
            'id' => 'political_party',
            'class' => 'js-select2 form-select form-control' . ($errors->has('political_party') ? 'd-block is-invalid' : ''),
            'placeholder' => __('members.political_party_placeholder')
            ]) !!}

           @error('political_party')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- form field role name -->
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="role_name" class="form-label">
                {{ __('members.role_name') }}
                <span class="text-danger">*</span>
            </label>

            {!! Form::select("role_id", $roles, old("role_id"), [
            'id' => 'role_id',
            'class' => 'js-select2 form-select form-control' . ($errors->has('role_id') ? 'd-block is-invalid' : ''),
            'placeholder' => __('members.role_name_placeholder')
            ]) !!}
        
           @error('role_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <!-- form field month -->
    <div class="col-md-4">
        <div class="form-group mb-4">
            <label for="month" class="form-label">
                {{ __('members.month') }}
                <span class="text-danger">*</span>
            </label>

            <div class="input-group">
                <span class="input-group-text {{ $errors->has('month') ? 'bg-danger text-white border-danger' : ''}}">
                    <i class=" fa fa-calendar-days"></i>
                </span>

                {!! Form::number('month', old("month"), [
                'id' => 'month',
                'min' => 1,
                'max' => 12,
                'class' => 'form-control ' . ($errors->has('month') ? 'is-invalid' : ''),
                'placeholder' => __('members.month_placeholder')
                ]) !!}

                @error('month')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- form field salary -->
    <div class="col-md-4">
        <div class="form-group mb-4">
            <label for="salary" class="form-label">
                {{ __('members.salary') }}
            </label>

            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-dollar-sign"></i>
                </span>
                {!! Form::number('salary', old('salary',$member->role->salary ?? null), [
                'id' => 'salary',
                "disabled"=>true,
                'class' => 'form-control ' . ($errors->has('salary') ? 'is-invalid' : ''),
                'placeholder' => __('members.salary_placeholder')
                ]) !!}
            </div>

            @error('salary')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- form field amount -->
    <div class="col-md-4">
        <div class="form-group mb-4">
            <label for="amount" class="form-label">
                {{ __('members.amount') }} ({{ __("members.yearly") }})
            </label>


            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-dollar-sign"></i>
                </span>
                {!! Form::number('amount', old("amount"), [
                'id' => 'amount',
                "disabled"=>true,
                'step' => '0.1',
                'class' => 'form-control ' . ($errors->has('amount') ? 'is-invalid' : ''),
                'placeholder' => __('members.amount_placeholder')
                ]) !!}
            </div>

            @error('amount')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <!-- form field permissions -->
    <div class="col-md-12">
        <hr class="border-primary">

        <div class="form-group mt-4 mb-5
            @error('permissions')
                is-invalid
            @enderror
        ">
            <label for="permissions" class="form-label">
                {{ __('members.permissions') }}
            </label>

            <!-- Start permision wrapper -->
            <div id="permissions-wrapper">
                @if(isset($role) and $role->permissions)

                @foreach($role->permissions as $permission)
                <div class="permission-item">
                    <div class="input-group mb-3">
                        {!! Form::text('permissions[]', $permission, [
                        'class' => 'form-control',
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

</div>
<!-- end form row -->

@push('css')
<link rel="stylesheet" href="{{ url('assets/back/js/plugins/select2/css/select2.min.css') }}">
@endpush

@push("js")
<script src="{{ url('assets/back/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ url('assets/back/js/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    Dashmix.helpersOnLoad(['jq-maxlength', 'jq-select2']);
</script>

<script>
    $(() => {
        const salary_el = $("#salary");
        const amount_el = $("#amount");

        const calculate_amount = function() {
            let salary_value = $(this).val();
            if (salary_value != null && salary_value > 0) {

                salary_value = parseFloat(salary_value) * 12;
                salary_value = salary_value.toFixed(2);

                amount_el.val(salary_value);
            } else {
                amount_el.val(0)
            }
        }

        salary_el.on("keyup", calculate_amount);
        salary_el.on("keypress", calculate_amount);
        salary_el.on("keydown", calculate_amount);
        salary_el.on("change", calculate_amount);


        // get role salary
        const role_id = $("#role_id");
        const csrf_token = $('meta[name="csrf-token"]').attr('content');

        role_id.on("change", function() {
            salary_el.val(0);
            salary_el.trigger("change");

            const role_id_value = $(this).val();

            if (role_id_value != null && role_id_value > 0) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrf_token
                    },
                    url: "{{ route('admin.members.get-role-salary') }}",
                    type: "POST",
                    data: {
                        id: role_id_value
                    },
                    success: function(response) {
                        salary_el.val(response.salary);
                        salary_el.trigger("change");
                    }
                });
            }
        });

        // add permission
        $('#add-permission').on('click', function(e) {
            e.preventDefault();

            const wrapper = $('#permissions-wrapper');
            const newPermission = $('<div class="permission-item"></div>');
            newPermission.html(`
                    <div class="input-group mb-3">
                        {!! Form::text('permissions[]', "", [
                        'class' => 'form-control',
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