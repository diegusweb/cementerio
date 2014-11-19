<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('home_model');
        $this->layout->setLayout('template-content');
    }

    function index() {

        $data['bloque_nicho'] = $this->home_model->getBloqueNicho();
        $this->layout->view('index', $data);
    }

    function showFormAddNichoBloque($id) {
        //$id = $_POTS['id_bloque'];

        $data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id);
        $data['nicho_info'] = $this->home_model->getBloqueNicho();

        $this->load->view('AddNichoBloque', $data);
    }

    function getNichoslibres() {
        $id = $_POST['idBloque'];
        $lado = $_POST['lado'];

        $data['nicho_info'] = $this->home_model->getBloqueNichoLibres($id, $lado);

        echo json_encode($data);
    }

    //form solicitante
    function showFormSolicitante() {
        $this->load->view('AddSolicitante');
    }

    function addSolicitante() {
        $data['nombre'] = $_POST['nombre'];
        $data['apellido'] = $_POST['apellido'];
        $data['ci'] = $_POST['ci'];
        $data['direccion'] = $_POST['direccion'];
        $data['actividad'] = $_POST['actividad'];
        $data['numero_casa'] = $_POST['numeroDomicilio'];
        $data['manzana'] = $_POST['manzana'];
        $data['nit'] = $_POST['nit'];
        $data['telefono'] = $_POST['telefono'];
        $data['celular'] = $_POST['celular'];
        // $data['usuario_id_usuario'] = $_POST['id_usuario'];

        if ($this->home_model->addSolicitante($data))
            echo "true";
        else
            echo "false";
    }

    function showFormDifunto() {
        $this->load->view('AddDifunto');
    }

    function showFormAddSolicitante() {
        //$this->load->view('formaddNicho');
    }

    function showFormAddExhumacionesBloque() {
        $this->load->view('AddExhumacionesBloque');
    }

    function showFormAddExhumacionesTierra() {
        $this->load->view('AddExhumacionesTierra');
    }

    function showFormAddLapidaBloque() {
        $this->load->view('AddLapidaBloque');
    }

    function showFormRenovacionNicho() {
        $this->load->view('AddRenovacionNicho');
    }

    function showFormAutorizacionContrCripta() {
        $this->load->view('AddContruccionCripta');
    }

    function showFormCremaciones() {
        $this->load->view('AddCremaciones');
    }

    function showFormIngresarSitioTierra() {
        $this->load->view('AddSitioTierra');
    }

    function showFormbloqueCremados() {
        $this->load->view('AddBloqueCremados');
    }

}
