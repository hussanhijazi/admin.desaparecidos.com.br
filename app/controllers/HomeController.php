<?php

class HomeController extends BaseController {

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
		$this->beforeFilter('auth', array('except' => array('login', 'auth')));
	}
	public function login()
	{
		$this->layout =  'layouts.login';
		return View::make('login');

	}
	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}
	public function auth()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {

			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
		
			// create our user data for the authentication
			$userdata = array(
				'login' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);
			// $user = new User();
			// $user->login = Input::get('email');
			// $user->senha = md5(Input::get('password'));
			
			
			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				//echo 'SUCCESS!';
				return Redirect::to('/');
				

			} else {	 	

				Session::flash('message', 'Erro ao afetuar o login :(');
				// validation not successful, send back to form	
				return Redirect::to('login');

			}

		}
	}
	public function getIndex()
	{

	}
	

}