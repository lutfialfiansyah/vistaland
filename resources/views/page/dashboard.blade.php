@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Dashboard
        <a class="btn btn-success btn-xs" href="{{url('/project/add')}}">
        <i class="fa fa-plus-circle"></i> Add Project
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
<div class=" row">
     @foreach ($projects as $pro)
    
        <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$pro->unit_total}}
            <sup style="font-size:20px;">Units</sup>
            </h3>
            <p>{{$pro->name}}</p>
          </div>
        <div class="icon">
          <i class="fa fa-suitcase"></i>
        </div>
          <a class="small-box-footer" href="#">
            Select This Project 
            <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    @endforeach
    </div>

      </form>
    </section>
  
@endsection