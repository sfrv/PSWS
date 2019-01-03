<?php

use Illuminate\Database\Seeder;
use App\Models\Lugar;

class LugarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = array(
        [
          'nombre' 		      => 'Nombre del Lugar 1',
          'direccion'       => 'Direccion del Lugar 1',
          'descripcion'     => 'Descripcion del Lugar 1',
          'latitud'         => 'latitud del Lugar 1',
          'longitud'        => 'longitud del Lugar 1',
          'id_red'          => 1,
          'id_tiposervicio' => 1,
          'id_zona'         => 1,
          'id_nivel'        => 1,
          'created_at'      => new DateTime,
          'updated_at'      => new DateTime
        ],
        [
          'nombre' 		      => 'Nombre del Lugar 2',
          'direccion'       => 'Direccion del Lugar 2',
          'descripcion'     => 'Descripcion del Lugar 2',
          'latitud'         => 'latitud del Lugar 2',
          'longitud'        => 'longitud del Lugar 2',
          'id_red'          => 2,
          'id_tiposervicio' => 2,
          'id_zona'         => 2,
          'id_nivel'        => 2,
          'created_at'      => new DateTime,
          'updated_at'      => new DateTime
        ],
        [
          'nombre' 		      => 'Nombre del Lugar 3',
          'direccion'       => 'Direccion del Lugar 3',
          'descripcion'     => 'Descripcion del Lugar 3',
          'latitud'         => 'latitud del Lugar 3',
          'longitud'        => 'longitud del Lugar 3',
          'id_red'          => 3,
          'id_tiposervicio' => 3,
          'id_zona'         => 3,
          'id_nivel'        => 3,
          'created_at'      => new DateTime,
          'updated_at'      => new DateTime
        ],
        [
          'nombre' 		      => 'Nombre del Lugar 4',
          'direccion'       => 'Direccion del Lugar 4',
          'descripcion'     => 'Descripcion del Lugar 4',
          'latitud'         => 'latitud del Lugar 4',
          'longitud'        => 'longitud del Lugar 4',
          'id_red'          => 4,
          'id_tiposervicio' => 4,
          'id_zona'         => 4,
          'id_nivel'        => 4,
          'created_at'      => new DateTime,
          'updated_at'      => new DateTime
        ],
      );
      Lugar::insert($data);
    }
}
