@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">

            <div class="card-header">
                <h2>Edit Department</h2>
                <p class="float-right">Welcome {{Auth::user()->name}}</p></div>
            <div class="card-body">
                <div class="col-md-12">
                    {{Form::model($dept, ['route' => ['department.update', $dept->id], 'method' => 'put'])}}
                      
                        @csrf
                        
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group row">
                                  {{ Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                  
                                  <div class="col-md-6">
                                      {{ Form::text('name', $dept->name, ['class' => 'form-control form-control-solid', 'placeholder' => 'Department Name', 'required', 'autofocus' => true]) }}
                          
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <a href="{{ route('department.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary" id="submitForm">Save changes</button>
                        </div>
                      {{ Form::close() }}   
                    
                </div>
            </div>
        </div>
        
    </div>
</div>

    
@endsection