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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Profile</h3>
            </div>

            <!-- /.box-header -->

              <div class="box-body">
              @if(Session::has('PesanSucces'))
              	<div class="alert alert-success">{{ Session::get('PesanSucces') }}</div>
              @endif
              @if(count($errors) > 0)
              	<div class="alert alert-danger">
              	<ul>
              		@foreach($errors->all() as $error)
              			<li>{{ $error }}</li>
              		@endforeach
              	</ul>
              	</div>
              @endif
               <form role="form" action="{{ route('profile.update') }}"  method="post">
               {!! csrf_field() !!}
                <div class="form-group">
                  <label for="nameuser">Name</label>
                  <input type="name" class="form-control" name="name" id="nameuser" placeholder="Enter name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                  <label for="editemailuser">Email address</label>
                  <input type="email" class="form-control" name="email" id="editemailuser" placeholder="Enter email" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="{{ Auth::user()->username }}" disabled="disabled">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" class="btn btn-primary btn-sm pull-right" value="Update">
              </div>

            </form>

   				 </div><!-- /.box -->
          </div>
          <!-- /.row -->
          </div>
                    <!-- Default box -->
         	<div class="row">
        		<div class="col-md-12">
	           <div class="box box-primary collapsed-box">
	      		 	 <div class="box-header with-border">
	            		<h2 class="box-title">Change Password</h2>
			            <div class="box-tools pull-left">
			                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
			            </div>
	        			</div>

	        		<div style="display: none;" class="box-body">
	        		<form role="form" method="post" action="{{ route('profile.changepassword') }}">
	        		{!! csrf_field() !!}
	            <div class="form-group">
	                  <label for="cpass">Current password</label>
	                  <input type="password" name="oldpass" autofocus class="form-control" id="cpass" placeholder="enter old password">
	                </div>
	            <div class="form-group">
	                  <label for="npass">New password</label>
	                  <input type="password" name="newpass" class="form-control" id="npass" placeholder="enter new password">
	            </div>
	            <div class="form-group">
	                  <label for="npass">Confirm password</label>
	                  <input type="password" name="confirm" class="form-control" id="npass" placeholder="enter confirm password">
	            </div>
	           </div><!-- /.box-body -->

            <div class="box-footer">
                <input type="submit" class="btn btn-primary btn-sm pull-right" value="Update">
            </div>
	          </form>

	       		 </div>
	       		</div>
	      	</div>
    </section>

@endsection
