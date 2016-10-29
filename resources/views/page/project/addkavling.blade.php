@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ url('project') }}">Project</a></li>
        <li class=""><a href='{{ url("project/$project->id/kavling") }}'>Kavling</a></li>
        <li class="active"><a href="">Add Kavling</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Kavling</h3>
              <a href='{{ url("project/$project->id/kavling") }}' class="btn btn-xs btn-success pull-right">
                <i class="fa fa-eye" aria-hidden="true"></i> Lihat data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if(Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
            @endif
            @if(Session::has('error'))
              <div class="alert alert-danger">
                {{ Session::get('error') }}
              </div>
            @endif
              <form action='{{ url("project/$project->id/kavling/add") }}' method="post">
              {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('kavling_type_id') ? ' has-error' : '' }}">
                  <label for="">Type Kavling</label>
                  <select class="form-control" name="kavling_type_id">
                    <option value="" selected="selected"></option>
                    @foreach($s_kavling_type as $data)
                      <option value="{{ $data->id }}">{{ $data->type }}</option>
                    @endforeach
                  </select>
                    @if($errors->has('kavling_type_id'))
                      <span class="help-block">
                        {{ $errors->first('kavling_type_id') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('strategic_type_id') ? ' has-error' : '' }}">
                  <label for="">Strategic Type</label>
                  <select class="form-control" name="strategic_type_id" >
                    <option value=""></option>
                    @foreach($s_strategic_type as $data)
                      <option value="{{ $data->id }}">{{ $data->type }}</option>
                    @endforeach
                  </select>
                    @if($errors->has('strategic_type_id'))
                      <span class="help-block">
                        {{ $errors->first('strategic_type_id') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                  <label for="number">Number</label>
                  <input type="text" class="form-control" name="number" value="">
                    @if($errors->has('number'))
                      <span class="help-block">
                        {{ $errors->first('number') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('field_size') ? ' has-error' : '' }}">
                  <label for="">Field Size</label>
                  <input type="text" class="form-control" name="field_size" value="">
                   @if($errors->has('field_size'))
                      <span class="help-block">
                        {{ $errors->first('field_size') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('bpn_size') ? ' has-error' : '' }}">
                  <label for="">BPN Size</label>
                  <input type="text" class="form-control" name="bpn_size" value="">
                   @if($errors->has('bpn_size'))
                      <span class="help-block">
                        {{ $errors->first('bpn_size') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('left_over_size') ? ' has-error' : '' }}">
                  <label for="">Left Over Size</label>
                  <input type="text" class="form-control" name="left_over_size" value="">
                   @if($errors->has('left_over_size'))
                      <span class="help-block">
                        {{ $errors->first('left_over_size') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Imb_parent') ? ' has-error' : '' }}">
                  <label for="">Imb Parent</label>
                  <input type="text" class="form-control" name="Imb_parent" value="">
                   @if($errors->has('Imb_parent'))
                      <span class="help-block">
                        {{ $errors->first('Imb_parent') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Imb_parent_date') ? ' has-error' : '' }}">
                  <label for="">Imb Parent Date</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                    <input type="text" id="datepicker" placeholder="mm/dd/yyyy" class="form-control" name="Imb_parent_date" value="">
                  </div>
                   @if($errors->has('Imb_parent_date'))
                      <span class="help-block">
                        {{ $errors->first('Imb_parent_date') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Imb_fraction') ? ' has-error' : '' }}">
                  <label for="">Imb Fraction</label>
                  <input type="text" class="form-control" name="Imb_fraction" value="">
                   @if($errors->has('Imb_fraction'))
                      <span class="help-block">
                        {{ $errors->first('Imb_fraction') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Imb_fraction_date') ? ' has-error' : '' }}">
                  <label for="">Imb Fraction Date</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                    <input type="text" id="datepicker1" placeholder="mm/dd/yyyy" class="form-control" name="Imb_fraction_date" value="">
                  </div>
                   @if($errors->has('Imb_fraction_date'))
                      <span class="help-block">
                        {{ $errors->first('Imb_fraction_date') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('pbb') ? ' has-error' : '' }}">
                  <label for="">PBB</label>
                  <input type="text" class="form-control" name="pbb" value="">
                   @if($errors->has('pbb'))
                      <span class="help-block">
                        {{ $errors->first('pbb') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('pln_no') ? ' has-error' : '' }}">
                  <label for="">PLN NO</label>
                  <input type="text" class="form-control" name="pln_no" value="">
                   @if($errors->has('pln_no'))
                      <span class="help-block">
                        {{ $errors->first('pln_no') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('progress') ? ' has-error' : '' }}">
                  <label for="">Progress</label>
                  <select class="form-control" name="progress">
                    <option value="Boplang">Boplang</option>
                    <option value="Pondasi">Pondasi</option>
                    <option value="Sloof">Sloof</option>
                    <option value="Pasang Batako 1/2">Pasang Batako 1/2</option>
                    <option value="Ring Balok">Ring Balok</option>
                    <option value="Sopi">Sopi</option>
                    <option value="Baja ringan">Baja ringan</option>
                    <option value="Genteng">Genteng</option>
                    <option value="Plafon">Plafon</option>
                    <option value="Keramik">Keramik</option>
                    <option value="Pintu dan Jendela">Pintu dan Jendela</option>
                    <option value="Rabat dan Jembatan">Rabat dan Jembatan</option>
                    <option value="Finishing">Finishing</option>
                    <option value="BAST">BAST</option>
                    <option value="Pasang listrik">Pasang listrik</option>
                  </select>
                   @if($errors->has('progress'))
                      <span class="help-block">
                        {{ $errors->first('progress') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                  <label for="">Status</label>
                  <select class="form-control" name="status" >
                    <option value="Close">Close</option>
                    <option value="Open">Open</option>
                    <option value="Reserved">Reserved</option>
                    <option value="BF">BF</option>
                    <option value="SPR">SPR</option>
                    <option value="Data Lengkap">Data Lengkap</option>
                    <option value="Wawancara">Wawancara</option>
                    <option value="Sp3k">Sp3k</option>
                    <option value="Akad">Akad</option>
                    <option value="Cash">Cash</option>
                    <option value="Tolak">Tolak</option>
                    <option value="Batal">Batal</option>
                    <option value="Serah Terima">Serah Terima</option>
                  </select>
                   @if($errors->has('status'))
                      <span class="help-block">
                        {{ $errors->first('status') }}
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
});
</script>
@endpush