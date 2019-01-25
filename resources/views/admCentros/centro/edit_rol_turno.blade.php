@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Editar Rol de Turno: {{$rol_turno->mes}} {{$rol_turno->anio}}</b> * * * * *
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
                <input name="titulo" id="titulo" class="autosize form-control" value="{{$rol_turno->titulo}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Mes:</label>
              <input name="mes" id="mes" class="autosize form-control" value="{{$rol_turno->mes}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Anio:</label>
              <input name="anio" id="anio" class="autosize form-control" value="{{$rol_turno->anio}}" type="text" step="any">
            </div>
      	</div>
        <br>
        <div>
            <div class="panel panel-info">
              <div class="panel-heading">Rol de Turno</div>
              <div class="panel-body">
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			<div class="table-responsive">
          				<div id="table-scroll" class="table-scroll">
          					<div class="table-wrap">
          						<table class="main-table">
          							@foreach($especialidades as $var)
          							<thead style="background-color:#A9D0F5">
          								<tr>
          									<th style="background-color:#AAD0F5;" scope="col">Esp: {{$var -> nombre}} {{$var -> id}}</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Turno</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Lunes</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Martes</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Miercoles</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Jueves</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Viernes</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Sabado</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Domingo</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Op1</th>
					          				<th style="background-color:#AAD0F5;" scope="col"><button type="button" class="btn btn-info" onclick="agregarFilaHora({{$var -> id}});">+</button></th>
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
               	<button onclick="actualizar_()" class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> Editar Rol de Turno </i>
                </button>
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

var conth = 0;
var cont = 0;
var turnos = {!! $turnos_json !!};
var rol_dias = {!! $rol_dias_json !!};
var medicos_j = {!! $medicos_json !!};
var datos_filas = [];//los que se van a actualizar
var datos_filas_eliminar = [];//los que seran eliminados
var datos_filas_crear = [];
var datos_filas_crear_rol_dia = [];
// console.log(turnos);
// console.log(rol_dias);
// console.log(medicos_j);

