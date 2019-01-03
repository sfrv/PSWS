<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Especialidad;
use App\Models\DetalleEnfermedad;
use DB;

class EspecialidadController extends Controller
{
  public function index(Request $request)
  {
    $especialidades = Especialidad::_getAllEspecialidades($request['searchText'])->paginate(7);
    return view('admCentros.especialidad.index',["especialidades"=>$especialidades,"searchText"=>$request->get('searchText')]);
  }

  public function create()
  {
    $enfermedades=DB::table('enfermedads')->get();
    return view('admCentros.especialidad.create',['enfermedades'=>$enfermedades]);//,['trabajadores'=>$trabajadores,'alimentos'=>$alimentos]);
  }

  public function store(Request $request){

    $especialidad= new Especialidad;
    $especialidad->nombre=$request->get('nombre');
    $especialidad->descripcion=$request->get('descripcion');
    $especialidad->save();

    $idenfermedad=$request->get('idenfermedad');

    $cont=0;
    while($cont < count($idenfermedad)){
        $detalleEnfermedad= new DetalleEnfermedad();
        $detalleEnfermedad->id_especialidad=$especialidad->id;
        $detalleEnfermedad->id_enfermedad=$idenfermedad[$cont];
        $detalleEnfermedad->save();
        $cont=$cont+1;
    }

    return Redirect::to('adm/especialidad');
  }

  public function show($id)
  {
      $especialidad = DB::table('especialidads')
      ->where('id','=', $id)
      ->first();

      $detalle = DB::table('detalle_enfermedads as de')
      ->join('enfermedads as e','e.id', '=', 'de.id_enfermedad')
      ->select('e.nombre')
      ->where('de.id_especialidad','=', $id)
      ->get();

      return view('admCentros.especialidad.show',["especialidad"=> $especialidad,"detalle"=> $detalle]);//,["orden"=> $orden, "detalle" => $detalle]);
  }
  public function destroy($id){
		$especialidad = Especialidad::findOrFail($id);
		$especialidad->estado = '0';
		$especialidad->update();
		return Redirect::to('adm/especialidad');
	}

  public function getEspecialidades(){
      return json_encode(array("especialidades" => Especialidad::_getAllEspecialidad()->get()));
  }

  public function getEspecialidadPorLugar($id)
  {
    $detalle_especialidads = DB::table('detalle_especialidads')->get();
    $arr = array();
    foreach ($detalle_especialidads as $det_es) {
      if ($det_es->id_lugar == $id) {
        $arr[] = Especialidad::findOrfail($det_es->id_especialidad);
      }
    }
    return json_encode(array("especialidades" => $arr ));
  }
}
