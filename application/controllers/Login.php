<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Login extends CI_Controller
{
    public function index()
    {
        $data = array(
            'titulo' => 'Login',
        );

        $this->load->view('layout/painel/header', $data);
        $this->load->view('/painel/login/index');
        $this->load->view('layout/painel/footer');
    }

    public function auth()
    {
        // echo '<pre>';
        // print_r($this->input->post());
        // exit();

        $identity = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $remember = FALSE;

        if ($this->ion_auth->login($identity, $password, $remember)) {
            redirect('painel');
        } else {
            $this->session->set_flashdata('error', 'Email e/ou senha incorreto(s)');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('login');
    }
}
