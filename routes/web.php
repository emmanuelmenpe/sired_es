<?php

use Illuminate\Support\Facades\Route;

 
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('usuario','UserController');
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
Route::resource('arbitros', 'ArbitroController');
Route::resource('canchas', 'CanchaController');
Route::resource('sanciones', 'SancionesController');
Route::get('/jugador/create/in_team/{id}', 'JugadorController@create')->name('jugadorNew');
Route::get('/sancion/create/for_jugador/{id}', 'SancionesController@create')->name('sancionnew');
Route::get('/resultado/create/in_partido/{id}', 'ResultadoController@create')->name('defResultado');

