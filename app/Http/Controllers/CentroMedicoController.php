<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\CentroMedico;
use App\Models\Red;
use App\Models\TipoServicio;
use App\Models\Zona;
use App\Models\Nivel;
use App\Models\Especialidad;
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
        $redes = Red::_getAllRedes("")->get();
        $tiposervicios = TipoServicio::_getAllTipoServicios("")->get();
        $zonas = Zona::_getAllZonas("")->get();
        $niveles = Nivel::_getAllNiveles("")->get();
        $especialidades = Especialidad::_getAllEspecialidades("")->get();
        return view('admCentros.centro.create', compact('redes','tiposervicios','zonas','niveles','especialidades'));
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
        ->join('tipo_servicio as t', 't.id', '=', 'c.id_tipo_servicio')
        ->join('zona as z', 'z.id', '=', 'c.id_zona')
        ->join('nivel as n', 'n.id', '=', 'c.id_nivel')
        ->select('c.id','c.nombre','c.latitud','c.longitud','c.direccion','c.descripcion','c.distrito','c.uv','c.manzano','c.horas_atencion','telefono','r.nombre as nombreRed','t.nombre as nombreServicio','z.nombre as nombreZona','n.nombre as nombreNivel')
        ->where('c.id','=', $id)
        ->first();
        //
        $detalle = DB::table('detalle_centro_especialidad as de')
        ->join('especialidad as e','e.id', '=', 'de.id_especialidad')
        ->select('e.nombre')
        ->where('de.id_centro_medico','=', $id)
        ->get();
  
        return view('admCentros.centro.show',compact('centro','detalle'));
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
