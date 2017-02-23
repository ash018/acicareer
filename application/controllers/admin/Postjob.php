<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postjob extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_admin_login();
        $this->load->model('Common_m');
        $this->load->model('admin_m');
        $this->load->helper('admin');
    }

    public function index() {
        $data = array();
        $data['page'] = 'postjob';
        $data['page_title'] = 'Post New Job';
        
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->admin_m->userinfo($empcode);
           // print_r($empcode); exit();
        $data['CurrentVacancy'] = $this->Common_m->current_vacancy();
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/postjob', $data, TRUE);   
        $data['ajax'] = $this->load->view('admin/ajax', $data, TRUE); 
        $this->load->view('admin/index', $data);
    }
    
    public function docreate(){
        
        $data['Department'] = mssql_escape($this->input->post('Department',TRUE));
        $data['JobCategory'] = '0';//mssql_escape($this->input->post('JobCategory',TRUE));
        $data['JobTitel'] = mssql_escape($this->input->post('JobTitel',TRUE));
        $data['Vacancy'] = mssql_escape($this->input->post('Vacancy',TRUE));
        $data['JobDescription'] = mssql_escape($this->input->post('JobDescription',TRUE));
        $data['JobNature'] = mssql_escape($this->input->post('JobNature',TRUE));
        $data['EducationalRequirements'] = mssql_escape($this->input->post('EducationalRequirements',TRUE));
        $data['FunctionalRequirements'] = mssql_escape($this->input->post('FunctionalRequirements',TRUE));
        $data['BehavioralRequirements'] = mssql_escape($this->input->post('BehavioralRequirements',TRUE));
        $data['JobRequirements'] = mssql_escape($this->input->post('JobRequirements',TRUE));
        $data['JobLevel'] = mssql_escape($this->input->post('JobLevel',TRUE));
        $data['Salary'] = mssql_escape($this->input->post('Salary',TRUE));
        $data['JobLocation'] = mssql_escape($this->input->post('JobLocation',TRUE));
        $data['OtherBenefits'] = mssql_escape($this->input->post('OtherBenefits',TRUE));
        $data['ApplicationDeadline'] = mssql_escape($this->input->post('ApplicationDeadline',TRUE));
        $data['Experience'] = mssql_escape($this->input->post('Experience',TRUE));
        
        $data['return'] = $this->admin_m->INSERTJobPost($data);
        if($data['return'] == 1){
            redirect(base_url().'admin/postjob/');
        }else{
            echo '0';
        }
    }
    
    public function jobList(){
        $data['page'] = 'joblist';
        $data['page_title'] = 'Job List';
        $data['joblists'] = $this->admin_m->joblists();
        //echo '</pre>'; print_r($data['joblists']); exit();
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->admin_m->userinfo($empcode);
        $data['CurrentVacancy'] = $this->Common_m->current_vacancy();    
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/job_list_pagi', $data, TRUE);   
        //$data['ajax'] = $this->load->view('admin/ajax', $data, TRUE); 
        $this->load->view('admin/index', $data);
    }
    
    public function content_displayer() {
        if (isset($_POST['page']) && !empty($_POST['page'])) {
            $vpb_page_limit = 10;
            $vpb_get_total_pages = $this->admin_m->selectData('JobPost');
            $vpb_get_total_pages = $vpb_get_total_pages[0]['num'];

            $vpb_pagination_stages = 2;
            $vpb_current_page = strip_tags($_POST['page']);
            $vpb_start_page = ($vpb_current_page - 1) * $vpb_page_limit;

            //This initializes the page setup
            if ($vpb_current_page == 0) {
                $vpb_current_page = 1;
            }
            $vpb_previous_page = $vpb_current_page - 1;
            $vpb_next_page = $vpb_current_page + 1;
            $vpb_last_page = ceil($vpb_get_total_pages / $vpb_page_limit);
            $vpb_lastpaged = $vpb_last_page - 1;
            $vpb_pagination_system = '';
            if ($vpb_last_page > 1) {
                $vpb_pagination_system .= "<div class='vpb_pagination_system'>";
                // Previous Page
                if ($vpb_current_page > 1) {
                    $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_previous_page\");'>Prev</a>";
                } else {
                    $vpb_pagination_system.= "<span class='disabled'>Prev</span>";
                }
                // Pages	
                if ($vpb_last_page < 7 + ($vpb_pagination_stages * 2)) { // Not enough pages to breaking it up
                    for ($vpb_page_counter = 1; $vpb_page_counter <= $vpb_last_page; $vpb_page_counter++) {
                        if ($vpb_page_counter == $vpb_current_page) {
                            $vpb_pagination_system.= "<span class='current'>$vpb_page_counter</span>";
                        } else {
                            $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_page_counter\");'>$vpb_page_counter</a>";
                        }
                    }
                } elseif ($vpb_last_page > 5 + ($vpb_pagination_stages * 2)) { // This hides few pages when the displayed pages are much
                    //Beginning only hide later pages
                    if ($vpb_current_page < 1 + ($vpb_pagination_stages * 2)) {
                        for ($vpb_page_counter = 1; $vpb_page_counter < 4 + ($vpb_pagination_stages * 2); $vpb_page_counter++) {
                            if ($vpb_page_counter == $vpb_current_page) {
                                $vpb_pagination_system.= "<span class='current'>$vpb_page_counter</span>";
                            } else {
                                $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_page_counter\");'>$vpb_page_counter</a>";
                            }
                        }
                        $vpb_pagination_system.= "...";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_lastpaged\");'>$vpb_lastpaged</a>";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_last_page\");'>$vpb_last_page</a>";
                    }
                    //Middle hide some front and some back
                    elseif ($vpb_last_page - ($vpb_pagination_stages * 2) > $vpb_current_page && $vpb_current_page > ($vpb_pagination_stages * 2)) {
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"1\");'>1</a>";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"2\");'>2</a>";
                        $vpb_pagination_system.= "...";
                        for ($vpb_page_counter = $vpb_current_page - $vpb_pagination_stages; $vpb_page_counter <= $vpb_current_page + $vpb_pagination_stages; $vpb_page_counter++) {
                            if ($vpb_page_counter == $vpb_current_page) {
                                $vpb_pagination_system.= "<span class='current'>$vpb_page_counter</span>";
                            } else {
                                $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_page_counter\");'>$vpb_page_counter</a>";
                            }
                        }
                        $vpb_pagination_system.= "...";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_lastpaged\");'>$vpb_lastpaged</a>";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_last_page\");'>$vpb_last_page</a>";
                    }
                    //End only hide early pages
                    else {
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"1\");'>1</a>";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"2\");'>2</a>";
                        $vpb_pagination_system.= "...";
                        for ($vpb_page_counter = $vpb_last_page - (2 + ($vpb_pagination_stages * 2)); $vpb_page_counter <= $vpb_last_page; $vpb_page_counter++) {
                            if ($vpb_page_counter == $vpb_current_page) {
                                $vpb_pagination_system.= "<span class='current'>$vpb_page_counter</span>";
                            } else {
                                $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_page_counter\");'>$vpb_page_counter</a>";
                            }
                        }
                    }
                }
                //Next Page
                if ($vpb_current_page < $vpb_page_counter - 1) {
                    $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_next_page\");'>Next</a>";
                } else {
                    $vpb_pagination_system.= "<span class='disabled'>Next</span>";
                }
                $vpb_pagination_system.= "</div>";
            }
            
            $data['vpb_pagination_system'] = $vpb_pagination_system;
            //Check the contents for this page from the database
            $data['rows'] = $this->admin_m->selectJobListData($vpb_start_page, $vpb_page_limit);
            $data['vpb_start_page'] = $vpb_start_page;
            if (count($data['rows']) < 1) {
                echo "<div class='info'>Currently, there are no content in the database to display at the moment. Thanks...</div>";
            } else {
                $this->load->view('admin/get_job_list', $data);
            }
        }
    }
       
    public function editJob($PostId){
        $data['page'] = 'postjob';
        $data['page_title'] = 'Edit Post Job';
        
        //echo $cvid; die();
        $data['row'] = $this->admin_m->fiendJob($PostId);
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->admin_m->userinfo($empcode);
           // print_r($empcode); exit();
        $data['CurrentVacancy'] = $this->Common_m->current_vacancy();
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/postjob', $data, TRUE);   
        $data['ajax'] = $this->load->view('admin/ajax', $data, TRUE); 
        $this->load->view('admin/index', $data);

    }
    public function updateJob(){
        $data['PostId'] = mssql_escape($this->input->post('PostId',TRUE));
        $data['Department'] = mssql_escape($this->input->post('Department',TRUE));
        $data['JobCategory'] = '0';//mssql_escape($this->input->post('JobCategory',TRUE));
        $data['JobTitel'] = mssql_escape($this->input->post('JobTitel',TRUE));
        $data['Vacancy'] = mssql_escape($this->input->post('Vacancy',TRUE));
        $data['JobDescription'] = mssql_escape($this->input->post('JobDescription',TRUE));
        $data['JobNature'] = mssql_escape($this->input->post('JobNature',TRUE));
        $data['EducationalRequirements'] = mssql_escape($this->input->post('EducationalRequirements',TRUE));
        $data['FunctionalRequirements'] = mssql_escape($this->input->post('FunctionalRequirements',TRUE));
        $data['BehavioralRequirements'] = mssql_escape($this->input->post('BehavioralRequirements',TRUE));
        $data['JobRequirements'] = mssql_escape($this->input->post('JobRequirements',TRUE));
        $data['JobLevel'] = mssql_escape($this->input->post('JobLevel',TRUE));
        $data['Salary'] = mssql_escape($this->input->post('Salary',TRUE));
        $data['JobLocation'] = mssql_escape($this->input->post('JobLocation',TRUE));
        $data['OtherBenefits'] = mssql_escape($this->input->post('OtherBenefits',TRUE));
        $data['ApplicationDeadline'] = mssql_escape($this->input->post('ApplicationDeadline',TRUE));
        $data['Experience'] = mssql_escape($this->input->post('Experience',TRUE));
        $cvid = $data['PostId'];
        $res = $this->admin_m->updateJob($data);
        if($res){
            redirect('admin/Postjob/joblist', 'refresh');
          }
        else {
             $data['page'] = 'Eticketing';
             $data['page_title'] = 'Edit Job';
             $data['postedjob'] = $this->admin_m->fiendJob($cvid);
             $data['postedjob'] = $this->admin_m->fiendJob($cvid);

             $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
             $data['main_content'] = $this->load->view('admin/editjob', $data, TRUE);   
             $data['ajax'] = $this->load->view('admin/ajax', $data, TRUE); 
             $this->load->view('admin/index', $data);
        }
      }
	
	public function currentvacancyDetailView($DepartmentId) {
		$data = array();
        $data['page'] = 'currentvacancydetail';
        $data['page_title'] = 'Current Vacancy Detail View';
		//$data['DepartmentId'] = $DepartmentId;		
        $data['Department'] = $this->Common_m->current_vacancy_detailview($DepartmentId);		
        //echo '<pre/>';print_r($data['Department']);exit();
        $data['main_content'] = $this->load->view('admin/currentvacancy_detail_view', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
	
	public function jobwiseapplication($PostId) {
		$data = array();
        $data['page'] = 'currentvacancydetail';
        $data['page_title'] = 'Job Wise Application';			
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->admin_m->userinfo($empcode);
		
		$data['PostJob'] = $this->Common_m->jobwise_application($PostId);		
        //echo '<pre/>';print_r($data['Department']);exit();
		$data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/job_wise_application', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
	
	
    
    
}
