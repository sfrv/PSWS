<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
  public $timestamps = false;

  protected $table = 'red';

  protected $fillable = [
      'nombre','descripcion','estado'
  ];

  public function scope_getAllRedes($query, $searchText){
    $text = trim($searchText);
    $result=$query->where('nombre','LIKE','%'.$text.'%')
                    ->orderBy('id','desc');
    return $result;
  }

  public function scope_getAllRed($query){
      return $query;
  }
}
