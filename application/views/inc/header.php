<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
        <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
        <META HTTP-EQUIV="EXPIRES" CONTENT=0>
        <title>:: ACI CV HUB ::</title>
        
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <?php if(isset($page) && $page == 'career'):?>
            <script src="<?php echo base_url();?>assets/js/career.js"></script>
            <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
            <script src="<?php echo base_url();?>assets/ckeditor/js/sample.js"></script>
        <?php endif;?>            
        <style>
            .error{
                display: none;
            }
        </style>  
        <!-- Google Fonts -->
        <!--
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->

        <!-- Bootstrap css form cdn -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel='stylesheet prefetch' href='<?php echo base_url();?>assets/css/bootstrap-datepicker.min.css'>
        <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/datepicker/datepicker.css">-->
        <!--<link href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">-->
        <!-- Font awesome css -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/dist/sweetalert.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">

        <!-- Owl carousel 2 css -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_search.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">		
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/futureemployee.css">
        <style>
            .logoutbtn:hover > a {
                color: #E13300;
                background: #E13300;
            }
            .loginbtn > a {
                color: #fff;
            }
            .loginbtn:hover > a {
                color: #E13300;
                background: #E13300;
            }
            .single_login1 {
                background: #00a65e none repeat scroll 0 0;
                border: 1px solid;
                color: #fff;
                float: right;
                margin-right: 10px;
                padding: 5px 20px;
            }
            .single_login button {
                background: #00a65e none repeat scroll 0 0;
                border: 1px solid;
                color: #fff;
                float: left;
                margin-right: 28px;
                padding: 5px 30px;
            }
            .btn-primary1 {
                background-color: #00A65E;
                border-color: #00A65E;
            }
            .navbar {
                min-height: 80px;
                margin-bottom: 0px;
            }
            .navbar-toggle {
                margin-top: 20px;
                margin-left: 10px;
            }
            .navbar-fixed-bottom, .navbar-fixed-top {
                background-color: #fff;
            }
            .navbar-nav {
                margin: 7.5px 10px;
            }
            .navbar-right .dropdown-menu {
                left: 0;
                right: auto;
            }
            .confirm{
                background-color: #00A65E !important;
            }
            .starter-template {
              padding: 60px 0px;
            }
        </style>
        <!-- jQuery form CDN -->        
    </head>
    <body>
        <header id="Home" class="header">
            <div class="container">
                <nav class="navbar navbar-fixed-top" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="logo">
                                <a href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url(); ?>assets/img/acilogoap.png" alt="" height="75" width="200" style="margin-top: 10px;" />
                                </a>   
                            </div>
                        </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="<?php if(isset($page) && $page == 'home'){ echo 'active';} ?>">
                                <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a>
                            </li>
                            <li class="<?php if(isset($page) && $page == 'aciresource'){ echo 'active';} ?> dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">ACI Resources <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('learning_development'); ?>">Learning & Development</a></li>
                                    <li><a href="<?php echo base_url('career_development'); ?>">Career Development</a></li>
                                    <li><a href="<?php echo base_url('how_different'); ?>">How ACI is Different</a></li>
                                    <li><a href="<?php echo base_url('home/aciresource'); ?>">Resource</a></li>
                                </ul>
                            </li>
                            <li class="<?php if(isset($page) && $page == 'applyprocedure' || $page == 'currentvacancy' || $page == 'career'){ echo 'active';} ?> dropdown">
                                <a href="<?php echo base_url('home/applyprocedure'); ?>" class="dropdown-toggle" data-toggle="dropdown">Future Employee <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li <?php if(isset($page) && $page == 'currentvacancy'){ echo 'active';} ?>><a href="<?php echo base_url('currentvacancy'); ?>">Current Vacancy</a></li>
                                    <li <?php if(isset($page) && $page == 'applyprocedure'){ echo 'active';} ?>><a href="<?php echo base_url('applyprocedure'); ?>">Apply Procedure</a></li>
                                    <li <?php if(isset($page) && $page == 'career'){ echo 'active';} ?>><a href="<?php echo base_url('career/careerform'); ?>">Drop CV for Future</a></li>
                                </ul>
                           </li>
                        <li class="<?php if(isset($page) && $page == 'internship'){ echo 'active';} ?>">
                            <a href="<?php echo base_url('internship'); ?>">Internship</a>
                        </li>
                        <li class="<?php if(isset($page) && $page == 'notice'){ echo 'active';} ?>">
                            <a href="<?php echo base_url('home/notice'); ?>">Notice Board</a>
                        </li>
                        <li class="<?php if(isset($page) && $page == 'contact'){ echo 'active';} ?>">
                            <a href="<?php echo base_url('contact'); ?>">Contact</a>
                        </li>
                        <?php if($this->session->userdata('is_log_user') == TRUE):?>
                        <li class="<?php if(isset($page) && $page == 'myaccount'){ echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>home/myaccount">My Account</a>
                        </li>
                        <li class="logoutbtn">
                            <a style="margin-top: 10px; padding: 3px 6px;  background: #d9534f" class="btn btn-danger btn-xs" href="<?php echo base_url('login/logout');?>">
                                <span style="color:#fff;">Logout</span>
                            </a>
                        </li>
                        <?php else:?>
                        <li class="loginbtn" data-toggle="dropdown">
                                <a style="margin: 10px; padding: 3px 6px;" class="btn btn-primary1 btn-xs" >
                                    <span style="color:#fff; background: #00A65E">Sign In</span>
                                    <span class="caret" style="color:#fff;"></span>
                                </a>
                        </li>
                        <div class="dropdown-menu" style="z-index: 99999; right: 20px; left: auto; right: 0;">
                                <div style="width: 280px; border: 0px solid #ccc;">
                                    <h4 align="center" style="padding-top: 5px;"><b>Future Employee login</b></h4>
                                    <form action="<?php echo base_url();?>login/signIn" method="post" id="login_from">
                                        <input type="email" name="email" placeholder="&nbsp;Email" style="width:80%; margin-bottom: 10px; margin-left: 10%;" />
                                        <input type="password" name="password" placeholder="&nbsp;Password" style="width:80%; margin-bottom: 10px; margin-left: 10%;"/>
                                        <input type="hidden" name="page" value="career" />
                                        <div class="single_login" style="float: left; margin-left: 30px;">
                                            <a href="<?php echo base_url();?>career/careerForm" class="single_login1" style="background-color: #00A65E;">Register</a>
                                        </div>
                                        <div class="single_login" style=" float: right;">
                                            <button type="submit" class="login_btn">Login</button>
                                           
                                        </div>
                                        <div class="single_login" style="margin-top: 40px; margin-left: 90px;">
                    
                                            <p><a style="color:#000;" href="<?php echo base_url();?>home/forgot_password/">Forgotten password?</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>  
                        <?php endif;?>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
			</div>            
        </header> <!-- End header -->
		<!--<div class="container-fluid">-->
			<div class="starter-template">