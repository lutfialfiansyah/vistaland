<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <link rel="icon" type="image/png" href="{{ asset('home.png') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/sweetalert.css')}}">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ asset('font-awesome-4.6.3/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/keyframes.css') }}">
</head>
<body>

<div class="container">
  <div class="row">
   <div class="col-md-6 col-md-offset-3">

        <div class="box box-primary bawah">
            <div class="box-header with-border">
              <h3 class="box-title">Login Vistaland</h3>
            </div>
          <form role="form" action="{{ url('/login') }}" method="post">
          {!! csrf_field() !!}
              <div class="box-body">
              @if(Session::has('pesanError'))
                <div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                {{ Session::get('pesanError') }}</div>
              @endif
                <div class="form-group{{ $errors->has('username') ? ' has-error' : ''}}">
                  <label for="username">Username</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <input type="text" name="username" autofocus class="form-control" id="username" placeholder="Enter username" value="{{ old('username') }}">
                  </div>
                    @if($errors->has('username'))
                      <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
                  </div>
                    @if($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                </div>
              </div>

              <div class="box-header">
                <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12" >
                <i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
              </div>

              <script src="{{ asset('dist/sweetalert.min.js')}}"></script>
              @include('sweet::alert')
          </form>

    </div>
  </div>
</div>
</body>
</html>
