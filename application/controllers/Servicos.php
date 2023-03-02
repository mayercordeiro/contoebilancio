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
            'utilitarios' => $this->Utilitarios_model->get_all('utilitarios'),
        );

        $this->load->view('layout/website/header', $data);
        $this->load->view('website/servicos');
        $this->load->view('layout/website/footer');
    }

    public function assessoriacontabil()
    {
        $data = array(
            'titulo' => 'Conto & Bilancio - Assessoria Contábil',
            'styles' => array(
                'css/website.css',
                'css/header.css',
                'css/servicos_item.css',
                'css/footer.css',
            ),
            'scripts' => array(
                'js/website_header.js',
            ),
            'utilitarios' => $this->Utilitarios_model->get_all('utilitarios'),
        );

        $this->load->view('layout/website/header', $data);
        $this->load->view('website/assessoria_contabil');
        $this->load->view('layout/website/footer');
    }

    public function assessoriafiscaletributaria()
    {
        $data = array(
            'titulo' => 'Conto & Bilancio - Assessoria Fiscal e Tributária',
            'styles' => array(
                'css/website.css',
                'css/header.css',
                'css/servicos_item.css',
                'css/footer.css',
            ),
            'scripts' => array(
                'js/website_header.js',
            ),
            'utilitarios' => $this->Utilitarios_model->get_all('utilitarios'),
        );

        $this->load->view('layout/website/header', $data);
        $this->load->view('website/fiscal_tributaria');
        $this->load->view('layout/website/footer');
    }

    public function societario()
    {
        $data = array(
            'titulo' => 'Conto & Bilancio - Societário',
            'styles' => array(
                'css/website.css',
                'css/header.css',
                'css/servicos_item.css',
                'css/footer.css',
            ),
            'scripts' => array(
                'js/website_header.js',
            ),
            'utilitarios' => $this->Utilitarios_model->get_all('utilitarios'),
        );

        $this->load->view('layout/website/header', $data);
        $this->load->view('website/societario');
        $this->load->view('layout/website/footer');
    }

    public function gestaorh()
    {
        $data = array(
            'titulo' => 'Conto & Bilancio - Gestão de Recursos Humanos',
            'styles' => array(
                'css/website.css',
                'css/header.css',
                'css/servicos_item.css',
                'css/footer.css',
            ),
            'scripts' => array(
                'js/website_header.js',
            ),
            'utilitarios' => $this->Utilitarios_model->get_all('utilitarios'),
        );

        $this->load->view('layout/website/header', $data);
        $this->load->view('website/gestaorh');
        $this->load->view('layout/website/footer');
    }
}
