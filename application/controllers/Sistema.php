<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Sistema extends CI_Controller
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
            'titulo' => 'Sistema',
            'sistema' => $this->Core_model->get_by_id('sistema', array('sistema_id' => 1)),
        );

        /* 
            [sistema_id] => 1
            [sistema_razao_social] => 
            [sistema_nome_fantasia] => Conto & Bilancio
            [sistema_cnpj] => 02.507.588/0001-08
            [sistema_ie] => 
            [sistema_telefone_fixo] => 
            [sistema_telefone_movel] => 
            [sistema_email] => 
            [sistema_site_url] => 
            [sistema_cep] => 
            [sistema_endereco] => Via Veneto
            [sistema_numero] => 1778
            [sistema_cidade] => Curitiba
            [sistema_estado] => PR
            [sistema_txt_ordem_servico] => 
            [sistema_data_alteracao] => 2023-03-07 19:21:45
        */

        $this->load->view('layout/painel/header', $data);
        $this->load->view('painel/sistema/index');
        $this->load->view('layout/painel/footer');
    }
}
