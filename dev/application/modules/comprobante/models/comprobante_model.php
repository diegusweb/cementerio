<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comprobante_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }

    public function getTarmite($id) {
        $this->db->select('*');
        $this->db->from('tramite');
        //$this->db->join('difunto', 'difunto.id_difunto = tramite.id_difunto');
        $this->db->join('solicitante', 'solicitante.id_solicitante = tramite.id_solicitante');
        $this->db->join('difunto', 'difunto.id_difunto= tramite.id_difunto');
        $this->db->where('tramite.id_tramite', $id);

        $consulta = $this->db->get();
        return $consulta->result_array();
    }

}
