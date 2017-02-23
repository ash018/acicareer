<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->no_cache();
        $this->load->model('Common_m');        
    }

    public function index() {
        $data = array();
        $data['page'] = 'home';
        $data['page_title'] = 'Home';
        $data['JobPost'] = $this->Common_m->option_select_homepage();
        $sdata = $this->Common_m->totalJobs();
        $data['LiveJobs'] = $sdata->CountJobs;
        //echo '<pre/>';print_r($data['JobPost']);exit();
        $data['main_content'] = $this->load->view('home', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function job_details_view($PostId) {
        $data = array();
        $data['page'] = 'home';
        $data['page_title'] = 'Job Details';
        if ($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
        //echo '<pre/>';print_r($data['row']);   exit(); 
        endif;
        $data['row'] = $this->Common_m->jobDetailsView($PostId);
        $data['AllJobs'] = $this->Common_m->option_select_homepage();
//        echo '<pre/>';print_r($data['row']);exit();
        $data['main_content'] = $this->load->view('job_details_view', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function applyNow($applyId) {
        $data = array();
        $data['page'] = 'ApplyNow';
        $data['page_title'] = 'Apply Online';
        if ($this->session->userdata('is_log_user') == FALSE):
            $this->session->set_userdata('message', 'Please create Account or Login first..');
            redirect('home', 'refresh');
        endif;
        //Login check
        check_user_login();
        $data['PostId'] = $applyId;
        if ($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
            $data['UserName'] = $this->session->userdata('UserName');
            $data['Email'] = $this->session->userdata('Email');
            $data['row'] = $this->Common_m->selectCV($data['UserId']);

        //echo '<pre/>';print_r($data['row']);   exit(); 
        endif;
        $data['main_content'] = $this->load->view('apply_online', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function applyNowAction() {
        if (isset($_POST)) {
            $data['UserId'] = $this->input->post('UserId', TRUE);
            $data['PostId'] = $this->input->post('PostId', TRUE);
            $tracking = $this->Common_m->duplicate_posting($data, 'AppliedJob');
            if (count($tracking) == 1) {
                echo '<h3 style="text-align:center">You already applied !!!</h3>';
                echo '<p style="text-align:center"><a href="javascript:history.go(-1)">Back</a></p>';
                exit();
            }
            $ExpectedSalary = $this->input->post('ExpectedSalary', TRUE);
            empty($ExpectedSalary) ? $ExpectedSalary = 0 : $ExpectedSalary;
            $data = array(
                'PostId' => $this->input->post('PostId', TRUE),
                'UserId' => $this->input->post('UserId', TRUE),
                'ExpectedSalary' => $ExpectedSalary,
            );
            $this->Common_m->insert($data, 'AppliedJob');
        }
        //$this->session->set_userdata('message', 'Application Submitted');
        $msg['message'] = "<div class=\"alert alert-success fade in\"><strong>Application Submitted</strong></div>";
        $this->session->set_userdata($msg);
        redirect('home', 'refresh');
    }

    public function myAccount() {
        $data = array();
        $data['page'] = 'MyAccount';
        $data['page_title'] = 'My Account';
        //Login check
        check_user_login();
        if ($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
            $data['Myapply'] = $this->Common_m->selectMyapply($data['UserId']);
            $data['Myresume'] = $this->Common_m->selectMyresume($data['UserId']);
        //echo '<pre/>';print_r($data['Myapply']);   exit();             
        endif;
        $data['main_content'] = $this->load->view('myaccount', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function myResume() {
        $data = array();
        $data['page'] = 'myResume';
        $data['page_title'] = 'My Resume';
        //Login check
        check_user_login();
        if ($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
            $data['Myresume'] = $this->Common_m->selectMyresume($data['UserId']);
            //echo '<pre/>';print_r($data['Myresume']);exit();             
        endif;
        $data['main_content'] = $this->load->view('myresume', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function myResumeDoc() {
        $data = array();
        $data['page'] = 'myResume';
        $data['page_title'] = 'My Resume';
        //Login check
        check_user_login();
        if ($this->session->userdata('is_log_user') == TRUE):
            $data['UserId'] = $this->session->userdata('UseId');
            $data['Myresume'] = $this->Common_m->selectMyresume($data['UserId']);
        //echo '<pre/>';print_r($data['Myresume']);   exit();             
        endif;
        //$data['main_content'] = $this->load->view('myresume_doc', $data, TRUE);
        $this->load->view('myresume_doc', $data);
    }

    public function aciresource() {
        $data = array();
        $data['page'] = 'aciresource';
        $data['page_title'] = 'ACI Resource';

        $data['main_content'] = $this->load->view('aciresource', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function futureemployee() {
        $data = array();
        $data['page'] = 'futureemployee';
        $data['page_title'] = 'Future Employee';

        $data['main_content'] = $this->load->view('futureemployee', $data, TRUE);
        $this->load->view('index', $data);
    }

    //By Shakil - 14th Dec 2016
    public function internship() {
        $data = array();
        $data['page'] = 'internship';
        $data['page_title'] = 'Internship';
        $data['month'] = array('0' => 'January',
            '1' => 'February',
            '2' => 'March',
            '3' => 'April',
            '4' => 'May',
            '5' => 'June',
            '6' => 'July',
            '7' => 'August',
            '8' => 'September',
            '9' => 'October',
            '10' => 'November',
            '11' => 'December');

        $data['main_content'] = $this->load->view('internship', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function notice() {
        $data = array();
        $data['page'] = 'notice';
        $data['page_title'] = 'Notice';

        $data['Notice'] = $this->Common_m->option_select_noticeboard();
        $data['main_content'] = $this->load->view('notice', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function notice_shortlist_view($PostId) {
        $data = array();
        $data['page'] = 'noticedetail';
        $data['page_title'] = 'Notice Shortlist Detail';
        $data['PostId'] = $PostId;
        $data['noticedetail'] = $this->Common_m->select_notice_shortlist($PostId);
        //echo '<pre/>';print_r($data['noticedetail']);exit();
        $data['main_content'] = $this->load->view('notice_shortlist_view', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function forgot_password() {
        $data = array();
        $data['page'] = 'Home';
        $data['page_title'] = 'Forgot Password';
        $data['main_content'] = $this->load->view('forgot_password', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function forgot_password_action() {
        $data['page'] = 'Home';
        $data['page_title'] = 'Forgot Password';
        //echo '<pre/>';print_r($_POST); exit();
        if (isset($_POST)) {
            $from_email = "info@aci-bd.com";
            $Email = $this->input->post('Email');
            $validated = $this->Common_m->validated_email_user($Email);

            if ($validated) {
                foreach ($validated as $row) {
                    //print_r($validated); exit();
                    $Email = $row->Email;
                    $query = $this->Common_m->findPassword($Email);
                    foreach ($query AS $row) {
                        $data['Password'] = $row['Password'];
                    }
                    ///////////////
                    $this->load->library('phpmailer');
                    $to = $Email;
                    $subject = "Recovery Password...";
                    $html = 'Your password has been recovered. Your password is : ' . $data['Password'];
                    $subject = "ACI Career Site";

                    $this->email = new PHPMailer(true);
                    $this->email->IsSMTP(true); // telling the class to use SMTP
                    $this->email->IsHTML(true); // telling the class to use HTML
                    $emailext = explode('@',$to);
                    if($emailext[1] == 'aci-bd.com'){
                            $this->email->Host = "192.168.1.30"; // SMTP server
                    }else{
                            $this->email->Host = "smtp.agni.com"; // SMTP server
                    }
                    $this->email->Port = 25;

                    $this->email->SetFrom('ear@aci-bd.com', 'ACI Career Site');
                    $this->email->AddReplyTo('ear@aci-bd.com', 'ACI Career Site');

                    //$this->email->AddCC('rashedul.islam@aci-bd.com');   				
                    //$this->email->AddBCC('md.rifatahmed@yahoo.com'); 
                    $this->email->AddAddress($to);

                    $this->email->Subject = $subject;
                    $this->email->MsgHTML($html);
                    if ($this->email->Send()) {
                        $this->session->set_userdata('message', 'Email sent successfully.');
                    } else {
                        $this->session->set_userdata('message', 'Error in sending Email.');
                    }
                }
            } else {
                $this->session->set_userdata('message', 'Email is not correct.');
            }
        }

        //$this->session->set_flashdata('message', 'Email Has been Sent Successfully..');

        $data['main_content'] = $this->load->view('forgot_password', $data, TRUE);
        $this->load->view('index', $data);
    }
    
    protected function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

}
