{!! Form::open(array('url'=>'adm/centro','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

  		  <div class="panel panel-blue">
              <div class="panel-body">
                <div class="input-group margin">
                  <div class="form-group has-success">
                    <input type="text" class="form-control" name="searchText" placeholder="BUSCAR POR NOMBRE DEL CENTRO..." values="{{$searchText}}">
                  </div>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-info btn-flat" id="mos" value="mos">
                      <i class="fa fa-search"></i>
                    </button> 
                  </span>
                  </span>
                  <span class="input-group-btn">
                    <a href="centro/create" class="btn btn-danger btn-flat">
                      <i class="fa fa-plus"></i>
                    </a>
                  </span>


                </div>
              </div>
          </div>


  {{Form::close()}}
