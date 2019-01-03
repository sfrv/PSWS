<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\DetalleEspecialidad;
use DB;

class LugarController extends Controller
{
  public function index(Request $request)
  {
    $lugares = Lugar::_getAllLugares($request['searchText'])->paginate(7);
    return view('admCentros.centro.index',["lugares"=>$lugares,"searchText"=>$request->get('searchText')]);
  }

  public function create()
  {
    $redes=DB::table('reds')->get();
    $tiposervicios=DB::table('tipo_servicios')->get();
    $zonas=DB::table('zonas')->get();
    $niveles=DB::table('nivels')->get();
    $especialidades=DB::table('especialidads')->get();
    return view('admCentros.centro.create',['especialidades'=>$especialidades,'redes'=>$redes,'tiposervicios'=>$tiposervicios,'zonas'=>$zonas,'niveles'=>$niveles]);//,['trabajadores'=>$trabajadores,'alimentos'=>$alimentos]);
  }

  public function store(Request $request){
    Lugar::_insertarLugar($request);
    return Redirect::to('adm/centro');
  }

  public function show($id)
  {
      $centro = DB::table('lugars as l')
      ->join('reds as r', 'r.id', '=', 'l.id_red')
      ->join('tipo_servicios as t', 't.id', '=', 'l.id_tiposervicio')
      ->join('zonas as z', 'z.id', '=', 'l.id_zona')
      ->join('nivels as n', 'n.id', '=', 'l.id_nivel')
      ->select('l.id','l.nombre','l.latitud','l.longitud','l.direccion','l.descripcion','r.nombre as nombreRed','t.nombre as nombreServicio','z.nombre as nombreZona','n.nombre as nombreNivel')
      ->where('l.id','=', $id)
      ->first();
      //
      $detalle = DB::table('detalle_especialidads as de')
      ->join('especialidads as e','e.id', '=', 'de.id_especialidad')
      ->select('e.nombre')
      ->where('de.id_lugar','=', $id)
      ->get();

      return view('admCentros.centro.show',["centro"=> $centro,"detalle"=> $detalle]);//,["orden"=> $orden, "detalle" => $detalle]);
  }
  public function destroy($id){
		$centro = Lugar::findOrFail($id);
		$centro->estado = '0';
		$centro->update();
		return Redirect::to('adm/centro');
	}

  public function getLugares(){
      return json_encode(array("lugares" => Lugar::_getAllLugar()->get()));
  }

  public function getLugar($id)
  {
    return json_encode(array("lugar" => Lugar::_getOneLugar($id)->get()));
  }

  public function getLugarPorEnfermedad($id_enfermedad)
  {
    $especialidades=DB::table('detalle_enfermedads')
                ->where('id_enfermedad','=',$id_enfermedad)
                ->get();
    $detalle_especialidad=DB::table('detalle_especialidads')
                ->get();
    $arr = array();
    foreach ($especialidades as $especialidad) {
      // $var = $var . "-" . $especialidad->id_especialidad;
      foreach ($detalle_especialidad as $det_es) {
        if ($especialidad->id_especialidad == $det_es->id_especialidad) {
          $arr[] = Lugar::findOrfail($det_es->id_lugar);;
        }
      }
    }

    return json_encode(array("lugares" => $arr ));
  }
}
