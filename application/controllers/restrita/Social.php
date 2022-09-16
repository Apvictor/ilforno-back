<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Verifica se existe uma sessão
		if(!$this->ion_auth->logged_in()){
			redirect('login');
		}
		$this->load->model('Core_model', 'core_model');
		$this->load->helper('text');
	}

	public function index(){

		$this->form_validation->set_rules('facebook','Facebook', 'trim|min_length[12]');
		$this->form_validation->set_rules('instagram','Instagram', 'trim|min_length[13]');
		$this->form_validation->set_rules('linkedin','LinkedIn', 'trim|min_length[12]');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){

			$data = elements(
				array(
					'instagram',
					'facebook',
					'linkedin',
				), $this->input->post()
			);

			
			if($this->core_model->editar('sistema', array('id' => 1),$data)){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível atualizar os dados!');
			}
				
			redirect('restrita/social');
		}else{
			$data = array(
				'titulo' => 'Redes Sociais',
				'subtitulo' => 'Atualizar informações',
				'scripts' => array(
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'social' => $this->core_model->getby('sistema', array('id' => 1))
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/social/index');
			$this->load->view('restrita/template/footer');
		}
	}
}