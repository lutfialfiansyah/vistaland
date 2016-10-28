@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href='{{ url("project/$project->id")}}'><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href='{{ url("project/")}}'>Project</a></li>
         <li class="active">Price List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Price List</h3>
              <div class="box-tools pull-right">
                <a href='{{ url("project/$project->id/pricelist") }}' class="btn btn-xs btn-success">
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
                <a href='{{ url("project/$project->id/pricelist/add") }}' class="btn btn-xs btn-success">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Pricelist
                </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table class="table table-condensed table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Kavling Type</th>
                  <th>Price</th>
                  <th>Adminstration Price</th>
                  <th>Renovation Price</th>
                  <th>Left Over Price</th>
                  <th>Move Kavling Price</th>
                  <th>Change Name Price</th>
                  <th>Memo</th>
                  <th>Status</th>
                  <th style="width: 15%">Action</th>
                </tr>
              </thead>
              <tbody>
              @if(count($project->price) == 0)
                <tr>
                  <td colspan="10">No data available in table</td>
                </tr>
              @else
                @foreach($project->price as $data)
                  <tr>
                    <td>{{ $data->kavling_type->type }}</td>
                    <td>{{ "Rp.".number_format($data->price,0,',','.').',-' }}</td>
                    <td>{{ "Rp.".number_format($data->administration_price,0,'','.').',-' }}</td>
                    <td>{{ "Rp.".number_format($data->renovation_price,0,',','.').',-' }}</td>
                    <td>{{ "Rp.".number_format($data->left_over_price,0,'','.').',-' }}</td>
                    <td>{{ "Rp.".number_format($data->move_kavling_price,0,'','.').',-' }}</td>
                    <td>{{ "Rp.".number_format($data->change_name_price,0,'','.').',-' }}</td>
                    <td>{{ $data->memo }}</td>
                    @if($data->management_confirm_status == "Received")
                    	<td><span class="label label-primary">{{ $data->management_confirm_status }}</span></td>
                    @else
                    	<td><span class="label label-danger">{{ $data->management_confirm_status }}</span></td>
                    @endif
                    <td>
                      <a href='{{ url("project/$project->id/pricelist/edit/$data->id") }}' class="btn btn-xs btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                      <a href='{{ ("pricelist/hapus/$data->id")}}' class="btn btn-xs btn-danger" id="confirm"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                    </td>
                  </tr>
                @endforeach
              @endif
              </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
<script src="{{ asset('dist/sweetalert.min.js') }}"></script>
@include('sweet::alert')
@endsection

@push('script')
<script>
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
