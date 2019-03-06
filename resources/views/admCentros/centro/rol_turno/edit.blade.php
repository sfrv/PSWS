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
      	<h3 align="center">PANEL DE EDICION DE <span class="text-bold">ROL DE TURNO</span></h3>
      	<br>
      	{!! Form::model($rol_turno,['method'=>'PATCH','autocomplete'=>'off','route'=>['update-rol-turno',$rol_turno->id]])!!}
		{{Form::token()}} 
      	<div class="row">
        	<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	            <label for="form-field-24">TITULO:</label>
                <input required name="titulo" id="titulo" class="autosize form-control" value="{{$rol_turno->titulo}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              	<label for="form-field-24">MES:</label>
              	<select name="mes" id="mes" class="form-control selectpicker">
	              	@foreach($meses as $var)
	                	@if($var == $rol_turno->mes)
	                  		<option value="{{$var}}" selected>{{$var}}</option>
	                	@else
	                  		<option value="{{$var}}">{{$var}}</option>
	                	@endif
	              	@endforeach
            	</select>
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              	<label for="form-field-24">ANIO:</label>
              	<select name="anio" id="anio" class="form-control selectpicker">
	              	@foreach($anios as $var)
	                	@if($var == $rol_turno->anio)
	                  		<option value="{{$var}}" selected>{{$var}}</option>
	                	@else
	                  		<option value="{{$var}}">{{$var}}</option>
	                	@endif
	              	@endforeach
            	</select>
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
		            <a href="{{ route('edit-rol-turno-emergencia', [$rol_turno->id,$id_centro]) }}" class="small-box-footer">EDITAR ETAPA <i class="fa fa-arrow-circle-right"></i></a>
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
		            <a href="{{ route('edit-rol-turno-consulta', [$rol_turno->id,$id_centro]) }}" class="small-box-footer">EDITAR ETAPA <i class="fa fa-arrow-circle-right"></i></a>
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
		            <a href="{{ route('edit-rol-turno-hospitalizacion', [$rol_turno->id,$id_centro]) }}" class="small-box-footer">EDITAR ETAPA <i class="fa fa-arrow-circle-right"></i></a>
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
		            <a href="{{ route('edit-rol-turno-personal-encargado', [$rol_turno->id,$id_centro]) }}" class="small-box-footer">EDITAR ETAPA <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		    </div>
		    <br>
            <div class="col-sm-8 col-sm-offset-2">
               <div class="form-group">
               	<button class="btn btn-success btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> EDITAR ROL DE TURNO</i>
                </button>
               </div>
            </div>
        </div>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
</section>
@push ('scripts')
<script>

</script>
@endpush
@endsection