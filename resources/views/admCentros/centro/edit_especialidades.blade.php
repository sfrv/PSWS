
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
          <h3 align="center">PANEL DE EDICION DE <span class="text-bold">CENTRO DE SALUD - ESPECIALIDADES</span></h3>
          <div class="panel-body">
            {!! Form::model($centro,['method'=>'PATCH','route'=>['update-especialidades',$centro->id]])!!}
            {{Form::token()}} 
            <br>
            <div class="panel panel-info">
              <div class="panel-heading">ESPECIALIDADES REGISTRADAS</div>
              <div class="panel-body">

              <div class="row">
                <div class="col-lg-9 col-md-9 col-dm-9 col-xs-9">
                  <div>
                    <label>ESPECIALIDAD: </label>
                    <select name="pidespecialidad_e" id="pidespecialidad_e" class="form-control">
                        @foreach($especialidades as $var)
                          <option value="{{$var -> id}}">{{$var -> nombre}}</option>
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
                  <th class="text-center">NOMBRE DE LA ESPECIALIDAD</th>
                  <th class="text-center">EMERGENCIA</th>
                  <th class="text-center">CONSULTA EXT.</th>
                  <th class="text-center">HOSPITALIZACION</th>
                  <th class="text-center">ESTADO</th>
          			</thead>
          			<tbody>
                  @foreach($detalle as $var)
                      <tr class="text-center" id="fila{{$var -> id_especialidad}}">
                        <td >
                          @if($var -> estado == 1)
                            <button id="btn_el_{{$var -> id}}" type="button" class="btn btn-danger" onclick="eliminar_esp({{$var -> id_especialidad}},{{$var -> id}});"><i class="fa fa-close"></i></button>
                              <button disabled id="btn_hab_{{$var -> id}}" type="button" class="btn btn-primary" onclick="hab_esp({{$var -> id_especialidad}},{{$var -> id}});"><i class="fa fa-check"></i></button>
                          @else
                            <button disabled id="btn_el_{{$var -> id}}" type="button" class="btn btn-danger" onclick="eliminar_esp({{$var -> id_especialidad}},{{$var -> id}});"><i class="fa fa-close"></i></button>
                              <button id="btn_hab_{{$var -> id}}" type="button" class="btn btn-primary" onclick="hab_esp({{$var -> id_especialidad}},{{$var -> id}});"><i class="fa fa-check"></i></button>
                          @endif
                        </td>
                        <td><input type="hidden" name="idespecialidad_edit[]" value="{{$var -> id}}">{{$var -> nombre}}</td>
                        <td>
                          @if($var -> etapa_emergencia == 1)
                            @if($var -> estado == 1)
                              <input name="{{$var -> id}}_ef" id="{{$var -> id}}_ef" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @else
                              <input disabled name="{{$var -> id}}_ef"  id="{{$var -> id}}_ef" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @endif
                          @else
                            @if($var -> estado == 1)
                              <input name="{{$var -> id}}_ef"  id="{{$var -> id}}_ef" type="checkbox" style="height: 18px;width: 18px;">
                            @else
                              <input disabled name="{{$var -> id}}_ef"  id="{{$var -> id}}_ef" type="checkbox" style="height: 18px;width: 18px;">
                            @endif
                          @endif
                        </td>
                        <td>
                          @if($var -> etapa_consulta == 1)
                            @if($var -> estado == 1)
                              <input name="{{$var -> id}}_cf" id="{{$var -> id}}_cf" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @else
                              <input disabled name="{{$var -> id}}_cf" id="{{$var -> id}}_cf" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @endif
                          @else
                            @if($var -> estado == 1)
                              <input name="{{$var -> id}}_cf" id="{{$var -> id}}_cf" type="checkbox" style="height: 18px;width: 18px;">
                            @else
                              <input disabled name="{{$var -> id}}_cf" id="{{$var -> id}}_cf" type="checkbox" style="height: 18px;width: 18px;">
                            @endif
                          @endif
                        </td>
                        <td>
                          @if($var -> etapa_hospitalizacion == 1)
                            @if($var -> estado == 1)
                              <input name="{{$var -> id}}_hf" id="{{$var -> id}}_hf" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @else
                              <input disabled name="{{$var -> id}}_hf" id="{{$var -> id}}_hf" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @endif
                          @else
                            @if($var -> estado == 1)
                              <input name="{{$var -> id}}_hf" id="{{$var -> id}}_hf" type="checkbox" style="height: 18px;width: 18px;">
                            @else
                              <input disabled name="{{$var -> id}}_hf" id="{{$var -> id}}_hf" type="checkbox" style="height: 18px;width: 18px;">
                            @endif
                          @endif
                        </td>
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
                   EDITAR ESPECIALIDADES <i class="fa fa-arrow-circle-right"></i>
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
var array_especialidades_id = [];
var array_valores_especialidades = [];
var detalle_json = {!! $detalle_json !!};

for (var i = 0; i < detalle_json.length; i++) {
  $("#pidespecialidad_e option[value='"+detalle_json[i]['id_especialidad']+"']").remove();
  array_especialidades_id.push( "" + detalle_json[i]['id_especialidad']);
}