for (var i = 0; i < turnos.length; i++) {
	var fila_hora ='<tr id="fila_h'+conth+'">'+
		'<td>-</td>'+
		'<td><input value="'+turnos[i]['nombre']+'" style="line-height: 20px;margin-bottom: 14px;" id="text_t'+conth+'" type="text"> <br> <input style="line-height: 20px;margin-bottom: 14px;" id="text_hi'+conth+'" type="text" value="'+turnos[i]['hora_inicio']+'"> <br> <input value="'+turnos[i]['hora_fin']+'" style="line-height: 20px;margin-bottom: 14px;" id="text_hf'+conth+'" type="text"> </td>'+
		'<td id="lunes'+conth+'"></td>'+ //lunes
		'<td id="martes'+conth+'"></td>'+ //martes
		'<td id="miercoles'+conth+'"></td>'+ //miercoles
		'<td id="jueves'+conth+'"></td>'+ //jueves
		'<td id="viernes'+conth+'"></td>'+ //viernes
		'<td id="sabado'+conth+'"></td>'+ //sabado
		'<td id="domingo'+conth+'"></td>'+ //domingo
		'<td id="opcion'+conth+'"></td>'+
		'<td> <button type="button" class="btn btn-success" onclick="agregarFila('+turnos[i]['id_detalle_centro_especialidad']+','+conth+','+turnos[i]['id']+');">+</button> <button type="button" class="btn btn-warning" onclick="eliminarFilaHora('+conth+');">x</button> </td>'+
		'</tr>';
	$('#fila_datos'+turnos[i]['id_detalle_centro_especialidad']).append(fila_hora);

	var c = 0;
	while ( c < rol_dias.length ){
		// var array_dias_id_anterior = [];
		if (turnos[i]['id'] == rol_dias[c]['id_turno']) {
			//0 1 2 3 4 5 6
			var fila_lunes = '<div id="fila_d_l'+cont+'">'+
					'<select id="sel_d_l'+cont+'" style="width: 150px;" class="form-control selectpicker">'+
					'<option value="-1'+'_'+rol_dias[c]['id']+'" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] === rol_dias[c]['id_medico']) {
							fila_lunes = fila_lunes + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_lunes = fila_lunes + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			// array_dias_id_anterior.push();
			fila_lunes = fila_lunes + '</select></br></div>';
			c++;
			var fila_martes = '<div id="fila_d_m'+cont+'">'+
					'<select id="sel_d_m'+cont+'" style="width: 150px;" class="form-control selectpicker">'+
					'<option value="-1'+'_'+rol_dias[c]['id']+'" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] === rol_dias[c]['id_medico']) {
							fila_martes = fila_martes + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_martes = fila_martes + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_martes = fila_martes + '</select></br></div>';
			c++;
			var fila_miercoles = '<div id="fila_d_mi'+cont+'">'+
					'<select id="sel_d_mi'+cont+'" style="width: 150px;" class="form-control selectpicker">'+
					'<option value="-1'+'_'+rol_dias[c]['id']+'" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] === rol_dias[c]['id_medico']) {
							fila_miercoles = fila_miercoles + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_miercoles = fila_miercoles + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_miercoles = fila_miercoles + '</select></br></div>';
			c++;
			var fila_jueves = '<div id="fila_d_j'+cont+'">'+
					'<select id="sel_d_j'+cont+'" style="width: 150px;" class="form-control selectpicker">'+
					'<option value="-1'+'_'+rol_dias[c]['id']+'" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] === rol_dias[c]['id_medico']) {
							fila_jueves = fila_jueves + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_jueves = fila_jueves + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_jueves = fila_jueves + '</select></br></div>';
			c++;
			var fila_viernes = '<div id="fila_d_v'+cont+'">'+
					'<select id="sel_d_v'+cont+'" style="width: 150px;" class="form-control selectpicker">'+
					'<option value="-1'+'_'+rol_dias[c]['id']+'" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] === rol_dias[c]['id_medico']) {
							fila_viernes = fila_viernes + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_viernes = fila_viernes + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_viernes = fila_viernes + '</select></br></div>';
			c++;
			var fila_sabado = '<div id="fila_d_s'+cont+'">'+
					'<select id="sel_d_s'+cont+'" style="width: 150px;" class="form-control selectpicker">'+
					'<option value="-1'+'_'+rol_dias[c]['id']+'" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] === rol_dias[c]['id_medico']) {
							fila_sabado = fila_sabado + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_sabado = fila_sabado + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_sabado = fila_sabado + '</select></br></div>';
			c++;
			var fila_domingo = '<div id="fila_d_d'+cont+'">'+
					'<select id="sel_d_d'+cont+'" style="width: 150px;" class="form-control selectpicker">'+
					'<option value="-1'+'_'+rol_dias[c]['id']+'" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] === rol_dias[c]['id_medico']) {
							fila_domingo = fila_domingo + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_domingo = fila_domingo + '<option value="'+medicos_j[j]['id']+'_'+rol_dias[c]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_domingo = fila_domingo + '</select></br></div>';
			c++;

			var fila_opcion = '<div style="margin-bottom: 20px;" id="fila_op'+cont+'"><button type="button" class="btn btn-warning" onclick="eliminarFila('+cont+');"><i class="fa fa-close"></i></button><br></div>';

			var fila = [];
			fila.push(cont,conth,turnos[i]['id_detalle_centro_especialidad'],turnos[i]['id']);//new
			datos_filas.splice(cont, 0, fila);
			cont++;
			$('#lunes'+conth).append(fila_lunes);
			$('#martes'+conth).append(fila_martes);
			$('#miercoles'+conth).append(fila_miercoles);
			$('#jueves'+conth).append(fila_jueves);
			$('#viernes'+conth).append(fila_viernes);
			$('#sabado'+conth).append(fila_sabado);
			$('#domingo'+conth).append(fila_domingo);
			$('#opcion'+conth).append(fila_opcion);
			// console.log(datos_filas);
			// c = c + 7;
		}else{
			c++;
		}

	}
	conth++;
}

