<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Servicos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(
            'titulo' => 'Conto & Bilancio - Contabilidade Santa Felicidade Curitiba',
            'styles' => array(
                'css/website.css',
                'css/header.css',
                'css/servicos.css',
                'css/footer.css',
            ),
            'scripts' => array(
                'js/website_header.js',
            ),
        );

        $this->load->view('layout/website/header', $data);
        $this->load->view('website/servicos');
        $this->load->view('layout/website/footer');
    }

    public function assessoriacontabil()
    {
        echo 'Oi';
    }

    public function assessoriafiscaletributaria()
    {
        echo 'assessoriafiscaletributaria';
    }

    public function societario()
    {
        echo 'societario';
    }

    public function gestaorh()
    {
        echo 'gestaorh';
    }
}
