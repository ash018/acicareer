<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
    }

    public function index() {
        $data = array();
        $data['page'] = 'brands';
        $data['page_title'] = 'Brands';
        //$data['header'] = $this->load->view('inc/header', $data, TRUE);
        //$data['footer'] = $this->load->view('inc/footer', $data, TRUE);
        $data['main_content'] = $this->load->view('brands', $data, TRUE);
        $this->load->view('index', $data);
    }

}
