<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applyprocedure extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
        
    }

    public function index() {
        $data = array();
        $data['page'] = 'applyprocedure';
        $data['page_title'] = 'Apply Procedure';
        
        $data['main_content'] = $this->load->view('applyprocedure', $data, TRUE);
        $this->load->view('index', $data);  
    }

}
