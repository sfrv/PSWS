<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Zona;
use App\Http\Requests\ZonaFormRequest;

class ZonaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
  public function index(Request $request)
  {
    $zonas = Zona::_getAllZonas($request['searchText'])->paginate(7);
    return view('admCentros.zona.index',["zonas"=>$zonas,"searchText"=>$request->get('searchText')]);
  }

  public function create()
  {
    return view('admCentros.zona.create');
  }

  public function store(ZonaFormRequest $request){
    Zona::_insertarZona($request);
    return Redirect::to('adm/zona')->with('msj','La Zona: "'.$request['nombre'].'" se creo exitósamente.');
  }

  public function edit($id)
  {
    return view("admCentros.zona.edit",["zona"=>Zona::findOrFail($id)]);
  }

  public function update(ZonaFormRequest $request, $id)
  {
    Zona::_editarZona($id, $request);
    return Redirect::to('adm/zona')->with('msj','La Zona: '.$request->nombre.' se edito exitosamente.');
  }

  public function destroy($id){
		Zona::_eliminarZona($id);
		return Redirect::to('adm/zona');
	}

  // public function getZonas(){
  //     return json_encode(array("zonas" => Zona::_getAllZona()->get()));
  // }
}
