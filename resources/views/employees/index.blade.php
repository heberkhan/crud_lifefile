@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/b-2.2.1/b-html5-2.2.1/datatables.min.css"/>

@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
              <div class="card">
                <div class="card-header"><p class="float-left">Welcome {{Auth::user()->name}}</p>
                  <div class="col-md-12">
                    <p class="float-right"> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newEmployee">
                            New Employee
                          </button>

                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importCSV">
                            Import XLS
                          </button>
                        
                    </p>
                    
                </div>
                </div>
                <div class="card-body">
                    <table class="table" id="employeeTable">
                      <thead>
                        <tr>
                          <th scope="col">Employee ID</th>
                          <th scope="col">FirstName</th>
                          <th scope="col">LastName</th>
                          <th scope="col">Department</th>
                          <th scope="col">Total Access</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody >
                        @foreach ($employees as $item)
                        @php
                          $count = App\AccessRoom::where('employee_id', $item->employee_id)->count();   
                        @endphp
                          <tr>
                            <th scope="row">{{$item->employee_id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->last_name}}</td>
                            <td>{{$item->department->name}}</td>
                            <td>{{ $count }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                @if ($item->access == 0)
                                  <a href="{{ route('employees.access', $item->id) }}" class="btn btn-sm btn-light">Enable</a>
                                @else
                                  <a href="{{ route('employees.access', $item->id) }}" class="btn btn-sm btn-info">Disable</a>
                                @endif
                                
                                <a href="{{ route('employees.history', $item->employee_id) }}" class="btn btn-sm btn-warning">History</a>
                                <a href="{{ route('employees.destroy', $item->id) }}" class="btn btn-sm btn-danger" onclick="
                                  return confirm('Are you sure that you want to delete this item?')">Delete</a>
                                
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
              </div>
        </div>
    </div>
  </div>



  
  <!-- Modal Create Employee-->
  <div class="modal fade" id="newEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{Form::model($emp, ['route' => ['employees.store'], 'method' => 'post'])}}
          
            @csrf
            <input type="hidden" name="access" value="0">
              <div class="row">
                  <div class="col-sm-12">
                      @include('employees.form._form')
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

<!-- Modal import CSV -->
<div class="modal fade" id="importCSV" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Xls</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('employees.import')}}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
      
        @csrf
         <label for="file">File</label>
         <input type="file" name="file">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Charge File</button>
        </div>
    </form>
    </div>
  </div>
</div>
@endsection

@section('js')
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/b-2.2.1/b-html5-2.2.1/datatables.min.js"></script>

    <script>
      $('#employeeTable').DataTable();
    </script>
@endsection




