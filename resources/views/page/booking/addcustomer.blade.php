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
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : ''}}">
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" autofocus="autofocus" class="form-control" value="{{ old('first_name') }}">
                    @if($errors->has('first_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                  <label for="last_name">Last Name</label>
                  <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                    @if($errors->has('last_name'))
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
              <div class="form-group{{ $errors->has('ktp_expire') ? ' has-error' : '' }}">
                <label>KTP Expired</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar">
                    </i>
                  </div>
                  <input type="text" name="ktp_expire" class="form-control pull-right col-xs-5" id="datepicker" value="{{old('ktp_expire')}}">
                @if ($errors->has('ktp_expire'))
                  <span class="help-block">
                    <strong>{{$errors->first('ktp_expire')}}</strong>
                  </span>
                @endif
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

                <div class="form-group{{ $errors->has('house_address') ? ' has-error' : '' }}">
                  <label for="house_address">Home Addres</label>
                  <input type="text" name="house_address" class="form-control" value="{{ old('house_address') }}">
                    @if($errors->has('house_address'))
                      <span class="help-block">
                        <strong>{{ $errors->first('house_address') }}</strong>
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

                <div class="form-group{{ $errors->has('house_phone') ? ' has-error' : '' }}">
                  <label for="house_phone">Home Phone</label>
                  <input type="text" name="house_phone" class="form-control" value="{{ old('house_phone') }}">
                    @if($errors->has('house_phone'))
                      <span class="help-block">
                        <strong>{{ $errors->first('house_phone') }}</strong>
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

                <div class="form-group{{ $errors->has('spouse_name') ? ' has-error' : '' }}">
                  <label for="spouse_name">Spouse Name </label>
                 <input type="text" name="spouse_name" class="form-control" value="{{ old('spouse_name') }}">
                    @if($errors->has('spouse_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('spouse_name') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('spouse_ktp') ? ' has-error' : '' }}">
                  <label for="spouse_ktp">Spouse KTP </label>
                 <input type="text" name="spouse_ktp" class="form-control" value="{{ old('spouse_ktp') }}">
                    @if($errors->has('spouse_ktp'))
                      <span class="help-block">
                        <strong>{{ $errors->first('spouse_ktp') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  <label for="image">Photo</label>
                  <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                    @if($errors->has('image'))
                      <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('bank_account_number') ? ' has-error' : '' }}">
                  <label for="bank_account_number">Bank Account Number </label>
                  <input type="text" name="bank_account_number" class="form-control" value="{{ old('bank_account_number') }}">
                    @if($errors->has('bank_account_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('bank_account_number') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('btn_id') ? ' has-error' : '' }}">
                  <label for="btn_id">BTN Id </label>
                  <input type="text" name="btn_id" class="form-control" value="{{ old('btn_id') }}">
                    @if($errors->has('btn_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('btn_id') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('btn_account_number') ? ' has-error' : '' }}">
                  <label for="btn_account_number">BTN Account Number</label>
                  <input type="text" name="btn_account_number" class="form-control" value="{{ old('btn_account_number') }}">
                    @if($errors->has('btn_account_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('btn_account_number') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('btn_branch') ? ' has-error' : '' }}">
                  <label for="btn_branch">BTN Branch</label>
                  <input type="text" name="btn_branch" class="form-control" value="{{ old('btn_branch') }}">
                    @if($errors->has('btn_branch'))
                      <span class="help-block">
                        <strong>{{ $errors->first('btn_branch') }}</strong>
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

                <div class="form-group{{ $errors->has('deposit_loan_akad') ? ' has-error' : '' }}">
                  <label for="deposit_loan_akad">Deposit Akad Kredit </label>
                  <input type="text" name="deposit_loan_akad" class="form-control" value="{{ old('deposit_loan_akad') }}">
                    @if($errors->has('deposit_loan_akad'))
                      <span class="help-block">
                        <strong>{{ $errors->first('deposit_loan_akad') }}</strong>
                      </span>
                    @endif
                </div>
              
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                  <label for="status">Status </label>
                  <input type="text" name="status" class="form-control" value="{{ old('status') }}">
                    @if($errors->has('status'))
                      <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                      </span>
                    @endif
                </div>

              <div class="form-group{{ $errors->has('priority_status') ? ' has-error' : '' }}">
                  <label for="priority_status">Priority Status</label>
               <input type="text" name="priority_status" class="form-control" value="{{ old('priority_status') }}">
                    @if($errors->has('priority_status'))
                      <span class="help-block">
                        <strong>{{ $errors->first('priority_status') }}</strong>
                      </span>
                    @endif
                </div>
              <!--
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" id="status" class="form-control" required>
                    <option value="0">Active</option>
                    <option value="1">Nonactive </option>
                  </select>
                  <span class="help-block"></span>
                </div>
                <div class="form-group">
                  <label>Priority Status</label>
                  <select name="priority_status" id="priority_status" class="form-control" required>
                    <option value="0">Not Priority</option>
                    <option value="1">Data Priority</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              -->

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
