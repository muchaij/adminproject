
@extends('backend.header')
<section class="content center">
      <div class="container-fluid">
        <div class="row">
<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{url('addproduct')}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputproductName">Product Name</label>
                    <input type="text" class="form-control" id="productN" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCategory">Product Category</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Category">
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    </div>