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
        $bloque['alarma'] = $this->reportes_model->getAlarmaNicho();
        $this->layout->view('tabla', $bloque);
    }

    public function verifyLogin() {
        $user_id = $this->session->userdata('username');
        if (empty($user_id)) {
            redirect(base_url() . "login", 'outside');
        }
    }

    public function showReportes() {
        $fechaInicio = (isset($_POST['fechaInicio'])) ? $_POST['fechaInicio'] : "";
        $fechaFin = (isset($_POST['fechaFin'])) ? $_POST['fechaFin'] : "";
        $funcionario = (isset($_POST['funcionario'])) ? $_POST['funcionario'] : "";

        $this->session->set_userdata('fechaInicio', $fechaInicio);
        $this->session->set_userdata('fechaFin', $fechaFin);
        $this->session->set_userdata('funcionario', $funcionario);

        $bloque['alarma'] = $this->reportes_model->getAlarmaNicho();
        $bloque['tramite'] = $this->reportes_model->infoBloqueNicho($fechaInicio, $fechaFin, $funcionario);

        $this->layout->view('tabla', $bloque);
    }

    public function getFuncionarios() {
        $bloque['users'] = $this->reportes_model->getFuncionarios();
        echo json_encode($bloque);
    }

    public function showSolicitante($id) {
        $data['info'] = $this->reportes_model->getInfoSol($id);
        // $data['difuntos_info'] = $this->home_model->getDifuntosSitioTierra($id);
        $this->load->view('solicitud', $data);
    }

    public function showDifunto($id) {
        $data['info'] = $this->reportes_model->getInfoDifunto($id);
        // $data['difuntos_info'] = $this->home_model->getDifuntosSitioTierra($id);
        $this->load->view('difunto', $data);
    }

    function exportCheckedApplicants() {

        $fechaInicio = $this->session->userdata('fechaInicio');
        $fechaFin = $this->session->userdata('fechaFin');
        $funcionario = $this->session->userdata('funcionario');

        $data['tramite'] = $this->reportes_model->infoBloqueTramites();
        if ($fechaInicio != "" || $fechaFin != "" || $funcionario != "")
            $data['tramite'] = $this->reportes_model->infoBloqueNicho($fechaInicio, $fechaFin, $funcionario);
        else
            $bloque['tramite'] = $this->reportes_model->infoBloqueTramites();

        $data['title'] = "Reporte";
        $data['filename'] = "Reportes-cementerio.xls";

        $this->load->view('exportTabla', $data);
    }

}
