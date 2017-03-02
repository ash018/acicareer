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
        $UserId = $this->input->post('UserId', TRUE);
        $PostId = $this->input->post('PostId', TRUE);
        $ShortList = $this->input->post('ShortList', TRUE);
        $tracking_shortlist = $this->Common_m->duplicate_checking_shortlist_check($UserId,$PostId,$ShortList,'ShortList');
        if (count($tracking_shortlist) == 1) {
            switch ($ShortList) {
                case 1:
                    $msg['message'] = "Shortlist";
                    break;
                case 25:
                    $msg['message'] = "Deleted";
                    break;
            }
            $msg['message'] = "";
            header('Content-type:application/json;charset=UTF-8');
            echo json_encode(array('st'=>0,'msg'=>$msg['message']));
            exit();
        }        
        $data = array(
            'UserId' => $UserId,
            'PostId' => $PostId,
            'ShortList' => $ShortList
        );
        $tracking = $this->Common_m->duplicate_checking_shortlist($UserId,$PostId,'ShortList');
        if (count($tracking) == 1) {
            $this->Common_m->edit_option_shortlist($UserId,$PostId,$ShortList,'ShortList');
            $msg['message'] = "CV list Successfully Updated";
            header('Content-type:application/json;charset=UTF-8');
            echo json_encode(array('st'=>1,'msg'=>$msg['message']));  
        }else{
            $RowId_q = $this->Common_m->insert($data,'ShortList');
            $msg['message'] = "CV Successfully Listed";
            header('Content-type:application/json;charset=UTF-8');
            echo json_encode(array('st'=>1,'msg'=>$msg['message']));  
        }
    }
    
    public function cv_view(){
        $UserId = $this->input->post('UserId', TRUE);
        $PostId = $this->input->post('PostId', TRUE);
        $ViewList = $this->input->post('ViewList', TRUE);
        $data = array(
            'UserId' => $UserId,
            'PostId' => $PostId,
            'ViewList' => $ViewList
        );
        $tracking = $this->Common_m->duplicate_checking_shortlist($UserId,$PostId,'ViewList');
        if (count($tracking) == 1) {
            $url = base_url('admin/resume/resumeDetails/'.$UserId);
            header('Content-type:application/json;charset=UTF-8');
            echo json_encode(array('st'=>1,'url'=>$url));  
        }else{
            $ViewList = $this->Common_m->insert($data,'ViewList');
            if($ViewList){
                $url = base_url('admin/resume/resumeDetails/'.$UserId);
                header('Content-type:application/json;charset=UTF-8');
                echo json_encode(array('st'=>1,'url'=>$url)); 
            }
        }        
    }

    public function approveRecommendation(){
        $UserId = $this->input->post('UserId', TRUE);
        $PostId = $this->input->post('PostId', TRUE);
        $Recommendation = $this->input->post('Recommendation', TRUE);
        $data = array(
            'UserId' => $UserId,
            'PostId' => $PostId,
            'Business' => $this->input->post('Business', TRUE),
            'Recommendation' => $Recommendation
        );
        $tracking = $this->Common_m->duplicate_checking_shortlist($UserId,$PostId,'Recommendation');
        if (count($tracking) == 1) {
            $this->Common_m->edit_option_shortlist($UserId,$PostId,$Recommendation,'Recommendation');
            $msg['message'] = "CV Recommendation Successfully Updated";
            header('Content-type:application/json;charset=UTF-8');
            echo json_encode(array('st'=>1,'msg'=>$msg['message']));
         }else{
            $Recommendation = $this->Common_m->insert($data,'Recommendation');
            if($Recommendation){
                $msg['message'] = "CV Successfully Recommendation";
                header('Content-type:application/json;charset=UTF-8');
                echo json_encode(array('st'=>1,'msg'=>$msg['message']));   
            }
        }
    }
}


