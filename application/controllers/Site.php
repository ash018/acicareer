<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
    }

    public function index() {
//        echo '<pre/>';print_r($this->session);exit();
        $data = array();
        $data['page'] = 'Dashboard';
        $data['page_title'] = 'Dashboard';
        $data['userid'] = $this->session->userdata('userid');
        $data['emp_name'] = $this->session->userdata('emp_name');
        $data['dept_name'] = $this->session->userdata('dept_name');
        $data['designation'] = $this->session->userdata('designation');

        $data['footer'] = $this->load->view('loginfooter', $data, TRUE);
        $data['main_content'] = $this->load->view('dash', $data, TRUE);
        $this->load->view('index', $data);
    }
    

}
