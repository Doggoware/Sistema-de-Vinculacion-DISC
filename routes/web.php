<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('registro', 'RegistroController');
Route::resource('convenio', 'ConvenioController');
Route::resource('extension', 'ExtensionController');
Route::resource('aprendizaje', 'AprendizajeController');
Route::resource('bienvenido', 'HomeController');
Route::resource('titulados', 'TituladosController');
Route::resource('consultas', 'ConsultaController');
Route::get('todas', function()
{
    return view('/consultas/todas');
});
Route::get('descargarTodTitu', 'TituladosController@pdf')->name('titulados.pdf');
Route::get('descargarTodActiv', 'ConsultaController@pdf')->name('actividades.pdf');
Route::get('todos', [
    'uses' => 'TituladosController@todos'
]);
Route::get('carrera', [
    'uses' => 'TituladosController@carrera'
]);
Route::get('todas', [
    'uses' => 'ConsultaController@todas'
]);