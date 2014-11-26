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
			
				$fechaInicio = date("Y-m-d H:i:s",strtotime($fechaFin));
				$fechaFin = date("Y-m-d H:i:s",strtotime($fechaFin."+ 1 days"));
				 //$fin = date("Y-m-d ",strtotime($fin."+ 1 days"));
				 
				$this->db->select('*');
				$this->db->from('tramite');
				$this->db->where('id_users', $funcionario ); 
				$this->db->where('fecha_tramite >=', $fechaInicio ); 
				$this->db->where('fecha_tramite <=', $fechaFin ); 
			}
			else{
				$fechaInicio = date("Y-m-d H:i:s",strtotime($fechaInicio));
				$fechaFin = date("Y-m-d H:i:s",strtotime($fechaFin));
				$this->db->select('*');
				$this->db->from('tramite');
				$this->db->where('fecha_tramite >=', $fechaInicio ); 
				$this->db->where('fecha_tramite <=', $fechaFin ); 
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
