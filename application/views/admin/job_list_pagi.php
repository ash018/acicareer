<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                 <?php echo $adminmenubar; ?>
            </div>
            <div class="col-md-7">
                <?php include('top_menu.php');?>
                <div class="dash_user">
                    <h2>user corner</h2>
                </div>
                <div class="dash_corner">
                    <div class="row">
                        <div class="row">
                            <?php if(!empty($CurrentVacancy)) foreach($CurrentVacancy as $row):?>
                            <div class="col-sm-12 col-md-4">
                                <div class="blog_title">
                                    <ul>
                                        <li><a href="<?php echo base_url();?>admin/postjob/currentvacancyDetailView/<?php echo $row['DepartmentId'];?>"><?php echo $row['DepartmentName']; ?><span>(<?php echo $row['CC']; ?>)</span></a></li>
                                        <!--<li><?php echo $row['DepartmentName']; ?><span>(<?php echo $row['CC']; ?>)</span></li>-->
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach;?>                        
                        </div>                        
                    </div>			
                </div>
                <div class="dash_user">
                    <h2>ALL Posted job</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="vpb_main_pagination_wrapper" align="left">
                            <div id="vpb_pagination_system_displayer"></div><!-- This will display the content along with the pagination  -->
                        </div>
                    </div>
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