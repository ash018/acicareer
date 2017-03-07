<style>
.table > caption + thead > tr:first-child > td, .table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > td, .table > thead:first-child > tr:first-child > th {
    border: 1px solid #000;
}
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #000;
}
table th {
    background-color: #00b2f7;
    color:#fff;
}
.num {
    mso-number-format:Number;
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
                        <table class="table table-bordered responsive" >
                            <thead>
                                <tr>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" colspan="17">
                                       <font><center>ACI Limited<br />CV Summary</center> </font> 
                                    </th>
                                </tr>
                                <tr>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" rowspan="2"><font>No</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" rowspan="2"><font>Name</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" rowspan="2"><font>Email Id&nbsp;</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" rowspan="2" ><font>Contact Number</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" rowspan="2"><font>Last Drawn/Current Salary</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" rowspan="2"><font >Expected Salary</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" colspan="4"><font >Education</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" colspan="2"><font>Training</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" colspan="4"><font>Experience (If any)</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;" rowspan="2"><font>Remarks</font></th>
                                </tr>
                                <tr>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;"><font>Level &amp; Passing Year</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;"><font>Institution</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000; min-width: 200px;"><font>Major/<br />Concentration</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000; min-width: 150px;">Result</th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;"><font style="min-width: 200px;">Title</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;"><font>Institution</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;"><font>Organization</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;"><font>Designation</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;"><font>Duration</font></th>
                                    <th bgcolor="#00b2f7" style="border: 1px solid #000;"><font>Total Experience</font></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    //echo '<pre/>';print_r($jobwise_cvsummary);exit();
                                    $i = 1;
                                    foreach($jobwise_cvsummary as $row)
                                    {
										//echo $row['Result'].'-';

                                    ?>
									<?php
										switch(trim($row['Result'])){
											case "1 Out Of Division/Class":
												$Result = "1stDivision/Class";
												break;

											case "2 Out Of Division/Class":
												$Result = "2ndDivision/Class";
												break;

											case "3 Out Of Division/Class":
												$Result = "3rdDivision/Class";
												break;
											default:
											 $Result = $row['Result'];

                                        }
										//echo $Result;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="vertical-align: top;"><?php echo $row['UserName']; ?></td>
                                        <td style="vertical-align: top;"><?php echo $row['Email']; ?></td>
                                        <td style="vertical-align: top;vnd.ms-excel.numberformat:0" class="num"><?php echo $row['Mobile']; ?></td>
                                        <td style="vertical-align: top;vnd.ms-excel.numberformat:\\0\,000"><?php echo $row['LastSalary'];?></td>
                                        <td style="vertical-align: top;vnd.ms-excel.numberformat:\\0\,000"><?php echo $row['ExpSalary'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['LevelPassingYear'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['Institution'];?></td>
                                        <td style="vertical-align: top;"><?php echo $row['MajorConcentration'];?></td>
                                        <td style="vertical-align: top;"><?php echo $Result;?></td>
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
