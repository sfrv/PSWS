@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Crear Rol de Turno</b> * * * * *
  </h1>
  <br>
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
                <input placeholder="Titulo del Rol de Turno..." required="required" name="titulo" id="titulo" class="autosize form-control" type="text" step="any">
            </div>
            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	            <label for="form-field-24">Mes:</label>
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
	            <label for="form-field-24">Anio:</label>
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
              <div class="panel-heading">Crear Rol de Turno</div>
              <div class="panel-body">
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			<div class="table-responsive">
          				<div id="table-scroll" class="table-scroll">
          					<div class="table-wrap">
          						<table class="main-table">
          							@foreach($detalle as $var)
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
					          				<th class="text-center" style="background-color:#AAD0F5;" scope="col"><button type="button" class="btn btn-info" onclick="agregarFilaHora({{$var -> id}});">+</button></th>
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
               	<button onclick="guardar()" class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> Guardar Rol de Turno </i>
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

var datos = [];
var filas = [];
var datos_filas = [];

function agregarFilaHora(id) {//id especialidad
	var fila_hora ='<tr id="fila_h'+conth+'">'+
		'<td class="text-center">-</td>'+
		'<td class="text-center"><input placeholder="Titulo..." class="autosize form-control" id="text_t'+conth+'" type="text"> <input placeholder="Hora Inicio..." class="autosize form-control" id="text_hi'+conth+'" type="text"> <input placeholder="Hora Fin..." class="autosize form-control" id="text_hf'+conth+'" type="text"> </td>'+
		'<td class="text-center" id="lunes'+conth+'"></td>'+ //lunes
		'<td class="text-center" id="martes'+conth+'"></td>'+ //martes
		'<td class="text-center" id="miercoles'+conth+'"></td>'+ //miercoles
		'<td class="text-center" id="jueves'+conth+'"></td>'+ //jueves
		'<td class="text-center" id="viernes'+conth+'"></td>'+ //viernes
		'<td class="text-center" id="sabado'+conth+'"></td>'+ //sabado
		'<td class="text-center" id="domingo'+conth+'"></td>'+ //domingo
		'<td class="text-center" id="opcion'+conth+'"></td>'+
		'<td class="text-center"> <button type="button" class="btn btn-success" onclick="agregarFila('+id+','+conth+');">+</button> <button type="button" class="btn btn-warning" onclick="eliminarFilaHora('+conth+');">x</button> </td>'+
		'</tr>';
	conth++;
	$('#fila_datos'+id).append(fila_hora);
}

function agregarFila(id_l,conth_l) {
	// console.log(conth_l);
	var fila_lunes = '<div id="fila_d_l'+cont+'"><select id="sel_d_l'+cont+'" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_martes = '<div id="fila_d_m'+cont+'"><select id="sel_d_m'+cont+'" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_miercoles = '<div id="fila_d_mi'+cont+'"><select id="sel_d_mi'+cont+'" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_jueves = '<div id="fila_d_j'+cont+'"><select id="sel_d_j'+cont+'" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_viernes = '<div id="fila_d_v'+cont+'"><select id="sel_d_v'+cont+'" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_sabado = '<div id="fila_d_s'+cont+'"><select id="sel_d_s'+cont+'" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_domingo = '<div id="fila_d_d'+cont+'"><select id="sel_d_d'+cont+'" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';

	var fila_opcion = '<div style="margin-bottom: 20px;" id="fila_op'+cont+'"><button type="button" class="btn btn-danger" onclick="eliminarFila('+cont+');"><i class="fa fa-close"></i></button><br></div>';
	var fila = [];//new
	fila.push(cont,conth_l,id_l);//new
	datos_filas.splice(cont, 0, fila);//new
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
	console.log(datos_filas);//new
}

