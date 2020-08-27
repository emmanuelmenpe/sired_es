<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_ganador')->default('0');
            $table->integer('id_perdedor')->default('0');
            $table->integer('goles_ganador')->default('0');
            $table->integer('goles_perdedor')->default('0');
            $table->foreignId('id_partido')->references('id')->on('partidos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
}
