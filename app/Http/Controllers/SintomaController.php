<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Sintoma;
use App\Models\Enfermedad;
use App\MyClass\Hecho;
use App\MyClass\Regla;
use DB;

class SintomaController extends Controller
{
  public function index(Request $request)
  {
    $sintomas = Sintoma::_getAllSintomas($request['searchText'])->paginate(7);
    return view('admExpert.sintoma.index',["sintomas"=>$sintomas,"searchText"=>$request->get('searchText')]);
  }

  public function create()
  {
    return view('admExpert.sintoma.create');//,['trabajadores'=>$trabajadores,'alimentos'=>$alimentos]);
  }

  public function store(Request $request){
    $sintoma= new Sintoma;
    $sintoma->nombre=$request->get('nombre');
    $sintoma->descripcion=$request->get('descripcion');
    $sintoma->isChecked=0;
    $sintoma->estado=0;
    $sintoma->save();
    return Redirect::to('adm/sintoma');
  }

  public function edit($id)
  {
      return view("admExpert.sintoma.edit",["sintoma"=>Sintoma::findOrFail($id)]);
  }

  public function update(Request $request, $id)
  {
      $sintoma = Sintoma::findOrFail($id);
      $sintoma->nombre = $request->get('nombre');
      $sintoma->descripcion = $request->get('descripcion');
      $sintoma->update();
      return Redirect::to('adm/sintoma');
  }

  public function destroy($id){
		$sintoma = Sintoma::findOrFail($id);
		$sintoma->estado = '0';
		$sintoma->update();
		return Redirect::to('adm/sintoma');
	}

  public function getSintomas(){
    return json_encode(array("sintomas" => Sintoma::_getAllSintoma()->get()));
  }

  public function preDiagnosticoNone()
  {
    return json_encode(array("enfermedades" => ""));
  }
  public function preDiagnostico($misSintomas){

    $enfermedades = Enfermedad::_getAllEnfermedad()->get();
    $arrayReglas = array();
    foreach ($enfermedades as $enfer) {
      $arrayReglas[] = new Regla($enfer->id,$enfer->nombre,0);
    }
    for ($i=0; $i < count($arrayReglas) ; $i++) {
      $detalle_sintomas=DB::table('detalle_sintomas')
                  ->where('id_enfermedad','=',$arrayReglas[$i]->id)->get();
      foreach ($detalle_sintomas as $sint) {
        $aux = Sintoma::findOrfail($sint->id_sintoma);
        $arrayReglas[$i]->hechos[] = new Hecho($aux->id,$aux->nombre,0);
      }
    }

    $arrayBaseHecho = array();
    $re = "";
    $num = "";
    for ($i = 0; $i < strlen($misSintomas); $i++){
        if ($misSintomas[$i] > 0) {
          for ($j=$i; $j < strlen($misSintomas); $j++) {
            if ($misSintomas[$i] != '-') {
              $num = $num . $misSintomas[$j];
            }else {
              break;
            }
            $i++;
          }
          $sintoma = Sintoma::findOrFail($num);
          $arrayBaseHecho[] = new Hecho($sintoma->id,$sintoma->nombre,1);
          $num = "";
        }
    }

    while (true) {
      $l = count($arrayBaseHecho);

      for ($i=0; $i < count($arrayReglas) ; $i++) {
        for ($ii=0; $ii < count($arrayReglas[$i]->hechos) ; $ii++) {
          for ($iii=0; $iii <count($arrayBaseHecho) ; $iii++) {
            if ($arrayBaseHecho[$iii]->id == $arrayReglas[$i]->hechos[$ii]->id) {
              $arrayReglas[$i]->hechos[$ii]->marcar();
            }
          }
        }
        if ($arrayReglas[$i]->getMarca()==0 && $arrayReglas[$i]->todasMarcadas()) {
          $arrayReglas[$i]->marcar();

          $arrayBaseHecho[] = new Hecho(count(Sintoma::_getAllSintoma()->get())+1,$arrayReglas[$i]->nombre,1);
        }
      }
      if (count($arrayBaseHecho) == $l) {
        break;
      }
    }
    $arrayResultado = array();
    for ($i=0; $i < count($arrayReglas) ; $i++) {
      if ($arrayReglas[$i]->getHechosMarcados() > 0) {
        $arrayReglas[$i]->cantMarcados = $arrayReglas[$i]->getHechosMarcados();
        $arrayReglas[$i]->porcentajeMarcados = $arrayReglas[$i]->getPorcentajeHechosMarcados();
        $arrayResultado[] = $arrayReglas[$i];
      }
    }

    // $array = array(
    //   "enfermedades" => $hecho1
    // );
    // $arrayReglas[0]->getHechosMarcados()

    return json_encode(array("enfermedades" => $arrayResultado));
  }

}
