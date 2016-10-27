@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        NUP
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ url('/nup') }}">NUP</a></li>
        <li class="active"><a href="{{ url('/nup/add') }}">Add NUP</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add NUP</h3>
              <a href="{{ url('/nup') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-eye" aria-hidden="true"></i> Lihat data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('nup.add') }}" method="post">
              {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('date') ? ' has-error' : ''}}">
                  <label for="date">Date</label>
                  <input type="text" name="date" autofocus="autofocus" class="form-control " value="{{date('d-M-Y')}}" disabled="">
                    @if($errors->has('date'))
                      <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('project') ? ' has-error' : ''}}">
                  <label>Project</label>
                  <select name="project" id="project" class="form-control">
                    <option value=""></option>
                    @foreach ($nuppro as $nupp)
                      <option value="{{$nupp->id}}">{{$nupp->name}}</option>
                    @endforeach
                  </select>
                  @if($errors->has('project'))
                  <span class="help-block">
                    <strong>{{ $errors->first('project')}}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('customer') ? ' has-error' : ''}}">
                  <label>Customer</label>
                  <select name="customer" id="customer" class="form-control">
                    <option value=""></option>
                    @foreach ($nupcus as $nups)
                    <option value="{{$nups->id}}">{{$nups->first_name.' '.$nups->last_name}}</option>
                  @endforeach
                    @foreach ( $nupcus as $nups )
                    	<option value="{{ $nups->id }}">{{ $nups->code." - ".$nups->first_name." ".$nups->last_name }}</option>
                 		@endforeach
                  </select>
                  @if($errors->has('customer'))
                  <span class="help-block">
                    <strong>{{ $errors->first('customer')}}</strong>
                  </span><span id="select2-customer-5o-container" class="select2-selection__rendered" title="Choose One">Choose One</span>
                  @endif
                  </div>
                <div class="form-group">
                  <button type="reset" class="btn btn-default">RESET</button>
                  <input type="submit" class="btn btn-primary pull-right" value="Submit">
                </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>

@endsection
@push('script')
<script>
      $(document).ready(function () {
        $("#customer").select2({
          placeholder: "Chose One"
          });
      });
</script>
@endpush
