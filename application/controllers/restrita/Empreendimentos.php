<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empreendimentos extends CI_Controller
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
			'titulo' => 'Empreendimentos',
			'subtitulo' => 'Lista de Empreendimentos',
			'scripts' => array(
				'js/data-table.js',
				'js/alerts.js'
			),
			'empreendimentos' => $this->core_model->getall('empreendimentos')
		);
		$this->load->view('restrita/template/header', $data);
		$this->load->view('restrita/empreendimentos/index');
		$this->load->view('restrita/template/footer');
	}

	public function cadastrar()
	{
		$this->form_validation->set_rules('ativacao', 'Ativação', 'required');
		$this->form_validation->set_rules('destaque', 'Destaque', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[4]');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1);

		if ($this->form_validation->run()) {

			$data = elements(
				array(
					'ativacao',
					'categoria_id',
					'nome',
					'logo',
					'banner1',
					'banner2',
					'metragem',
					'quartos',
					'vagas',
					'local',
					'descricao',
					'destaque',
					'status',
					'hotsite',
					'whatsapp',
					'instagram',
					'facebook',
					'youtube',
					'email_destinatario',
					'imagem_ficha',
					'texto_ficha',
					'cidade_id'
				),
				$this->input->post()
			);

			$data['meta_link'] = url_amigavel($this->input->post('nome'));


			if ($empreendimento_id = $this->core_model->cadastrar('empreendimentos', $data)) {

				$diferenciais = $this->input->post('diferenciais');
				if (!empty($diferenciais[0])) {
					$diferenciais_descricao = $this->input->post('descricao_diferencial');

					for ($i = 0; $i < count($diferenciais); $i++) {
						$data_diferencial = [
							'empreendimento_id' => $empreendimento_id,
							'diferencial_id' => $diferenciais[$i],
							'descricao' => $diferenciais_descricao[$i]
						];

						$this->core_model->cadastrar('diferenciais_empreendimentos', $data_diferencial);
					}
				}

				$estagios = $this->input->post('estagios');
				if (!empty($estagios[0])) {
					$percentual_estagio = $this->input->post('percentual_estagio');

					for ($i = 0; $i < count($estagios); $i++) {
						$data_estagio = [
							'empreendimento_id' => $empreendimento_id,
							'estagio_id' => $estagios[$i],
							'percentual' => $percentual_estagio[$i]
						];

						$this->core_model->cadastrar('estagios_empreendimentos', $data_estagio);
					}
				}

				$parceiros = $this->input->post('parceiros');
				if (!empty($parceiros[0])) {

					for ($i = 0; $i < count($parceiros); $i++) {
						$data_parceiro = [
							'empreendimento_id' => $empreendimento_id,
							'parceiro_id' => $parceiros[$i],
						];

						$this->core_model->cadastrar('parceiros_empreendimentos', $data_parceiro);
					}
				}


				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível cadastrar o empreendimento!');
			}

			redirect('restrita/empreendimentos');
		} else {
			$data = array(
				'titulo' => 'Empreendimentos',
				'subtitulo' => 'Cadastrar empreendimento',
				'scripts' => array(
					'js/file-upload.js',
					'jquery-upload-file/js/jquery.uploadfile.min.js',
					'jquery-upload-file/js/logo.js',
					'jquery-upload-file/js/bannerum.js',
					'jquery-upload-file/js/bannerdois.js',
					'jquery-upload-file/js/ficha.js',
					'sweetalert2/sweetalert2.all.min.js',
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'styles' => array(
					'jquery-upload-file/css/uploadfile.css'
				),
				'cidades' => $this->core_model->getall('cidades'),
				'diferenciais' => $this->core_model->getall('diferenciais'),
				'estagios' => $this->core_model->getall('estagios'),
				'parceiros' => $this->core_model->getall('parceiros'),
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/empreendimentos/cadastrar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function editar($chave_id)
	{
		$this->form_validation->set_rules('ativacao', 'Ativação', 'required');
		$this->form_validation->set_rules('destaque', 'Destaque', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[4]');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1);

		if ($this->form_validation->run()) {

			$data = elements(
				array(
					'ativacao',
					'categoria_id',
					'nome',
					'logo',
					'banner1',
					'banner2',
					'metragem',
					'quartos',
					'vagas',
					'local',
					'descricao',
					'destaque',
					'status',
					'hotsite',
					'whatsapp',
					'instagram',
					'facebook',
					'youtube',
					'email_destinatario',
					'imagem_ficha',
					'texto_ficha',
					'cidade_id'
				),
				$this->input->post()
			);

			$data['meta_link'] = url_amigavel($this->input->post('nome'));


			if ($this->core_model->editar('empreendimentos', array('id' => $chave_id), $data)) {
				$diferenciais = $this->input->post('diferenciais');
				if (!empty($diferenciais[0])) {
					$this->core_model->deletar('diferenciais_empreendimentos', array('empreendimento_id' => $chave_id));
					$diferenciais_descricao = $this->input->post('descricao_diferencial');

					for ($i = 0; $i < count($diferenciais); $i++) {
						$data_diferencial = [
							'empreendimento_id' => $chave_id,
							'diferencial_id' => $diferenciais[$i],
							'descricao' => $diferenciais_descricao[$i]
						];

						$this->core_model->cadastrar('diferenciais_empreendimentos', $data_diferencial);
					}
				}

				$estagios = $this->input->post('estagios');
				if (!empty($estagios[0])) {
					$this->core_model->deletar('estagios_empreendimentos', array('empreendimento_id' => $chave_id));
					$percentual_estagio = $this->input->post('percentual_estagio');

					for ($i = 0; $i < count($estagios); $i++) {
						$data_estagio = [
							'empreendimento_id' => $chave_id,
							'estagio_id' => $estagios[$i],
							'percentual' => $percentual_estagio[$i]
						];

						$this->core_model->cadastrar('estagios_empreendimentos', $data_estagio);
					}
				}

				$parceiros = $this->input->post('parceiros');
				if (!empty($parceiros[0])) {
					$this->core_model->deletar('parceiros_empreendimentos', array('empreendimento_id' => $chave_id));
					for ($i = 0; $i < count($parceiros); $i++) {
						$data_parceiro = [
							'empreendimento_id' => $chave_id,
							'parceiro_id' => $parceiros[$i],
						];

						$this->core_model->cadastrar('parceiros_empreendimentos', $data_parceiro);
					}
				}

				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível atualizar o empreendimento!');
			}

			redirect('restrita/empreendimentos');
		} else {
			$data = array(
				'titulo' => 'Empreendimentos',
				'subtitulo' => 'Editar empreendimento',
				'scripts' => array(
					'js/file-upload.js',
					'jquery-upload-file/js/jquery.uploadfile.min.js',
					'jquery-upload-file/js/logo.js',
					'jquery-upload-file/js/bannerum.js',
					'jquery-upload-file/js/bannerdois.js',
					'jquery-upload-file/js/ficha.js',
					'sweetalert2/sweetalert2.all.min.js',
					'mask/jquery.mask.js',
					'mask/custom.js'
				),
				'styles' => array(
					'jquery-upload-file/css/uploadfile.css'
				),
				'empreendimento' => $this->core_model->getby('empreendimentos', array('id' => $chave_id)),
				'cidades' => $this->core_model->getall('cidades'),
				'diferenciais' => $this->core_model->getall('diferenciais'),
				'diferenciais_empreendimentos' => $this->core_model->getall('diferenciais_empreendimentos', array('empreendimento_id' => $chave_id)),
				'estagios' => $this->core_model->getall('estagios'),
				'estagios_empreendimentos' => $this->core_model->getall('estagios_empreendimentos', array('empreendimento_id' => $chave_id)),
				'parceiros' => $this->core_model->getall('parceiros'),
				'parceiros_empreendimentos' => $this->core_model->getall('parceiros_empreendimentos', array('empreendimento_id' => $chave_id)),
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/empreendimentos/editar');
			$this->load->view('restrita/template/footer');
		}
	}

	public function delete($chave_id)
	{
		if ($this->core_model->deletar('empreendimentos', array('id' => $chave_id))) {
			$this->session->set_flashdata('sucesso', 'Dados deletados com sucesso!');
		} else {
			$this->session->set_flashdata('erro', 'Não foi possível deletar os dados!');
		}
		redirect('restrita/empreendimentos');
	}

	public function upload($imagem)
	{

		$config['upload_path']          = './uploads/empreendimentos/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 20480; //20MB
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$config['max_filename']			= 200; //200 caracteres
		$config['encrypt_name']			= TRUE;
		$config['file_ext_tolower']		= TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload($imagem)) {

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
