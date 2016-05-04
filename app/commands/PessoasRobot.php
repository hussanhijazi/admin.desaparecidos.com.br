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

//		$controller = new \Admin\PessoasController;
//		$controller->robot();

		set_time_limit(0);
		$pessoas = array();
		$url = 'http://www.desaparecidos.gov.br/index.php/desparecidos';
		for ($i=0; $i < 12; $i++) {
			$html = new \Htmldom($url."?pag=".$i);
			//	$i = 0;
			foreach($html->find('div.boxDesaparecidor') as $p)
			{

				$readMode = $p->find('a', 0)->href;

				$html = new \Htmldom('http://www.desaparecidos.gov.br/'.$readMode);

				list($a, $id) = explode("id=",$readMode);
				$situacao = ($html->find('div.desaparecido', 0) != null)? "Desaparecido(a)":"Encontrado(a)" ;

				$infos = $html->find('div.inf div');

				/*
				 * <div class="inf">
		<div><strong>Nome do desaparecido: </strong>AUGUSTO ESTEVES LIMA</div><br/>
		<div><strong>Data de nascimento: </strong>28/11/1994</div><br/>
		<div><strong>Data do desaparecimento: </strong>25/07/2011</div><br/>
		<div><strong>UF: </strong>MG</div><br/>
		<div><strong>Munic&iacute;pio: </strong>Ribeirão das Neves</div><br/><br/><br/>

				 */

				list($a, $nome) = explode("</strong>",$infos[0]->innertext);
				$nome = trim($nome);

				list($a, $data_nas) = explode("</strong>",$infos[1]->innertext);
				list($a, $data_des) = explode("</strong>",$infos[2]->innertext);
				list($a, $estado) = explode("</strong>",$infos[3]->innertext);
				list($a, $cidade) = explode("</strong>",$infos[4]->innertext);

				if($html->find('div.foto', 0)->find('img', 0))
					$foto = $html->find('div.foto', 0)->find('img', 0)->src;
				else
					$foto = '';


				$pessoaModel = \Pessoa::find($id);
				if($pessoaModel == null)
				{

					$pessoaModel = new \stdClass;
					$pessoaModel->id = $id;
					echo $pessoaModel->nome = $nome;
					echo " - inserido...\n";
					$pessoaModel->situacao = $situacao;
					$pessoaModel->foto = $foto;
					$pessoaModel->data_des = $data_des;
					$pessoaModel->cidade = trim($cidade);
					$pessoaModel->estado = trim(@$estado);
					$array =  (array) $pessoaModel;
					$pessoas[] = $array;

				}else
				{
					//unset($pessoaModel);

					$pessoaModel->id = $id;
					$this->info($pessoaModel->nome = $nome." - atualizado...");
					$pessoaModel->situacao = $situacao;
					$pessoaModel->foto = $foto;
					$pessoaModel->data_des = $data_des;
					$pessoaModel->cidade = trim($cidade);
					$pessoaModel->estado = trim(@$estado);
					$pessoaModel->save();

				}


				//var_dump($res);

			}
			//exit;
		}
		// dd($pessoas);
		if(count($pessoas) > 0)
			\DB::table('pessoas')->insert($pessoas);

		$this->info("Registros atualiados com sucesso");
	}



}
