@extends('master')
@section('konten')
   <section class="content-header">
      <h1>
        Interview Schedule Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('/interview')}}">Interview</a></li>
        <li class="active"><a href="#">Interview Schedule Detail</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <form action="{{ route('interview.detail',$detailinterview->id) }}" method="get">
             {!! csrf_field() !!}
             <section class="content">
             <div class="row">
             <div id="info"></div>
             <section class="invoice">
             <div class="row">
             <div class="col-xs-12">
             <h2 class="page-header">
             <i class="fa fa-globe"></i>
             Vistaland Group
             <small class="pull-right">{{date('d M Y')}}</small>
             </h2>
<address>
<strong>PT. Vistaland Group</strong>
<br>
Rukan Artha Gading Niaga F/12 Kelapa Gading
<br>
Jakarta Utara
<br>
DKI Jakarta 14250
<br>
+62 2145 850 791
<br>
<a href="mailto:corporate@vistalandgroup.com">corporate@vistalandgroup.com</a>
</address>
</div>
<div class="col-sm-4 invoice-col">
<strong>Interview</strong>
<br>
{{$detailinterview->place}}
<br>
{{$detailinterview->date}}
<br>
</div>
<div class="col-sm-4 invoice-col">
<b>Interview #2</b>
<br>
</div>
</div>
<div class="row">
<div class="col-xs-12 table-responsive">
<table class="table table-striped">
<thead>
<tr>
  <br>
<strong>Customer Name</strong>
</tr>
</thead>
<tbody>
<tr>
<td>
<a href="{{route('interview.detail',$detailinterview->customer_id)}}" target="_blank" id="cus"> name customer</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="row no-print" id="print">
<div class="col-xs-12" id="print">
<a class="btn btn-default" href="#" onClick="document.getElementById('print');window.print();">
<i class="fa fa-print"></i>
Print
</a>
</div>
</div>
</form>
</section>
<script src="{{ asset('dist/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
