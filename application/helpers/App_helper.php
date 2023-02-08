<?php

if(!function_exists('APP_NAME')){
    function APP_NAME(){
        return 'Modul Laboratorium';
    }
}

if(!function_exists('APP_INST_NAME')){
	function APP_INST_NAME(){
		$ci =& get_instance();
        $ci->sv = $ci->load->database('server', TRUE);

        $data = $ci->sv->get('fProfile')->row();

        return $data->Company;
	}
}

if(!function_exists('APP_INST_LOGO')){
	function APP_INST_LOGO(){
		$ci =& get_instance();
        $ci->sv = $ci->load->database('server', TRUE);

        $data = $ci->sv->get('fProfile')->row();

        return $data->logo;
	}
}

if(!function_exists('APP_INST_KOPSURAT')){
	function APP_INST_KOPSURAT(){
		$ci =& get_instance();
        $ci->sv = $ci->load->database('server', TRUE);

        $data = $ci->sv->get('fProfile')->row();

        return $data->kop_surat;
	}
}