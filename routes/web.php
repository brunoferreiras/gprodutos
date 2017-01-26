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

Route::group(['prefix' => 'usuarios'], function(){
	Route::get('/', 'UsuariosController@index');
	Route::get('create', 'UsuariosController@create');
	Route::post('store', 'UsuariosController@store');
	Route::get('show/{id}', 'UsuariosController@show');
	Route::get('edit/{id}', 'UsuariosController@edit');
	Route::put('update/{id}', 'UsuariosController@update');
	Route::get('destroy/{id}', 'UsuariosController@destroy');
});

Route::resource('produtos', 'ProdutosController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'HomeController@index');

Route::get('/emprestimo', 'TransacoesController@create_saida');
Route::get('/devolucao', 'TransacoesController@create_entrada');
Route::post('/emprestimo', 'TransacoesController@store_saida');
Route::post('/devolucao', 'TransacoesController@store_entrada');