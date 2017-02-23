<section>
    <div class="row">
        <div class="col-sm-12">
            <?php include('inc/slider.php');?>
        </div>
    </div> 
</section> <!-- End slider -->
<section class="job_offer_area section-padding wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="single_job_offer_area">
                    <?php if(!empty($AllJobs)) foreach($AllJobs as $rows):?>
                    <div class="single_job_offer">
                        <div class="title_page">
                            <h2>Latest job offers</h2>
                        </div>
                        <div class="single_job_offer_title">
                            <h3><?php echo $rows['JobTitel']; ?></h3>
                            <p><?php echo $rows['DepartmentName']; ?></p>
                            <p><a class="btn btn-xs btn-success" href="<?php echo base_url();?>home/job_details_view/<?php echo $rows['PostId'];?>">Details</a></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content start  -->
<section class="job_area section-padding60 wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="job_title_area">
                    <div class="job_title">
                         <?php //echo '<pre/>';print_r($row);exit();?>
                        <h2><?php echo $row->JobTitel; ?></h2>
                    </div>
                    <div class="single_job">
                        <h2>Description/Responsibilities</h2>
                        <p>
                            <?php echo $row->JobDescription; ?><br/>
                            <?php echo $row->FunctionalRequirements; ?><br/>
                        </p>
                    </div>
                    <div class="single_job">
                        <h2>We Offer</h2>
                        <p>
                            <?php echo $row->OtherBenefits; ?><br/>
                            <?php echo $row->Salary; ?>                            
                        </p>
                    </div>
                    <?php if($row->JobLocation!=''){?>
                    <div class="single_job">
                        <h2>Job Location</h2>
                        <p>
                            <?php echo $row->JobLocation; ?>
                        </p>
                    </div>
                    <?php } ?>
                    <div class="single_job">
                        <h2>We Require</h2>
                        <p>
                            <?php echo $row->BehavioralRequirements; ?><br/>
                            <?php echo $row->JobRequirements; ?>
                        </p>
                    </div>
                    <div class="single_job">
                        <h2>Job Level</h2>
                        <p>
                            <?php 
                                $joblevel =  $row->JobLevelId; 
                                if($joblevel==2){
                                    echo "Mid Level";
                                }elseif($joblevel==3){
                                    echo "Top Level";
                                }elseif($joblevel==4){
                                    echo "Entry Level";
                                }
                            
                            ?><br/>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">                                
                <div class="job_details_area">  
                    <div class="job_details">
                        <h2>Job Detail</h2>
                    </div> 
                    <div class="single_details">
                        <h3>Job Title</h3>
                        <p><?php echo $row->JobTitel; ?></p><br>
                        <?php if(!empty($row->JobLocation)){?>
                        <h3>Location</h3>
                        <p><?php echo $row->JobLocation; ?></p><br>
                        <?php } ?>
                        <h3>Job Nature</h3>
                        <p>
                            <?php 
                                $natureid =  $row->JobNatureId; 
                                if($natureid==1){
                                        echo "Full Time";
                                }elseif($natureid==2){
                                        echo "Part Time";
                                }elseif($natureid==3){
                                        echo "Contract Based";
                                }

                        ?></p>
                        <br>
					<?php if(!empty($row->JobCategory)){?>						
                        <h3>Job Category</h3>
                        <p><?php echo $row->JobCategory; ?></p><br>
                    <?php } ?>
               
<!--                        <h3>Job ID</h3>
                        <p><?php echo $row->PostId; ?></p><br>-->

                        <h3>Number Of Vacancy</h3>
                        <p><?php echo $row->Vacancy; ?></p><br>
                        <?php
                        if(isset($UserId)){
                            $jobPosted = job_posted($row->PostId, $UserId);
                            if(!empty($jobPosted) && $jobPosted == 1){                             
                                  echo '<div style = "color:red;">Alredy Applied</div>';                  
                            }else{
                        ?>
                            <a class="btn btn-default" href="<?php echo base_url(); ?>home/applyNow/<?php echo $row->PostId; ?>">Apply Online</a>                        
                        <?php
                            } 
                        }else{
                        ?>
                            <a class="btn btn-default" href="<?php echo base_url(); ?>home/applyNow/<?php echo $row->PostId; ?>">Apply Online</a>
                        <?php } ?>
                        <!--<a href="<?php //echo base_url();?>home/index/">Back</a>-->
                    </div>                 
                </div>
                
            </div>
            
        </div>
    </div>
</section>

<section id="team-members" class="big_area_area wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="co-md-12">
                <div class="single_big">
                    <h2>THINK<span>&nbsp;BIG<br></span>DREAM <span>BIGGER</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>





