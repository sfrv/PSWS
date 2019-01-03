<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
  protected $fillable = [
      'nombre','descripcion'
  ];

  public function scope_getAllEnfermedades($query, $searchText){
    $text = trim($searchText);
    $result=$query->where('nombre','LIKE','%'.$text.'%')
                    ->orderBy('id','desc');
    return $result;
  }

  public function scope_getAllEnfermedad($query){
      return $query;
  }
}
