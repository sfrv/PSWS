<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoServicio;
use Illuminate\Support\Facades\Redirect;

class TipoServicioController extends Controller
{

  public function index(Request $request)
  {
    $servicios = TipoServicio::_getAllTipoServicios($request['searchText'])->paginate(7);
    return view('admCentros.servicio.index',["servicios"=>$servicios,"searchText"=>$request->get('searchText')]);
  }

  public function create()
  {
    return view('admCentros.servicio.create');//,['trabajadores'=>$trabajadores,'alimentos'=>$alimentos]);
  }

  public function store(Request $request){
    $servicio= new TipoServicio;
    $servicio->nombre=$request->get('nombre');
    $servicio->descripcion=$request->get('descripcion');
    $servicio->save();
    return Redirect::to('adm/servicio');
  }

  public function edit($id)
  {
    return view("admCentros.servicio.edit",["servicio"=>TipoServicio::findOrFail($id)]);
  }

  public function update(Request $request, $id)
  {
    $servicio = TipoServicio::findOrFail($id);
    $servicio->nombre = $request->get('nombre');
    $servicio->descripcion = $request->get('descripcion');
    $servicio->update();
    return Redirect::to('adm/servicio');
  }

  public function destroy($id){
		$servicio = TipoServicio::findOrFail($id);
		$servicio->estado = '0';
		$servicio->update();
		return Redirect::to('adm/servicio');
	}

  public function getTipoServicios(){
      return json_encode(array("tiposervicios" => TipoServicio::_getAllTipoServicio()->get()));
  }
}
