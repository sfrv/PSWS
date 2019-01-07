<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\CentroMedico;
use App\Models\DetalleEspecialidad;
use DB;


class CentroMedicoController extends Controller
{

    public function index(Request $request)
    {
        $centros = CentroMedico::_getAllCentrosMedicos($request['searchText'])->paginate(7);
        return view('admCentros.centro.index', ["centros" => $centros, "searchText" => $request->get('searchText')]);
    }


    public function create()
    {
        $redes = DB::table('red')->get();
        $tiposervicios = DB::table('tipo_servicio')->get();
        $zonas = DB::table('zona')->get();
        $niveles = DB::table('nivel')->get();
        $especialidades = DB::table('especialidad')->get();
        return view('admCentros.centro.create', ['especialidades' => $especialidades, 'redes' => $redes, 'tiposervicios' => $tiposervicios, 'zonas' => $zonas, 'niveles' => $niveles]);
    }

    public function store(Request $request)
    {
        CentroMedico::_insertarCentroMedico($request);
        return Redirect::to('adm/centro');
    }

    public function show($id)
    {
        $centro = DB::table('centro_medico as c')
        ->join('red as r', 'r.id', '=', 'c.id_red')
        ->join('tipo_servicio as t', 't.id', '=', 'c.id_tiposervicio')
        ->join('zona as z', 'z.id', '=', 'c.id_zona')
        ->join('nivel as n', 'n.id', '=', 'c.id_nivel')
        ->select('c.id','c.nombre','c.latitud','c.longitud','c.direccion','c.descripcion','r.nombre as nombreRed','t.nombre as nombreServicio','z.nombre as nombreZona','n.nombre as nombreNivel')
        ->where('c.id','=', $id)
        ->first();
        //
        $detalle = DB::table('detalle_especialidad as de')
        ->join('especialidad as e','e.id', '=', 'de.id_especialidad')
        ->select('e.nombre')
        ->where('de.id_centro_medico','=', $id)
        ->get();
  
        return view('admCentros.centro.show',["centro"=> $centro,"detalle"=> $detalle]);//,["orden"=> $orden, "detalle" => $detalle]);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $centro = CentroMedico::findOrFail($id);
		$centro->estado = '0';
		$centro->update();
		return Redirect::to('adm/centro');
    }

    public function getCentrosMedicos(){
        return json_encode(array("centros" => CentroMedico::_getAllCentroMedico()->get()));
    }
  
    public function getLugar($id)
    {
      return json_encode(array("lugar" => CentroMedico::_getOneCentroMedico($id)->get()));
    }
}
