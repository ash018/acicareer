<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('common_m');
    }

    public function index() {
        $data = array();
        $data['page_title'] = "Login";
        $data['main_content'] = $this->load->view('login', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function signIn() {
        if ($_POST) {
            $this->load->model('common_m');
            $email = $this->input->post('email',TRUE);
            $password = $this->input->post('password',TRUE);
            $query_email = $this->common_m->validate_email($email);			
            $query = $this->common_m->validate_password($email,$password);
			if ($query_email) {			
				if ($query) {    
					foreach ($query as $row) {
					   /* $data = array(
							'UseId' => $row->Id,
							'UserName' => $row->UserName,
							'Email' => $row->Email,
							'is_log_admin' => FALSE,
							'is_log_user' => TRUE
						);
						$this->session->set_userdata($data);*/
						$this->session->set_userdata('UseId', $row->Id); 
						$this->session->set_userdata('UserName', $row->UserName);
						$this->session->set_userdata('Email', $row->Email);
						$this->session->set_userdata('is_log_admin', FALSE);
						$this->session->set_userdata('is_log_user', TRUE);
					}
					//print_r($data);exit();
					if ($this->input->post('page') == 'career') {
						$url = base_url('home/myAccount');
					} else {
						$url = base_url();
					}

					echo json_encode(array('st' => 1, 'url' => $url));
				} else {
					$str = "<div class=\"alert alert-danger fade in\">
							<strong>Login Failed</strong></div>";
					echo json_encode(array('st' => 0, 'msg' => $str));
				}
			}else {
					$str = "<div class=\"alert alert-danger fade in\">
							<strong>Login Failed</strong></div>";
					echo json_encode(array('st' => 0, 'msg' => $str));
			}
            exit();
        }
    }

    public function get_pass() {
        $email = $this->input->post('email');
        $_PW = create_password();
        $validated = $this->common_m->validated_email_user($email);

        if ($validated) {
            foreach ($validated as $row) {
                if ($row->status == 1) {
                    $data['email'] = $row->email;
                    $data['first_name'] = $row->firstname;
                    $data['last_name'] = $row->lastname;
                    $data['password'] = $_PW;

                    $user_id = $row->id;

                    $this->send_recovery_mail($data);
                    $users = array('password' => md5($_PW));
                    $this->common_m->edit_option($users, $user_id, 'customer');

                    $error['st'] = '1';
                    $error['message'] = '<div class="alert alert-success fade in">An email with your new password has been sent.</div>';
                } else {

                    $error['st'] = '0';
                    $error['message'] = '<div class="alert alert-danger fade in">Your mail ID is not varified</div>';
                }
            }
        } else {

            $error['st'] = '0';
            $error['message'] = '<div class="alert alert-danger fade in">' . "Your haven't created account yet.</div>";
        }


        echo json_encode($error);
    }

    public function send_recovery_mail($user_info) {

        $data = array();
        $to = $data['email'] = $user_info['email'];
        $data['Password'] = $this->common_m->select_password($to);
        $mail_body = "Your P{assword is &nbsp;".$password."

Regards
ACI HR
";

            $subject = "Recovery Password";

            $this->email = new PHPMailer(true);
            $this->email->IsSMTP(true); // telling the class to use SMTP
            $this->email->IsHTML(true); // telling the class to use HTML
            //$this->email->Host = "smtp.agni.com"; // SMTP server
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
            $this->email->MsgHTML($mail_body);
            if ($this->email->Send()) {
                //print "Done";
            } else {
                //print "Failed";            
            }
    }

    public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        $msg['message'] = "<div class=\"alert alert-success fade in\"><strong>Logged Out</strong></div>";
        $this->session->set_userdata($msg);
        redirect(base_url(),'refresh');
    }
	
    public function privacy_policy() {        
        $data = array();
        $data['page'] = 'AdminLogin';
        $data['page_title'] = 'Privacy Policy';            
        $data['main_content'] = $this->load->view('privacy_policy', $data, TRUE);
        $this->load->view('index', $data);
    }
    
    public function site_map() {        
        $data = array();
        $data['page'] = 'AdminLogin';
        $data['page_title'] = 'Site map';            
        $data['main_content'] = $this->load->view('site_map', $data, TRUE);
        $this->load->view('index', $data);
    }
    
    public function contact_us() {        
        $data = array();
        $data['page'] = 'AdminLogin';
        $data['page_title'] = 'Contact us';            
        $data['main_content'] = $this->load->view('contact_us', $data, TRUE);
        $this->load->view('index', $data);
    }

}
