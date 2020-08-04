<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Route::get('/resultados', 'ResultadoController@index');
//Route::put('/resultados/{id}/define', 'ResultadoController@define')->name('define');
Route::resource('resultados', 'ResultadoController');
Route::resource('estadisticas', 'EstadisticaController');
Route::resource('posiciones', 'PosicionController');
//Route::resource('anotaciones/futbol', 'AnotacionController');
Route::resource('anotaciones/futbol', 'AnotacionFutbolController');
Route::resource('anotaciones/basquetbol', 'AnotacionBasquetbolController');

Route::resource('equipos', 'EquipoController');
Route::resource('jugadores', 'JugadorController');
//Route::get('/jugadores/create{id}', 'JugadorController@create');
Route::resource('partidos', 'PartidoController');//->middleware('valPar');

