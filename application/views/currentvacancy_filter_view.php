<!--<section class="job_offer_area section-padding wow zoomIn">
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
                            <p><?php echo $rows['JobDescription']; ?></p>
                            <p><a class="btn btn-xs btn-success" href="<?php echo base_url();?>home/job_details_view/<?php echo $rows['PostId'];?>">Details</a></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>-->
<div class="row">
    <?php //echo $district; ?>
    <?php //echo $JobLevelId; ?>
    <?php if (!empty($CurrentVacancy)){ 
        foreach ($CurrentVacancy as $row): ?>
            <div class="col-sm-12 col-md-4">
                <div class="blog_title">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>currentvacancy/currentvacancy_filter_details?d=<?php echo $district; ?>&j=<?php echo $JobLevelId; ?>&de=<?php echo $row['DepartmentId']; ?>"><?php echo $row['DepartmentName']; ?><span>(<?php echo $row['CC']; ?>)</span></a>
                        </li>                                    
                    </ul>
                </div>
            </div>
    <?php endforeach;}else{ ?>
    <div class="alert-danger" align="center">                        
        <h2>Sorry, could not find any matching job.</h2>
		<h4>Please modify your search to get more results</h4>  
    </div>
    <?php } ?>                        
</div>