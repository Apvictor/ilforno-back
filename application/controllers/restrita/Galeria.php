<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Verifica se existe uma sessão
		if(!$this->ion_auth->logged_in()){
			redirect('login');
		}
		$this->load->model('Core_model', 'core_model');
		$this->load->helper('text');
		$this->load->helper('funcoes');
	}

	public function index(){
		$data = array(
				'titulo' => 'Galeria',
				'subtitulo' => 'Lista de Fotos',
				'scripts' => array(
					'js/data-table.js',
					'js/alerts.js'
				),
				'fotos' => $this->core_model->getall('fotos')
			);
		$this->load->view('restrita/template/header', $data);
		$this->load->view('restrita/fotos/index');
		$this->load->view('restrita/template/footer');
	}


	public function cadastrar_fotos($empreendimento_id=NULL){
		
		if(!$this->input->post('fotos')){
			$this->form_validation->set_rules('fotos','Fotos','required');
		}

		$this->form_validation->set_rules('empreendimento_id','Empreendimento', 'required');


		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){

			$fotos = $this->input->post('fotos');
			$empreendimento_id = $this->input->post('empreendimento_id');

			$verifica=0;
			foreach($fotos as $foto){
				$data_foto = [
					'empreendimento_id' => $empreendimento_id,
					'imagem' => $foto
				];

				if($this->core_model->cadastrar('fotos', $data_foto)){
					$verifica++;
				}
			}

			if($verifica>0){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
				redirect('restrita/galeria/cadastrar_legendas/'.$empreendimento_id);
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível cadastrar as fotos!');
				redirect('restrita/galeria/cadastrar_fotos');
			}
				
			
		}else{
			$data = array(
				'titulo' => 'Galeria',
				'subtitulo' => 'Cadastrar fotos',
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
			$this->load->view('restrita/fotos/fotos');
			$this->load->view('restrita/template/footer');
		}
	}

	public function cadastrar_legendas($empreendimento_id){
		$this->form_validation->set_rules('confirma','Confirma', 'required');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){

			$legendas = $this->input->post('descricao');
			$foto_id = $this->input->post('foto_id');

			$verifica = 0;
			for($i=0;$i<count($legendas);$i++){
				if($this->core_model->editar('fotos', array('id' => $foto_id[$i]), array('descricao' => $legendas[$i]))){
					$verifica++;
				}
			}

			if($verifica>0){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível cadastrar as fotos!');
			}

			redirect('restrita/galeria');
			
			
		}else{
			$data = array(
				'titulo' => 'Galeria',
				'subtitulo' => 'Cadastrar legendas',
				'scripts' => array(
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'empreendimento_id' => $empreendimento_id,
				'fotos' => $this->core_model->getall('fotos', array('empreendimento_id' => $empreendimento_id))
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/fotos/legendas');
			$this->load->view('restrita/template/footer');
		}
	}

	public function editar($chave_id){

		$this->form_validation->set_rules('descricao','Descrição', 'trim|required|min_length[4]');
		if(!$foto = $this->input->post('fotos')){
			$this->form_validation->set_rules('fotos','Foto','required');
		}

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){

			$data = [
				'descricao' => $this->input->post('descricao')
			];

			if($foto = $this->input->post('fotos')){
				if(is_array($foto)){
					$data['imagem'] = $foto[0];
				}else{
					$data['imagem'] = $foto;
				}
			}
			
			if($this->core_model->editar('fotos', array('id' => $chave_id),$data)){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível atualizar a foto!');
			}
				
			redirect('restrita/galeria');
		}else{
			$data = array(
				'titulo' => 'Galeria',
				'subtitulo' => 'Editar foto',
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
				'foto' => $this->core_model->getby('fotos', array('id' => $chave_id)),
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/fotos/editar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function delete($chave_id){
		if($this->core_model->deletar('fotos', array('id' => $chave_id))){
			$this->session->set_flashdata('sucesso', 'Dados deletados com sucesso!');
		}else{
			$this->session->set_flashdata('erro', 'Não foi possível deletar os dados!');
		}
		redirect('restrita/galeria');
	}

	public function upload(){

		$config['upload_path']          = './uploads/empreendimentos/fotos/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 20480; //20MB
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['max_filename']			= 200; //200 caracteres
        $config['encrypt_name']			= TRUE;
        $config['file_ext_tolower']		= TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('fotos')){

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