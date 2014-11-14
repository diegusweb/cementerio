<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function invierte_date_time($fecha)
    {
 
        $day=substr($fecha,8,2);
        $month=substr($fecha,5,2);
        $year=substr($fecha,0,4);
        $hour = substr($fecha,11,5);
        $datetime_format=$day."-".$month."-".$year.' '.$hour;
        return $datetime_format;
 
    }
}
 
if(!function_exists('get_users'))
{
    function get_users()
    {
        //asignamos a $ci el super objeto de codeigniter
        //$ci será como $this
        $ci =& get_instance();
        $query = $ci->db->get('usuarios');
        return $query->result();
 
    }
}

if(!function_exists('generarCodigo'))
{
    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
   }
}

if(!function_exists('sendEmail'))
{
    function sendEmail($email_object, $to_data, $subject, $message, $parse_data='', $section='', $mail_config_model=null){
	$config['protocol'] = 'sendmail';
	$config['mailpath'] = '/usr/sbin/sendmail';
	$config['charset'] = 'UTF-8';
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = 'html';	
	$email_object->initialize($config);
	$res="";
	$email_object->from('info@almacen.com', 'Almacen');
	$email_object->to($to_data);
	
	if($section!="" && $mail_config_model!=null){
		
	//$section_from=$section."_from";
		$by_from=array(
			"section"	=>$section,
			"item"		=>"from"		
				);
		$aux_res_from=$mail_config_model->getByOrderBy($by_from);
		$res_from=$aux_res_from[0];
		
		
		//$section_to=$section."_to";
		$by_to=array(
				"section"=>$section,
				"item"	 =>"to"		
				);
		$aux_res_to=$mail_config_model->getByOrderBy($by_to);
		$res_to=$aux_res_to[0];
		if($to_data!=""){
			$res_to["value"]=$to_data.",".$res_to["value"];
		}
		
		$email_object->from($res_from["value"], 'Almacen');
		$email_object->to($res_to["value"]);
	}
	
	//$email_object->cc('webmaster@northwest.ca');
	$email_object->subject($subject);
	$message=parseString($message,$parse_data);
	$email_object->message($message);
	$email_object->send();
	$res=$email_object->print_debugger();
	return $res;
    }
}
if(!function_exists('parseString'))
{
    function parseString($str_parse,$data=''){
            $res=$str_parse;
            if(is_array($data)&& !empty($str_parse)){
                    foreach($data as $index => $content){
                            $aux_text="%".$index."%";
                            $res = str_replace($aux_text, $content, $res);
                    }
            }
            return $res;
    }
}    