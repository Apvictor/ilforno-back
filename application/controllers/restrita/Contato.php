<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

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

		$this->form_validation->set_rules('telefone','Telefone', 'trim|required|min_length[14]|max_length[15]');
		$this->form_validation->set_rules('whatsapp','WhatsApp', 'trim|required|min_length[15]|max_length[16]');
		$this->form_validation->set_rules('email','E-mail', 'trim|required|min_length[4]|max_length[150]');
		$this->form_validation->set_rules('endereco','Endereço', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('cidade','Cidade', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('uf','UF', 'trim|required|min_length[2]|max_length[2]');


		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){

			$data = elements(
				array(
					'telefone',
					'whatsapp',
					'email',
					'endereco',
					'cidade',
					'uf',
				), $this->input->post()
			);

			
			if($this->core_model->editar('sistema', array('id' => 1),$data)){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível atualizar os dados!');
			}
				
			redirect('restrita/contato');
		}else{
			$data = array(
				'titulo' => 'Contato',
				'subtitulo' => 'Atualizar informações',
				'scripts' => array(
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'contato' => $this->core_model->getby('sistema', array('id' => 1))
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/contato/index');
			$this->load->view('restrita/template/footer');
		}
	}
}