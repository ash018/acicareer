<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learning_development extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
        
    }

    public function index() {
        $data = array();
        $data['page'] = 'learning_development';
        $data['page_title'] = 'Learning development';
        
        $data['main_content'] = $this->load->view('learning_development', $data, TRUE);
        $this->load->view('index', $data);  
    }

}
