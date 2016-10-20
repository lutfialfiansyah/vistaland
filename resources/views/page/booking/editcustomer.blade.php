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
        <li class="active"><a href="#">Edit</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Customer</h3>
              <a href="{{ url('/customer') }}" class="btn btn-xs btn-success">
                <i class="fa fa-eye" aria-hidden="true"></i> Lihat data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('customer.update',$edit->id) }}" method="post">
              {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : ''}}">
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" autofocus="autofocus" class="form-control" value="{{ $edit->first_name }}">
                    @if($errors->has('first_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                  <label for="last_name">Last Name</label>
                  <input type="text" name="last_name" class="form-control" value="{{ $edit->last_name }}">
                    @if($errors->has('last_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('ktp_number') ? ' has-error' : '' }}">
                  <label for="ktp_number">KTP Number</label>
                  <input type="text" name="ktp_number" class="form-control" value="{{ $edit->ktp_number }}">
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
                  <input type="text" name="ktp_expire" class="form-control pull-right col-xs-5" id="datepicker" value="{{$edit->ktp_expire}}">
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
                  <input type="text" name="house_address" class="form-control" value="{{ $edit->house_address }}">
                    @if($errors->has('house_address'))
                      <span class="help-block">
                        <strong>{{ $errors->first('house_address') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('office_address') ? ' has-error' : '' }}">
                  <label for="office_address">Office Address</label>
                  <input type="text" name="office_address" class="form-control" value="{{ $edit->office_address }}">
                    @if($errors->has('office_address'))
                      <span class="help-block">
                        <strong>{{ $errors->first('office_address') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ $edit->email }}">
                    @if($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('house_phone') ? ' has-error' : '' }}">
                  <label for="house_phone">Home Phone</label>
                  <input type="text" name="house_phone" class="form-control" value="{{ $edit->house_phone }}">
                    @if($errors->has('house_phone'))
                      <span class="help-block">
                        <strong>{{ $errors->first('house_phone') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('office_phone') ? ' has-error' : '' }}">
                  <label for="office_phone">Office Phone</label>
                  <input type="text" name="office_phone" class="form-control"
                  value="{{ $edit->office_phone }}">
                    @if($errors->has('office_phone'))
                      <span class="help-block">
                        <strong>{{ $errors->first('office_phone') }}</strong>
                      </span>
                    @endif
                </div>


                <div class="form-group{{ $errors->has('relative_name') ? ' has-error' : '' }}">
                  <label for="relative_name">Relative Name</label>
                  <input type="text" name="relative_name" class="form-control" value="{{ $edit->relative_name }}">
                    @if($errors->has('relative_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('relative_name') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('relative_phone') ? ' has-error' : '' }}">
                  <label for="relative_phone">Relative Phone</label>
                  <input type="text" name="relative_phone" class="form-control" value="{{ $edit->relative_phone }}">
                    @if($errors->has('relative_phone'))
                      <span class="help-block">
                        <strong>{{ $errors->first('relative_phone') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('relative_ktp') ? ' has-error' : '' }}">
                  <label for="relative_ktp">Relative KTP</label>
                  <input type="text" name="relative_ktp" class="form-control" value="{{ $edit->relative_ktp }}">
                    @if($errors->has('relative_ktp'))
                      <span class="help-block">
                        <strong>{{ $errors->first('relative_ktp') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('spouse_name') ? ' has-error' : '' }}">
                  <label for="spouse_name">Spouse Name </label>
                 <input type="text" name="spouse_name" class="form-control" value="{{ $edit->spouse_name }}">
                    @if($errors->has('spouse_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('spouse_name') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('spouse_ktp') ? ' has-error' : '' }}">
                  <label for="spouse_ktp">Spouse KTP </label>
                 <input type="text" name="spouse_ktp" class="form-control" value="{{ $edit->spouse_ktp }}">
                    @if($errors->has('spouse_ktp'))
                      <span class="help-block">
                        <strong>{{ $errors->first('spouse_ktp') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  <label for="image">Photo</label>
                  <input type="file" name="image" class="form-control" value="{{ $edit->image }}">
                    @if($errors->has('image'))
                      <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('bank_account_number') ? ' has-error' : '' }}">
                  <label for="bank_account_number">Bank Account Number </label>
                <input type="text" name="bank_account_number" class="form-control" value="{{ $edit->bank_account_number }}">
                    @if($errors->has('bank_account_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('bank_account_number') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('btn_id') ? ' has-error' : '' }}">
                  <label for="btn_id">BTN Id </label>
                  <input type="text" name="btn_id" class="form-control" value="{{ $edit->btn_id }}">
                    @if($errors->has('btn_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('btn_id') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('btn_account_number') ? ' has-error' : '' }}">
                  <label for="btn_account_number">BTN Account Number</label>
                  <input type="text" name="btn_account_number" class="form-control" value="{{ $edit->btn_account_number }}">
                    @if($errors->has('btn_account_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('btn_account_number') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('btn_branch') ? ' has-error' : '' }}">
                  <label for="btn_branch">BTN Branch</label>
                  <input type="text" name="btn_branch" class="form-control" value="{{ $edit->btn_branch }}">
                    @if($errors->has('btn_branch'))
                      <span class="help-block">
                        <strong>{{ $errors->first('btn_branch') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('mk_application') ? ' has-error' : '' }}">
                  <label for="mk_application">MK Application</label>
                  <input type="text" name="mk_application" class="form-control" value="{{ $edit->mk_application }}">
                    @if($errors->has('mk_application'))
                      <span class="help-block">
                        <strong>{{ $errors->first('mk_application') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('deposit_loan_akad') ? ' has-error' : '' }}">
                  <label for="deposit_loan_akad">Deposit Akad Kredit </label>
                  <input type="text" name="deposit_loan_akad" class="form-control" value="{{ $edit->deposit_loan_akad}}">
                    @if($errors->has('deposit_loan_akad'))
                      <span class="help-block">
                        <strong>{{ $errors->first('deposit_loan_akad') }}</strong>
                      </span>
                    @endif
                </div>
              
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                  <label for="status">Status</label>
                  <select name="status" id="status" class="form-control" value="{{$edit->status}}">
                    <option value=""></option>
                    <option value="Active">Active</option>
                    <option value="Nonactive">Nonactive </option>
                  </select>
                   @if($errors->has('status'))
                  <span class="help-block">
                    <strong>{{$errors->first('status')}}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('priority_status') ? ' has-error' : '' }}">
                  <label for="priority_status">Priority Status</label>
                  <select name="priority_status" id="priority_statusi" class="form-control" value="{{$edit->priority_status}}">
                    <option value="Not Priority">Not Priority</option>
                    <option value="Down Payment">Down Payment</option>
                  </select>
                   @if($errors->has('priority_status'))
                  <span class="help-block">
                    <strong>{{$errors->first('priority_status')}}</strong>
                  </span>
                  @endif
                </div>              <!--
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
                  <input type="submit" class="btn btn-primary pull-right" value="Update">
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
