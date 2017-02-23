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
<!--                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">SL</th>
                                    <th class="head1">Job Title</th>
                                    <th class="head0">Job Description</th>
                                    <th class="head0">Vacancy</th>
                                    <th class="head0">Department</th>
                                    <th class="head0">Application Deadline</th>
                                    <th class="head0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $x = 1;
                                    foreach($joblists as $job)
                                    {            
                                    ?>
                                        <tr>
                                            <td><?php echo $x++; ?></td>
                                            <td><a href="<?php echo base_url();?>admin/postjob/jobwiseapplication/<?php echo $job['PostId'];?>"><?php echo $job['JobTitel']; ?></a></td>
                                            <td><?php echo $job['JobDescription']; ?></td>
                                            <td><?php echo $job['Vacancy']; ?></td>
                                            <td><?php echo $job['DepartmentName']; ?></td>  	
                                            <td><?php echo explode(' ',$job['ApplicationDeadline'])[0]; ?></td>                                            
                                            <td><a class="btn btn-success" href="<?php echo base_url('admin/Postjob/editjob').'/'.$job['PostId']; ?>">Edit</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>-->
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