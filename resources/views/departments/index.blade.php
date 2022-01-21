@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
              <div class="card">
                <div class="card-header"><p class="float-left">Welcome {{Auth::user()->name}}</p>
                  <!-- Button trigger modal -->
                  <div class="col-md-12">
                    <p class="float-right"> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newDepartment">
                            New Department
                          </button>
                        
                    </p>
                    
                </div>
                </div>
                <div class="card-body">
                    <table class="table" id="departmentTable">
                        <thead>
                          <tr>
                            <th scope="col">Department ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody >
                          @foreach ($depts as $item)
                            <tr>
                              <th scope="row">{{$item->id}}</th>
                              <td>{{$item->name}}</td>
                              <td>
                                  <a href="{{ route('department.edit', $item->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                  <a href="{{ route('department.destroy', $item->id) }}" class="btn btn-sm btn-danger" onclick="
                                    return confirm('Are you sure that you want to delete this item?')">Delete</a>
                                  
                              </td>
                            </tr>
                          @endforeach
                          
                          {{ $depts->links() }}
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
    </div>


  <!-- Modal Create Department-->
  <div class="modal fade" id="newDepartment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{Form::model($dept, ['route' => ['department.store'], 'method' => 'post'])}}
          
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitForm">Save changes</button>
            </div>
          {{ Form::close() }}  
        </div>
        
      </div>
    </div>
  </div>

@endsection

@section('js')
    <script>
      $('#departmentTable').DataTable();
    </script>
@endsection
