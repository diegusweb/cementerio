<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }

    public function infoBloqueNicho($fechaInicio, $fechaFin, $funcionario) {

        $this->db->select('*');
        $this->db->from('tramite');
		$this->db->join('solicitante', 'solicitante.id_solicitante = tramite.id_solicitante');
		
        if ($fechaInicio) {
            $this->db->where('fecha_tramite >=', $fechaInicio);
        }
        if ($fechaFin) {
            $fechaFin = date("Y-m-d ", strtotime($fechaFin . "+ 1 days"));
            $this->db->where('fecha_tramite <=', $fechaFin);
        }
        if ($funcionario > 0) {
            $this->db->where('id_users = ' . $funcionario);
        }


        $consulta = $this->db->get();
        return $consulta->result_array();
    }

    public function getFuncionarios() {
        $this->db->select('id_users, nombre, apellido');
        $this->db->from('users');
        $consulta = $this->db->get();
        return $consulta->result();
    }
    
    public function infoBloqueTramites(){
		$this->db->select('*');
        $this->db->from('tramite');
		$this->db->join('solicitante', 'solicitante.id_solicitante = tramite.id_solicitante');
        $consulta = $this->db->get();
        return $consulta->result_array();
		
    }

}
