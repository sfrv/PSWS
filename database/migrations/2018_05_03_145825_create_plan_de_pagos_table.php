<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanDePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('plan_de_pagos', function (Blueprint $table) {
        //   $table->increments('id');
        //   $table->string('fecha',255);
        //   $table->decimal('monto',5,2);
        //   $table->string('id_contrato',255);
        //   $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_de_pagos');
    }
}
