@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Informacion de la Cartera de Servicio: {{$cartera_servicio->id}}</b> * * * * *
  </h1>
  <br>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
      	<br>
      	<div class="row">
        	<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	            <label for="form-field-24">Titulo:</label>
                <input disabled="true" name="titulo" id="titulo" class="autosize form-control" value="{{$cartera_servicio->titulo}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Mes:</label>
              <input disabled="true" name="mes" id="mes" class="autosize form-control" value="{{$cartera_servicio->mes}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Anio:</label>
              <input disabled="true" name="anio" id="anio" class="autosize form-control" value="{{$cartera_servicio->anio}}" type="text" step="any">
            </div>
      	</div>
        <br>
        <div class="panel-body">
            <div class="panel panel-info">
              <div class="panel-heading">Cartera de Servicio</div>
              <div class="panel-body">
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			  <div class="table-responsive">
          			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
          			<thead style="background-color:#A9D0F5">
          				<th>Especialidad</th>
          				<th>Servicios</th>
          				<th>Dias</th>
          				<th>Horas</th>
          				<th>Observaciones</th>
          			</thead>
          			<tbody>
	                <div id="especialidades">
	                	@foreach($especialidades as $var)
	                      	<tr id="fila_datos{{$var -> id}}">
	                          <td class="center">{{$var -> nombre}} </td>
	                          <td class="center" id="especialidad_servicio{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_dia{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_hora{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_observacion{{$var -> id}}"></td>
	                      </tr>
	                  	@endforeach
	                </div>
                </tbody>
          			</table>
          			</div>
          		</div>
              </div>
             </div>
             <div class="col-sm-8 col-sm-offset-2">
               <div class="form-group">
               	<a href="javascript:history.back(1)">
               		<button class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> Guardar Cartera de Servicio </i>
                </button>
               	</a>
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
var servicios = {!! $servicios_json !!};

console.log(servicios);

for(i=0;i<servicios.length;i++){
	var fila_servicio = '<div><input style="margin-bottom: 14px;" disabled="true" type="text" value="'+servicios[i]['nombre']+'"></br></div>';
	var fila_dia = '<div><input style="margin-bottom: 14px;" disabled="true" type="text" value="'+servicios[i]['dias']+'"></br></div>';
	var fila_hora = '<div><input style="margin-bottom: 14px;" disabled="true" type="text" value="'+servicios[i]['hora']+'"></br></div>';
	var fila_observacion = '<div><input style="margin-bottom: 14px;" disabled="true" type="text" value="'+servicios[i]['observacion']+'"></br></div>';
	$('#especialidad_servicio'+servicios[i]['id_detalle_centro_especialidad']).append(fila_servicio);
	$('#especialidad_dia'+servicios[i]['id_detalle_centro_especialidad']).append(fila_dia);
	$('#especialidad_hora'+servicios[i]['id_detalle_centro_especialidad']).append(fila_hora);
	$('#especialidad_observacion'+servicios[i]['id_detalle_centro_especialidad']).append(fila_observacion);
}


</script>
@endpush
@endsection
