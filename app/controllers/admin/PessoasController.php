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
				
				$nome = $html->find('div.titulo', 0)->innertext;
				$nome = trim($nome);
				if($html->find('div.foto', 0)->find('img', 0))
					$foto = $html->find('div.foto', 0)->find('img', 0)->src;
				else
					$foto = '';
				
				$res = $html->find('div.inf p', 0)->plaintext;
				list($data, $local) = explode(",", $res);
				$res2 = explode(" ", $data);
				
				list($dia, $mes, $ano)  = explode("/", $res2[2]);
			//	$originalDate = "2010-03-21";
				$data_des = date("Y-m-d", strtotime($ano."-".$mes."-".$dia));
				// $date = new Date::makeFromDate($ano, $mes, $dia);
				// echo $data_des = $date->format('Y-m-d');

				list($a, $local) = explode("de", $local);
				$res3 = str_replace(".</b>","",$local);
				if(stripos($res3, "/") !== false)
					list($cidade, $estado) = explode("/", $res3);
				else $cidade = '';

				$res = $html->find('div.inf p', 2)->plaintext;
				list($a, $feito_boletim) = explode("?", $res);
				$feito_boletim = substr(trim($feito_boletim), 0, 1);

				
				$table = $html->find('table', 0);
				list($a, $sexo) = explode(":", ($table->find('td', 0)->plaintext));
				list($a, $pele) = explode(":", ($table->find('td', 1)->plaintext));

				list($a, $idade_des) = explode(":", ($table->find('td', 2)->plaintext));
			//	echo $idade_des;
				list($idade_des, $b) = explode(" ", trim($idade_des));
		

				list($a, $peso) = explode(":", ($table->find('td', 3)->plaintext));
				if(stripos($peso, " ") !== false){
					$p = explode(" ", trim($peso));
					$peso = $p[0];
				}
				else $peso = '';

				$peso = ($peso == 'kg') ? 0: $peso;
				$peso = ($peso == '00') ? 0 : $peso;
				$peso = ($peso == '') ? 0 : $peso;
				$peso = str_replace(",",'.',trim($peso));

				//list($a, $i) = explode(":", ($table->find('td', 4)->plaintext));
				$altura = 0;
				list($a, $altura) = explode(":", ($table->find('td', 5)->plaintext));
		
				if(stripos($altura, " ") !== false){
					$p = explode(" ", trim($altura));
					$altura = $p[0];
				} else $altura = 0;
				$altura = ($altura == '00') ? 0 : $altura;
				$altura = ($altura == '') ? 0 : $altura;
				$altura = str_replace(",",'.',trim($altura));
				
				list($a, $transtorno_mental) = explode("?", ($table->find('td', 6)->plaintext));
				$transtorno_mental = substr(trim($transtorno_mental), 0, 1);
				
				list($a, $olhos) = explode(":", ($table->find('td', 7)->plaintext));
				list($a, $tipo_fisico) = explode(":", ($table->find('td', 8)->plaintext));
				list($a, $cabelos) = explode(":", ($table->find('td', 9)->plaintext));
				//echo utf8_decode($feito_boletim);exit;
				
				$res = $html->find('div.inf p', 3)->plaintext;
				list($a, $b) = explode(".", $res);
				
				$res2 = explode(" ", $a);
				$data_registro = trim($res2[count($res2)-1]);
				list($dia, $mes, $ano)  = explode("/", $data_registro);
				$data_registro = date("Y-m-d", strtotime($ano."-".$mes."-".$dia));


				$res2 = explode(" ", $b);
				$data_atualizacao = trim($res2[count($res2)-1]);
				list($dia, $mes, $ano)  = explode("/", $data_atualizacao);
				$data_atualizacao = date("Y-m-d", strtotime($ano."-".$mes."-".$dia));
				
				$pessoaModel = \Pessoa::find($id);
				if($pessoaModel == null)
				{

					$pessoaModel = new \stdClass;
					$pessoaModel->id = $id;
					echo $pessoaModel->nome = $nome;
					echo " - inserido...";
					$pessoaModel->situacao = $situacao;
					$pessoaModel->foto = $foto;
					$pessoaModel->data_des = $data_des;
					$pessoaModel->cidade = trim($cidade);
					$pessoaModel->estado = trim(@$estado);
					$pessoaModel->feito_boletim = $feito_boletim;
					$pessoaModel->sexo = trim($sexo);
					$pessoaModel->pele = trim($pele);
					$pessoaModel->idade_des = trim($idade_des);
					$pessoaModel->peso = $peso;
					$pessoaModel->altura = $altura;
					$pessoaModel->transtorno_mental = trim(($transtorno_mental));
					$pessoaModel->olhos = trim($olhos);
					$pessoaModel->tipo_fisico = trim($tipo_fisico);
					$pessoaModel->cabelos = trim($cabelos);
					$pessoaModel->data_registro = $data_registro;
					$pessoaModel->data_atualizacao = $data_atualizacao;
					$array =  (array) $pessoaModel;
					$pessoas[] = $array;
					
				}else
				{
					//unset($pessoaModel);
					
					$pessoaModel->id = $id;
				echo $pessoaModel->nome = $nome;
				echo " - atualizado...";
					$pessoaModel->situacao = $situacao;
					$pessoaModel->foto = $foto;
					$pessoaModel->data_des = $data_des;
					$pessoaModel->cidade = trim($cidade);
					$pessoaModel->estado = trim(@$estado);
					$pessoaModel->feito_boletim = $feito_boletim;
					$pessoaModel->sexo = trim($sexo);
					$pessoaModel->pele = trim($pele);
					$pessoaModel->idade_des = trim($idade_des);
					$pessoaModel->peso = $peso;
					$pessoaModel->altura = $altura;
					$pessoaModel->transtorno_mental = trim(($transtorno_mental));
					$pessoaModel->olhos = trim($olhos);
					$pessoaModel->tipo_fisico = trim($tipo_fisico);
					$pessoaModel->cabelos = trim($cabelos);
					$pessoaModel->data_registro = $data_registro;
					$pessoaModel->data_atualizacao = $data_atualizacao;
					$pessoaModel->save();	
					
				}

				echo "\n";
				//var_dump($res);
				
			}
			//exit;
		}
		// dd($pessoas);
		if(count($pessoas) > 0)
		\DB::table('pessoas')->insert($pessoas);

	}
}