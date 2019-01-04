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