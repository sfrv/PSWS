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
      	<h3 align="center">PANEL DE VIZUALIZACION DE <span class="text-bold">ROL DE TURNO - ETAPA DE PERSONAL ENCARGADO</span></h3>
      	<br>
      	<div class="row">
        	
      	</div>
        <br>
        <div>
            <div class="panel panel-info">
              	<div class="panel-heading">ROL DE TURNO</div>
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
          										<input disabled value="{{$var -> nombre}}" class="autosize form-control" name="text_personal_{{$var -> id}}" type="text">
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
                <a href="{{url('adm/centro/show_rol_turno/'.$rol_turno->id.'/'.$id_centro)}}"><button class="btn btn-primary btn-block" type="submit">
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
				'<input disabled value="'+turnos[i]['nombre']+'" class="autosize form-control" name="text_turno_actualizar'+turnos[i]['id']+'" type="text"><br>'+
				'<input disabled class="autosize form-control" name="text_hora_inicio_actualizar'+turnos[i]['id']+'" type="text" value="'+turnos[i]['hora_inicio']+'"><br>'+
				'<input disabled value="'+turnos[i]['hora_fin']+'" class="autosize form-control" name="text_hora_fin_actualizar'+turnos[i]['id']+'" type="text">'+
			'</td>'+
			'<td id="lunes'+conth+'"></td>'+ //lunes
			'<td id="martes'+conth+'"></td>'+ //martes
			'<td id="miercoles'+conth+'"></td>'+ //miercoles
			'<td id="jueves'+conth+'"></td>'+ //jueves
			'<td id="viernes'+conth+'"></td>'+ //viernes
			'<td id="sabado'+conth+'"></td>'+ //sabado
			'<td id="domingo'+conth+'"></td>'+ //domingo
			'<td id="opcion'+conth+'"></td>'+
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
					'<select disabled name="select_dia_lunes_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
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
					'<select disabled name="select_dia_martes_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
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
					'<select disabled name="select_dia_miercoles_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
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
					'<select disabled name="select_dia_jueves_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
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
					'<select disabled name="select_dia_viernes_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
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
					'<select disabled name="select_dia_sabado_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
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
					'<select disabled name="select_dia_domingo_actualizar_'+rol_dias[c]['id']+'" class="form-control selectpicker">'+
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

			cont++;

			$('#lunes'+conth).append(fila_lunes);
			$('#martes'+conth).append(fila_martes);
			$('#miercoles'+conth).append(fila_miercoles);
			$('#jueves'+conth).append(fila_jueves);
			$('#viernes'+conth).append(fila_viernes);
			$('#sabado'+conth).append(fila_sabado);
			$('#domingo'+conth).append(fila_domingo);
			// c = c + 7;
		}else{
			c++;
		}

	}
	conth++;
}

</script>
@endpush
@endsection