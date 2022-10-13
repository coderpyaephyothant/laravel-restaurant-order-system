@extends('layouts.adminlayout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header">
                    <div class="" ><h3 class="card-title mt-1" style="margin-right: 5px;">Dishes </h3></div>


                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <a href="/dishes" class="">
                        <button class="btn btn-sm btn-success " style=""> << Back</button>
                    </a>
                        <form action="{{route('dishes.update',$dishes->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="" style="border-radius: 5px;" src="{{asset('images/'.$dishes->image)}}" width="200px" alt="">
                            </div>
                            <br>

                            <input type="text" class="form-control text-primary" style="text-align: center" name="name" placeholder="Dish Name" value="{{old('name', $dishes->name)}}"> <br>

                            <select style="text-align: center" name="category" class="form-control" id="">
                                <option value="">Category</option>
                                @foreach ($categories as $item)
                                    <option  {{$item->id == $dishes->category_id ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach

                            </select> <br>
                            <input type="file" class="" name="dish_image" placeholder="Dish Image"> <br> <br>

                            <button type="submit" class="btn btn-sm btn-info " style="">Update >> </button>
                        </form>
                        <br>

                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
    @endsection







