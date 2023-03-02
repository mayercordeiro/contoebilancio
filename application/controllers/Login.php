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
            redirect('login/auth');
            echo '<pre>';
            var_dump($this->ion_auth->login($identity, $password, $remember));
            die();
        } else {
            $this->session->set_flashdata('error', 'Verifique seu email e/ou senha');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('Login');
    }
}
