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
                            <a href="<?php echo base_url();?>admin/postjob"><img src="<?php echo base_url(); ?>assets/img/logo_3.png" alt="" /></a>   
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
                            <p>Congratulations. You are authorized <a href="<?php echo base_url(); ?>admin/postjob/joblist">SUPER ADMIN</a></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="main_manu_icon">
                            <img src="<?php echo base_url(); ?>assets/img/bell.png" alt="" />
                            <img src="<?php echo base_url(); ?>assets/img/envalap.png" alt="" />
                            <?php if($this->session->userdata('is_log_admin') == TRUE):?>                   
                                <a href="<?php echo base_url();?>admin/adminlogin/logout"><img src="<?php echo base_url(); ?>assets/img/off.png" alt="" /></a>
                            <?php else:?>
                                <a href="<?php echo base_url();?>admin/adminlogin/"><img src="<?php echo base_url(); ?>assets/img/login.png" alt="" /></a>
                            <?php endif;?>
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
										<?php if($page == 'filterOneAction'){$QuickFilters = 'single_quick_filter_active';}else{$QuickFilters = 'single_quick_filter';}?>
										<div class="<?php echo $QuickFilters;?>" id="QuickFilters">
											<p>Quick Filters</p>
										</div>
										<?php if($page == 'advancefilter'){$advancefilter = 'single_quick_filter_active';}else{$advancefilter = 'single_quick_filter';}?>
										<div class="<?php echo $advancefilter;?>" id="Academic">
											<p>Advanced Filter</p>
										</div>
										<?php if($page == 'experience'){$experience = 'single_quick_filter_active';}else{$experience = 'single_quick_filter';}?>
										<div class="<?php echo $experience;?>" id="Experience">
											<p>Experience</p>
										</div>
										<?php if($page == 'filterRecommendation'){$classname = 'single_quick_filter_active';}else{$classname = 'single_quick_filter';}?>
										<div class="<?php echo $classname;?>" id="Recommendation">
											<p>Recommendation</p>
										</div>
										<?php if($page == 'filterInternship'){$filterInternship = 'single_quick_filter_active';}else{$filterInternship = 'single_quick_filter';}?>
										<div class="<?php echo $filterInternship;?>" id="Internship">
											<p>Internship</p>
										</div>
									</div>
								</div>
                                <div class="col-md-10">
                                    <!-- Filter option1 -->
                                    <form action="<?php echo base_url('admin/Resume/filterOneAction');?>" method="post">
										<?php if($page == 'filterOneAction'){$QuickFilters = '';}else{$QuickFilters = 'style="display:none;"';}?>
										<div class="qukic_box" id="QuickFilters_form" <?php echo $QuickFilters;?>>
											<div class="single_quick_left">
												<div class="single_quick_input">
													<input type="text" name="UserName" placeholder="Name of applicant"/>
												</div>                                            
												<div class="single_quick_input">
													<input style="width:130px;" type="text" name="ExpectedSalaryFrom" placeholder="Min Salary"/>
													&nbsp;&nbsp;<font style="color:#fff;">To</font>&nbsp;&nbsp;
													<input style="width:130px;" type="text" name="ExpectedSalaryTo" placeholder="Max Salary"/>
												</div><Br>
												<div class="single_quick_input">
													<!--<input type="text" name="JobTitel" placeholder="Job Title"/>-->
													<select name="JobTitel" id="JobTitel" class="form-control">
														<option value="">Select Job Title</option>
														<?php foreach($jobtitle as $jt){ ?>
															<option><?php print $jt['JobTitel']; ?></option>
														<?php } ?>
													</select>
												</div>
												<div class="single_quick_input">
													<input type="text" name="applicantlocation" placeholder="Applicant Location"/>													
												</div>
											</div>
											<div class="single_quick_right">
												<input type="text" name="AgeFrom" placeholder="Age from"/>
												<input type="text" name="AgeTo" placeholder="Age to"/>
												<div class="single_quick_age">
													<h3>Gender</h3>
													<div class="checkbox">
														<label><input type="radio" name="Gender" value="Male">Male</label>
														<label><input type="radio" name="Gender" value="Female">Female</label>
														<label><input type="radio" name="Gender" value="">Both</label>
													</div>
												</div>
												<div class="single_quick_age">
													<h3>Job Level</h3>
													<div class="checkbox">
														<label><input type="radio" name="JobLevel" value="2">Entry</label>
														<label><input type="radio" name="JobLevel" value="3">Mid</label>
														<label><input type="radio" name="JobLevel" value="4">Top</label>
													</div>                                                
												</div>
												<input class="sarch_btn" type="submit" name="submit" value="Submit">
											</div>
										</div>
									</form>
                                
									<form action="<?php echo base_url('admin/Resume/advancefilter');?>" method="post">                                
										<?php if($page == 'advancefilter'){$advancefilter = '';}else{$advancefilter = 'style="display:none;"';}?>
										<div class="qukic_box" id="Academic_form" <?php echo $advancefilter;?>>
											<div class="single_quick_left">
												<div class="single_quick_input_two">
													<!--<input type="text" placeholder="Minimum Level of Degree" name="MinimumLevelofDegree" id="MinimumLevelofDegree" />-->
													<select name="MinimumLevelofDegree" class="form-control">
														<option value="">Select Minimum Level of Degree</option>
														<?php echo isset($row->EducationLevel) ? select_option_selected('LEducationLevel', 'Id', 'EducationLevel', 'EducationLevel') : select_option('LEducationLevel', 'Id', 'EducationLevel'); ?>
													</select>
												</div>
												<div class="single_quick_input_two margin-top">
													<!--<input type="text" placeholder="Major Subject" id="MejorSubject" name="MejorSubject" />-->
													<select name="MejorSubject" class="form-control">
														<option value="">Major/Concentration </option>
														<?php echo isset($row->Faculty) ? select_option_selected('LFaculty', 'Id', 'FacultyName', 'Faculty') : select_option('LFaculty', 'Id', 'FacultyName'); ?>
													</select>
												</div>
												<div class="single_quick_input_two">
												  <!--<input type="text" placeholder="Institute" name="Institute" id="Institute" />-->
														<select name="Institute" id="Institute" class="form-control">
														<option value="">Select University</option>
														<?php foreach($UniversityName as $uni){ ?>
															<option><?php print $uni['InstituteName']; ?></option>
														<?php } ?>
													</select>	
												</div>
											</div>
											<div class="single_quick_right">
												<div class="single_quick_input_one">
													<!--<input type="text" placeholder="Course/Degree name" id="DegreeName" name="DegreeName" />-->
													<select name="DegreeName" class="form-control">
														<option value="">Select Course/Degree name</option>
														<?php echo isset($row->EducationLevel) ? select_option_selected('LEducationLevel', 'Id', 'EducationLevel', 'EducationLevel') : select_option('LEducationLevel', 'Id', 'EducationLevel'); ?>
													</select>
												</div>
												<div class="single_quick_input_one">
													<input type="text" placeholder="Result" id="Result" name="Result" />
												</div>
												<button class="sarch_btn_one">Search</button>
											</div>
										</div>
									</form>
                                
									<form action="<?php echo base_url('admin/Resume/experience');?>" method="post"> 
										<?php if($page == 'experience'){$experience = '';}else{$experience = 'style="display:none;"';}?>
										<div class="qukic_box" id="Experience_form" <?php echo $experience;?>>
											<div class="single_quick_left" style="height: 116px;">
												<h2>Experience level</h2>
												<div class="single_quick_input_three">
													<input type="text" placeholder="Any" id="ExperienceFrom" name="ExperienceFrom" />
												</div>
												<p>to</p>
												<div class="single_quick_input_fore">
													<input type="text" placeholder="Any" id="ExperienceTo" name="ExperienceTo"/>
												</div>
												<div class="single_quick_input_two">
													<select name="InstituteName" id="InstituteName" class="form-control">
														<option value="">Select Institute</option>
														<?php foreach($CompanyName as $company){ ?>
															<option><?php print $company['CompanyName']; ?></option>
														<?php } ?>
													</select>
													
												</div>
											</div>
											<div class="single_quick_right">
												
												<button class="sarch_btn_five">Search</button>
											</div>
										</div>
									</form>
                                    										
									<!--New search option is included here  -->										
									<form action="<?php echo base_url('admin/Resume/filterRecommendation');?>" method="post">
										<?php if($page == 'filterRecommendation'){$filterRecommendation = '';}else{$filterRecommendation = 'style="display:none;"';}?>
										<div class="qukic_box" id="Recommendation_form" <?php echo $filterRecommendation;?>>
											<div class="single_quick_left" style="height: 216px;">
												<h2>Business Team</h2>
													<div class="single_quick_input_two margin-top">
													<Select name="Recommendation" id="Recommendation">
														<?php select_option_business('Business','Business','BusinessName');?>	
													</select>													  
												</div>                                            
											</div>
											<div class="single_quick_right">                                            
												<button class="sarch_btn_one">Search</button>
											</div><br>
										</div>
									</form>
										
									<form action="<?php echo base_url('admin/Resume/filterInternship');?>" method="post">
										<?php if($page == 'filterInternship'){$filterInternships = 'single_quick_filter_active';}else{$filterInternships = 'style="display:none;"';}?>
										<div class="qukic_box" id="Internship_form" <?php echo $filterInternships;?>>
											<div class="single_quick_left">
												<div class="single_quick_input_two">
													<input type="text" name="universityname" id="universityname" placeholder="University Name"/>
												</div>
												<div class="single_quick_input_two margin-top">
													<input type="text" name="grade" id="grade" placeholder="Grade"/>
												</div>
												<div class="single_quick_input_two" style="height: 116px;">
													<font style="color:#fff;">Month</font>
													<select name="fromMonth" class="form-control">
															<option value=""></option>
															<?php
																for ($i = 12; $i > 0; $i--) {
																	$timestamp = mktime(0, 0, 0, date('n') - $i, 1);
																	echo'<option value="'.date('F', $timestamp).'">'.date('F', $timestamp).'</option>'; 
																}
															?> 
													</select>
													<font style="color:#fff;">To</font>
													<select name="toMonth" class="form-control">															
														<option value=""></option>
														<?php
															for ($i = 12; $i > 0; $i--) {
																$timestamp = mktime(0, 0, 0, date('n') - $i, 1);
																echo'<option value="'.date('F', $timestamp).'">'.date('F', $timestamp).'</option>'; 
															}
														?>
													</select>	
												</div>
											</div>
											<div class="single_quick_right">                                            
												<button class="sarch_btn_one">Search</button>
											</div>
										</div>
									</form>                                    
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


		<!-- First Summary display  -->
		<?php //echo count($shortlist);//echo '<pre/>';print_r($shortlist);?>
        <!--<section>
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
                                                    <p class="counter"><?php echo count($AllResume);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="count_area">
                                                <h3>Best Match</h3>
                                                <div class="single_count wow pulse">
                                                    <p class="counter"><?php echo $row->TBestMatch;?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="count_area">
                                                <h3>Short Listed</h3>
                                                <div class="single_count wow pulse">
                                                    <p class="counter" id="TShortList"><?php echo count($shortlist);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="count_area">
                                                <h3>Selected</h3>
                                                <div class="single_count wow pulse">
                                                    <p class="counter" id="TSelected"><?php echo $row->TSelected;?></p>
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
        </section>-->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="contact_area">
                            <?php if (!empty($AllResume)) foreach ($AllResume as $row): ?>
                            <div class="contact_dita" id="message_approve_shortlist<?php echo $row['PostId'];?><?php echo $row['UserId'];?>">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="single_img wow pulse">
                                            <?php 
                                                if(empty($row['Thumb'])){
                                                    $img_url = base_url().'assets/img/HR---Dashboard_02.png';                                                                                                  
                                                }else{
                                                    $img_url = base_url().'assets/image/upload/thumbnail/'.$row['Thumb'];                                                     
                                                }
                                            ?>
                                            <img src="<?php echo $img_url;?>" alt="" width="80px" height="60px" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="single_name">
                                            <h2><?php echo $row['UserName']; ?></h2>
                                            <ul>
                                                <li><span>Age: <?php echo number_format($row['Age']); ?></span></li>
                                                <li><span>Post: <b><?php echo $row['JobTitel']; ?></b></span></li>
                                                <li><span>Education: <?php echo $row['Education']; ?></span></li>
                                                
                                                
