<?php
if(!defined('BASEPATH'))
		exit('No direct script access allowed');
		
class Authentication {
	var $_user_id = 0;
	var $_login = "";
        var $_username = "";
	var $_password = "";
        var $_email = "";
	//var $_roles = "";
	var $_auth = FALSE;
	function Authenticationfe($auto = TRUE)
	{
		if($auto)
		{
			$CI =& get_instance();
			if($this->login($CI->session->userdata('username'), $CI->session->userdata('password')))
			{
				$this->_user_id = $CI->session->userdata('id_user');
				$this->_username = $CI->session->userdata('username');
				$this->_password = $CI->session->userdata('password');
				$this->_image = $CI->session->userdata('image');
			}
		}
	}
	function getId(){return $this->_user_id;}
	function getLogin(){return $this->_login;}
	function getPassword(){return $this->_password;}
        function getCi(){return $this->_ci;}
	//function getRol(){return $this->_roles;}
	
	function login($username= "", $password = "")
	{  
		if(empty($username)||empty($password))
			return FALSE;

		$CI =& get_instance();	
                
               $password = md5($password);

		$sql = "SELECT * FROM `persona` WHERE `NUMERO_DOCUMENTO`='".$username."' AND `PASSWORD`='".$password."'";
		$query = $CI->db->query($sql);
		//login ok
		if($query->num_rows()==1)
		{ 
			$row = $query->row();
			$CI->session->set_userdata('id_user', $row->ID_PERSONA);
			$this->_user_id = $row->ID_PERSONA;
                        
                        $CI->session->set_userdata('username', $row->PRIMER_NOMBRE." ".$row->APELLIDO_PATERNO);
			$this->_username = $row->PRIMER_NOMBRE." ".$row->APELLIDO_PATERNO;
			
			//$CI->session->set_userdata('password', $password);
			//$this->_password = $row->PASSWORD;
                        
                        $CI->session->set_userdata('rol',  $row->ID_CARGO);
			$this->_email= $row->ID_CARGO;
                        
                        $CI->session->set_userdata('image',  $row->IMAGE);
			$this->_image= $row->IMAGE;
                        

			$this->_auth = TRUE;
			return TRUE;
		}
		else
		{ 
			$this->_auth = FALSE;
			$this->logout();

			return FALSE;
		}
	}
	function logout()
	{
		$CI =& get_instance();
		$CI->session->sess_destroy();
		$this->_auth = FALSE;
	}
	function check($level = 0, $strict = TRUE)
	{
		if(!$this->_auth)
			return FALSE;

		if($strict)
		{
			if($level == $this->_level)
				return TRUE;
			else
				return FALSE;
		}
		else
		{
			if($level <= $this->_level)
				return TRUE;
			else
				return FALSE;
		}
	}
	
}
?>