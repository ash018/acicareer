<section id="slider_1">
    <div id="top_slider-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo base_url();?>assets/img/slider_3.png" alt="" />
            </div>
            <div class="item">
                <img src="<?php echo base_url();?>assets/img/slider_3.png" alt="" />
            </div>
        </div>
        <a class="left top_slider-control" href="#top_slider-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right top_slider-control" href="#top_slider-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div>
</section> <!-- End slider -->
<section class="job_offer_area section-padding wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="single_job_offer_area">
                    <div class="single_job_offer">
                        <div class="title_page">
                            <h2>Latest job offers</h2>
                        </div>
                        <div class="single_job_offer_title">
                            <h3>Area manager - ACI pure flour</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                    <div class="single_job_offer">
                        <div class="title_page">
                            <h2>Latest job offers</h2>
                        </div>
                        <div class="single_job_offer_title">
                            <h3>Area manager - ACI pure flour</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                    <div class="single_job_offer">
                        <div class="title_page">
                            <h2>Latest job offers</h2>
                        </div>
                        <div class="single_job_offer_title">
                            <h3>Area manager - ACI pure flour</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
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
        </div>
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





