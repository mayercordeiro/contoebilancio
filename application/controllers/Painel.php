<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Painel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('layout/painel/header');
		$this->load->view('layout/painel/sidebar');
		$this->load->view('painel/index');
		$this->load->view('layout/painel/footer');
	}
}
