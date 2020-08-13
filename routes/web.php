<?php

use Illuminate\Support\Facades\Route;

 
Auth::routes();

Route::get('/equipo/{id}/local', 'PartidoController@mostrarVisitante');

//descargar pdf de algunas rutas
Route::get('/pdf','PDFController@PDF')->name('download');
Route::get('/pdf_partidos','PDFController@PDFPartidos')->name('partidospdf');
Route::get('/pdf_resultados','PDFController@PDFResultados')->name('resultadospdf');
Route::get('/pdf_anotaciones','PDFController@PDFAnotaciones')->name('anotacionespdf');
Route::get('/pdf_canchas','PDFController@PDFCanchas')->name('canchaspdf');
Route::get('/pdf_arbitros','PDFController@PDFPArbitros')->name('arbitrospdf');

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