function agregarFila(id_l,conth_l,id_turno_l) {
	// console.log(id_turno_l);
	var fila_lunes = '<div id="fila_d_l'+cont+'"><select id="sel_d_l'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_martes = '<div id="fila_d_m'+cont+'"><select id="sel_d_m'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_miercoles = '<div id="fila_d_mi'+cont+'"><select id="sel_d_mi'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_jueves = '<div id="fila_d_j'+cont+'"><select id="sel_d_j'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_viernes = '<div id="fila_d_v'+cont+'"><select id="sel_d_v'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_sabado = '<div id="fila_d_s'+cont+'"><select id="sel_d_s'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_domingo = '<div id="fila_d_d'+cont+'"><select id="sel_d_d'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';

	var fila_opcion = '<div style="margin-bottom: 20px;" id="fila_op'+cont+'"><button type="button" class="btn btn-danger" onclick="eliminarFila('+cont+');"><i class="fa fa-close"></i></button><br></div>';
	var fila = [];//new
	fila.push(cont,conth_l,id_l,id_turno_l);//new
	if (id_turno_l == -1) {//para crear turnos y rol dias 
		datos_filas_crear.splice(cont, 0, fila);//new
	}else{//para solo crear rol dias
		datos_filas_crear_rol_dia.splice(cont, 0, fila);//new
	}
	cont++;
	// px_fila_hora = px_fila_hora + 34;
	$('#lunes'+conth_l).append(fila_lunes);
	$('#martes'+conth_l).append(fila_martes);
	$('#miercoles'+conth_l).append(fila_miercoles);
	$('#jueves'+conth_l).append(fila_jueves);
	$('#viernes'+conth_l).append(fila_viernes);
	$('#sabado'+conth_l).append(fila_sabado);
	$('#domingo'+conth_l).append(fila_domingo);
	$('#opcion'+conth_l).append(fila_opcion);
	console.log("nuevos turnos y rol: ");
	console.log(datos_filas_crear);
	console.log("nuevos rol: ");
	console.log(datos_filas_crear_rol_dia);
}

function agregarFilaHora(id) {//id especialidad
	// console.log(id);
	
	var fila_hora ='<tr id="fila_h'+conth+'">'+
		'<td>-</td>'+
		'<td><input placeholder="Titulo..." style="line-height: 20px;margin-bottom: 14px;" id="text_t'+conth+'" type="text"> <br> <input placeholder="Hora Inicio..." style="line-height: 20px;margin-bottom: 14px;" id="text_hi'+conth+'" type="text"> <br> <input placeholder="Hora Fin..." style="line-height: 20px;margin-bottom: 14px;" id="text_hf'+conth+'" type="text"> </td>'+
		'<td id="lunes'+conth+'"></td>'+ //lunes
		'<td id="martes'+conth+'"></td>'+ //martes
		'<td id="miercoles'+conth+'"></td>'+ //miercoles
		'<td id="jueves'+conth+'"></td>'+ //jueves
		'<td id="viernes'+conth+'"></td>'+ //viernes
		'<td id="sabado'+conth+'"></td>'+ //sabado
		'<td id="domingo'+conth+'"></td>'+ //domingo
		'<td id="opcion'+conth+'"></td>'+
		'<td> <button type="button" class="btn btn-success" onclick="agregarFila('+id+','+conth+',-1'+');">+</button> <button type="button" class="btn btn-danger" onclick="eliminarFilaHora('+conth+');">x</button> </td>'+
		'</tr>';
	conth++;
	$('#fila_datos'+id).append(fila_hora);
}

function eliminarFila(cont_l) {
	var n_i = getIndDato(cont_l,datos_filas_crear,0);
	if (n_i != -1) {
		datos_filas_crear.splice(n_i,1);
		$('#fila_d_l'+cont_l).remove();
		$('#fila_d_m'+cont_l).remove();
		$('#fila_d_mi'+cont_l).remove();
		$('#fila_d_j'+cont_l).remove();
		$('#fila_d_v'+cont_l).remove();
		$('#fila_d_s'+cont_l).remove();
		$('#fila_d_d'+cont_l).remove();
		$('#fila_op'+cont_l).remove();
	}

	var n_i = getIndDato(cont_l,datos_filas_crear_rol_dia,0);
	if (n_i != -1) {
		datos_filas_crear_rol_dia.splice(n_i,1);
		$('#fila_d_l'+cont_l).remove();
		$('#fila_d_m'+cont_l).remove();
		$('#fila_d_mi'+cont_l).remove();
		$('#fila_d_j'+cont_l).remove();
		$('#fila_d_v'+cont_l).remove();
		$('#fila_d_s'+cont_l).remove();
		$('#fila_d_d'+cont_l).remove();
		$('#fila_op'+cont_l).remove();
	}

	n_i = getIndDato(cont_l,datos_filas,0);
	if (n_i != -1) {
		// console.log(datos_filas[n_i]);
		datos_filas_eliminar.push(datos_filas[n_i]);
		datos_filas.splice(n_i,1);
		$('#fila_d_l'+cont_l).remove();
		$('#fila_d_m'+cont_l).remove();
		$('#fila_d_mi'+cont_l).remove();
		$('#fila_d_j'+cont_l).remove();
		$('#fila_d_v'+cont_l).remove();
		$('#fila_d_s'+cont_l).remove();
		$('#fila_d_d'+cont_l).remove();
		$('#fila_op'+cont_l).remove();
	}
	console.log("nuevos: ");
	console.log(datos_filas_crear);
	console.log("viejos: ");
	console.log(datos_filas);
	console.log("eliminar: ");
	console.log(datos_filas_eliminar);
}

