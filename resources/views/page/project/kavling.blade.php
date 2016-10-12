@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="{{ route('project.view') }}">Project</li></a>
        <li class="active"><a href="">Kavling</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Kavling <strong><u>{{ $project->name }}</u></strong></h3>
              <div class="box-tools pull-right"><a href='{{ url("project/$project->id/kavling/add") }}' class="btn btn-xs btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Kavling</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="data" class="table table-condensed table-bordered table-hover dataTable no-footer" role="grid" style="width: 1082px;">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Field Size</th>
                  <th>BPN Size</th>
                  <th>Left Over Size</th>
                  <th>Imb Parent</th>
                  <th>Imb Parent Date</th>
                  <th>Imb Fraction</th>
                  <th>Imb Fraction Date</th>
                  <th>PBB</th>
                  <th>PLN NO</th>
                  <th>Status</th>
                  <th>Progress</th>
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
      "responsive" : true,
      "ajax" : '{{ url("project/$project->id/get-kavling") }}',
      "columns" : [
        { data : 'number', name: 'number' },
        { data : 'field_size', name: 'field_size' },
        { data : 'bpn_size', name: 'bpn_size' },
        { data : 'left_over_size', name: 'left_over_size' },
        { data : 'Imb_parent', name: 'Imb_parent' },
        { data : 'Imb_parent_date', name: 'Imb_parent_date' },
        { data : 'Imb_fraction', name: 'Imb_fraction' },
        { data : 'Imb_fraction_date', name: 'Imb_fraction_date' },
        { data : 'pbb', name: 'pbb' },
        { data : 'pln_no', name: 'pln_no' },
        { data : 'status', name: 'status', "width": "5px"},
        { data : 'progress', name: 'progress' },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });
  
</script>
@endpush
