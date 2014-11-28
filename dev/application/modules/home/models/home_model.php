<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }

    public function getIdProv($id) {
        $query = "SELECT * FROM articulo_proveedor WHERE ID_ARTICULO=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['ID_PROVEEDOR'];
    }

    public function getBloqueNicho() {
        $query = "SELECT * FROM bloque_nicho";
        //$result=$this->db->query($query)->num_rows();
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getBloqueMausoleo() {
        $query = "SELECT * FROM bloque_mausoleo";
        //$result=$this->db->query($query)->num_rows();
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getBloqueCremado() {
        $query = "SELECT * FROM bloque_cremado";
        //$result=$this->db->query($query)->num_rows();
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getBloqueBajoTierra() {
        $query = "SELECT * FROM bloque_bajo_tierra";
        //$result=$this->db->query($query)->num_rows();
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getInfoBloqueNicho($id_bloque) {
        $query = "SELECT * FROM bloque_nicho WHERE id_bloque_nicho=" . $id_bloque;
        //$result=$this->db->query($query)->num_rows();
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getBloqueNichoLibres($id, $lado, $piso) {

        $this->db->select('id_nicho, nicho');
        $this->db->from('nicho');
        $this->db->where('id_bloque', $id);
        $this->db->where('cara', $lado);
        $this->db->where('piso', $piso);
        $this->db->where('estado', "Libre");
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function getBloqueNichoOcupados($id, $lado, $piso) {

        $this->db->select('id_nicho, nicho');
        $this->db->from('nicho');
        $this->db->where('id_bloque', $id);
        $this->db->where('cara', $lado);
        $this->db->where('piso', $piso);
        $this->db->where('estado', "Ocupado");
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function seacrhDifunto($id) {
        $query = "SELECT * FROM nicho WHERE id_nicho=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result[0]['id_difunto'];
    }

    public function addSolicitante($data) {
        $consulta = $this->db->insert('solicitante', $data);

        if ($consulta)
            return $this->db->insert_id();
        else
            return false;
    }

    public function addDifunto($data) {
        $consulta = $this->db->insert('difunto', $data);

        if ($consulta)
            return $this->db->insert_id();
        else
            return false;
    }

    public function addTramiteNicho($data) {
        $consulta = $this->db->insert('tramite', $data);

        if ($consulta)
            return $this->db->insert_id();
        else
            return false;
    }

    public function updateNichoStatus($id, $datas) {

        $this->db->where('id_nicho', $id);
        $this->db->update('nicho', $datas);
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

    public function getInfoMausoleo($id) {
        $query = "SELECT * FROM bloque_mausoleo WHERE id_bloque_mausoleo=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    //mausoleo

    public function getDifuntosMausoleo($id) {
        $query = "SELECT tramite.id_difunto, difunto.nombreCompletoFallecido FROM tramite as tramite 
		LEFT JOIN difunto ON difunto.id_difunto = tramite.id_difunto
		WHERE  tramite.bloque='Mausoleo' AND tramite.status = 'activo' AND tramite.tramite <> 'Exhumacion' AND tramite.tramite <> 'da' AND tramite.id_bloque =" . $id;
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function updateStatusDifunto($id, $idf, $bloque, $datas) {

        $this->db->where('id_bloque', $id);
        $this->db->where('id_difunto', $idf);
        $this->db->where('bloque', $bloque);
        $this->db->where('status', 'activo');
        $this->db->update('tramite', $datas);
    }

    //cremados
    public function getInfoCremado($id) {
        $query = "SELECT * FROM bloque_cremado WHERE id_bloque_cremado=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getDifuntosCremados($id) {
        $query = "SELECT tramite.id_difunto, difunto.nombreCompletoFallecido FROM tramite as tramite 
		LEFT JOIN difunto ON difunto.id_difunto = tramite.id_difunto
		WHERE  tramite.bloque='Cremados' AND tramite.status = 'activo' AND tramite.tramite <> 'Exhumacion' AND tramite.id_bloque =" . $id;
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    //Sitio Tierra
    public function getInfoSitioTierra($id) {
        $query = "SELECT * FROM bloque_bajo_tierra WHERE id_bloque_bajo_tierra=" . $id;
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getDifuntosSitioTierra($id) {
        $query = "SELECT tramite.id_difunto, difunto.nombreCompletoFallecido FROM tramite as tramite 
		LEFT JOIN difunto ON difunto.id_difunto = tramite.id_difunto
		WHERE  tramite.bloque='Sitio Tierra' AND tramite.status = 'activo' AND tramite.tramite <> 'Exhumacion Sitio Tierra' AND tramite.tramite <> 'Construccion Cripta' AND tramite.id_bloque =" . $id;
        $result = $this->db->query($query)->result_array();
        return $result;
    }

}
