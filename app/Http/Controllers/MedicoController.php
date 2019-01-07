<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Http\Requests\ZonaFormRequest;

class MedicoController extends Controller
{
    public function index(Request $request)
    {
        $medicos = Medico::_getAllMedicos($request['searchText'])->paginate(7);
        return view('admCentros.medico.index', ["medicos" => $medicos, "searchText" => $request->get('searchText')]);
    }
}
