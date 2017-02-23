<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mission extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
    }

    public function index() {
        $data = array();
        $data['page'] = 'mission';
        $data['page_title'] = 'Mission';
       
        $data['main_content'] = $this->load->view('mission', $data, TRUE);
        $this->load->view('index', $data);
    }

}
