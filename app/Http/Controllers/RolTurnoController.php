<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\CentroMedico;
use App\Models\Medico;

class RolTurnoController extends Controller
{
    public function create_rol_turno($id)
    {
        $detalle = CentroMedico::_obtenerDetalleCentro($id);
        $medicos = Medico::_getAllMedicos("")->get();
        // dd($medicos);
        // $detalle2 = json_encode($detalle, JSON_UNESCAPED_SLASHES );
        return view('admCentros.centro.create_rol_turno',compact('detalle','medicos'));
    }
}
