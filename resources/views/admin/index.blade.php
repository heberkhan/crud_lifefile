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
                  <div class="col-md-12">
                    <p class="float-right"> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newAdmin">
                            New Admin
                          </button>
                    </p>
                </div>
                </div>
                <div class="card-body">
                    <table class="table" id="adminTable">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody >
                          @foreach ($users as $item)
                            <tr>
                              <th scope="row">{{$item->id}}</th>
                              <td>{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>
                                  <a href="{{ route('admin.destroy', $item->id) }}" class="btn btn-sm btn-danger" onclick="
                                    return confirm('Are you sure that you want to delete this item?')">Delete</a>
                                  
                              </td>
                            </tr>
                          @endforeach
                          
                          {{ $users->links() }}
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
    </div>
  </div>



  
  <!-- Modal Create Employee-->
  <div class="modal fade" id="newAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          @include('admin.form._form')
        </div>
      </div>
    </div>
  </div>

@endsection
@section('js')
    
    <script>
      $('#adminTable').DataTable();
    </script>
@endsection