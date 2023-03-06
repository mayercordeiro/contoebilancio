<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			redirect('login/index');
		}
	}

	public function index()
	{
		$data = array(
			'titulo' => 'Usuários Cadastrados',
			'styles' => array(
				'vendor/datatables/dataTables.bootstrap4.min.css',
			),
			'scripts' => array(
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js',
			),
			'usuarios' => $this->ion_auth->users()->result(),
		);

		$this->load->view('layout/painel/header', $data);
		$this->load->view('painel/usuarios/index');
		$this->load->view('layout/painel/footer');
	}

	public function edit($user_id = NULL)
	{
		if (!$user_id || !$this->ion_auth->user($user_id)->row()) {

			$this->session->set_flashdata('error', 'Usuário não encontrado');
			redirect('usuarios');
		} else {

			$this->form_validation->set_rules('first_name', 'nome', 'trim|required');
			$this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email_check');
			$this->form_validation->set_rules('username', 'usuário', 'trim|required|callback_username_check');
			$this->form_validation->set_rules('password', 'senha', 'min_length[6]|max_length[255]');
			$this->form_validation->set_rules('confirm_password', 'confirme sua senha', 'matches[password]');

			if ($this->form_validation->run()) {

				$data = elements(
					array(
						'first_name',
						'last_name',
						'email',
						'username',
						'active',
						'password',
					),

					$this->input->post()
				);

				$data = $this->security->xss_clean($data);

				// Verifica se o password foi passado
				$password = $this->input->post('password');

				if (!$password) {
					unset($data['password']);
				}
				//

				if ($this->ion_auth->update($user_id, $data)) {
					$perfil_usuario_db = $this->ion_auth->get_users_groups($user_id)->row();
					$perfil_usuario_post = $this->input->post('perfil_usuario');

					// Se for diferente, atualiza o perfil do usuário
					if ($perfil_usuario_post != $perfil_usuario_db->id) {
						$this->ion_auth->remove_from_group($perfil_usuario_db->id, $user_id);
						$this->ion_auth->add_to_group($perfil_usuario_post, $user_id);
					}

					$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
				} else {
					$this->session->set_flashdata('error', 'Erro ao atualizar os dados');
				}

				redirect('usuarios');
			} else {
				$data = array(
					'titulo' => 'Editar Usuário',
					'usuario' => $this->ion_auth->user($user_id)->row(),
					'perfil_usuario' => $this->ion_auth->get_users_groups($user_id)->row(),
				);

				$this->load->view('layout/painel/header', $data);
				$this->load->view('painel/usuarios/edit');
				$this->load->view('layout/painel/footer');
			}
		}
	}

	public function add()
	{
		$this->form_validation->set_rules('first_name', 'nome', 'trim|required');
		$this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'usuário', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'senha', 'required|min_length[6]|max_length[255]');
		$this->form_validation->set_rules('confirm_password', 'confirme sua senha', 'matches[password]');

		if ($this->form_validation->run()) {

			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'active' => $this->input->post('active'),
			);
			$group = array($this->input->post('perfil_usuario'));

			$additional_data = $this->security->xss_clean($additional_data);
			$group = $this->security->xss_clean($group);

			if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
				$this->session->set_flashdata('sucesso', 'Usuário adicionado com sucesso');
			} else {
				$this->session->set_flashdata('error', 'Erro ao adicionar usuário');
			}

			redirect('usuarios');
		} else {
			$data = array(
				'titulo' => 'Adicionar Usuário',
			);

			$this->load->view('layout/painel/header', $data);
			$this->load->view('painel/usuarios/add');
			$this->load->view('layout/painel/footer');
		}
	}

	public function del($user_id = NULL)
	{
		if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
			$this->session->set_flashdata('error', 'Usuário não encontrado');
			redirect('usuarios');
		}

		if ($this->ion_auth->is_admin($user_id)) {
			$this->session->set_flashdata('error', 'Ação não permitida, este usuário é um administrador');
			redirect('usuarios');
		}

		if ($this->ion_auth->delete_user($user_id)) {
			$this->session->set_flashdata('sucesso', 'Usuário excluído com sucesso');
			redirect('usuarios');
		} else {
			$this->session->set_flashdata('error', 'Ação não permitida');
			redirect('usuarios');
		}
	}

	public function email_check($email)
	{
		$usuario_id = $this->input->post('usuario_id');

		if ($this->Core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {

			$this->form_validation->set_message('email_check', 'Email já cadastrado.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function username_check($username)
	{
		$usuario_id = $this->input->post('usuario_id');

		if ($this->Core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {

			$this->form_validation->set_message('username_check', 'Usuário já cadastrado.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
