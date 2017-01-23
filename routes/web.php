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

Route::get('/', function () {
    return view('login');
});

Route::group(['prefix' => 'usuarios'], function(){
	Route::get('/', 'UsuariosController@index');
	Route::get('/create', 'UsuariosController@create');
	Route::post('/store', 'UsuariosController@store');
	Route::get('/show', 'UsuariosController@show');
	Route::get('/edit', 'UsuariosController@edit');
	Route::post('/update', 'UsuariosController@update');
	Route::get('/delete', 'UsuariosController@delete');
});

Route::resource('produtos', 'ProdutosController');
