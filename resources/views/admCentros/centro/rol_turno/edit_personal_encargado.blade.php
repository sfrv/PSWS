@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>ROL DE TURNO - ETAPA DE PERSONAL ENCARGADO</b>
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
      	<h3 align="center">PANEL DE EDICION DE <span class="text-bold">ROL DE TURNO - ETAPA DE PERSONAL ENCARGADO</span></h3>
      	<br>
      	{!! Form::model($id_rol_turno,['method'=>'PATCH','autocomplete'=>'off','route'=>['update-rol-turno-personal-encargado',$id_rol_turno,$id_centro]])!!}
		{{Form::token()}} 
      	<div class="row">
        	
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
          							@foreach($personal_etapa_personal_area as $var)
          							<thead style="background-color:#A9D0F5" id="fila_datos_head_id{{$var -> id}}">
          								<tr>
          									<th class="text-center" style="background-color:#AAD0F5;" scope="col"> 
          										<input value="{{$var -> nombre}} {{$var -> id}}" class="autosize form-control" name="text_personal_{{$var -> id}}" type="text">
          										<input type="hidden" name="id_persona_actualizar[]" value="{{$var -> id}}">
          										</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Turno</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Lunes</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Martes</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Miercoles</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Jueves</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Viernes</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Sabado</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Domingo</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col">Op1</th>
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col"><button type="button" class="btn btn-info" onclick="agregarFilaHora({{$var -> id}},-2);"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-danger" onclick="eliminarFilaPersonal({{$var -> id}});"><i class="fa fa-close"></i></button></th>
          								</tr>
          							</thead>
          							
          							<tbody id="fila_datos_body_id{{$var -> id}}">
          								
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
                   <i class="fa fa-arrow-circle-right"> EDITAR ETAPA DE PERSONAL ENC. </i>
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
window.parent.document.body.style.zoom="80%";//solo para chrome
document.getElementById("mynav").style.zoom = "80%";

// jQuery(document).ready(function() {
//    jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
//  });

var x = document.getElementById("mynav");
x.className += " sidebar-collapse";

var contp = 0;
var conth = 0;
var cont = 0;
var turnos = {!! $turnos_json !!};
var rol_dias = {!! $rol_dias_json !!};
console.log(rol_dias);
var medicos_j = {!! $medicos_json !!};
var array_auxa = [];

