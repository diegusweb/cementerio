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
    
     public function ubicacion_management() {
        //$this->session->set_userdata('page', 'Proveedores');

        $crud = new grocery_CRUD();

        //$this->session->set_userdata('page', 'Configuracones');
        $crud->set_theme('datatables');
        $crud->set_table('ubicacion');

        $crud->field_type('clase_sitio','dropdown',
            array('Bloques' => 'Bloques', 'Mausoleos' => 'Mausoleos','Espacios baja tierra' => 'Espacios baja tierra'));
        
        $crud->field_type('estado','dropdown',
            array('Ocupado' => 'Ocupado', 'Libre' => 'Libre','Inabilitado' => 'Inabilitado'));
        
        $crud->field_type('dimension','dropdown',
            array('Nichos' => 'Nichos', 'Cremado' => 'Cremado'));
        
        $crud->field_type('tipo','dropdown',
            array('Adulto' => 'Adulto', 'Niño' => 'Niño'));
        
        $crud->set_relation('id_precios', 'precios', 'cantidad');
/*
        $crud->required_fields('nombre', 'apellido', 'rol', 'password');
        $crud->set_rules('ci', 'ci', 'required|numeric');
        $crud->set_rules('correo', 'Correo', 'trim|required|valid_email|xss_clean');

        $crud->unset_fields('create_date');
         $crud->unset_columns('create_date','password');*/

        $output = $crud->render();
        $this->_mostrar_crud($output);
    }

}
