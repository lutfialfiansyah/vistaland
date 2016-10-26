@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Users
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ URL::to('/users') }}">Users</a></li>
        <li class="active"><a href="{{ URL::to('/users/add') }}">Add Users</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Users</h3>
              <a href="{{ URL::to('/users') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-eye" aria-hidden="true"></i> Lihat data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if(Session::has('success'))
            		<div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
              <form action="{{ route('official.add') }}" method="post">
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="name">Name</label>
								<input type="text" name="name" value="{{ old('name') }}" class="form-control">
									@if($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email">Email</label>
								<input type="email" name="email" value="{{ old('email') }}" class="form-control">
									@if($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
							</div>
							<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
								<label for="status">Status</label>
								<select name="status" class="form-control">
									<option value="Active">Active</option>
									<option value="Inactive">Inactive</option>
								</select>
									@if($errors->has('status'))
										<span class="help-block">
											<strong>{{ $errors->first('status') }}</strong>
										</span>
									@endif
							</div>
							<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
								<label for="role">Role</label>
								<select name="role" class="form-control">
									<option value="Project Manager">Project Manager</option>
									<option value="Project Manager Assistant">Project Manager Assistant</option>
									<option value="Staff Finance">Staff Finance</option>
									<option value="Staff Inhouse">Staff Inhouse</option>
									<option value="Field Executive">Field Executive</option>
									<option value="Admin">Admin</option>
								</select>
									@if($errors->has('role'))
										<span class="help-block">
											<strong>{{ $errors->first('role') }}</strong>
										</span>
									@endif
							</div>
							<div class="form-group">
								<button type="reset" class="btn btn-default">RESET</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
              {!! csrf_field() !!}
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>

@endsection
