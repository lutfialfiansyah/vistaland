@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ route('change-name.view') }}">Ganti Nama</li></a>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Ganti Nama</h3>
              <div class="box-tools pull-right">
              	<a href="{{ URL::to('change-name') }}" class="btn btn-xs btn-success">
              		<i class="fa fa-refresh" aria-hidden="true"></i>
              	</a>
	              <a href='{{ URL::to('change-name/add') }}' class="btn btn-xs btn-success">
	                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Ganti nama
	              </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="data" class="table table-condensed table-bordered table-hover">
              <thead>
                <tr>
                  <th>Old Customer</th>
                  <th>New Customer</th>
                  <th>Reason</th>
                  <th>SRP</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
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
      "ajax" : '{{ url("change-name/get-change-name") }}',
      "columns" : [
        { data : 'customer_id_old', name: 'customer_id_old' },
        { data : 'customer_id_new', name: 'customer_id_new' },
        { data : 'reason', name: 'reason' },
        { data : 'spr_id', name: 'spr_id' },
        { data : 'status', name: 'status' },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });

  $(document).on('click', '#confirm', function(e) {
        e.preventDefault();
        var link = $(this);
        swal({
            title: "Delete Record !",
            text: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
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
