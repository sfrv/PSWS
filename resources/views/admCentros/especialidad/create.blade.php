@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Especialidades</b> * * * * *
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">Panel de control de <span class="text-bold">Especialidades</span></h3>

          <div class="panel-body">
            {!!Form::open(array('url'=>'adm/especialidad','method'=>'POST','autocomplete'=>'off'))!!}
  			    {{Form::token()}}

            <div class="row">
              <div class="form-group">
                <div class="col-lg-12 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    Escriba una breve Descripcion:
                  </label>
                  <textarea required="required" class="autosize form-control" id="form-field-24" name="descripcion"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    Nombre de la Especialidad:
                  </label>
                  <textarea required="required" class="autosize form-control" id="form-field-24" name="nombre"></textarea>
                </div>
              </div>

            </div>
            <br>
            <div class="panel panel-info">
              <div class="panel-heading">Detalle</div>
              <div class="panel-body">
              <div class="col-lg-12 col-md-6 col-dm-12 col-xs-12">
              	<div class="form-group">
              		<label>Enfermedades: </label>
              		<select name="pidenfermedad" id="pidenfermedad" class="form-control">
              			<option></option>
                    @foreach($enfermedades as $var)
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
          				<th>Enfermedades</th>
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
                 Registrar Especialidad <i class="fa fa-arrow-circle-right"></i>
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
     idenfermedad=$("#pidenfermedad").val();
     enfermedad=$("#pidenfermedad option:selected").text();

     if (idenfermedad!=""){
       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idenfermedad[]" value="'+idenfermedad+'">'+enfermedad+'</td></tr>';
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
         $("#pidenfermedad").val("");
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
