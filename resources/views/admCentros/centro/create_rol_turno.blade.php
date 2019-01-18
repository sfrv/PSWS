@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Crear Rol de Turno</b> * * * * *
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
                <input required="required" name="titulo" id="titulo" class="autosize form-control" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Mes:</label>
              <input required="required" name="mes" id="mes" class="autosize form-control" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Anio:</label>
              <input required="required" name="anio" id="anio" class="autosize form-control" type="text" step="any">
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
          							@foreach($detalle as $var)
          							<thead style="background-color:#A9D0F5">
          								<tr>
          									<th style="background-color:#AAD0F5;" scope="col">Esp: {{$var -> nombre}} {{$var -> id}}</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Hora</th>
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

function agregarFilaHora(id) {
	// console.log(id);
	// var fila_hora ='<div id="fila_h'+conth+'"><input style="line-height: 20px;margin-bottom: 14px;margin-top: '+px_fila_hora+'px;" id="text_h'+conth+'" type="text"> <button type="button" class="btn btn-info" onclick="agregarFila('+id+');">+</button> <br></div>';
	
	var fila_hora ='<tr id="fila_h'+conth+'">'+
		'<td>-</td>'+
		'<td><input style="line-height: 20px;margin-bottom: 14px;" id="text_h'+conth+'" type="text"></td>'+
		'<td id="lunes'+conth+'"></td>'+ //lunes
		'<td id="martes'+conth+'"></td>'+ //martes
		'<td id="miercoles'+conth+'"></td>'+ //miercoles
		'<td id="jueves'+conth+'"></td>'+ //jueves
		'<td id="viernes'+conth+'"></td>'+ //viernes
		'<td id="sabado'+conth+'"></td>'+ //sabado
		'<td id="domingo'+conth+'"></td>'+ //domingo
		'<td id="opcion'+conth+'"></td>'+
		'<td> <button type="button" class="btn btn-success" onclick="agregarFila('+id+','+conth+');">+</button> <button type="button" class="btn btn-warning" onclick="eliminarFilaHora('+conth+');">x</button> </td>'+
		'</tr>';
	conth++;
	$('#fila_datos'+id).append(fila_hora);
}

function agregarFila(id_l,conth_l) {
	// console.log(conth_l);
	var fila_lunes = '<div id="fila_d_l'+cont+'"><select id="sel_d_l'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_martes = '<div id="fila_d_m'+cont+'"><select id="sel_d_m'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_miercoles = '<div id="fila_d_mi'+cont+'"><select id="sel_d_mi'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_jueves = '<div id="fila_d_j'+cont+'"><select id="sel_d_j'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_viernes = '<div id="fila_d_v'+cont+'"><select id="sel_d_v'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_sabado = '<div id="fila_d_s'+cont+'"><select id="sel_d_s'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';
	var fila_domingo = '<div id="fila_d_d'+cont+'"><select id="sel_d_d'+cont+'" style="width: 150px;" class="form-control selectpicker"><option value="-1">Ninguno</option>@foreach($medicos as $var) <option value="{{$var->id}}">{{$var->apellido}} {{$var->telefono}}</option> @endforeach</select> </br></div>';

	var fila_opcion = '<div style="margin-bottom: 20px;" id="fila_op'+cont+'"><button type="button" class="btn btn-danger" onclick="eliminarFila('+cont+');"><i class="fa fa-close"></i></button> <button type="button" class="btn btn-info" onclick="editarFila('+cont+ ','+id_l+');"><i class="fa fa-edit"></i></button> <button  type="button" class="btn btn-primary" onclick="adicionarFila('+cont+ ','+id_l+','+conth_l+');"><i class="fa fa-save"></i></button><br></div>';
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
}

function eliminarFila(cont_l) {
	$('#fila_d_l'+cont_l).remove();
	$('#fila_d_m'+cont_l).remove();
	$('#fila_d_mi'+cont_l).remove();
	$('#fila_d_j'+cont_l).remove();
	$('#fila_d_v'+cont_l).remove();
	$('#fila_d_s'+cont_l).remove();
	$('#fila_d_d'+cont_l).remove();
	$('#fila_op'+cont_l).remove();
}

function editarFila(cont_l, id_l) {
	document.getElementById("sel_d_l"+cont_l).disabled = false;
	document.getElementById("sel_d_m"+cont_l).disabled = false;
	document.getElementById("sel_d_mi"+cont_l).disabled = false;
	document.getElementById("sel_d_j"+cont_l).disabled = false;
	document.getElementById("sel_d_v"+cont_l).disabled = false;
	document.getElementById("sel_d_s"+cont_l).disabled = false;
	document.getElementById("sel_d_d"+cont_l).disabled = false;
}

function adicionarFila(cont_l, id_l, conth_l) {
	// if (!filas.includes(cont_l)) {
	// 	filas.splice(cont_l, 0, cont_l);
	// }

	var Hora = document.getElementById("text_h"+conth_l).value;
	var lunes = document.getElementById("sel_d_l"+cont_l).value;
	var martes = document.getElementById("sel_d_m"+cont_l).value;
	var miercoles = document.getElementById("sel_d_mi"+cont_l).value;
	var jueves = document.getElementById("sel_d_j"+cont_l).value;
	var viernes = document.getElementById("sel_d_v"+cont_l).value;
	var sabado = document.getElementById("sel_d_s"+cont_l).value;
	var domingo = document.getElementById("sel_d_d"+cont_l).value;

	console.log(Hora);
	console.log(lunes);

	document.getElementById("sel_d_l"+cont_l).disabled = true;
	document.getElementById("sel_d_m"+cont_l).disabled = true;
	document.getElementById("sel_d_mi"+cont_l).disabled = true;
	document.getElementById("sel_d_j"+cont_l).disabled = true;
	document.getElementById("sel_d_v"+cont_l).disabled = true;
	document.getElementById("sel_d_s"+cont_l).disabled = true;
	document.getElementById("sel_d_d"+cont_l).disabled = true;
}

function eliminarFilaHora(conth_l)
{

	// datos.splice(cont,1);
	// filas.splice(cont,1);
	// var n_i = obtenerIndDato(cont);
	// if (n_i != -1) {
	// 	datos.splice(n_i,1);
	// }
	// removeItemFromArr( filas, cont );
	$('#fila_h'+conth_l).remove();
	// $('#fila_d'+cont).remove();
	// $('#fila_h'+cont).remove();
	// $('#fila_ob'+cont).remove();
	// $('#fila_op'+cont).remove();
	// cont--;
	// console.log(datos);
	// console.log(filas);
	// console.log(cont);
	// console.log(cont);
	// console.log(datos);
}

</script>
@endpush
@endsection