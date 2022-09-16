<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obras extends CI_Controller
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
			'titulo' => 'Slideshow Obras',
			'subtitulo' => 'Lista de Slideshow Obras',
			'scripts' => array(
				'js/data-table.js',
				'js/alerts.js'
			),
			'obras' => $this->core_model->getall('slideshow_obras')
		);
		$this->load->view('restrita/template/header', $data);
		$this->load->view('restrita/obras/index');
		$this->load->view('restrita/template/footer');
	}


	public function cadastrar_obras()
	{
		$this->form_validation->set_rules('empreendimento_id', 'Empreendimento', 'required');
		$this->form_validation->set_rules('caminho', 'Caminho', 'required');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1);

		if ($this->form_validation->run()) {
			$data = elements(
				array(
					'empreendimento_id',
					'caminho',
				),
				$this->input->post()
			);

			if ($this->core_model->cadastrar('slideshow_obras', $data)) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível cadastrar as obras!');
			}

			redirect('restrita/obras');
		} else {
			$data = array(
				'titulo' => 'Slideshow Obras',
				'subtitulo' => 'Cadastrar Slideshow Obras',
				'scripts' => array(
					'js/file-upload.js',
					'jquery-upload-file/js/jquery.uploadfile.min.js',
					'jquery-upload-file/js/galeria.js',
					'sweetalert2/sweetalert2.all.min.js',
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'styles' => array(
					'jquery-upload-file/css/uploadfile.css'
				),
				'empreendimentos' => $this->core_model->getall('empreendimentos')
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/obras/cadastrar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function editar($chave_id)
	{
		$this->form_validation->set_rules('empreendimento_id', 'Empreendimento', 'required');
		$this->form_validation->set_rules('caminho', 'Caminho', 'required');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1);

		if ($this->form_validation->run()) {

			$data = elements(
				array(
					'empreendimento_id',
					'caminho',
				),
				$this->input->post()
			);

			if ($this->core_model->editar('slideshow_obras', array('id' => $chave_id), $data)) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível atualizar a obra!');
			}

			redirect('restrita/obras');
		} else {
			$data = array(
				'titulo' => 'Slideshow Obras',
				'subtitulo' => 'Editar Slideshow Obras',
				'scripts' => array(
					'js/file-upload.js',
					'jquery-upload-file/js/jquery.uploadfile.min.js',
					'jquery-upload-file/js/galeria.js',
					'sweetalert2/sweetalert2.all.min.js',
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'styles' => array(
					'jquery-upload-file/css/uploadfile.css'
				),
				'empreendimentos' => $this->core_model->getall('empreendimentos'),
				'obras' => $this->core_model->getby('slideshow_obras', array('id' => $chave_id)),
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/obras/editar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function delete($chave_id)
	{
		if ($this->core_model->deletar('slideshow_obras', array('id' => $chave_id))) {
			$this->session->set_flashdata('sucesso', 'Dados deletados com sucesso!');
		} else {
			$this->session->set_flashdata('erro', 'Não foi possível deletar os dados!');
		}
		redirect('restrita/obras');
	}

	public function upload()
	{

		$config['upload_path']          = './uploads/empreendimentos/fotos/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 20480; //20MB
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$config['max_filename']			= 200; //200 caracteres
		$config['encrypt_name']			= TRUE;
		$config['file_ext_tolower']		= TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('fotos')) {

			$data = array(
				'uploaded_data' => $this->upload->data(),
				'mensagem' => 'Imagem enviada com sucesso',
				'foto_caminho' => $this->upload->data('file_name'),
				'erro' => 0
			);
		} else {

			$data = array(
				'mensagem' => $this->upload->display_errors(),
				'erro' => 1
			);
		}

		echo json_encode($data);
	}
}
