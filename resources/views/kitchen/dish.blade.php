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
                    @if (session('createdmessage'))
                    <div class="alert alert-success alert-dismissible fade-in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success! </strong>{{ session('createdmessage') }}
                    </div>
                    @endif
                    @if (session('updatedmessage'))
                    <div class="alert alert-warning alert-dismissible fade-in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success! </strong>{{ session('updatedmessage') }}
                    </div>
                    @endif
                    @if (session('deletedmessage'))
                    <div class="alert alert-danger alert-dismissible fade-in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success! </strong>{{ session('deletedmessage') }}
                    </div>
                    @endif                    
                        <div class="card-header">
                            <h3 class="text-info">Dishes</h3>
                            <a href="dish/create" class="btn btn-success py-2 px-5">Create</a>
                        </div>
                        <div class="card-body">
                            <table id="dishes" class="table table-bordered table-stripped">
                                <thead>
                                <tr>
                                    <th>
                                        Number
                                    </th>
                                    <th>
                                        Dish Name
                                    </th> 
                                    <th>
                                        Dish Image
                                    </th>                                   
                                    <th>
                                        Category Name
                                    </th>
                                    <th>
                                        Created 
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <?php
                                    $i=1;
                                ?>
                                @foreach($dishes as $dish)
                                <tbody>
                                    <td>{{$i}}</td>
                                    <td>{{$dish->name}}</td>
                                    <td>
                                        <img src="{{url('/images/'.$dish->image) }}" alt="dish image" class="img-fluid d-block mx-auto mb-3" style="width:100px; height:100px; ">
                                    </td>                                 
                                    <td>{{$dish->category->name}}</td>
                                    <td>{{$dish->created_at}}</td>  
                                    <td>
                                        <div class="d-flex justify-content-center">                                           
                                            <form action="/dish/{{$dish->id}}" method="POST">
                                            <a href="/dish/{{$dish->id}}/edit" class="btn btn-warning mr-2">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to delete this item?')"class="btn btn-danger">Delete</button>
                                            </form>                                           
                                        </div>
                                    </td>                                    
                                </tbody>
                                <?php
                                    $i++;
                                ?>
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
          
            });
        });
    </script>