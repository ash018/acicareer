<section id="about" class="section-gray_1 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>My Resume<hr> </h2>
            </div>          
        </div>
        <div class="row"> 
            <div class="col-md-3" style="background-color: #fff;">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="<?php echo base_url(); ?>home/myAccount">My Status</a></li>
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>home/myResume">View Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>career/careerForm">Edit Resume</a></li>
                </ul>            
            </div>
			 <style>
				.panel-heading-01{ 
					background-color: #436F7A;
					color: #fff;

				}
				.panel-body-02{
					background-color: #fff;
					padding: 30px;
					line-height: 24px;
				}	
		   </style>
		   
            <div class="col-md-8">             
				<div class="panel-heading panel-heading-01">
					View Resume
				</div>
				<div class="panel-body panel-body-02">
				<?php if(!empty($Myresume)) foreach($Myresume as $row): ?>
				<table style="background-color: #fff; width: 100%;">
					<tr>
						<td height=20></td>
                  </tr>
					<tr>
						<td>Download Resume&nbsp;&nbsp;<a href=""><img src="<?php echo base_url();?>assets/img/ms-word.png"></a></td>	
					</tr>
					<tr>
						<td height=20></td>
					</tr>
					<tr>						   
						<td>
							<b><span class="text-uppercase" style="color: #333399;"><?php echo $row['UserName']; ?></span></b><br>
                         <?php echo $row['Add1']; ?><br>
                         <?php echo $row['Mobile']; ?>
						</td>
					</tr>
                    <tr>
                        <td height=20></td>
                    </tr>
					  <tr>
                        <td>
								<table style="background-color: #fff; width: 100%;">
									<tr>
										<td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Career Objective:</u></b></td>
									</tr>
									<tr><td height=10></td></tr>
									<tr>
										<td>Career objective goes here, therefore, we need to redesign the CV drop section.</td>
									</tr>
								</table>
						   </td> 	
                    </tr>
					  <tr>
                        <td height=20></td>
                    </tr>
					  <tr>
                        <td>
                            <table style="background-color: #fff; width: 100%;">
									<tr>
										<td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Employment History:</u></b></td>
									</tr>
									<tr>
										<td height=20></td>
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
                        </td>
                     </tr>	
					   <tr>
                        <td height=20></td>
                     </tr>	
                    <tr>
                        <td>
                            <table style="background-color: #fff; width: 100%;">
                                <tr>
										<td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Academic Qualification:</u></b></td>
										<td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Academic Qualification:</u></b></td>
									</tr>
                                <tr>
										<td height=20></td>
									</tr>
									<tr>
										<td>
											<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border:1px solid #666666">
												<tr>
													<td width="20%" align="center" style="border-right:1px solid #666666"><strong>Exam Title</strong></td>
													<td width="15%" align="center" style="border-right:1px solid #666666"><strong>Concentration/Major</strong></td>
													<td width="15%" align="center" style="border-right:1px solid #666666"><strong>Institute</strong></td>
													<td width="15%" align="center" style="border-right:1px solid #666666"><strong>Result</strong></td>
													<td width="15%" align="center" style="border-right:1px solid #666666"><strong>Pas.Year</strong></td>
													<td width="20%" align="center" style="border-right:1px solid #666666"><strong>Achievement</strong></td>
												</tr>
												<?php $i = 1; foreach($row['Education'] as $edu):?>
												<tr>
													<td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['EducationLevel']; ?></td>
													<td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['Result']; ?></td>
													<td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['Result']; ?></td>
													<td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['Result']; ?></td>
													<td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['Result']; ?></td>
													<td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['PassingYear']; ?></td>
												</tr>                                 
												<?php $i ++; endforeach; ?>
											</table>
										</td>
									</tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height=20></td>
                    </tr>
                    <tr>
                        <td>
                            <table style="background-color: #fff; width: 100%;">
									<tr>
										<td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Training Summary:</u></b></td>
									</tr>
									<tr>
										<td height=20></td>
									</tr>
									<tr>
										<td>
											<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border:1px solid #666666">
												<tr>
													<td width="20%" align="center" style="border-right:1px solid #666666"><strong>Exam Title</strong></td>
													<td width="20%" align="center" style="border-right:1px solid #666666"><strong>Institute</strong></td>
													<td width="20%" align="center" style="border-right:1px solid #666666"><strong>Year</strong></td>
													<td width="20%" align="center" style="border-right:1px solid #666666"><strong>Certificate</strong></td>
													<td width="20%" align="center" style="border-right:1px solid #666666"><strong>Country</strong></td>
												</tr>
                                
												<?php $i = 1; foreach($row['Training'] as $tra):?>                                     
												<tr>
													<td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['TrainingTitle'];?></td>
													<td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['InstituteName'];?></td>
													<td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['TakenYear'];?></td>
													<td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['CertificationNo'];?></td>
													<td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['Country'];?></td>
												</tr>                                   
												<?php $i ++; endforeach; ?>
											</table>
										</td>
									</tr>
                                
                                
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height=10></td>
                    </tr>
					  <tr>
                        <td>
                            <table style="background-color: #fff; width: 100%;">
									<tr>
										<td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Reference (s):</u></b></td>
									</tr>
									<tr>
										<td height=20></td>
									</tr>
									<tr>
										<td>
											<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">												
												<?php
													$sl = 1;
													$i = 1; foreach($row['Reference'] as $reffr):
												?>
												<tr>
													<td align="left" style="padding-left:5px;"><i>Reference-<?php echo $sl++; ?>:</i>&nbsp;&nbsp;<?php echo $reffr['RefName'];?>&nbsp;&nbsp;,&nbsp;&nbsp;(<?php echo $reffr['RefOccupation'];?>)</td>
												</tr>
												<tr>
													<td align="left" style="padding-left:5px;"><i>Address:</i>&nbsp;&nbsp;<?php echo $reffr['RefAddress'];?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:5px;"><i>Contact:</i>&nbsp;&nbsp;<?php echo $reffr['RefContact'];?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:5px;"><i>Relationship:</i>&nbsp;&nbsp;<?php echo $reffr['RefRelationship'];?></td>
												</tr>
												<tr>
													<td height="20"></td>
												</tr>
												<?php $i ++; endforeach; ?>
											</table>
										</td>									
									</tr>
                            </table>
                        </td>
                     </tr>
                    
                </table>
				<?php endforeach;?> 
				</div>
            </div>
            
        </div>
            
        <div class="row">
            <div class="col-md-12">&nbsp;            
                <a href="<?php echo base_url();?>home/index/">Back</a>
            </div>          
        </div>         
    </div>    
</section> <!-- End about -->