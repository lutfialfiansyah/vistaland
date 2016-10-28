@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href='{{ url("project/$project->id/pricelist") }}'>Pricelist</a></li>
        <li class="active"><a href="">Add Price</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Price</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if(Session::has('PesanError'))
	            	<div class="alert alert-danger">
	            		{{ Session::get('PesanError') }} Click <a href='{{ URL::to("project/$project->id/pricelist") }}'>
	            		disini</a> Untuk edit
	            	</div>
           		@endif
              <form action="{{ route('pricelist.add',$project->id) }}" method="post">
              {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('kavling_type_id') ? ' has-error' : ''}}">
                  <label for="">Kavling Type</label>
                  <select name="kavling_type_id" class="form-control">
                    <option value=""></option>
                    @foreach($s_kavling_type as $data)
                      <option value="{{ $data->id }}">{{ $data->type }}</option>
                    @endforeach
                  </select>
                    @if($errors->has('kavling_type_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('kavling_type_id') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('expired_date') ? ' has-error' : '' }}">
                  <label for="expired_date">Expired Date</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                    <input type="date" name="expired_date" class="form-control" value="{{ old('expired_date') }}">
                  </div>
                    @if($errors->has('expired_date'))
                      <span class="help-block">
                        <strong>{{ $errors->first('expired_date') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                  <label for="price">Price</label>
                  <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                    @if($errors->has('price'))
                      <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('administration_price') ? ' has-error' : '' }}">
                  <label for="administration_price">Administration Price</label>
                  <input type="number"  name="administration_price" class="form-control" value="{{ old('administration_price') }}">
                    @if($errors->has('administration_price'))
                      <span class="help-block">
                        <strong>{{ $errors->first('administration_price') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('renovation_price') ? ' has-error' : '' }}">
                  <label for="renovation_price">Renovation Price</label>
                  <input type="number" name="renovation_price" class="form-control" value="{{ old('renovation_price') }}">
                    @if($errors->has('renovation_price'))
                      <span class="help-block">
                        <strong>{{ $errors->first('renovation_price') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('left_over_price') ? ' has-error' : '' }}">
                  <label for="left_over_price">Left Over Price</label>
                  <input type="number" name="left_over_price" class="form-control" value="{{ old('left_over_price') }}">
                    @if($errors->has('left_over_price'))
                      <span class="help-block">
                        <strong>{{ $errors->first('left_over_price') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('move_kavling_price') ? ' has-error' : '' }}">
                  <label for="move_kavling_price">Move Kavling Price</label>
                  <input type="number" name="move_kavling_price" class="form-control" value="{{ old('move_kavling_price') }}">
                    @if($errors->has('move_kavling_price'))
                      <span class="help-block">
                        <strong>{{ $errors->first('move_kavling_price') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('change_name_price') ? ' has-error' : '' }}">
                  <label for="change_name_price">Change Name Price</label>
                  <input type="number" name="change_name_price" class="form-control" value="{{ old('change_name_price') }}">
                    @if($errors->has('change_name_price'))
                      <span class="help-block">
                        <strong>{{ $errors->first('change_name_price') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                  <label for="status">Status</label>
                  <select name="status" class="form-control">
                    <option value="Received">Received</option>
                    <option value="Rejected">Rejected</option>
                  </select>
                    @if($errors->has('status'))
                      <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                      </span>
                    @endif
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

                <div class="form-group">
                  <button type="reset" class="btn btn-default">RESET</button>
                  <input type="submit" class="btn btn-primary" value="SIMPAN">

                </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>

@endsection
