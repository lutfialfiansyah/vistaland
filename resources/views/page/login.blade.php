<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <link rel="icon" type="image/png" href="{{ asset('home.png') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ asset('font-awesome-4.6.3/css/font-awesome.min.css') }}">
</head>
<body>
<div class="container">
  <div class="row"> 
   <div class="col-md-6 col-md-offset-3">
          
        <div class="box box-primary bawah">
            <div class="box-header with-border">
              <h3 class="box-title">Login</h3>
            </div>
           
          <form role="form">
              <div class="box-body">
                <div class="form-group{{ $errors->has('username') ? ' has-error' : ''}}">
                  <label for="exampleInputEmail1">Username</label>
                  <div class="input-group">  
                    <div class="input-group-addon">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter username">
                  </div>
                    @if($errors->has('username'))
                      <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                  <label for="exampleInputPassword1">Password</label>
                  <div class="input-group">  
                    <div class="input-group-addon">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                    @if($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">
                <i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
              </div>
          </form>

    </div>
  </div>
</div>
</body>
</html>