function eliminarFilaHora(conth_l)
{
	var n_i = getIndDato(conth_l,datos_filas_crear,1);
	while( n_i != -1 ){
		datos_filas_crear.splice(n_i,1);
		n_i = getIndDato(conth_l,datos_filas_crear,1);
	}

	var n_i = getIndDato(conth_l,datos_filas_crear_rol_dia,1);
	while( n_i != -1 ){
		datos_filas_crear_rol_dia.splice(n_i,1);
		n_i = getIndDato(conth_l,datos_filas_crear_rol_dia,1);
	}

	n_i = getIndDato(conth_l,datos_filas,1);
	while( n_i != -1 ){
		datos_filas_eliminar.push(datos_filas[n_i]);
		datos_filas.splice(n_i,1);
		n_i = getIndDato(conth_l,datos_filas,1);
	}

	$('#fila_h'+conth_l).remove();
	console.log("nuevos: ");
	console.log(datos_filas_crear);
	console.log("viejos: ");
	console.log(datos_filas);
	console.log("eliminar: ");
	console.log(datos_filas_eliminar);
}

function actualizar_() {
	var array_objetos_turnos_actualizar = [];
	var array_objetos_turnos_eliminar = [];
	var array_objetos_rol_dias_actualizar = [];
	var array_objetos_rol_dias_eliminar = [];
	var array_objetos_rol_dias_crear = [];
	var array_conth_local = [];
	var array_turnos_eliminar_id = [];

	for (var i = 0; i < datos_filas.length; i++) {
		
		if (!array_conth_local.includes(datos_filas[i][1])) {
			array_conth_local.push(datos_filas[i][1]);
			var conth = datos_filas[i][1];
			array_turnos_eliminar_id.push(datos_filas[i][3]);
			var hora_inicio = document.getElementById("text_hi"+conth).value;
			var hora_fin = document.getElementById("text_hf"+conth).value;
			var titulo = document.getElementById("text_t"+conth).value;
			// var id_turno_anterior = filas_conth_id[i];
			objeto_turno = {
				"hora_inicio": hora_inicio,
				"hora_fin": hora_fin,
				"titulo": titulo,
				"id": datos_filas[i][3]
			}
			array_objetos_turnos_actualizar.push(objeto_turno);
		}

		var cont = datos_filas[i][0];
		var datos_lunes = document.getElementById("sel_d_l"+cont).value.split('_');
		var lunes_id_doctor = datos_lunes[0];
		var lunes_id = datos_lunes[1];
		var datos_martes = document.getElementById("sel_d_m"+cont).value.split('_');
		var martes_id_doctor = datos_martes[0];
		var martes_id = datos_martes[1];
		var datos_miercoles = document.getElementById("sel_d_mi"+cont).value.split('_');
		var miercoles_id_doctor = datos_miercoles[0];
		var miercoles_id = datos_miercoles[1];
		var datos_jueves = document.getElementById("sel_d_j"+cont).value.split('_');
		var jueves_id_doctor = datos_jueves[0];
		var jueves_id = datos_jueves[1];
		var datos_viernes = document.getElementById("sel_d_v"+cont).value.split('_');
		var viernes_id_doctor = datos_viernes[0];
		var viernes_id = datos_viernes[1];
		var datos_sabado = document.getElementById("sel_d_s"+cont).value.split('_');
		var sabado_id_doctor = datos_sabado[0];
		var sabado_id = datos_sabado[1];
		var datos_domingo = document.getElementById("sel_d_d"+cont).value.split('_');
		var domingo_id_doctor = datos_domingo[0];
		var domingo_id = datos_domingo[1];

		objeto_dia = { //lunes
			"id_doctor": lunes_id_doctor,
			"id": lunes_id
		};
		array_objetos_rol_dias_actualizar.push(objeto_dia);
		objeto_dia = {//martes
			"id_doctor": martes_id_doctor,
			"id": martes_id
		};
		array_objetos_rol_dias_actualizar.push(objeto_dia);
		objeto_dia = {//miercoles
			"id_doctor": miercoles_id_doctor,
			"id": miercoles_id
		};
		array_objetos_rol_dias_actualizar.push(objeto_dia);
		objeto_dia = {//jueves
			"id_doctor": jueves_id_doctor,
			"id": jueves_id
		};
		array_objetos_rol_dias_actualizar.push(objeto_dia);
		objeto_dia = {//viernes
			"id_doctor": viernes_id_doctor,
			"id": viernes_id
		};
		array_objetos_rol_dias_actualizar.push(objeto_dia);
		objeto_dia = {//sabado
			"id_doctor": sabado_id_doctor,
			"id": sabado_id
		};
		array_objetos_rol_dias_actualizar.push(objeto_dia);
		objeto_dia = {//domingo
			"id_doctor": domingo_id_doctor,
			"id": domingo_id
		};
		array_objetos_rol_dias_actualizar.push(objeto_dia);
	}

	for (var i = 0; i < datos_filas_eliminar.length; i++) {
		if (!array_turnos_eliminar_id.includes(datos_filas_eliminar[i][3]) && !array_objetos_turnos_eliminar.includes(datos_filas_eliminar[i][3])) {
			array_objetos_turnos_eliminar.push(datos_filas_eliminar[i][3]);
		}
		var cont_l = datos_filas_eliminar[i][0];
		var datos_dia = document.getElementById("sel_d_l"+cont_l).value.split('_');
		array_objetos_rol_dias_eliminar.push(datos_dia[1]);
		datos_dia = document.getElementById("sel_d_m"+cont_l).value.split('_');
		array_objetos_rol_dias_eliminar.push(datos_dia[1]);
		datos_dia = document.getElementById("sel_d_mi"+cont_l).value.split('_');
		array_objetos_rol_dias_eliminar.push(datos_dia[1]);
		datos_dia = document.getElementById("sel_d_j"+cont_l).value.split('_');
		array_objetos_rol_dias_eliminar.push(datos_dia[1]);
		datos_dia = document.getElementById("sel_d_v"+cont_l).value.split('_');
		array_objetos_rol_dias_eliminar.push(datos_dia[1]);
		datos_dia = document.getElementById("sel_d_s"+cont_l).value.split('_');
		array_objetos_rol_dias_eliminar.push(datos_dia[1]);
		datos_dia = document.getElementById("sel_d_d"+cont_l).value.split('_');
		array_objetos_rol_dias_eliminar.push(datos_dia[1]);
	}

	for (var i = 0; i < datos_filas_crear_rol_dia.length; i++) {
		var cont = datos_filas_crear_rol_dia[i][0];
		var id_turno = datos_filas_crear_rol_dia[i][3];

		var id_doctor = document.getElementById("sel_d_l"+cont).value;//lunes
		objeto_dia = { //lunes
			"id_doctor": id_doctor,
			"dia": 'lunes',
			"id_turno": id_turno
		};
		array_objetos_rol_dias_crear.push(objeto_dia);
		id_doctor = document.getElementById("sel_d_m"+cont).value;//martes
		objeto_dia = { //martes
			"id_doctor": id_doctor,
			"dia": 'martes',
			"id_turno": id_turno
		};
		array_objetos_rol_dias_crear.push(objeto_dia);
		id_doctor = document.getElementById("sel_d_mi"+cont).value;//miercoles
		objeto_dia = { //miercoles
			"id_doctor": id_doctor,
			"dia": 'miercoles',
			"id_turno": id_turno
		};
		array_objetos_rol_dias_crear.push(objeto_dia);
		id_doctor = document.getElementById("sel_d_j"+cont).value;//jueves
		objeto_dia = { //jueves
			"id_doctor": id_doctor,
			"dia": 'jueves',
			"id_turno": id_turno
		};
		array_objetos_rol_dias_crear.push(objeto_dia);
		id_doctor = document.getElementById("sel_d_v"+cont).value;//viernes
		objeto_dia = { //viernes
			"id_doctor": id_doctor,
			"dia": 'viernes',
			"id_turno": id_turno
		};
		array_objetos_rol_dias_crear.push(objeto_dia);
		id_doctor = document.getElementById("sel_d_s"+cont).value;//sabado
		objeto_dia = { //sabado
			"id_doctor": id_doctor,
			"dia": 'sabado',
			"id_turno": id_turno
		};
		array_objetos_rol_dias_crear.push(objeto_dia);
		id_doctor = document.getElementById("sel_d_d"+cont).value;//domingo
		objeto_dia = { //domingo
			"id_doctor": id_doctor,
			"dia": 'domingo',
			"id_turno": id_turno
		};
		array_objetos_rol_dias_crear.push(objeto_dia);
	}

	var datos_turnos = [];
	var especialidades = {!! $detalle2 !!};
	var ids_especialidades = [];
	var array_objeto_especialidades = [];

	for (var i = 0; i < especialidades.length; i++) {
		var id_especialidad = especialidades[i]['id'];
		var cont_array_turnos = [];

		for (var j = 0; j < datos_filas_crear.length; j++) {
			if (id_especialidad == datos_filas_crear[j][2]) {
				if (!cont_array_turnos.includes(datos_filas_crear[j][1])) {
					cont_array_turnos.push(datos_filas_crear[j][1]);
				}
			}
		}
		cont_array_turnos.sort(function(a, b){return a - b});
		
		var array_objetos_turnos = [];
		for (var k = 0; k < cont_array_turnos.length; k++) {
			var conth = cont_array_turnos[k];
			var hora_inicio = document.getElementById("text_hi"+conth).value;
			var hora_fin = document.getElementById("text_hf"+conth).value;
			var titulo = document.getElementById("text_t"+conth).value;

			var array_objetos_filas = [];
			var cont_array_filas = [];
			for (var m = 0; m < datos_filas_crear.length; m++) {
				if (conth == datos_filas_crear[m][1]) {
					cont_array_filas.push(datos_filas_crear[m][0]);
				}
			}
			// console.log(cont_array_filas);
			for (var n = 0; n < cont_array_filas.length; n++) {
				var cont = cont_array_filas[n];
				array_objetos_rol_dias = [];

				var id_doctor = document.getElementById("sel_d_l"+cont).value;//lunes
				objeto_dia = {
					"dia": 'lunes',
					"id_doctor": id_doctor
				};
				array_objetos_rol_dias.push(objeto_dia);
				id_doctor = document.getElementById("sel_d_m"+cont).value;//martes
				objeto_dia = {
					"dia": 'martes',
					"id_doctor": id_doctor
				};
				array_objetos_rol_dias.push(objeto_dia);
				id_doctor = document.getElementById("sel_d_mi"+cont).value;//miercoles
				objeto_dia = {
					"dia": 'miercoles',
					"id_doctor": id_doctor
				};
				array_objetos_rol_dias.push(objeto_dia);
				id_doctor = document.getElementById("sel_d_j"+cont).value;//jueves
				objeto_dia = {
					"dia": 'jueves',
					"id_doctor": id_doctor
				};
				array_objetos_rol_dias.push(objeto_dia);
				id_doctor = document.getElementById("sel_d_v"+cont).value;//viernes
				objeto_dia = {
					"dia": 'viernes',
					"id_doctor": id_doctor
				};
				array_objetos_rol_dias.push(objeto_dia);
				id_doctor = document.getElementById("sel_d_s"+cont).value;//sabado
				objeto_dia = {
					"dia": 'sabado',
					"id_doctor": id_doctor
				};
				array_objetos_rol_dias.push(objeto_dia);
				id_doctor = document.getElementById("sel_d_d"+cont).value;//domingo
				objeto_dia = {
					"dia": 'domingo',
					"id_doctor": id_doctor
				};
				array_objetos_rol_dias.push(objeto_dia);
				array_objetos_filas.push(array_objetos_rol_dias);
			}

			objeto_turno = {
				"hora_inicio": hora_inicio,
				"hora_fin": hora_fin,
				"titulo": titulo,
				"filas": array_objetos_filas
			}
			array_objetos_turnos.push(objeto_turno);
		}
		objeto_especialidad = {
			"id": id_especialidad,
			"turnos": array_objetos_turnos
		};
		array_objeto_especialidades.push(objeto_especialidad);
	}

	///////
	var titulo = document.getElementById("titulo").value;
	var mes = document.getElementById("mes").value;
	var anio = document.getElementById("anio").value;

	objeto = {
		"titulo": titulo,
		"mes": mes,
		"anio": anio,
		"id": "{{$rol_turno->id}}",
		"id_etapa_servicio_uno": "{{$etapa_servicio_uno->id}}",
		"turnos_actualizar": array_objetos_turnos_actualizar,
		"turnos_eliminar": array_objetos_turnos_eliminar,
		"rol_dias_actualizar": array_objetos_rol_dias_actualizar,
		"rol_dias_eliminar": array_objetos_rol_dias_eliminar,
		"rol_dias_crear": array_objetos_rol_dias_crear,
		"turnos_rol_crear": array_objeto_especialidades
	};

	console.log(objeto);
	var parametros = {
	    my_json: objeto
	};

	$.ajax({
  		type: "GET", 
  		url: "{{route('actualizar-rol-turno')}}",
  		data: parametros
  	}).done(function(info){
  		window.location.href = "{{url('adm/centro')}}";
  		console.log("--");
  	});

}

