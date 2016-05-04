<?php
namespace Admin;
class PessoasController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
 
  	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('robot')));
	}
	public function index()
	{
		$pessoas = \Pessoa::remember(60)->get();
		$this->layout->main = \View::make('pessoas.index', compact('pessoas'));

	}
	public function robot()
	{


	}
}