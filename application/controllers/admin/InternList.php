<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InternList extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_admin_login();
        $this->load->model('Common_m');
        $this->load->model('admin_m');
        $this->load->helper('admin');
    }

    public function index() {
        $data = array();
        $data['page'] = 'InternList';
        $data['page_title'] = 'All Resume';
        
        $empcode = $this->session->userdata('EmpCode'); 
        $data['userinfo'] = $this->admin_m->userinfo($empcode);
		
        $data['cvbank'] = $this->admin_m->select_cvbank();
        //echo '<pre/>';print_r($data['cvbank']); exit(); 
        
        $data['adminmenubar'] = $this->load->view('inc/adminmenubar', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/cv_bank_pagi', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    public function content_displayer() {
        if (isset($_POST['page']) && !empty($_POST['page'])) {
            $vpb_page_limit = 10;
            $vpb_get_total_pages = $this->admin_m->selectData('UserInfo');
            $vpb_get_total_pages = $vpb_get_total_pages[0]['num'];

            $vpb_pagination_stages = 2;
            $vpb_current_page = strip_tags($_POST['page']);
            $vpb_start_page = ($vpb_current_page - 1) * $vpb_page_limit;

            //This initializes the page setup
            if ($vpb_current_page == 0) {
                $vpb_current_page = 1;
            }
            $vpb_previous_page = $vpb_current_page - 1;
            $vpb_next_page = $vpb_current_page + 1;
            $vpb_last_page = ceil($vpb_get_total_pages / $vpb_page_limit);
            $vpb_lastpaged = $vpb_last_page - 1;
            $vpb_pagination_system = '';
            if ($vpb_last_page > 1) {
                $vpb_pagination_system .= "<div class='vpb_pagination_system'>";
                // Previous Page
                if ($vpb_current_page > 1) {
                    $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_previous_page\");'>Prev</a>";
                } else {
                    $vpb_pagination_system.= "<span class='disabled'>Prev</span>";
                }
                // Pages	
                if ($vpb_last_page < 7 + ($vpb_pagination_stages * 2)) { // Not enough pages to breaking it up
                    for ($vpb_page_counter = 1; $vpb_page_counter <= $vpb_last_page; $vpb_page_counter++) {
                        if ($vpb_page_counter == $vpb_current_page) {
                            $vpb_pagination_system.= "<span class='current'>$vpb_page_counter</span>";
                        } else {
                            $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_page_counter\");'>$vpb_page_counter</a>";
                        }
                    }
                } elseif ($vpb_last_page > 5 + ($vpb_pagination_stages * 2)) { // This hides few pages when the displayed pages are much
                    //Beginning only hide later pages
                    if ($vpb_current_page < 1 + ($vpb_pagination_stages * 2)) {
                        for ($vpb_page_counter = 1; $vpb_page_counter < 4 + ($vpb_pagination_stages * 2); $vpb_page_counter++) {
                            if ($vpb_page_counter == $vpb_current_page) {
                                $vpb_pagination_system.= "<span class='current'>$vpb_page_counter</span>";
                            } else {
                                $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_page_counter\");'>$vpb_page_counter</a>";
                            }
                        }
                        $vpb_pagination_system.= "...";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_lastpaged\");'>$vpb_lastpaged</a>";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_last_page\");'>$vpb_last_page</a>";
                    }
                    //Middle hide some front and some back
                    elseif ($vpb_last_page - ($vpb_pagination_stages * 2) > $vpb_current_page && $vpb_current_page > ($vpb_pagination_stages * 2)) {
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"1\");'>1</a>";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"2\");'>2</a>";
                        $vpb_pagination_system.= "...";
                        for ($vpb_page_counter = $vpb_current_page - $vpb_pagination_stages; $vpb_page_counter <= $vpb_current_page + $vpb_pagination_stages; $vpb_page_counter++) {
                            if ($vpb_page_counter == $vpb_current_page) {
                                $vpb_pagination_system.= "<span class='current'>$vpb_page_counter</span>";
                            } else {
                                $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_page_counter\");'>$vpb_page_counter</a>";
                            }
                        }
                        $vpb_pagination_system.= "...";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_lastpaged\");'>$vpb_lastpaged</a>";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_last_page\");'>$vpb_last_page</a>";
                    }
                    //End only hide early pages
                    else {
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"1\");'>1</a>";
                        $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"2\");'>2</a>";
                        $vpb_pagination_system.= "...";
                        for ($vpb_page_counter = $vpb_last_page - (2 + ($vpb_pagination_stages * 2)); $vpb_page_counter <= $vpb_last_page; $vpb_page_counter++) {
                            if ($vpb_page_counter == $vpb_current_page) {
                                $vpb_pagination_system.= "<span class='current'>$vpb_page_counter</span>";
                            } else {
                                $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_page_counter\");'>$vpb_page_counter</a>";
                            }
                        }
                    }
                }
                //Next Page
                if ($vpb_current_page < $vpb_page_counter - 1) {
                    $vpb_pagination_system.= "<a href='javascript:void(0);' onclick='vpb_pagination_system(\"$vpb_next_page\");'>Next</a>";
                } else {
                    $vpb_pagination_system.= "<span class='disabled'>Next</span>";
                }
                $vpb_pagination_system.= "</div>";
            }
            
            $data['vpb_pagination_system'] = $vpb_pagination_system;
            //Check the contents for this page from the database
            $data['rows'] = $this->admin_m->selectCVBankData($vpb_start_page, $vpb_page_limit);
            $data['vpb_start_page'] = $vpb_start_page;
            if (count($data['rows']) < 1) {
                echo "<div class='info'>Currently, there are no content in the database to display at the moment. Thanks...</div>";
            } else {
                $this->load->view('admin/get_cv_bank', $data);
            }
        }
    }
}
