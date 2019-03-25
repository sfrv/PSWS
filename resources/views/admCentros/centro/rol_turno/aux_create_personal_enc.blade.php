@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>ROL DE TURNO - ETAPA DE PERSONAL ENCARGADO</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
      	<h3 align="center">PANEL DE REGISTRO DE <span class="text-bold">ROL DE TURNO - PERSONAL ENCARGADO</span></h3>
      	<br>
      	
      	{!! Form::open(array('route'=>['store-rol-turno-personal-encargado',$id_centro,$id_rol_turno],'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="row">
        	@include('alertas.logrado')
      	</div>
        <br>
        <div>
            <div class="panel panel-info">
              	<div class="panel-heading">
              		<div class="row">
	              		<div class="col-lg-11 col-md-11 col-dm-11 col-xs-10">
	              			ETAPA DE PERSONAL ENCARGADO
	              		</div>
	              		<div>
	              			<button type="button" class="btn btn-info" onclick="agregarFilaPersonal();"><i class="fa fa-plus"></i></button>
	              		</div>
              		</div>
              	</div>
              <div class="panel-body">
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			<div class="table-responsive">
          				<div id="table-scroll" class="table-scroll">
          					<div class="table-wrap">
          						<table class="main-table" id="table_personal">
          							
          						</table>
          					</div>
          				</div>
          			</div>
          		</div>
              </div>
             </div>
             <div class="col-sm-8 col-sm-offset-2">
               <div class="form-group">
               	<button onclick="guardar()" class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> REGISTRAR ETAPA PERSONAL ENC. </i>
                </button>
               </div>
             </div>
             {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
<div id="progress_bar" hidden class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%;height: 80%">
      Cargando, Por favor Espere.
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

var contp = 0;
var conth = 0;
var cont = 0;

var datos = [];
var filas = [];
var datos_filas = [];

function agregarFilaPersonal() {
	var fila_personal = '<thead style="background-color:#A9D0F5" id="fila_datos_head'+contp+'">'+
			'<tr>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">'+
					'<input  placeholder="Nombre de Cargo" class="autosize form-control" name="text_personal'+contp+'" type="text">'+
					'<input type="hidden" name="idpersonal[]" value="'+contp+'">'+
				'</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Turno</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Lunes</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Martes</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Miercoles</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Jueves</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Viernes</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Sabado</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Domingo</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col">Op1</th>'+
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col"><button type="button" class="btn btn-info" onclick="agregarFilaHora('+contp+');"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-danger" onclick="eliminarFilaPersonal('+contp+');"><i class="fa fa-close"></i></button></th>'+
			'</tr>'+
		'</thead>'+
		'<tbody id="fila_datos_body'+contp+'">'+
		'</tbody>';
	contp++;
	$('#table_personal').append(fila_personal);
}

function agregarFilaHora(id) {//id cargo
	var fila_hora ='<tr id="fila_h'+conth+'">'+
		'<td class="text-center" id="arrays'+conth+'">'+
			'<input type="hidden" name="idturnos'+id+'[]" value="'+conth+'">'+
		'-</td>'+
		'<td class="text-center">'+
			'<input  placeholder="TITULO..." class="autosize form-control" name="text_turno'+conth+'" type="text">'+
			'<input  placeholder="HORA INICIO..." class="autosize form-control" name="text_hora_inicio'+conth+'" type="text">'+
			'<input  placeholder="HORA FIN..." class="autosize form-control" name="text_hora_fin'+conth+'" type="text">'+
		'</td>'+
		'<td class="text-center" id="lunes'+conth+'"></td>'+ //lunes
		'<td class="text-center" id="martes'+conth+'"></td>'+ //martes
		'<td class="text-center" id="miercoles'+conth+'"></td>'+ //miercoles
		'<td class="text-center" id="jueves'+conth+'"></td>'+ //jueves
		'<td class="text-center" id="viernes'+conth+'"></td>'+ //viernes
		'<td class="text-center" id="sabado'+conth+'"></td>'+ //sabado
		'<td class="text-center" id="domingo'+conth+'"></td>'+ //domingo
		'<td class="text-center" id="opcion'+conth+'"></td>'+
		'<td class="text-center"> <button type="button" class="btn btn-info" onclick="agregarFila('+id+','+conth+');"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-danger" onclick="eliminarFilaHora('+conth+');"><i class="fa fa-close"></i></button> </td>'+
		'</tr>';
	conth++;
	$('#fila_datos_body'+id).append(fila_hora);
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

function eliminarFilaPersonal(contp_l)
{
	$('#fila_datos_body'+contp_l).remove();
	$('#fila_datos_head'+contp_l).remove();
}

function guardar() {
	
	document.getElementById("progress_bar").hidden = false;
	
}


</script>
@endpush
@endsection