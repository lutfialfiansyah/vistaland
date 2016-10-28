@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        NUP
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">NUP</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data NUP</h3>
							<div class="box-tools pull-right">
	              <a href="{{ url('/nup') }}" class="btn btn-xs btn-success">
	                <i class="fa fa-refresh" aria-hidden="true"></i>
	              </a>
	              <a href="{{ url('nup/add') }}" class="btn btn-xs btn-success">
	                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add NUP
	              </a>
							</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Code Payment</th>
                  <th>Project</th>
                  <th>Customer</th>
                  <th>NUP Free</th>
                  <th>Comission Status</th>

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
      "sScrollX" : false,
      "ajax" : "{{ url('nup/get-nup') }}",
      "columns" : [
        { data : 'code', name: 'nup.code' },
        { data : 'name', name: 'project_id' },
        { data : 'customer', name: 'customer' },
        { data : 'nup_free', name: 'project.nup_free' },
        { data : 'comission_status', name: 'comission_status' },

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
            text: " Delete record ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
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
