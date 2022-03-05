@extends('layouts.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
          <div class="card ">  
                    @if (session('approvedmessage'))
                    <div class="alert alert-success alert-dismissible fade-in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success! </strong>{{ session('approvedmessage') }}
                    </div>
                    @endif
                    @if (session('readymessage'))
                    <div class="alert alert-warning alert-dismissible fade-in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success! </strong>{{ session('readymessage') }}
                    </div>
                    @endif
                    @if (session('canceledmessage'))
                    <div class="alert alert-danger alert-dismissible fade-in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success! </strong>{{ session('canceledmessage') }}
                    </div>
                    @endif                    
                        <div class="card-header">
                            <h3 class="text-info">Orders Listings</h3>                           
                        </div>
                        <div class="card-body">
                            <table id="dishes" class="table table-bordered table-stripped">
                                <thead>
                                <tr>                                    
                                    <th>
                                        Dish Name
                                    </th>
                                    <th>
                                        Table Number
                                    </th>
                                    <th>
                                        Status
                                    </th> 
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                               
                                @foreach($orders as $order)
                                <tbody>
                                   
                                    <td>{{$order->dish->name}}</td>                                                                   
                                    <td>{{$order->table_id}}</td>
                                    <td>{{$status[$order->status]}}</td>                                      
                                    <td>
                                        <div>
                                          <a href="/order/{{$order->id}}/approve" class="btn btn-outline-success">
                                            Approve
                                          </a>                                          
                                          <a href="/order/{{$order->id}}/cancel" class="btn btn-outline-danger">
                                            Cancel
                                          </a>
                                          <a href="/order/{{$order->id}}/ready" class="btn btn-outline-warning">
                                            Ready
                                          </a>
                                        </div>                                       
                                    </td>                                    
                                </tbody>
                                
                                @endforeach
                            </table>
                        </div>
                    </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
  </div>
  <!-- /.content-wrapper -->

@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script>
        $(function () {            
            $('#dishes').DataTable({
                "searching" : false,
            });
        });
    </script>