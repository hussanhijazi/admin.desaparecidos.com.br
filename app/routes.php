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


Route::get('/', function(){
	return Redirect::to('admin/home');
})->before('auth');

Route::get('logout', array('uses' => 'HomeController@logout'));
Route::get('login', array('uses' => 'Admin\HomeController@login'));
Route::post('login', array('uses' => 'Admin\HomeController@auth'));

Route::group(array('prefix' => 'admin' , 'namespace' => 'Admin'/*, 'before' => 'auth.basic'*/), function()
{
	Route::controller('home', 'HomeController');
	Route::get('pessoas', array('uses' => 'PessoasController@getIndex'));
	Route::get('pessoas/robot', array('uses' => 'PessoasController@getRobot'));
});


Route::group(array('prefix' => 'api', 'namespace' => 'Api' /*, 'before' => 'auth.basic'*/), function()
{
    Route::get('pessoas', 'PessoasApiController@listar');
	Route::get('pessoas/{id}', 'PessoasApiController@show');

});


