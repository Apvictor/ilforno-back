<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Produtos extends RestController
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

	public function index_get($categoria_id)
	{
		$produtos = $this->core_model->getall('produtos', ['categoria_id' => $categoria_id]);

		$data = $produtos;

		$this->response($data, 200);
	}
}
