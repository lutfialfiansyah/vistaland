@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ route('promo.view') }}">Promo</li></a>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Promo</h3>
              <div class="box-tools pull-right">
              <a href="{{ URL::to('promo/') }}" class="btn btn-xs btn-success ">
                <i class="fa fa-refresh" aria-hidden="true"></i>
              </a>
              <a href='{{ URL::to("promo/add") }}' class="btn btn-xs btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Promo
              </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="data" class="table table-condensed table-bordered table-hover dataTable no-footer" role="grid" style="width: 1082px;">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Date Start</th>
                  <th>Date End</th>
                  <th>Discount</th>
                  <th>Agent Bonus</th>
                  <th>Team Bonus</th>
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
      "sScrollX" : false,
      "ajax" : '{{ url("promo/get-promo") }}',
      "columns" : [
        { data : 'name', name: 'name' },
        { data : 'date_start', name: 'date_start' },
        { data : 'date_end', name: 'date_end' },
        { data : 'discount', name: 'discount' },
        { data : 'agent_bonus', name: 'agent_bonus' },
        { data : 'team_bonus', name: 'team_bonus' },
        { data : 'action', name:'action', orderable: false, searchable: false },
      ]
    });
  });

</script>
@endpush