// function actualizar() {
// 	var datos_turnos = [];
// 	var especialidades = {!! $detalle2 !!};
// 	var ids_especialidades = [];
// 	array_objeto_especialidades = [];
	
// 	for (var i = 0; i < especialidades.length; i++) {
// 		var id_especialidad = especialidades[i]['id'];
// 		var cont_array_turnos = [];
// 		var cont_array_turnos_id = [];

// 		for (var j = 0; j < datos_filas.length; j++) {
// 			if (id_especialidad == datos_filas[j][2]) {
// 				if (!cont_array_turnos.includes(datos_filas[j][1])) {
// 					cont_array_turnos.push(datos_filas[j][1]);
// 					cont_array_turnos_id.push(datos_filas[j][3]);
// 				}
// 			}
// 		}
// 		cont_array_turnos.sort(function(a, b){return a - b});
// 		cont_array_turnos_id.sort(function(a, b){return a - b});
// 		// console.log(cont_array_turnos);
// 		// console.log(cont_array_turnos_id);
// 		var array_objetos_turnos = [];
// 		for (var k = 0; k < cont_array_turnos.length; k++) {
// 			var conth = cont_array_turnos[k];
// 			var hora_inicio = document.getElementById("text_hi"+conth).value;
// 			var hora_fin = document.getElementById("text_hf"+conth).value;
// 			var titulo = document.getElementById("text_t"+conth).value;
// 			var id_turno_anterior = cont_array_turnos_id[k];

