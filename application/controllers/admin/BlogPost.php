<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlogPost extends CI_Controller {

    public function __construct() {
        parent::__construct();
        check_admin_login();
        $this->load->model('Common_m');
        $this->load->model('Admin_m');
        $this->load->model('Blog_m');
        $this->load->helper('admin');
        $this->load->library('encrypt');
    }

    public function index() {
        $data = array();
        $data['page'] = 'BlogPost';
        $data['page_title'] = 'Blog Post';
        //$data['AllResume'] = $this->Admin_m->selectAllResume();
        $empcode = $this->session->userdata('EmpCode');
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        $data['blogList'] = $this->Blog_m->blogPostList();

        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/blogPost', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

    public function addnewblog() {
        $data = array();
        $data['page'] = 'BlogPost';
        $data['page_title'] = 'Blog Post';
        //$data['AllResume'] = $this->Admin_m->selectAllResume();
        $empcode = $this->session->userdata('EmpCode');
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        $data['blogList'] = $this->Blog_m->blogPostList();

        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/addnewblog', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

    /*
     * Uploads Directory of Blog File is ./assets/uploads_blog/
     */

    public function saveBlogPost() {
        $blogId = 0;
        $BlogInsert = false;
        $BlogUpadte = true;
        $Title = $this->input->post('Title', true);
        $empcode = $this->session->userdata('EmpCode');

        $blogId = $this->input->post('BlogId', true);

        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);

        if ($cpt > 0) {
            for ($i = 0; $i < $cpt; $i++) {
                $ext = strtolower(strrchr($files['userfile']['name'][$i], "."));
                $file_realname = str_replace(array('/', '\\', '#', ',', ' '), array('', '', '', '', '_'), $files['userfile']['name'][$i]);
                $useChars = 'AEUYBDGHJLMNPQRSTVWXZ123456789';
                $tmp = $useChars{mt_rand(0, 29)};
                for ($j = 1; $j < 10; $j++) {
                    $tmp .= $useChars{mt_rand(0, 29)};
                }
                $file_name = substr($Title . '_' . md5($tmp . $file_realname), 0, 200) . $ext;

                $_FILES['userfile']['name'] = $file_name;
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload();


                $data = array(
                    "Title" => $this->input->post('Title', TRUE),
                    "Details" => $this->input->post('Details', TRUE),
                    "Publish" => $this->input->post('Publish', TRUE),
                    "Attachment" => str_replace(" ", "_", $_FILES['userfile']['name']),
                    "EntryBy" => $empcode
                );
                if ($blogId == 0) {
                    $BlogInsert = $this->Blog_m->insert($data, 'Blog');
                } else {
                    $BlogUpadte = $this->Blog_m->edit_option_field($data, $blogId, 'BlogId', 'Blog');
                }
            }
        } else {
            $data = array(
                "Title" => $this->input->post('Title', TRUE),
                "Details" => $this->input->post('Details', TRUE),
                "Publish" => $this->input->post('Publish', TRUE),
                "EntryBy" => $empcode
            );
            $BlogUpadte = $this->Blog_m->edit_option_field($data, $blogId, 'BlogId', 'Blog');
        }

        if ($BlogInsert) {
            $msg['message'] = "Blog Insert Successfully.";
        } else if ($BlogUpadte) {
            $msg['message'] = "Blog Update Successfully.";
        } else {
            $msg['message'] = "Blog Insert Unsuccessfully.";
        }

        $this->session->set_userdata($msg);
        redirect(base_url('admin/blogPost'));
    }

    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = './assets/uploads_blog/';
        $config['allowed_types'] = 'gif|jpg|png';
        /* $config['max_size'] = '2048'; */
        $config['overwrite'] = FALSE;
        // echo '<pre/>';print_r($config);exit();
        return $config;
    }

    public function blogEdit() {
        $blogId = $this->uri->segment(4);

        $data = array();
        $data['page'] = 'BlogPost';
        $data['page_title'] = 'Blog Post';
        //$data['AllResume'] = $this->Admin_m->selectAllResume();
        $empcode = $this->session->userdata('EmpCode');
        $data['userinfo'] = $this->Admin_m->userinfo($empcode);
        $data['blog'] = $this->Blog_m->blogEdit($blogId);

        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/addnewblog', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

    public function blogDelete($BlogId){
	    $blog = $this->Blog_m->delete_option($BlogId, 'BlogId', 'blog');
        if ($blog) {
            $msg['message'] = "Blog Successfully Deleted.";
        } else {
            $msg['message'] = "Blog Delete Unsuccessfully.";
        }
        $this->session->set_userdata($msg);
        redirect(base_url('admin/blogpost'));	
    }

}
