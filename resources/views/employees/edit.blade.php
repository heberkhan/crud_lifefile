@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{Form::model($emp, ['route' => ['employees.update', $emp->id], 'method' => 'put'])}}
        @csrf
            @include('employees.form._form')
            <div class="modal-footer">
                <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" id="submitForm">Save changes</button>
            </div>
        {{ Form::close() }}    
        
    </div>
</div>
    
@endsection