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
                    <div class="mt-0">
                        <a href="dishes/create" class="">
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
                                        <a class="btn btn-sm btn-info" href="dishes/{{$item->id}}/edit">Edit</a>
                                        <a class="btn btn-sm btn-warming" href="dishes/{{$item->id}}">Delete</a>
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






