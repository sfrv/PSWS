@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>CARTERA DE SERVICIO</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 align="center">PANEL DE REGISTRO DE <span class="text-bold">CARTERA DE SERVICIO</span></h3>
      	<br>
        {!! Form::open(array('route'=>['store-cartera-servicio',$id_centro],'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}

      	<div class="row">
        	<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	          <label for="form-field-24">TITULO:</label>
            <input placeholder="TITULO DE LA CARTERA DE SERVICIO..." required="required" name="titulo" id="titulo" class="autosize form-control" type="text" step="any">
          </div>
          <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
            <label for="form-field-24">MES:</label>
            <select name="mes" id="mes" class="form-control selectpicker">
              @foreach($meses as $var)
                @if($var == $mes_actual)
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
                @if($var == $anio_actual)
                  <option value="{{$var}}" selected>{{$var}}</option>
                @else
                  <option value="{{$var}}">{{$var}}</option>
                @endif
              @endforeach
            </select>
          </div>
      	</div>
        <br>
        <div class="panel-body">
            <div class="panel panel-info">
              <div class="panel-heading">CREACION DE CARTERA DE SERVICIO</div>
              <div class="panel-body">
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			  <div class="table-responsive">
          			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
          			<thead style="background-color:#A9D0F5">
          				<th class="text-center">ESPECIALIDAD</th>
          				<th class="text-center">SERVICIOS</th>
          				<th class="text-center">DIAS</th>
          				<th class="text-center">HORAS</th>
          				<th class="text-center">OBSERVACIONES</th>
          				<th class="text-center">OPCION 1</th>
          				<th class="text-center">OPCION 2</th>
          			</thead>
          			<tbody>
	                <div id="especialidades">
	                	@foreach($detalle as $var)
	                      <tr id="fila_datos{{$var -> id}}">
	                          <td class="text-center">{{$var -> nombre}} </td>
	                          <td class="text-center" id="especialidad_servicio{{$var -> id}}"></td>
	                          <td class="text-center" id="especialidad_dia{{$var -> id}}"></td>
	                          <td class="text-center" id="especialidad_hora{{$var -> id}}"></td>
	                          <td class="text-center" id="especialidad_observacion{{$var -> id}}"></td>
	                          <td class="text-center" id="especialidad_opcion{{$var -> id}}"></td>
	                          <td class="text-center"><button type="button" class="btn btn-info" onclick="agregar({{$var -> id}});"><i class="fa fa-plus"></i></button></td>
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
               	<button class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> REGISTRAR CARTERA DE SERVICIO </i>
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
var x = document.getElementById("mynav");
x.className += " sidebar-collapse";

var cont = 0;

function agregar(id)
{
  var fila_servicio = '<div id="fila_s'+cont+'">'+
    '<input type="hidden" name="idservicios[]" value="'+cont+'">'+
    '<input type="hidden" name="idespecialidad[]" value="'+id+'">'+
    '<select name="text_s'+cont+'" class="form-control selectpicker">'+
      '@foreach($nombres_servicios as $var)'+
      ' <option value="{{$var}}">{{$var}}</option> '+
      '@endforeach'+
    '</select> '+
  '</br></div>';

	var fila_dia = '<div id="fila_d'+cont+'">'+
        '<input class="autosize form-control" name="text_d'+cont+'" type="text" step="any"> </br>'+
      '</div>';
	var fila_hora ='<div id="fila_h'+cont+'">'+
        '<input class="autosize form-control" name="text_h'+cont+'" type="text" step="any"> <br>'+
      '</div>';
	var fila_observacion = '<div id="fila_ob'+cont+'">'+
        '<input class="autosize form-control" name="text_o'+cont+'" type="text" step="any"><br>'+
      '</div>';
	var fila_opcion = '<div id="fila_op'+cont+'">'+
        '<button style="margin-bottom: 20px;" type="button" class="btn btn-danger" onclick="eliminar('+cont+');"><i class="fa fa-close"></i></button><br>'+
      '</div>';
	cont++;
	$('#especialidad_servicio'+id).append(fila_servicio);
	$('#especialidad_dia'+id).append(fila_dia);
	$('#especialidad_hora'+id).append(fila_hora);
	$('#especialidad_observacion'+id).append(fila_observacion);
	$('#especialidad_opcion'+id).append(fila_opcion);
}

function eliminar(cont)
{
	$('#fila_s'+cont).remove();
	$('#fila_d'+cont).remove();
	$('#fila_h'+cont).remove();
	$('#fila_ob'+cont).remove();
	$('#fila_op'+cont).remove();
}

</script>
@endpush
@endsection
