<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Enfermedad;
use App\Models\DetalleSintoma;
use DB;

class EnfermedadController extends Controller
{
  public function index(Request $request)
  {
    $enfermedades = Enfermedad::_getAllEnfermedades($request['searchText'])->paginate(7);
    return view('admExpert.enfermedad.index',["enfermedades"=>$enfermedades,"searchText"=>$request->get('searchText')]);
  }

  public function create()
  {
      $sintomas=DB::table('sintomas')->get();
      return view('admExpert.enfermedad.create',['sintomas'=>$sintomas]);//,['trabajadores'=>$trabajadores,'alimentos'=>$alimentos]);
  }

  public function store(Request $request){

    $enfermedad= new Enfermedad;
    $enfermedad->nombre=$request->get('nombre');
    $enfermedad->descripcion=$request->get('descripcion');
    $enfermedad->save();

    $idsintoma=$request->get('idsintoma');

    $cont=0;
    while($cont < count($idsintoma)){
        $detallesintoma= new DetalleSintoma();
        $detallesintoma->id_enfermedad=$enfermedad->id;
        $detallesintoma->id_sintoma=$idsintoma[$cont];
        $detallesintoma->save();
        $cont=$cont+1;
    }

    return Redirect::to('adm/enfermedad');
  }

  public function show($id)
  {
      $enfermedad = DB::table('enfermedads')
      ->where('id','=', $id)
      ->first();

      $detalle = DB::table('detalle_sintomas as ds')
      ->join('sintomas as s','s.id', '=', 'ds.id_sintoma')
      ->select('s.nombre')
      ->where('ds.id_enfermedad','=', $id)
      ->get();

      return view('admExpert.enfermedad.show',["enfermedad"=> $enfermedad,"detalle"=> $detalle]);//,["orden"=> $orden, "detalle" => $detalle]);
  }
  public function destroy($id){
		$enfermedad = Enfermedad::findOrFail($id);
		$enfermedad->estado = '0';
		$enfermedad->update();
		return Redirect::to('adm/enfermedad');
	}

  public function getEnfermedades(){
      return json_encode(array("enfermedades" => Enfermedad::_getAllEnfermedad()->get()));
  }

  public function getEnfermedadesPorEspecialidad($id)
  {
    $detalle_enfermedads = DB::table('detalle_enfermedads')->get();
    $arr = array();
    foreach ($detalle_enfermedads as $det_en) {
      if ($det_en->id_especialidad == $id) {
        $arr[] = Enfermedad::findOrfail($det_en->id_enfermedad);
      }
    }
    return json_encode(array("enfermedades" => $arr ));
  }
}
