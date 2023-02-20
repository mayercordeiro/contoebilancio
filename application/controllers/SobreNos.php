<?php

defined('BASEPATH') or exit('Ação não permitida!');

class SobreNos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$data = array(
			'titulo' => 'Conto & Bilancio - Sobre Nós',
			'styles' => array(
				'css/website.css',
				'css/header.css',
				'css/footer.css',
			),
			'scripts' => array(
				'js/website_header.js',
			),
		);

		$this->load->view('website/header', $data);
		$this->load->view('website/sobre-nos');
		$this->load->view('website/footer');
	}
}