// 			var array_objetos_filas = [];
// 			var cont_array_filas = [];
// 			for (var m = 0; m < datos_filas.length; m++) {
// 				if (conth == datos_filas[m][1]) {
// 					cont_array_filas.push(datos_filas[m][0]);
// 				}
// 			}
// 			// console.log(cont_array_filas);
// 			for (var n = 0; n < cont_array_filas.length; n++) {
// 				var cont_l = cont_array_filas[n];
// 				var datos_lunes = document.getElementById("sel_d_l"+cont_l).value.split('_');
// 				// var lunes = document.getElementById("sel_d_l"+cont_l).value;
// 				var lunes_id_doctor = datos_lunes[0];
// 				var lunes_id = datos_lunes[1];
// 				var datos_martes = document.getElementById("sel_d_m"+cont_l).value.split('_');
// 				// var martes = document.getElementById("sel_d_m"+cont_l).value;
// 				var martes_id_doctor = datos_martes[0];
// 				var martes_id = datos_martes[1];
// 				var datos_miercoles = document.getElementById("sel_d_mi"+cont_l).value.split('_');
// 				// var miercoles = document.getElementById("sel_d_mi"+cont_l).value;
// 				var miercoles_id_doctor = datos_miercoles[0];
// 				var miercoles_id = datos_miercoles[1];
// 				var datos_jueves = document.getElementById("sel_d_j"+cont_l).value.split('_');
// 				// var jueves = document.getElementById("sel_d_j"+cont_l).value;
// 				var jueves_id_doctor = datos_jueves[0];
// 				var jueves_id = datos_jueves[1];
// 				var datos_viernes = document.getElementById("sel_d_v"+cont_l).value.split('_');
// 				// var viernes = document.getElementById("sel_d_v"+cont_l).value;
// 				var viernes_id_doctor = datos_viernes[0];
// 				var viernes_id = datos_viernes[1];
// 				var datos_sabado = document.getElementById("sel_d_s"+cont_l).value.split('_');
// 				// var sabado = document.getElementById("sel_d_s"+cont_l).value;
// 				var sabado_id_doctor = datos_sabado[0];
// 				var sabado_id = datos_sabado[1];
// 				var datos_domingo = document.getElementById("sel_d_d"+cont_l).value.split('_');
// 				// var domingo = document.getElementById("sel_d_d"+cont_l).value;
// 				var domingo_id_doctor = datos_domingo[0];
// 				var domingo_id = datos_domingo[1];

