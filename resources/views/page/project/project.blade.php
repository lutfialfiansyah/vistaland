@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Project</h3>
              <a href="{{ url('project/add') }}" class="btn-xs btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Area</th>
                  <th>Unit Total</th>
                  <th>Location</th>
                  <th>Booking free</th>
                  <th>Booking comission</th>
                  <th>NUP free</th>
                  <th>NUP comission</th>
                  <th>Akad comission</th>
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
      "ajax" : "{{ url('project/get-project') }}",
      "columns" : [
        { data : 'name', name: 'name' },
        { data : 'company', name: 'company' },
        { data : 'area', name: 'area' },
        { data : 'unit_total', name: 'unit_total' },
        { data : 'location', name: 'location' },
        { data : 'booking_free', name: 'booking_free' },
        { data : 'booking_comission', name: 'booking_comission' },
        { data : 'nup_free', name: 'nup_free' },
        { data : 'nup_comission', name: 'nup_comission' },
        { data : 'akad_comission', name: 'akad_comission' },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });
  
</script>
@endpush
