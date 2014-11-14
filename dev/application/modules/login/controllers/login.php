<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
         parent::__construct();
        $this->load->helper('url');
        $this->layout->setLayout('login-content');
    }

    function index($type = "") {
        $aData['error'] = '';
        $this->layout->view('index',$aData);
    }
    
    function verify()
    {
        $aData['name']="login";
        //echo $this->input->post('password');
        $result_ =  $this->authentication->login($this->input->post("ci"), $this->input->post('password'));
        
        if ($result_) 
        {
            redirect(base_url()."welcome",'outside');
        }else{
            $aData['error'] = 'Your login or password are incorrect. Please try again.';
            $aData['action'] = $this->input->post("action");
            $this->layout->view('index',$aData);
        }
    }
    
    function logout()
    {
        $this->authentication->logout();
        redirect(base_url()."login/index",'outside');
    }

}
