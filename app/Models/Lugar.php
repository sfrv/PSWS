<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleEspecialidad;

class Lugar extends Model
{
  protected $fillable = [
      'nombre','direccion','descripcion','latitud','longitud','id_red','id_tiposervicio','id_zona','id_nivel','estado'
  ];


  public function scope_getAllLugares($query, $searchText){
    $text = trim($searchText);
    $result=$query->where('nombre','LIKE','%'.$text.'%')
                    ->orderBy('id','desc');
    return $result;
  }

  public function scope_insertarLugar($query, $request)
  {
    $centro= new Lugar;
    $centro->nombre=$request->get('nombre');
    $centro->direccion=$request->get('direccion');
    $centro->descripcion=$request->get('descripcion');
    $centro->latitud=$request->get('latitud');
    $centro->longitud=$request->get('longitud');
    $centro->id_red=$request->get('id_red');
    $centro->id_tiposervicio=$request->get('id_tiposervicio');
    $centro->id_zona=$request->get('id_zona');
    $centro->id_nivel=$request->get('id_nivel');
    $centro->save();

    $idespecialidad=$request->get('idespecialidad');

    $cont=0;
    while($cont < count($idespecialidad)){
        $detalleEspecialidad= new DetalleEspecialidad();
        $detalleEspecialidad->id_lugar=$centro->id;
        $detalleEspecialidad->id_especialidad=$idespecialidad[$cont];
        $detalleEspecialidad->save();
        $cont=$cont+1;
    }
  }

  public function scope_getAllLugar($query){
      return $query;
  }

  public function scope_getOneLugar($query,$id){
      $result=$query->where('id','=',$id);
      return $result;
  }

}
