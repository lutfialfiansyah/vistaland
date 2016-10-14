@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Project
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ url('/project') }}">Project</a></li>
        <li class=""><a href='{{ route("kavling.view",$edit->project_id) }}'>Kavling</a></li>
        <li class="active"><a href="">Edit Kavling</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Kavling</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action='{{ url("project/$edit->project_id/kavling/update/$edit->id") }}' method="post">
              {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('kavling_type_id') ? ' has-error' : '' }}">
                  <label for="">Type Kavling</label>
                  <select class="form-control" name="kavling_type_id">
                    <option value="{{ $edit->kavling_type_id }}" selected="selected">{{$edit->kavling_type->type }}
                    </option>
                    <option ></option>
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
                    <option value="{{ $edit->strategic_type_id }}" selected="selected">{{$edit->strategic_type->type }}
                    </option>
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
                  <input type="text" class="form-control" name="number" value="{{ $edit->number }}">
                    @if($errors->has('number'))
                      <span class="help-block">
                        {{ $errors->first('number') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('field_size') ? ' has-error' : '' }}">
                  <label for="">Field Size</label>
                  <input type="text" class="form-control" name="field_size" value="{{ $edit->field_size }}">
                   @if($errors->has('field_size'))
                      <span class="help-block">
                        {{ $errors->first('field_size') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('bpn_size') ? ' has-error' : '' }}">
                  <label for="">BPN Size</label>
                  <input type="text" class="form-control" name="bpn_size" value="{{ $edit->bpn_size }}">
                   @if($errors->has('bpn_size'))
                      <span class="help-block">
                        {{ $errors->first('bpn_size') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('left_over_size') ? ' has-error' : '' }}">
                  <label for="">Left Over Size</label>
                  <input type="text" class="form-control" name="left_over_size" value="{{ $edit->left_over_size }}">
                   @if($errors->has('left_over_size'))
                      <span class="help-block">
                        {{ $errors->first('left_over_size') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Imb_parent') ? ' has-error' : '' }}">
                  <label for="">Imb Parent</label>
                  <input type="text" class="form-control" name="Imb_parent" value="{{ $edit->Imb_parent }}">
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
                    <input type="date" class="form-control" name="Imb_parent_date" value="{{$edit->Imb_parent_date}}">
                  </div>
                   @if($errors->has('Imb_parent_date'))
                      <span class="help-block">
                        {{ $errors->first('Imb_parent_date') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Imb_fraction') ? ' has-error' : '' }}">
                  <label for="">Imb Fraction</label>
                  <input type="text" class="form-control" name="Imb_fraction" value="{{ $edit->Imb_fraction }}">
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
                    <input type="date" class="form-control" name="Imb_fraction_date" value="{{ $edit->Imb_fraction_date }}">
                  </div>
                   @if($errors->has('Imb_fraction_date'))
                      <span class="help-block">
                        {{ $errors->first('Imb_fraction_date') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('pbb') ? ' has-error' : '' }}">
                  <label for="">PBB</label>
                  <input type="text" class="form-control" name="pbb" value="{{ $edit->pbb }}">
                   @if($errors->has('pbb'))
                      <span class="help-block">
                        {{ $errors->first('pbb') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('pln_no') ? ' has-error' : '' }}">
                  <label for="">PLN NO</label>
                  <input type="text" class="form-control" name="pln_no" value="{{ $edit->pln_no }}">
                   @if($errors->has('pln_no'))
                      <span class="help-block">
                        {{ $errors->first('pln_no') }}
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('progress') ? ' has-error' : '' }}">
                  <label for="">Progress</label>
                  <select class="form-control" name="progress">
                    <option value="{{ $edit->progress }}">{{ $edit->progress }}</option>
                    <option></option>
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
                    <option value="{{ $edit->status }}">{{ $edit->status }}</option>
                    <option></option>
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
                  <a href="{{ route('kavling.view',$edit->project_id) }}" class="btn btn-danger" 
                  onclick="return confirm('Clik OK to confirm !')">BATAL</a>
                  <input type="submit" class="btn btn-primary" value="UPDATE">
                </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
  
@endsection
