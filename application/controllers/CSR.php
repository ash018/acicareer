<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSR extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_m');
    }

    public function index() {
        $data = array();
        $data['page'] = 'csr';
        $data['page_title'] = 'CSR';
        //$data['header'] = $this->load->view('inc/header', $data, TRUE);
        //$data['footer'] = $this->load->view('inc/footer', $data, TRUE);
        $data['main_content'] = $this->load->view('csr', $data, TRUE);
        $this->load->view('index', $data);
    }

}
