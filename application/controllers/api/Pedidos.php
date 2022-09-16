<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Pedidos extends RestController
{
	public function __construct()
	{
		parent::__construct();
		header('Authorization, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Credentials');
		header('Access-Control-Allow-Methods:GET, OPTIONS');

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");

		if ($_SERVER['HTTP_HOST'] == 'localhost') {
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
		} else {
			error_reporting(0);
			ini_set('display_errors', 0);
		}

		$this->load->model('Core_model', 'core_model');
	}

	public function index_get($usuario_id)
	{
		$pedidos = $this->core_model->getall('pedidos', ['usuario_id' => $usuario_id]);

		for ($i = 0; $i < count($pedidos); $i++) {
			$pedidos[$i]->usuario = $this->core_model->getall('usuarios', ['id' => $pedidos[$i]->usuario_id]);
			$pedidos[$i]->produtos = $this->core_model->getall('produtos_pedido', ['pedido_id' => $pedidos[$i]->id]);

			for ($y = 0; $y < count($pedidos[$i]->produtos); $y++) {
				$pedidos[$i]->produtos[$y] = $this->core_model->getby('produtos', ['id' => $pedidos[$i]->produtos[$y]->produto_id]);
			}
		}

		$data = $pedidos;

		$this->response($data, 200);
	}

	public function index_post()
	{
		$data = array(
			'id' => '0',
			'total' => $this->post('total'),
			'status' => $this->post('status'),
			'usuario' => $this->post('usuario'),
			'produtos' => $this->post('produtos')
		);

		$pedidos = $this->core_model->getall('pedidos', null, null, 'DESC', 'id', 1);
		$data['id'] = $pedidos[0]->id + 1;

		$data_produtos_pedido = [];
		for ($i = 0; $i < count($data['produtos']); $i++) {
			$data_produtos_pedido = array(
				'produto_id' => $data['produtos'][$i]["id"],
				'pedido_id' => $data["id"]
			);
			$produtos_pedido = $this->core_model->cadastrar('produtos_pedido', $data_produtos_pedido);
		}

		$produtos_pedido = $this->core_model->getAll('produtos_pedido', ['pedido_id' => $data['id']]);
		$usuario = $this->core_model->getby('usuarios', ['id' => $data['usuario']['id']]);

		if (count($produtos_pedido) > 0 && $usuario) {
			$data_pedido = array(
				'id'          => $data['id'],
				'total'       => $data['total'],
				'status'      => $data['status'],
				'usuario_id'  => $usuario->id,
			);

			$pedido = $this->core_model->cadastrar('pedidos', $data_pedido);

			$data = $this->core_model->getby('pedidos', ['id' => $pedido]);

			$this->response($data, 200);
		}

		$this->response(['error' => 'Falha ao concluir pedido!'], 400);
	}
}
