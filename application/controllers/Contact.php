<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
    }

    public function index() {
        $data = array();
        $data['page'] = 'contact';
        $data['page_title'] = 'Contact';
      
        
        $data['main_content'] = $this->load->view('contact', $data, TRUE);
        $this->load->view('index', $data);
    }

}