// 				array_objetos_rol_dias = [];
// 				objeto_dia = { //lunes
// 					"id_doctor": lunes_id_doctor,
// 					"id": lunes_id
// 				};
// 				array_objetos_rol_dias.push(objeto_dia);
// 				objeto_dia = {//martes
// 					"id_doctor": martes_id_doctor,
// 					"id": martes_id
// 				};
// 				array_objetos_rol_dias.push(objeto_dia);
// 				objeto_dia = {//miercoles
// 					"id_doctor": miercoles_id_doctor,
// 					"id": miercoles_id
// 				};
// 				array_objetos_rol_dias.push(objeto_dia);
// 				objeto_dia = {//jueves
// 					"id_doctor": jueves_id_doctor,
// 					"id": jueves_id
// 				};
// 				array_objetos_rol_dias.push(objeto_dia);
// 				objeto_dia = {//viernes
// 					"id_doctor": viernes_id_doctor,
// 					"id": viernes_id
// 				};
// 				array_objetos_rol_dias.push(objeto_dia);
// 				objeto_dia = {//sabado
// 					"id_doctor": sabado_id_doctor,
// 					"id": sabado_id
// 				};
// 				array_objetos_rol_dias.push(objeto_dia);
// 				objeto_dia = {//domingo
// 					"id_doctor": domingo_id_doctor,
// 					"id": domingo_id
// 				};
// 				array_objetos_rol_dias.push(objeto_dia);
// 				array_objetos_filas.push(array_objetos_rol_dias);
// 			}

