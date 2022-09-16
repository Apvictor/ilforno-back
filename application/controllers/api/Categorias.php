<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Categorias extends RestController
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

	public function index_get()
	{
		$categorias = $this->core_model->getall('categorias');

		for ($i = 0; $i < count($categorias); $i++) {
			$data[$i] = array(
				"id"              => $categorias[$i]->id,
				"backgroundColor" => $categorias[$i]->backgroundColor,
				"backgroundImage" => $categorias[$i]->backgroundImage,
				"fontFamily"      => $categorias[$i]->fontFamily,
				"titulo" 	      => $this->core_model->getby('titulos', ["categoria_id" =>	 $categorias[$i]->id]),
				"subtitulo"       => $this->core_model->getby('subtitulos', ["categoria_id" =>	 $categorias[$i]->id]),
			);
		}

		$this->response($data, 200);
	}

	public function detalhes_get($categoria_id)
	{
		$categorias = $this->core_model->getby('categorias', ['id' => $categoria_id]);

		$categorias->titulo = $this->core_model->getby('titulos', ["categoria_id" =>	 $categorias->id]);
		$categorias->subtitulo = $this->core_model->getby('subtitulos', ["categoria_id" =>	 $categorias->id]);

		$data = $categorias;

		$this->response($data, 200);
	}
}
