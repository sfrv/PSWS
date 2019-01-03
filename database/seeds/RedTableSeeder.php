<?php

use Illuminate\Database\Seeder;
use App\Models\Red;

class RedTableSeeder extends Seeder
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
          'nombre' 		  => 'Nombre de Red 1',
          'descripcion' => 'Descripcion de la Red 1',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de Red 2',
          'descripcion' => 'Descripcion de la Red 2',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de Red 3',
          'descripcion' => 'Descripcion de la Red 3',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de Red 4',
          'descripcion' => 'Descripcion de la Red 4',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ]
      );
      Red::insert($data);
    }
}
