<section>
    <div class="row">
        <div class="col-sm-12">
            <?php include('inc/slider.php');?>
        </div>
    </div> 
</section> <!-- End slider -->

<section id="our-blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="location_area wow fadeIn">
                    <div class="page_title text-center">
                        <h2>FIND THE RIGHT POSITION FOR YOU</h2>
                    </div>
                    <form action="<?php echo base_url('currentvacancy/currentvacancy_filter'); ?>" method="post" id="currentvacancy_filter">						
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="single_location">
                                    <Select name="district" id="district">
                                        <option value="">Select Location</option>
                                        <?php select_option_district('LDistrict', 'DistrictName', 'DistrictName'); ?>                                      
                                    </Select>                                
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="single_location">
                                    <select name="JobLevelId" id="JobLevelId">
                                        <option value="">Select Job Level</option>
                                        <option value="4">Entry Level</option>
                                        <option value="2">Mid Level</option>
                                        <option value="3">Top Level</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="single_location">
                                    <input class="sarch_btn" type="submit" name="submit" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div id="currentvacancy_filter_view">
                        <div class="row">
                            <?php if (!empty($CurrentVacancy)){ 
                                foreach ($CurrentVacancy as $row): ?>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="blog_title">
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>currentvacancy/currentvacancyDetailView/<?php echo $row['DepartmentId']; ?>"><?php echo $row['DepartmentName']; ?><span>&nbsp;(<?php echo $row['CC']; ?>)</span></a></li>                                    
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- Current Vacancy -->



<?php include('inc/pic_footer.php');?>