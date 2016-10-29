@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Booking Free
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Booking free</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Booking</h3>
							<div class="box-tools pull-right">
								<a href="{{ URL::to('/booking-free') }}" class="btn btn-xs btn-success">
	                <i class="fa fa-refresh" aria-hidden="true"></i>
	              </a>
	              <a href="{{ URL::to('booking/add') }}" class="btn btn-xs btn-success ">
	                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Booking
	              </a>
							</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                	<th>Code</th>
                  <th>Customer</th>
                  <th>Kavling</th>
                  <th>Promo</th>
                  <th>Comission Status</th>
                 {{--  <th>Payment Status</th> --}}
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
    	"responsive" : true,
      "processing" : true,
      "serverSide" : true,
      "sScrollX" : false,
      "ajax" : "{{ url('booking/get-booking') }}",
      "columns" : [
        { data : 'code', name: 'code' },
        { data : 'nup_id', name: 'nup_id' },
        { data : 'kavling_id', name: 'kavling_id' },
        { data : 'promo_id', name: 'promo_id' },
        { data : 'comission_status', name: 'comission_status' },
        // { data : 'payment_status', name: 'payment_statusstatus' },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });
</script>
@endpush
