@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ route('formpayment.view') }}">Form Payment</li></a>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Payment</h3>
              <div class="box-tools pull-right"><a href='{{ route("formpayment.add") }}' class="btn btn-xs btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add payment</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          
              <table id="data" class="table table-condensed table-bordered table-hover dataTable no-footer" role="grid" style="width: 1082px;">
              <thead>
                <tr>
                  <th>Null</th>
                  <th>Null</th>
                  <th>Null</th>
                  <th>Null</th>
                  <th>Null</th>
                  <th>Null</th>
                  <th>Null</th>
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
      "ajax" : '{{ url("formpayment/get-formpayment") }}',
      "columns" : [
        { data : '', name: '' },
        { data : '', name: '' },
        { data : '', name: '' },
        { data : '', name: '' },
        { data : '', name: '' },
        { data : '', name: '' },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });
  
</script>
@endpush
