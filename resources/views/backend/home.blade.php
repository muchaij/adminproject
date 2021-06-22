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
        <button class='btn btn-primary' data-toggle='modal' data-target='#addModal'>Add Product</button>
    </div>
    <!-- /.content -->
              <table class='table'>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Category</td>
                        <td>Action</td>
                    </tr>
                </thead>
              </table>

              <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
    <form role="form" method="POST" action="{{url('addproducts')}}" enctype='multipart/form-data'>
                @csrf
                <input type='hidden'name='id' value='0'/>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputproductName">Product Name</label>
                    <input type="text" class="form-control" id="productN" name='pname' placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCategory">Product Category</label>
                    <input type="text" class="form-control" id="" name="category" placeholder="Enter Category" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCategory">Product Quantity</label>
                    <input type="text" class="form-control" id="" name="quantity" placeholder="Enter quantity" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </form>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
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
                url: "{{ url('datatables/products') }}",
                data: function (d) {
                        d.search = $('input[name=search]').val();
                        d.sacco_id = $('input[name=sacco_id]').val();
                    }
                },
        columns: [
            {data: "product_name", name: "product_name", orderable: true},
            {data: "prd_qty", name: "prd_qty", orderable: true},
            {data: "prd_category", name: "prd_category", orderable: true},
            {data: "buttons", name: "buttons", orderable: true},
            /*{data: "myamount", name: "amount", orderable: false},
            {data: "luggage", name: "luggage", orderable: false},
            {data: "totals", name: "totals", orderable: false},
            {data: "mydate", name: "date", orderable: false},*/
        ]
        });

        $('.search-form').submit(function(e){
        e.preventDefault();
        table.draw();
        });
    });
    </script>
@endpush