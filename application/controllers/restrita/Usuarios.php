<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Verifica se existe uma sessão
		if(!$this->ion_auth->logged_in()){
			redirect('login');
		}
		$this->load->model('Core_model', 'core_model');

	}
	
	public function index(){
		$data = array(
			'titulo' => 'Administradores',
			'subtitulo' => 'Lista de Administradores',
			'scripts' => array(
					'js/data-table.js',
					'js/alerts.js'
			),
			'usuarios' => $this->ion_auth->users()->result()
		);

		$this->load->view('restrita/template/header', $data);
		$this->load->view('restrita/usuarios/index');
		$this->load->view('restrita/template/footer');
		

	}

	public function cadastrar(){
		$this->form_validation->set_rules('first_name','Nome','trim|required|min_length[4]|max_length[45]');
		$this->form_validation->set_rules('last_name','Sobrenome','trim|required|min_length[4]|max_length[45]');
		$this->form_validation->set_rules('email','E-mail','trim|required|min_length[4]|max_length[100]|valid_email|callback_valida_email');
		$this->form_validation->set_rules('password','Senha','trim|required|min_length[4]|max_length[200]');
		$this->form_validation->set_rules('confirm_password','Confirmação de Senha','trim|required|matches[password]');

		//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
		error_reporting(E_WARNING);
		ini_set("display_errors", 1 );

		if($this->form_validation->run()){
			//Captura dados do formulário
			$identify=NULL;
			$password=$this->input->post('password');
			$email=$this->input->post('email');
			$additional_data = array(
				'username' => $this->input->post('first_name').$this->input->post('last_name'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				
			);
			$group = array(1);

			// echo "<pre>";
			// print_r($additional_data);
			// exit();

			if($this->ion_auth->register($identify, $password, $email, $additional_data, $group)){
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', $this->ion_auth->errors());
			}
			redirect('restrita/usuarios');
		}else{
			$data = array(
				'titulo' => 'Administradores',
				'subtitulo' => 'Cadastrar Administradores'
			);

			$this->load->view('restrita/template/header', $data);
			$this->load->view('restrita/usuarios/cadastrar');
			$this->load->view('restrita/template/footer');
		}

	}

	public function valida_email($email){
		$usuario_id=$this->input->post('usuario_id');

		if(!$usuario_id){
			//Cadastrando
			if($this->core_model->getby('users', array('email'=>$email))){
				$this->form_validation->set_message('valida_email', 'Esse e-mail já existe!');
				return FALSE;
			}else{
				return TRUE;
			}

		}else{
			//Editando
			if($this->core_model->getby('users', array('email'=>$email, 'id !=' =>$usuario_id))){
				$this->form_validation->set_message('valida_email', 'Esse e-mail já existe!');
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}

	public function valida_usuario($username){
		$usuario_id=$this->input->post('usuario_id');

		if(!$usuario_id){
			//Cadastrando
			if($this->core_model->getby('users', array('username'=>$username))){
				$this->form_validation->set_message('valida_usuario', 'Esse usuário já existe!');
				return FALSE;
			}else{
				return TRUE;
			}

		}else{
			//Editando
			if($this->core_model->getby('users', array('username'=>$username, 'id !=' =>$usuario_id))){
				$this->form_validation->set_message('valida_usuario', 'Esse usuário já existe!');
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}

	public function delete($usuario_id=NULL){
		//Cast no usuário id
		$usuario_id=(int) $usuario_id;

		//Verifica se um usuário existe
		if(!$usuario_id || !$this->ion_auth->user($usuario_id)->row()){
			$this->session->set_flashdata('erro', 'O usuário não foi encontrado!');
			redirect('restrita/usuarios');
		}else{
			//Deleta usuário
			if($this->ion_auth->delete_user($usuario_id)){
				$this->session->set_flashdata('sucesso', 'Usuário deletado com sucesso!');
			}else{
				$this->session->set_flashdata('erro', $this->ion_auth->errors());
			}
			
			//Volta para a lista de usuários
			redirect('restrita/usuarios');
		}
	}

	public function atualizar($usuario_id=NULL){
		//Verifica se usuário a ser editado existe
		if(!$usuario = $this->ion_auth->user($usuario_id)->row()){
			$this->session->set_flashdata('erro', 'Usuário não foi encontrado');
			redirect('restrita/usuarios');
		}else{
			//Validando dados do formulário após o POST
			$this->form_validation->set_rules('first_name','Nome','trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('last_name','Sobrenome','trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('email','E-mail','trim|required|min_length[4]|max_length[100]|valid_email');
			$this->form_validation->set_rules('password','Senha','trim|min_length[4]|max_length[200]');
			$this->form_validation->set_rules('confirm_password','Confirmação de Senha','trim|matches[password]');

			//Ignora erro presente na versão 3.1.7 do CodeIgniter com PHP > 5
			error_reporting(E_WARNING);
			ini_set("display_errors", 1 );

			if($this->form_validation->run()){

				$data=elements(
					array(
						'first_name',
						'last_name',
						'email',
						'password',
						'active'
					), $this->input->post()
				);

				$data['username']= $this->input->post('first_name').$this->input->post('last_name');

				//Verifica se usuário informou uma senha para ser alterada
				$password=$this->input->post('password');
				if (!$password){
					//Retira senha da array e não atualiza a senha
					unset($data['password']);
				}

				//Sanitizando o $data
				$data=html_escape($data);

				// print_r($data);
				// exit();

				//Verifica se dados foram atualizados com sucesso
				if ($this->ion_auth->update($usuario_id, $data)){
					$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
				}else{
					$this->session->set_flashdata('erro', $this->ion_auth->errors());
				}
				redirect('restrita/usuarios');

			}else{
				//Erro de validação
				$data = array(
				'titulo' => 'Administradores',
				'subtitulo' => 'Editar Administradores',
				'scripts' => array(
					'js/alerts.js'
				),
				'usuario' =>$usuario
				);

				$this->load->view('restrita/template/header', $data);
				$this->load->view('restrita/usuarios/editar');
				$this->load->view('restrita/template/footer');
			}
		}
	}
}