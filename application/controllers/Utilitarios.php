<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Utilitarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');
            redirect('login/index');
        }
    }

    public function index()
    {
        $data = array(
            'titulo' => 'Utilitários',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'utilitarios' => $this->Core_model->get_all('utilitarios'),
        );

        $this->load->view('layout/painel/header', $data);
        $this->load->view('painel/utilitarios/index');
        $this->load->view('layout/painel/footer');
    }
}
