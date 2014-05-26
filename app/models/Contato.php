<?php

class Contato extends Eloquent
{

	public static $rules = array(
		'name' => 'required',
		'email' => 'required',
		'message' => 'required'
	);
	
}

