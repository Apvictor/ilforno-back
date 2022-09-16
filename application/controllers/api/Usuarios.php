<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Usuarios extends RestController
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
		$this->load->model('Usuarios_model', 'usuarios_model');
	}

	public function index_get()
	{
		$usuarios = $this->core_model->getAll('usuarios');

		$data = $usuarios;

		$this->response($data, 200);
	}

	public function detalhes_get($usuario_id)
	{
		$usuarios = $this->core_model->getby('usuarios', ['id' => $usuario_id]);

		$data = $usuarios;

		$this->response($data, 200);
	}

	public function login_post()
	{
		$request = json_decode(file_get_contents('php://input'));

		$usuario = $this->core_model->cadastrar('usuarios', $request);

		$usuario_data = $this->core_model->getby('usuarios', ['id' => $usuario]);

		$data = [
			'usuario_id' => $usuario_data->id,
			'expira'     => date('Y-m-d H:i:s', strtotime('+07 days')),
			'token'      => md5($usuario_data->nome . date('Y-m-d H:i:s'))
		];

		if ($token = $this->usuarios_model->cria_token($data)) {
			$this->response([
				'authorization' => array(
					'token' => $token->token,
					'expira' => $token->expira
				),
				'usuario' => $usuario_data
			], 200);
		} else {
			header("Access-Control-Allow-Origin: *");
			$this->response(['message' => 'Não foi possível fazer login'], 400);
		}
	}
}
