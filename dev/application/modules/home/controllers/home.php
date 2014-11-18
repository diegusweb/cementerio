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
    
	function showFormAddNicho()
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
	
	function showFormAddMausoleo()
	{
		
	}
	
	function showFormAddLapida()
	{
		
	}
	
}    