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
		$this->db->join('users', 'users.id_users = tramite.id_users');
		
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
		$this->db->select('solicitante.nombre, solicitante.apellido, tramite.tramite,tramite.fecha_tramite,users.nombre as user_nombre,users.apellido as user_apellido,tramite.clase
		,tramite.tipo_nicho,tramite.nro_nicho,tramite.bloque, tramite.bloque_nombre,tramite.lado,tramite.costo');
        $this->db->from('tramite');
		$this->db->join('solicitante', 'solicitante.id_solicitante = tramite.id_solicitante');
		$this->db->join('users', 'users.id_users = tramite.id_users');
        $consulta = $this->db->get();
        return $consulta->result_array();
		
    }

}
