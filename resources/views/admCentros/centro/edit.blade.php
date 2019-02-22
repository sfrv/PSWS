@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>CENTRO DE SALUD: {{$centro->nombre}}</b>
  </h1>
  <ol class="breadcrumb">
     <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="{{url('adm/centro')}}">index</a></li>
  </ol>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 align="center">PANEL DE EDICION DE <span class="text-bold">CENTRO DE SALUD</span></h3>
      {!! Form::model($centro,['method'=>'PATCH','route'=>['centro.update',$centro->id],'files'=>'true'])!!}
          {{Form::token()}} 
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
            <div class="form-group">
              <label for="form-field-24">
                CAMAS TOTAL:
              </label>
              <input onkeypress='return validaNumericos(event)' onkeyup="calcular()" required name="camas_total" id="camas_total" class="autosize form-control" type="number" step="any" value="{{$centro->camas_total}}">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
            <div class="form-group">
              <label for="form-field-24">
                CAMAS OCUPADAS:
              </label>
              <input onkeypress='return validaNumericos(event)' onkeyup="calcular()" required name="camas_ocupadas" id="camas_ocupadas" class="autosize form-control" type="number" step="any" value="{{$centro->camas_ocupadas}}">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
            <div class="form-group">
              <label for="form-field-24" id="letra_camas_libres">
                CAMAS LIBRES:
              </label>
              <input disabled min="0" onkeypress='return validaNumericos(event)' required name="camas_libres" id="camas_libres" class="autosize form-control" type="number" step="any" value="{{$centro->camas_total - $centro->camas_ocupadas}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
            <div class="form-group">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{count($detalle_medicos)}}</h3>
                  <p>DOCTORES REGISTRADOS</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-plus"></i>
                </div>
                <a href="{{ route('edit-medicos', $centro->id) }}" class="small-box-footer">GESTIONAR <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
            <div class="form-group">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{count($detalle)}}</h3>
                  <p>ESPECIALIDADES REGISTRADAS</p>
                </div>
                <div class="icon">
                  <i class="fa fa-heartbeat"></i>
                </div>
                <a href="{{ route('edit-especialidades', $centro->id) }}" class="small-box-footer">GESTIONAR <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
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
            <div class="col-lg-6 col-md-12 col-dm-12 col-xs-12 col-sm-offset-3">
              <div class="form-group">               
                <label for="form-field-24">
                  IMAGEN ACTUAL DEL CENTRO:
                </label>
                <br>
                <img style="opacity: 0.8;" src="{{asset('images/Centros/'.$centro->imagen)}}" height="80%" width="100%" class="img-thumbnail">
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-dm-12 col-xs-12 col-sm-offset-3">
              <div class="form-group">               
                <label for="form-field-24">
                  IMAGEN NUEVA:
                </label>
                <input   name="imagen" id="imagen" class="autosize form-control" type="file" step="any">
              </div>
            </div>

          </div>
          <br>
          <div class="col-sm-8 col-sm-offset-2">
           <div class="form-group">
             <button class="btn btn-primary btn-block" type="submit">
                 EDITAR CENTRO DE SALUD <i class="fa fa-arrow-circle-right"></i>
              </button>
           </div>
         </div>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
  </div>
</div>
</section>
@push ('scripts')
<script>
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

function calcular() {
  var camas_total = document.getElementById('camas_total').value;
  var camas_ocupadas = document.getElementById('camas_ocupadas').value;

  var camas_libres = camas_total - camas_ocupadas;
  if (camas_libres < 0) {
    document.getElementById("camas_libres").value = 0;
    document.getElementById('letra_camas_libres').innerText = 'CAMAS LIBRES: (' + camas_libres +')';
  }else{
    document.getElementById('letra_camas_libres').innerText = 'CAMAS LIBRES:';
    document.getElementById("camas_libres").value = camas_libres;
  }
  
  console.log(camas_total);
}
</script>
@endpush
@endsection