<!--                                                <li><span>100%</span></li>-->
                                            </ul>
<!--                                            <div id="bar1" class="barfiller">
                                                <span class="fill" data-percentage="100"></span>
                                            </div>-->
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
                                                <li><?php echo "Not Viewed"; ?></li>
                                                <li>													  
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
                                            <a href="javascript:;" onclick="approve_recommendation('<?php echo $row['UserId'];?>','<?php echo $row['PostId'];?>','1')"><i class="fa fa-thumbs-o-up"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <?php endforeach; ?> 
                            
                            
                            
                            <?php
                            if(!empty($_GET['page'])){
                                $page = $_GET['page'];    
                            }else{
                                $page = 1;    
                            }  
                            $controller = $this->uri->segment(1);  
                            $methode = $this->uri->segment(2);  
                            $methode1 = $this->uri->segment(3); 
                            ?>          
                                      
                            <?php if(!empty($paging)){ ?>
                            <ul class="pagination">
                            
                            <?php 
                              if($page != 1){
                                ?>
                                    <li>
                                        <a href="<?php print base_url().$controller.'/'.$methode.'/'.$methode1; ?>?page=<?php print $page - 1; ?>">Previous</a>
                                    </li>
                                <?php    
                              }
                            ?>
                            
                            <?php for($i=0; $i<count($paging); $i++){ ?>
                                <li <?php if($page == $i+1){ ?> class="active" <?php } ?>>
                                <a href="<?php print base_url().$controller.'/'.$methode.'/'.$methode1; ?>?page=<?php print $i+1; ?>"><?php print $i+1; ?></a></li>
                            <?php } ?>  
                            
                            <?php
                             if($page != count($paging)){
                                ?>
                                    <li>
                                        <a href="<?php print base_url().$controller.'/'.$methode.'/'.$methode1; ?>?page=<?php print $page + 1; ?>">Next</a>
                                    </li>
                                <?php    
                              }                                                  
                            ?>
                                                                           
                            </ul>
                            <?php } ?>
                            
                            
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
				
				$("#Experience").addClass('single_quick_filter');
				$("#Experience").removeClass('single_quick_filter_active');
				
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
				
				//$("#Internship").addClass('single_quick_filter');
				//$("#Internship").removeClass('single_quick_filter_active');
				
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
                        jQuery("#display_approve_loading"+PostId+UserId).show();
                        jQuery("#display_approve_loading"+PostId+UserId).html('<img src="<?php echo base_url();?>assets/images/loading.gif" align="absmiddle" alt="Loading..."> Receiving...');
                    },  
                    success: function(response)
                    {
                        jQuery("#display_approve_loading"+PostId+UserId).hide();
                        jQuery("#message_approve_shortlist"+PostId+UserId).hide();
						
						var TSelected = jQuery("#TSelected").val();
						var tt = parseInt(TSelected)+1;
						console.log(tt);
						jQuery("#TSelected").text(tt);
						
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
                            jQuery("#display_approve_loading"+PostId+UserId).show();
                            jQuery("#display_approve_loading"+PostId+UserId).html('<img src="<?php echo base_url();?>assets/images/loading.gif" align="absmiddle" alt="Loading..."> Receiving...');
                        },  
                        success: function(response)
                        {
                            jQuery("#display_approve_loading"+PostId+UserId).hide();
                            jQuery("#message_approve_shortlist"+PostId+UserId).hide();
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