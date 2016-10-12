@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Customer
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ url('/customer') }}">Customer</a></li>
        <li class="active"><a href="{{ url('/customer/add') }}">Add Customer</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Customer</h3>
              <a href="{{ url('/customer') }}" class="btn btn-xs btn-success">
                <i class="fa fa-eye" aria-hidden="true"></i> Lihat data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('customer.add') }}" method="post">
              {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : ''}}">
                  <label for="firstname">First Name</label>
                  <input type="text" name="firstname" autofocus="autofocus" class="form-control" value="{{ old('firstname') }}">
                    @if($errors->has('name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('firstname') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                  <label for="lastname">Last Name</label>
                  <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}">
                    @if($errors->has('firstname'))
                      <span class="help-block">
                        <strong>{{ $errors->first('lastname') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('ktp_number') ? ' has-error' : '' }}">
                  <label for="ktp_number">KTP Number</label>
                  <input type="text" name="ktp_number" class="form-control" value="{{ old('ktp_number') }}">
                    @if($errors->has('ktp_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('ktp_number') }}</strong>
                      </span>
                    @endif
                </div>

                <!-- Date -->
              <div class="form-group{{ $errors->has('ktp_expired') ? ' has-error' : '' }}">
                <label>KTP Expired</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar">
                    </i>
                  </div>
                  <input type="text" name="ktp_expired" class="form-control pull-right" id="datepicker" value="{{old('ktp_expired')}}">
                @if ($errors->has('ktp_expired'))
                  <span class="help-block">
                    <strong>{{$errors->first('ktp_expired')}}</strong>
                  </span>
                @endif
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

                <div class="form-group{{ $errors->has('home_addres') ? ' has-error' : '' }}">
                  <label for="home_addres">Home Addres</label>
                  <input type="home_addres" name="home_addres" class="form-control" value="{{ old('home_addres') }}">
                    @if($errors->has('home_addres'))
                      <span class="help-block">
                        <strong>{{ $errors->first('home_addres') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('office_addres') ? ' has-error' : '' }}">
                  <label for="office_addres">Office Addres</label>
                  <input type="text" name="office_addres" class="form-control" value="{{ old('office_addres') }}">
                    @if($errors->has('office_addres'))
                      <span class="help-block">
                        <strong>{{ $errors->first('office_addres') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    @if($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('home_phone') ? ' has-error' : '' }}">
                  <label for="home_phone">Home Phone</label>
                  <input type="text" name="home_phone" class="form-control" value="{{ old('home_phone') }}">
                    @if($errors->has('home_phone'))
                      <span class="help-block">
                        <strong>{{ $errors->first('home_phone') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('office_phone') ? ' has-error' : '' }}">
                  <label for="office_phone">Office Phone</label>
                  <input type="text" name="office_phone" class="form-control"
                  value="{{ old('office_phone') }}">
                    @if($errors->has('office_phone'))
                      <span class="help-block">
                        <strong>{{ $errors->first('office_phone') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                  <label for="photo">Photo</label>
                  <input type="file" name="photo" class="form-control" value="{{ old('photo') }}">
                    @if($errors->has('photo'))
                      <span class="help-block">
                        <strong>{{ $errors->first('photo') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('relative_name') ? ' has-error' : '' }}">
                  <label for="relative_name">Relative Name</label>
                  <input type="text" name="relative_name" class="form-control" value="{{ old('relative_name') }}">
                    @if($errors->has('relative_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('relative_name') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('relative_phone') ? ' has-error' : '' }}">
                  <label for="relative_phone">Relative Phone</label>
                  <input type="text" name="relative_phone" class="form-control" value="{{ old('relative_phone') }}">
                    @if($errors->has('relative_phone'))
                      <span class="help-block">
                        <strong>{{ $errors->first('relative_phone') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('relative_ktp') ? ' has-error' : '' }}">
                  <label for="relative_ktp">Relative KTP</label>
                  <input type="text" name="relative_ktp" class="form-control" value="{{ old('relative_ktp') }}">
                    @if($errors->has('relative_ktp'))
                      <span class="help-block">
                        <strong>{{ $errors->first('relative_ktp') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('mk_application') ? ' has-error' : '' }}">
                  <label for="mk_application">MK Application</label>
                  <input type="text" name="mk_application" class="form-control" value="{{ old('mk_application') }}">
                    @if($errors->has('mk_application'))
                      <span class="help-block">
                        <strong>{{ $errors->first('mk_application') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('deposit_kredit') ? ' has-error' : '' }}">
                  <label for="deposit_kredit">Deposit Akad Kredit </label>
                  <input type="text" name="deposit_kredit" class="form-control" value="{{ old('deposit_kredit') }}">
                    @if($errors->has('deposit_kredit'))
                      <span class="help-block">
                        <strong>{{ $errors->first('deposit_kredit') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group">
                  <label>Priority Status</label>
                  <select name="priority_status" id="priority_status" class="form-control" required>
                    <option value="0">Not Priority</option>
                    <option value="1">Data Priority</option>
                    <option value="2">KPR Priority</option>
                    <option value="3">Down Payment Priority</option>
                    <option value="4">Building Priority</option>
                  </select>
                  <span class="help-block"></span>
                </div>
                <div class="form-group">
                  <button type="reset" class="btn btn-default">RESET</button>
                  <input type="submit" class="btn btn-primary pull-right" value="SIMPAN">

                </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>

@endsection
@push('script')
<script>
$( function() {
  $( "#datepicker" ).datepicker();
} );
</script>
@endpush