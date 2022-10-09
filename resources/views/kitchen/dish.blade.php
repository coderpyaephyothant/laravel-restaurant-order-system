@extends('layouts.adminlayout')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h1 class="m-0 mb-3">Kitchen Admin</h1>
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                </div>

                <div class="card-body">
                    <table id="dishes" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                        </tr>
                        </thead>

                        </table>
                </div>
            </div>

          </div><!-- /.col -->


        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




  </div>
  <!-- /.content-wrapper -->
    @endsection
    <script>
        $(function () {
          $("#dishes").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>

