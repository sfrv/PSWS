<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        // $this->call(RedTableSeeder::class);
        // $this->call(TipoServicioTableSeeder::class);
        // $this->call(NivelTableSeeder::class);
        // $this->call(ZonaTableSeeder::class);
        // $this->call(LugarTableSeeder::class);
        $this->call(EspecialidadesTableSeeder::class);
        //php artissa migrate:install -> crea la tabla para migrar las tablas
        //php artisan migrate
        //php artisan db:seed
        //composer dump-autoload
        //php artisan make:model -m crea la migracion mas
    }
}
