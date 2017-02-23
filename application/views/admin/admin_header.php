<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page_title; ?></title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 

        <!-- Bootstrap css form cdn -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap-datepicker.min.css'>
        <!-- Font awesome css -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">

        <!-- Owl carousel 2 css -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
        <!-- Custom CSS -->
        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pagination.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin_style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin_style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">
        <?php if(isset($page) && $page == 'NoticeBoard' || $page == 'postjob'):?>
        <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url();?>assets/ckeditor/js/sample.js"></script>
        <!--<script src="<?php echo base_url();?>assets/ckeditor/js/sample2.js"></script>-->
        <?php endif;?>
    </head>    
    <body>
        <header id="Home" class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3 col-md-offset-1">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>admin/postjob/joblist"><img src="<?php echo base_url(); ?>assets/img/logo_3.png" alt="" /></a>   
                        </div>
                        <div class="mobile_nave_bar">
                            <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars"></i></span>  
                        </div>
                        <div class="logo_title">
                            <h2>advancing</h2>
                            <p>possibilities</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="main_manu_title">
                            <?php if($this->session->userdata('is_log_admin') == TRUE):?>
                            <p>Congratulations. You are authorized <a href="<?php echo base_url(); ?>admin/postjob/joblist">SUPER ADMIN</a></p>
                            <?php else:?>
                            <p style="font-size:18px;">Please Login First</p>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="main_manu_icon">                            
                            <?php if($this->session->userdata('is_log_admin') == TRUE):?>                   
                                <img src="<?php echo base_url(); ?>assets/img/bell.png" alt="" />
                                <img src="<?php echo base_url(); ?>assets/img/envalap.png" alt="" />
                                <a href="<?php echo base_url();?>admin/adminlogin/logout"><img src="<?php echo base_url(); ?>assets/img/off.png" alt="" /></a>
                            <?php else:?>
                                <a style="display: none;" href="<?php echo base_url();?>admin/adminlogin/"><img src="<?php echo base_url(); ?>assets/img/login.png" alt="" /></a>
                            <?php endif;?>
                        </div>
                    </div>                      
                </div>
            </div>
        </header> <!-- End header -->