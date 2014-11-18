<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }
     public function getIdProv($id) {
        $query = "SELECT * FROM articulo_proveedor WHERE ID_ARTICULO=".$id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['ID_PROVEEDOR'];
    }
    
    public function getBloqueNicho()
    {
        $query="SELECT * FROM bloque_nicho";
        //$result=$this->db->query($query)->num_rows();
        $result=$this->db->query($query)->result_array();
        return $result;
    }
	
	 public function getInfoBloqueNicho($id_bloque)
    {
        $query="SELECT * FROM bloque_nicho WHERE id_bloque_nicho=".$id_bloque;
        //$result=$this->db->query($query)->num_rows();
        $result=$this->db->query($query)->result_array();
        return $result;
    }
	
	public function getBloqueNichoLibres($id, $lado){

		$this->db->select('id_nicho, nicho');
        $this->db->from('nicho');
		$this->db->where('id_bloque', $id); 
		$this->db->where('cara', $lado); 
		$this->db->where('estado', "Libre"); 
        $consulta = $this->db->get();
        return $consulta->result();
	}
}    
