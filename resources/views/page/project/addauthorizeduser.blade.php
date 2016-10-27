@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Authorized user
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href='{{ URL::to("/project") }}'>Project</a></li>
        <li class="active"><a href='{{ URL::to("/project/authorizeduser/$data->id") }}'>Authorized user</a></li>
        <li class="active">Add Authorized user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Authorized user</h3>
              <a href='{{ URL::to("/project/authorizeduser/$data->id") }}' class="btn btn-xs btn-success pull-right">
                <i class="fa fa-eye" aria-hidden="true"></i> Lihat data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<form action="" method="post">
								<div class="form-group{{ $errors->has('project_manager') ? ' has-error' : '' }}">
									<label for="project_manager">Project Manager</label>
									<select name="project_manager" class="form-control">
										<option value=""></option>
										@foreach($project_manager as $data)
											<option value="{{ $data }}">{{ $data }}</option>
										@endforeach
									</select>
									@if($errors->has('project_manager'))
										<span class="help-block">
											<strong>{{ $errors->first('project_manager') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('project_manager_assistant') ? ' has-error' : '' }}">
									<label for="project_manager_assistant">Project Manager Assistant</label>
									<select name="project_manager_assistant" class="form-control">
										<option value=""></option>
										@foreach($project_manager_assistant as $data)
											<option value="{{ $data }}">{{ $data }}</option>
										@endforeach
									</select>
									@if($errors->has('project_manager_assistant'))
										<span class="help-block">
											<strong>{{ $errors->first('project_manager_assistant') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('finance_spv') ? ' has-error' : '' }}">
									<label for="finance_spv">Finance Spv</label>
									<select name="finance_spv" class="form-control">
										<option value=""></option>
										@foreach($staff_finance as $data)
											<option value="{{ $data }}">{{ $data }}</option>
										@endforeach
									</select>
									@if($errors->has('finance_spv'))
										<span class="help-block">
											<strong>{{ $errors->first('finance_spv') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('inhouse_spv') ? ' has-error' : '' }}">
									<label for="inhouse_spv">Inhouse Spv</label>
									<select name="inhouse_spv" class="form-control">
										<option value=""></option>
										@foreach($staff_inhouse as $data)
											<option value="{{ $data }}">{{ $data }}</option>
										@endforeach
									</select>
									@if($errors->has('inhouse_spv'))
										<span class="help-block">
											<strong>{{ $errors->first('inhouse_spv') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('field_executive') ? ' has-error' : '' }}">
									<label for="field_executive">Field Executive</label>
									<select name="field_executive" class="form-control">
										<option value=""></option>
										@foreach($field_executive as $data)
											<option value="{{ $data }}">{{ $data }}</option>
										@endforeach
									</select>
									@if($errors->has('field_executive'))
										<span class="help-block">
											<strong>{{ $errors->first('field_executive') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
									<label for="admin">Admin</label>
									<select name="admin" class="form-control">
										<option value=""></option>
										@foreach($admin as $data)
											<option value="{{ $data }}">{{ $data }}</option>
										@endforeach
									</select>
									@if($errors->has('admin'))
										<span class="help-block">
											<strong>{{ $errors->first('admin') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('legal') ? ' has-error' : '' }}">
									<label for="legal">Legal</label>
									<select name="legal" class="form-control">
										<option value="Legal">Legal</option>
										<option value="Illegal">Illegal</option>
									</select>
									@if($errors->has('legal'))
										<span class="help-block">
											<strong>{{ $errors->first('legal') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group">
									<button type="reset" class="btn btn-default">RESET</button>
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
								{!! csrf_field() !!}
							</form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
