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
        <div class="col-md-12">
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
                  <input type="name" class="form-control" id="nameuser" placeholder="Enter name" value="{{$tampiledit->name}}" disabled>
                </div>
                <div class="form-group">
                  <label for="editemailuser">Email address</label>
                  <input type="email" class="form-control" id="editemailuser" placeholder="Enter email" value="{{$tampiledit->email}}">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Enter username" value="{{$tampiledit->username}}" disabled>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input name="updateuser" type="submit" class="btn btn-primary btn-sm pull-right" value="Submit">
              </div>
              </table>
            </form>
              <!-- Default box -->
    <form role="form" method="post">
           <div class="box box-default collapsed-box">
        <div class="box-header with-border">
            <h2 class="box-title">Change Password</h2>
            <div class="box-tools pull-left">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
                
            </div>
        </div>
        <div style="display: none;" class="box-body">
            <div class="form-group">
                  <label for="cpass">Current password</label>
                  <input type="password" name="oldpass" autofocus class="form-control" id="cpass" placeholder="enter old password">
                </div>
            <div class="form-group">
                  <label for="npass">New password</label>
                  <input type="password" name="newpass" class="form-control" id="npass" placeholder="enter new password">
            </div>
            <div class="box-footer">
                <input name="updatepass" type="submit" class="btn btn-primary btn-sm pull-right" value="Update">
              </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->   
          </form>
          </div>
          <!-- /.row -->          
        
    </section>

@endsection