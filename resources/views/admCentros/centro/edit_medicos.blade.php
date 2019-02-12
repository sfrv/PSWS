
@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>CENTRO DE SALUD: {{$centro->nombre}}</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE EDICION DE <span class="text-bold">CENTRO DE SALUD - MEDICOS</span></h3>
          <div class="panel-body">
            {!! Form::model($centro,['method'=>'PATCH','route'=>['update-medicos',$centro->id]])!!}
            {{Form::token()}} 
            <br>
            <div class="panel panel-info">
              <div class="panel-heading">MEDICOS REGISTRADAS</div>
              <div class="panel-body">

              <div class="row">
                <div class="col-lg-9 col-md-9 col-dm-9 col-xs-9">
                  <div>
                    <label>DOCTORES DISPONIBLES: </label>
                    <select name="pidmedico" id="pidmedico" class="form-control">
                        @foreach($medicos as $var)
                          <option value="{{$var -> id}}_{{$var -> nombre}}_{{$var -> apellido}}_{{$var -> telefono}}">{{$var -> nombre}} {{$var -> apellido}} {{$var -> telefono}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-dm-3 col-xs-3">
                  <label>OPCION </label>
                  <div>
                    <button class="btn btn-primary" type="button"  id="bt_add_e" >AGREGAR</button>
                  </div>
                </div>
              </div>
              <br>
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			  <div class="table-responsive">
          			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
          			<thead style="background-color:#A9D0F5">
          				<th class="text-center">OPCION</th>
                  <th class="text-center">NOMBRE</th>
                  <th class="text-center">APELLIDO</th>
                  <th class="text-center">TELEFONO</th>
                  <th class="text-center">ESTADO</th>
          			</thead>
          			<tbody>
                  @foreach($detalle_medicos as $var)
                      <tr class="text-center" id="fila{{$var -> id_medico}}">
                        <td >
                        	@if($var -> estado == 1)
	                        	<button id="btn_el_{{$var -> id}}" type="button" class="btn btn-danger" onclick="eliminar_esp({{$var -> id_medico}},{{$var -> id}});"><i class="fa fa-close"></i></button>
                          		<button disabled id="btn_hab_{{$var -> id}}" type="button" class="btn btn-primary" onclick="hab_esp({{$var -> id_medico}},{{$var -> id}});"><i class="fa fa-check"></i></button>
	                        @else
	                        	<button disabled id="btn_el_{{$var -> id}}" type="button" class="btn btn-danger" onclick="eliminar_esp({{$var -> id_medico}},{{$var -> id}});"><i class="fa fa-close"></i></button>
                          		<button id="btn_hab_{{$var -> id}}" type="button" class="btn btn-primary" onclick="hab_esp({{$var -> id_medico}},{{$var -> id}});"><i class="fa fa-check"></i></button>
	                        @endif
                        </td>
                        <td><input type="hidden" name="idmedicos_edit[]" value="{{$var -> id}}">{{$var -> nombre}}</td>
                        <td>{{$var -> apellido}}</td>
                        <td>{{$var -> telefono}}</td>
                        <td>
                          @if($var -> estado == 1)
                            <span id="{{$var -> id}}text" class="badge bg-blue">ACTIVO</span>
                          @else
                            <span id="{{$var -> id}}text" class="badge bg-red">INACTIVO</span>
                          @endif
                        </td>

                      </tr>
                  @endforeach
                </tbody>
          			</table>
          			</div>
          		</div>
              </div>
             </div>
             <div class="col-sm-8 col-sm-offset-2">
               <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">
                   EDITAR MEDICOS <i class="fa fa-arrow-circle-right"></i>
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
var cont=0;
var cant_especialidad_e = 0;
var array_medicos_id = [];
var array_medicos_id_habilitar = [];
var array_medicos_id_delete = [];
var array_valores_medicos = [];
var detalle_medicos_json = {!! $detalle_medicos !!};

for (var i = 0; i < detalle_medicos_json.length; i++) {
  $("#pidmedico option[value='"+detalle_medicos_json[i]['id_medico']+'_'+detalle_medicos_json[i]['nombre']+'_'+detalle_medicos_json[i]['apellido']+'_'+detalle_medicos_json[i]['telefono']+"']").remove();
  array_medicos_id.push( "" + detalle_medicos_json[i]['id_medico']);
}

function comenzar(){
  $('#bt_add_e').click(function(){
   agregar_e();
  });
}

function agregar_e()
{
	valor_medico = $("#pidmedico").val();
	if (valor_medico == "" || valor_medico == null){
	  alert("ERROR AL AGREGAR DOCTOR, POR FAVOR SELECIONE UN ELEMENTO. ");
	  return;
	}
	datos_medico = valor_medico.split('_');
	id_medico = datos_medico[0]
	nombre_medico = datos_medico[1]
	apellido_medico = datos_medico[2]
	telefono_medico = datos_medico[3]

	if (nombre_medico == "" || apellido_medico == ""){
	  alert("ERROR AL AGREGAR, POR FAVOR SELECIONE UN ELEMENTO. ");
	  return;
	}

	if (array_medicos_id.includes(id_medico)) {
	  alert("ERROR AL AGREGAR, ELEMENTO YA AGREGADO. ");
	  return;
	}

	$("#pidmedico option[value='"+valor_medico+"']").remove();
	var aux_array = [];
	aux_array.push(cont,valor_medico);
	array_valores_medicos.push(aux_array);
	console.log(array_valores_medicos);

  	array_medicos_id.push(id_medico);
  	var fila='<tr class="text-center" class="selected" id="fila'+cont+'">'+
      '<td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+','+id_medico+');"><i class="fa fa-close"></i></button></td>'+
      '<td><input type="hidden" name="idmedicos[]" value="'+id_medico+'">'+nombre_medico+'</td>'+
      '<td>'+apellido_medico+'</td>'+
      '<td>'+telefono_medico+'</td>'+
      '<td><span class="badge bg-green">NUEVO</span></td>' +
    '</tr>';
  	cont++;
  	$('#detalles').append(fila);
  	console.log(array_medicos_id);
}

