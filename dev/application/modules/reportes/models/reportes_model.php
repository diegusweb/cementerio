<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }

	public function infoBloqueNicho($fechaInicio, $fechaFin, $funcionario ){
	
		if($fechaInicio =! "" && $fechaFin != ""){
			if($funcionario != 0){
				$this->db->select('*');
				$this->db->from('tramite');
				$this->db->where('id_users', $funcionario ); 
			}
			else{
				$this->db->select('*');
				$this->db->from('tramite');
			}
		}

		
		$consulta = $this->db->get();
		return $consulta->result_array();

	}
	
	public function getFuncionarios(){
		$this->db->select('id_users, nombre, apellido');
        $this->db->from('users');
        $consulta = $this->db->get();
        return $consulta->result();
	}

}
