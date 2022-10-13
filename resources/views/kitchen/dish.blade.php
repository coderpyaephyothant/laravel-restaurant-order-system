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
                    <div class="" ><h3 class="card-title mt-1" style="">Dishes </h3></div>
                    <div class="mt-0 ms-2" style="float:right">
                        <a href="{{route('dishes.create')}}" class="">
                            <button class="btn btn-sm btn-primary ">Create Dish</button>
                        </a>
                    </div>

                    </div>
                    <div class="card-body">
                        @if (session('dishCreated'))
                            <div class="alert alert-success">
                                {{ session('dishCreated') }}
                            </div>
                        @endif
                        <table id="dishes" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>Dish Name</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($dishes as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                    <td>{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-around ">
                                            <a class="btn btn-sm btn-info " href="{{route('dishes.edit',$item->id)}}">View & Edit</a>
                                            <form action="{{route('dishes.destroy',$item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-secondary ">Delete</button>
                                            </form>
                                        </div>
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
    </div>
</div>
<!-- /.content-wrapper -->

    @endsection







