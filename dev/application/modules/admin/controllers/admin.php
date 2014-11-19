<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->layout->setLayout('template-content');
    }

    public function _mostrar_crud($output = null) {
        //$this->verifyLogin();
        $this->layout->view('index.php', $output);
    }

    public function index() {
        $this->_mostrar_crud((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function asd() {

        $total = 36;
        $ulti = 1;
        for ($s = 1; $s <= 1; $s++) {

            for ($i = 4; $i >= 1; $i--) {

                for ($j = 1; $j <= 5; $j++) {

                    echo("cara :" . $s . " - fila :" . $i . "- nicho: " . $ulti . "<br />");
                    $ulti = $ulti + 1;
                }

                //$this->db->insert('nicho',$nichos_insert);
            }
        }
    }

    public function test_management() {
        //$this->session->set_userdata('page', 'Proveedores');

        $crud = new grocery_CRUD();

        //$this->session->set_userdata('page', 'Configuracones');
        $crud->set_theme('datatables');
        $crud->set_table('test');
        //$crud->unset_texteditor('DESCRIPCION');
        //$crud->required_fields('CODIGO', 'VALOR', 'DESCRIPCION', 'ESTADO', 'FECHA_INICIO', 'FECHA_FIN');
        $output = $crud->render();
        $this->_mostrar_crud($output);
    }

    public function users_management() {
        //$this->session->set_userdata('page', 'Proveedores');

        $crud = new grocery_CRUD();

        //$this->session->set_userdata('page', 'Configuracones');
        $crud->set_theme('datatables');
        $crud->set_table('users');

        $crud->field_type('rol', 'dropdown', array('Administrador' => 'Administrador', 'Responsable' => 'Responsable'));

        $crud->required_fields('nombre', 'apellido', 'rol', 'password');
        $crud->set_rules('ci', 'ci', 'required|numeric');
        $crud->set_rules('correo', 'Correo', 'trim|required|valid_email|xss_clean');

        $crud->unset_fields('create_date');
        $crud->unset_columns('create_date', 'password');

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }

    public function bloque_mausoleo_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('bloque_mausoleo');
        
         $crud->required_fields('nombre', 'position');
         $crud->unset_fields('create_date');

        $crud->callback_add_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoMausoleoDiv">Situar en mapa </a>';
        });

        $crud->callback_edit_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoMausoleoDiv">Situar en mapa </a>';
        });

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }
    
    public function bloque_cremados_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('bloque_cremado');
        
         $crud->required_fields('position');
         $crud->unset_fields('create_date');
         
        $crud->callback_add_field('nombre',array($this,'add_field_callback_1'));


        $crud->callback_add_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoCremadoDiv">Situar en mapa </a>';
        });

        $crud->callback_edit_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoCremadoDiv">Situar en mapa </a>';
        });

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }
    
    function add_field_callback_1()
    {
        return 'General <input type="hidden" maxlength="50" value="General" name="nombre" style="width:462px">';
    }
    
    public function bloque_tierra_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('bloque_bajo_tierra');
        
         $crud->required_fields('position');
         $crud->unset_fields('create_date');
         
        $crud->callback_add_field('nombre',array($this,'add_field_callback_1'));


        $crud->callback_add_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoCbajoTierraDiv">Situar en mapa </a>';
        });

        $crud->callback_edit_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoCbajoTierraDiv">Situar en mapa </a>';
        });

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }
    

    public function bloque_nicho_management() {
        //$this->session->set_userdata('page', 'Proveedores');

        $crud = new grocery_CRUD();

        //$this->session->set_userdata('page', 'Configuracones');
        $crud->set_theme('datatables');
        $crud->set_table('bloque_nicho');
        
        $crud->unset_fields('create_date');
        $crud->required_fields('nombre', 'position','numero_filas','numero_caras','numero_piso','numero_nichos');

        $crud->field_type('numero_piso', 'dropdown', array('1' => 'Piso 1', '2' => 'Piso 2'));

        $crud->field_type('numero_caras', 'dropdown', array('1' => '1', '2' => '2', '3' => '3', '4' => '4'));


        $crud->callback_add_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoSucursalDiv">Situar en mapa </a>';
        });

        $crud->callback_edit_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoSucursalDiv">Situar en mapa </a>';
        });

        $crud->callback_after_insert(array($this, 'log_bloque_after_insert'));

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }

    function log_bloque_after_insert($post_array, $primary_key) {
        $nichos_insert = array(
            "id_bloque" => $primary_key,
            "estado" => 'Libre'
        );

        if ($post_array['numero_filas'] > 0) {

            for ($s = 1; $s <= $post_array['numero_caras']; $s++) {
                $ulti = 1;
                for ($i = $post_array['numero_filas']; $i >= 1; $i--) {

                    for ($j = 1; $j <= $post_array['numero_nichos']; $j++) {

                        $nichos_insert = array(
                            "id_bloque" => $primary_key,
                            "cara" => $s,
                            "fila" => $i,
                            "nicho" => $ulti,
                            "estado" => 'Libre'
                        );
                        $ulti = $ulti + 1;

                        $this->db->insert('nicho', $nichos_insert);
                    }
                    //$this->db->insert('nicho',$nichos_insert);
                }
            }
        }


        return true;
    }

    public function getLinkBoton($value, $row) {
        if ($value > 0)
            return "<a href='javascript:void(0);' class='demo' onClick='myModalNews()'>Procesado</a>";
        else
            return $value;
    }

}
