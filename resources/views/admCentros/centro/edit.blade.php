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
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE EDICION DE <span class="text-bold">CENTRO DE SALUD</span></h3>
          <br>
          <div class="panel-body">
            {!! Form::model($centro,['method'=>'PATCH','route'=>['centro.update',$centro->id],'files'=>'true'])!!}
            {{Form::token()}} 
            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    NOMBRE DEL CENTRO:
                  </label>
                  <textarea class="autosize form-control" id="form-field-24" name="nombre">{{$centro->nombre}}</textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">             
                  <label for="form-field-24">
                    DIRECCION DEL CENTRO:
                  </label>
                  <textarea class="autosize form-control" id="form-field-24" name="direccion">{{$centro->direccion}}</textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                  <label for="id_red">RED:</label>
                  <select name="id_red" id="id_red" class="form-control selectpicker">
                    @foreach($redes as $var)
                      @if($var->nombre == $centro->nombreRed)
                        <option value="{{$var->id}}" selected>{{$var->nombre}}</option>
                      @else
                        <option value="{{$var->id}}">{{$var->nombre}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group"> 
                  <label for="id_tipo_servicio">TIPO DE SERVICIO</label>                  
                  <select name="id_tipo_servicio" id="id_tipo_servicio" class="form-control selectpicker">
                    @foreach($tiposervicios as $var)
                      @if($var->nombre == $centro->nombreServicio)
                        <option value="{{$var->id}}" selected>{{$var->nombre}}</option>
                      @else
                        <option value="{{$var->id}}">{{$var->nombre}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                  <label for="id_zona">ZONA:</label>
                  <select name="id_zona" id="id_zona" class="form-control selectpicker">
                    @foreach($zonas as $var)
                      @if($var->nombre == $centro->nombreZona)
                        <option value="{{$var->id}}" selected>{{$var->nombre}}</option>
                      @else
                        <option value="{{$var->id}}">{{$var->nombre}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                  <label for="id_nivel">NIVEL: </label>
                  <select name="id_nivel" id="id_nivel" class="form-control selectpicker">
                    @foreach($niveles as $var)
                      @if($var->nombre == $centro->nombreNivel)
                        <option value="{{$var->id}}" selected>{{$var->nombre}}</option>
                      @else
                        <option value="{{$var->id}}">{{$var->nombre}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">                
                  <label for="form-field-24">
                    LATITUD:
                  </label>
                  <input name="latitud" id="latitud" class="autosize form-control" type="number" step="any" value="{{$centro->latitud}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                  <label for="form-field-24">
                    LONGITUD:
                  </label>
                  <input name="longitud" id="longitud" class="autosize form-control" type="number" step="any" value="{{$centro->longitud}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    DISTRITO:
                  </label>
                  <input name="distrito" id="distrito" class="autosize form-control" type="text" step="any" value="{{$centro->distrito}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">                
                  <label for="form-field-24">
                    UV:
                  </label>
                  <input name="uv" id="uv" class="autosize form-control" type="text" step="any" value="{{$centro->uv}}">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
               <div class="form-group">          
                  <label for="form-field-24">
                    MANZANO:
                  </label>
                  <input name="manzano" id="manzano" class="autosize form-control" type="text" step="any" value="{{$centro->manzano}}">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">   
                  <label for="form-field-24">
                    HORAS DE ATENCION:
                  </label>
                  <input name="horas_atencion" id="horas_atencion" class="autosize form-control" type="text" value="{{$centro->horas_atencion}}">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    TELEFONO:
                  </label>
                  <input name="telefono" id="telefono" class="autosize form-control" type="number" value="{{$centro->telefono}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-dm-12 col-xs-12 col-sm-offset-4">
                <div class="form-group">               
                  <label for="form-field-24">
                    IMAGEN DEL CENTRO:
                  </label>
                  <br>
                  <img src="{{asset('images/Centros/'.$centro->imagen)}}" height="100%" width="65%" class="img-thumbnail">
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-dm-12 col-xs-12 col-sm-offset-3">
                <div class="form-group">               
                  <label for="form-field-24">
                    Imagen:
                  </label>
                  <input   name="imagen" id="imagen" class="autosize form-control" type="file" step="any">
                </div>
              </div>
            </div>
            <br>
            <div class="panel panel-info">
              <div class="panel-heading">ESPECIALIDADES REGISTRADAS</div>
              <div class="panel-body">

              <div class="row">
              <div class="col-lg-10 col-md-10 col-dm-10 col-xs-10">
                <div class="form-group">
                  <label>ESPECIALIDAD: </label>
                  <select name="pidespecialidad_e" id="pidespecialidad_e" class="form-control">
                      @foreach($especialidades as $var)
                        <option value="{{$var -> id}}">{{$var -> nombre}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-dm-2 col-xs-2">
                <label>OPCION </label>
                <div class="form-group">
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
                          <button id="btn_el_{{$var -> id}}" type="button" class="btn btn-danger" onclick="eliminar_esp({{$var -> id_especialidad}},{{$var -> id}});"><i class="fa fa-close"></i></button>
                          <button id="btn_hab_{{$var -> id}}" type="button" class="btn btn-primary" onclick="hab_esp({{$var -> id_especialidad}},{{$var -> id}});"><i class="fa fa-check"></i></button>
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
                            <span id="{{$var -> id}}text" style="background-color: #3B8DBD;color: white;">| ACTIVO | </span>
                          @else
                            <span id="{{$var -> id}}text" style="background-color: #DC4D3D;color: white;">| INACTIVO |</span>
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
               <a href="{{URL::action('CentroMedicoController@index')}}"><button class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-left"> EDITAR </i>
                 </button></a>
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
var detalle_json = {!! $detalle_json !!};

for (var i = 0; i < detalle_json.length; i++) {
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

  console.log(idespecialidad);
  console.log(especialidad);

  array_especialidades_id.push(idespecialidad);
  var fila='<tr class="text-center" class="selected" id="fila'+cont+'">'+
      '<td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+','+idespecialidad+');"><i class="fa fa-close"></i></button></td>'+
      '<td><input type="hidden" name="idespecialidad_e[]" value="'+idespecialidad+'">'+especialidad+'</td>'+
      '<td><input name="'+idespecialidad+'_e" type="checkbox" style="height: 18px;width: 18px;" value="yes"></td>'+
      '<td><input name="'+idespecialidad+'_c" type="checkbox" style="height: 18px;width: 18px;" value="yes"></td>'+
      '<td><input name="'+idespecialidad+'_h" type="checkbox" style="height: 18px;width: 18px;" value="yes"></td>'+
      '<td>NUEVO</td>' +
    '</tr>';
  cont++;
  $("#pidespecialidad_e").val("");
  $('#detalles').append(fila);
  console.log(array_especialidades_id);
}

function eliminar(index,id_e)
{
  var n_i = getIndDato(id_e);
  if (n_i != -1) {
    array_especialidades_id.splice(n_i,1);
  }
  $('#fila'+index).remove();
  console.log(array_especialidades_id);
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
  document.getElementById(id+"_ef").disabled = true;
  document.getElementById(id+"_cf").disabled = true;
  document.getElementById(id+"_hf").disabled = true;
  console.log(array_especialidades_id);

  var span = document.getElementById(id+"text");
  document.getElementById(id+"text").style.backgroundColor = "#DC4D3D";
  span.textContent = "| INACTIVO |";
}

function hab_esp(idesp,id) {
  // $('#fila_eli'+id).remove();
  // document.getElementById("btn_el_"+id).style.display = "block";//mostrar
  // document.getElementById("btn_hab_"+id).style.display = "none";//ocultar

  // var fila='<tr hidden id="fila_hab'+id+'">'+
  //     '<td><input type="hidden" name="idespecialidad_habilitar[]" value="'+id+'"></td>'+
  //   '</tr>';
  // $('#detalles').append(fila);
  document.getElementById(id+"_ef").disabled = false;
  document.getElementById(id+"_cf").disabled = false;
  document.getElementById(id+"_hf").disabled = false;
  console.log(array_especialidades_id);

  var span = document.getElementById(id+"text");
  document.getElementById(id+"text").style.backgroundColor = "#3B8DBD";
  span.textContent = "ACTIVO";
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

window.addEventListener("load",comenzar, false);
</script>
@endpush
@endsection
