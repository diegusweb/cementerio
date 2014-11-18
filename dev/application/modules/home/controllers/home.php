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
    
}    