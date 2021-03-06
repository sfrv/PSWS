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
          <h3 align="center">PANEL DE VIZUALIZACION DE <span class="text-bold">CENTRO DE SALUD</span></h3>
          <br>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    NOMBRE DEL CENTRO:
                  </label>
                  <textarea disabled class="autosize form-control" id="form-field-24" name="nombre">{{$centro->nombre}}</textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">             
                  <label for="form-field-24">
                    DIRECCION DEL CENTRO:
                  </label>
                  <textarea disabled class="autosize form-control" id="form-field-24" name="direccion">{{$centro->direccion}}</textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                   <label for="id_red">RED:</label>
                   <input disabled name="id_red" id="id_red" class="autosize form-control" type="text" value="{{$centro->nombreRed}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group"> 
                   <label for="id_tipo_servicio">TIPO DE SERVICIO</label>
                  <input disabled name="id_tipo_servicio" id="id_tipo_servicio" class="autosize form-control" type="text" value="{{$centro->nombreServicio}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                   <label for="id_zona">ZONA:</label>
                  <input disabled name="id_zona" id="id_zona" class="autosize form-control" type="text" value="{{$centro->nombreZona}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                   <label for="id_nivel">NIVEL: </label>
                  <input disabled name="id_nivel" id="id_nivel" class="autosize form-control" type="text" value="{{$centro->nombreNivel}}">
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
                    LATITUD:
                  </label>
                  <input disabled name="latitud" id="latitud" class="autosize form-control" type="number" step="any" value="{{$centro->latitud}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">
                  <label for="form-field-24">
                    LONGITUD:
                  </label>
                  <input disabled name="longitud" id="longitud" class="autosize form-control" type="number" step="any" value="{{$centro->longitud}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    DISTRITO:
                  </label>
                  <input disabled name="distrito" id="distrito" class="autosize form-control" type="text" step="any" value="{{$centro->distrito}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">                
                  <label for="form-field-24">
                    UV:
                  </label>
                  <input disabled name="uv" id="uv" class="autosize form-control" type="text" step="any" value="{{$centro->uv}}">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
               <div class="form-group">          
                  <label for="form-field-24">
                    MANZANO:
                  </label>
                  <input disabled name="manzano" id="manzano" class="autosize form-control" type="text" step="any" value="{{$centro->manzano}}">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">   
                  <label for="form-field-24">
                    HORAS DE ATENCION:
                  </label>
                  <input disabled name="horas_atencion" id="horas_atencion" class="autosize form-control" type="text" value="{{$centro->horas_atencion}}">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    TELEFONO:
                  </label>
                  <input disabled="" name="telefono" id="telefono" class="autosize form-control" type="number" value="{{$centro->telefono}}">
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-dm-12 col-xs-12 col-sm-offset-3">
                <div class="form-group">               
                  <label for="form-field-24">
                    IMAGEN DEL CENTRO:
                  </label>
                  <br>
                  <img style="opacity: 0.8;" src="{{asset('images/Centros/'.$centro->imagen)}}" height="100%" width="100%" class="img-thumbnail">
                </div>
              </div>
            </div>
            <br>
            <div class="panel panel-info">
              <div class="panel-heading">ESPECIALIDADES REGISTRADAS</div>
              <div class="panel-body">
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			  <div class="table-responsive">
          			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
          			<thead style="background-color:#A9D0F5">
          				<th class="text-center">NOMBRE DE LA ESPECIALIDAD</th>
                  <th class="text-center">EMERGENCIA</th>
                  <th class="text-center">CONSULTA EXT.</th>
                  <th class="text-center">HOSPITALIZACION</th>
                  <th class="text-center">ESTADO</th>
          			</thead>
          			<tbody>
                  @foreach($detalle as $var)
                      <tr class="text-center">
                          <td>{{$var -> nombre}}</td>
                          <td>
                            @if($var -> etapa_emergencia == 1)
                              <input class="minimal" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @else
                              <input class="minimal" type="checkbox" style="height: 18px;width: 18px;">
                            @endif
                          </td>
                          <td>
                            @if($var -> etapa_consulta == 1)
                              <input class="minimal" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @else
                              <input class="minimal" type="checkbox" style="height: 18px;width: 18px;">
                            @endif
                          </td>
                          <td>
                            @if($var -> etapa_hospitalizacion == 1)
                              <input class="minimal" type="checkbox" style="height: 18px;width: 18px;" checked>
                            @else
                              <input class="minimal" type="checkbox" style="height: 18px;width: 18px;">
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

              <div class="panel panel-info">
              <div class="panel-heading">MEDICOS REGISTRADAS</div>
              <div class="panel-body">

              <br>
              <div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
                  <div class="table-responsive">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#A9D0F5">
                  <th class="text-center">NOMBRE</th>
                  <th class="text-center">APELLIDO</th>
                  <th class="text-center">TELEFONO</th>
                  <th class="text-center">ESTADO</th>
                </thead>
                <tbody>
                  @foreach($detalle_medicos as $var)
                      <tr class="text-center">
                        <td>{{$var -> nombre}}</td>
                        <td>{{$var -> apellido}}</td>
                        <td>{{$var -> telefono}}</td>
                        <td>
                          @if($var -> estado == 1)
                            <span class="badge bg-blue">ACTIVO</span>
                          @else
                            <span class="badge bg-red">INACTIVO</span>
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
                   <i class="fa fa-arrow-circle-left"> ATRAS </i>
                 </button></a>
               </div>
             </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
