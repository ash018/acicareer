<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
        $this->load->model('admin_m');
    }
    public function index() {
        
        if ($this->input->post()) {		
            $query = $this->admin_m->validate_admin();
            //echo '<pre/>';print_r($query);exit();    
            if ($query) {
                $data = array();
                foreach ($query as $row) {
                    $data = array(
                        'Id' => $row->Id,
                        'EmpCode' => $row->EmpCode,
                        'Status' => $row->Status,
                        'is_log_admin' => TRUE
                    );
                    
                    //echo '<pre/>';print_r($data);exit();    
                    $this->session->set_userdata($data);
                }
                redirect('admin/postjob/joblist');
            } else {
                $msg['message'] = "<div class=\"alert fade alert-error in\"><button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button><strong>Incorrect Username or Password</strong></div>";
                $this->session->set_userdata($msg);
                redirect(base_url('admin/adminlogin'));
            }
        } else {
            $data = array();
            $data['page'] = 'AdminLogin';
            $data['page_title'] = 'Admin Login';            
            $data['main_content'] = $this->load->view('admin/adminLogin', $data, TRUE);
            $this->load->view('admin/index', $data);
        }
    }
    
    public function privacy_policy() {        
        $data = array();
        $data['page'] = 'AdminLogin';
        $data['page_title'] = 'Privacy Policy';            
        $data['main_content'] = $this->load->view('admin/privacy_policy', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    public function site_map() {        
        $data = array();
        $data['page'] = 'AdminLogin';
        $data['page_title'] = 'Site map';            
        $data['main_content'] = $this->load->view('admin/site_map', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    public function contact_us() {        
        $data = array();
        $data['page'] = 'AdminLogin';
        $data['page_title'] = 'Contact us';            
        $data['main_content'] = $this->load->view('admin/contact_us', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('is_log_admin');
        $this->session->set_userdata($msg);
        redirect(base_url('admin/adminlogin'));
    }
    
    public function forgot_password() {
        $data = array();        
        $data['page'] = 'AdminLogin';
        $data['page_title'] = 'Forgot Password';            
        $data['main_content'] = $this->load->view('admin/forgot_password', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function forgot_password_action() {
        $data = array();
        echo '<pre/>';print_r($_POST); exit();
        if (isset($_POST)) {
            $EmailId = $this->input->post('EmailId');
            $query = $this->admin_m->select_option();
        }
        $data['page'] = 'AdminLogin';
        $data['page_title'] = 'Forgot Password';            
        $data['main_content'] = $this->load->view('admin/forgot_password', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

}
