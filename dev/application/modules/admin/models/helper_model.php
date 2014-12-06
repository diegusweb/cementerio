<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Helper_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }
   /*  public function getIdProv($id) {
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
    }*/
    
    public function getAlarmaNicho(){
        $id = date("Y-m-d");
         $query = "SELECT * FROM nicho where estado='Ocupado' AND fecha_fin <='".$id."'";
        $result = $this->db->query($query)->result_array();
        return $result;
    }
	
	public function getNombreDif($id){

         $query = "SELECT nombreCompletoFAllecido FROM difunto where id_difunto=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['nombreCompletoFAllecido'];
    }
	
	public function getNombreBloque($id){

         $query = "SELECT nombre FROM bloque_nicho where id_bloque_nicho=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['nombre'];
    }
}    

