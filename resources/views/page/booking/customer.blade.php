@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Customer
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
              <a href="{{ url('customer/add') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Data Customer
              </a>

              <a href="{{ url('/customer') }}" class="btn btn-xs btn-success">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover table-striped table-condesed">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Bank</th>
                  <th>Status</th>
                  <th>Priority</th>
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
      "ajax" : "{{ url('customer/get-customer') }}",
      "columns" : [
        { data : 'name' ,name: 'name'},
        { data : 'email', name: 'email' },
        { data : 'house_phone', name: 'house_phone' },
        { data : 'image', name: 'image', orderable: false, searchable: false },
        { data : 'bank_account_number', name: 'bank_account_number' },
        { data : 'status', name: 'status' },
        { data : 'priority_status', name: 'priority_status' },
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
            text: " Delete data customer ?",
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
