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
    
    public function asd(){
            
        $total = 36;    
        $ulti = 1;
            for($s=1; $s <= 1; $s++){             
            
                for($i=4; $i >= 1; $i--){
                   
                    for($j=1; $j <= 5; $j++){                       
                      
                        echo("cara :".$s." - fila :".$i."- nicho: ".$ulti."<br />");
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

        $crud->field_type('rol','dropdown',
            array('Administrador' => 'Administrador', 'Responsable' => 'Responsable'));

        $crud->required_fields('nombre', 'apellido', 'rol', 'password');
        $crud->set_rules('ci', 'ci', 'required|numeric');
        $crud->set_rules('correo', 'Correo', 'trim|required|valid_email|xss_clean');

        $crud->unset_fields('create_date');
         $crud->unset_columns('create_date','password');

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }
    
     public function bloque_nicho_management() {
        //$this->session->set_userdata('page', 'Proveedores');

        $crud = new grocery_CRUD();

        //$this->session->set_userdata('page', 'Configuracones');
        $crud->set_theme('datatables');
        $crud->set_table('bloque_nicho');
        
         $crud->field_type('numero_piso','dropdown',
            array('1' => 'Piso 1', '2' => 'Piso 2'));
         
         $crud->field_type('numero_caras','dropdown',
            array('1' => '1', '2' => '2','3' => '3','4' => '4'));
         

        /*$crud->field_type('clase_sitio','dropdown',
            array('Bloques' => 'Bloques', 'Mausoleos' => 'Mausoleos','Espacios baja tierra' => 'Espacios baja tierra'));
        
        $crud->field_type('estado','dropdown',
            array('Ocupado' => 'Ocupado', 'Libre' => 'Libre','Inabilitado' => 'Inabilitado'));
        
        $crud->field_type('dimension','dropdown',
            array('Nichos' => 'Nichos', 'Cremado' => 'Cremado'));
        
        $crud->field_type('tipo','dropdown',
            array('Adulto' => 'Adulto', 'Niño' => 'Niño'));*/
        
        //$crud->set_relation('id_precios', 'precios', 'cantidad');
/*
        $crud->required_fields('nombre', 'apellido', 'rol', 'password');
        $crud->set_rules('ci', 'ci', 'required|numeric');
        $crud->set_rules('correo', 'Correo', 'trim|required|valid_email|xss_clean');

        $crud->unset_fields('create_date');
         $crud->unset_columns('create_date','password');*/
         
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
    
    function log_bloque_after_insert($post_array, $primary_key)
    {
        $nichos_insert = array(
            "id_bloque" => $primary_key,
            "estado" => 'Libre'
        );
        
        if($post_array['numero_filas'] > 0){
            
            for($s=1; $s <= $post_array['numero_caras']; $s++){             
                $ulti = 1;
                for($i=$post_array['numero_filas']; $i >= 1; $i--){
                    
                    for($j=1; $j <= $post_array['numero_nichos']; $j++){
                        
                        $nichos_insert = array(
                            "id_bloque" => $primary_key,
                            "cara" => $s,
                            "fila" => $i,
                            "nicho" => $ulti,
                            "estado" => 'Libre'
                        );
                        $ulti = $ulti + 1;  
                        
                        $this->db->insert('nicho',$nichos_insert);
                        
                    }
                    //$this->db->insert('nicho',$nichos_insert);
                }
            }
        }
     

        return true;
    }
    
    public function getLinkBoton($value, $row) {
        if($value > 0)
            return "<a href='javascript:void(0);' class='demo' onClick='myModalNews()'>Procesado</a>";
        else
            return $value;
    }

}
