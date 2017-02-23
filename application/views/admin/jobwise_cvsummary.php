<style>
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #333;
}
table th {
    background-color: #00b2f7;
    color:#fff;
}
</style>
<section class="section-padding50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php //include('top_menu.php');?>
                <div class="dash_user">
                    <h2><?php echo $page_title;?></h2>
                </div>					
                <div class="row">
                    <div class="col-md-12">
                    <button id="btn" class="btn btn-default" style="float: right;" onclick="myFunction()">Export to Excel</button>
                        <table class="table table-bordered responsive" border="1">
                            <thead>
                                <tr>
                                    <th colspan="17" bgcolor="#FFFFFF" >
                                       <font color="black"><center>ACI Limited<br />CV Summary</center> </font> 
                                    </th>
                                </tr>
                                <tr>
                                    <th rowspan="2"><font color="white">No</font></th>
                                    <th rowspan="2"><font color="white">Name</font></th>
                                    <th rowspan="2"><font color="white">Email Id&nbsp;</font></th>
                                    <th rowspan="2"><font color="white">Contact Number</font></th>
                                    <th rowspan="2"><font color="white">Last Drawn/Current salary</font></th>
                                    <th rowspan="2"><font color="white" >Expected salary</font></th>
                                    <th colspan="4"><font color="white" >Education</font></th>
                                    <th colspan="2"><font color="white">Training</font></th>
                                    <th colspan="4"><font color="white">Experience (If any)</font></th>
                                    <th rowspan="2"><font color="white">Remarks</font></th>
                                </tr>
                                <tr>
                                    <th><font color="white">Level &amp; Passing Year</font></th>
                                    <th><font color="white">Institution</font></th>
                                    <th style="min-width: 200px;"><font color="white">Major/<br />Concentration</font></th>
                                    <th style="min-width: 150px;">Result</th>
                                    <th><font color="white" style="min-width: 200px;">Title</font></th>
                                    <th><font color="white">Institution</font></th>
                                    <th><font color="white">Organization</font></th>
                                    <th><font color="white">Designation</font></th>
                                    <th><font color="white">Duration</font></th>
                                    <th><font color="white">Total Experience</font></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    //echo '<pre/>';print_r($jobwise_cvsummary);exit();
                                    $i = 1;
                                    foreach($jobwise_cvsummary as $row)
                                    {               
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="vertical-align: top;"><?php echo $row['UserName']; ?></td>
                                        <td style="vertical-align: top;"><?php echo $row['Email']; ?></td>
                                        <td style="vertical-align: top;"><?php echo $row['Mobile']; ?></td>
                                        <td style="vertical-align: top;"><?php echo $row['LastSalary'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['ExpSalary'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['LevelPassingYear'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['Institution'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['MajorConcentration'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['Result'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['TrTitle'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['TrInstitution'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['ExOrganization'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['ExDesignation'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['ExDuration'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['TotalExperience'];?></td>
                                    </tr>
                                    <?php
                                    $i++;
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

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>


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
