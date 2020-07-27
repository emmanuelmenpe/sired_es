<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('resultados', 'ResultadoController');
Route::resource('estadisticas', 'EstadisticaController');
Route::resource('posiciones', 'PosicionController');
Route::resource('anotaciones', 'AnotacionController');

Route::resource('equipos', 'EquipoController');
Route::resource('jugadores', 'JugadorController');
//Route::get('/jugadores/create{id}', 'JugadorController@create');
Route::resource('partidos', 'PartidoController');//->middleware('valPar');

