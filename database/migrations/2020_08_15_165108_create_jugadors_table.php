<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 255);
            $table->string('curp', 18);
            $table->string('fotografia', 255);
            $table->foreignId('id_posicion')->references('id')->on('posiciones');
            $table->boolean('manager')->default('0');
            $table->integer('goles')->default('0');
            $table->integer('goles_penal')->default('0');
            $table->integer('goles_asistencia')->default('0');
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
        Schema::dropIfExists('jugadors');
    }
}
