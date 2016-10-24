@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        NUP
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ url('/spr') }}">SPR</a></li>
        <li class="active"><a href="{{ url('/spr/add') }}">Add SPR</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add SPR</h3>
              <a href="{{ url('/spr') }}" class="btn btn-xs btn-success pull-right">
                <i class="fa fa-eye" aria-hidden="true"></i> Lihat data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('spr.add') }}" method="post">
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
              <div class="form-group {{ $errors->has('booking-fee') ? ' has-error' : ''}}">
                  <label>Booking Fee</label>
                  <select name="booking-fee" id="customer" class="form-control">
                    <option value=""></option>
                    <option value=""></option>
                  </select>
                  @if($errors->has('booking-fee'))
                  <span class="help-block">
                    <strong>{{ $errors->first('booking-fee')}}</strong>
                  </span><span id="select2-customer-5o-container" class="select2-selection__rendered" title="Choose One">Choose One</span>
                  @endif
                  </div>

                <div class="form-group {{ $errors->has('type') ? ' has-error' : ''}}">
                  <label>Type</label>
                  <select name="type" id="type" class="form-control" required>
                    <option value="kpr">KPR</option>
                    <option value="cash">Cash</option>
                  </select>
                  <span class="help-block"></span>
                </div>
                <div class="form-group{{ $errors->has('memo') ? ' has-error' : '' }}">
                  <label for="memo">Memo</label>
                  <input type="text" name="memo" class="form-control" value="{{ old('memo') }}">
                    @if($errors->has('memo'))
                      <span class="help-block">
                        <strong>{{ $errors->first('memo') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  <label for="image">Photo</label>
                  <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                    @if($errors->has('image'))
                      <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" id="status" class="form-control" required>
                    <option value="0">Not Approved</option>
                    <option value="1">Approved </option>
                  </select>
                  <span class="help-block"></span>
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
<script type="text/javascript">
        $(document).ready(function () {
        $("#customer").select2({
          placeholder: "Chose One"
          });
      });
</script>
@endpush