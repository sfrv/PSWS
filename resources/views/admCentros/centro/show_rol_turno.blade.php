@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Editar Rol de Turno</b> * * * * *
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
                <input disabled="true" name="titulo" id="titulo" class="autosize form-control" value="{{$rol_turno->titulo}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Mes:</label>
              <input disabled="true" name="mes" id="mes" class="autosize form-control" value="{{$rol_turno->mes}}" type="text" step="any">
            </div>

            <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
              <label for="form-field-24">Anio:</label>
              <input disabled="true" name="anio" id="anio" class="autosize form-control" value="{{$rol_turno->anio}}" type="text" step="any">
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
          							@foreach($especialidades as $var)
          							<thead style="background-color:#A9D0F5">
          								<tr>
          									<th style="background-color:#AAD0F5;" scope="col">Esp: {{$var -> nombre}} {{$var -> id}}</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Turno</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Lunes</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Martes</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Miercoles</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Jueves</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Viernes</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Sabado</th>
					          				<th style="background-color:#AAD0F5;" scope="col">Domingo</th>
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
                   <i class="fa fa-arrow-circle-right"> Editar Rol de Turno </i>
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


</script>
@endpush
@endsection