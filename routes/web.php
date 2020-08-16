<?php

use Illuminate\Support\Facades\Route;

 
Auth::routes();
//buscar equipos locales con excepcion del local
Route::get('/equipo/{id}/local', 'PartidoController@mostrarVisitante')->middleware('auth');

//descargar pdf de algunas rutas
Route::get('/pdf_equipos','PDFController@PDFEquipos')->name('equipospdf')->middleware('auth');
Route::get('/pdf_partidos','PDFController@PDFPartidos')->name('partidospdf')->middleware('auth');
Route::get('/pdf_resultados','PDFController@PDFResultados')->name('resultadospdf')->middleware('auth');
Route::get('/pdf_anotaciones','PDFController@PDFAnotaciones')->name('anotacionespdf')->middleware('auth');
Route::get('/pdf_canchas','PDFController@PDFCanchas')->name('canchaspdf')->middleware('auth');
Route::get('/pdf_arbitros','PDFController@PDFPArbitros')->name('arbitrospdf')->middleware('auth');

Route::get('/', 'HomeController@index')->name('home');
Route::resource('usuario','UserController');
Route::resource('resultados', 'ResultadoController');
Route::resource('estadisticas', 'EstadisticaController');
Route::resource('posiciones', 'PosicionController');
Route::resource('anotaciones/futbol', 'AnotacionFutbolController');
Route::resource('equipos', 'EquipoController');
Route::resource('jugadores', 'JugadorController');
Route::resource('partidos', 'PartidoController');
Route::resource('cuerpoTecnico', 'CuerpoTecnicoController');
Route::resource('arbitros', 'ArbitroController')->middleware('auth');
Route::resource('canchas', 'CanchaController')->middleware('auth');
Route::resource('sanciones', 'SancionesController')->middleware('auth');

Route::get('/jugador/create/in_team/{id}', 'JugadorController@create')->name('jugadorNew')->middleware('auth');
Route::get('/cuerpo_tecnico/create/in_team/{id}', 'CuerpoTecnicoController@create')->name('tecnicoNew')->middleware('auth');
Route::get('/sancion/create/for_jugador/{id}', 'SancionesController@create')->name('sancionnew')->middleware('auth');
Route::get('/resultado/create/in_partido/{id}', 'ResultadoController@create')->name('defResultado')->middleware('auth');

