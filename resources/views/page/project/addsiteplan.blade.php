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
        <li class="active"><a href="{{ route('siteplan.view',$project->id) }}">Siteplan</li></a>
        <li class="active"><a href="">Add Siteplan</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Siteplan</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if(Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }} Click<a href="{{ route('siteplan.view',$project->id) }}"> disini</a> untuk melihat foto !</div>
            @endif
            @if($errors->has('image'))
              <div class="alert alert-danger">{{ $errors->first('image') }}
              <a href="" class="btn btn-xs btn-danger pull-right">x</a>
              </div>
            @endif

              <form action="{{ route('siteplan.add',$project->id) }}"  class="dropzone" id="addImages">
              {!! csrf_field() !!}
              </form>
              <br>
							<strong>
              	<li>File Must type Image</li>
              	<li>Format Image must : JPG, JPEG, PNG</li>
              	<li>Max FileSize 2 Mb</li>
							</strong>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     </div>
    </section>
@endsection
