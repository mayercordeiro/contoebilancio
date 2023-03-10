<?php

defined('BASEPATH') or exit('Ação não permitida!');

class SobreNos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('button');
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
			'botoes' => array(
				'botao_sobrenos' => button('Explore Mais', '#linkExploreMais')
			),
		);

		$this->load->view('layout/website/header', $data);
		$this->load->view('website/sobre-nos');
		$this->load->view('layout/website/footer');
	}
}
