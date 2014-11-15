<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
         parent::__construct();
        $this->load->helper('url');
        $this->layout->setLayout('template-content');
    }
    
    function index($type = "") {
        $this->layout->view('index');
    }
}    