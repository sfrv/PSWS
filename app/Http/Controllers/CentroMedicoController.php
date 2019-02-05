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
        $centro = CentroMedico::_obtenerCentro($id);
        $detalle = CentroMedico::_obtenerDetalleCentro($id);
  
        return view('admCentros.centro.show',compact('centro','detalle'));
    }

    public function edit($id)
    {
        $centro = CentroMedico::_obtenerCentro($id);
        $detalle = CentroMedico::_obtenerDetalleCentro($id);
        $redes = Red::_getAllRedes("")->get();
        $tiposervicios = TipoServicio::_getAllTipoServicios("")->get();
        $zonas = Zona::_getAllZonas("")->get();
        $niveles = Nivel::_getAllNiveles("")->get();
        $especialidades = Especialidad::_getAllEspecialidades("")->get();

        $detalle_json = json_encode($detalle, JSON_UNESCAPED_SLASHES );
  
        return view('admCentros.centro.edit',compact('centro','detalle','redes','tiposervicios','zonas','niveles','especialidades','detalle_json'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        // return $request->all();
        CentroMedico::_editarCentroMedico($request, $id);
        return Redirect::to('adm/centro');
    }

    public function destroy($id)
    {
        CentroMedico::_eliminarCentroMedico($id);
        return Redirect::to('adm/centro');
    }

 
    public function getCentrosMedicos()
    {
        return json_encode(array("centros" => CentroMedico::_getAllCentroMedico()->get()));
    }

    public function getCentrosMedicos_por_red_tipo_nivel($id_red, $id_tipo_servicio, $id_nivel)
    {
        return json_encode(array("centros" => CentroMedico::_getCentrosMedicos_por_red_tipo_nivel($id_red, $id_tipo_servicio, $id_nivel)->get()));
    }

    public function getCentroMedico($id)
    {
        return json_encode(array("centro" => CentroMedico::_getOneCentroMedico($id)->get()));
    }

    //================================================

    public function get_imagen($id)
    {
        $centro = CentroMedico::findOrFail($id);
        return response()->file('../public/images/Centros/' . $centro->imagen);
    }

    public function get_lastCarteraServicio($id){
        return json_encode(array("carteras" => CentroMedico::_getLastCarteraServicio($id)->get()));
    }

    public function get_AllRolTurnos($id){
        return json_encode(array("roles" => CentroMedico::_getAllRolTurnos($id)->get()));
    }
}