function eliminarFila(cont_l) {
	var n_i = getIndDato(cont_l,datos_filas,0);
	if (n_i != -1) {
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
	console.log(datos_filas);
}

function eliminarFilaHora(conth_l)
{
	var n_i = getIndDato(conth_l,datos_filas,1);
	while( n_i != -1 ){
		datos_filas.splice(n_i,1);
		n_i = getIndDato(conth_l,datos_filas,1);
	}
	$('#fila_h'+conth_l).remove();
	console.log(datos_filas);
}

function guardar() {
	var datos_turnos = [];
	var especialidades = {!! $detalle2 !!};
	var ids_especialidades = [];
	array_objeto_especialidades = [];

	

	for (var i = 0; i < especialidades.length; i++) {
		var id_especialidad = especialidades[i]['id'];
		var cont_array_turnos = [];

		for (var j = 0; j < datos_filas.length; j++) {
			if (id_especialidad == datos_filas[j][2]) {
				if (!cont_array_turnos.includes(datos_filas[j][1])) {
					cont_array_turnos.push(datos_filas[j][1]);
				}
			}
		}
		cont_array_turnos.sort(function(a, b){return a - b});
		// console.log("---");
		// console.log(cont_array_turnos);

		var array_objetos_turnos = [];
		for (var k = 0; k < cont_array_turnos.length; k++) {
			var conth = cont_array_turnos[k];
			var hora_inicio = document.getElementById("text_hi"+conth).value;
			var hora_fin = document.getElementById("text_hf"+conth).value;
			var titulo = document.getElementById("text_t"+conth).value;

			var array_objetos_filas = [];
			var cont_array_filas = [];
			for (var m = 0; m < datos_filas.length; m++) {
				if (conth == datos_filas[m][1]) {
					cont_array_filas.push(datos_filas[m][0]);
				}
			}
			// console.log(cont_array_filas);
			for (var n = 0; n < cont_array_filas.length; n++) {
				var cont = cont_array_filas[n];
				var lunes = document.getElementById("sel_d_l"+cont).value;
				var martes = document.getElementById("sel_d_m"+cont).value;
				var miercoles = document.getElementById("sel_d_mi"+cont).value;
				var jueves = document.getElementById("sel_d_j"+cont).value;
				var viernes = document.getElementById("sel_d_v"+cont).value;
				var sabado = document.getElementById("sel_d_s"+cont).value;
				var domingo = document.getElementById("sel_d_d"+cont).value;
				array_objetos_rol_dias = [];
				objeto_lunes = {
					"dia": 'lunes',
					"id_doctor": lunes
				};
				objeto_martes = {
					"dia": 'martes',
					"id_doctor": martes
				};
				objeto_miercoles = {
					"dia": 'miercoles',
					"id_doctor": miercoles
				};
				objeto_jueves = {
					"dia": 'jueves',
					"id_doctor": jueves
				};
				objeto_viernes = {
					"dia": 'viernes',
					"id_doctor": viernes
				};
				objeto_sabado = {
					"dia": 'sabado',
					"id_doctor": sabado
				};
				objeto_domingo = {
					"dia": 'domingo',
					"id_doctor": domingo
				};
				array_objetos_rol_dias.push(objeto_lunes,objeto_martes,objeto_miercoles,objeto_jueves,objeto_viernes,objeto_sabado,objeto_domingo);
				// objeto_rol_dia = {
				// 	"lunes": lunes,
				// 	"martes": martes,
				// 	"miercoles": miercoles,
				// 	"jueves": jueves,
				// 	"viernes": viernes,
				// 	"sabado": sabado,
				// 	"domingo": domingo
				// }
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
		// console.log(cont_array_turnos);
		objeto_especialidad = {
			"id": id_especialidad,
			"turnos": array_objetos_turnos
		};
		array_objeto_especialidades.push(objeto_especialidad);
	}
	
	objeto_etapa_servicio = {
		"nombre" : 'Etapa 1',
		"especialidades": array_objeto_especialidades
	};
	var array_borrar = [];
	var titulo = document.getElementById("titulo").value;
	var mes = document.getElementById("mes").value;
	var anio = document.getElementById("anio").value;

	objeto = {
		"borrar": array_borrar,
		"titulo": titulo,
		"mes": mes,
		"anio": anio,
		"etapa_servicio": objeto_etapa_servicio
	};

	console.log(objeto);
	var parametros = {
	    my_json: objeto
	};

	$.ajax({
  		type: "GET", 
  		url: "{{route('guardar-rol-turno')}}",
  		data: parametros
  	}).done(function(info){
  		// window.location.href = "{{url('adm/centro')}}";
  		console.log(info);
  		// console.log("--")
  	});

	// console.log(ids_especialidades);
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