<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PessoasRobot extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pessoas:robot';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$controller = new \Admin\PessoasController;
		$controller->robot();
		$this->info("Registros atualiados com sucesso");
	}



}
