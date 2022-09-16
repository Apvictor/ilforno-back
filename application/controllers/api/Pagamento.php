<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/PagSeguro.php';

use chriskacerguis\RestServer\RestController;
use chriskacerguis\Libraries\PagSeguro;

class Pagamento extends RestController
{
	protected $headers;
	protected $token;

	public function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Headers:SALONGOLD-API-KEY, Authorization, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Credentials');
		header('Access-Control-Allow-Methods:GET, POST, OPTIONS, PUT, PATCH, DELETE');

		if ($_SERVER['HTTP_HOST'] == 'localhost') {
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
		} else {
			error_reporting(0);
			ini_set('display_errors', 0);
		}

		$this->load->model('Core_model', 'core_model');

		// Verifica se usuário está logado
		// $this->headers = apache_request_headers();
		// if (!$this->token = $this->headers['Authorization'] ?? false) {
		// 	$this->response([
		// 		'status' => FALSE,
		// 		'message' => 'Authorization não encontrado no header'
		// 	]);
		// }

		$this->pagseguro = new PagSeguro;
	}

	public function session_get()
	{
		try {
			$this->response($this->pagseguro->createSession(), 200);
		} catch (Exception $ex) {
			$this->response($ex->getMessage(), 500);
		}
	}

	public function cartaocredito_post()
	{
		$request = json_decode(file_get_contents('php://input'));

		$usuario = $this->core_model->getby('usuarios', array('id' => $request->usuario_id));

		$endereco = $this->core_model->getby('enderecos', array('usuario_id' => $request->usuario_id));

		$cartao = $this->core_model->getby('cartoes', array('usuario_id' => $request->usuario_id));

		$items = [];
		// Se tiver frete
		// $total = 0;
		// $items[0] = [
		// 	"quantidade" => 1,
		// 	"descricao" => 'Frete',
		// 	"preco" => number_format($request->frete, 2)
		// ];

		$total = 0;
		$i = 1;
		foreach ($request->itens as $item) {
			$produto = $this->core_model->getby('produtos', array('id' => $item->produto_id));

			$preco = $produto->preco * $item->quantidade;

			array_push($items, array(
				"quantidade" => $item->quantidade,
				"descricao"  => $produto->nome,
				"preco"      => number_format($produto->preco, 2)
			));

			$total += $preco;

			$i++;
		}

		// Se tiver frete
		// $frete = (float) $input->frete;
		// $total = $total + $frete;

		$total = number_format($total, 2);

		$prestacao = [
			'parcelas' => "1",
			'total'      => $total
		];

		$dados_envio = [
			"referencia" => "REFPAGAMENTO" . $usuario->id,
			"cliente" => array(
				"hash" => $request->hash ?? 'c7a5f6d6b90625d01a1d57a3e4414b9615c89d8e081c2ad8e9b484c9c9eee3b5',
				"primeiro_nome" => explode(' ', $usuario->nome),
				"sobrenome" => explode(' ', $usuario->sobrenome ?? 'Pereira'),
				"email" => $usuario->email == 0 ? 'armando2019ti@gmail.com' : 0,
				"telefone" => str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $usuario->telefone ?? '11995052373')))),
				"documento" => str_replace('.', '', str_replace('-', '', $usuario->document ?? '46798526829')),
				"endereco_ip" => $request->endereco_id ?? '138.123.121.221',
				"endereco" => array(
					"envio" => array(
						"logradouro"  => $endereco->logradouro,
						"numero"      => $endereco->numero,
						"bairro"      => $endereco->bairro,
						"cep"         => $endereco->cep,
						"cidade"      => $endereco->cidade,
						"estado"      => $endereco->estado,
						"complemento" => $endereco->complemento
					),
					"cobranca" => array(
						"logradouro"  => $endereco->logradouro,
						"numero"      => $endereco->numero,
						"bairro"      => $endereco->bairro,
						"cep"         => $endereco->cep,
						"cidade"      => $endereco->cidade,
						"estado"      => $endereco->estado,
						"complemento" => $endereco->complemento
					),
				),
			),
			"items" => $items,
			"prestacao" => $prestacao,
			"cartao" => array(
				"titular" => $cartao->titular,
				"data_nascimento" => date('d/m/Y', strtotime($usuario->data_nascimento)),
				"token" => $request->token ?? '2d14c99d476c4b55bfb103e82cdf6382'
			)
		];

		$this->response($dados_envio, 200);
	}

	public function credito_post()
	{
		$request = json_decode(file_get_contents('php://input'));
		$result = $this->pagseguro->creditCard($request);
		$this->response($result, 200);
	}

	public function debito_post()
	{
		$request = json_decode(file_get_contents('php://input'));
		$result = $this->pagseguro->onlineDebit($request);
		$this->response($result, 200);
	}
	// public function boleto_post(){
	// 	$json = file_get_contents('php://input');
	// 	$data = json_decode($json, true);
	// 	$result = $this->pagseguro->boleto($data);
	// 	$this->response($result, 200);
	// }
	// public function notify_post(){
	// 	$json  = file_get_contents('php://input');
	// 	$data  = json_decode($json, true);
	// 	$_POST = empty($data) ? $_POST : $data;
	// 	$this->pagseguro->transactionListener();
	// 	$this->response(array(), 200);
	// }
}
