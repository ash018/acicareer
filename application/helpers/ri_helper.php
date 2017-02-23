<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    
    if(!function_exists('check_user_login')){
        function check_user_login(){        
            $ci = get_instance();
            $is_logged_in = $ci->session->userdata('is_log_user');
            if(!isset($is_logged_in) || $is_logged_in != true ){
                redirect(base_url('login/logout'));                
            }
        }
    }

    if(!function_exists('check_admin_login')){
        function check_admin_login(){        
            $ci = get_instance();
            $is_logged_in = $ci->session->userdata('is_log_admin');
            if(!isset($is_logged_in) || $is_logged_in != true ){
                redirect(base_url('admin/adminLogin/logout'));
            }
        }
    }
    if (!function_exists('get_permission')) {

        function get_permission($Field,$EmpCode) {
            $CI = & get_instance();
            $CI->load->model('common_m');
            $UserPermission_q= $CI->common_m->select_option_permission($Field,$EmpCode);
            if($UserPermission_q){
                $UserPermission = $UserPermission_q['0'][$Field];
                return $UserPermission;
            }

        }

    }
    
    if (!function_exists('select_option')) {

        function select_option($table, $fieldId,$field) {
            $ci = get_instance();

            $ci->load->model('Common_m');
            $option = $ci->Common_m->option_select($table, $fieldId);

            foreach ($option as $opt) {
                $opt_id = $opt[$fieldId];
                $opt_val = $opt[$field];
                echo "<option value='$opt_id'>$opt_val</option>";
            }
        }

    }
    
    
    if(!function_exists('select_option_selected')){
        function select_option_selected($table,$Id,$field,$selected_id){        
            $ci = get_instance();

            $ci->load->model('Common_m');
            $option = $ci->Common_m->option_select($table,$field);   
            foreach($option as $opt){
                $opt_id = $opt[$Id];
                $opt_val = $opt[$field];            
                if($opt_id == $selected_id){$selected = 'selected="selected"';}else{$selected = '';}
                echo "<option $selected value=\"$opt_id\">$opt_val</option>";
            }        
        }
    }
    ///Code add: 26th December 2016
    if (!function_exists('select_option_business')) {

        function select_option_business($table, $fieldId,$field) {
            $ci = get_instance();

            $ci->load->model('Common_m');
            $option = $ci->Common_m->option_select_business($table, $field);

            foreach ($option as $opt) {
                $opt_id = $opt[$fieldId];
                $opt_val = $opt[$field];
                echo "<option value='$opt_id'>$opt_val</option>";
            }
        }

    }
    ///Code add: 27th December 2016
    if (!function_exists('select_option_district')) {

        function select_option_district($table, $fieldId,$field) {
            $ci = get_instance();

            $ci->load->model('Common_m');
            $option = $ci->Common_m->option_select_district($table, $field);

            foreach ($option as $opt) {
                $opt_id = $opt[$fieldId];
                $opt_val = $opt[$field];
                echo "<option value='$opt_id'>$opt_val</option>";
            }
        }

    }
	
	if (!function_exists('select_option_postjoblist')) {

        function select_option_postjoblist($table, $fieldId, $field) {
            $ci = get_instance();

            $ci->load->model('Common_m');
            $option = $ci->Common_m->select_option_postjoblist($table, $field);

            foreach ($option as $opt) {
                $opt_id = $opt[$fieldId];
                $opt_val = $opt[$field];
                echo "<option value='$opt_id'>$opt_val</option>";
            }
        }

    }
	
    if (!function_exists('check_option')) {

        function check_option($table, $field) {
            $ci = get_instance();

            $ci->load->model('common_m');
            $option = $ci->common_m->option_select($table, $field);
            $i = 0;
            if(!empty($option)) foreach ($option as $opt) {
                $i++;
                $opt_id = $opt['Id'];
                $opt_val = $opt[$field];
                $opt_Pest = $opt['Pest'];
                $opt_DoseLiter = $opt['DoseLiter'];
                echo "<input type=\"checkbox\" name=\"TrialProtocalId[]\" value=\"$opt_id\">&nbsp;<button type=\"button\" class=\"btn btn-default btn-xs TrialProtocalClick\" id=\"TrialProtocalClick$opt_id\" data-toggle=\"modal\" data-target=\"#myModalTrialProtocal\" value=\"$opt_id\">$opt_val - $opt_Pest ($opt_DoseLiter)</button>&nbsp;&nbsp;&nbsp;<br/>";
            }
        }

    }
    
    if (!function_exists('check_option_selected')) {

        function check_option_selected($table,$field,$selected_id) {
            $ci = get_instance();

            $ci->load->model('common_m');
            $option = $ci->common_m->option_select($table, $field);
            $i = 0;
            $tpid=substr($selected_id, 0, -1);
            $myuser['TrialProtocalId']= explode(',',$tpid);
            foreach ($option as $opt) {
                $i++;
                $opt_id = $opt['Id'];
                $opt_val = $opt[$field];
                $opt_Pest = $opt['Pest'];
                $opt_DoseLiter = $opt['DoseLiter'];
                if(in_array($opt['Id'], $myuser['TrialProtocalId'])){$selected ='checked="checked"';}else{$selected = '';}
                
                echo "<input type=\"checkbox\" name=\"TrialProtocalId[]\" $selected value=\"$opt_id\">&nbsp;<button type=\"button\" class=\"btn btn-default btn-xs TrialProtocalClick\" id=\"TrialProtocalClick$opt_id\" data-toggle=\"modal\" data-target=\"#myModalTrialProtocal\" value=\"$opt_id\">$opt_val - $opt_Pest ($opt_DoseLiter)</button>&nbsp;&nbsp;&nbsp;<br/>";
            }
        }

    }
     
    if (!function_exists('get_date_format')) {
        function get_date_format($date) {
            $time = strtotime($date);
            $dateF = date('M d Y', $time);
            return $dateF;
        }
    }
    
    if (!function_exists('get_date_format_2')) {
        function get_date_format_2($date) {
            $time = strtotime($date);
            $dateF = date('Y-m-d', $time);
            return $dateF;
        }
    }
    
   if (!function_exists('job_posted')) {

        function job_posted($PostId,$UserId) {
            $CI = & get_instance();
            $CI->load->model('Common_m');
            $jobPosted_q = $CI->Common_m->selectJobPosted($PostId,$UserId);
            $jobPosted = $jobPosted_q['0']['jobPosted'];
            return $jobPosted;
        }
    }
    
    function passencode($xpassword) {
        $encode = "";
        
        /*For ($i = strLen($xpassword)-1; $i>= 0; $i--) {
            $encode .= ord(substr($xpassword, $i, 1));
        }*/
        $encode = $xpassword*2222;
        return $encode;
    }
    
    function passdecode($xpassword) {
        $decode = "";        
        
        /*For ($i = strLen($xpassword)-1; $i >= 0; $i--) {
            //$decode .= Chr(ord(substr($xpassword, $i, 1)) - 104);
            $decode .= ord(substr($xpassword, $i, 1));
        }*/
        $decode = $xpassword/2222;
        return $decode;
    }
	
	
	if (!function_exists('get_name')) {

        function get_name($fieldId,$fieldName,$id,$table) {
            $CI = & get_instance();
            $CI->load->model('Common_m');
            $Name_q = $CI->Common_m->select_option_name($fieldId,$fieldName,$id,$table);
            $Name = $Name_q['0']['Name'];
            return $Name;
        }
        
        
        	
    if (!function_exists('get_photo')) {

        function get_photo($fieldId, $fieldName, $id, $table) {
            $CI = & get_instance();
            $CI->load->model('Common_m');
            $Name_q = $CI->Common_m->select_option_name($fieldId, $fieldName, $id, $table);
            if($Name_q){
                $Name = $Name_q['0']['Name'];
            }else{
                $Name = '';
            }
            return $Name;
        }

    }
}