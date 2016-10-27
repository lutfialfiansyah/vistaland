@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Interview
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ route('interview.view') }}">Interview</a></li>
        <li class="active"><a href="{{ url('interview/edit',$edit->id) }}">Edit Interview</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Interview</h3>
              <a href="{{ route('interview.view') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-eye" aria-hidden="true"></i> Lihat data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('interview.update',$edit->id) }}" method="post">
              {!! csrf_field() !!}
               <div class="form-group{{ $errors->has('place') ? ' has-error' : ''}}">
                  <label for="place">Place</label>
              <input type="text" name="place" autofocus="autofocus" class="form-control" value="{{ $edit->place }}">
                    @if($errors->has('place'))
                      <span class="help-block">
                        <strong>{{ $errors->first('place') }}</strong>
                      </span>
                    @endif
                </div>
              <div class="form-group{{ $errors->has('date') ? ' has-error' : ''}}">
                <label>Date</label>
                <div class="input-group">
              <div class="input-group-addon">
            <i class="ion-ios-calendar-outline"></i>
              </div>
  <input id="time" class="form-control pull-left" name="date" value="{{$edit->date}}" type="text">
                @if($errors->has('date'))
                      <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group {{ $errors->has('customer') ? ' has-error' : ''}}">
                  <label>Customer</label>
                  <select name="customer" id="customer" class="form-control">
             <option value="{{$edit->customer_id}}"></option>
                    @foreach($interview as $interviews)
                    <option value="{{$interviews->id}}">{{$interviews->first_name.' '.$interviews->last_name}}</option>
                  @endforeach
                  </select>
                  @if($errors->has('customer'))
                  <span class="help-block">
                    <strong>{{ $errors->first('customer')}}</strong>
                  </span><span id="select2-customer-5o-container" class="select2-selection__rendered" title="Choose One">Choose One</span>
                  @endif
                  </div>

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
$( function() {
  $( "#time" ).datetimepicker({
  });
  $( "#customer" ).select2({
  });
});
</script>
@endpush
