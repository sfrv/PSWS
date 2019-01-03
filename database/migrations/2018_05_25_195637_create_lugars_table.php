<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('lugars', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('nombre',255);
        //     $table->string('direccion',255);
        //     $table->string('descripcion',255);
        //     $table->string('latitud',255);
        //     $table->string('longitud',255);
        //
        //     $table->integer('id_red');
        //     $table->integer('id_tiposervicio');
        //     $table->integer('id_zona');
        //     $table->integer('id_nivel');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugars');
    }
}
