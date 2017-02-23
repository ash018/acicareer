<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career_development extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
        
    }

    public function index() {
        $data = array();
        $data['page'] = 'career_development';
        $data['page_title'] = 'Career Development';
        
        $data['main_content'] = $this->load->view('career_development', $data, TRUE);
        $this->load->view('index', $data);  
    }

}
