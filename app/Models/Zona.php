<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
  protected $fillable = [
      'nombre','descripcion','imagen','estado'
  ];

  public function scope_getAllZonas($query, $searchText){
    $text = trim($searchText);
    $result=$query->where('nombre','LIKE','%'.$text.'%')
                    ->orWhere('id','LIKE','%'.$text.'%')
                    ->orderBy('id','desc');
    return $result;
  }

  public function scope_insertarZona($query, $request)
  {
    $zona= new Zona;
    $zona->nombre=$request->get('nombre');
    $zona->descripcion=$request->get('descripcion');
    $zona->save();
  }

  public function scope_editarZona($query, $id, $request)
  {
    $zona = Zona::findOrFail($id);
    $zona->nombre = $request->get('nombre');
    $zona->descripcion = $request->get('descripcion');
    $zona->update();
  }

  public function scope_eliminarZona($query, $id)
  {
    $zona = Zona::findOrFail($id);
		$zona->estado = '0';
		$zona->update(); 
  }

  public function scope_getAllZona($query){
      return $query;
  }
}
