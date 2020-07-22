<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('equipos', 'EquipoController');
Route::resource('jugadores', 'JugadorController');
Route::resource('partidos', 'PartidoController');//->middleware('valPar');

