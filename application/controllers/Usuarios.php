<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
			exit('Usuário não encontrado');
		} else {
			$data = array(
				'titulo' => 'Editar Usuário',
				'usuario' => $this->ion_auth->user($user_id)->row(),
				'perfil_usuario' => $this->ion_auth->get_users_groups($user_id)->row(),
			);

			/* 
				Array
				(
				[first_name] => Usuário
				[last_name] => Um
				[email] => user1@gmail.com
				[username] => usuario1
				[active] => 1
				[perfil_usuario] => 2
				[password] => 
				[confirm_password] => 
				[usuario_id] => 3
				)
			*/
		}

		$this->load->view('layout/painel/header', $data);
		$this->load->view('painel/usuarios/edit');
		$this->load->view('layout/painel/footer');
	}
}
