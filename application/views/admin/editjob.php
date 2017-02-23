<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                 <?php echo $adminmenubar; ?>
            </div>
            <div class="col-md-7">
                <div class="dash_panel_area">
                    <a href="<?php echo base_url();?>admin/adminlogin/logout" class="btn btn-default btn-flat">Sign out</a>
                    <h2>Admin panel</h2>
                    <div class="single_dash_text">
                        <div class="">
                            <a href="<?php echo base_url('admin/postjob'); ?>"><img src="<?php echo base_url(); ?>assets/img/admin_img/postnewjob.png" id="back" /></a>
                        </div>
                        <p>Post new job</p>
                    </div>
                    <div class="single_dash_text">
                        <div class="">
                            <a href="<?php echo base_url('admin/blogpost'); ?>"><img src="<?php echo base_url(); ?>assets/img/admin_img/blogpost.png" alt="" /></a>
                        </div>
                        <p>Blog post</p>
                    </div>
                    <div class="single_dash_text">
                        <div class="">
                            <a href="<?php echo base_url('admin/eticketing/eticketing'); ?>"><img src="<?php echo base_url(); ?>assets/img/admin_img/eticketing.png" alt="" /></a>
                        </div>
                        <p>e-Ticketing solutions</p>
                    </div>
                    <div class="single_dash_text">
                        <div class="">
                            <a href="<?php echo base_url('admin/noticeboard/'); ?>"><img src="<?php echo base_url(); ?>assets/img/admin_img/notice.png" alt="" /></a>
                        </div>
                        <p>Notice</p>
                    </div>
                    <div class="single_dash_text">
                        <div class="">
                            <a href="<?php echo base_url('admin/dashboard');?>"><img src="<?php echo base_url(); ?>assets/img/admin_img/publishresult.png" alt="" /></a>
                        </div>
                        <p>Publish result</p>
                    </div>
                    <div class="single_dash_text">
                        <div class="">
                            <a href="<?php echo base_url('admin/search');?>"><img src="<?php echo base_url(); ?>assets/img/admin_img/cvshortlist.png" alt="" /></a>
                        </div>
                        <p>CV shortlist</p>
                    </div>
                    <div class="single_dash_text">
                        <div class="">
                            <a href="<?php echo base_url('admin/resume/cvsummary'); ?>"><img src="<?php echo base_url(); ?>assets/img/admin_img/cvsummary.png" alt="" /></a>
                        </div>
                        <p>CV summary</p>
                    </div>
                    
                    <div class="single_dash_text">
                        <div class="">
                            <a href="<?php echo base_url('admin/postjob/joblist');?>"><img src="<?php echo base_url(); ?>assets/img/admin_img/joblist.png" alt="" /></a>
                        </div>
                        <p>Job List</p>
                    </div>
                    
                </div>


                <div class="etick_submit_area">
                    
                    <h2>Edit job</h2>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="etick_submit_title">
                                <ul>
                                    <li>Department <font class="required">*</font></li>
                                    <li style="display: none;">Job Category <font class="required">*</font></li>
                                    <li>Job Titel <font class="required">*</font></li>
                                    <li>Vacancy</li>
                                    
                                    <li>Job Description</li>
                                    <li>&nbsp;</li>
                             
                                    <li style="margin-top: 60px;">Job Nature</li>
                                           <li>&nbsp;</li> 
                                    <li>Educational Requirements</li>
                                    <li>&nbsp;</li> 
                                    <li>&nbsp;</li>
                                    <li style="margin-top: 50px;">Functional Requirements</li>
                                    
                                    <li>&nbsp;</li> 
                                    <li>&nbsp;</li>
                                    <li style="margin-top: 60px;">Behavioral Requirements</li>  
                                    <li>&nbsp;</li> 
                                    <li>&nbsp;</li>                                  
                                    <li style="margin-top: 50px;">Job Requirements</li>
                                    
                               
                                    <li style="margin-top: 40px;">Job Level</li>
                                    <li>Salary</li>                                       
                                    <li>Job Location</li>
                                    <li>&nbsp;</li> 
                                    <li>Other Benefits</li>
                                    <li>&nbsp;</li> 
                               
                                    <li style="margin-top: 50px;">Required Experience</li>										                                    
                                    <li style="margin-top: 40px;">Application Deadline <font class="required">*</font></li>
                                </ul>
                            </div>
                        </div>
                        <form action="<?php echo base_url('admin/Postjob/updateJob')?>" id="form" method="post" >
                        <div class="col-md-8">
                            <div class="etick_submit_text_area">
                                
                                <div class="etick_submit_text">
                                    <input type="hidden" name="PostId" id="JobTitel" style='margin-top: 10px;'  class="form-control" value="<?php echo $postedjob[0]['PostId'];?>">
                                </div>
                                <div class="etick_submit_text">
                                    <select id="Department" style='margin-top: 10px;' name="Department" class="form-control">
                                        <?php if(isset($postedjob[0]['DepartmentId'])){ echo select_option_selected('LDepartment', 'DepartmentId','DepartmentName',$postedjob[0]['DepartmentId']) ;}else{echo select_option('LDepartment', 'DepartmentId','DepartmentName');} ?>
                                    </select>
                                </div>
                                <div class="etick_submit_text" style="display: none;">
                                    <select id="JobCategory" style='margin-top: 10px;' name="JobCategory" class="form-control">
                                        <?php if(isset($postedjob[0]['JobCategoryId'])){ echo select_option_selected('JobCategory', 'JobCategoryId','JobCategory',$postedjob[0]['JobCategoryId']) ;}else{echo select_option('JobCategory', 'JobCategoryId','JobCategory');} ?>
                                        
                                    </select>
                                </div>
                                
                                <div class="etick_submit_text">
                                    <input type="text" name="JobTitel" id="JobTitel" style='margin-top: 10px;'  class="form-control" value="<?php echo $postedjob[0]['JobTitel'];?>">
                                </div>
                                
                                <div class="etick_submit_text">
                                    <select id="Vacancy" style='margin-top: 10px;' name="Vacancy" class="form-control">
                                        <?php for($i=1; $i<11; $i++){ ?>
                                        <option value="<?php print $i; ?>" selected="<?php if($i==$postedjob[0]['Vacancy']){ echo 'selected';} ?>"><?php print $i; ?></option>      
                                        <?php } ?> 
                                    </select>
                                </div>
                                
                                <div class="etick_submit">
                                    <textarea name="JobDescription" id="JobDescription" cols="30" rows="5" value="<?php echo $postedjob[0]['JobDescription'];?>"><?php echo $postedjob[0]['JobDescription'];?></textarea>
                                </div>
                                
                                <div class="etick_submit_text">
                                    <select id="JobNature" style='margin-top: 10px;' name="JobNature" class="form-control">
                                        <?php if(isset($postedjob[0]['JobNatureId'])){ echo select_option_selected('LJobNature', 'JobNatureId','JobNature',$postedjob[0]['JobNatureId']) ;}else{echo select_option('LJobNature', 'JobNatureId','JobNature');} ?>
                                        
                                    </select>                                    
                                </div>
                                
                                <div class="etick_submit">
                                    <textarea name="EducationalRequirements" id="EducationalRequirements" cols="30" rows="5" value="<?php echo $postedjob[0]['EducationalRequirements'];?>"><?php echo $postedjob[0]['EducationalRequirements'];?></textarea>
                                </div>
                                
                                <div class="etick_submit">
                                    <textarea name="FunctionalRequirements" id="FunctionalRequirements" cols="30" rows="5" value="<?php echo $postedjob[0]['FunctionalRequirements'];?>"><?php echo $postedjob[0]['FunctionalRequirements'];?></textarea>
                                </div>
                                
                                <div class="etick_submit">
                                    <textarea name="BehavioralRequirements" id="BehavioralRequirements" cols="30" rows="5" value="<?php echo $postedjob[0]['BehavioralRequirements'];?>"><?php echo $postedjob[0]['BehavioralRequirements'];?></textarea>
                                </div>
                                
                                <div class="etick_submit">
                                    <textarea name="JobRequirements" id="JobRequirements" cols="30" rows="5" value="<?php echo $postedjob[0]['JobRequirements'];?>"><?php echo $postedjob[0]['JobRequirements'];?></textarea>
                                </div>
                                
                                <div class="etick_submit_text">
                                    <select id="JobLevel" style='margin-top: 10px;' name="JobLevel" class="form-control">
                                        <?php if(isset($postedjob[0]['JobLevelId'])){ echo select_option_selected('JobLevel', 'JobLevelId','JobLevel',$postedjob[0]['JobLevelId']) ;}else{echo select_option('JobLevel', 'JobLevelId','JobLevel');} ?>
                                    </select>                                    
                                </div>
                                
                                <div class="etick_submit_text">
                                    <input type="text" name="Salary" id="Salary" style='margin-top: 10px;'  class="form-control" value="<?php echo $postedjob[0]['Salary'];?>">
                                </div>
                                
                                <div class="etick_submit_text">
                                    <input type="text" name="JobLocation" id="JobLocation" style='margin-top: 10px;'  class="form-control" value="<?php echo $postedjob[0]['JobLocation'];?>">
                                </div>
                                <div class="etick_submit">
                                    <textarea name="OtherBenefits" id="OtherBenefits" cols="30" rows="5" value="<?php echo $postedjob[0]['OtherBenefits'];?>"><?php echo $postedjob[0]['OtherBenefits'];?></textarea>
                                </div>
                                
                                <div class="etick_submit_text">
                                    <select id="Experience" style='margin-top: 10px;' name="Experience" class="form-control">
                                        <?php if(isset($postedjob[0]['Experience'])){ echo select_option_selected('LExperience', 'ExperienceId','ExperienceName',$postedjob[0]['Experience']) ;}else{echo select_option('LExperience', 'ExperienceId','ExperienceName');} ?>
                                        
                                    </select>                                    
                                </div>
                                
                                
                                
                                
                                <div class="etick_submit_text">
                                    <div class="two_colamn date" data-provide="datepicker">
                                        <input required="required" type="text" id="ApplicationDeadline" name="ApplicationDeadline" class="datepicker" data-date-format="mm/dd/yyyy" value="<?php echo $postedjob[0]['ApplicationDeadline'];?>" placeholder="">
                                        <div class="input-group-addon input-group-addon_custom"></div>
                                    </div>
                                    
                                </div>
                                
                                <input type="submit" value="Submit" class="submit_btn" name="Submit">
                                
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="dash_user">
                    <h2>View CV summary</h2>
                </div>


            </div>
        </div>
    </div>
</section>
<section id="team-members" class="wins_area_area wow bounceIn">
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


<style type="text/css">
.required{
    color: red;
}
</style>