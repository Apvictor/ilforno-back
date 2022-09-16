<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slideshow extends CI_Controller {

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
		$data = array(
				'titulo' => 'Slideshow',
				'subtitulo' => 'Lista de Fotos',
				'scripts' => array(
					'js/data-table.js',
					'js/alerts.js'
				),
				'fotos' => $this->core_model->getall('slideshow')
			);
		$this->load->view('restrita/template/header', $data);
		$this->load->view('restrita/slideshow/index');
		$this->load->view('restrita/template/footer');
	}


	public function cadastrar(){
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('titulo','Título','trim|required|min_length[4]');
		$this->form_validation->set_rules('subtitulo','Subtítulo','trim|required|min_length[4]');
		$this->form_validation->set_rules('descricao','Descricao','trim|required|min_length[4]');

		
		if(!$this->input->post('imagem')){
			$this->form_validation->set_rules('imagem','Foto','required');
		}

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){

			$data = elements(
				array(
					'imagem',
					'titulo',
					'subtitulo',
					'descricao',
					'status',
					'link',
				), $this->input->post()
			);

			
			if($this->core_model->cadastrar('slideshow', $data)){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível cadastrar o slide!');
			}
				
			redirect('restrita/slideshow');
		}else{
			$data = array(
				'titulo' => 'Slideshow',
				'subtitulo' => 'Cadastrar Slide',
				'scripts' => array(
					'js/file-upload.js',
					'jquery-upload-file/js/jquery.uploadfile.min.js',
					'jquery-upload-file/js/slideshow.js',
					'sweetalert2/sweetalert2.all.min.js',
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'styles' => array(
					'jquery-upload-file/css/uploadfile.css'
				),
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/slideshow/cadastrar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function editar($chave_id){
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('titulo','Título','trim|required|min_length[4]');
		$this->form_validation->set_rules('subtitulo','Subtítulo','trim|required|min_length[4]');
		$this->form_validation->set_rules('descricao','Descricao','trim|required|min_length[4]');

		
		if(!$this->input->post('imagem')){
			$this->form_validation->set_rules('imagem','Foto','required');
		}

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){

			$data = elements(
				array(
					'imagem',
					'titulo',
					'subtitulo',
					'descricao',
					'status',
					'link',
				), $this->input->post()
			);

			
			if($this->core_model->editar('slideshow', array('id' => $chave_id),$data)){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível cadastrar o slide!');
			}
				
			redirect('restrita/slideshow');
		}else{
			$data = array(
				'titulo' => 'Slideshow',
				'subtitulo' => 'Editar Slide',
				'scripts' => array(
					'js/file-upload.js',
					'jquery-upload-file/js/jquery.uploadfile.min.js',
					'jquery-upload-file/js/slideshow.js',
					'sweetalert2/sweetalert2.all.min.js',
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'styles' => array(
					'jquery-upload-file/css/uploadfile.css'
				),
				'foto' => $this->core_model->getby('slideshow', array('id' => $chave_id))
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/slideshow/editar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function delete($chave_id){
		if($this->core_model->deletar('slideshow', array('id' => $chave_id))){
			$this->session->set_flashdata('sucesso', 'Dados deletados com sucesso!');
		}else{
			$this->session->set_flashdata('erro', 'Não foi possível deletar os dados!');
		}
		redirect('restrita/slideshow');
	}

	public function upload(){

		$config['upload_path']          = './uploads/slideshow/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 20480; //20MB
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['max_filename']			= 200; //200 caracteres
        $config['encrypt_name']			= TRUE;
        $config['file_ext_tolower']		= TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('imagem')){

        	$data = array(
        		'uploaded_data' => $this->upload->data(),
        		'mensagem' => 'Imagem enviada com sucesso',
        		'foto_caminho' => $this->upload->data('file_name'),
        		'erro' => 0
        	);

        }
        else{

        	$data = array(
        		'mensagem' => $this->upload->display_errors(),
        		'erro' => 1
        	);
        }

        echo json_encode($data);

	}

}