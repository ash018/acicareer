<style>
    .marqueeElement {
        min-height:100px;
        width: 100%;
        border: 0px solid #666;
        position:absolute;
		text-align:left;
    }
    #mholder {
        min-height: 210px;
        width: 93%;
        border: solid 0px black;
        position: absolute;
        overflow: hidden;
    }
</style>
<section>
    <div class="row">
        <div class="col-sm-12">
            <?php include('inc/slider.php');?>
        </div>
    </div> 
</section> <!-- End slider -->
<section id="portfolios" class="section-padding pulse">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 col-md-offset-1">
                <div class="notice">
                    <div class="notice_area">
                        <div class="notice_title">
                            <h2>NOTICE BOARD</h2>
                        </div>
                        <div id="mholder">
                            <?php if (!empty($Notice)) foreach ($Notice as $row): ?>                        
                            <div class="marqueeElement">
                                <h2><?php echo $row['NoticeName']; ?></h2>
                                <?php echo substr($row['NoticeDescription'],0,101); ?>
                                <a href="<?php echo base_url(); ?>home/notice_shortlist_view/<?php echo $row['NoticeId']; ?>">
                                    SEE DETAIL
                                </a>
                            </div>                        
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-5">
                <div class="success">
                    <div class="success_area">
                        <div class="success_title">
                            <h2>SUCCESS STORIES</h2>
                        </div>
                        <div class="single_success">
                            <div class="single_success_title" style="text-align:left;">
                                <p>As you are listening to me, you might not think that today is the day that you will save a life. 
                                    <span>(More)</span></p>
                            </div>
                            <div class="single_success_name" style="text-align:right;">
                                <h4>Md. Abu Salah</h4>
                                <p><strong>Assistant manager</strong>(ACI Salt Limited)</p>
                            </div>
                        </div>                        
                    </div>
                    <div class="success_area">
                        <div class="success_title">
                            <h2>SUCCESS STORIES</h2>
                        </div>
                        <div class="single_success">
                            <div class="single_success_title" style="text-align:left;">
                                <p>As you are listening to me, you might not think that today is the day that you will save a life. 
                                    <span>(More)</span></p>
                            </div>
                            <div class="single_success_name" style="text-align:right;">
                                <h4>Md. Abu Salah</h4>
                                <p><strong>Assistant manager</strong>(ACI Salt Limited)</p>
                            </div>
                        </div>                        
                    </div>
                    <div class="success_area">
                        <div class="success_title">
                            <h2>SUCCESS STORIES</h2>
                        </div>
                        <div class="single_success">
                            <div class="single_success_title" style="text-align:left;">
                                <p>As you are listening to me, you might not think that today is the day that you will save a life. 
                                    <span>(More)</span></p>
                            </div>
                            <div class="single_success_name" style="text-align:right;">
                                <h4>Md. Abu Salah</h4>
                                <p><strong>Assistant manager</strong>(ACI Salt Limited)</p>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- End Notice Board -->

<?php include('inc/pic_footer.php');?>