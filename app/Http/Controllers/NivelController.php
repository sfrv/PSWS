<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Nivel;

class NivelController extends Controller
{
  public function index(Request $request)
  {
    $niveles = Nivel::_getAllNiveles($request['searchText'])->paginate(7);
    return view('admCentros.nivel.index',["niveles"=>$niveles,"searchText"=>$request->get('searchText')]);
  }

  public function create()
  {
    return view('admCentros.nivel.create');//,['trabajadores'=>$trabajadores,'alimentos'=>$alimentos]);
  }

  public function store(Request $request){
    $nivel= new Nivel;
    $nivel->nombre=$request->get('nombre');
    $nivel->descripcion=$request->get('descripcion');
    $nivel->save();
    return Redirect::to('adm/nivel');
  }

  public function edit($id)
  {
      return view("admCentros.nivel.edit",["nivel"=>Nivel::findOrFail($id)]);
  }

  public function update(Request $request, $id)
  {
      $nivel = Nivel::findOrFail($id);
      $nivel->nombre = $request->get('nombre');
      $nivel->descripcion = $request->get('descripcion');
      $nivel->update();
      return Redirect::to('adm/nivel');
  }

  public function destroy($id){
		$nivel = Nivel::findOrFail($id);
		$nivel->estado = '0';
		$nivel->update();
		return Redirect::to('adm/nivel');
	}

  public function getNiveles(){
      return json_encode(array("niveles" => Nivel::_getAllNivel()->get()));
  }
}
