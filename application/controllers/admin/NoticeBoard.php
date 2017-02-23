<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NoticeBoard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_admin_login();
        $this->load->model('Common_m');
        $this->load->model('admin_m');
        $this->load->helper('admin');
		$this->load->library('encrypt');
    }

    public function index() {
        $data = array();
        $data['page'] = 'AllNoticeBoard';
        $data['page_title'] = 'Notice Board';
        //$data['AllResume'] = $this->Admin_m->selectAllResume();
        //$empcode = $this->session->userdata('EmpCode'); 
        //$data['userinfo'] = $this->Admin_m->userinfo($empcode);

        $empcode = $this->session->userdata('EmpCode');
        $data['userinfo'] = $this->admin_m->userinfo($empcode);
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['previousnotice'] = $this->admin_m->previousnotice();
        $data['main_content'] = $this->load->view('admin/noticeBoard', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

    public function addnotice() {
        $data = array();
        $data['page'] = 'NoticeBoard';
        $data['page_title'] = 'Notice Board';

        $empcode = $this->session->userdata('EmpCode');
        $data['userinfo'] = $this->admin_m->userinfo($empcode);
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['previousnotice'] = $this->admin_m->previousnotice();
        $data['main_content'] = $this->load->view('admin/newnoticeBoard', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function NoticeEdit($NoticeId) {
        $data = array();
        $data['page'] = 'NoticeBoard';
        $data['page_title'] = 'Notice Board';   
        $data['NoticeId'] = $NoticeId;
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->admin_m->userinfo($empcode);
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['notice'] = $this->admin_m->getnotice($NoticeId);
		//print_r($data['notice']);exit();
        $data['main_content'] = $this->load->view('admin/editnotice', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }
    
    public function doupdate() {
        $data = array();
        $data['noticeid'] = $this->input->post('noticeid');
        $data['noticetitle'] = $this->input->post('noticetitle');
        $data['noticedescription'] = $this->input->post('noticedescription');
        $data['noticedate'] = $this->input->post('noticedate');
        $data['noticestatus'] = $this->input->post('noticestatus');
        //echo "<pre>";print_r($_POST);print_r($_FILES);exit();
        if(!empty($_FILES['userfile']['name'])){
            $config['upload_path']          = './assets/notice_file/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|xlsx';
            $config['max_size']             = 2048000;          
            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
                $upload_data = $this->upload->data();
                $data['file'] = $upload_data['file_name'];
            }
        }
        //echo "<pre>";print_r($data);exit();
        $result = $this->admin_m->UpdateNotice($data);
        $this->index(); 
    }
    
    public function NoticeDelete() {
        $data = array();
        $NoticeId = $this->uri->segment(4);
        $data['successs'] = $this->admin_m->deletenotice($NoticeId);
        $this->index();
    }

    public function docreate() {
        $data = array();
        $data['noticetitle'] = $this->input->post('noticetitle');
        $data['noticedescription'] = $this->input->post('noticedescription');
        $data['noticedate'] = $this->input->post('noticedate');
        $data['noticestatus'] = $this->input->post('noticestatus');

        //echo "<pre>";print_r($data);exit();
        $config = array(
            'upload_path' => "./assets/notice_file/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf|xlsx",
            'overwrite' => TRUE,
            'max_size' => "2048000"
        );

        $this->load->library('upload', $config);
        if ($this->upload->do_upload()) {
            $upload_data = $this->upload->data();
            $data['file'] = $upload_data['file_name'];
        } else {
            $this->addnotice();
        }
        $result = $this->admin_m->InsertNotice($data);
        redirect('admin/NoticeBoard/index');
    }

        
    
}
