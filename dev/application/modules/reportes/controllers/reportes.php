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
        $tramite = $this->reportes_model->infoBloqueTramites();
        $bloque['alarma'] = $this->reportes_model->getAlarmaNicho();
         //$tramite = $this->orderMultiDimensionalArray ($tramite, 'id_difunto');
        $bloquesd = array();
         foreach ($tramite as $row) {
             $bloques['id_tramite'] = $row['id_tramite'];
             $bloques['costo'] = $row['costo'];
             $bloques['bloque'] = $row['bloque'];
             $bloques['id_solicitante'] = $row['id_solicitante'];
             $bloques['id_difunto'] = $row['id_difunto'];
             $bloques['nombre'] = $row['nombre'];
             $bloques['apellido'] = $row['apellido'];
             $bloques['tramite'] = $row['tramite'];
             $bloques['fecha_tramite'] = $row['fecha_tramite'];
             $bloques['user_nombre'] = $row['user_nombre'];
             $bloques['user_apellido'] = $row['user_apellido'];
             $bloques['clase'] = $row['clase'];
             $bloques['tipo_nicho'] = $row['tipo_nicho'];
			 $bloques['nombre_difunto'] = $row['nombreCompletoFallecido'];
              if($row['nro_nicho'] > 0)
                $bloques['nro_nicho'] = $this->reportes_model->getNichoCompro($row['nro_nicho']);
             else
                $bloques['nro_nicho'] = "0";
             $bloques['bloque'] = $row['bloque'];
             $bloques['bloque_nombre'] = $row['bloque_nombre'];
             $bloques['lado'] = $row['lado'];
             $bloques['costo'] = $row['costo'];
       
             array_push($bloquesd, $bloques);
         }
         
         $bloque['tramite'] = $bloquesd;


        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        foreach ($bloque['tramite'] as $row) {
            $total1 = $row['costo'] + $total1;
            if($row['bloque'] == "Mausoleo"){
                $total2 = ($row['costo'] + 0) + $total2;
                $total3 = 0 + $total3;
            }
            else{
                $total2 = ($row['costo'] + 3) + $total2;
                 $total3 = 3 + $total3;
            }
        }

        $bloque['monto'] = $total1;
        $bloque['sumMonto'] = $total2;
        $bloque['sumBoleta'] = $total3;


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
        $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : "";
        $concepto = (isset($_POST['concepto'])) ? $_POST['concepto'] : "";

        $this->session->set_userdata('fechaInicio', $fechaInicio);
        $this->session->set_userdata('fechaFin', $fechaFin);
        $this->session->set_userdata('funcionario', $funcionario);
        $this->session->set_userdata('tipo', $tipo);
        $this->session->set_userdata('concepto', $concepto);

        $bloque['alarma'] = $this->reportes_model->getAlarmaNicho();
        $tramite = $this->reportes_model->infoBloqueNicho($fechaInicio, $fechaFin, $funcionario, $tipo, $concepto);
       // $tramite = sort($tramite);
                //----------------
        $bloquesd = array();
         foreach ($tramite as $row) {
             $bloques['id_tramite'] = $row['id_tramite'];
             $bloques['costo'] = $row['costo'];
             $bloques['bloque'] = $row['bloque'];
             $bloques['id_solicitante'] = $row['id_solicitante'];
             $bloques['id_difunto'] = $row['id_difunto'];
             $bloques['nombre'] = $row['nombre'];
             $bloques['apellido'] = $row['apellido'];
             $bloques['tramite'] = $row['tramite'];
             $bloques['fecha_tramite'] = $row['fecha_tramite'];
             $bloques['user_nombre'] = $row['user_nombre'];
             $bloques['user_apellido'] = $row['user_apellido'];
             $bloques['clase'] = $row['clase'];
             $bloques['tipo_nicho'] = $row['tipo_nicho'];
			 $bloques['nombre_difunto'] = $row['nombreCompletoFallecido'];
             if($row['nro_nicho'] > 0)
                $bloques['nro_nicho'] = $this->reportes_model->getNichoCompro($row['nro_nicho']);
             else
                $bloques['nro_nicho'] = "0";
             
             $bloques['bloque'] = $row['bloque'];
             $bloques['bloque_nombre'] = $row['bloque_nombre'];
             $bloques['lado'] = $row['lado'];
             $bloques['costo'] = $row['costo'];
       
             array_push($bloquesd, $bloques);
         }
         
         $bloque['tramite'] = $bloquesd;
        
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        foreach ($bloque['tramite'] as $row) {
            $total1 = $row['costo'] + $total1;
            if($row['bloque'] == "Mausoleo"){
                $total2 = ($row['costo'] + 0) + $total2;
                $total3 = 0 + $total3;
            }
            else{
                $total2 = ($row['costo'] + 3) + $total2;
                 $total3 = 3 + $total3;
            }
            
           
        }

        $bloque['monto'] = $total1;
        $bloque['sumMonto'] = $total2;
        $bloque['sumBoleta'] = $total3;

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
        $tipo = $this->session->userdata('tipo');
        $concepto = $this->session->userdata('concepto');

        //$data['tramite'] = $this->reportes_model->infoBloqueTramites();
        if ($fechaInicio != "" || $fechaFin != "" || $funcionario != "")
            $tramite = $this->reportes_model->infoBloqueNicho($fechaInicio, $fechaFin, $funcionario, $tipo, $concepto);
        else
            $tramite = $this->reportes_model->infoBloqueTramites();

        
        //----------------
        $bloquesd = array();
         foreach ($tramite as $row) {
             $bloques['id_tramite'] = $row['id_tramite'];
             $bloques['costo'] = $row['costo'];
             $bloques['bloque'] = $row['bloque'];
             $bloques['id_solicitante'] = $row['id_solicitante'];
             $bloques['id_difunto'] = $row['id_difunto'];
             $bloques['nombre'] = $row['nombre'];
             $bloques['apellido'] = $row['apellido'];
             $bloques['tramite'] = $row['tramite'];
             $bloques['fecha_tramite'] = $row['fecha_tramite'];
             $bloques['user_nombre'] = $row['user_nombre'];
             $bloques['user_apellido'] = $row['user_apellido'];
             $bloques['clase'] = $row['clase'];
             $bloques['tipo_nicho'] = $row['tipo_nicho'];
			 $bloques['nombre_difunto'] = $row['nombreCompletoFallecido'];
             if($row['nro_nicho'] > 0)
                $bloques['nro_nicho'] = $this->reportes_model->getNichoCompro($row['nro_nicho']);
             else
                $bloques['nro_nicho'] = "0";
             $bloques['bloque'] = $row['bloque'];
             $bloques['bloque_nombre'] = $row['bloque_nombre'];
             $bloques['lado'] = $row['lado'];
             $bloques['costo'] = $row['costo'];
       
             array_push($bloquesd, $bloques);
         }
         
         $data['tramite'] = $bloquesd;
        
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        foreach ($data['tramite'] as $row) {
            $total1 = $row['costo'] + $total1;
            if($row['bloque'] == "Mausoleo"){
                $total2 = ($row['costo'] + 0) + $total2;
                $total3 = 0 + $total3;
            }
            else{
                $total2 = ($row['costo'] + 3) + $total2;
                 $total3 = 3 + $total3;
            }
        }

        $data['monto'] = $total1;
        $data['sumMonto'] = $total2;
        $data['sumBoleta'] = $total3;


        $data['title'] = "Reporte";
        $data['filename'] = "Reportes-cementerio.xls";

        $this->load->view('exportTabla', $data);
    }

    public function reporteNicho() {
        $data['bloque'] = $this->reportes_model->getInfoBloque();
        $data['nicho'] = $this->reportes_model->getInfoNicho();

        $data['alarma'] = $this->reportes_model->getAlarmaNicho();

        $this->layout->view('nicho', $data);
    }

    public function ExportReporteNicho() {
        $data['bloque'] = $this->reportes_model->getInfoBloque();
        $data['nicho'] = $this->reportes_model->getInfoNicho();

        $data['alarma'] = $this->reportes_model->getAlarmaNicho();

        $data['title'] = "Reporte";
        $data['filename'] = "Reportes-nichos.xls";

        $this->load->view('exportNicho', $data);
    }
    
    function orderMultiDimensionalArray ($toOrderArray, $field, $inverse = false) {
        $position = array();
        $newRow = array();
        foreach ($toOrderArray as $key => $row) {
                $position[$key]  = $row[$field];
                $newRow[$key] = $row;
        }
        if ($inverse) {
            arsort($position);
        }
        else {
            asort($position);
        }
        $returnArray = array();
        foreach ($position as $key => $pos) {     
            $returnArray[] = $newRow[$key];
        }
        return $returnArray;
    }

}
