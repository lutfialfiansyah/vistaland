@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('taxpayment.view') }}">Tax Payment</li></a>
        <li class="active"><a href="">Add Payment</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Add Tax Payment</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body"> 
              <form action="{{ route('taxpayment.add') }}" method="post" >
              {!! csrf_field() !!}
              
              <div class="form-group{{ $errors->has('kavling_id') ? ' has-error' : '' }}">
                <label for="kavling">Kavling</label>
                <select name="kavling_id" class="form-control" autofocus>
                  <option value=""></option>
                  @foreach($kavling as $data)
                    <option value="{{ $data->id }}">{{ $data->project->name }} - {{ $data->number }}</option>  
                  @endforeach
                </select>
                  @if($errors->has('kavling_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('kavling_id') }}</strong>
                    </span>
                  @endif
              </div>
              <div class="form-group{{ $errors->has('ssp_total') ? ' has-error' : '' }}">
                <label for="ssp_total">SSP Total</label>
                <input type="number" class="form-control" name="">
                  @if($errors->has('ssp_total'))
                    <span class="help-block">
                      <strong>{{ $errors->first('ssp_total') }}</strong>
                    </span>
                  @endif
              </div>
              <div class="form-group{{ $errors->has('bphtb_total') ? ' has-error' : '' }}">
                <label for="bphtb_total">BPHTB Total</label>
                <input type="number" class="form-control" name="">
                  @if($errors->has('bphtb_total'))
                    <span class="help-block">
                      <strong>{{ $errors->first('bphtb_total') }}</strong>
                    </span>
                  @endif
              </div>
              <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                <label for=""></label>
                <input type="text" class="form-control">
                  @if($errors->has(''))
                    <span class="help-block">
                      <strong>{{ $errors->first('') }}</strong>
                    </span>
                  @endif
              </div>
              <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                <label for=""></label>
                <input type="text" class="form-control">
                  @if($errors->has(''))
                    <span class="help-block">
                      <strong>{{ $errors->first('') }}</strong>
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


