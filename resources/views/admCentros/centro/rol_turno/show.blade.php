@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>ROL DE TURNO: {{$rol_turno->mes}} {{$rol_turno->anio}}</b>
  </h1>
  <ol class="breadcrumb">
     <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="{{url('adm/centro/index_rol_turno/'.$id_centro)}}">index rol de turno</a></li>
  </ol>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
      	<h3 align="center">PANEL DE VIZUALIZACION DE <span class="text-bold">ROL DE TURNO</span></h3>
      	<br>
      	<div class="row">
        	<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	            <label for="form-field-24">TITULO:</label>
                <input disabled="true" name="titulo" id="titulo" class="autosize form-control" value="{{$rol_turno->titulo}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">MES:</label>
              <input disabled="true" name="mes" id="mes" class="autosize form-control" value="{{$rol_turno->mes}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">ANIO:</label>
              <input disabled="true" name="anio" id="anio" class="autosize form-control" value="{{$rol_turno->anio}}" type="text" step="any">
            </div>
      	</div>
        <br>
        <div>
        	<br>
        	<div class="row">
		        <div class="col-lg-3 col-xs-12">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>E. E.</h3>

		              <p>ETAPA - EMERGENCIA</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-heartbeat"></i>
		            </div>
		            <a href="{{ route('show-rol-turno-emergencia', [$rol_turno->id,$id_centro]) }}" class="small-box-footer">VIZUALIZAR ETAPA <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		        <div class="col-lg-3 col-xs-12">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>E. C.</h3>

		              <p>ETAPA - CONSULTA EXTERNA</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-stethoscope"></i>
		            </div>
		            <a href="{{ route('show-rol-turno-consulta', [$rol_turno->id,$id_centro]) }}" class="small-box-footer">VIZUALIZAR ETAPA <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		        <div class="col-lg-3 col-xs-12">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>E. H.</h3>

		              <p>ETAPA - HOSPITALIZACION</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-hospital-o"></i>
		            </div>
		            <a href="{{ route('show-rol-turno-hospitalizacion', [$rol_turno->id,$id_centro]) }}" class="small-box-footer">VIZUALIZAR ETAPA <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		        <div class="col-lg-3 col-xs-12">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>E. P.</h3>

		              <p>ETAPA - PERSONAL ENCARGADI</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-user-md"></i>
		            </div>
		            <a href="{{ route('show-rol-turno-personal-encargado', [$rol_turno->id,$id_centro]) }}" class="small-box-footer">VIZUALIZAR ETAPA <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		    </div>
		    <br>
            <div class="col-sm-8 col-sm-offset-2">
               <div class="form-group">
               	
                <a href="{{url('adm/centro/index_rol_turno/'.$id_centro)}}"><button class="btn btn-success btn-block" type="submit">
                   <i class="fa fa-arrow-circle-left"> ATRAS</i>
                </button></a>
               </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@push ('scripts')
<script>
window.parent.document.body.style.zoom="80%";//solo para chrome
document.getElementById("mynav").style.zoom = "80%";

jQuery(document).ready(function() {
   jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
 });

var x = document.getElementById("mynav");
x.className += " sidebar-collapse";


</script>
@endpush
@endsection