@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>ROL DE TURNO - ETAPA DE EMERGENCIA</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
      	<h3 align="center">PANEL DE REGISTRO DE <span class="text-bold">ROL DE TURNO - ETAPA DE EMERGENCIA</span></h3>
      	<br>
      	
      	{!! Form::open(array('route'=>['store-rol-turno',$id],'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="row">
        	<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	            <label for="form-field-24">TITULO:</label>
                <input required placeholder="TITULO DEL ROL DE TURNO..." name="titulo" id="titulo" class="autosize form-control" type="text" step="any">
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
        <div>
            <div class="panel panel-info">
              <div class="panel-heading">CREACION DE ROL DE TURNO - ETAPA DE EMERGENCIA</div>
              <div class="panel-body">
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			<div class="table-responsive">
          				<div id="table-scroll" class="table-scroll">
          					<div class="table-wrap">
          						<table class="main-table">
          							@foreach($especialidades_etapa_emergencia as $var)
          							<thead style="background-color:#A9D0F5">
          								<tr>
          									<th class="text-center" style="background-color:#AAD0F5;" scope="col">Esp: {{$var -> nombre}} {{$var -> id}}</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Turno</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Lunes</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Martes</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Miercoles</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Jueves</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Viernes</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Sabado</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Domingo</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Op1</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col"><button type="button" class="btn btn-info" onclick="agregarFilaHora({{$var -> id}});"><i class="fa fa-plus"></i></button></th>
          								</tr>
          							</thead>
          							
          							<tbody id="fila_datos{{$var -> id}}">
          								
          							</tbody>
          							@endforeach
          						</table>
          					</div>
          				</div>
          			</div>
          		</div>
              </div>
             </div>
             <div class="col-sm-8 col-sm-offset-2">
               <div class="form-group">
               	<button class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> REGISTRAR ROL DE TURNO - ETAPA EMERGENCIA </i>
                </button>
               </div>
             </div>
             {!!Form::close()!!}
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

var conth = 0;
var cont = 0;

var datos = [];
var filas = [];
var datos_filas = [];

function agregarFilaHora(id) {//id especialidad
	var fila_hora ='<tr id="fila_h'+conth+'">'+
		'<td class="text-center" id="arrays'+conth+'">'+
			'<input type="hidden" name="idturnos[]" value="'+conth+'">'+
			'<input type="hidden" name="idespecialidad[]" value="'+id+'">'+
		'-</td>'+
		'<td class="text-center">'+
			'<input required placeholder="TITULO..." class="autosize form-control" name="text_turno'+conth+'" type="text">'+
			'<input required placeholder="HORA INICIO..." class="autosize form-control" name="text_hora_inicio'+conth+'" type="text">'+
			'<input required placeholder="HORA FIN..." class="autosize form-control" name="text_hora_fin'+conth+'" type="text">'+
		'</td>'+
		'<td class="text-center" id="lunes'+conth+'"></td>'+ //lunes
		'<td class="text-center" id="martes'+conth+'"></td>'+ //martes
		'<td class="text-center" id="miercoles'+conth+'"></td>'+ //miercoles
		'<td class="text-center" id="jueves'+conth+'"></td>'+ //jueves
		'<td class="text-center" id="viernes'+conth+'"></td>'+ //viernes
		'<td class="text-center" id="sabado'+conth+'"></td>'+ //sabado
		'<td class="text-center" id="domingo'+conth+'"></td>'+ //domingo
		'<td class="text-center" id="opcion'+conth+'"></td>'+
		'<td class="text-center"> <button type="button" class="btn btn-success" onclick="agregarFila('+id+','+conth+');"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-warning" onclick="eliminarFilaHora('+conth+');"><i class="fa fa-close"></i></button> </td>'+
		'</tr>';
	conth++;
	$('#fila_datos'+id).append(fila_hora);
}
// id="fila_dias_turno_'+conth_l+'_'+cont+'"
function agregarFila(id_l,conth_l) {
	var my_array = '<div id="fila_d_arr'+cont+'"><input type="hidden" name="id_filas_turno'+conth_l+'[]" value="'+cont+'"></div>';
	var fila_lunes = '<div id="fila_d_l'+cont+'">'+
		'<select name="selec_dia_lunes'+cont+'" class="form-control selectpicker">'+
			'<option value="-1">Ninguno</option>'+
			'@foreach($medicos as $var)'+
				'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
			'@endforeach'+
		'</select></br></div>';
	var fila_martes = '<div id="fila_d_m'+cont+'">'+
	'<select name="selec_dia_martes'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_miercoles = '<div id="fila_d_mi'+cont+'">'+
	'<select name="selec_dia_miercoles'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_jueves = '<div id="fila_d_j'+cont+'">'+
	'<select name="selec_dia_jueves'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_viernes = '<div id="fila_d_v'+cont+'">'+
	'<select name="selec_dia_viernes'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_sabado = '<div id="fila_d_s'+cont+'">'+
	'<select name="selec_dia_sabado'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_domingo = '<div id="fila_d_d'+cont+'">'+
	'<select name="selec_dia_domingo'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_opcion = '<div style="margin-bottom: 20px;" id="fila_op'+cont+'"><button type="button" class="btn btn-danger" onclick="eliminarFila('+cont+','+conth+');"><i class="fa fa-close"></i></button><br></div>';
	cont++;
	$('#arrays'+conth_l).append(my_array);
	$('#lunes'+conth_l).append(fila_lunes);
	$('#martes'+conth_l).append(fila_martes);
	$('#miercoles'+conth_l).append(fila_miercoles);
	$('#jueves'+conth_l).append(fila_jueves);
	$('#viernes'+conth_l).append(fila_viernes);
	$('#sabado'+conth_l).append(fila_sabado);
	$('#domingo'+conth_l).append(fila_domingo);
	$('#opcion'+conth_l).append(fila_opcion);
}

function eliminarFila(cont_l,conth_l) {
	$('#fila_d_arr'+cont_l).remove();
	$('#fila_d_l'+cont_l).remove();
	$('#fila_d_m'+cont_l).remove();
	$('#fila_d_mi'+cont_l).remove();
	$('#fila_d_j'+cont_l).remove();
	$('#fila_d_v'+cont_l).remove();
	$('#fila_d_s'+cont_l).remove();
	$('#fila_d_d'+cont_l).remove();
	$('#fila_op'+cont_l).remove();
}

function eliminarFilaHora(conth_l)
{
	$('#fila_h'+conth_l).remove();
}


</script>
@endpush
@endsection