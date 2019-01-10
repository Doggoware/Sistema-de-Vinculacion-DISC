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
Route::get('/titulados', 'TituladosController@index')->name('titulados.index');
Route::post('/titulados', 'TituladosController@store');
Route::get('/titulados/create', 'TituladosController@create')->name('titulados.create');
Route::get('/titulados/{id}/edit', 'TituladosController@edit')->name('titulados.edit');