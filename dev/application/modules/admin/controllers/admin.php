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

        $crud->unset_delete();

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

        $crud->callback_add_field('nombre', array($this, 'add_field_callback_1'));


        $crud->callback_add_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoCremadoDiv">Situar en mapa </a>';
        });

        $crud->callback_edit_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoCremadoDiv">Situar en mapa </a>';
        });

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }

    function add_field_callback_1() {
        return 'General <input type="hidden" maxlength="50" value="General" name="nombre" style="width:462px">';
    }

    public function bloque_tierra_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('bloque_bajo_tierra');

        $crud->required_fields('position');
        $crud->unset_fields('create_date');

        $crud->callback_add_field('nombre', array($this, 'add_field_callback_1'));


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
        $crud->required_fields('nombre', 'position', 'numero_filas', 'numero_caras', 'numero_piso', 'numero_nichos');
        $crud->set_rules('costo_perpetuidad_1_clase', 'costo perpetuidad 1.clase', 'required|decimal');
        $crud->set_rules('costo_perpetuidad_2_clase', 'costo perpetuidad 2.clase', 'required|decimal');
        $crud->set_rules('costo_5_year_1_clase', 'costo 5 años 1.clase', 'required|decimal');
        $crud->set_rules('costo_5_year_2_clase', 'costo 5 años 2.clase', 'required|decimal');
        
        $crud->set_rules('numero_filas', 'numero filas', 'required|number');
        $crud->set_rules('numero_nichos', 'numero nichos', 'required|number');

        $crud->field_type('numero_piso', 'dropdown', array('1' => 'Piso 1', '2' => 'Piso 2'));
        $crud->field_type('numero_caras', 'dropdown', array('1' => '1', '2' => '2', '3' => '3', '4' => '4'));
        
        $crud->field_type('numero_filas', 'dropdown', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8'));     
        $crud->field_type('numero_nichos', 'dropdown', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'));    
        


        $crud->callback_add_field('position', function () {
            return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="" name="position"> <a href="#" class="infoSucursalDiv">Situar en mapa </a>';
        });

        /* $crud->callback_edit_field('position', function ($this) {
          return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="'.$value.'" name="position"> <a href="#" class="infoSucursalDiv">Situar en mapa </a>';
          }); */
        $crud->callback_edit_field('position', array($this, 'edit_field_callback_nicho'));

        $crud->display_as('costo_5_year_1_clase', '1.clase 5 años');
        $crud->display_as('costo_5_year_2_clase', '2.clase 5 años');
        $crud->display_as('costo_perpetuidad_1_clase', '1.clase perpetuidad');
        $crud->display_as('costo_perpetuidad_2_clase', '2.clase perpetuidad');

        $crud->callback_add_field('costo_5_year_1_clase', function () {
            return 'Costo <input type="text" maxlength="15" style="width:80px!important" value="" name="costo_5_year_1_clase"> Ejm: 123.51';
        });
        $crud->callback_edit_field('costo_5_year_1_clase', function () {
            return 'Costo <input type="text" maxlength="15"  style="width:80px!important" value="" name="costo_5_year_1_clase"> Ejm: 123.51';
        });

        $crud->callback_add_field('costo_5_year_2_clase', function () {
            return 'Costo <input type="text" maxlength="15" style="width:80px!important" value="" name="costo_5_year_2_clase"> Ejm: 123.51';
        });
        $crud->callback_edit_field('costo_5_year_2_clase', function () {
            return 'Costo <input type="text" maxlength="15"  style="width:80px!important" value="" name="costo_5_year_2_clase"> Ejm: 123.51';
        });

        $crud->callback_add_field('costo_perpetuidad_1_clase', function () {
            return 'Costo <input type="text" maxlength="15" style="width:80px!important" value="" name="costo_perpetuidad_1_clase"> Ejm: 123.51';
        });
        $crud->callback_edit_field('costo_perpetuidad_1_clase', function () {
            return 'Costo <input type="text" maxlength="15"  style="width:80px!important" value="" name="costo_perpetuidad_1_clase"> Ejm: 123.51';
        });

        $crud->callback_add_field('costo_perpetuidad_2_clase', function () {
            return 'Costo <input type="text" maxlength="15"  style="width:80px!important" value="" name="costo_perpetuidad_2_clase"> Ejm: 123.51';
        });
        $crud->callback_edit_field('costo_perpetuidad_2_clase', function () {
            return 'Costo <input type="text" maxlength="15"  style="width:80px!important" value="" name="costo_perpetuidad_2_clase"> Ejm: 123.51';
        });

        $crud->display_as('create_date', 'Fechas');

        $crud->unset_delete();
        $crud->unset_columns('create_date');

        $crud->callback_after_insert(array($this, 'log_bloque_after_insert'));

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }

    function edit_field_callback_nicho($value, $primary_key) {
        return '<input type="text" maxlength="10" class="positionSet" style="width:50px!important" value="' . $value . '" name="position"> <a href="#" class="infoSucursalDiv">Situar en mapa </a>';
    }

    public function tramites_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('tramite');

        //$crud->required_fields('nombre', 'position');
        // $crud->unset_fields('create_date');
        
        $crud->unset_columns('id_solicitante','id_difunto','id_bloque');
        $crud->callback_column('tramite',array($this,'_callback_comprobante'));
        
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_read();

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }
    
    public function _callback_lados_name($value, $row)
    {
        $caras =  array("Norte", "Sud", "Este", "Oeste");
      return $caras[$value-1];
    }
	
	public function _callback_comprobante($value, $row)
    {
            return '<a href="'.base_url().'home/comprobante/'.$row->id_tramite.'" class="btn btn-primary btn-lg"  aria-label="Left Align">'.$row->tramite.'</button>';

    }

    function log_bloque_after_insert($post_array, $primary_key) {
        $nichos_insert = array(
            "id_bloque" => $primary_key,
            "estado" => 'Libre'
        );

        if ($post_array['numero_filas'] > 0) {
            for ($p = 1; $p <= $post_array['numero_piso']; $p++) {

                for ($s = 1; $s <= $post_array['numero_caras']; $s++) {
                    $ulti = 1;
                    for ($i = $post_array['numero_filas']; $i >= 1; $i--) {

                        for ($j = 1; $j <= $post_array['numero_nichos']; $j++) {

                            $nichos_insert = array(
                                "id_bloque" => $primary_key,
                                "piso" => $p,
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
