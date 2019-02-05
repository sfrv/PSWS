@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>CENTRO DE SALUD</b>
  </h1>
  <br>
</section>
<section>

<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE REGISTRO DE <span class="text-bold">CENTRO DE SALUD</span></h3>

          <div class="panel-body">
            {!!Form::open(array('url'=>'adm/centro','method'=>'POST','autocomplete'=>'off','files' => true))!!}
  			    {{Form::token()}} 

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Nombre del Centro:
                  </label>
                  <textarea   class="autosize form-control" id="form-field-24" name="nombre"></textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">             
                  <label for="form-field-24">
                    Direccion del Centro:
                  </label>
                  <textarea   class="autosize form-control" id="form-field-24" name="direccion"></textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_red">Red:</label>
                  <select name="id_red" id="id_red" class="form-control selectpicker">
                    @foreach($redes as $var)
    	               <option value="{{$var->id}}">{{$var->nombre}}</option>
    	              @endforeach
              		</select>
              	</div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group"> 
              	   <label for="id_tipo_servicio">Tipo de Servicio</label>
                  <select name="id_tipo_servicio" id="id_tipo_servicio" class="form-control selectpicker">
                    @foreach($tiposervicios as $var)
    	               <option value="{{$var->id}}">{{$var->nombre}}</option>
    	              @endforeach
              		</select>
              	</div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_zona">Zona:</label>
                  <select name="id_zona" id="id_zona" class="form-control selectpicker">
                    @foreach($zonas as $var)
    	               <option value="{{$var->id}}">{{$var->nombre}}</option>
    	              @endforeach
              		</select>
              	</div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Nivel: </label>
                  <select name="id_nivel" id="id_nivel" class="form-control selectpicker">
                    @foreach($niveles as $var)
    	               <option value="{{$var->id}}">{{$var->nombre}}</option>
    	              @endforeach
              		</select>
              	</div>
              </div>
              <!-- <div class="form-group">
                <div class="col-lg-12 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    Escriba una breve Descripcion:
                  </label>
                  <textarea   class="autosize form-control" id="form-field-24" name="descripcion"></textarea>
                </div>
              </div> -->
              
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">                
                  <label for="form-field-24">
                    Latitud:
                  </label>
                  <input   name="latitud" id="latitud" class="autosize form-control" type="number" step="any">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                  <label for="form-field-24">
                    Longitud:
                  </label>
                  <input   name="longitud" id="longitud" class="autosize form-control" type="number" step="any">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Distrito:
                  </label>
                  <input   name="distrito" id="distrito" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">                
                  <label for="form-field-24">
                    Uv:
                  </label>
                  <input   name="uv" id="uv" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
               <div class="form-group">          
                  <label for="form-field-24">
                    Manzano:
                  </label>
                  <input   name="manzano" id="manzano" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">   
                  <label for="form-field-24">
                    Horas de Atencion:
                  </label>
                  <input   name="horas_atencion" id="horas_atencion" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Telefono:
                  </label>
                  <input   name="telefono" id="telefono" class="autosize form-control" type="number" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
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
              <div class="panel-heading">ASIGNACION DE ESPECIALIDADES</div>
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

          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			  <div class="table-responsive">
          			<table id="detalles_e" class="table table-striped table-bordered table-condensed table-hover">
          			<thead style="background-color:#A9D0F5">
          				<th class="text-center">OPCION</th>
          				<th class="text-center">NOMBRE DE LA ESPECIALIDAD</th>
                  <th class="text-center">EMERGENCIA</th>
                  <th class="text-center">CONSULTA EXT.</th>
                  <th class="text-center">HOSPITALIZACION</th>
          			</thead>
          			<tfoot>
          				<th class="text-center">TOTAL</th>
          				<th class="text-center"></th>
          			</tfoot>
          			<tbody></tbody>
          			</table>
          			</div>
          		</div>
              </div>
             </div>
            <br>
            <div class="col-sm-8 col-sm-offset-2" id="guardar">
             <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">
                 REGISTRAR CENTRO DE SALUD <i class="fa fa-arrow-circle-right"></i>
               </button>
             </div>
            </div>
          {!! Form::close() !!}
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
function comenzar(){
  $('#bt_add_e').click(function(){
   agregar_e();
  });
}
$("#guardar").hide();


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
    '</tr>';
  cont++;
  $("#pidespecialidad_e").val("");
  evaluar();
  $('#detalles_e').append(fila);
  
}

function evaluar()
 {
   if(cont>0)
   {
     $("#guardar").show();
   }
   else
   {
     $("#guardar").hide();
   }
 }
function eliminar(index,id_e)
{
  var n_i = getIndDato(id_e);
  if (n_i != -1) {
    array_especialidades_id.splice(n_i,1);
  }
  $('#fila'+index).remove();
  evaluar();
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
