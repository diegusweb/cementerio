<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Helper_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }
     public function getIdProv($id) {
        $query = "SELECT * FROM articulo_proveedor WHERE ID_ARTICULO=".$id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['ID_PROVEEDOR'];
    }
    
    public function getAlertas($tipo)
    {
        $query="SELECT * FROM alertas WHERE TIPO='".$tipo."' ORDER BY ID_ALERTAS DESC LIMIT 5";
        //$result=$this->db->query($query)->num_rows();
        $result=$this->db->query($query)->result_array();
        return $result;
    }
}    

