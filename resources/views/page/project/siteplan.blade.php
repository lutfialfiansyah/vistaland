@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="{{ route('project.view') }}">Project</li></a>
        <li class="active"><a href="">Siteplan</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Siteplan</h3>
              <div class="box-tools pull-right"><a href='{{ route("siteplan.add",$project->id) }}' class="btn btn-xs btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Siteplan</a>
                @if(count($project->siteplan) > 0)
                  <a href='{{ url("project/siteplan/$project->id/hapus") }}' class="btn btn-xs btn-danger"
                  onclick="return confirm('Apakah Anda yakin ?')">
                  <i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                @endif
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">  
            <div class="row">
                <div class="col-md-12">
          @if(count($project->siteplan) == 0)
            <p>No picture</p>
          @else
            @foreach($project->siteplan as $data)
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img src='{{ asset("image/$data->image") }}' class="img-responsive" alt="Responsive image">
                </a>
                  <div class="btn-group btn-group-xs">
                  <a href='{{ url("project/siteplan/$project->id/hapus/$data->id") }}' class="btn btn-xs btn-danger">hapus</a>
                  <a href='{{ url("project/siteplan/$project->id/edit/$data->id") }}' class="btn btn-xs btn-warning">Edit</a>
                </div>
             </div>
            @endforeach
             
          @endif
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
<script src="{{ asset('dist/sweetalert.min.js')}}"></script>
@include('sweet::alert') 
@endsection

