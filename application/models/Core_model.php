<?php
defined('BASEPATH') or exit('Ação não permitida!');

class Core_model extends CI_Model
{
	public function get_all($tabela = NULL, $condicao = NULL)
	{
		if ($tabela) {
			if (is_array($condicao)) {
				$this->db->where($condicao);
			}
			return $this->db->get($tabela)->result();
		} else {
			return FALSE;
		}
	}

	public function get_by_id($tabela = NULL, $condicao = NULL)
	{
		if ($tabela && is_array($condicao)) {
			$this->db->where($condicao);
			$this->db->limit(1);

			return $this->db->get($tabela)->row();
		} else {
			return FALSE;
		}
	}

	public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL)
	{
		if ($tabela && is_array($data)) {

			$this->db->insert($tabela, $data);

			if ($get_last_id) {
				$this->session->set_userdata('last_id', $this->db->insert_id());
			}

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
			} else {
				$this->session->set_flashdata('error', 'Erro ao salvar dados');
			}
		} else {
			return FALSE;
		}
	}

	public function update($tabela = NULL, $data = NULL, $condicao = NULL)
	{
		if ($tabela && is_array($data) && is_array($condicao)) {
			if ($this->db->update($tabela, $data, $condicao)) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
			} else {
				$this->session->set_flashdata('error', 'Erro ao atualizar os dados');
			}
		} else {
			return FALSE;
		}
	}
}
