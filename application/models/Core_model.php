<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Core_model extends CI_Model
{

	public function getall($tabela, $condicoes = NULL, $select = NULL, $orderBy = NULL, $fieldOrderBy = NULL, $limit = NULL)
	{
		if ($select) {
			$this->db->select($select);
		}

		if ($condicoes) {
			$this->db->where($condicoes);
		}

		if ($orderBy) {
			$this->db->order_by($fieldOrderBy, $orderBy);
		}
		
		if ($limit) {
			$this->db->limit($limit);
		}

		return $this->db->get($tabela)->result();
	}

	public function getby($tabela, $condicoes, $select = NULL)
	{
		if ($select) {
			$this->db->select($select);
		}

		$this->db->where($condicoes);

		return $this->db->get($tabela)->row();
	}

	public function cadastrar($tabela, $data)
	{
		$dbname = $this->db->database;
		$query = $this->db->query("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = '$tabela' and table_schema = '$dbname'")->result();
		foreach ($query as $q) {
			$id = $q->auto_increment;
		}
		if ($this->db->insert($tabela, $data)) {
			return $id;
		} else {
			return FALSE;
		}
	}

	public function editar($tabela, $condicoes = NULL, $data)
	{
		if ($condicoes) {
			$this->db->where($condicoes);
		}
		return $this->db->update($tabela, $data);
	}

	public function deletar($tabela, $condicoes = NULL)
	{
		if ($condicoes) {
			$this->db->where($condicoes);
		}
		return $this->db->delete($tabela);
	}

	public function cont_all_result($tabela, $condicoes = NULL)
	{
		if ($condicoes) {
			$this->db->where($condicoes);
		}
		$this->db->select('count(id) as qtd');
		return $this->db->get($tabela)->row();
	}
}
