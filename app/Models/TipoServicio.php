<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
  public $timestamps = false;

  protected $table = 'tipo_servicio';

  protected $fillable = [
      'nombre','descripcion'
  ];

  public function scope_getAllTipoServicios($query, $searchText){
    $text = trim($searchText);
    $result=$query->where('nombre','LIKE','%'.$text.'%')
                    ->orderBy('id','desc');
    return $result;
  }

  public function scope_getAllTipoServicio($query){
      return $query;
  }
}
