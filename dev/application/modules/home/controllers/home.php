<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
         parent::__construct();
        $this->load->helper('url');
        $this->layout->setLayout('frontend-content');
    }
    
    function index($type = "") {
        $aData['error'] = '';
        $this->layout->view('index',$aData);
    }
}    