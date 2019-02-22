{!! Form::open(array('url'=>'adm/centro','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

  		  <div class="panel panel-blue">
              <div class="panel-body">
                <div class="text-center">
                   <h4 align="center">BUSCAR POR: 
                      <select name="filtro" id="filtro" >
                          <option value="1" selected>CENTRO MEDICO</option>
                          <option value="2">ESPECIALIDAD</option>
                      </select>
                   </h4>
                </div>
                <div class="input-group margin">
                  <div class="form-group has-success">
                    <input type="text" class="form-control" name="searchText" placeholder="BUSCAR CENTROS MEDICOS..." values="{{$searchText}}">
                  </div>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-info btn-flat" id="mos" value="mos">
                      <i class="fa fa-search"></i>
                    </button> 
                  </span>
                  @if(Auth::user()->tipo == 'ADMINISTRADOR')
                    <span class="input-group-btn">
                      <a href="centro/create" class="btn btn-danger btn-flat">
                        <i class="fa fa-plus"></i>
                      </a>
                    </span>
                  @endif
                </div>
              </div>
          </div>
{{Form::close()}}
