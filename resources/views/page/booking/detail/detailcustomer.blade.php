@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Customer
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active fa fa-user">{{$costomer->id}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
              <a href="{{ url('customer/edit') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Edit Data Customer
              </a>

              <a href="{{ url('customer/detail') }}" class="btn btn-xs btn-success">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Name</th>
                  <td>
                    {{$customer->first_name}}
                  </td>
                </tr>
                <tr>
                  <th>KTP</th>
                  <td>
                    {{$customer->ktp_number}}
                  </td>
                </tr>
                <tr>
                  <th>Home Addres</th>
                  <td>
                    {{$customer->house_addres}}
                  </td>
                </tr>
                <tr>
                  <th>Office Addres</th>
                  <td>
                    {{$customer->office_addres}}
                  </td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>
                    {{$customer->email}}
                  </td>
                </tr>
                <tr>
                  <th>Home Phone</th>
                  <td>
                    {{$customer->house_phone}}
                  </td>
                </tr>
                <tr>
                  <th>Office Phone</th>
                  <td>
                    {{$customer->office_phone}}
                  </td>
                </tr>
                <tr>
                  <th>Relative Name</th>
                  <td>
                    {{$customer->relative_name}}
                  </td>
                </tr>
                <tr>
                  <th>Relative Phone</th>
                  <td>
                    {{$customer->relative_phone}}
                  </td>
                </tr>
                <tr>
                  <th>Relative KTP</th>
                  <td>
                    {{$customer->relative_ktp}}
                  </td>
                </tr>
                <tr>
                  <th>Spuose Name</th>
                  <td>
                    {{$customer->spouse_name}}
                  </td>
                </tr>
                <tr>
                  <th>Spouse KTP</th>
                  <td>
                    {{$customer->spouse_ktp}}
                  </td>
                </tr>
                <tr>
                  <th>Photo</th>
                  <td>
                    {{$customer->image}}
                  </td>
                </tr>
                <tr>
                  <th>Bank</th>
                  <td>
                    {{$customer->bank_account_number}}
                  </td>
                </tr>
                <tr>
                  <th>BTN Id</th>
                  <td>
                    {{$customer->btn_id}}
                  </td>
                </tr>
                <tr>
                  <th>Btn Account Number</th>
                  <td>
                    {{$customer->btn_account_number}}
                  </td>
                </tr>
                <tr>
                  <th>BTN Branch</th>
                  <td>
                    {{$customer->btn_branch}}
                  </td>
                </tr>
                <tr>
                  <th>MK Application</th>
                  <td>
                    {{$customer->mk_application}}
                  </td>
                </tr>
                                <tr>
                  <th>Deposit Akad Kredit</th>
                  <td>
                    {{$customer->deposit_load_akad}}
                  </td>
                </tr>
                                <tr>
                  <th>Status</th>
                  <td>
                    {{$customer->status}}
                  </td>
                </tr>
                <tr>
                  <th>Priority Status</th>
                  <td>
                    {{$customer->priority_status}}
                  </td>
                </tr>
              </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
<script src="{{ asset('dist/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
