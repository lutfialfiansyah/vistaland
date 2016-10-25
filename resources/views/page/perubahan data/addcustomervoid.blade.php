@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('customervoid.view') }}">Customer Void</li></a>
        <li class="active"><a href="">Add Customer Void</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Add Customer Void</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
            	@if(Session::has('success'))
            		<div class="alert alert-success">{{ Session::get('success') }}</div>
            	@endif
              <form action="" method="post" >
              {!! csrf_field() !!}
				<div class="form-group {{ $errors->has('customer') ? ' has-error' : ''}}">
                  <label for="customer">Customer</label>
                  <select name="customer" id="customer" class="form-control">
                    <option value=""></option>
                @foreach($customervoid as $key => $value)
				<option value="{{ $key }}">{{ $key." - ".$value }}</option>
				@endforeach
                  </select>
                  @if($errors->has('customer'))
                  <span class="help-block">
                    <strong>{{ $errors->first('customer')}}</strong>
                  </span><span id="select2-customer-5o-container" class="select2-selection__rendered" title="Choose One">Choose One</span>
                  @endif
                  </div>
			
				<div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
					<label for="reason">Reason</label>
						<input type="text" name="reason" value="{{ old('reason') }}" class="form-control">
							@if($errors->has('reason'))
								<span class="help-block">
									<strong>{{ $errors->first('reason') }}</strong>
								</span>
							@endif
				</div>
								<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
									<label for="status">Status</label>
									<select name="status"  class="form-control">
										<option value=""></option>
										<option value="Pending">Pending</option>
										<option value="Approved">Approved</option>
										<option value="Rejected">Rejected</option>
									</select>
									@if($errors->has('status'))
										<span class="help-block">
											<strong>{{ $errors->first('status') }}</strong>
										</span>
									@endif
								</div>
							
								<div class="form-group">
									<button type="reset" class="btn btn-default">RESET</button>
									<button type="submit" class="btn btn-primary pull-right">SIMPAN</button>
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
@push('script')
<script>
      $(document).ready(function () {
        $("#customer").select2({
          placeholder: "Chose One"
          });
      });
</script>
@endpush
