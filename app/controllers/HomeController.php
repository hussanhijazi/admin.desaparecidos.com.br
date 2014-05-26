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

	}
	public function index()
	{

	}
	public function contato()
	{

		// if (Request::ajax())
		// {
			$rules = array(
				'nome' => 'required',
				'email' => 'required|email',
				'mensagem' => 'required'
			);
			$input = Input::all();
			$validation = Validator::make($input, $rules);
			
			if ($validation->passes())
			{	
				
				echo Mail::send('emails.contato', $input, function($message)
				{
					$message->to("contato@desaparecidosbr.org", 'Contato desaparecidosBR.org')->subject('Contato site desaparecidosBR.org');
				});
			}
			else
			{
				
				//var_dump($validation->getMessages()->all());
				echo json_encode($validation->failed());
			}
		//}

		exit;
	}


}