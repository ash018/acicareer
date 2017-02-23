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
                    <?php 
                            //echo '<pre/>';print_r($data['Department']);exit();
                            if(!empty($AllJobs)) foreach($AllJobs as $row):?>
                    <div class="single_job_offer">
                        <div class="title_page">
                            <h2>Latest job Openings</h2>
                        </div>
                        <div class="single_job_offer_title">
                            <h3><?php echo $row['JobTitel']; ?></h3>
                            <p><?php echo $row['DepartmentName']; ?></p>
                            <p><a class="btn btn-xs btn-success" href="<?php echo base_url();?>home/job_details_view/<?php echo $row['PostId'];?>">Details</a></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php 
                    if(!empty($AllJobs)){ 
                        if(count($AllJobs) == 1){
                            ?> 
                            <?php if(!empty($AllJobs)) foreach($AllJobs as $row):?>
                                <div class="single_job_offer">
                                    <div class="title_page">
                                        <h2>Latest job offers</h2>
                                    </div>
                                    <div class="single_job_offer_title">
                                        <h3><?php echo $row['JobTitel']; ?></h3>
                                        <p><?php echo $row['JobDescription']; ?></p>
                                        <p><a class="btn btn-xs btn-success" href="<?php echo base_url();?>home/job_details_view/<?php echo $rows['PostId'];?>">Details</a></p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</section>

<!-- Content start  -->
<section class="job_offer_area wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-offset-1">
                <div class="row">
                <?php if(!empty($Department)) foreach($Department as $row):?>
                    <div class="col-md-4" style="text-align: center;">
                        <div class="panel panel-default">
                            <div class="panel-heading"><b><?php echo $row['JobTitel']; ?></b></div>
                            <div class="panel-body">                                
                                <?php 
                                if(get_date_format($row['ApplicationDeadline']) == get_date_format(date("Y-m-d"))){
                                    echo '<span style="color:red;">'.get_date_format($row['ApplicationDeadline']).'</span>';
                                }else{
                                    echo get_date_format($row['ApplicationDeadline']);
                                    //echo date('F d',strtotime($appdate)).",&nbsp;".date('Y',strtotime($appdate));
                                }
                                ?> 
                                <hr>
                                <a href="<?php echo base_url();?>home/job_details_view/<?php echo $row['PostId'];?>">
                                    SEE DETAILS
                                </a> 
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>          
            </div>         
        </div> 
<!--        <div class="row">
            <div class="col-sm-10 col-md-offset-1">
                <table class="table table-bordered responsive">
                    <tr>
                        <th>Job Title</th><th>Department</th><th>Job Description</th>
                    </tr>
                    <?php if (!empty($Department)) foreach ($Department as $row): ?>
                            <tr>
                                <td><?php echo $row['JobTitel']; ?></td>
                                <td><?php echo $row['DepartmentName']; ?></td>
                                <td><?php echo $row['JobDescription']; ?></td>
                            </tr>
                        <?php endforeach; ?> 
                </table>

            </div> 
        </div>-->
    </div>
</section>

<section id="team-members" class="big_area_area wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="co-md-12">
                <div class="single_big">
                    <h2>THINK<span>&nbsp;BIG<br></span>DREAM&nbsp;<span>BIGGER</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>





