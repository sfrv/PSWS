<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
  protected $fillable = [
      'nombre','descripcion'
  ];

  public function scope_getAllSintomas($query, $searchText){
    $text = trim($searchText);
    $result=$query->where('nombre','LIKE','%'.$text.'%')
                    ->orderBy('id','desc');
    return $result;
  }

  public function scope_getAllSintoma($query){
      return $query;
  }
}
