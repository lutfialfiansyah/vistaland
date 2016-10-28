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
        <li class="active"><a href='{{ URL::to("/project/authorizeduser/$edit->project_id") }}'>Authorized user</a></li>
        <li class="active">Edit Authorized user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Authorized user</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<form action="{{ URL::to('project/authorizeduser/'.$edit->project_id.'/update',$edit->id) }}" method="post">
								<div class="form-group{{ $errors->has('project_manager') ? ' has-error' : '' }}">
									<label for="project_manager">Project Manager</label>
									<select name="project_manager" class="form-control">
										<option value="{{ $edit->project_manager }}" selected="selected">{{ $edit->project_manager }}</option>
										<option disabled="disabled"></option>
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
										<option value="{{ $edit->project_manager_assistant }}" selected="selected">
										{{ $edit->project_manager_assistant }}</option>
										<option disabled="disabled"></option>
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
										<option value="{{ $edit->finance_spv }}" selected="selected">{{ $edit->finance_spv }}</option>
										<option disabled="disabled"></option>
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
										<option value="{{ $edit->inhouse_spv }}" selected="selected">{{ $edit->inhouse_spv }}</option>
										<option disabled="disabled"></option>
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
										<option value="{{ $edit->field_executive }}" selected="selected">{{ $edit->field_executive }}</option>
										<option disabled="disabled"></option>
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
										<option value="{{ $edit->admin }}" selected="selected">{{ $edit->admin }}</option>
										<option disabled="disabled"></option>
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
										<option value="{{ $edit->legal }}" selected="selected">{{ $edit->legal }}</option>
										<option disabled="disabled"></option>
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
									<a href="{{ route('authorizeduser.view',$edit->project_id) }}" class="btn btn-danger" onclick="return confirm('Click Ok untuk membatalkan !')">BATAL</a>
									<button type="submit" class="btn btn-primary">UPDATE</button>
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
