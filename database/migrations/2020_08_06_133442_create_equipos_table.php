<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 255);
            $table->string('logo', 255);
            $table->integer('victorias')->default('0');
            $table->integer('empates')->default('0');
            $table->integer('derrotas')->default('0');
            $table->integer('goles_favor')->default('0');
            $table->integer('goles_contra')->default('0');
            $table->integer('puntos')->default('0');
            $table->foreignId('id_rama')->references('id')->on('ramas');
            $table->foreignId('id_categoria')->references('id')->on('categorias');
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
        Schema::dropIfExists('equipos');
    }
}
