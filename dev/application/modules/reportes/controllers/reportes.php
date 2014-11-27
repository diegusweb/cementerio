<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('reportes_model');
        $this->layout->setLayout('template-content');

        //boorrar
        //$this->session->set_userdata('id_solitantes', 2);
        //$this->session->set_userdata('id_difuntos', 1);

        $this->verifyLogin();
    }

    function index() {
        $bloque['tramite'] = $this->reportes_model->infoBloqueTramites();
        $this->layout->view('tabla', $bloque);
    }

    public function verifyLogin() {
        $user_id = $this->session->userdata('username');
        if (empty($user_id)) {
            redirect(base_url() . "login", 'outside');
        }
    }

    public function showReportes() {
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $funcionario = $_POST['funcionario'];

        $bloque['tramite'] = $this->reportes_model->infoBloqueNicho($fechaInicio, $fechaFin, $funcionario);
        
        $this->layout->view('tabla', $bloque);
    }

    public function getFuncionarios() {
        $bloque['users'] = $this->reportes_model->getFuncionarios();
        echo json_encode($bloque);
    }

}
