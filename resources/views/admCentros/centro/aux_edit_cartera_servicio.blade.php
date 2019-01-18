@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Editar Cartera de Servicio: {{$cartera_servicio->id}}</b> * * * * *
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
                <input name="titulo" id="titulo" class="autosize form-control" value="{{$cartera_servicio->titulo}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Mes:</label>
              <input name="mes" id="mes" class="autosize form-control" value="{{$cartera_servicio->mes}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Anio:</label>
              <input name="anio" id="anio" class="autosize form-control" value="{{$cartera_servicio->anio}}" type="text" step="any">
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
                  <th>Opciones</th>
          			</thead>
          			<tbody>
	                <div id="especialidades">
	                	@foreach($especialidades as $var)
	                      	<tr id="fila_datos{{$var -> id}}">
	                          <td class="center">{{$var -> nombre}} </td>
	                          <td class="center" id="especialidad_servicio{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_dia{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_hora{{$var -> id}}"></td>
	                          <td class="center" id="especialidad_observacion{{$var -> id}}"></td>
                            <td class="center" id="especialidad_opcion{{$var -> id}}"></td>
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
                <button onclick="actualizar()" class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-right"> Editar Cartera de Servicio </i>
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
var servicios = {!! $servicios_json !!};
var cont = 0;
var filas = [];
var datos = [];

console.log(servicios);

for(i=0;i<servicios.length;i++){
  	var fila_servicio = '<div id="fila_s'+cont+'"><input disabled="true" style="margin-bottom: 14px;" id="text_s'+cont+'" type="text" value="'+servicios[i]['nombre']+'"></br></div>';
  	var fila_dia = '<div id="fila_d'+cont+'"><input disabled="true" style="margin-bottom: 14px;" id="text_d'+cont+'" type="text" value="'+servicios[i]['dias']+'"></br></div>';
  	var fila_hora = '<div id="fila_h'+cont+'"><input disabled="true" style="margin-bottom: 14px;" id="text_h'+cont+'" type="text" value="'+servicios[i]['hora']+'"></br></div>';
  	var fila_observacion = '<div id="fila_ob'+cont+'"><input disabled="true" style="margin-bottom: 14px;" id="text_o'+cont+'" type="text" value="'+servicios[i]['observacion']+'"></br></div>';
    var fila_opcion = '<div id="fila_op'+cont+'"><button style="margin-bottom: 5px;" type="button" class="btn btn-danger" onclick="eliminar('+cont+');"><i class="fa fa-close"></i></button> <button style="margin-bottom: 5px;" type="button" class="btn btn-info" onclick="editar('+cont+ ','+servicios[i]['id_detalle_centro_especialidad']+');"><i class="fa fa-edit"></i></button> <button style="margin-bottom: 5px;" type="button" class="btn btn-primary" onclick="adicionar('+cont+ ','+servicios[i]['id_detalle_centro_especialidad']+ ','+servicios[i]['id']+');"><i class="fa fa-save"></i></button><br></div>';

  	$('#especialidad_servicio'+servicios[i]['id_detalle_centro_especialidad']).append(fila_servicio);
  	$('#especialidad_dia'+servicios[i]['id_detalle_centro_especialidad']).append(fila_dia);
  	$('#especialidad_hora'+servicios[i]['id_detalle_centro_especialidad']).append(fila_hora);
  	$('#especialidad_observacion'+servicios[i]['id_detalle_centro_especialidad']).append(fila_observacion);
    $('#especialidad_opcion'+servicios[i]['id_detalle_centro_especialidad']).append(fila_opcion);
    

    filas.splice(cont, 0, cont);
    var servicio = document.getElementById("text_s"+cont).value;
    var dia = document.getElementById("text_d"+cont).value;
    var hora = document.getElementById("text_h"+cont).value;
    var observacion = document.getElementById("text_o"+cont).value;
    var dato = [];
    dato.push(servicios[i]['id_detalle_centro_especialidad'],servicio,dia,hora,observacion,cont,servicios[i]['id']);
    datos.splice(cont, 0, dato);
    cont++;
}
console.log(datos);
console.log(filas);
// console.log(datos[1][5]);

function editar(cont,id) {
  console.log(cont);
  if (filas.includes(cont)) {
    document.getElementById("text_s"+cont).disabled = false;
    document.getElementById("text_d"+cont).disabled = false;
    document.getElementById("text_h"+cont).disabled = false;
    document.getElementById("text_o"+cont).disabled = false;
    // datos.splice(cont,1);
    // filas.splice(cont,1);
    var n_i = obtenerIndDato(cont);
    datos.splice(n_i,1);
    removeItemFromArr( filas, cont );
  }else{
    console.log("Registro en Edicion");
  }
  console.log(datos);
  console.log(filas);
}

function adicionar(cont,id,id_servicio)
{
  if (!filas.includes(cont)) {//verifico si la fila ya se dio el boton guardar
    // filas.push(cont);
    filas.splice(cont, 0, cont);
    var servicio = document.getElementById("text_s"+cont).value;
    var dia = document.getElementById("text_d"+cont).value;
    var hora = document.getElementById("text_h"+cont).value;
    var observacion = document.getElementById("text_o"+cont).value;
    var dato = [];
    dato.push(id,servicio,dia,hora,observacion,cont,id_servicio);
    // datos.push(dato);
    datos.splice(cont, 0, dato);

    document.getElementById("text_s"+cont).disabled = true;
    document.getElementById("text_d"+cont).disabled = true;
    document.getElementById("text_h"+cont).disabled = true;
    document.getElementById("text_o"+cont).disabled = true;
  }else{
    alert("Registro Ya Guardado.");
  }
  console.log(datos);
  console.log(filas);
}

function actualizar(){
  var titulo = document.getElementById("titulo").value;
  var mes = document.getElementById("mes").value;
  var anio = document.getElementById("anio").value;

  objeto = {
    "titulo": titulo,
    "mes": mes,
    "anio": anio,
    "datos": datos,
    "id": "{{$cartera_servicio->id}}"
  };
  console.log(objeto);
  var parametros = {
      my_json: objeto
  };

  // console.log(objeto["datos"])

    $.ajax({
      type: "GET", 
      url: "{{route('actualizar-cartera-servicio')}}",
      data: parametros
    }).done(function(info){
      window.location.href = "{{url('adm/centro')}}";
    });
}

function removeItemFromArr ( arr, item ) {
    var i = arr.indexOf( item );
 
    if ( i !== -1 ) {
        arr.splice( i, 1 );
    }
}

function obtenerIndDato(ind) {
  var c = 0;
  for (var i = 0; i < datos.length; i++) {
    if (datos[i][5] == ind) {
      return c;
    }
    c++;
  }
}

</script>
@endpush
@endsection
