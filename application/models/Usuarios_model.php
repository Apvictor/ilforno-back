<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function valida_usuario($email)
	{
		$this->db->where(array('status' => 1, 'email' => $email));
		return $this->db->get('clientes')->result();
	}

	public function verifica_usuario($email)
	{
		$this->db->where(array('status' => 1, 'email' => $email));
		return $this->db->get('clientes')->row();
	}

	public function login_usuario($email, $senha)
	{
		if (empty($email) || empty($senha)) {
			return FALSE;
		} else {
			$this->db->select('id, nome, email');
			$this->db->where(array('email' => $email, 'senha' => md5($senha)));
			if ($usuario = $this->db->get('clientes')->row()) {
				return $usuario;
			} else {
				return FALSE;
			}
		}
	}

	public function valida_senha_atual($id, $senha)
	{
		$this->db->where(array('id' => $id, 'senha' => md5($senha)));
		return $this->db->get('clientes')->result();
	}

	public function exibe_usuario($id)
	{
		$this->db->select('id, email, cliente_user_id');
		$this->db->where('id', $id);
		return $this->db->get('clientes')->row();
	}

	public function valida_email($email)
	{
		$this->db->where('email', $email);
		$this->db->select('id, email');
		return $this->db->get('clientes')->row();
	}

	public function redefinir_senha($usuario_id, $senha)
	{
		$data['senha'] = md5($senha);
		$this->db->where('id', $usuario_id);
		if ($this->db->update('clientes', $data)) {
			return $this->db->delete('recuperacao', array('cliente_id' => $usuario_id));
		} else {
			return false;
		}
	}

	public function editar($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('clientes', $data);
	}

	public function cria_token($data)
	{
		$hoje = date('Y-m-d H:i:s');

		//Higieniza tabela
		$this->db->delete('tokens', array('expira <' => $hoje));

		//Verifica se existe token valido
		$this->db->where(array('usuario_id' => $data['usuario_id'], 'expira >=' =>  $hoje));

		$token_exist = $this->db->get('tokens')->row();

		if (!$token_exist) {
			//Se não existir token valido, cria um e retorna
			if ($this->db->insert('tokens', $data)) {
				$this->db->where(array('usuario_id' => $data['usuario_id'], 'expira >=' =>  $hoje));
				return $this->db->get('tokens')->row();
			} else {
				return FALSE;
			}
			//Se existir token valido retorna ele
		} else {
			$this->db->where(array('usuario_id' => $data['usuario_id'], 'expira >=' =>  $hoje));
			return $this->db->get('tokens')->row();
		}
	}

	public function valida_token($token)
	{
		$this->db->where(array('token' => $token, 'expira >=' => date('Y-m-d H:i:s')));
		return $this->db->get('tokens')->row();
	}

	public function valida_token_exist($token)
	{
		$this->db->where('token', $token);
		return $this->db->get('tokens')->row();
	}

	public function logout($token)
	{
		$this->db->where('token', $token);
		if ($this->db->get('tokens')->row()) {
			return $this->db->delete('tokens', array('token' => $token));
		} else {
			return false;
		}
	}
}
