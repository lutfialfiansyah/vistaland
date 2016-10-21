@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('change-name.view') }}">Ganti Nama</li></a>
        <li class="active"><a href="">Edit Ganti Nama</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Edit Ganti Nama</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <form action="{{ route('change-name.update',$edit->id) }}" method="post" >
              {!! csrf_field() !!}
								<div class="form-group{{ $errors->has('customer_id_old') ? ' has-error' : '' }}">
									<label for="customer_id_old">Customer Old</label>
									<select name="customer_id_old"  class="form-control">
												<option value="{{ $edit->customer_id_old }}" selected="selected">
												{{ $edit->customer_id_old }}</option>
									</select>
									@if($errors->has('customer_id_old'))
										<span class="help-block">
											<strong>{{ $errors->first('customer_id_old') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('customer_id_new') ? ' has-error' : '' }}">
									<label for="customer_id_new">Customer New</label>
									<select name="customer_id_new"  class="form-control">
												<option value="{{ $edit->customer_id_new }}" selected="selected">
												{{ $edit->customer_id_new }}</option>
									</select>
									@if($errors->has('customer_id_new'))
										<span class="help-block">
											<strong>{{ $errors->first('customer_id_new') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
									<label for="reason">Reason</label>
									<input type="text" name="reason" value="{{ $edit->reason }}" class="form-control">
									@if($errors->has('reason'))
										<span class="help-block">
											<strong>{{ $errors->first('reason') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
									<label for="status">Status</label>
									<select name="status"  class="form-control">
												<option value="{{ $edit->status }}">{{ $edit->status }}</option>
									</select>
									@if($errors->has('status'))
										<span class="help-block">
											<strong>{{ $errors->first('status') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('spr_id') ? ' has-error' : '' }}">
									<label for="spr_id">SPR ID</label>
									<input type="text" name="spr_id" value="{{ $edit->spr_id }}" class="form-control">
									@if($errors->has('spr_id'))
										<span class="help-block">
											<strong>{{ $errors->first('spr_id') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group">
									<a href="" class="btn btn-danger">RESET</a>
									<button type="submit" class="btn btn-primary">UPDATE</button>
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