for (var i = 0; i < turnos.length; i++) {
	var fila_hora ='<tr  class="text-center" id="fila_h'+conth+'">'+
			'<td id="dias'+conth+'">'+
				'<input type="hidden" name="id_turnos_actualizar[]" value="'+turnos[i]['id']+'">-'+
			'</td>'+
			'<td>'+
				'<input value="'+turnos[i]['nombre']+'" class="autosize form-control" name="text_turno_actualizar'+turnos[i]['id']+'" type="text"><br>'+
				'<input class="autosize form-control" name="text_hora_inicio_actualizar'+turnos[i]['id']+'" type="text" value="'+turnos[i]['hora_inicio']+'"><br>'+
				'<input value="'+turnos[i]['hora_fin']+'" class="autosize form-control" name="text_hora_fin_actualizar'+turnos[i]['id']+'" type="text">'+
			'</td>'+
			'<td id="lunes'+conth+'"></td>'+ //lunes
			'<td id="martes'+conth+'"></td>'+ //martes
			'<td id="miercoles'+conth+'"></td>'+ //miercoles
			'<td id="jueves'+conth+'"></td>'+ //jueves
			'<td id="viernes'+conth+'"></td>'+ //viernes
			'<td id="sabado'+conth+'"></td>'+ //sabado
			'<td id="domingo'+conth+'"></td>'+ //domingo
			'<td id="opcion'+conth+'"></td>'+
			'<td>'+
				'<button type="button" class="btn btn-info" onclick="agregarFila('+turnos[i]['id_personal_area']+','+conth+','+turnos[i]['id']+');"><i class="fa fa-plus"></i></button> '+
				'<button type="button" class="btn btn-danger" onclick="eliminarFilaHora('+conth+','+turnos[i]['id']+','+turnos[i]['id_personal_area']+');"><i class="fa fa-close"></i></button>'+
			'</td>'+
		'</tr>';
	$('#fila_datos_body_id'+turnos[i]['id_personal_area']).append(fila_hora);

	var c = 0;
	while ( c < rol_dias.length ){
		// var array_dias_id_anterior = [];
		if (turnos[i]['id'] == rol_dias[c]['id_turno']) {
			//0 1 2 3 4 5 6
			var my_array = '<div id="fila_dias'+cont+'">'+
		 		'<input type="hidden" name="id_rol_dias_actualizar[]" value="'+rol_dias[c]['id']+'">'+
		 		'<input type="hidden" name="id_rol_dias_actualizar[]" value="'+rol_dias[c+1]['id']+'">'+
		 		'<input type="hidden" name="id_rol_dias_actualizar[]" value="'+rol_dias[c+2]['id']+'">'+
		 		'<input type="hidden" name="id_rol_dias_actualizar[]" value="'+rol_dias[c+3]['id']+'">'+
		 		'<input type="hidden" name="id_rol_dias_actualizar[]" value="'+rol_dias[c+4]['id']+'">'+
		 		'<input type="hidden" name="id_rol_dias_actualizar[]" value="'+rol_dias[c+5]['id']+'">'+
		 		'<input type="hidden" name="id_rol_dias_actualizar[]" value="'+rol_dias[c+6]['id']+'">'+
		 	'</div>';
		  	$('#dias'+conth).append(my_array);

			var fila_lunes = '<div id="fila_d_l'+cont+'">'+
					'<select name="select_dia_lunes_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_lunes = fila_lunes + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_lunes = fila_lunes + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_lunes = fila_lunes + '</select></br></div>';
			var array_auxb = [];
			array_auxb.push(rol_dias[c]['id'],turnos[i]['id'],cont);//new
			array_auxa.push(array_auxb);
			c++;
			var fila_martes = '<div id="fila_d_m'+cont+'">'+
					'<select name="select_dia_martes_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_martes = fila_martes + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_martes = fila_martes + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_martes = fila_martes + '</select></br></div>';
			var array_auxb = [];
			array_auxb.push(rol_dias[c]['id'],turnos[i]['id'],cont);//new
			array_auxa.push(array_auxb);
			c++;
			var fila_miercoles = '<div id="fila_d_mi'+cont+'">'+
					'<select name="select_dia_miercoles_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_miercoles = fila_miercoles + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_miercoles = fila_miercoles + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_miercoles = fila_miercoles + '</select></br></div>';
			var array_auxb = [];
			array_auxb.push(rol_dias[c]['id'],turnos[i]['id'],cont);//new
			array_auxa.push(array_auxb);
			c++;
			var fila_jueves = '<div id="fila_d_j'+cont+'">'+
					'<select name="select_dia_jueves_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_jueves = fila_jueves + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_jueves = fila_jueves + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_jueves = fila_jueves + '</select></br></div>';
			var array_auxb = [];
			array_auxb.push(rol_dias[c]['id'],turnos[i]['id'],cont);//new
			array_auxa.push(array_auxb);
			c++;
			var fila_viernes = '<div id="fila_d_v'+cont+'">'+
					'<select name="select_dia_viernes_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_viernes = fila_viernes + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_viernes = fila_viernes + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_viernes = fila_viernes + '</select></br></div>';
			var array_auxb = [];
			array_auxb.push(rol_dias[c]['id'],turnos[i]['id'],cont);//new
			array_auxa.push(array_auxb);
			c++;
			var fila_sabado = '<div id="fila_d_s'+cont+'">'+
					'<select name="select_dia_sabado_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_sabado = fila_sabado + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_sabado = fila_sabado + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_sabado = fila_sabado + '</select></br></div>';
			var array_auxb = [];
			array_auxb.push(rol_dias[c]['id'],turnos[i]['id'],cont);//new
			array_auxa.push(array_auxb);
			c++;
			var fila_domingo = '<div id="fila_d_d'+cont+'">'+
					'<select name="select_dia_domingo_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_domingo = fila_domingo + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_domingo = fila_domingo + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_domingo = fila_domingo + '</select></br></div>';
			var array_auxb = [];
			array_auxb.push(rol_dias[c]['id'],turnos[i]['id'],cont);//new
			array_auxa.push(array_auxb);
			c++;

			var fila_opcion = '<div style="margin-bottom: 20px;" id="fila_op'+cont+'"><button type="button" class="btn btn-warning" onclick="eliminarFila('+cont+','+turnos[i]['id']+','+turnos[i]['id_personal_area']+');"><i class="fa fa-close"></i></button><br></div>';

			cont++;

			$('#lunes'+conth).append(fila_lunes);
			$('#martes'+conth).append(fila_martes);
			$('#miercoles'+conth).append(fila_miercoles);
			$('#jueves'+conth).append(fila_jueves);
			$('#viernes'+conth).append(fila_viernes);
			$('#sabado'+conth).append(fila_sabado);
			$('#domingo'+conth).append(fila_domingo);
			$('#opcion'+conth).append(fila_opcion);
			// c = c + 7;
		}else{
			c++;
		}

	}
	conth++;
}
console.log(array_auxa);

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
				'<th class="text-center" style="background-color:#AAD0F5;" scope="col"><button type="button" class="btn btn-info" onclick="agregarFilaHora('+contp+',-1'+');"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-danger" onclick="eliminarFilaPersonal('+contp+',-1'+');"><i class="fa fa-close"></i></button></th>'+
			'</tr>'+
		'</thead>'+
		'<tbody id="fila_datos_body'+contp+'">'+
		'</tbody>';
	contp++;
	$('#table_personal').append(fila_personal);
}

