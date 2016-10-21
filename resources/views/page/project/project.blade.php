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
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Project</h3>
              <div class="box-tools pull-right">
                <a href="{{ url('project') }}" class="btn btn-xs btn-success">
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>

                <a href="{{ url('project/add') }}" class="btn btn-xs btn-success">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Project
                </a>
              </div>
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
                  <th>Siteplan</th>
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
        { data : 'image', name: 'image', orderable: false, searchable: false },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });
  
</script>
<script>
    $(document).on('click', '#delete-btn', function(e) {
        e.preventDefault();
        var link = $(this);
        swal({
            title: "Confirm Delete",
            text: "Delete Data Project?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#D5180A",
            confirmButtonText: "Yes",
            closeOnConfirm: true
         },
         function(isConfirm){
             if(isConfirm){
                window.location = link.attr('href');
             }
             else{
                swal("cancelled","Category deletion Cancelled", "error");
             }
         });
    });
</script>
@endpush