function comenzar(){
  $('#bt_add_e').click(function(){
   agregar_e();
  });
}

function agregar_e()
{
  idespecialidad=$("#pidespecialidad_e").val();
  especialidad=$("#pidespecialidad_e option:selected").text();

  if (idespecialidad == "" || especialidad == ""){
    alert("ERROR AL AGREGAR, POR FAVOR SELECIONE UN ELEMENTO. ");
    return;
  }

  if (array_especialidades_id.includes(idespecialidad)) {
    alert("ERROR AL AGREGAR, ELEMENTO YA AGREGADO. ");
    return;
  }

  $("#pidespecialidad_e option[value='"+idespecialidad+"']").remove();
  var aux_array = [];
  aux_array.push(cont,idespecialidad,especialidad);
  array_valores_especialidades.push(aux_array);
  console.log(array_valores_especialidades);

  // console.log(idespecialidad);
  // console.log(especialidad);

  array_especialidades_id.push(idespecialidad);
  var fila='<tr class="text-center" class="selected" id="fila'+cont+'">'+
      '<td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+','+idespecialidad+');"><i class="fa fa-close"></i></button></td>'+
      '<td><input type="hidden" name="idespecialidad_e[]" value="'+idespecialidad+'">'+especialidad+'</td>'+
      '<td><input name="'+idespecialidad+'_e" type="checkbox" style="height: 18px;width: 18px;" value="yes"></td>'+
      '<td><input name="'+idespecialidad+'_c" type="checkbox" style="height: 18px;width: 18px;" value="yes"></td>'+
      '<td><input name="'+idespecialidad+'_h" type="checkbox" style="height: 18px;width: 18px;" value="yes"></td>'+
      '<td><span class="badge bg-green">NUEVO</span></td>' +
    '</tr>';
  cont++;
  // $("#pidespecialidad_e").val("");
  $('#detalles').append(fila);
  console.log(array_especialidades_id);
}

function eliminar(index,id_e)
{
  var n_i = getIndDato(id_e);
  if (n_i != -1) {
    array_especialidades_id.splice(n_i,1);
  }

  var n_i = getIndDato2(index,array_valores_especialidades);
    if (n_i != -1) {
      var idespecialidad = array_valores_especialidades[n_i][1];
      var especialidad = array_valores_especialidades[n_i][2];
      $('#pidespecialidad_e').append('<option value="'+idespecialidad+'" >'+especialidad+'</option>');
      // console.log(datos_medico);
      array_valores_especialidades.splice(n_i,1);
  }

  $('#fila'+index).remove();
  console.log(array_especialidades_id);
  console.log(array_valores_especialidades);
}

function eliminar_esp(idesp,id) {
  // var n_i = getIndDato(idesp);
  // if (n_i != -1) {
  //   array_especialidades_id.splice(n_i,1);
  // }
  // var x = document.getElementById("mynav");
  // x.className += " sidebar-collapse";
  // $('#fila_hab'+id).remove();
  // document.getElementById("btn_el_"+id).style.display = "none";//mostrar
  // document.getElementById("btn_hab_"+id).style.display = "block";//ocultar

  // var fila='<tr hidden id="fila_eli'+id+'">'+
  //     '<td><input type="hidden" name="idespecialidad_delete[]" value="'+id+'"></td>'+
  //   '</tr>';
  // $('#detalles').append(fila);
  // $('#fila'+idesp).remove();
  document.getElementById("btn_el_"+id).disabled = true;
  document.getElementById("btn_hab_"+id).disabled = false;

  document.getElementById(id+"_ef").disabled = true;
  document.getElementById(id+"_cf").disabled = true;
  document.getElementById(id+"_hf").disabled = true;
  console.log(array_especialidades_id);

  var span = document.getElementById(id+"text");
  span.textContent = "INACTIVO";
  span.className = "badge bg-red";
}

function hab_esp(idesp,id) {
  // $('#fila_eli'+id).remove();
  // document.getElementById("btn_el_"+id).style.display = "block";//mostrar
  // document.getElementById("btn_hab_"+id).style.display = "none";//ocultar

  // var fila='<tr hidden id="fila_hab'+id+'">'+
  //     '<td><input type="hidden" name="idespecialidad_habilitar[]" value="'+id+'"></td>'+
  //   '</tr>';
  // $('#detalles').append(fila);
  document.getElementById("btn_el_"+id).disabled = false;
  document.getElementById("btn_hab_"+id).disabled = true;

  document.getElementById(id+"_ef").disabled = false;
  document.getElementById(id+"_cf").disabled = false;
  document.getElementById(id+"_hf").disabled = false;
  console.log(array_especialidades_id);

  var span = document.getElementById(id+"text");
  span.textContent = "ACTIVO";
  span.className = "badge bg-blue";
}

function getIndDato(ind) {
  var c = 0;
  for (var i = 0; i < array_especialidades_id.length; i++) {
    if (array_especialidades_id[i] == ind) {
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
