@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('promo.view') }}">Promo</li></a>
        <li class="active"><a href="">Add Promo</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Add Promo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
            @if(Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }} <a href="{{ route('promo.view') }}">Lihat data</a></div>
            @endif 
              <form action="{{ route('promo.add') }}" method="post" >
              {!! csrf_field() !!}
              
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="" class="form-control" value="{{ old('name') }}">
                  @if($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
              </div>                
              
              <div class="form-group{{ $errors->has('date_start') ? ' has-error' : '' }}">
                <label for="date_start">Date Start</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                  <input type="text" name="date_start" placeholder="" id="datepicker" class="form-control" value="{{ old('date_start') }}">
                </div>
                  @if($errors->has('date_start'))
                    <span class="help-block">
                      <strong>{{ $errors->first('date_start') }}</strong>
                    </span>
                  @endif
              </div>
              
              <div class="form-group{{ $errors->has('date_end') ? ' has-error' : '' }}">
                <label for="date_end">Date End</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                  <input type="text" name="date_end" placeholder="" id="datepicker1" class="form-control" value="{{ old('date_end') }}">
                </div>
                  @if($errors->has('date_end'))
                    <span class="help-block">
                      <strong>{{ $errors->first('date_end') }}</strong>
                    </span>
                  @endif
              </div>
              
              <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                <label for="discount">Discount</label>
                <input type="number" name="discount" placeholder="" class="form-control" value="{{ old('discount') }}">
                  @if($errors->has('discount'))
                    <span class="help-block">
                      <strong>{{ $errors->first('discount') }}</strong>
                    </span>
                  @endif
              </div>
              
              <div class="form-group{{ $errors->has('agent_bonus') ? ' has-error' : '' }}">
                <label for="agent_bonus">Agent Bonus</label>
                <input type="number" name="agent_bonus" placeholder="" class="form-control" value="{{ old('agent_bonus') }}">
                  @if($errors->has('agent_bonus'))
                    <span class="help-block">
                      <strong>{{ $errors->first('agent_bonus') }}</strong>
                    </span>
                  @endif
              </div>
              
              <div class="form-group{{ $errors->has('team_bonus') ? ' has-error' : '' }}">
                <label for="team_bonus">Team Bonus</label>
                <input type="number" name="team_bonus" placeholder="" class="form-control" value="{{ old('team_bonus') }}">
                  @if($errors->has('team_bonus'))
                    <span class="help-block">
                      <strong>{{ $errors->first('team_bonus') }}</strong>
                    </span>
                  @endif
              </div>

              <div class="form-group">
                <button type="reset" class="btn btn-default">RESET</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
              </div>

              </form>
          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     </div>
    </section>
@endsection
@push('script')
<script>
$( function() {
  $( "#datepicker").datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    });
  $( "#datepicker1").datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    });
  $( ".marketer" ).select2();
} );
</script>
@endpush

