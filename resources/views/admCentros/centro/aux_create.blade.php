@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Centros de Salud</b> * * * * *
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
          <h3 align="center">Panel de control de <span class="text-bold">Centro de Salud</span></h3>

          <div class="panel-body">
            {!!Form::open(array('url'=>'adm/centro','method'=>'POST','autocomplete'=>'off','files' => true))!!}
  			    {{Form::token()}} 

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Nombre del Centro:
                  </label>
                  <textarea required="required" class="autosize form-control" id="form-field-24" name="nombre"></textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">             
                  <label for="form-field-24">
                    Direccion del Centro:
                  </label>
                  <textarea required="required" class="autosize form-control" id="form-field-24" name="direccion"></textarea>
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
                  <textarea required="required" class="autosize form-control" id="form-field-24" name="descripcion"></textarea>
                </div>
              </div> -->
              
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">                
                  <label for="form-field-24">
                    Latitud:
                  </label>
                  <input required="required" name="latitud" id="latitud" class="autosize form-control" type="number" step="any">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                  <label for="form-field-24">
                    Longitud:
                  </label>
                  <input required="required" name="longitud" id="longitud" class="autosize form-control" type="number" step="any">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Distrito:
                  </label>
                  <input required="required" name="distrito" id="distrito" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">                
                  <label for="form-field-24">
                    Uv:
                  </label>
                  <input required="required" name="uv" id="uv" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
               <div class="form-group">          
                  <label for="form-field-24">
                    Manzano:
                  </label>
                  <input required="required" name="manzano" id="manzano" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">   
                  <label for="form-field-24">
                    Horas de Atencion:
                  </label>
                  <input required="required" name="horas_atencion" id="horas_atencion" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Telefono:
                  </label>
                  <input required="required" name="telefono" id="telefono" class="autosize form-control" type="number" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Imagen:
                  </label>
                  <input required="required" name="imagen" id="imagen" class="autosize form-control" type="file" step="any">
                </div>
              </div>

            </div>
            <br>
            <div class="panel panel-info">
              <div class="panel-heading">Asignación de Especialidades</div>
              <div class="panel-body">
              <div class="col-lg-12 col-md-6 col-dm-12 col-xs-12">
              	<div class="form-group">
              		<label>Especialidad: </label>
              		<select name="pidespecialidad" id="pidespecialidad" class="form-control">
              			<option></option>
                      @foreach($especialidades as $var)
                        <option value="{{$var -> id}}">{{$var -> nombre}}</option>
                      @endforeach
              		</select>
              	</div>
              </div>
            	<div class="col-lg-2 col-md-2 col-dm-12 col-xs-12">
            		<div class="form-group">
            		<button class="btn btn-primary" type="button"  id="bt_add" >Agregar</button>
            		</div>
            	</div>

          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			  <div class="table-responsive">
          			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
          			<thead style="background-color:#A9D0F5">
          				<th>Opcciones</th>
          				<th>Especialidad</th>
          			</thead>
          			<tfoot>
          				<th>Total</th>
          				<th></th>
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
                 Registrar Centro de Salud <i class="fa fa-arrow-circle-right"></i>
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
function comenzar(){
  $('#bt_add').click(function(){
   agregar();
  });
}
var cont=0;
$("#guardar").hide();
function agregar()
   {
     idespecialidad=$("#pidespecialidad").val();
     especialidad=$("#pidespecialidad option:selected").text();

     if (idespecialidad!=""){
       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idespecialidad[]" value="'+idespecialidad+'">'+especialidad+'</td></tr>';
       cont++;
       limpiar();
       evaluar();
       $('#detalles').append(fila);
     }
     else
     {
       alert("Error al ingresar el detalle ");
     }
   }
function limpiar()
      {
         $("#pidespecialidad").val("");
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
function eliminar(index)
 {
   $('#fila'+index).remove();
   evaluar();
 }
window.addEventListener("load",comenzar, false);
</script>
@endpush
@endsection
