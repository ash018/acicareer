<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
        $this->load->model('Admin_m');
        check_admin_login();
    }

    public function index() {
        $data = array();
        $data['page'] = 'filterOneAction';
        $data['page_title'] = 'View All Resume'; 
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
        
        if(!empty($_GET['page'])){
            $page = $_GET['page'];    
        }else{
            $page = 1;   
        }
        
        $data['row'] = $this->Admin_m->TotalShortList();
        $data['CompanyName'] = $this->Admin_m->CompanyName();
        $data['UniversityName'] = $this->Admin_m->UniversityName();
        $data['jobtitle'] = $this->Admin_m->JobTitle();
        
        $sdata = $this->Admin_m->selectAllResume($UserName, 
            $JobTitel,$JobLocation, $AgeFrom, $AgeTo, 
            $Gender, $JobLevel,$ExpectedSalaryFrom,
            $ExpectedSalaryTo,$MinimumEducationLevel,
            $DegreeName, $MajorSubject, $Result, $InstituteName,
            $ExperienceFrom, $ExperienceTo, $CompanyName, $page);
            
        $data['AllResume'] = $sdata['AllResume'];
        $data['shortlist'] = $sdata['shortlist'];
        $data['paging'] = $sdata['paging'];
        
        //echo '<pre/>';print_r($data['AllResume']); exit();    
        //$data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        //$data['main_content'] = $this->load->view('admin/search', $data, TRUE);        
        $this->load->view('admin/search', $data);
    }
    
    public function approveShortList(){		
        $data = array(
            'UserId' => $this->input->post('UserId', TRUE),
            'PostId' => $this->input->post('PostId', TRUE),
            'ShortList' => $this->input->post('ShortList', TRUE)
        );		
        echo $RowId_q = $this->Common_m->insert($data,'ShortList');
    }
	
    public function approveRecommendation(){
        $data = array(
            'UserId' => $this->input->post('UserId', TRUE),
            'PostId' => $this->input->post('PostId', TRUE),
            'Business' => $this->input->post('Business', TRUE),
            'Recommendation' => $this->input->post('Recommendation', TRUE)
        );
        $RowId_q = $this->Common_m->insert($data,'Recommendation');
    }
}


