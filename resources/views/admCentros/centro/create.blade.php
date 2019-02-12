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
    <div class="box box-success">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE REGISTRO DE <span class="text-bold">CENTRO DE SALUD</span></h3>

          <div class="panel-body">
            {!!Form::open(array('url'=>'adm/centro','method'=>'POST','autocomplete'=>'off','files' => true))!!}
  			    {{Form::token()}} 
            <div class="row">
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">
                  <label for="form-field-24">
                    CAMAS TOTAL:
                  </label>
                  <input onkeypress='return validaNumericos(event)' onkeyup="calcular()" required name="camas_total" id="camas_total" class="autosize form-control" type="number" step="any" value="0">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">
                  <label for="form-field-24">
                    CAMAS OCUPADAS:
                  </label>
                  <input onkeypress='return validaNumericos(event)' onkeyup="calcular()" required name="camas_ocupadas" id="camas_ocupadas" class="autosize form-control" type="number" step="any" value="0">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">
                  <label for="form-field-24" id="letra_camas_libres">
                    CAMAS LIBRES:
                  </label>
                  <input disabled min="0" onkeypress='return validaNumericos(event)' required name="camas_libres" id="camas_libres" class="autosize form-control" type="number" step="any" value="0">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Nombre del Centro:
                  </label>
                  <textarea required class="autosize form-control" id="form-field-24" name="nombre"></textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">             
                  <label for="form-field-24">
                    Direccion del Centro:
                  </label>
                  <textarea required class="autosize form-control" id="form-field-24" name="direccion"></textarea>
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
                  <input required name="distrito" id="distrito" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                <div class="form-group">                
                  <label for="form-field-24">
                    Uv:
                  </label>
                  <input required name="uv" id="uv" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
               <div class="form-group">          
                  <label for="form-field-24">
                    Manzano:
                  </label>
                  <input required name="manzano" id="manzano" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">   
                  <label for="form-field-24">
                    Horas de Atencion:
                  </label>
                  <input required name="horas_atencion" id="horas_atencion" class="autosize form-control" type="text" step="any">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                <div class="form-group">               
                  <label for="form-field-24">
                    Telefono:
                  </label>
                  <input required name="telefono" id="telefono" class="autosize form-control" type="number" step="any">
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
