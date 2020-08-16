<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_local')->references('id')->on('equipos');
            $table->foreignId('id_visitante')->references('id')->on('equipos');
            $table->date('fecha');
            $table->time('hora', 0);	
            $table->foreignId('id_arbitro')->references('id')->on('arbitros');
            $table->foreignId('id_cancha')->references('id')->on('canchas');
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
        Schema::dropIfExists('partidos');
    }
}
