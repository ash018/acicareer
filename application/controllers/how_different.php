<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class How_different extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
        
    }

    public function index() {
        $data = array();
        $data['page'] = 'how_different';
        $data['page_title'] = 'How ACI is Different';
        
        $data['main_content'] = $this->load->view('how_different', $data, TRUE);
        $this->load->view('index', $data);  
    }

}
