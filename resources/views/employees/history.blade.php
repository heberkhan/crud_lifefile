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
                <div class="card-header">{{  now() }} <p class="float-right">Welcome {{Auth::user()->name}}</p></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('employees.history_results') }}" method="POST">
                      @csrf
                      <div class="row">
                        <input type="hidden" name="employee_id" value="{{ $employee->employee_id }}">
                              <div class="col-sm-4">
                                  <label for="initial_date">Initial Access Date</label>
                                  <input type="date" name="initial_date" class="form-control" required>
                              </div>
                              <div class="col-sm-4">
                                  <label for="initial_date">Final Access Date</label>
                                  <input type="date" name="final_date" class="form-control" required>
                              </div>

                              <div class="col-sm-4">
                                  <br>
                                  <button type="submit" class="btn btn-primary">Filter</button>
                                  <button type="reset" class="btn btn-danger">Clear Filter</button>
                              </div>
                              
                      </div>
                  </form>
              <hr>   
                    
                    <!-- Button trigger modal -->
                    <div class="col-md-12">
                        <h3>History Access from: {{ $employee->name }} - ID: {{ $employee->employee_id }}</h3>
                        <p class="float-right">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Back</a> 
                        </p>
                    </div>
                    <table class="table" id="accessTable">
                        <thead>
                          <tr>
                            <td scope="col">Employee ID</td>
                            <th scope="col">Date / Hour</th>
                            <th scope="col">Access Granted</th>
                            <th scope="col">Have Access</th>
                          </tr>
                        </thead>
                        <tbody >
                          @foreach ($access as $item)
                            <tr>
                              <th scope="row">{{$item->employee_id}}</th>
                              <th>{{$item->created_at}}</th>
                              <td>
                                  @if ($item->access_granted == 0)
                                      NO
                                  @else
                                      YES    
                                  @endif
                              </td>
                              <td>
                                @if ($item->have_access == 0)
                                    NO
                                @else
                                    YES    
                                @endif
                            </td>
                            </tr>
                          @endforeach
                          {{ $access->links() }}
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
    </div>
  </div>
@endsection

@section('js')
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/b-2.2.1/b-html5-2.2.1/datatables.min.js"></script>

    <script>
      $('#accessTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'pdf'
      ]
      });
    </script>
@endsection
