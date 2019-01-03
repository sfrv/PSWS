<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('contratos', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('nombre',255);
        //     $table->string('id_user',255);
        //
        //     // $table->foreign('id_user')->references('id')->on('users');
        //
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
        Schema::dropIfExists('contratos');
    }
}