function agregarFila(id_especialidad_l,conth_l,id_turno_l) {
	// console.log(id_turno_l);
	if (id_turno_l == -1) {
		var my_array = '<div id="fila_d_arr'+cont+'"><input type="hidden" name="id_filas_turno'+conth_l+'[]" value="'+cont+'"></div>';
		// console.log("ss");
		$('#dias'+conth_l).append(my_array);
	}else{
		var my_array = '<div id="fila_d_arr'+cont+'"><input type="hidden" name="id_filas_nuevos_turno'+id_turno_l+'[]" value="'+cont+'"></div>';	
		$('#dias'+conth_l).append(my_array);
	}

	var fila_lunes = '<div id="fila_d_l'+cont+'">'+
		'<select name="selec_dia_lunes_nuevo'+cont+'" class="form-control selectpicker">'+
			'<option value="-1">Ninguno</option>'+
			'@foreach($medicos as $var)'+
				'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
			'@endforeach'+
		'</select></br></div>';
	var fila_martes = '<div id="fila_d_m'+cont+'">'+
	'<select name="selec_dia_martes_nuevo'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_miercoles = '<div id="fila_d_mi'+cont+'">'+
	'<select name="selec_dia_miercoles_nuevo'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_jueves = '<div id="fila_d_j'+cont+'">'+
	'<select name="selec_dia_jueves_nuevo'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_viernes = '<div id="fila_d_v'+cont+'">'+
	'<select name="selec_dia_viernes_nuevo'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_sabado = '<div id="fila_d_s'+cont+'">'+
	'<select name="selec_dia_sabado_nuevo'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';
	var fila_domingo = '<div id="fila_d_d'+cont+'">'+
	'<select name="selec_dia_domingo_nuevo'+cont+'" class="form-control selectpicker">'+
		'<option value="-1">Ninguno</option>'+
		'@foreach($medicos as $var)'+
			'<option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option>'+
		'@endforeach'+
	'</select></br></div>';

	var fila_opcion = '<div style="margin-bottom: 20px;" id="fila_op'+cont+'"><button type="button" class="btn btn-danger" onclick="eliminarFila('+cont+');"><i class="fa fa-close"></i></button><br></div>';
	
	cont++;
	
	$('#lunes'+conth_l).append(fila_lunes);
	$('#martes'+conth_l).append(fila_martes);
	$('#miercoles'+conth_l).append(fila_miercoles);
	$('#jueves'+conth_l).append(fila_jueves);
	$('#viernes'+conth_l).append(fila_viernes);
	$('#sabado'+conth_l).append(fila_sabado);
	$('#domingo'+conth_l).append(fila_domingo);
	$('#opcion'+conth_l).append(fila_opcion);
	
}

