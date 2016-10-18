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
            	@if(Session::has('Pesan'))
            		<div class="alert alert-success">{{ Session::get('Pesan') }}</div>
            	@endif
              <form action="{{ route('formpayment.add') }}" method="post" >
              {!! csrf_field() !!}

              <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label for="type">Type</label>
                <select name="type" class="form-control">
                  <option disabled="disabled" selected>Choose Type</option>
                  <option disabled="disabled"></option>
                  <option value="booking_free">Booking Free</option>
                  <option value="change_name">Change Name</option>
                  <option value="move_kavling">Move Kavling</option>
                  <option value="nup">NUP</option>
                </select>
								@if($errors->has('type'))
									<span class="help-block">
										<strong>{{ $errors->first('type') }}</strong>
									</span>
								@endif
              </div>
              <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                <label for="customer_id">Customer</label>
                <select name="customer_id" class="form-control">
									<option value=""></option>
									@if(count($customer) == 0)
										<option disabled="disabled">No data customer</option>
									@else
										@foreach($customer as $data)
											<option value="{{ $data->id }}">{{ $customer->name }}</option>
										@endforeach
									@endif
                </select>
								@if($errors->has('customer_id'))
									<span class="help-block">
										<strong>{{ $errors->first('customer_id') }}</strong>
									</span>
								@endif
              </div>
              <div class="form-group{{ $errors->has('method') ? ' has-error' : '' }}">
                <label for="method">Method</label>
                <select name="method" class="form-control">
									<option value="cash">Cash</option>
									<option value="debit">Debit</option>
									<option value="transfer">Transfer</option>
                </select>
								@if($errors->has('method'))
									<span class="help-block">
										<strong>{{ $errors->first('method') }}</strong>
									</span>
								@endif
              </div>
              <div class="form-group{{ $errors->has('bank_reference') ? ' has-error' : '' }}">
	                <label for="bank_reference">Bank reference</label>
	                <input type="text" name="bank_reference" class="form-control">
								@if($errors->has('bank_reference'))
									<span class="help-block">
										<strong>{{ $errors->first('bank_reference') }}</strong>
									</span>
								@endif
              </div>
              <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control">
								@if($errors->has('description'))
									<span class="help-block">
										<strong>{{ $errors->first('description') }}</strong>
									</span>
								@endif
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


