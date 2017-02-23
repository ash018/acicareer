<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                 <?php echo $adminmenubar; ?>
            </div>
            <div class="col-md-7"> 
                <?php include('top_menu.php');?><br>
               
                <?php if (!empty($resumeDetails)) foreach ($resumeDetails as $row): ?>
                <table width="100%">
                    <tr>
                        <td>
                        <caption>Personal Details</caption> 
                        <caption style="text-align: right;">Download Resume&nbsp;&nbsp;<a href="<?php echo base_url();?>admin/resume/ResumeDoc/<?php echo $row['Id']; ?>">
							<img src="<?php echo base_url();?>assets/img/ms-word.png">
						</a>
                        </caption>
                    
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $row['UserName']; ?><br>
                            <?php echo $row['Add1']; ?><br>
                            <?php echo $row['Mobile']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td height=10></td>
                    </tr>
                    <tr>
                        <td>
                            <table class="table table-bordered table-striped">
                                <caption>Education</caption>
                                <tr>
                                    <th>Level</th><th>CGPA</th><th>Year</th>
                                </tr>
                                <?php $i = 1; foreach($row['Education'] as $edu):?>
                                <tr>
                                    <td><?php echo $edu['EducationLevel']; ?></td>
                                    <td><?php echo $edu['Result']; ?></td>
                                    <td><?php echo $edu['PassingYear']; ?></td>
                                </tr>                                 
                                <?php $i ++; endforeach; ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height=10></td>
                    </tr>
                    <tr>
                        <td>
                            <table class="table table-bordered table-striped">
                                <caption>Training</caption>
                                <tr>
                                    <th>Title</th><th>Year</th><th>Certificate</th>
                                </tr>
                                
                                <?php $i = 1; foreach($row['Training'] as $tra):?>                                     
                                <tr>
                                    <td><?php echo $tra['TrainingTitle'];?></td>
                                    <td><?php echo $tra['TakenYear'];?></td>
                                    <td><?php echo $tra['CertificationNo'];?></td>
                                </tr>                                   
                                <?php $i ++; endforeach; ?>
                                
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height=10></td>
                    </tr>
                    <tr>
							<td>
							<?php $i = 1; foreach($row['Experience'] as $expr):?>
								<div style="">
									<strong><u><?php echo $expr['Designation'];?>(<?php echo substr($expr['StartDate'], 0,11);?> to <?php echo substr($expr['EndDate'], 0, 11);?>)</u></strong><br/>
									<strong><?php echo $expr['CompanyName'];?></strong><br/>
									<i>Company Location:</i>&nbsp;&nbsp;<?php echo $expr['EmpAddress'];?><br/>
									<i>Duties/Responsibilities:</i>&nbsp;&nbsp;<?php echo $expr['Responsibility'];?><br/>
									<i>Leave Reason:</i>&nbsp;&nbsp;<?php echo $expr['LeaveReason'];?><br/>
									<i>Salary:</i>&nbsp;&nbsp;<?php echo $expr['LastSalary'];?><br/><br/>
								</div>
								<?php $i ++; endforeach; ?>
							</td>
                    </tr>
                    
                </table>
                <?php endforeach;?> 
                
            </div>
        </div>
    </div>
</section>
