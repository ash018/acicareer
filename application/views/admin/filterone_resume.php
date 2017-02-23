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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- Font awesome css -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/progres.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin_style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    </head>    
    <body>
        <header id="Home" class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3 col-md-offset-1">
                        <div class="logo">
                            <a href="main.php"><img src="<?php echo base_url(); ?>assets/img/logo_3.png" alt="" /></a>   
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
                            <p>Congratulations. You are authorized <a href="">SUPER ADMIN</a></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="main_manu_icon">
                            <img src="<?php echo base_url(); ?>assets/img/bell.png" alt="" />
                            <img src="<?php echo base_url(); ?>assets/img/envalap.png" alt="" />
                            <img src="<?php echo base_url(); ?>assets/img/off.png" alt="" />
                        </div>
                    </div>                      
                </div>
            </div>
        </header> <!-- End header -->

        <?php //include 'admin/header.php';?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="quick_area">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="single_quick">
                                        <div class="single_quick_filter_active" id="QuickFilters">
                                            <p>Quick Filters</p>
                                        </div>
                                        <div class="single_quick_filter" id="Academic">
                                            <p>Advanced Filter</p>
                                        </div>
                                        <div class="single_quick_filter" id="Experience">
                                            <p>Experience</p>
                                        </div>
											 <div class="single_quick_filter" id="Recommendation">
                                            <p>Recommendation</p>
                                        </div>
                                        <div class="single_quick_filter" id="Internship">
                                            <p>Internship</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <!-- Filter option1 -->
										<form action="<?php echo base_url('admin/Resume/filterOneAction');?>" method="post">
										<div class="qukic_box" id="QuickFilters_form">
                                        <div class="single_quick_left">
                                            <div class="single_quick_input">
                                                <input type="text" name="UserName" placeholder="Name of applicant"/>
                                            </div>
                                            <div class="single_quick_input age_are">
                                                <input type="text" name="Add1" placeholder="Location"/>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="Add1c">Current Location</label>
                                                    <label><input type="checkbox" name="Add2">Permanent Location</label>
                                                </div>
                                            </div>
                                            <div class="single_quick_input">
                                                <input type="text" name="ExpSalary" placeholder="Salary Range"/>
                                            </div>
												 <div class="single_quick_input">
                                                <input type="text" name="JobTitel" placeholder="Job Title"/>
                                            </div>
                                        </div>
                                        <div class="single_quick_right">
                                            <input type="text" name="AgeFrom" placeholder="Age from"/>
                                            <input type="text" name="AgeTo" placeholder="Age to"/>
                                            <div class="single_quick_age">
                                                <h3>Gender</h3>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="Gender[]">Male</label>
                                                    <label><input type="checkbox" name="Gender[]">Famale</label>
                                                    <label><input type="checkbox" name="Gender[]">Both</label>
                                                </div>
                                            </div>
                                            <div class="single_quick_age">
                                                <h3>Job Level</h3>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="JobLevel[]">Entry</label>
                                                    <label><input type="checkbox" name="JobLevel[]">Mid</label>
                                                    <label><input type="checkbox" name="JobLevel[]">Top</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="InvitedApplicantsOnly">Invited applicants only</label>
                                                </div>
                                            </div>
                                            <input class="sarch_btn" type="submit" name="submit" value="Submit">
                                        </div>
                                    </div>
										</form>
                                    <div class="qukic_box" id="Academic_form" style="display:none;">
                                        <div class="single_quick_left">
                                            <div class="single_quick_input_two">
                                                <input type="text" placeholder="Minimum Level of Degree"/>
                                            </div>
                                            <div class="single_quick_input_two margin-top">
                                                <input type="text" placeholder="Mejor Subject"/>
                                            </div>
                                            <div class="single_quick_input_two">
                                                <input type="text" placeholder="Institute"/>
                                            </div>
                                        </div>
                                        <div class="single_quick_right">
                                            <div class="single_quick_input_one">
                                                <input type="text" placeholder="Course/Degree name"/>
                                            </div>
                                            <div class="single_quick_input_one">
                                                <input type="text" placeholder="Result"/>
                                            </div>
                                            <button class="sarch_btn_one">Search</button>
                                        </div>
                                    </div>
                                    <div class="qukic_box" id="Experience_form" style="display:none;">

                                        <div class="single_quick_left">
                                            <h2>Experience level</h2>
                                            <div class="single_quick_input_three">
                                                <input type="text" placeholder="Any"/>
                                            </div>
                                            <p>to</p>
                                            <div class="single_quick_input_fore">
                                                <input type="text" placeholder="Any"/>
                                            </div>
                                            <div class="single_quick_input_two">
                                                <input type="text" placeholder="Institute ( Select up to 5 )"/>
                                            </div>
                                        </div>
                                        <div class="single_quick_right">
                                            <div class="single_quick_input_five">
                                                <input type="text" placeholder="Course/Degree name"/>
                                            </div>
                                            <button class="sarch_btn_five">Search</button>
                                        </div>

                                    </div>
										
										<!--New search option is included here  -->										
										<div class="qukic_box" id="Recommendation_form" style="display:none;">
                                        <div class="single_quick_left">
                                            Business Team
													<div class="single_quick_input_two margin-top">
														<select name="Recommendation">
															<option value="1">1. Consumer brands</option>
															<option value="2">2. Corporate</option>
															<option value="3">3. Agribusiness</option>
															<option value="4">4. Pharma</option>
															<option value="5">5. Logistics</option>
														</select>													  
                                            </div>                                            
                                        </div>
                                        <div class="single_quick_right">                                            
                                            <button class="sarch_btn_one">Search</button>
                                        </div>
                                    </div>
										
										<div class="qukic_box" id="Internship_form" style="display:none;">
                                        <div class="single_quick_left">
                                            <div class="single_quick_input_two">
                                                <input type="text" name="universityname" placeholder="University Name"/>
                                            </div>
                                            <div class="single_quick_input_two margin-top">
                                                <input type="text" name="grade" placeholder="Grade"/>
                                            </div>
                                            <div class="single_quick_input_two">
                                                Month<select name="fromMonth">
															<option value="1">Jan</option>
															<option value="2">Feb</option>
															<option value="3">Mar</option>
															<option value="4">Apr</option>
															<option value="5">May</option>
															<option value="6">Jun</option>
															<option value="7">Jul</option>
															<option value="8">Aug</option>
															<option value="9">Sep</option>
															<option value="10">Oct</option>
															<option value="11">Nov</option>
															<option value="12">Dec</option>
														</select>to
														<select name="toMonth">
															<option value="1">Jan</option>
															<option value="2">Feb</option>
															<option value="3">Mar</option>
															<option value="4">Apr</option>
															<option value="5">May</option>
															<option value="6">Jun</option>
															<option value="7">Jul</option>
															<option value="8">Aug</option>
															<option value="9">Sep</option>
															<option value="10">Oct</option>
															<option value="11">Nov</option>
															<option value="12">Dec</option>
														</select>	
                                            </div>
                                        </div>
                                        <div class="single_quick_right">                                            
                                            <button class="sarch_btn_one">Search</button>
                                        </div>
                                    </div>
									
									</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


		<!-- First Summary display  -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="counter_area">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="count_area">
                                                <h3>Application</h3>
                                                <div class="single_count wow pulse">
                                                    <p class="counter">136</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="count_area">
                                                <h3>Best Match</h3>
                                                <div class="single_count wow pulse">
                                                    <p class="counter">29</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="count_area">
                                                <h3>Short Listed</h3>
                                                <div class="single_count wow pulse">
                                                    <p class="counter">12</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="count_area">
                                                <h3>Selected</h3>
                                                <div class="single_count wow pulse">
                                                    <p class="counter">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="contact_area">
                            <?php if (!empty($AllResume)) foreach ($AllResume as $row): ?>
                            <div class="contact_dita" id="message_approve_shortlist<?php echo $row['UserId'];?>">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="single_img wow pulse">
                                            <img src="<?php echo base_url(); ?>assets/img/HR---Dashboard_02.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="single_name">
                                            <h2><?php echo $row['UserName']; ?></h2>
                                            <ul>
                                                <li><span>Age: 32</span></li>
                                                <li><span>Khulna University</span></li>
                                                <li><span>100%</span></li>
                                            </ul>
                                            <div id="bar1" class="barfiller">
                                                <span class="fill" data-percentage="100"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="single_details">
                                            <h2>Contact Details</h2>
                                            <ul>
                                                <li><span><?php echo $row['Mobile']; ?></span></li>
                                                <li><span><?php echo $row['TelNo']; ?></span></li>
                                                <li><span><?php echo $row['Email']; ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="single_details">
                                            <ul>
                                                <li><?php echo $row['ExpectedSalary']; ?></li>
                                                <li><?php echo "Not Viewed"; ?></li>													  <li>													  
                                                    <Select name="Recommendation" id="Business<?php echo $row['UserId']; ?>">
                                                    <?php select_option_business('Business','Business','BusinessName');?>                                      
                                                </Select>
                                                </li>	
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="single_icon">
                                            <a href="javascript:;" onclick="approve_shortlist('<?php echo $row['UserId'];?>','<?php echo $row['PostId'];?>','1')"><i class="fa fa-check"></i></a>
                                            <a href="javascript:;" onclick="approve_shortlist('<?php echo $row['UserId'];?>','<?php echo $row['PostId'];?>','2')"><i class="fa fa-times"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/resume/resumeDetails/<?php echo $row['UserId'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="javascript:;" onclick="approve_recommendation('<?php echo $row['UserId'];?>','<?php echo $row['PostId'];?>','1')"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <?php endforeach; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="team-members" class="wins_area_area wow pulse">
            <div class="container">
                <div class="row">
                    <div class="co-md-12">
                        <div class="single_wins">
							<h2>TALENT <span>WINS</span> GAMES</h2>
							<h2>BUT <span>TEAMWORK</span> AND <span>INTELLIGENCE</span></h2>
							<h2>WINS <span>CHAMPIONSHIPS </span></h2>
						</div>
                    </div>
                </div>
            </div>
        </section>
        <?php //include 'footer.php'; ?>

        <footer id="footer" class="footer_area wow bounceIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="footer-title">
                            <p>2016 ACI Bangladesh. All rights resurved</p>
                        </div>
                    </div>

                    <div class="col-md-5 col-md-offset-1">
                        <div class="footer-widget">
                            <ul>                
                                <li><a href="">Privecy policy</a></li>
                                <li><a href="">Sitemap</a></li>
                                <li><a href="">Contact us</a></li>                           
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- jQuery form CDN -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Bootstrap form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- jQuery sticky -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.sticky.js"></script>
        <!-- jQuery wow -->
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <!-- jQuery counterup -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
        <!-- jQuery main script -->
        <script src="<?php echo base_url(); ?>assets/js/admin_main.js"></script>
        <!-- jQuery barfiller script -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.barfiller.js"></script>
        <script>
        $(document).ready(function () {
            $("#QuickFilters").click(function () {
				$("#QuickFilters").addClass('single_quick_filter_active');
				$("#QuickFilters").removeClass('single_quick_filter');
				$("#Academic").addClass('single_quick_filter');
				$("#Academic").removeClass('single_quick_filter_active');
				$("#Experience").addClass('single_quick_filter');
				$("#Experience").removeClass('single_quick_filter_active');
				
				$("#Recommendation").addClass('single_quick_filter');
				$("#Recommendation").removeClass('single_quick_filter_active');
				
				$("#Internship").addClass('single_quick_filter');
				$("#Internship").removeClass('single_quick_filter_active');
				
				
				$("#QuickFilters_form").show();
				$("#Academic_form").hide();
				$("#Experience_form").hide();
				$("#Recommendation_form").hide();
				$("#Internship_form").hide();
            });
			
            $("#Academic").click(function () {
				$("#QuickFilters").addClass('single_quick_filter');
				$("#QuickFilters").removeClass('single_quick_filter_active');
				$("#Academic").addClass('single_quick_filter_active');
				$("#Academic").removeClass('single_quick_filter');
				$("#Experience").addClass('single_quick_filter');
				$("#Experience").removeClass('single_quick_filter_active');
				
				$("#Recommendation").addClass('single_quick_filter');
				$("#Recommendation").removeClass('single_quick_filter_active');
				
				$("#Internship").addClass('single_quick_filter');
				$("#Internship").removeClass('single_quick_filter_active');
				
				$("#QuickFilters_form").hide();
				$("#Academic_form").show();
				$("#Experience_form").hide();
				$("#Recommendation_form").hide();
				$("#Internship_form").hide();
            });
			
            $("#Experience").click(function () {
				$("#QuickFilters").addClass('single_quick_filter');
				$("#QuickFilters").removeClass('single_quick_filter_active');
				$("#Academic").addClass('single_quick_filter');
				$("#Academic").removeClass('single_quick_filter_active');
				$("#Experience").addClass('single_quick_filter_active');
				$("#Experience").removeClass('single_quick_filter');
				
				$("#Recommendation").addClass('single_quick_filter');
				$("#Recommendation").removeClass('single_quick_filter_active');
				
				$("#Internship").addClass('single_quick_filter');
				$("#Internship").removeClass('single_quick_filter_active');
				
				$("#QuickFilters_form").hide();
				$("#Academic_form").hide();
				$("#Experience_form").show();
				$("#Recommendation_form").hide();
				$("#Internship_form").hide();
            });
			
			$("#Recommendation").click(function () {
				$("#QuickFilters").addClass('single_quick_filter');
				$("#QuickFilters").removeClass('single_quick_filter_active');
				$("#Academic").addClass('single_quick_filter');
				$("#Academic").removeClass('single_quick_filter_active');
				$("#Recommendation").addClass('single_quick_filter_active');
				$("#Recommendation").removeClass('single_quick_filter');
				
				$("#Recommendation").addClass('single_quick_filter');
				$("#Recommendation").removeClass('single_quick_filter_active');
				
				$("#Internship").addClass('single_quick_filter');
				$("#Internship").removeClass('single_quick_filter_active');
				
				$("#QuickFilters_form").hide();
				$("#Academic_form").hide();
				$("#Experience_form").hide();
				$("#Recommendation_form").show();
				$("#Internship_form").hide();
            });
			
			$("#Internship").click(function () {
				$("#QuickFilters").addClass('single_quick_filter');
				$("#QuickFilters").removeClass('single_quick_filter_active');
				$("#Academic").addClass('single_quick_filter');
				$("#Academic").removeClass('single_quick_filter_active');
				$("#Internship").addClass('single_quick_filter_active');
				$("#Internship").removeClass('single_quick_filter');
				
				$("#Recommendation").addClass('single_quick_filter');
				$("#Recommendation").removeClass('single_quick_filter_active');
				
				$("#Internship").addClass('single_quick_filter');
				$("#Internship").removeClass('single_quick_filter_active');
				
				$("#QuickFilters_form").hide();
				$("#Academic_form").hide();
				$("#Experience_form").hide();
				$("#Recommendation_form").hide();
				$("#Internship_form").show();
            });
			
			
        });
        </script>
        <script>
        function approve_shortlist(UserId,PostId,ShortList){        
        if(UserId == "" && PostId == ""){alert("Please write Return quantity.");return false;}
            if(PostId != "")
            {
                var dataString = "PostId=" + PostId +
                "&UserId=" + UserId +
                "&ShortList=" + ShortList +
                "&action=approve";
                console.log(dataString);//return false;
                jQuery.ajax({  
                    type: "POST",  
                    url: "<?php echo base_url();?>admin/search/approveShortList",  
                    data: dataString,
                    beforeSend: function() 
                    {
                        jQuery("#display_approve_loading"+PostId).show();
                        jQuery("#display_approve_loading"+PostId).html('<img src="<?php echo base_url();?>assets/images/loading.gif" align="absmiddle" alt="Loading..."> Receiving...');
                    },  
                    success: function(response)
                    {
                        jQuery("#display_approve_loading"+PostId).hide();
                        jQuery("#message_approve_shortlist"+UserId).hide();
                    }
                }); 
            }
            else 
            {
                alert("Sorry, we could not verify the identity of the post you have just clicked. Please try again or contact the site admin if this problem persist. Thanks...");
            }
        }
        </script>
        
        <script>
        function approve_recommendation(UserId,PostId,Recommendation){ 
            var Business = jQuery("#Business"+UserId).val();
            //console.log(Business);return false;
            if(UserId == "" && PostId == ""){alert("Please write Return quantity.");return false;}
                if(PostId != "")
                {
                    var dataString = "PostId=" + PostId +
                    "&UserId=" + UserId +
                    "&Recommendation=" + Recommendation +
                    "&Business=" + Business +
                    "&action=approve";
                    console.log(dataString);//return false;
                    jQuery.ajax({  
                        type: "POST",  
                        url: "<?php echo base_url();?>admin/search/approveRecommendation",  
                        data: dataString,
                        beforeSend: function() 
                        {
                            jQuery("#display_approve_loading"+PostId).show();
                            jQuery("#display_approve_loading"+PostId).html('<img src="<?php echo base_url();?>assets/images/loading.gif" align="absmiddle" alt="Loading..."> Receiving...');
                        },  
                        success: function(response)
                        {
                            jQuery("#display_approve_loading"+PostId).hide();
                            jQuery("#message_approve_shortlist"+UserId).hide();
                        }
                    }); 
                }
                else 
                {
                    alert("Sorry, we could not verify the identity of the post you have just clicked. Please try again or contact the site admin if this problem persist. Thanks...");
                }
            }
        </script>
    </body>
</html>