function eliminar(index,id_e)
{
  	var n_i = getIndDato(id_e,array_medicos_id);
  	if (n_i != -1) {
   		array_medicos_id.splice(n_i,1);
 	}

 	var n_i = getIndDato2(index,array_valores_medicos);
  	if (n_i != -1) {
  		var valor_medico = array_valores_medicos[n_i][1];
  		datos_medico = valor_medico.split('_');
  		$('#pidmedico').append('<option value="'+valor_medico+'" >'+datos_medico[1]+' '+datos_medico[2]+' '+datos_medico[3]+'</option>');
  		// console.log(datos_medico);
   		array_valores_medicos.splice(n_i,1);
 	}

  	$('#fila'+index).remove();
  	console.log(array_medicos_id);
  	console.log(array_valores_medicos);
}

function eliminar_esp(idesp,id) {
	if (array_medicos_id_habilitar.includes(id)) {
		var n_i = getIndDato(id,array_medicos_id_habilitar);
	  	if (n_i != -1) {
	   		array_medicos_id_habilitar.splice(n_i,1);
	 	}
		$('#fila_hab'+id).remove();
	}

	if (!array_medicos_id_delete.includes(id)) {
		array_medicos_id_delete.push(id);
	  	var fila='<tr hidden id="fila_eli'+id+'">'+
      		'<td><input type="hidden" name="idmedico_delete[]" value="'+id+'"></td>'+
    		'</tr>';
  		$('#detalles').append(fila);
	}

	document.getElementById("btn_el_"+id).disabled = true;
	document.getElementById("btn_hab_"+id).disabled = false;

	// var fila='<tr hidden id="fila_eli'+id+'">'+
 //      	'<td><input type="hidden" name="idmedico_delete[]" value="'+id+'"></td>'+
 //    	'</tr>';
 //  	$('#detalles').append(fila);
  	console.log(array_medicos_id);

  	var span = document.getElementById(id+"text");
  	span.textContent = "INACTIVO";
  	span.className = "badge bg-red";
}

function hab_esp(idesp,id) {
	if (!array_medicos_id_habilitar.includes(id)) {
		array_medicos_id_habilitar.push(id);
	  	var fila='<tr hidden id="fila_hab'+id+'">'+
      		'<td><input type="hidden" name="idmedico_habilitar[]" value="'+id+'"></td>'+
    		'</tr>';
  		$('#detalles').append(fila);
	}

	if (array_medicos_id_delete.includes(id)) {
		var n_i = getIndDato(id,array_medicos_id_delete);
	  	if (n_i != -1) {
	   		array_medicos_id_delete.splice(n_i,1);
	 	}
		$('#fila_eli'+id).remove();
	}

	document.getElementById("btn_el_"+id).disabled = false;
	document.getElementById("btn_hab_"+id).disabled = true;
  	console.log(array_medicos_id);

  	var span = document.getElementById(id+"text");
  	span.textContent = "ACTIVO";
  	span.className = "badge bg-blue";
}

function getIndDato(ind,array_l) {
  var c = 0;
  for (var i = 0; i < array_l.length; i++) {
    if (array_l[i] == ind) {
      return c;
    }
    c++;
  }
  return -1;
}

function getIndDato2(ind,array_l) {
  var c = 0;
  for (var i = 0; i < array_l.length; i++) {
    if (array_l[i][0] == ind) {
      return c;
    }
    c++;
  }
  return -1;
}

window.addEventListener("load",comenzar, false);
</script>
@endpush
@endsection
