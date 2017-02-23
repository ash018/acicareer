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
<!--<section class="job_offer_area section-padding wow zoomIn">
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
</section>-->

<!-- Content start  -->
<section class="job_area section-padding wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">					
                <div class="job_title_area">
                    <div class="job_title">
                        <h2><?php echo "Notice"; //echo $PostId;  ?></h2>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Notice Title</th>
                            <th>Notice Description</th>
                            <th>Notice Date</th>
                            <th>Download</th>
                            <!--<th>Status</th>-->
                        </tr>						
                        <?php if (!empty($noticedetail)) foreach ($noticedetail as $row): ?>
                                <tr>
                                    <td><?php echo $row['NoticeName']; ?></td>
                                    <td><?php echo $row['NoticeDescription']; ?></td>
                                    <td><?php echo get_date_format($row['NoticeDate']); ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>assets/notice_file/<?php echo $row['noticefile']; ?>" target="_blank">
                                            <?php
                                            if (empty($row['noticefile'])) {
                                                echo "";
                                            } else {
                                                echo $row['noticefile'];
                                            }
                                            ?>								
                                        </a>
                                    </td>
        <!--							<td><?php
                                    /* if($row['Status']==0){
                                      echo "In-Active";
                                      }else{
                                      echo "Active";
                                      } */
                                    ?>
                                    </td>-->
                                </tr>
    <?php endforeach; ?> 
                    </table>

                </div>					
            </div>            
        </div>
    </div>
</section>

<!--<section class="job_area section-padding wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1"> 
                <div class="well">
                    <h2>Shortlisted Candidate</h2>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">					
                <div class="job_title_area">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="job_title">
                             <h2><?php echo "Notice Description"; //echo $PostId;  ?></h2>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p style="border: 1px solid #E3E3E3; padding: 2px;"><?php echo date("d-m-Y"); ?></p>
                        </div>
                    </div>
                   
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Download</th>
                            <th>Status</th>
                        </tr>						
                        <?php if (!empty($noticedetail)) foreach ($noticedetail as $row): ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url(); ?>assets/notice_file/<?php echo $row['noticefile']; ?>" target="_blank">
                                            <?php
                                            if (empty($row['noticefile'])) {
                                                echo "";
                                            } else {
                                                echo $row['noticefile'];
                                            }
                                            ?>								
                                        </a>
                                    </td>
        							<td><?php
                                    /* if($row['Status']==0){
                                      echo "In-Active";
                                      }else{
                                      echo "Active";
                                      } */
                                    ?>
                                    </td>
                                </tr>
    <?php endforeach; ?> 
                    </table>

                </div>					
            </div>            
        </div>
    </div>
</section>-->

<section id="team-members" class="big_area_area wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="co-md-12">
                <div class="single_big">
                    <h2>THINK&nbsp;<span>BIG<br></span>DREAM&nbsp;<span>BIGGER</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>





