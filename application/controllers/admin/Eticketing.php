<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eticketing extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_admin_login();
        $this->load->model('Common_m');
        $this->load->model('Admin_m');
        $this->load->helper('admin');
    }

    public function index() {
        $data = array();
        $data['page'] = 'Eticketing';
        $data['page_title'] = 'Admin Login';
        $data['ajax'] = $this->load->view('admin/ajax', $data, TRUE);
        
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/eticketing', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    public function loadSubCategory(){
       $data = array();
       $ECategoryId = $this->input->get('loadESubCategory',TRUE);
       $data['return'] = $this->admin_m->SelectQuery($FieldName='*',$TableName='LESubCategory',$Where=" ECategoryId = '$ECategoryId'  ",$Order='');     
       echo json_encode($data['return']);
       //return json_encode($data['return']);
    }
    public function insertEticket(){
        $EmpCode = $this->session->userdata("EmpCode");
        $subject = $this->input->post('subject',TRUE);
        $ECategoryId = $this->input->post('ECategoryId',TRUE);
        $ESubCategory = $this->input->post('ESubCategory',TRUE);
        $DepartmentId = $this->input->post('DepartmentId',TRUE);
        $details = $this->input->post('details',TRUE);
        
        $data = array(
           'ECategoryId' => $ECategoryId,
           'ESubCategoryId' => $ESubCategory,
           'DeptCode' => $DepartmentId,
           'Subject' => mssql_escape($subject),
           'Details' => mssql_escape($details),
           'EntryBy' => $EmpCode
        );
        
        $data['return'] = $this->admin_m->InsertETicket($data,'ETicketin');
        if($data['return'] == 1){
            echo '1';
        }else{
            echo '0';
        }
        //echo json_encode($_POST);   
    }
}
