@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Crear Cartera de Servicio</b> * * * * *
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
          				<th>Opcion 1</th>
          				<th>Opcion 2</th>
          			</thead>
          			<tbody>
	                <div id="especialidades">
	                	@foreach($detalle as $var)
	                      <tr id="fila_datos{{$var -> id}}">
	                          <td class="center">{{$var -> nombre}} </td>
	                          <td class="center" id="especialidad_servicio{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_dia{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_hora{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_observacion{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_opcion{{$var -> id}}"></td>
	                          <td class="center"><button type="button" class="btn btn-info" onclick="agregar({{$var -> id}});">+</button></td>
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
               	<button onclick="guardar()" class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> Guardar Cartera de Servicio </i>
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
var cont = 0;
var datos = [];
var objeto = {};
var filas = [];
// var especialidades = []; 
// var my_var = {!! $detalle2 !!};
console.log(cont);

function agregar(id)
{
	var fila_servicio = '<div id="fila_s'+cont+'"><input style="margin-bottom: 14px;" id="text_s'+cont+'" type="text" step="any"> </br></div>';
	var fila_dia = '<div id="fila_d'+cont+'"><input style="margin-bottom: 14px;" id="text_d'+cont+'" type="text" step="any"> </br></div>';
	var fila_hora ='<div id="fila_h'+cont+'"><input style="margin-bottom: 14px;" id="text_h'+cont+'" type="text" step="any"> <br></div>';
	var fila_observacion = '<div id="fila_ob'+cont+'"><input style="margin-bottom: 14px;" id="text_o'+cont+'" type="text" step="any"><br></div>';
	var fila_opcion = '<div id="fila_op'+cont+'"><button style="margin-bottom: 5px;" type="button" class="btn btn-danger" onclick="eliminar('+cont+');"><i class="fa fa-close"></i></button> <button style="margin-bottom: 5px;" type="button" class="btn btn-info" onclick="editar('+cont+ ','+id+');"><i class="fa fa-edit"></i></button> <button style="margin-bottom: 5px;" type="button" class="btn btn-primary" onclick="adicionar('+cont+ ','+id+');"><i class="fa fa-save"></i></button><br></div>';
	
	cont++;
	$('#especialidad_servicio'+id).append(fila_servicio);
	$('#especialidad_dia'+id).append(fila_dia);
	$('#especialidad_hora'+id).append(fila_hora);
	$('#especialidad_observacion'+id).append(fila_observacion);
	$('#especialidad_opcion'+id).append(fila_opcion);
	console.log(cont);
	// console.log(filas);
}

function editar(cont,id) {
	if (filas.includes(cont)) {
		document.getElementById("text_s"+cont).disabled = false;
		document.getElementById("text_d"+cont).disabled = false;
		document.getElementById("text_h"+cont).disabled = false;
		document.getElementById("text_o"+cont).disabled = false;
		datos.splice(cont,1);
		filas.splice(cont,1);
	}else{
		console.log("Registro en Edicion");
	}
	console.log(datos);
	console.log(filas);
}

function adicionar(cont,id)
{
	if (!filas.includes(cont)) {//verifico si la fila ya se dio el boton guardar
		// filas.push(cont);
		filas.splice(cont, 0, cont);
		var servicio = document.getElementById("text_s"+cont).value;
		var dia = document.getElementById("text_d"+cont).value;
		var hora = document.getElementById("text_h"+cont).value;
		var observacion = document.getElementById("text_o"+cont).value;
		var dato = [];
		dato.push(id,servicio,dia,hora,observacion);
		// datos.push(dato);
		datos.splice(cont, 0, dato);

		document.getElementById("text_s"+cont).disabled = true;
		document.getElementById("text_d"+cont).disabled = true;
		document.getElementById("text_h"+cont).disabled = true;
		document.getElementById("text_o"+cont).disabled = true;
	}else{
		alert("Registro Ya Guardado.");
	}
	// document.getElementById("text_s"+cont).disabled = true;
	// document.getElementById("text_h"+cont).disabled = true;
	// document.getElementById("text_o"+cont).disabled = true;
	
	console.log(datos);
	console.log(filas);
}

function eliminar(cont)
{

	datos.splice(cont,1);
	filas.splice(cont,1);
	$('#fila_s'+cont).remove();
	$('#fila_d'+cont).remove();
	$('#fila_h'+cont).remove();
	$('#fila_ob'+cont).remove();
	$('#fila_op'+cont).remove();
	// cont--;
	console.log(datos);
	console.log(filas);
	console.log(cont);
	// console.log(cont);
	// console.log(datos);
}

function guardar(){
	var titulo = document.getElementById("titulo").value;
	var mes = document.getElementById("mes").value;
	var anio = document.getElementById("anio").value;

	objeto = {
		"titulo": titulo,
		"mes": mes,
		"anio": anio,
		"datos": datos
	};
	// console.log(objeto);
	var parametros = {
	    my_json: objeto
	};

	console.log(objeto["datos"])

  	$.ajax({
  		type: "GET", 
  		url: "{{route('guardar-cartera-servicio')}}",
  		data: parametros
  	}).done(function(info){
  		window.location.href = "{{url('adm/centro')}}";
  	});
}

</script>
@endpush
@endsection
