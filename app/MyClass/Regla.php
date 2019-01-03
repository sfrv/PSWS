<?php

namespace App\MyClass;

class Regla
{
  public $nombre;
  public $hechos = array();
  public $marca;
  public $id;

  public $cantMarcados;
  public $porcentajeMarcados;

  public function __construct($id,$nombre,$marca)
  {
    $this->nombre = $nombre;
    $this->marca = $marca;
    $this->id = $id;
    $this->cantMarcados = 0;
    $this->porcentajeMarcados = 0;
  }

  public function marcar()
  {
    $this->marca = 1;
  }

  public function getMarca()
  {
    return $this->marca;
  }

  public function todasMarcadas()
  {

    for ($i=0; $i < count($this->hechos) ; $i++) {
      if ($this->hechos[$i]->marca == 0) {
        return false;
      }
    }
    return true;
  }

  public function getHechosMarcados()
  {
    $cant = 0;
    for ($i=0; $i < count($this->hechos) ; $i++) {
      if ($this->hechos[$i]->marca == 1) {
        $cant++;
      }
    }
    return $cant;
  }
  public function getPorcentajeHechosMarcados()
  {
    $cant = 0;
    for ($i=0; $i < count($this->hechos) ; $i++) {
      if ($this->hechos[$i]->marca == 1) {
        $cant++;
      }
    }
    return (($cant / count($this->hechos)) * 100);
  }

}
