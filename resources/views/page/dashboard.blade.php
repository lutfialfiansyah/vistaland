@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Dashboard
        <a class="btn btn-success btn-xs" href="{{url('/project/add')}}">
        <i class="fa fa-plus-circle"></i>Add Project
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- Info boxes -->
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">BOOKMARKS</span>
              <span class="info-box-number">41,410</span>
              <!-- The progress section is optional -->
              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                50% Increase in 30 Days
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
              <!-- The progress section is optional -->
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">EVENTS</span>
              <span class="info-box-number">41,410</span>
              <!-- The progress section is optional -->
              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                40% Increase in 30 Days
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">COMMENTS</span>
              <span class="info-box-number">41,410</span>
              <!-- The progress section is optional -->
              <div class="progress">
                <div class="progress-bar" style="width: 5%"></div>
              </div>
              <span class="progress-description">
                5% Increase in 30 Days
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class=" row">
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>10</h3>
<p>New Orders</p>
</div>
<div class="icon">
<i class="fa fa-suitcase"></i>
</div>
<a class="small-box-footer" href="#">
Select This Project 
<i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
</div>
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->



    </section>
  
@endsection