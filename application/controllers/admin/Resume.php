<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_admin_login();
        $this->load->model('Admin_m');
    }

    public function index() {
        $data = array();
        $data['page'] = 'resume';
        $data['page_title'] = 'View Resume';        
        $data['AllResume'] = $this->Admin_m->selectAppliedResume();        
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        $data['CompanyName'] = $this->Admin_m->CompanyName();
       
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/all_resume', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }
    
    
    public function unshortlisted(){
        $shortlistid = $this->uri->segment(4);  
        $this->Admin_m->deleteshortlist($shortlistid);
        redirect('admin/resume/cvsummary');     
    }
    
    public function cvsummary() {
        //echo '<pre/>';print_r($_POST);exit();
        $data = array();
        $data['page'] = 'resume';
        $data['page_title'] = 'CV Summary';
        if ($_POST) {
            $data['UserName'] = $this->input->post('UserName', TRUE);
            $data['Gender'] = $this->input->post('Gender', TRUE);
            $data['JobTitel'] = $this->input->post('JobTitel', TRUE);
            $data['ExpectedSalary'] = $this->input->post('ExpectedSalary', TRUE);
            $data['Mobile'] = $this->input->post('Mobile', TRUE);
            $data['Email'] = $this->input->post('Email', TRUE);
            $submit = $this->input->post('submit', TRUE);
        } else {
            $data['UserName'] = 'UserName';
            $data['Gender'] = 'Gender';
            $data['JobTitel'] = 'JobTitel';
            $data['ExpectedSalary'] = 'ExpectedSalary';
            $data['Mobile'] = '';
            $data['Email'] = '';
            $submit = 'Go';
        }

        $empcode = $this->session->userdata('EmpCode');
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        $data['CompanyName'] = $this->Admin_m->CompanyName();
        if ($submit == 'Go') {
            $data['AllResume'] = $this->Admin_m->selectShortlistRecommendation($data);
            $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
            $data['main_content'] = $this->load->view('admin/all_resume', $data, TRUE);
            $this->load->view('admin/index', $data);
        } else {
            $all_customer_data = $this->Admin_m->selectcvsummaryExport($data);
            $filename = 'CV_Summary.csv';
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($all_customer_data, $delimiter, $newline);
            force_download($filename, $data);
        }
    }

    public function updateuserinfo(){
        $data = array();
        $data['page'] = 'resume';
        $data['page_title'] = 'CV Summary';  
        $empcode = $this->session->userdata('EmpCode'); 
         
        if(!empty($_POST) and $_POST['update'] == 'Update'){
            //print "<pre />"; print_r($_FILES); exit();
            if(!empty($_FILES['photo']['name'])){
                $config['upload_path']          = './assets/image/adminuser/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 50000;
                
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('photo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                   // print "<pre />"; print_r($error); exit();
                }
                else
                {
                    $file = array('upload_data' => $this->upload->data());   
                    $fileName = $file['upload_data']['file_name']; 
                    $this->Admin_m->updateuserinfophoto($fileName,$empcode);        
                    //print "<pre />"; print_r($fileName); exit();                    
                }                
            }
            
            $name = $this->input->post('name',TRUE);    
            $designation = $this->input->post('designation',TRUE);
            $this->Admin_m->updateuserinfo($name,$designation,$empcode);        
        }        
         
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/updateuserinfo', $data, TRUE);        
        $this->load->view('admin/index', $data);    
    }
	
    public function resumeDetails($id) {
        $data = array();
        $data['page'] = 'ResumeDetils';
        $data['page_title'] = 'Resume Detail';        
        $data['resumeDetails'] = $this->Admin_m->selectResumeDetails($id);
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        $data['CompanyName'] = $this->Admin_m->CompanyName(); 
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/resumeDetails', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }
    
    public  function cvsummaryExport(){

        $all_customer_data = $this->Admin_m->selectcvsummaryExport();
        $filename = 'CV_Summary.csv';
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($all_customer_data, $delimiter, $newline);
        force_download($filename, $data);
    }
	
	public  function filterOneAction(){
	    $data = array();
        $data['page'] = 'filterOneAction';
        $data['page_title'] = 'Search CV';  
        $data['CompanyName'] = $this->Admin_m->CompanyName(); 
		$data['UniversityName'] = $this->Admin_m->UniversityName();
		$data['jobtitle'] = $this->Admin_m->JobTitle();		
		//echo '<pre/>';print_r($_POST); exit();
        
        if(!empty($_GET['page'])){
            $page = $_GET['page'];    
        }else{
            $page = 1;   
        }
        
		if (!empty($_POST)) {
				$UserName = $this->input->post('UserName');
				$ExpectedSalaryFrom = $this->input->post('ExpectedSalaryFrom');
				$ExpectedSalaryTo = $this->input->post('ExpectedSalaryTo');
				$AgeFrom =  $this->input->post('AgeFrom');
				$AgeTo =  $this->input->post('AgeTo');
				$JobTitel = $this->input->post('JobTitel');
				$Gender =  $this->input->post('Gender');              
				$JobLevel = $this->input->post('JobLevel'); 
                
                
			  
				empty($UserName)  ?  $UserName = '%' :  $UserName;
				empty($ExpectedSalaryFrom)  ?  $ExpectedSalaryFrom = '0' :  $ExpectedSalaryFrom;
				empty($ExpectedSalaryTo)  ?  $ExpectedSalaryTo = '10000000' :  $ExpectedSalaryTo;
				empty($AgeFrom)  ?  $AgeFrom = '-100' :  $AgeFrom;
				empty($AgeTo)  ?  $AgeTo = '100' :  $AgeTo;
				empty($JobTitel)  ?  $JobTitel = '%' :  $JobTitel;
				empty($Gender)  ?  $Gender = '' :  $Gender;
				empty($JobLevel)  ?  $JobLevel = '' :  $JobLevel;				
				empty($JobLocation)  ?  $JobLocation = '%' :  $JobLocation;
				empty($MinimumEducationLevel)  ?  $MinimumEducationLevel = '' :  $MinimumEducationLevel;
				empty($DegreeName)  ?  $DegreeName = '' :  $DegreeName;
				empty($MajorSubject)  ?  $MajorSubject = '' :  $MajorSubject;
				empty($Result)  ?  $Result = '' :  $Result;
				empty($InstituteName)  ?  $InstituteName = '' :  $InstituteName;
				empty($ExperienceFrom)  ?  $ExperienceFrom = '-100' :  $ExperienceFrom;
				empty($ExperienceTo)  ?  $ExperienceTo = '100' :  $ExperienceTo;
				empty($CompanyName)  ?  $CompanyName = '' :  $CompanyName;
           
                $this->session->set_userdata('UserName',$UserName);
                $this->session->set_userdata('ExpectedSalaryFrom',$ExpectedSalaryFrom);
                $this->session->set_userdata('ExpectedSalaryTo',$ExpectedSalaryTo);
                $this->session->set_userdata('AgeFrom',$AgeFrom);
                $this->session->set_userdata('AgeTo',$AgeTo);
                $this->session->set_userdata('JobTitel',$JobTitel);
                $this->session->set_userdata('Gender',$Gender);
                $this->session->set_userdata('JobLevel',$JobLevel);
                $this->session->set_userdata('JobLocation',$JobLocation);
                $this->session->set_userdata('MinimumEducationLevel',$MinimumEducationLevel);
                $this->session->set_userdata('DegreeName',$DegreeName);
                $this->session->set_userdata('MajorSubject',$MajorSubject);
                $this->session->set_userdata('Result',$Result);
                $this->session->set_userdata('InstituteName',$InstituteName);
                $this->session->set_userdata('ExperienceFrom',$ExperienceFrom);
                $this->session->set_userdata('ExperienceTo',$ExperienceTo);
			    $this->session->set_userdata('CompanyName',$CompanyName);
                
						
		}else{
                $UserName = $this->session->userdata('UserName');
                $ExpectedSalaryFrom = $this->session->userdata('ExpectedSalaryFrom');
                $ExpectedSalaryTo = $this->session->userdata('ExpectedSalaryTo');
                $AgeFrom = $this->session->userdata('AgeFrom');
                $AgeTo = $this->session->userdata('AgeTo');
                $JobTitel = $this->session->userdata('JobTitel');
                $Gender = $this->session->userdata('Gender');
                $JobLevel = $this->session->userdata('JobLevel');
                $JobLocation = $this->session->userdata('JobLocation');
                $MinimumEducationLevel = $this->session->userdata('MinimumEducationLevel');
                $DegreeName = $this->session->userdata('DegreeName');
                $MajorSubject = $this->session->userdata('MajorSubject');
                $Result = $this->session->userdata('Result');
                $InstituteName = $this->session->userdata('InstituteName');
                $ExperienceFrom = $this->session->userdata('ExperienceFrom');
                $ExperienceTo = $this->session->userdata('ExperienceTo');
                $CompanyName = $this->session->userdata('CompanyName');    
        }
        
            $sdata = $this->Admin_m->selectAllResume($UserName, 
            $JobTitel,$JobLocation, $AgeFrom, $AgeTo, $Gender, $JobLevel,$ExpectedSalaryFrom,
            $ExpectedSalaryTo,$MinimumEducationLevel,
            $DegreeName, $MajorSubject, $Result, $InstituteName,
            $ExperienceFrom, $ExperienceTo, $CompanyName, $page);
            
            $data['AllResume'] = $sdata['AllResume'];
            $data['shortlist'] = $sdata['shortlist'];
            $data['paging'] = $sdata['paging']; 
		//echo '<pre/>';print_r($_POST); exit();
		$data['row'] = $this->Admin_m->TotalShortList();
		$this->load->view('admin/search', $data);
        
    }
    
    
    public  function advancefilter(){
		$data = array();
        $data['page'] = 'advancefilter';
        $data['page_title'] = 'Search CV';
        $data['CompanyName'] = $this->Admin_m->CompanyName();
		$data['UniversityName'] = $this->Admin_m->UniversityName();
		$data['jobtitle'] = $this->Admin_m->JobTitle();		
        //echo '<pre/>';print_r($_POST); exit();
        
        if(!empty($_GET['page'])){
            $page = $_GET['page'];    
        }else{
            $page = 1;   
        }
        
        if (!empty($_POST)) {
              $MinimumEducationLevel = $this->input->post('MinimumLevelofDegree');
              $MajorSubject = $this->input->post('MejorSubject');
              $InstituteName =  $this->input->post('Institute');
              $DegreeName =  $this->input->post('DegreeName');
              $Result = $this->input->post('Result');              
		
		empty($UserName)  ?  $UserName = '%' :  $UserName;
		empty($ExpectedSalaryFrom)  ?  $ExpectedSalaryFrom = '0' :  $ExpectedSalaryFrom;
		empty($ExpectedSalaryTo)  ?  $ExpectedSalaryTo = '10000000' :  $ExpectedSalaryTo;
		empty($AgeFrom)  ?  $AgeFrom = '-100' :  $AgeFrom;
		empty($AgeTo)  ?  $AgeTo = '100' :  $AgeTo;
		empty($JobTitel)  ?  $JobTitel = '%' :  $JobTitel;
		empty($Gender)  ?  $Gender = '' :  $Gender;
		empty($JobLevel)  ?  $JobLevel = '' :  $JobLevel;				
		empty($JobLocation)  ?  $JobLocation = '%' :  $JobLocation;
		empty($MinimumEducationLevel)  ?  $MinimumEducationLevel = '' :  $MinimumEducationLevel;
		empty($DegreeName)  ?  $DegreeName = '' :  $DegreeName;
		empty($MajorSubject)  ?  $MajorSubject = '' :  $MajorSubject;
		empty($Result)  ?  $Result = '' :  $Result;
		empty($InstituteName)  ?  $InstituteName = '' :  $InstituteName;
		empty($ExperienceFrom)  ?  $ExperienceFrom = '-100' :  $ExperienceFrom;
		empty($ExperienceTo)  ?  $ExperienceTo = '100' :  $ExperienceTo;
		empty($CompanyName)  ?  $CompanyName = '' :  $CompanyName;		
        
        $this->session->set_userdata('UserName',$UserName);
        $this->session->set_userdata('ExpectedSalaryFrom',$ExpectedSalaryFrom);
        $this->session->set_userdata('ExpectedSalaryTo',$ExpectedSalaryTo);
        $this->session->set_userdata('AgeFrom',$AgeFrom);
        $this->session->set_userdata('AgeTo',$AgeTo);
        $this->session->set_userdata('JobTitel',$JobTitel);
        $this->session->set_userdata('Gender',$Gender);
        $this->session->set_userdata('JobLevel',$JobLevel);
        $this->session->set_userdata('JobLocation',$JobLocation);
        $this->session->set_userdata('MinimumEducationLevel',$MinimumEducationLevel);
        $this->session->set_userdata('DegreeName',$DegreeName);
        $this->session->set_userdata('MajorSubject',$MajorSubject);
        $this->session->set_userdata('Result',$Result);
        $this->session->set_userdata('InstituteName',$InstituteName);
        $this->session->set_userdata('ExperienceFrom',$ExperienceFrom);
        $this->session->set_userdata('ExperienceTo',$ExperienceTo);
        $this->session->set_userdata('CompanyName',$CompanyName);
	    
		
		}else{
            $UserName = $this->session->userdata('UserName');
            $ExpectedSalaryFrom = $this->session->userdata('ExpectedSalaryFrom');
            $ExpectedSalaryTo = $this->session->userdata('ExpectedSalaryTo');
            $AgeFrom = $this->session->userdata('AgeFrom');
            $AgeTo = $this->session->userdata('AgeTo');
            $JobTitel = $this->session->userdata('JobTitel');
            $Gender = $this->session->userdata('Gender');
            $JobLevel = $this->session->userdata('JobLevel');
            $JobLocation = $this->session->userdata('JobLocation');
            $MinimumEducationLevel = $this->session->userdata('MinimumEducationLevel');
            $DegreeName = $this->session->userdata('DegreeName');
            $MajorSubject = $this->session->userdata('MajorSubject');
            $Result = $this->session->userdata('Result');
            $InstituteName = $this->session->userdata('InstituteName');
            $ExperienceFrom = $this->session->userdata('ExperienceFrom');
            $ExperienceTo = $this->session->userdata('ExperienceTo');
            $CompanyName = $this->session->userdata('CompanyName');     
        }
        
        $sdata = $this->Admin_m->selectAllResume($UserName, 
            $JobTitel,$JobLocation, $AgeFrom, $AgeTo, $Gender, $JobLevel,$ExpectedSalaryFrom,
            $ExpectedSalaryTo,$MinimumEducationLevel,
            $DegreeName, $MajorSubject, $Result, $InstituteName,
            $ExperienceFrom, $ExperienceTo, $CompanyName, $page);
            
        $data['AllResume'] = $sdata['AllResume'];
        $data['shortlist'] = $sdata['shortlist'];
        $data['paging'] = $sdata['paging']; 
        
        $data['row'] = $this->Admin_m->TotalShortList();
		
        $this->load->view('admin/search', $data);
		
        
    }
    
    
    
    public  function experience(){
		$data = array();
        $data['page'] = 'experience';
        $data['page_title'] = 'Search CV';
        $data['CompanyName'] = $this->Admin_m->CompanyName();  
		$data['UniversityName'] = $this->Admin_m->UniversityName();
		$data['jobtitle'] = $this->Admin_m->JobTitle();		
        //echo '<pre/>';print_r($_POST); exit();
        
        
        if(!empty($_GET['page'])){
            $page = $_GET['page'];    
        }else{
            $page = 1;   
        }
        
        if (!empty($_POST)) {
			$ExperienceFrom = $this->input->post('ExperienceFrom');
			$ExperienceTo = $this->input->post('ExperienceTo');
			$CompanyName =  $this->input->post('InstituteName');
              
			empty($UserName)  ?  $UserName = '%' :  $UserName;
			empty($ExpectedSalaryFrom)  ?  $ExpectedSalaryFrom = '0' :  $ExpectedSalaryFrom;
			empty($ExpectedSalaryTo)  ?  $ExpectedSalaryTo = '10000000' :  $ExpectedSalaryTo;
			empty($AgeFrom)  ?  $AgeFrom = '-100' :  $AgeFrom;
			empty($AgeTo)  ?  $AgeTo = '100' :  $AgeTo;
			empty($JobTitel)  ?  $JobTitel = '%' :  $JobTitel;
			empty($Gender)  ?  $Gender = '' :  $Gender;
			empty($JobLevel)  ?  $JobLevel = '' :  $JobLevel;				
			empty($JobLocation)  ?  $JobLocation = '%' :  $JobLocation;
			empty($MinimumEducationLevel)  ?  $MinimumEducationLevel = '' :  $MinimumEducationLevel;
			empty($DegreeName)  ?  $DegreeName = '' :  $DegreeName;
			empty($MajorSubject)  ?  $MajorSubject = '' :  $MajorSubject;
			empty($Result)  ?  $Result = '' :  $Result;
			empty($InstituteName)  ?  $InstituteName = '' :  $InstituteName;
			empty($ExperienceFrom)  ?  $ExperienceFrom = '-100' :  $ExperienceFrom;
			empty($ExperienceTo)  ?  $ExperienceTo = '100' :  $ExperienceTo;
			empty($CompanyName)  ?  $CompanyName = '' :  $CompanyName;	
            
            $this->session->set_userdata('UserName',$UserName);
            $this->session->set_userdata('ExpectedSalaryFrom',$ExpectedSalaryFrom);
            $this->session->set_userdata('ExpectedSalaryTo',$ExpectedSalaryTo);
            $this->session->set_userdata('AgeFrom',$AgeFrom);
            $this->session->set_userdata('AgeTo',$AgeTo);
            $this->session->set_userdata('JobTitel',$JobTitel);
            $this->session->set_userdata('Gender',$Gender);
            $this->session->set_userdata('JobLevel',$JobLevel);
            $this->session->set_userdata('JobLocation',$JobLocation);
            $this->session->set_userdata('MinimumEducationLevel',$MinimumEducationLevel);
            $this->session->set_userdata('DegreeName',$DegreeName);
            $this->session->set_userdata('MajorSubject',$MajorSubject);
            $this->session->set_userdata('Result',$Result);
            $this->session->set_userdata('InstituteName',$InstituteName);
            $this->session->set_userdata('ExperienceFrom',$ExperienceFrom);
            $this->session->set_userdata('ExperienceTo',$ExperienceTo);
            $this->session->set_userdata('CompanyName',$CompanyName);
            
			
			            
        }else{
            $UserName = $this->session->userdata('UserName');
            $ExpectedSalaryFrom = $this->session->userdata('ExpectedSalaryFrom');
            $ExpectedSalaryTo = $this->session->userdata('ExpectedSalaryTo');
            $AgeFrom = $this->session->userdata('AgeFrom');
            $AgeTo = $this->session->userdata('AgeTo');
            $JobTitel = $this->session->userdata('JobTitel');
            $Gender = $this->session->userdata('Gender');
            $JobLevel = $this->session->userdata('JobLevel');
            $JobLocation = $this->session->userdata('JobLocation');
            $MinimumEducationLevel = $this->session->userdata('MinimumEducationLevel');
            $DegreeName = $this->session->userdata('DegreeName');
            $MajorSubject = $this->session->userdata('MajorSubject');
            $Result = $this->session->userdata('Result');
            $InstituteName = $this->session->userdata('InstituteName');
            $ExperienceFrom = $this->session->userdata('ExperienceFrom');
            $ExperienceTo = $this->session->userdata('ExperienceTo');
            $CompanyName = $this->session->userdata('CompanyName');      
        }
        
        
        $sdata = $this->Admin_m->selectAllResume($UserName, 
            $JobTitel,$JobLocation, $AgeFrom, $AgeTo, $Gender, $JobLevel,$ExpectedSalaryFrom,
            $ExpectedSalaryTo,$MinimumEducationLevel,
            $DegreeName, $MajorSubject, $Result, $InstituteName,
            $ExperienceFrom, $ExperienceTo, $CompanyName, $page);
            
        $data['AllResume'] = $sdata['AllResume'];
        $data['shortlist'] = $sdata['shortlist'];  
        $data['paging'] = $sdata['paging']; 
        
        //echo '<pre/>';print_r($_POST); exit();
		$data['row'] = $this->Admin_m->TotalShortList();
        $this->load->view('admin/search', $data);
        
    }
	
	public  function filterRecommendation(){
		$data = array();
        $data['page'] = 'filterRecommendation';
        $data['page_title'] = 'Search CV';
		$data['CompanyName'] = $this->Admin_m->CompanyName(); 
        
        if(!empty($_GET['page'])){
            $page = $_GET['page'];    
        }else{
            $page = 1;   
        }
              
		if (!empty($_POST)) {
			$Recommondation = $this->input->post('Recommendation');
            $this->session->set_userdata('Recommondation',$Recommondation);     
		}else{
            $Recommondation = $this->session->userdata('Recommondation');  
        }
        $sdata = $this->Admin_m->SelectRecommendationSearch($Recommondation,$page);               
            $data['AllResume'] = $sdata['content'];
            $data['paging'] = $sdata['paging'];
        
        $data['row'] = $this->Admin_m->TotalShortList();
		$this->load->view('admin/searchRecommendation', $data);
        
    }
    
    
    public  function filterInternship(){
		$data = array();
        $data['page'] = 'filterInternship';
        $data['page_title'] = 'Search CV';
        //echo '<pre/>';print_r($_POST); exit();
        $data['CompanyName'] = $this->Admin_m->CompanyName();
        if(!empty($_GET['page'])){
            $page = $_GET['page'];    
        }else{
            $page = 1;   
        }
        
        if (!empty($_POST)) {
            $universityname = $this->input->post('universityname');               
            $grade = $this->input->post('grade');               
            $fromMonth = $this->input->post('fromMonth');               
            $toMonth = $this->input->post('toMonth');               
            
            $this->session->set_userdata('universityname',$universityname);
            $this->session->set_userdata('grade',$grade);
            $this->session->set_userdata('fromMonth',$fromMonth);
            $this->session->set_userdata('toMonth',$toMonth);
        }else{
            $universityname = $this->session->userdata('universityname');
            $grade = $this->session->userdata('grade');
            $fromMonth = $this->session->userdata('fromMonth');
            $toMonth = $this->session->userdata('toMonth');
        }   
        
        $sdata = $this->Admin_m->usp_searchInternship($universityname,$grade,$fromMonth,$toMonth,$page);               
                $data['AllResume'] = $sdata['content'];
                $data['paging'] = $sdata['paging'];
                
        $data['row'] = $this->Admin_m->TotalShortList();
        $this->load->view('admin/searchinternship', $data);
        
    }
    
    public function ResumeDoc($UserId){
        $data = array();
        $data['page'] = 'myResume';
        $data['page_title'] = 'My Resume';
        $data['UserId'] = $UserId;
        $this->load->model('Common_m');
        $data['Myresume'] = $this->Common_m->selectMyresume($data['UserId']);           
        $this->load->view('myresume_doc', $data);
    }
    
    public function jobWiseCVSummary(){
        $data = array();
        $data['page'] = 'jobWiseCVSummary';
        $data['page_title'] = 'View job Wise CV Summary';         
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        $data['CompanyName'] = $this->Admin_m->CompanyName();       
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['jobwise_cvsummary'] = $this->Admin_m->selectjobWiseCVSummary();  
        //echo '<pre/>';print_r($data['jobwise_cvsummary']);   exit();  
        $data['main_content'] = $this->load->view('admin/jobwise_cvsummary', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }
	
	
}
