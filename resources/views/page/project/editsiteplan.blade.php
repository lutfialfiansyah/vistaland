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
        <li class="active"><a href="">Edit Siteplan</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Edit Siteplan</h3>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">  
           
              <form action='{{ url("project/siteplan/$edit->project_id/update/$edit->id") }}' method="post" enctype="multipart/form-data">
              {!! csrf_field() !!}
                <div class="form-group">
                  <label for="foto">Upload Foto</label>
                  <input type="file" name="file">
                </div>
                <div class="form-group">
                  <a href="" class="btn btn-danger">BATAL</a>
                  <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
              </form>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
@endsection

