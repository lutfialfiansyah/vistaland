@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        NUP
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Booking fee</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Booking</h3>
              <a href="{{ url('booking/add') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Booking
              </a>

              <a href="{{ url('/booking-fee') }}" class="btn btn-xs btn-success">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Customer</th>
                  <th>Kavling</th>
                  <th>Promo</th>
                  <th>Comission Status</th>
                  <th>Payment Status</th>
                  <th>Action</th>
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

@push('script')
<script>
  $(function () {
    $('#data').DataTable({
      "processing" : true,
      "serverSide" : true,
      "ajax" : "{{ url('nup/get-nup') }}",
      "columns" : [
        { data : 'customer', name: 'customer' },
        { data : 'kavling', name: 'kavling' },
        { data : 'promo', name: 'promo' },
        { data : 'comission_status', name: 'comission_status' },
        { data : 'payment_status', name: 'payment_statusstatus' },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });

</script>
@endpush
