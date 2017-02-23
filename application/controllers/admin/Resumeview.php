<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resumeview extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
        $this->load->model('Admin_m');
        check_admin_login();
    }

    public function index() {
		$data = array();
        $data['page'] = 'myResume';
        $data['page_title'] = 'My Resume';
        //Login check
        check_user_login();
        if($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
            $data['Myresume'] = $this->Common_m->selectMyresume($data['UserId']);          
            //echo '<pre/>';print_r($data['Myresume']);   exit();             
        endif;
        $data['main_content'] = $this->load->view('myresume', $data, TRUE);
        $this->load->view('index', $data);
    }    
   
}


