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
              <div class="card-header">
                <h3 class="text-info">Edit Dish</h3>
                <a href="/dish" class="btn btn-danger py-2 px-5 my-2">Back</a>
              </div>
                <div class="card-body">               
                    @if ($errors->any())
                      <div class="alert alert-danger">
                         <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                        </div>
                       @endif
                    <form action="/dish/{{$dish->id}}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                            <label for="">Name</label>
                              <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name' , $dish->name)}}">
                          </div>
                          <div class="form-group">
                              <label for="">Category</label>
                                <select name="category" id="" class="form-control">
                                    <option value="">Select Category</option>
                                      @foreach($categories as $cat)
                                      <option value="{{$cat->id}}" {{ $cat->id == $dish->category_id ? 'selected' : ''}}>
                                          {{$cat->name}}
                                      </option>
                                      @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                              <label for="" class="d-block">Image</label>
                                <img src="{{url('/images/'.$dish->image) }}" alt="" class="img-fluid d-block mb-3" style="width:160px">
                                <input type="file"  name="dish_image">
                              </div>
                              <button type="submit" class="btn btn-success py-2 px-5 my-3">Create</button>
                      </form>
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