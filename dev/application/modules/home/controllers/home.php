<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('home_model');
        $this->layout->setLayout('template-content');
        
		//boorrar
        //$this->session->set_userdata('id_solitantes', 2);
        //$this->session->set_userdata('id_difuntos', 1);
    }

    function index() {

        $data['bloque_nicho'] = $this->home_model->getBloqueNicho();
        $data['bloque_mausoleo'] = $this->home_model->getBloqueMausoleo();
        $data['bloque_cremado'] = $this->home_model->getBloqueCremado();
        $data['bloque_bajo_tierra'] = $this->home_model->getBloqueBajoTierra();
        $this->layout->view('index', $data);
    }

    function showFormAddNichoBloque($id) {
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        $id_difunto = (int) $this->session->userdata('id_difuntos');
        
        if(!empty($id_solicitante)){
            if(!empty($id_difunto)){
                $data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id);
                //$data['nicho_info'] = $this->home_model->getBloqueNicho();
                $this->load->view('AddNichoBloque', $data);
            }
            else{
                $this->load->view('ErrorDifunto');
            }
        }
        else{
            $this->load->view('ErrorSolicitante');
        }      
    }
	
	function showFormAddExhumarBloque($id) {    
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        if(!empty($id_solicitante)){
                $data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id);
                $this->load->view('AddExhumacionesBloque', $data);
        }
        else{
            $this->load->view('ErrorSolicitante');
        }      
    }
	
	function AddTramiteNicho(){	
        $data['id_bloque'] = $_POST['id_bloque'];
		$data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
		$data['id_difunto'] = (int) $this->session->userdata('id_difuntos');
		$data['tramite'] = $_POST['tramite'];
		$data['bloque'] = "Nicho";
        $data['piso'] = $_POST['piso'];
        $data['lado'] = $_POST['lado'];
        $data['nro_nicho'] = $_POST['numeroNicho'];
        $data['clase'] = $_POST['clase'];
        $data['tiempo'] = $_POST['tiempo'];
        $data['tipo_nicho'] = $_POST['tipo'];
        //$data['fecha_tramite'] = $_POST['fechaTramite'];
        $data['costo'] = $_POST['costo'];
		$data['pagado'] = 0;
		
        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0){
           
			$datas = array(
               'estado' => 'Ocupado',
               'id_difunto' => (int) $this->session->userdata('id_difuntos')
            );
			$this->home_model->updateNichoStatus($_POST['numeroNicho'],$datas);
            //$this->session->set_userdata('id_tramite', $d);
			$this->session->set_userdata('id_solitantes', 0);
			$this->session->set_userdata('id_difuntos', 0);
			 echo "true";
        }            
        else
            echo "false";
	}
	
	function AddTramiteNichoExumacion(){	
		
		//buscar difunto
		 $difunto = $this->home_model->seacrhDifunto($_POST['numeroNicho']);
		
        $data['id_bloque'] = $_POST['id_bloque'];
		$data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
		$data['id_difunto'] = $difunto;
		$data['tramite'] = $_POST['tramite'];
		$data['bloque'] = "Nicho";
        $data['piso'] = $_POST['piso'];
        $data['lado'] = $_POST['lado'];
        $data['nro_nicho'] = $_POST['numeroNicho'];
        $data['tipo_nicho'] = $_POST['tipo'];
        //$data['fecha_tramite'] = $_POST['fechaTramite'];
        $data['costo'] = $_POST['costo'];
		$data['pagado'] = 0;
		
        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0){    
			$this->session->set_userdata('id_solitantes', 0);
			$this->session->set_userdata('id_difuntos', 0);			 
			echo "true";
        }            
        else
            echo "false";
	}

    function getNichoslibres() {
        $id = $_POST['idBloque'];
        $lado = $_POST['lado'];
		$piso= $_POST['piso'];

        $data['nicho_info'] = $this->home_model->getBloqueNichoLibres($id, $lado, $piso);

        echo json_encode($data);
    }
	
	function getNichosOcupados() {
        $id = $_POST['idBloque'];
        $lado = $_POST['lado'];
		$piso= $_POST['piso'];

        $data['nicho_info'] = $this->home_model->getBloqueNichoOcupados($id, $lado, $piso);

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
        $d = $this->home_model->addSolicitante($data);
        if ($d > 0){          
            $this->session->set_userdata('id_solitantes', $d);
			 echo "true";
        }            
        else
            echo "false";
    }

    function showFormDifunto() {
        $this->load->view('AddDifunto');
    }

    function showFormAddDifuncto() {
        $data['oficialia'] = $_POST['oficialia'];
        $data['libro'] = $_POST['libro'];
        $data['partida'] = $_POST['partida'];
        $data['folioNum'] = $_POST['folioNum'];
        $data['departamento'] = $_POST['departamento'];
        $data['provincia'] = $_POST['provincia'];
        $data['fechaPartida'] = $_POST['fechaPartida'];
        $data['nombreCompletoFallecido'] = $_POST['nombreCompletoFallecido'];
        $data['edadFallecido'] = $_POST['edadFallecido'];
        $data['fechaFallecido'] = $_POST['fechaFallecido'];
        $data['localidadFallecido'] = $_POST['localidadFallecido'];
        $data['provinciaFallecido'] = $_POST['provinciaFallecido'];
        $data['departamentoFallecido'] = $_POST['departamentoFallecido'];
        $data['paisFallecido'] = $_POST['paisFallecido'];
        $data['comprobante'] = $_POST['comprobante'];
        $data['matricula_ci'] = $_POST['matricula_ci'];
        $data['nombreCompletoInscripcion'] = $_POST['nombreCompletoInscripcion'];
        $data['ciInscripcion'] = $_POST['ciInscripcion'];
        $data['relacionConDifunto'] = $_POST['relacionConDifunto'];
        $data['nota'] = $_POST['nota'];
        
        $d = $this->home_model->addDifunto($data);

        if ($d > 0){          
            $this->session->set_userdata('id_difuntos', $d);
			 echo "true";
        }            
        else
            echo "false";
    }

    function showFormAddExhumacionesBloque() {
        $this->load->view('AddExhumacionesBloque');
    }

    function showFormAddExhumacionesTierra() {
        $this->load->view('AddExhumacionesTierra');
    }

    function showFormAddLapidaBloque($id) {
	     $id_solicitante = (int) $this->session->userdata('id_solitantes');
        //$id_difunto = (int) $this->session->userdata('id_difuntos');
        
        if(empty($id_solicitante)){
                $data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id);
                //$data['nicho_info'] = $this->home_model->getBloqueNicho();
                $this->load->view('AddLapidaBloque', $data);
        }
        else{
            $this->load->view('ErrorSolicitante');
        }     
    }
	
	function AddTramiteNichoLadpida(){	
		
		//buscar difunto
		 $difunto = $this->home_model->seacrhDifunto($_POST['numeroNicho']);
		
        $data['id_bloque'] = $_POST['id_bloque'];
		$data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
		$data['id_difunto'] = $difunto;
		$data['tramite'] = $_POST['tramite'];
		$data['bloque'] = "Nicho";
        $data['piso'] = $_POST['piso'];
        $data['lado'] = $_POST['lado'];
		$data['clase'] = $_POST['clase'];
        $data['nro_nicho'] = $_POST['numeroNicho'];;
        $data['costo'] = $_POST['costo'];
		$data['pagado'] = 0;
		
        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0){    
			$this->session->set_userdata('id_solitantes', 0);
			$this->session->set_userdata('id_difuntos', 0);			 
			echo "true";
        }            
        else
            echo "false";
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
