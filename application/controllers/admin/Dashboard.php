<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
        $this->load->model('Admin_m');
    }

    public function index() {
        $data = array();
        $data['page'] = 'Eticketing';
        $data['page_title'] = 'Admin Login';
        
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/dashboard', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
}
