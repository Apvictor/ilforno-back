<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estagios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Verifica se existe uma sessão
		if (!$this->ion_auth->logged_in()) {
			redirect('login');
		}
		$this->load->model('Core_model', 'core_model');
		$this->load->helper('text');
		$this->load->helper('funcoes');
	}

	public function index()
	{
		$data = array(
			'titulo' => 'Estágios',
			'subtitulo' => 'Lista de Estagios',
			'scripts' => array(
				'js/data-table.js',
				'js/alerts.js'
			),
			'estagios' => $this->core_model->getall('estagios')
		);
		$this->load->view('restrita/template/header', $data);
		$this->load->view('restrita/estagios/index');
		$this->load->view('restrita/template/footer');
	}


	public function cadastrar()
	{
		$this->form_validation->set_rules('titulo', 'Título', 'trim|required');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1);

		if ($this->form_validation->run()) {

			$data = elements(
				array(
					'titulo',
				),
				$this->input->post()
			);

			if ($this->core_model->cadastrar('estagios', $data)) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível cadastrar o estágio!');
			}

			redirect('restrita/estagios');
		} else {
			$data = array(
				'titulo' => 'Estágios',
				'subtitulo' => 'Cadastrar estágio',
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/estagios/cadastrar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function editar($chave_id)
	{

		$this->form_validation->set_rules('titulo', 'Título', 'trim|required');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1);

		if ($this->form_validation->run()) {

			$data = elements(
				array(
					'titulo',
				),
				$this->input->post()
			);

			if ($this->core_model->editar('estagios', array('id' => $chave_id), $data)) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível atualizar o estágio!');
			}

			redirect('restrita/estagios');
		} else {
			$data = array(
				'titulo' => 'Estágios',
				'subtitulo' => 'Editar estágio',
				'estagio' => $this->core_model->getby('estagios', array('id' => $chave_id)),
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/estagios/editar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function delete($chave_id)
	{
		if ($this->core_model->deletar('estagios', array('id' => $chave_id))) {
			$this->session->set_flashdata('sucesso', 'Dados deletados com sucesso!');
		} else {
			$this->session->set_flashdata('erro', 'Não foi possível deletar os dados!');
		}
		redirect('restrita/estagios');
	}
}
