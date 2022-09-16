<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobre extends CI_Controller {

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

		$this->form_validation->set_rules('titulo','Título', 'trim|required');

		if(!$this->input->post('banner')){
			$this->form_validation->set_rules('banner', 'Banner principal', 'required');
		}


		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){

			$data = elements(
				array(
					'titulo',
					'banner',
					'titulo2',
					'texto',
					'icone_item1',
					'icone_item2',
					'icone_item3',
					'icone_item4',
					'titulo_item1',
					'titulo_item2',
					'titulo_item3',
					'titulo_item4',
					'titulo3',
					'nome',
					'texto2',
					'projetos_realizados',
					'unidades_entregues',
					'metros_construidos',
					'missao',
					'visao',
					'valores',
					'icone_sustentabilidade',
					'texto_sustentabilidade'
				), $this->input->post()
			);

			
			if($this->core_model->editar('sobre', array('id' => 1),$data)){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível atualizar os dados!');
			}
				
			redirect('restrita/sobre');
		}else{
			$data = array(
				'titulo' => 'Sobre',
				'subtitulo' => 'Atualizar informações',
				'scripts' => array(
					'mask/jquery.mask.js',
					'mask/custom.js',
					'js/file-upload.js',
					'jquery-upload-file/js/jquery.uploadfile.min.js',
					'jquery-upload-file/js/banner_principal.js',
					'jquery-upload-file/js/iconeum.js',
					'jquery-upload-file/js/iconedois.js',
					'jquery-upload-file/js/iconetres.js',
					'jquery-upload-file/js/iconequatro.js',
					'jquery-upload-file/js/iconesustentabilidade.js',
					'sweetalert2/sweetalert2.all.min.js',
				),
				'styles' => array(
					'jquery-upload-file/css/uploadfile.css'
				),
				'sobre' => $this->core_model->getby('sobre', array('id' => 1))
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/sobre/index');
			$this->load->view('restrita/template/footer');
		}
	}

	public function upload($imagem){

		$config['upload_path']          = './uploads/sobre/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 20480; //20MB
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['max_filename']			= 200; //200 caracteres
        $config['encrypt_name']			= TRUE;
        $config['file_ext_tolower']		= TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($imagem)){

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