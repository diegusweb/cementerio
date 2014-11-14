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
 

}
