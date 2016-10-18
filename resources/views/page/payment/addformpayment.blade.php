@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('formpayment.view') }}">Payment</li></a>
        <li class="active"><a href="">Add Payment</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Add Payment</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body"> 
              <form action="{{ route('formpayment.add') }}" method="post" >
              {!! csrf_field() !!}

              <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                <label for="">Type</label>
                <input type="text" name="" class="form-control">
              </div>
              <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                <label for="">Customer</label>
                <input type="text" name="" class="form-control">
              </div>              
              <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                <label for="">Method</label>
                <input type="text" name="" class="form-control">
              </div>
              <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                <label for="">Bank reference</label>
                <input type="text" name="" class="form-control">
              </div>
              <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                <label for="">Description</label>
                <input type="text" name="" class="form-control">
              </div>  
              <div class="form-group">
                <button type="reset" class="btn btn-default">RESET</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
              </div>

              </form>
          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     </div>
    </section>
@endsection


