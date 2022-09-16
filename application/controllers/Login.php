<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		if (!$this->ion_auth->logged_in()) {
			$data = array(
				'titulo' => 'Área de login'
			);
			$this->load->view('restrita/login/index', $data);
		} else {
			redirect('restrita/home');
		}
	}

	public function auth()
	{
		$identify = $this->input->post('email');
		$password = $this->input->post('password');
		$remember = ($this->input->post('remember' ? TRUE : FALSE));


		if ($this->ion_auth->login($identify, $password, $remember)) {

			$this->session->set_flashdata('sucesso', 'Seja bem vindo(a)!');
			redirect('restrita/home');
		} else {
			$this->session->set_flashdata('erro', 'E-mail ou Senha incorretos!');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('login');
	}
}
