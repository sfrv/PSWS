<?php

namespace App\MyClass;

class Hecho
{
  public $nombre;
  public $marca;
  public $id;

  public function __construct($id,$nombre,$marca)
  {
    $this->nombre = $nombre;
    $this->marca = $marca;
    $this->id = $id;
  }

  public function marcar()
  {
    $this->marca = 1;
  }

}