// 			objeto_turno = {
// 				"hora_inicio": hora_inicio,
// 				"hora_fin": hora_fin,
// 				"titulo": titulo,
// 				"id": id_turno_anterior,
// 				"filas": array_objetos_filas
// 			}
// 			array_objetos_turnos.push(objeto_turno);
// 		}
// 		objeto_especialidad = {
// 			"id": id_especialidad,
// 			"turnos": array_objetos_turnos
// 		};
// 		array_objeto_especialidades.push(objeto_especialidad);
// 	}
	
// 	objeto_etapa_servicio = {
// 		"nombre" : 'Etapa 1',
// 		"especialidades": array_objeto_especialidades
// 	};
// 	var titulo = document.getElementById("titulo").value;
// 	var mes = document.getElementById("mes").value;
// 	var anio = document.getElementById("anio").value;

// 	objeto = {
// 		"titulo": titulo,
// 		"mes": mes,
// 		"anio": anio,
// 		"id": "{{$rol_turno->id}}",
// 		"etapa_servicio": objeto_etapa_servicio
// 	};

// 	console.log(objeto);
// 	var parametros = {
// 	    my_json: objeto
// 	};

// 	$.ajax({
//   		type: "GET", 
//   		url: "{{route('actualizar-rol-turno')}}",
//   		data: parametros
//   	}).done(function(info){
//   		// window.location.href = "{{url('adm/centro')}}";
//   		// console.log(info);
//   		console.log("--ss");
//   		console.log("--");
//   	});

// 	// console.log(ids_especialidades);
// }

function getIndDato(ind, array_l, indr) {
  var c = 0;
  for (var i = 0; i < array_l.length; i++) {
    if (array_l[i][indr] == ind) {
      return c;
    }
    c++;
  }
  return -1;
}




</script>
@endpush
@endsection