@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        SPR
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">SPR</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data SPR</h3>
              <a href="{{ url('spr/add') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add SPR
              </a>

              <a href="{{ url('/spr') }}" class="btn btn-xs btn-success">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>Memo</th>
                  <th>Image</th>
                  <th>Booking Fee</th>
                  <th>Change Name Status </th>
                  <th>Move Status</th>
                  <th>Status</th>
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
      "ajax" : "{{ url('spr/get-spr') }}",
      "columns" : [
        { data : 'type', name: 'type' },
        { data : 'memo', name: 'memo' },
        { data : 'image', name: 'image', orderable: false, searchable:false },
        { data : 'booking_free', name: 'booking_free' },
        { data : 'change_name_status', name: 'change_name_status' },
        { data : 'move_status', name: 'move_status' },
        { data : 'status', name: 'status' },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });

</script>
@endpush
