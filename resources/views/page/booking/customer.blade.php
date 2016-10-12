@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Customer
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
              <a href="{{ url('customer/add') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Data Customer
              </a>

              <a href="{{ url('/customer') }}" class="btn btn-xs btn-success">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Barcode</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Bank</th>
                  <th>Marketer Name</th>
                  <th>Status</th>
                  <th>Priority</th>
                  <th>Action</th>
                </tr>
              </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
<script src="{{ asset('dist/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
