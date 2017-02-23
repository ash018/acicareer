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
                
                <div class="dash_user">
                    <h2>ALL Posted job</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">SL</th>
										<th class="head1">Job Title</th>
                                    <th class="head0">Applicant</th>
                                    <th class="head0">Vacancy</th>										
                                    <th class="head0">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
                                    $x = 1;
									foreach($PostJob as $job)
                                    {            
                                    ?>
                                        <tr>
                                            <td><?php echo $x++; ?></td>
												 <td><?php echo $job['JobTitel']; ?></td>
                                            <td><?php echo $job['UserName']; ?></td>
                                            <td><?php echo $job['Vacancy']; ?></td>
                                            <td><?php echo explode(' ',$job['ApplicationDeadline'])[0]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
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