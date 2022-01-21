

    <div class="form-group row">
        {{ Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) }}
        
        <div class="col-md-6">
            {{ Form::text('name', $emp->name, ['class' => 'form-control form-control-solid', 'placeholder' => 'Employee First Name', 'required', 'autofocus']) }}

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('last_name', 'Last Name', ['class' => 'col-md-4 col-form-label text-md-right']) }}

        <div class="col-md-6">
            {{ Form::text('last_name', $emp->last_name, ['class' => 'form-control form-control-solid', 'placeholder' => 'Employee Last Name', 'required' => 'required']) }}

            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('employee_id', 'Employee ID', ['class' => 'col-md-4 col-form-label text-md-right']) }}

        <div class="col-md-6">
            {{ Form::text('employee_id', $emp->employee_id, ['class' => 'form-control form-control-solid', 'placeholder' => 'Employee ID', 'required' => 'required']) }}

            @error('employee_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('phone', 'Phone', ['class' => 'col-md-4 col-form-label text-md-right']) }}

        <div class="col-md-6">
            {{ Form::text('phone', $emp->phone, ['class' => 'form-control form-control-solid', 'placeholder' => 'Phone', 'required' => 'required']) }}

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('address', 'Address', ['class' => 'col-md-4 col-form-label text-md-right']) }}

        <div class="col-md-6">
            {{ Form::text('address', $emp->address, ['class' => 'form-control form-control-solid', 'placeholder' => 'Address', 'required' => 'required']) }}

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('email', 'Email', ['class' => 'col-md-4 col-form-label text-md-right']) }}
        <div class="col-md-6">
            {{ Form::email('email', $emp->email, ['class' => 'form-control form-control-solid', 'placeholder' => 'Email', 'required' => 'required']) }}
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        {{ Form::label('department_id', 'Department', ['class' => 'col-md-4 col-form-label text-md-right']) }}

        <div class="col-md-6">
            {{ Form::select('department_id', $departments, $emp->department_id, ['class' => 'form-control form-control-solid', 'placeholder' => 'Select...'] ) }}
            
            

            @error('department_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
