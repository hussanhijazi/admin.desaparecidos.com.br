<?php

class BaseController extends Controller {

 	protected $layout = 'layouts.admin';

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('auth');
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	function getLayout()
	{

		return $this->layout;
	}


}