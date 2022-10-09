@extends('layouts.adminlayout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <div class="" ><h3 class="card-title mt-1" style="margin-right: 5px;">Dishes </h3></div>


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
                        <form action="/dishes" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="text" class="form-control" name="name" placeholder="Dish Name" value="{{old('name')}}"> <br>

                            <select name="category" class="form-control" id="">
                                <option value="">Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach

                            </select> <br>
                            <input type="file" class="" name="dish_image" placeholder="Dish Image"> <br> <br>
                            <button type="submit" class="btn btn-sm btn-info " style="">Create</button>
                        </form>
                        <br>
                        <a href="/dishes" class="">
                            <button class="btn btn-sm btn-success " style="">Back</button>
                        </a>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
    @endsection






