<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
  protected $fillable = [
      'nombre','descripcion','estado'
  ];

  public function scope_getAllEspecialidades($query, $searchText){
    $text = trim($searchText);
    $result=$query->where('nombre','LIKE','%'.$text.'%')
                    ->orderBy('id','desc');
    return $result;
  }

  public function scope_getAllEspecialidad($query){
      return $query;
  }
}
