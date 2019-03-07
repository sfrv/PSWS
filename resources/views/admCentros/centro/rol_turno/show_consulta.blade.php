@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>ROL DE TURNO: {{$rol_turno->mes}} {{$rol_turno->anio}}</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
      	<h3 align="center">PANEL DE VIZUALIZACION DE <span class="text-bold">ROL DE TURNO - ETAPA CONSULTA EXTERNA</span></h3>
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
          						<table class="main-table">
          							@foreach($especialidades_etapa_consulta as $var)
          							<thead style="background-color:#A9D0F5">
          								<tr>
          									<th class="text-center" style="background-color:#AAD0F5;" scope="col">Esp: {{$var -> nombre}}</th>
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
console.log(turnos);
console.log(rol_dias);
console.log(medicos_j);

for (var i = 0; i < turnos.length; i++) {
	var fila_hora ='<tr id="fila_h'+conth+'">'+
		'<td>-</td>'+
		'<td><input disabled="true" value="'+turnos[i]['nombre']+'" class="autosize form-control" id="text_t'+conth+'" type="text"> <br> <input disabled="true" class="autosize form-control" id="text_hi'+conth+'" type="text" value="'+turnos[i]['hora_inicio']+'"> <br> <input disabled="true" value="'+turnos[i]['hora_fin']+'" class="autosize form-control" id="text_hf'+conth+'" type="text"> </td>'+
		'<td id="lunes'+conth+'"></td>'+ //lunes
		'<td id="martes'+conth+'"></td>'+ //martes
		'<td id="miercoles'+conth+'"></td>'+ //miercoles
		'<td id="jueves'+conth+'"></td>'+ //jueves
		'<td id="viernes'+conth+'"></td>'+ //viernes
		'<td id="sabado'+conth+'"></td>'+ //sabado
		'<td id="domingo'+conth+'"></td>'+ //domingo
		'</tr>';
	$('#fila_datos'+turnos[i]['id_detalle_centro_especialidad']).append(fila_hora);

	var c = 0;
	while ( c < rol_dias.length ){

		if (turnos[i]['id'] == rol_dias[c]['id_turno']) {
			//0 1 2 3 4 5 6
			var fila_lunes = '<div id="fila_d_l'+cont+'">'+
					'<select disabled="true" id="sel_d_l'+cont+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_lunes = fila_lunes + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_lunes = fila_lunes + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_lunes = fila_lunes + '</select></br></div>';
			c++;
			var fila_martes = '<div id="fila_d_m'+cont+'">'+
					'<select disabled="true" id="sel_d_m'+cont+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_martes = fila_martes + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_martes = fila_martes + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_martes = fila_martes + '</select></br></div>';
			c++;
			var fila_miercoles = '<div id="fila_d_mi'+cont+'">'+
					'<select disabled="true" id="sel_d_mi'+cont+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_miercoles = fila_miercoles + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_miercoles = fila_miercoles + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_miercoles = fila_miercoles + '</select></br></div>';
			c++;
			var fila_jueves = '<div id="fila_d_j'+cont+'">'+
					'<select disabled="true" id="sel_d_j'+cont+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] === rol_dias[c]['id_medico']) {
							fila_jueves = fila_jueves + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_jueves = fila_jueves + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_jueves = fila_jueves + '</select></br></div>';
			c++;
			var fila_viernes = '<div id="fila_d_v'+cont+'">'+
					'<select disabled="true" id="sel_d_v'+cont+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_viernes = fila_viernes + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_viernes = fila_viernes + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_viernes = fila_viernes + '</select></br></div>';
			c++;
			var fila_sabado = '<div id="fila_d_s'+cont+'">'+
					'<select disabled="true" id="sel_d_s'+cont+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_sabado = fila_sabado + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_sabado = fila_sabado + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_sabado = fila_sabado + '</select></br></div>';
			c++;
			var fila_domingo = '<div id="fila_d_d'+cont+'">'+
					'<select disabled="true" id="sel_d_d'+cont+'" class="form-control selectpicker">'+
					'<option value="-1" selected >Ninguno</option>';
					for (var j = 0; j < medicos_j.length; j++) {
						if (medicos_j[j]['id'] == rol_dias[c]['id_medico']) {
							fila_domingo = fila_domingo + '<option value="'+medicos_j[j]['id']+'" selected>'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}else{
							fila_domingo = fila_domingo + '<option value="'+medicos_j[j]['id']+'">'+medicos_j[j]['apellido']+' ' + medicos_j[j]['telefono'] +'</option>';
						}
					}
			fila_domingo = fila_domingo + '</select></br></div>';
			c++;

			$('#lunes'+conth).append(fila_lunes);
			$('#martes'+conth).append(fila_martes);
			$('#miercoles'+conth).append(fila_miercoles);
			$('#jueves'+conth).append(fila_jueves);
			$('#viernes'+conth).append(fila_viernes);
			$('#sabado'+conth).append(fila_sabado);
			$('#domingo'+conth).append(fila_domingo);
			cont++;
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