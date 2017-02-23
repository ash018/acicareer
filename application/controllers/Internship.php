<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internship extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->no_cache();
        $this->load->model('Common_m');
    }

    public function index() {
        //echo 'dd'.mt_rand(10000,99999);exit();        
        $data = array();
        $data['page'] = 'internship';
        $data['page_title'] = 'Internship';
        $data['month'] = array('0'=>'January','1'=>'February','2'=>'March','3'=>'April',
                       '4'=>'May','5'=>'June','6'=>'July','7'=>'August','8'=>'September',
                       '9'=>'October','10'=>'November','11'=>'December');
        $data['LEducationLevel'] = $this->Common_m->getEducationLevelIntern();
//      echo '<pre/>';print_r( $data['EducationLevel']);exit(); 
        $data['main_content'] = $this->load->view('internship', $data, TRUE);
        $this->load->view('index', $data);
    }
	
	//submit form data, 
    public function preview_internship() {
        $data = array();
        $data['page'] = 'internship';
        $data['page_title'] = 'Internship Preview';
        $data['LEducationLevel'] = $this->Common_m->getEducationLevelIntern();
        $data['post'] = array(
            'UserName' => $this->input->post('UserName'),
            'FatherName' => $this->input->post('FatherName'),
            'MotherName' => $this->input->post('MotherName'),
            'Add1' => $this->input->post('Add1'),
            'Add2' => $this->input->post('Add2'),
            'Gender' => $this->input->post('Gender'),
            'Mobile' => $this->input->post('contactnumber'),
            'Email' => $this->input->post('Email'),
            'InstituteName' => $this->input->post('InstituteName'),
            'PassingYear' => $this->input->post('PassingYear'),
            'EducationLevel' => $this->input->post('EducationLevel'),
            'MajorConcentration' => $this->input->post('MajorConcentration'),
            'QualificationAttained' => $this->input->post('QualificationAttained'),
            'Result' => $this->input->post('Result'),
            'Marks' => $this->input->post('Marks'),
            'AvailableMonthFor' => $this->input->post('PassingYear1'),
            'FromMonth' => date('Y-m-d',strtotime($this->input->post('FromMonth'))),
            'ToMonth' => date('Y-m-d',strtotime($this->input->post('ToMonth'))),
            'CourseAttended' => $this->input->post('CourseAttended'),
            'Skill' => $this->input->post('Skill'),
            'ExtraCurriculum' => $this->input->post('ExtraCurriculum')
        );
        $data['main_content'] = $this->load->view('internship_preview', $data, TRUE);
        $this->load->view('index', $data);
    }
    public function submit_internship() {
        //print_r($_POST);exit();
        $data['post'] = array(
            'UserName' => $this->input->post('UserName'),
            'FatherName' => $this->input->post('FatherName'),
            'MotherName' => $this->input->post('MotherName'),
            'Add1' => $this->input->post('Add1'),
            'Add2' => $this->input->post('Add2'),
            'Gender' => $this->input->post('Gender'),
            'Mobile' => $this->input->post('contactnumber'),
            'Email' => $this->input->post('Email'),
            'InstituteName' => $this->input->post('InstituteName'),
            'PassingYear' => $this->input->post('PassingYear'),
            'EducationLevel' => $this->input->post('EducationLevel'),
            'MajorConcentration' => $this->input->post('MajorConcentration'),
            'QualificationAttained' => $this->input->post('QualificationAttained'),
            'Result' => $this->input->post('Result'),
            'Marks' => $this->input->post('Marks'),
            'AvailableMonthFor' => $this->input->post('PassingYear1'),
            'FromMonth' => date('Y-m-d',strtotime($this->input->post('FromMonth'))),
            'ToMonth' => date('Y-m-d',strtotime($this->input->post('ToMonth'))),
            'CourseAttended' => $this->input->post('CourseAttended'),
            'Skill' => $this->input->post('Skill'),
            'ExtraCurriculum' => $this->input->post('ExtraCurriculum')
        );
		
        /*if(isset($data['InternshipId']) && !empty($data['InternshipId']) && $data['InternshipId'] != ''){ 
            $eis = $this->Common_m->edit_option_field($data['post'],$data['InternshipId'],'InternshipId','Internship');
            //$RowId = $data['InternshipId'];
            if ($eis) {
                $msg['message'] = "<div class=\"alert alert-success fade in\"><strong>Congratulations! You have successfully submitted your CV.</strong></div>";
                $this->session->set_userdata($msg);
            }
            redirect('home', 'refresh');
        }
        else{     
            //exit();*/
            $RowId_q = $this->Common_m->insertInternship($data['post']);
            $RowId = $RowId_q['0']['RowId'];
            if ($RowId) {
                    $data['post'] = array(
                        'UserName' => '',
                        'FatherName' => '',
                        'MotherName' => '',
                        'Add1' => '',
                        'Add2' => '',
                        'Gender' => '',
                        'Mobile' => '',
                        'Email' => '',
                        'InstituteName' => '',
                        'PassingYear' => '',
                        'EducationLevel' => '',
                        'MajorConcentration' => '',
                        'QualificationAttained' => '',
                        'Result' => '',
                        'Marks' => '',
                        'AvailableMonthFor' => '',
                        'FromMonth' => '',
                        'ToMonth' => '',
                        'CourseAttended' => '',
                        'Skill' => '',
                        'ExtraCurriculum' => ''
                    );
            
                    $msg['message'] = "<div class=\"alert alert-success fade in\"><strong>Congratulations! You have successfully submitted your CV.</strong></div>";
                    $this->session->set_userdata($msg);
                $str = "You have successfully submitted your CV.";
                $url = base_url('internship/preview_internship');
                echo json_encode(array('st'=>1,'url'=>$url,'msg'=>$str));
            }
            //redirect('home', 'refresh');
//        }
    }
    
        
    protected function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

}
