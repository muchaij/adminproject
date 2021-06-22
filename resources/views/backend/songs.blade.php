@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <!-- /.row -->

        <!-- Main row -->
        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <div class='text-right'>
      <input name='search' class='form-control' placeholder='search'>
        <button class='btn btn-primary' data-toggle='modal' data-target='#addModal'>Add Song</button>
    </div>
   
    <table class='table'>
                <thead>
                    <tr>
                        <td>Song Name</td>
                        <td>Song Title</td>
                        <td>Genre</td>
                        <td>Country of Origin</td>
                        <td>Artist Name</td>
                    </tr>
                </thead>
              </table>
              <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Song</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
                <form  action="{{url('addsongs')}}" method="POST" enctype="multiparts/form-data">
                @csrf
                <div class="card-body">
                            <div class="form-group">
                                <label  for="email">Song Name:</label>
                                <input type="text" class="form-control" id="sname" name="soname">
                            </div>
                            <div class="form-group">
                                <label  for="title">Song Title:</label>
                                <input type="text" class="form-control" name="stitle">
                            </div>
                            <div class="form-group">
                                <label  for="email">Genre :</label>
                                <input type="text" class="form-control"  name="genre">
                            </div>
                            <div class="form-group">
                                <label  for="coO">Country of Origin:</label>
                                <input type="text" class="form-control" name="corigin">
                            </div>
                            <div class="form-group">
                                <label  for="artist">Artist Name:</label>
                                <input type="text" class="form-control" name="artist">
                            </div>
                  </div>
                  <div class="card-footer">
                        <button type="submit" class="btn btn-primary ">Register Song</button>
                  </div>
                </form>
                </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>



@endsection
@push('js')
<script>
$(document).ready(function () {
        var table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            oLanguage: {sProcessing: "<i class='fas fa-spinner fa-pulse'></i> Processing..."},
            dom: 'lrtip',
            buttons: [
            ],
            ajax: //"{{ url('datatables/users') }}",
                {
                url: "{{ url('datatables/songs') }}",
                data: function (d) {
                        d.search = $('input[name=search]').val();
                    }
                },
        columns: [
            {data: "sname", name: "sname", orderable: true},
            {data: "stitle", name: "stitle", orderable: true},
            {data: "genre", name: "genre", orderable: true},
            {data: "country_origin", name: "country_origin", orderable: true},
            {data: "buttons", name: "buttons", orderable: true},
            /*{data: "myamount", name: "amount", orderable: false},
            {data: "luggage", name: "luggage", orderable: false},
            {data: "totals", name: "totals", orderable: false},
            {data: "mydate", name: "date", orderable: false},*/
        ]
        });
        var timer = null;
        $('input[name=search]').keyup(function(){
          clearTimeout(timer);
          timer = setTimeout(() => {
            table.draw();
          }, 2000);
        });
        $('.search-form').submit(function(e){
          e.preventDefault();
          table.draw();
        });
    });
    </script>
@endpush