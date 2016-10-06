@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="row">
        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Profile</h3> 
            </div>

            <!-- /.box-header -->
            
          <form role="form" method="post">
             <table>
              <div class="box-body">
                <div class="form-group">
                  <label for="nameuser">Name</label>
                  <input type="email" class="form-control" id="nameuser" placeholder="Enter name" value="{{$tampiledit->name}}" disabled>
                </div>
                <div class="form-group">
                  <label for="editemailuser">Email address</label>
                  <input type="email" class="form-control" id="editemailuser" placeholder="Enter email" value="{{$tampiledit->email}}">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="email" class="form-control" id="username" placeholder="Enter username" value="{{$tampiledit->username}}" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input name="updateuser" type="submit" class="btn btn-primary btn-sm" value="Update">
              </div>
              </table>
            </form>
          </div>
          </div>

    </section>
  
@endsection
