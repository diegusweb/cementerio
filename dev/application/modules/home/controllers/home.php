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
        ///$this->session->set_userdata('id_users', 2);
        $this->verifyLogin();
    }

    public function verifyLogin() {
        $user_id = $this->session->userdata('username');
        if (empty($user_id)) {
            redirect(base_url() . "login", 'outside');
        }
    }

    function index() {
        $data['bloque_nicho'] = $this->home_model->getBloqueNicho();
        $data['bloque_mausoleo'] = $this->home_model->getBloqueMausoleo();
        $data['bloque_cremado'] = $this->home_model->getBloqueCremado();
        $data['bloque_bajo_tierra'] = $this->home_model->getBloqueBajoTierra();
        $this->layout->view('index', $data);
    }
    
    function showDifuntoView()
    {
         if (empty($id_difunto)) {
              $this->load->view('ErrorDifunto');
         }
    }
    
    function showTRamiteView()
    {
         if (empty($id_difunto)) {
              $this->load->view('ErrorTramite');
         }
    }

    function showFormAddNichoBloque() {
	
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 1;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        $id_difunto = (int) $this->session->userdata('id_difuntos');		

        if (!empty($id_solicitante)) {
            if (!empty($id_difunto)) {
                $data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id);
                $this->load->view('AddNichoBloque', $data);
            } else { 
                $this->load->view('ErrorDifunto',$send);
            }
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    function showFormAddExhumarBloque() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 2;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id);
            $this->load->view('AddExhumacionesBloque', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    function AddTramiteNicho() {
        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = (int) $this->session->userdata('id_difuntos');
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Nicho";
        $data['bloque_nombre'] = $_POST['bloque'];
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
        if ($d > 0) {

            $datas = array(
                'estado' => 'Ocupado',
                'id_difunto' => (int) $this->session->userdata('id_difuntos')
            );
            $this->home_model->updateNichoStatus($_POST['numeroNicho'], $datas);
            //$this->session->set_userdata('id_tramite', $d);
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    function AddTramiteNichoExumacion() {

        //buscar difunto
        $difunto = $this->home_model->seacrhDifunto($_POST['numeroNicho']);

        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $difunto;
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Nicho";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['piso'] = $_POST['piso'];
        $data['lado'] = $_POST['lado'];
        $data['nro_nicho'] = $_POST['numeroNicho'];
        $data['tipo_nicho'] = $_POST['tipo'];
        //$data['fecha_tramite'] = $_POST['fechaTramite'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    function getNichoslibres() {
        $id = $_POST['idBloque'];
        $lado = $_POST['lado'];
        $piso = $_POST['piso'];

        $data['nicho_info'] = $this->home_model->getBloqueNichoLibres($id, $lado, $piso);

        echo json_encode($data);
    }

    function getNichosOcupados() {
        $id = $_POST['idBloque'];
        $lado = $_POST['lado'];
        $piso = $_POST['piso'];

        $data['nicho_info'] = $this->home_model->getBloqueNichoOcupados($id, $lado, $piso);

        echo json_encode($data);
    }

    //form solicitante
    function showFormSolicitante() {
		$send['id'] = $this->uri->segment(3);
		$send['form'] = $this->uri->segment(4);
		$send['pag'] = $this->uri->segment(5);
        $this->load->view('AddSolicitante',$send);
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
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', $d);
            echo $d;
        } else
            echo 0;
    }

    function showFormDifunto() {
		$send['id'] = $this->uri->segment(3);
		$send['form'] = $this->uri->segment(4);
		$send['pag'] = $this->uri->segment(5);
		
		//diego
		$sends = $this->home_model->getSolicitante((int)$this->session->userdata('id_solitantes'));
		$send['nombre'] = $sends[0]['nombre']." ".$sends[0]['apellido'];
		$send['ci'] = $sends[0]['ci'];
		
        $this->load->view('AddDifunto',$send);
    }

    function showFormAddDifuncto() {
        $data['oficialia'] = $_POST['oficialia'];
        $data['libro'] = $_POST['libro'];
        $data['partida'] = $_POST['partida'];
        $data['folioNum'] = $_POST['folioNum'];
        $data['departamento'] = $_POST['departamento'];
        $data['provincia'] = $_POST['provincia'];
        $data['localidad'] = $_POST['localidad'];
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

        if ($d > 0) {
            $this->session->set_userdata('id_difuntos', $d);
            echo $d;
        } else
            echo 0;
    }

    function showFormAddExhumacionesBloque() {
        $this->load->view('AddExhumacionesBloque');
    }

    function showFormAddExhumacionesTierra() {
        $this->load->view('AddExhumacionesTierra');
    }

    function showFormAddLapidaBloque() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 4;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        //$id_difunto = (int) $this->session->userdata('id_difuntos');

        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id);
            //$data['nicho_info'] = $this->home_model->getBloqueNicho();
            $this->load->view('AddLapidaBloque', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    function AddTramiteNichoLadpida() {

        //buscar difunto
        $difunto = $this->home_model->seacrhDifunto($_POST['numeroNicho']);

        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $difunto;
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Nicho";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['piso'] = $_POST['piso'];
        $data['lado'] = $_POST['lado'];
        $data['clase'] = $_POST['clase'];
        $data['nro_nicho'] = $_POST['numeroNicho'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    function showFormRenovacionNicho() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 3;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoBloqueNicho($id);
            $this->load->view('AddRenovacionNicho', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    function AddTramiteNichoRenovacion() {
        //buscar difunto
        $difunto = $this->home_model->seacrhDifunto($_POST['numeroNicho']);

        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $difunto;
        $data['tramite'] = utf8_encode($_POST['tramite']);
        $data['bloque'] = "Nicho";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['piso'] = $_POST['piso'];
        $data['lado'] = $_POST['lado'];
        $data['clase'] = $_POST['clase'];
        $data['nro_nicho'] = $_POST['numeroNicho'];
        $data['costo'] = $_POST['costo'];
        $data['tipo_nicho'] = $_POST['tipo'];

        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    function showFormAutorizacionContrCripta() {
        $this->load->view('AddContruccionCripta');
    }

    function AddTramiteNichoCremacion() {
        //buscar difunto
        $difunto = $this->home_model->seacrhDifunto($_POST['numeroNicho']);

        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $difunto;
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Nicho";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['piso'] = $_POST['piso'];
        $data['lado'] = $_POST['lado'];
        $data['nro_nicho'] = $_POST['numeroNicho'];
        $data['costo'] = $_POST['costo'];
        $data['tipo_nicho'] = $_POST['tipo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    function showFormIngresarSitioTierra() {
        $this->load->view('AddSitioTierra');
    }

    function showFormbloqueCremados() {
        $this->load->view('AddBloqueCremados');
    }

    //comprobante
    public function Comprobante($id_tarmite) {
        $tramite['tramite'] = $this->home_model->getTarmite($id_tarmite);

        $this->layout->view('Comprobante', $tramite);
    }

    public function conertirLetras() {
        $num = $_POST['letras'];

        $letras = strtoupper($this->enletras->ValorEnLetras($num, "Bs"));

        echo $letras;
    }

    //mausoleos
    public function showFormAddDMausoleo() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 5;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        $id_difunto = (int) $this->session->userdata('id_difuntos');

        if (!empty($id_solicitante)) {
            if (!empty($id_difunto)) {
                $datas = $this->home_model->getInfoMausoleo($id);

                //llenar tramite mausoleo
                $data['id_bloque'] = $datas[0]['id_bloque_mausoleo'];
                $data['id_users'] = (int) $this->session->userdata('id_users');
                $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
                $data['id_difunto'] = (int) $this->session->userdata('id_difuntos');
                $data['tramite'] = "Ingresar a Mausoleo";
                $data['bloque'] = "Mausoleo";
                $data['bloque_nombre'] = $datas[0]['nombre'];
                $data['tipo_nicho'] = "";
                $data['pagado'] = 0;

                $d = $this->home_model->addTramiteNicho($data);
                if ($d > 0) {
                    $this->session->set_userdata('id_solitantes', 0);
                    $this->session->set_userdata('id_difuntos', 0);
                    echo $d;
                } else
                    echo 0;
            } else {
                $this->load->view('ErrorDifunto',$send);
            }
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    public function showFormExhumarMausoleo() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 6;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');

        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoMausoleo($id);
            $data['difuntos_info'] = $this->home_model->getDifuntosMausoleo($id);

            $this->load->view('AddExhumacionesMausoleo', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    function AddTramiteMausoleoExumacion() {

        $dataa['status'] = 'inactivo';
        $d = $this->home_model->updateStatusDifunto($_POST['id_bloque'], $_POST['difunto'], "Mausoleo", $dataa);


        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $_POST['difunto'];
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Mausoleo";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['tipo_nicho'] = $_POST['tipo'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    public function showFormLapidaMausoleo() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 7;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');

        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoMausoleo($id);
            $data['difuntos_info'] = $this->home_model->getDifuntosMausoleo($id);

            $this->load->view('AddLapidaMausoleo', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    public function AddTramiteMausoleoLapida() {

        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $_POST['difunto'];
        $data['tramite'] = utf8_encode($_POST['tramite']);
        $data['bloque'] = "Mausoleo";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['clase'] = $_POST['clase'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    //cremados
    function showFormCremaciones() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 8;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        $id_difunto = (int) $this->session->userdata('id_difuntos');

        if (!empty($id_solicitante)) {
            if (!empty($id_difunto)) {
                $data['bloque_info'] = $this->home_model->getInfoCremado($id);

                $this->load->view('AddCremaciones', $data);
            } else {
                $this->load->view('ErrorDifunto',$send);
            }
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    public function AddTramiteCremacion() {
        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = (int) $this->session->userdata('id_difuntos');
        $data['tramite'] = utf8_encode($_POST['tramite']);
        $data['bloque'] = "Cremados";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['tipo_nicho'] = $_POST['tipo'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    public function showFormExhumarCremaciones() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 9;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');

        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoCremado($id);
            $data['difuntos_info'] = $this->home_model->getDifuntosCremados($id);

            $this->load->view('AddExhumacionesCremados', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    public function AddTramiteCremadosExumacion() {

        $dataa['status'] = 'inactivo';
        $d = $this->home_model->updateStatusDifunto($_POST['id_bloque'], $_POST['difunto'], "Cremados", $dataa);


        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $_POST['difunto'];
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Cremados";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['tipo_nicho'] = $_POST['tipo'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    public function showFormRenovarCremaciones() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 10;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');

        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoCremado($id);
            $data['difuntos_info'] = $this->home_model->getDifuntosCremados($id);

            $this->load->view('AddRenovarCremados', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    public function AddTramiteCremadosRenovar() {

        ///$dataa['status'] = 'inactivo';	
        //$d = $this->home_model->updateStatusDifunto($_POST['id_bloque'], $_POST['difunto'],"Cremados", $dataa);

        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $_POST['difunto'];
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Cremados";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['tipo_nicho'] = $_POST['tipo'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    //Ingresar Sitio tierra
    function showFormSitioTierra() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 11;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');
        $id_difunto = (int) $this->session->userdata('id_difuntos');

        if (!empty($id_solicitante)) {
            if (!empty($id_difunto)) {
                $data['bloque_info'] = $this->home_model->getInfoSitioTierra($id);

                $this->load->view('AddSitioTierra', $data);
            } else {
                $this->load->view('ErrorDifunto',$send);
            }
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    public function AddTramiteBajoTierra() {

        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = (int) $this->session->userdata('id_difuntos');
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Sitio Tierra";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['tipo_nicho'] = $_POST['tipo'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    public function showFormExhumarSitioTierra() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 12;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');

        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoSitioTierra($id);
            $data['difuntos_info'] = $this->home_model->getDifuntosSitioTierra($id);

            $this->load->view('AddExhumacionesTierra', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    public function AddTramiteSitioTierraExumacion() {

        $dataa['status'] = 'inactivo';
        $d = $this->home_model->updateStatusDifunto($_POST['id_bloque'], $_POST['difunto'], "Sitio Tierra", $dataa);


        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $_POST['difunto'];
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Sitio Tierra";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['tipo_nicho'] = $_POST['tipo'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    public function showFormRenovarSitioTierra() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 13;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');

        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoSitioTierra($id);
            $data['difuntos_info'] = $this->home_model->getDifuntosSitioTierra($id);

            $this->load->view('AddRenovarSitioTierra', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

    public function AddTramiteSitioTierraRenovar() {

        $data['id_bloque'] = $_POST['id_bloque'];
        $data['id_users'] = (int) $this->session->userdata('id_users');
        $data['id_solicitante'] = (int) $this->session->userdata('id_solitantes');
        $data['id_difunto'] = $_POST['difunto'];
        $data['tramite'] = $_POST['tramite'];
        $data['bloque'] = "Sitio Tierra";
        $data['bloque_nombre'] = $_POST['bloque'];
        $data['tipo_nicho'] = $_POST['tipo'];
        $data['costo'] = $_POST['costo'];
        $data['pagado'] = 0;

        $d = $this->home_model->addTramiteNicho($data);
        if ($d > 0) {
            $this->session->set_userdata('id_solitantes', 0);
            $this->session->set_userdata('id_difuntos', 0);
            echo $d;
        } else
            echo 0;
    }

    public function showFormCriptaSitioTierra() {
		$id = $this->uri->segment(3);
		$form = $this->uri->segment(4);
		
		$send['id'] = $id;
		$send['form'] = $form;
		$send['pag'] = 14;
		
        $id_solicitante = (int) $this->session->userdata('id_solitantes');

        if (!empty($id_solicitante)) {
            $data['bloque_info'] = $this->home_model->getInfoSitioTierra($id);
            $data['difuntos_info'] = $this->home_model->getDifuntosSitioTierra($id);

            $this->load->view('AddCriptaSitioTierra', $data);
        } else {
            $this->load->view('ErrorSolicitante',$send);
        }
    }

}
