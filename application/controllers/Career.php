<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->no_cache();
        $this->load->model('Common_m');
        $this->load->library('encrypt');
    }

    public function index() {
        $data = array();
        $data['page'] = 'career';
        $data['page_title'] = 'Career';
        if($this->session->userdata('is_log_user') == TRUE):
            $UserId = $this->session->userdata('UseId');
            $UserName = $this->session->userdata('UserName');
            $Email = $this->session->userdata('Email');
        endif;
               
        $data['main_content'] = $this->load->view('career', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function careerForm() {
        $data = array();
        $data['page'] = 'career';
        $data['page_title'] = 'Career';
        if($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
            $data['UserName'] = $this->session->userdata('UserName');
            $data['Email'] = $this->session->userdata('Email');            
            $data['row'] = $this->Common_m->selectCV($data['UserId']);
            //echo '<pre/>';print_r($data['row']);   exit(); 
        endif;
        $data['main_content'] = $this->load->view('careerForm', $data, TRUE);
        $this->load->view('index', $data);
    }
    
    public function userInfo() {
        $data = array();
        $data['page'] = 'career';
        $data['page_title'] = 'Career';
        $data['main_content'] = $this->load->view('userInfo', $data, TRUE);
        $this->load->view('index', $data);
    }
    
    public function educationInfo($UserId) {
        $data = array();
        $data['page'] = 'career';
        $data['page_title'] = 'Career';
        $UserId = passdecode($UserId);
        if ($this->session->userdata('is_log_user') == TRUE) {
            $data['UserId'] = $this->session->userdata('UseId');
            $data['UserName'] = $this->session->userdata('UserName');
            $data['Email'] = $this->session->userdata('Email');
            $data['row'] = $this->Common_m->selectCV($data['UserId']);
            $data['main_content'] = $this->load->view('educationInfo', $data, TRUE);
            $this->load->view('index', $data);
        } else {
            redirect('career', 'refresh');
        }
    }

    public function trainingInfo($UserId) {
        $data = array();
        $data['page'] = 'career';
        $data['page_title'] = 'Career';        
        $UserId = passdecode($UserId);
        if($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
            $data['UserName'] = $this->session->userdata('UserName');
            $data['Email'] = $this->session->userdata('Email');
            $data['row'] = $this->Common_m->selectCV($data['UserId']);
            //$data['UserId'] = 
            //echo '<pre/>';print_r($data['row']);   exit(); 
            $data['main_content'] = $this->load->view('trainingInfo', $data, TRUE);
            $this->load->view('index', $data);
        else:
            redirect('career', 'refresh');
        endif;
    }
    
    public function experienceInfo($UserId) {
        
        $data = array();
        $data['page'] = 'career';
        $data['page_title'] = 'Career';
        $UserId = passdecode($UserId);
        if($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
            $data['UserName'] = $this->session->userdata('UserName');
            $data['Email'] = $this->session->userdata('Email');
            $data['row'] = $this->Common_m->selectCV($data['UserId']);
            //echo '<pre/>';print_r($data['row']);   exit(); 
            $data['main_content'] = $this->load->view('experienceInfo', $data, TRUE);
            $this->load->view('index', $data);
            
        else:
            redirect('career', 'refresh');
        endif;
    }

    public function careerActionPersonalInfo() {
        $Religion = $this->input->post('Religion', TRUE);
        empty($Religion) ? $Religion = '0' : $Religion;
        $ExpSalary = $this->input->post('ExpSalary', TRUE);
        empty($ExpSalary) ? $ExpSalary = '' : $ExpSalary;
        $BloodGroup = $this->input->post('BloodGroup', TRUE);
        empty($BloodGroup) ? $BloodGroup = '0' : $BloodGroup;
        $userId =  $this->input->post('UserGeneraiInfoId', TRUE);
        $msqString = '';
        
        $data = array(
            'UserName' => $this->input->post('UserName', TRUE),
            'FatherName' => $this->input->post('FatherName', TRUE),
            'MotherName' => $this->input->post('MotherName', TRUE),
            'Add1' => mssql_escape($this->input->post('Add1', TRUE)),
            'Add2' => mssql_escape($this->input->post('Add2', TRUE)),
            'Nationality' => $this->input->post('Nationality', TRUE),
            'Gender' => $this->input->post('Gender', TRUE),            
            'DOB' =>  date('Y-m-d',strtotime($this->input->post('DOB'))),
            'Religion' => $Religion,
            'MaritalStatus' => $this->input->post('MaritalStatus', TRUE),
            'ExpSalary' => $ExpSalary,
            'BloodGroup' => $this->input->post('BloodGroup', TRUE),        
            'TelNo' => $this->input->post('TelNo', TRUE),
            'Mobile' => $this->input->post('Mobile', TRUE),
            'NationalId' => $this->input->post('NationalId', TRUE),
            'PassportNo' => $this->input->post('PassportNo', TRUE),
            'BirthPlace' => $this->input->post('BirthPlace', TRUE),
            'Email' => $this->input->post('Email', TRUE),
            'Password' => $this->input->post('Password', TRUE),
            'CareerObjective' => $this->input->post('CareerObjective', TRUE)
        );
        //print_r($data);exit();
        if(isset($userId) && !empty($userId) && $userId != ''){  
            $Email = $this->input->post('Email', TRUE);
            $tracking = $this->Common_m->tracking_checking($Email,$userId);
            if(count($tracking) == 1){
                $msg['message'] = "<div class=\"alert alert-danger fade in\">
                                <strong>This Email Already registered.</strong></div>";
                $url = base_url('career/careerfrom');
                header('Content-type:application/json;charset=UTF-8');
                echo json_encode(array('st'=>0,'url'=>$url,'msg'=>$msg['message']));  
                exit();
            }
            $this->Common_m->edit_option_field($data,$userId,'Id','UserInfo');
            $RowId = $userId;
        }
        else{
            //echo 'Tets Echo ';   exit();
            if(isset($data['Email']) && $data['Email'] != '' && isset($data['Password']) && $data['Password'] != ''){
                $emilVarify = $this->Common_m->validEmil($data['Email']);
                //echo $emilVarify;     exit();
                if($emilVarify){
                    $msqString = 'This Email is already use. Please give another valid Email';
                    $RowId = '';
                }
                else{
                    $RowId_q = $this->Common_m->insertUserInfo($data);
                    $RowId = $RowId_q['0']['RowId'];
                }
            }
         }
        $query = $this->Common_m->validate_registration($RowId);
        if ($query) {           
            $data = array();
            foreach ($query as $row) {                
                $session_data = array(
                    'UseId' => $row->Id,
                    'UserName' => $row->UserName,
                    'Email' => $row->Email,
                    'is_log_user' => TRUE
                );                
                $this->session->set_userdata($session_data);
                //print_r($this->session->set_userdata($session_data));die();
                if($this->input->post('page') == 'page_user_info'){
                    $url = base_url('career/educationInfo/'.$RowId);                   
                }else{
                    $url = base_url();
                }
                header('Content-type:application/json;charset=UTF-8');
                echo json_encode(array('st'=>1,'url'=>$url));
                //echo json_encode($this->session->userdata());
                //print_r($data);exit();
                //echo json_encode(array('UserId'=>$row->Id,'UserName'=> $row->UserName,'Email'=>$row->Email));
            }
        } else {
            $msg['message'] = "<div class=\"alert fade alert-error in\"><button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button><strong>Registration Incomplete!!!".$msqString."</strong></div>";
            //print_r($msg);exit();//echo  $msg['message'];
            $url = base_url();
            header('Content-type:application/json;charset=UTF-8');
            echo json_encode(array('st'=>0,'url'=>$url,'msg'=>$msg['message']));            
            //$this->session->set_userdata($msg);
        }
    }

    public function careerActionEducation() {
       // echo '<pre/>';print_r($_POST);//exit();
        //$IsForeignInstitute = 0;
        $EducationId = $this->input->post('EducationId', TRUE);                    
        $UserId = $this->input->post('UserId', TRUE);
        $EducationLevel = $this->input->post('EducationLevel', TRUE);
        $Faculty = $this->input->post('Faculty', TRUE);
        $QualificationAttained = $this->input->post('QualificationAttained', TRUE);
        $InstituteName = $this->input->post('InstituteName', TRUE);
        $Result = $this->input->post('Result', TRUE);
        $Marks = $this->input->post('Marks', TRUE);
        $PassingYear = $this->input->post('PassingYear', TRUE);
        $IsForeignInstitute = $this->input->post('IsForeignInstitute', TRUE);
        $level = count($PassingYear);
        $tempforeignUni = 0;
        /*  echo 'rr<pre/>';print_r($IsForeignInstitute);

          echo 'rr<pre/>';print_r(count($this->input->post('IsForeignInstitute', TRUE)));
        exit();*/
        if(empty($IsForeignInstitute)){
            $IsForeignInstituteLength = 0 ;
        }else{
            $IsForeignInstituteLength = count($IsForeignInstitute);
        }
        //echo 'value->'.$IsForeignInstitute;
        for ($i = 0; $i < $level; $i++) {
           if(empty($EducationLevel[$i])){
               continue;
           }else{
                empty($Marks[$i]) ? $Marks[$i] = '' : $Marks[$i];
                empty($InstituteName) ? $InstituteName = '' : $InstituteName;
                //empty($IsForeignInstitute[$i]) ? $IsForeignInstitute[$i] = '0' : $IsForeignInstitute[$i] = 1;
                if(isset($IsForeignInstitute)){
                    for( $m = 0; $m < $IsForeignInstituteLength; $m++){
                        
                        if ( $i == $IsForeignInstitute[$m] /*&& $IsForeignInstitute[$m] != 0 */) {
                            //empty($IsForeignInstitute[$m]) ? $IsForeignInstitute[$i] = '0' : $IsForeignInstitute[$i] = 1;                        
                            //echo 'A'.$IsForeignInstitute[$m] . 'B' . $i . 'M'.$m;
                             $tempforeignUni = 1;
                             break;
                        } else {
                            //$IsForeignInstitute[$i] = 0;
                            $tempforeignUni = 0;
                        }
                    }
                }
                //echo 'tempforeignUni' . $tempforeignUni . 'I'.$i;
                $data = array(
                    'UserId' => $UserId,
                    'EducationLevel' => $EducationLevel[$i],
                    'Faculty' => $Faculty[$i],
                    'QualificationAttained' => $QualificationAttained[$i],
                    'InstituteName' => $InstituteName[$i],
                    'Result' => $Result[$i],
                    'Marks' => $Marks[$i],
                    'PassingYear' => $PassingYear[$i],
                    //'IsForeignInstitute' => $IsForeignInstitute[$i]
                    'IsForeignInstitute' => $tempforeignUni
                );
//                            echo '<pre/>';print_r($data);exit();
               if(isset($EducationId[$i]) && !empty($EducationId[$i])){
                   $this->Common_m->edit_option_field($data,$EducationId[$i],'Id','Education');
                   //echo '<pre/>';print_r($Product);exit();
               }else{
                   if(isset($data) && isset($EducationLevel[$i])){
                        $Education = $this->Common_m->insert($data, 'Education');
                   }
               }
           }
        }        
        //$peRowId = passencode($UserId);
        //$this->session->set_userdata($session_data);
        if($this->input->post('page') == 'page_education_info'){
            $url = base_url('career/trainingInfo/'.$UserId);
        }else{
            $url = base_url();
        }
        header('Content-type:application/json;charset=UTF-8');
        echo json_encode(array('st'=>1,'url'=>$url));
        
    }

    public function careerActionTraining() {  
        //echo '<pre/>';print_r($_POST);exit();
        $UserId = $this->input->post('UserId', TRUE);
        $TrainingId = $this->input->post('TrainingId', TRUE);  
        $TrainingTitle = $this->input->post('TrainingTitle', TRUE);
        $TakenYear = $this->input->post('TakenYear', TRUE);
         
        $TakenYearCount = count($TakenYear);
      
        $TopicsCovered = $this->input->post('TopicsCovered', TRUE);
        $InstituteName = $this->input->post('InstituteNameTraining', TRUE);

        $Country = $this->input->post('CountryName', TRUE);
        $CertificationNo = $this->input->post('CertificationNo', TRUE);
        for ($i = 0; $i < $TakenYearCount; $i++) {
            empty($InstituteName) ? $InstituteName = '' : $InstituteName;
             empty($TrainingTitle[$i]) ? $TrainingTitle[$i] = '' : $TrainingTitle[$i];
           
            $data = array(
                'UserId' => $UserId,
                'TrainingTitle' => $TrainingTitle[$i],
                'InstituteName' => $InstituteName[$i],
                'TopicsCovered' => $TopicsCovered[$i],
                'TakenYear' => $TakenYear[$i],
                'Country' => $Country[$i],
                'CertificationNo' => $CertificationNo[$i]            
            );

            if (isset($TrainingId[$i]) && !empty($TrainingId[$i])) {
                $this->Common_m->edit_option_field($data, $TrainingId[$i], 'Id', 'Training');
            } else {
                if (isset($data) && !empty($TrainingTitle[$i]) && $TrainingTitle[$i] != '') {
                    $Training = $this->Common_m->insert($data, 'Training');
                }
            }
            
        }
        $peRowId = passencode($UserId);
        
        //$this->session->set_userdata($session_data);
        
        if($this->input->post('page') == 'page_training_info'){
            $url = base_url('career/experienceInfo/'.$UserId);
        }else{
            $url = base_url();
        }
        header('Content-type:application/json;charset=UTF-8');
        echo json_encode(array('st'=>1,'url'=>$url));
    }

    public function careerActionExperience() {
        //echo '<pre/>';print_r($_POST); exit(); 
        $CurrentlyWorking = '0';
        $UserId = $this->input->post('UserId', TRUE);
        $CompanyName = $this->input->post('CompanyName',TRUE);
        $ExperienceId = $this->input->post('ExperienceId',TRUE);
        $CompanyNameCount = count($CompanyName);
        $Designation = $this->input->post('Designation',TRUE);
        $EmpAddress = $this->input->post('EmpAddress',TRUE);
        $CurrentlyWorking = $this->input->post('CurrentlyWorking',TRUE);
        $LastSalary = $this->input->post('LastSalary',TRUE);
        $LeaveReason = $this->input->post('LeaveReason',TRUE);
        $Responsibility = $this->input->post('Responsibility',TRUE);	

        for ($i = 0; $i < $CompanyNameCount; $i++) {
            $StartDate = date('Y-m-d',strtotime($this->input->post('StartDate')[$i]));
            $EndDate = date('Y-m-d',strtotime($this->input->post('EndDate')[$i]));
            
            empty($CompanyName) ? $CompanyName = '' : $CompanyName;
            empty($Designation) ? $Designation = '' : $Designation;
            empty($EmpAddress) ? $EmpAddress = '' : $EmpAddress;
            empty($CurrentlyWorking[$i]) ? $CurrentlyWorking[$i] = '0' : $CurrentlyWorking[$i] = $CurrentlyWorking[$i];
            empty($LastSalary[$i]) ? $LastSalary[$i] = '' : $LastSalary[$i];
            empty($LeaveReason) ? $LeaveReason = '' : $LeaveReason;
            empty($Responsibility) ? $Responsibility = '' : $Responsibility;
            
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $date_time = $dt->format('Y-m-d H:i:s');
            if($CurrentlyWorking[$i]==1){$EndDate=$date_time;}
            $data = array(
              'UserId' => $UserId,
              'CompanyName' => $CompanyName[$i],
              'Designation' => $Designation[$i],
              'EmpAddress' => $EmpAddress[$i],
              'StartDate' => $StartDate,
              'EndDate' => $EndDate,
              'CurrentlyWorking' => $CurrentlyWorking[$i],
              'LastSalary' => $LastSalary[$i],
              'LeaveReason' => $LeaveReason[$i],
              'Responsibility' => $Responsibility[$i]
            );
//            echo '<pre/>';print_r($ExperienceId);
//            echo '<pre/>';print_r($data); exit();  
            if(isset($ExperienceId[$i]) && !empty($ExperienceId[$i])){
                $this->Common_m->edit_option_field($data,$ExperienceId[$i],'Id','Experience');
                //print_r($data); exit();  
            }else{
                if(isset($data) && isset($CompanyName[$i])){
                    $this->Common_m->insert($data, 'Experience');
                }
                   
            }
        }
        
        $Skill = $this->input->post('Skill',TRUE);
        $Responsibility = $this->input->post('Responsibility',TRUE);
        $data_userinfo = array(
            'Skill' => $this->input->post('Skill',TRUE),
            'ExtraCurriculum' => $this->input->post('ExtraCurriculum',TRUE)
        ); 
        $updateUserInfo = $this->Common_m->edit_option_field($data_userinfo,$UserId,'Id','UserInfo');
        
        $RefName = $this->input->post('RefName',TRUE);
        $RefId = $this->input->post('RefId',TRUE);
        $RefNameCount = count($RefName);
        $RefOccupation = $this->input->post('RefOccupation',TRUE);
        $RefAddress = $this->input->post('RefAddress',TRUE);
        $RefContact = $this->input->post('RefContact',TRUE);
        $RefEmail = $this->input->post('RefEmail',TRUE);
        $RefRelationship = $this->input->post('RefRelationship',TRUE);
        //for ($i = 0; $i < $TakenYearCount; $i++) {
        if(isset($RefName)){
            for ($i = 0; $i < $RefNameCount; $i++) {
                $data = array(
                    'UserId' => $UserId,
                    'RefName' => $RefName[$i],
                    'RefOccupation' => $RefOccupation[$i],
                    'RefAddress' => $RefAddress[$i],
                    'RefContact' => $RefContact[$i],
                    'RefEmail' => $RefEmail[$i],
                    'RefRelationship' => $RefRelationship[$i]
                );
                //$Reference = $this->Common_m->insert($data, 'Reference');

                if(isset($RefId[$i]) && !empty($RefId[$i])){
                       $this->Common_m->edit_option_field($data,$RefId[$i],'Id','Reference');
                       //echo '<pre/>';print_r($Product);exit();
                }else
                    {if(isset($data) && !empty($RefName[$i]) && $RefName[$i] != '' ){  
                        $Reference = $this->Common_m->insert($data, 'Reference');
                    }
                }

            }
        }
        
        $pro_img = $this->Common_m->do_upload('photo');
        //echo 'LastSalary -> '.print_r($pro_img);exit();
        if ($pro_img) {
            $pro_img_isn = array(
                'UserId' => $UserId,
                'Thumb' => $pro_img['thumb'],
                'Medium' => $pro_img['medium'],
                'Img' => $pro_img['img']
            );
            $this->Common_m->insertphoto($pro_img_isn, 'UserPhoto',$UserId);
        }        

        $msg['message'] = "<div class='alert alert-success' style='font-size:16px; font-weight:600;'>Congratulations! you have successfully completed your CV</div>";
        $this->session->set_userdata($msg);
        redirect('home/myAccount', 'refresh');
        //$this->session->set_userdata($session_data);
        
//        if($this->input->post('page') == 'page_experience_info'){
//            $url = base_url('career/careerForm/'.$UserId);
//        }else{
//            $url = base_url();
//        }
        //header('Content-type:application/json;charset=UTF-8');
        //echo json_encode(array('st'=>1,'url'=>$url));
    }
    
    protected function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

}