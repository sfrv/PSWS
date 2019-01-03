<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Red;

class RedController extends Controller
{
  public function index(Request $request)
  {
    $redes = Red::_getAllRedes($request['searchText'])->paginate(7);
    return view('admCentros.red.index',["redes"=>$redes,"searchText"=>$request->get('searchText')]);
  }

  public function create()
  {
    return view('admCentros.red.create');//,['trabajadores'=>$trabajadores,'alimentos'=>$alimentos]);
  }

  public function store(Request $request){
    $red= new Red;
    $red->nombre=$request->get('nombre');
    $red->descripcion=$request->get('descripcion');
    $red->image = $request->get('image');
    $red->save();
    return Redirect::to('adm/red');
  }

  public function edit($id)
  {
      return view("admCentros.red.edit",["red"=>Red::findOrFail($id)]);
  }

  public function update(Request $request, $id)
  {
      $red = Red::findOrFail($id);
      $red->nombre = $request->get('nombre');
      $red->descripcion = $request->get('descripcion');
      $red->image = $request->get('image');
      $red->update();
      return Redirect::to('adm/red');
  }

  public function destroy($id){
		$red = Red::findOrFail($id);
		$red->estado = '0';
		$red->update();
		return Redirect::to('adm/red');
	}

  public function getRedes(){
      return json_encode(array("redes" => Red::_getAllRed()->get()));
  }
}
