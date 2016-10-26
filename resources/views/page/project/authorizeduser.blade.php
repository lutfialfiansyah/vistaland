@if(count($data->authorizeduser) == 0)
  	<script type="text/javascript">
  		document.location.href="{{ route('authorizeduser.add',$data->id) }}";
  	</script>
@else
@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Authorizeduser
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::to('/project') }}">Project</a></li>
        <li class="active">Authorizeduser</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Authorizeduser</h3>

              <a href="{{ URL::to('project/authorizeduser',$data->id) }}" class="btn btn-xs btn-success ">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Project Manager</th>
                  <td>{{ $data->authorizeduser->project_manager }}</td>
                </tr>
                <tr>
                	<th>Project Manager Assistant</th>
                	<td>{{ $data->authorizeduser->project_manager_assistant }}</td>
                </tr>
                <tr>
                	<th>Staff Finance</th>
                	<td>{{ $data->authorizeduser->finance_spv }}</td>
                </tr>
                <tr>
                	<th>Staff Inhouse</th>
                	<td>{{ $data->authorizeduser->inhouse_spv }}</td>
                </tr>
                <tr>
                	<th>Field Executive</th>
                	<td>{{ $data->authorizeduser->field_executive }}</td>
                </tr>
                <tr>
                	<th>Admin</th>
                	<td>{{ $data->authorizeduser->admin }}</td>
                </tr>
              </thead>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
<script src="{{ asset('dist/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
@endif