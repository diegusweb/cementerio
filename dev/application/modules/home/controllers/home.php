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
    
	function showFormAddNichoBloque()
	{
		$id = $_POTS['id_bloque'];
		
		$data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id_bloque_nicho);
		$data['nicho_info'] = $this->home_model->getBloqueNicho();
		$this->load->view('formaddNicho', $data);
	}
	
	function getNichoslibres(){
		$id = $_POTS['id_bloque'];
		$lado = $_POTS['lado'];
		
		$data['nicho_info'] = $this->home_model->getBloqueNichoLibres($id, $lado);
		
		echo json_encode($data);  
	}
	
	//form solicitante
	function showFormSolicitante()
	{
		$this->load->view('AddSolicitante');
	}
	
	function showFormAddSolicitante()
	{
		//$this->load->view('formaddNicho');
	}

	function showFormAddExhumacionesBloque()
	{
		$this->load->view('AddExhumacionesBloque');
	}
	
	function showFormAddExhumacionesTierra()
	{
		$this->load->view('AddExhumacionesTierra');
	}
	
	function showFormAddLapidaBloque()
	{
		$this->load->view('AddLapidaBloque');
	}
	
	function showFormRenovacionNicho()
	{
		$this->load->view('AddRenovacionNicho');
	}
	
	function showFormAutorizacionContrCripta()
	{
		$this->load->view('AddContruccionCripta');
	}
	
	function showFormCremaciones()
	{
		$this->load->view('AddCremaciones');
	}
	
	function showFormIngresarSitioTierra()
	{
		$this->load->view('AddSitioTierra');
	}
	
	function showFormDifunto()
	{
		$this->load->view('AddDifunto');
	}
	
	function showFormbloqueCremados()
	{
		$this->load->view('AddBloqueCremados');
	}
}    