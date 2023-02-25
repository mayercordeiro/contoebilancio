<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Utilitarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data['urls'] = $this->Utilitarios_model->get_all('utilitarios');

        echo '<pre>';
        var_dump($data);
        die();
    }
}
