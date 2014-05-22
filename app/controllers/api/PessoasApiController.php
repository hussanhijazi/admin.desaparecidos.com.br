<?php
namespace Api;
class PessoasApiController extends BaseController {

 //	protected $layout = 'layouts.admin';

	public function __construct()
	{
		//$this->beforeFilter('csrf', array('on' => 'post'));
		//$this->beforeFilter('auth.basic');
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
			$this->layout =  \View::make($this->layout);
		}
	}
	function getLayout()
	{

		return $this->layout;
	}
	public function listar()
	{
	    // return Response::json(
	    //    Pessoa::all()->toArray()
    	//  );
    	 return \Response::json(
	       \Pessoa::where('situacao', '=', 'Desaparecido(a)')->orderBy('data_des', 'desc')->get()
    	 );
	}
	public function show($id = null) 
	{
		
 	    return \Response::json(
	        \Pessoa::where('id', $id)
            ->take(1)
            ->get()->toArray())
	     ;
	    
	}

}

