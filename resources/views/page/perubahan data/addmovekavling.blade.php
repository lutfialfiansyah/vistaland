@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('movekavling.view') }}">Move Kavling</li></a>
        <li class="active"><a href="">Add Move Kavling</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Add Move Kavling</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
            	@if(Session::has('success'))
            		<div class="alert alert-success">{{ Session::get('success') }}</div>
            	@endif
              <form action="" method="post" >
              {!! csrf_field() !!}
				<div class="form-group {{ $errors->has('kavling_from') ? ' has-error' : ''}}">
                  <label for="kavling_from">Kavling From</label>
                  <select name="kavling_from" id="kavlingfrom" class="form-control">
                    <option value=""></option>
                @foreach($kavling as $key => $value)
				<option value="{{ $key }}">{{ $key." - ".$value }}</option>
				@endforeach
                  </select>
                  @if($errors->has('k avling_from'))
                  <span class="help-block">
                    <strong>{{ $errors->first('kavling_from')}}</strong>
                  </span><span id="select2-customer-5o-container" class="select2-selection__rendered" title="Choose One">Choose One</span>
                  @endif
                  </div>
				<div class="form-group {{ $errors->has('kavling_to') ? ' has-error' : ''}}">
                  <label for="kavling_to">Kavling To</label>
                  <select name="kavling_to" id="kavlingto" class="form-control">
                    <option value=""></option>
                @foreach($kavling as $key => $value)
				<option value="{{ $key }}">{{ $key." - ".$value }}</option>
				@endforeach
                  </select>
                  @if($errors->has('kavling_to'))
                  <span class="help-block">
                    <strong>{{ $errors->first('kavling_to')}}</strong>
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
        $("#kavlingfrom").select2({
          placeholder: "Chose One"
          });
        $("#kavlingto").select2({
          placeholder: "Chose One"
          });
      });
</script>
@endpush
