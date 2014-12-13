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
      } */

    public function getAlarmaNicho() {
        $id = date("Y-m-d");
        $query = "SELECT * FROM nicho where estado='Ocupado' AND fecha_fin <> '1970-01-01' AND fecha_fin <='" . $id . "'";
        $results = $this->db->query($query)->result_array();

        if(count($results) > 0){
            foreach ($results as $row) {
                $fecha1 = new DateTime($id);
                $fecha2 = new DateTime($row['fecha_fin']);
                $fecha = $fecha1->diff($fecha2);

                 $data = array(
                    'estado' => 'Renovar',
                    'transcurrido' => $fecha->y
                );
                 
                $this->db->where('id_nicho', $row['id_nicho']);
                $this->db->update('nicho', $data);
                 
            }
        }

        $query = "SELECT * FROM nicho where estado='Renovar'";
        $result = $this->db->query($query)->result_array();

        return $result;
    }

    public function getNombreDif($id) {

        $query = "SELECT nombreCompletoFAllecido FROM difunto where id_difunto=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['nombreCompletoFAllecido'];
    }
    
    public function getSoliDif($id) {

        $query = "SELECT id_solicitante FROM tramite where tramite = 'Nicho Enterratorio' AND id_difunto=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['id_solicitante'];
    }
    
    public function getSoliNombre($id) {

        $query = "SELECT nombre, apellido,telefono FROM solicitante where id_solicitante =" . $id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['nombre']." ".$result[0]['apellido']."<br>- ".$result[0]['telefono'];;
    }

    public function getNombreBloque($id) {

        $query = "SELECT nombre FROM bloque_nicho where id_bloque_nicho=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['nombre'];
    }

}
