<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Verifica se existe uma sessão
		if(!$this->ion_auth->logged_in()){
			redirect('login');
		}
	}

	public function index(){
		$this->load->model('Core_model', 'core_model');

		$administradores = $this->core_model->cont_all_result('users');
		
		$data = array(
				'titulo' => 'Home',
				'usuario' => $this->core_model->getby('users', array('id'=>$this->session->userdata('user_id'))),
				'administradores' => @$administradores->qtd,
			);
		$this->load->view('restrita/template/header', $data);
		$this->load->view('restrita/home/index');
		$this->load->view('restrita/template/footer');
	}
}