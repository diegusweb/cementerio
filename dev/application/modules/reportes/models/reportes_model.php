<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }

    public function infoBloqueNicho($fechaInicio, $fechaFin, $funcionario, $tipo, $concepto) {

        $this->db->select('tramite.id_solicitante, tramite.id_difunto,solicitante.nombre, solicitante.apellido, tramite.tramite,tramite.fecha_tramite,users.nombre as user_nombre,users.apellido as user_apellido,tramite.clase
		,tramite.tipo_nicho,tramite.nro_nicho,tramite.bloque, tramite.bloque_nombre,tramite.lado,tramite.costo');
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
            $this->db->where('tramite.id_users' , $funcionario);
        }
        if ($tipo) {
            $this->db->where('tramite.bloque' , $tipo);
        }
        if ($concepto > 0) {
            switch ($concepto) {
                case 1:
                    $this->db->where('tramite.tramite',"Nicho Perpetuidad");
                    break;
                 case 2:
                    $this->db->where('tramite.tramite', "Añadir Lapida");
                    break;
                 case 3:
                    $this->db->where('tramite.tramite',"Ingresar Sitio Tierra");
                    break;
                 case 4:
                    $this->db->where('tramite.tramite',"Ingresar a Mausoleo");
                    break;
                 case 5:
                    $this->db->where('tramite.tramite', "Renovacion de 1 año para Nichos");
                    break;
                case 6:
                    $this->db->where('tramite.tramite', "Exhumacion");
                    break;
                case 7:
                    $this->db->where('tramite.tramite', "Autorizacion de construccion de cripta");
                    break;
                 case 8:
                    $this->db->where('tramite.tramite', "Nicho Enterratorio");
                    break;

                
                
            }
            //$this->db->where('tramite.tramite = ' . $concepto);
        }
        $this->db->order_by("id_tramite", "desc");


        $consulta = $this->db->get();
        return $consulta->result_array();
    }

    public function getFuncionarios() {
        $this->db->select('id_users, nombre, apellido');
        $this->db->from('users');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function infoBloqueTramites() {
        $this->db->select('tramite.id_solicitante, tramite.id_difunto,solicitante.nombre, solicitante.apellido, tramite.tramite,tramite.fecha_tramite,users.nombre as user_nombre,users.apellido as user_apellido,tramite.clase
		,tramite.tipo_nicho,tramite.nro_nicho,tramite.bloque, tramite.bloque_nombre,tramite.lado,tramite.costo');
        $this->db->from('tramite');
        $this->db->join('solicitante', 'solicitante.id_solicitante = tramite.id_solicitante');
        $this->db->join('users', 'users.id_users = tramite.id_users');
        $this->db->order_by("id_tramite", "desc");
        $consulta = $this->db->get();
        return $consulta->result_array();
    }

    public function getInfoSol($id) {
        $query = "SELECT * FROM solicitante WHERE id_solicitante=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getInfoDifunto($id) {
        $query = "SELECT * FROM difunto WHERE id_difunto=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getAlarmaNicho() {
        $id = date("Y-m-d");
        $query = "SELECT * FROM nicho where estado='Ocupado' AND fecha_fin <='" . $id . "'";
        $results = $this->db->query($query)->result_array();

        $data = array(
            'estado' => 'Renovar'
        );

        foreach ($results as $row) {
            $this->db->where('id_nicho', $row['id_nicho']);
            $this->db->update('nicho', $data);
        }

        $query = "SELECT * FROM nicho where estado='Renovar' AND fecha_fin <='" . $id . "'";
        $result = $this->db->query($query)->result_array();

        return $result;
    }
    
    function getInfoNicho(){
        
         $this->db->select('*');
        $this->db->from('nicho');
        //$this->db->join('difunto', 'difunto.id_difunto = tramite.id_difunto');
        //$this->db->join('bloque_nicho', 'bloque_nicho.id_bloque_nicho = nicho.id_bloque');


        $consulta = $this->db->get();
        return $consulta->result_array();
    
    }
    
        function getInfoBloque(){
        
         $this->db->select('*');
        $this->db->from('bloque_nicho');

        $consulta = $this->db->get();
        return $consulta->result_array();
    
    }

}
