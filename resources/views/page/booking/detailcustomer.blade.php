@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Customer
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('/customer')}}">Customer</a></li>
        <li class="active"><a href="#">{{ $detailcustomer->first_name.' '.$detailcustomer->last_name}}</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
              <a href="{{ route('customer.edit',$detailcustomer->id)}}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-pencil" aria-hidden="true"></i> Edit Data {{$detailcustomer->first_name}}
              </a>

              <a href="{{ url('customer/detail',$detailcustomer->id) }}" class="btn btn-xs btn-success">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <form action="{{ route('customer.detail',$detailcustomer->id) }}" method="get">
              {!! csrf_field() !!}
              <div class="table-responsive">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <tbody>
                <tr>
                  <th>Name</th>
                  <td>
                    {{$detailcustomer->first_name.' '.$detailcustomer->last_name}}
                  </td>
                </tr>
                <tr>
                  <th>KTP</th>
                  <td>
                    {{$detailcustomer->ktp_number}}
                  </td>
                </tr>
                <tr>
                  <th>Home Address</th>
                  <td>
                    {{$detailcustomer->house_address}}
                  </td>
                </tr>
                <tr>
                  <th>Office Address</th>
                  <td>
                    {{$detailcustomer->office_address}}
                  </td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>
                    <a href="https://accounts.google.com/Login#identifier" target="output">{{$detailcustomer->email}}</a>
                  </td>
                </tr>
                <tr>
                  <th>Home Phone</th>
                  <td>
                    {{$detailcustomer->house_phone}}
                  </td>
                </tr>
                <tr>
                  <th>Office Phone</th>
                  <td>
                    {{$detailcustomer->office_phone}}
                  </td>
                </tr>
                <tr>
                  <th>Relative Name</th>
                  <td>
                    {{$detailcustomer->relative_name}}
                  </td>
                </tr>
                <tr>
                  <th>Relative Phone</th>
                  <td>
                    {{$detailcustomer->relative_phone}}
                  </td>
                </tr>
                <tr>
                  <th>Relative KTP</th>
                  <td>
                    {{$detailcustomer->relative_ktp}}
                  </td>
                </tr>
                <tr>
                  <th>Spuose Name</th>
                  <td>
                    {{$detailcustomer->spouse_name}}
                  </td>
                </tr>
                <tr>
                  <th>Spouse KTP</th>
                  <td>
                    {{$detailcustomer->spouse_ktp}}
                  </td>
                </tr>
                <tr>
                  <th>Photo</th>
                  <td>
                    <img src='{{ asset("image/$detailcustomer->image")}}' height="70" width="70" class="img-rounded" align="center">
                  </td>
                </tr>
                <tr>
                  <th>Bank</th>
                  <td>
                    {{$detailcustomer->bank_account_number}}
                  </td>
                </tr>
                <tr>
                  <th>BTN Id</th>
                  <td>
                    {{$detailcustomer->btn_id}}
                  </td>
                </tr>
                <tr>
                  <th>Btn Account Number</th>
                  <td>
                    {{$detailcustomer->btn_account_number}}
                  </td>
                </tr>
                <tr>
                  <th>BTN Branch</th>
                  <td>
                    {{$detailcustomer->btn_branch}}
                  </td>
                </tr>
                <tr>
                  <th>MK Application</th>
                  <td>
                    {{$detailcustomer->mk_application}}
                  </td>
                </tr>
                <tr>
                  <th>Deposit Akad Kredit</th>
                  <td>
                    {{$detailcustomer->deposit_loan_akad}}
                  </td>
                </tr>
                                <tr>
                  <th>Status</th>
                  <td>
                  <small class="label bg-green">{{$detailcustomer->status}}</small>
                  </td>
                </tr>
                <tr>
                  <th>Priority Status</th>
                  <td>
                   <small class="label bg-black">{{$detailcustomer->priority_status}}</small>
                  </td>
                </tr>
                <tr>
                  <th>Join Since</th>
                  <td>
                      <strong>{{$detailcustomer->created_at}}</strong>
                  </td>
                </tr>
                <tr>
                  <th>Last Update</th>
                  <td>
                    <b>{{$detailcustomer->updated_at}}</b>
                  </td>
                </tr>

              </tbody>
              </table>
              </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
<script src="{{ asset('dist/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
