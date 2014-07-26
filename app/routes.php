<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Route::get('/admin', function(){
// 	return Redirect::to('admin/pessoas');
// })->before('auth');
//site
Route::get('/', "HomeController@index");
Route::post('/contato', "HomeController@contato");
Route::get('/contato', "HomeController@contato");

Route::get('admin/logout', array('uses' => 'Admin\HomeController@logout'));
Route::get('admin/login', array('uses' => 'Admin\HomeController@login'));
Route::post('admin/login', array('uses' => 'Admin\HomeController@auth'));

//admin
Route::group(array('prefix' => 'admin' , 'namespace' => 'Admin' /*, 'before' => 'auth.basic'*/), function()
{
	Route::get("dashboard", "HomeController@index");
	Route::get('pessoas', array('uses' => 'PessoasController@index'));
	Route::get('pessoas/robot', array('uses' => 'PessoasController@robot'));
	Route::get('', 'HomeController@index');

});

//api
Route::group(array('prefix' => 'api', 'namespace' => 'Api', 'before' => 'cache', 'after' => 'cache' /*, 'before' => 'auth.basic'*/), function()
{

    Route::get('pessoas', 'PessoasApiController@listar');
	Route::get('pessoas/{id}', 'PessoasApiController@show');

});

 