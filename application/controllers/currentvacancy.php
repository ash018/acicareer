<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currentvacancy extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
    }

    public function index() {
        $data = array();
        $data['page'] = 'currentvacancy';
        $data['page_title'] = 'Current Vacancy';      

        $data['CurrentVacancy'] = $this->Common_m->current_vacancy();	
        //echo '<pre/>';print_r($data['CurrentVacancy']);exit();
		
        $data['main_content'] = $this->load->view('current_vacancy', $data, TRUE);
        $this->load->view('index', $data);
    }
	
    public  function currentvacancy_filter(){
        //echo '<pre/>';print_r($_POST); exit();
        $data = array();
        $data['page'] = 'currentvacancy';
        $data['page_title'] = 'Current Vacancy'; 
        $data['district'] = $this->input->post('district');
        $data['JobLevelId'] = $this->input->post('JobLevelId');
        if (isset($_POST)) {
            $data2 = array(
                'district'=> $data['district'],
                'JobLevelId'=> $data['JobLevelId']                  
            );
            $data['CurrentVacancy'] = $this->Common_m->selectcurrentvacancy_filter($data2);			
        }
        //echo '<pre/>';print_r($data); exit();
        //$data['main_content'] = $this->load->view('current_vacancy', $data, TRUE);
        //$this->load->view('index', $data);
        $this->load->view('currentvacancy_filter_view', $data);
    }
    
    public function currentvacancy_filter_details(){
        //echo '<pre/>';print_r($_GET); exit(); 
        $data = array();
        $data['page'] = 'currentvacancy';
        $data['page_title'] = 'Current Vacancy'; 
        $data['district'] = $this->input->get('d');
        $data['JobLevelId'] = $this->input->get('j');
        $data['DepartmentId'] = $this->input->get('de');       
            $data2 = array(
                'district'=> $data['district'],
                'JobLevelId'=> $data['JobLevelId'],
                'DepartmentId'=> $data['DepartmentId']
            );
           $data['Department'] = $this->Common_m->currentvacancy_filter_details($data2);			
        $data['AllJobs'] = $this->Common_m->option_select_homepage();
        //echo '<pre/>';print_r($data); exit();
        $data['main_content'] = $this->load->view('currentvacancy_detail_view', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function currentvacancyDetailView($DepartmentId) {
        $data = array();
        $data['page'] = 'currentvacancydetail';
        $data['page_title'] = 'Current Vacancy Detail View';
        //$data['DepartmentId'] = $DepartmentId;		
        $data['Department'] = $this->Common_m->current_vacancy_detailview($DepartmentId);		
        $data['AllJobs'] = $this->Common_m->option_select_homepage();
//           echo '<pre/>';print_r($data['AllJobs']);exit();
        $data['main_content'] = $this->load->view('currentvacancy_detail_view', $data, TRUE);
        $this->load->view('index', $data);
    }
	

}