function agregarFilaHora(id,w) {//id especialidad
	// console.log(id);
	var aux = '';
	if (w == -1) {
		aux = '<input type="hidden" name="idturnos'+id+'[]" value="'+conth+'">';
	}else{
		aux = '<input type="hidden" name="id_turnos_nuevos[]" value="'+conth+'">-'+
			'<input type="hidden" name="idpersonal_crear[]" value="'+id+'">';
	}
	
	var fila_hora ='<tr id="fila_h'+conth+'">'+
		'<td id="dias'+conth+'">'+
			aux+
		'</td>'+
		'<td>'+
			'<input placeholder="TITULO..." class="autosize form-control" name="text_turno'+conth+'" type="text"> <br>'+
			'<input placeholder="HORA INICIO..." class="autosize form-control" name="text_hora_inicio'+conth+'" type="text"> <br>'+
			'<input placeholder="HORA FIN..." class="autosize form-control" name="text_hora_fin'+conth+'" type="text">'+
		'</td>'+
		'<td id="lunes'+conth+'"></td>'+ //lunes
		'<td id="martes'+conth+'"></td>'+ //martes
		'<td id="miercoles'+conth+'"></td>'+ //miercoles
		'<td id="jueves'+conth+'"></td>'+ //jueves
		'<td id="viernes'+conth+'"></td>'+ //viernes
		'<td id="sabado'+conth+'"></td>'+ //sabado
		'<td id="domingo'+conth+'"></td>'+ //domingo
		'<td id="opcion'+conth+'"></td>'+
		'<td>'+
			'<button type="button" class="btn btn-info" onclick="agregarFila('+id+','+conth+',-1'+');"><i class="fa fa-plus"></i></button> '+
			'<button type="button" class="btn btn-danger" onclick="eliminarFilaHora('+conth+',-1'+',-1'+');"><i class="fa fa-close"></i></button> </td>'+
		'</tr>';
	conth++;
	if (w == -2) {
		$('#fila_datos_body_id'+id).append(fila_hora);
	}else{
		$('#fila_datos_body'+id).append(fila_hora);
	}
}

function eliminarFila(cont_l,id_turno_l,id_especialidad_l) {

	var n_i = getIndDato(cont_l,array_auxa,2);
	while( n_i != -1 ){
		var fila='<tr hidden>'+
	      '<td><input type="hidden" name="id_rol_dias_delete[]" value="'+array_auxa[n_i][0]+'"></td>'+
	    '</tr>';
	  	$('#fila_datos_body_id'+id_especialidad_l).append(fila);
	  	array_auxa.splice(n_i,1);
		n_i = getIndDato(cont_l,array_auxa,2);
	}
	console.log(array_auxa);

	$('#fila_d_l'+cont_l).remove();
	$('#fila_d_m'+cont_l).remove();
	$('#fila_d_mi'+cont_l).remove();
	$('#fila_d_j'+cont_l).remove();
	$('#fila_d_v'+cont_l).remove();
	$('#fila_d_s'+cont_l).remove();
	$('#fila_d_d'+cont_l).remove();
	$('#fila_op'+cont_l).remove();

}

function eliminarFilaHora(conth_l,id_turno_l,id_personal_l)
{
	console.log(conth_l);
	if (id_turno_l == -1 && id_personal_l == -1) {
		$('#fila_h'+conth_l).remove();
		return;
	}


	var fila='<tr hidden>'+
      '<td><input type="hidden" name="id_turnos_delete[]" value="'+id_turno_l+'"></td>'+
    '</tr>';
  	$('#fila_datos_body_id'+id_personal_l).append(fila);

  	$('#fila_h'+conth_l).remove();
}

function eliminarFilaPersonal(id_personal_l,w)
{
	console.log(id_personal_l);	
	if (w == -1) {//es nuevo
		$('#fila_datos_body'+id_personal_l).remove();
		$('#fila_datos_head'+id_personal_l).remove();
		return;
	}
	
	$('#fila_datos_body_id'+id_personal_l).remove();
	$('#fila_datos_head_id'+id_personal_l).remove();

	var fila_personal = '<thead>'+
	'</thead>'+
		'<tr hidden>'+
	      '<td><input type="hidden" name="id_personal_delete[]" value="'+id_personal_l+'"></td>'+
	    '</tr>'+
	'<tbody id="fila_datos_body'+contp+'">'+
	'</tbody>';
	$('#table_personal').append(fila_personal);
}


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