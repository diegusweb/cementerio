<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comprobante extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('comprobante_model');
		$this->layout->setLayout('template-comprobante');

        $this->verifyLogin();
    }

    function index($id_tarmite) {
        $tramite['tramite'] = $this->comprobante_model->getTarmite($id_tarmite);

        $this->layout->view('Comprobante', $tramite);
    }
	

    public function verifyLogin() {
        $user_id = $this->session->userdata('username');
        if (empty($user_id)) {
            redirect(base_url() . "login", 'outside');
        }
    }

}
