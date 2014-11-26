<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }

	public function infoBloqueNicho(){

		$this->db->select('*');
		$this->db->from('tramite');
		//$this->db->join('solicitante', 'solicitante.id_solicitante = tramite.id_solicitante');
		//$this->db->join('difunto', 'difunto.id_difunto= tramite.id_difunto');
		$this->db->where('bloque', 'Nicho'); 
		
		$consulta = $this->db->get();
		return $consulta->result_array();

	}

}
