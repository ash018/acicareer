<style>
    .panel-heading-01{ 
        background-color: #00a65e;
        color: #fff;

    }
    .panel-body-02{
        background-color: #fff;
        padding: 30px;
        line-height: 24px;
    }
    .nav li.active a {
        color: #fff;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
        background-color: #00a65e !important;
    } 
</style>
<section id="about" class="section-gray_1 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>My Resume<hr></h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-3" style="background-color: #fff;">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="<?php echo base_url(); ?>home/myAccount">My Status</a></li>
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>home/myresume">View Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>career/careerform">Edit Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>career/careerform">Change Password</a></li>
                </ul>            
            </div>
            <div class="col-md-8">             
                <div class="panel-heading panel-heading-01">
                    View Resume
                </div>
                <div class="panel-body panel-body-02">
                    <?php if (!empty($Myresume)) foreach ($Myresume as $row): ?>
                      <div class="row">                      
                        <div class="col-md-12" style="border: 1px solid #C6C6C6;">
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <!--<img src="<?php echo base_url(); ?>assets/img/View-resume.jpg">-->
                                     <?php if(!empty($Myresume)) foreach($Myresume as $row): ?>
                                        <img src="<?php echo base_url();?>assets/image/upload/thumbnail/<?php if(empty($row['UserPhoto'][0]['Thumb'])){echo "dummy-image.jpg";}else{echo $row['UserPhoto'][0]['Thumb'];}?>" height="100" width="80">
                                        <br/>
                                    <?php endforeach;?> 
                                </div>
                                <div class="col-md-8 text-left" style="border: 1px solid #E6E6E6; margin-left: 30px;">
                                    <h4><?php echo $row['UserName']?></h4>
                                    <p>
                                        <?php echo $row['Add1']; ?><br>
                                        <b>Contact No: <?php echo $row['Mobile']; ?></b><br>
                                        <b>E-mail: <?php echo $row['Email']; ?></b>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b>Career Objective</b></td>
                                        </tr>
                                        <tr>
                                            <td height=5></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $row['CareerObjective']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b>Work Experience (Total Experience year)</b></td>
                                        </tr>
                                        <tr>
                                            <td height=5></td>
                                        </tr>                                        
                                        <?php $i = 1;
                                        foreach ($row['Experience'] as $expr): ?>
                                            <tr>
                                                <td>
                                                    <b style="margin-left: 15px;">Company:</b><?php echo $expr['CompanyName']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b style="margin-left: 15px;">Designation: </b><?php echo $expr['Designation']; ?>
                                                </td>
                                            </tr>
<!--                                            <tr>
                                                <td>
                                                    (<?php echo substr($expr['StartDate'], 0, 11); ?> to <?php echo substr($expr['EndDate'], 0, 11); ?>)</u></strong><br/>
                                                    <br/>
                                                    <i>Company Location:</i>&nbsp;&nbsp;<?php echo $expr['EmpAddress']; ?><br/>
                                                    <i>Duties/Responsibilities:</i>&nbsp;&nbsp;<br/>
                                                    <i>Leave Reason:</i>&nbsp;&nbsp;<?php echo $expr['LeaveReason']; ?><br/>
                                                    <i>Salary:</i>&nbsp;&nbsp;<?php echo $expr['LastSalary']; ?><br/><br/>
                                                </td>
                                            </tr>-->
                                            <tr>
                                                <td>
                                                    <b style="margin-left: 15px;">Major Responsibility: </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 35px;"><?php echo $expr['Responsibility']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        <?php $i ++;
                                        endforeach; ?>
                                            <!--
                                        <tr>
                                            <td><b style="margin-left: 15px;">Major Responsibility: </b></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 35px;">• HR Management, Training & Development, Organizational Development.</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 35px;"> • Change Management & Transformation.</td>
                                        </tr>-->
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b>Academic Credentials</b></td>
                                        </tr>
                                        <tr>
                                            <td height=5></td>
                                        </tr>
                                    </table>
                                    <div class="row">
                                         <?php $i = 1;
                                            foreach ($row['Education'] as $edu): ?>
                                                <div class="col-md-6">
                                                    <b><?php echo $edu['InstituteName']; ?> (<?php echo $edu['PassingYear']; ?>)</b><br>
                                                    <?php if($edu['IsForeignInstitute']==1){?><i style="color: #ED7D31;">Foreign institute</i><br><?php } ?>
                                                    <?php echo $edu['EducationLevel']; ?>&nbsp;(<?php echo $edu['Faculty']; ?>)<br>
                                                    Result: <?php echo $edu['Result'].' '.$edu['QualificationAttained']; ?>
                                                </div>
                                            <?php $i ++;
                                            endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                     <table style="background-color: #fff; width: 100%;">
                                            <tr>
                                                <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b>Professional Certification/ Training Obtained</b></td>
                                            </tr>
                                            <tr>
                                                <td height=20></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border:1px solid #666666">
                                                        <tr>
                                                            <td width="20%" align="center" style="border-right:1px solid #666666"><strong>Certification/ Training Provider</strong></td>
                                                            <td width="15%" align="center" style="border-right:1px solid #666666"><strong>Training Title</strong></td>
                                                            <td width="15%" align="center" style="border-right:1px solid #666666"><strong>Topic Cover</strong></td>
                                                            <td width="15%" align="center" style="border-right:1px solid #666666"><strong>Taken year</strong></td>
                                                        </tr>
                                                        <?php $i = 1;
                                                        foreach ($row['Education'] as $edu): ?>
                                                        <tr>
                                                            <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['EducationLevel']; ?></td>
                                                            <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['Faculty']; ?></td>
                                                            <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['InstituteName']; ?></td>
                                                            <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['ResultName']; ?></td>
                                                        </tr>                                 
                                                        <?php $i ++;
                                                        endforeach; ?>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                </div>
                               </div> 
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b>Professional and IT Skills</b></td>
                                        </tr>
                                        <tr>
                                            <td height=5></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 30px;"><?php echo $row['Skill']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b>Extra-Curricular Activities</b></td>
                                        </tr>
                                        <tr>
                                            <td height=5></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 30px;"> 
                                                <?php echo $row['ExtraCurriculum']; ?>
                                            </td>
                                        </tr>                              
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b>Personal Information</b></td>
                                        </tr>
                                        
                                        <tr>
                                            <td height=5></td>
                                        </tr>
                                         <tr>
                                            <td>
                                               <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">                                     
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Father's Name : </b>&nbsp;&nbsp;<?php echo $row['FatherName']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Mother's Name : </b>&nbsp;&nbsp;<?php echo $row['MotherName']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Gender : </b>&nbsp;&nbsp;<?php echo $row['Gender']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Permanent Address : </b>&nbsp;&nbsp;<?php echo $row['Add1']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Date of Birth : </b>&nbsp;&nbsp;<?php echo get_date_format($row['DOB']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Religion : </b>&nbsp;&nbsp;<?php echo get_name('Id','ReligionName',$row['Religion'],'LReligion'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Marital Status : </b>&nbsp;&nbsp;<?php echo $row['MaritalStatus']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>NID/ Passport No : </b>&nbsp;&nbsp;<?php echo $row['NationalId']; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr> 
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b> References</b></td>
                                        </tr>
                                        <tr>
                                            <td height=5></td>
                                        </tr>
                                    </table>
                                    <div class="row">
                                        <?php
                                            $sl = 1;
                                            $i = 1;
                                            foreach ($row['Reference'] as $reffr):
                                            ?>
                                        <div class="col-md-6">
                                            <b><?php echo $reffr['RefName']; ?></b><br>
                                            <?php echo $reffr['RefOccupation']; ?><br>
                                            <?php echo $reffr['RefAddress']; ?><br>
                                            Cell: <?php echo $reffr['RefContact']; ?><br>
                                            Email: <?php echo $reffr['RefRelationship']; ?>
                                        </div>
                                        <?php $i ++;
                                            endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px; border: 1px solid #2A2A2A;">
                                                <b>
                                                    <a href="<?php echo base_url(); ?>home/myresumedoc" style="color: #171814;">Download Resume</a>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height=5></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>   
                        </div>
                      </div>  







                   <!-- <table style="background-color: #fff; width: 100%;">
                        <tr>
                            <td height=20></td>
                        </tr>
                        <tr>
                            <td>Download Resume&nbsp;&nbsp;
                                <a href="<?php echo base_url(); ?>home/myresumedoc">
                                    <img src="<?php echo base_url(); ?>assets/img/ms-word.png">
                                </a>
                                <div style="margin-top: -45px; margin-left: 70%;">
                                    <img src="<?php echo base_url(); ?>assets/image/upload/thumbnail/<?php 
                                        if (empty($row['UserPhoto'][0]['Thumb'])) {
                                            echo "dummy-image.jpg";
                                        } else {
                                            echo $row['UserPhoto'][0]['Thumb'];
                                        } 
                                    ?>" height="100" width="80">
                                </div>
                            </td>	
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
                                        <td><?php echo $row['CareerObjective']; ?></td>
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
                                        <?php $i = 1;
                                        foreach ($row['Experience'] as $expr): ?>
                                            <div style="">
                                                <strong><u><?php echo $expr['Designation']; ?>(<?php echo substr($expr['StartDate'], 0, 11); ?> to <?php echo substr($expr['EndDate'], 0, 11); ?>)</u></strong><br/>
                                                <strong><?php echo $expr['CompanyName']; ?></strong><br/>
                                                <i>Company Location:</i>&nbsp;&nbsp;<?php echo $expr['EmpAddress']; ?><br/>
                                                <i>Duties/Responsibilities:</i>&nbsp;&nbsp;<?php echo $expr['Responsibility']; ?><br/>
                                                <i>Leave Reason:</i>&nbsp;&nbsp;<?php echo $expr['LeaveReason']; ?><br/>
                                                <i>Salary:</i>&nbsp;&nbsp;<?php echo $expr['LastSalary']; ?><br/><br/>
                                            </div>
                                        <?php $i ++;
                                        endforeach; ?>
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
                                                    <td width="15%" align="center" style="border-right:1px solid #666666"><strong>Scale</strong></td>
                                                    <td width="15%" align="center" style="border-right:1px solid #666666"><strong>Pas.Year</strong></td>
                                                    <td width="20%" align="center" style="border-right:1px solid #666666"><strong>Result</strong></td>
                                                </tr>
                                                <?php $i = 1;
                                                foreach ($row['Education'] as $edu): ?>
                                                <tr>
                                                    <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['EducationLevel']; ?></td>
                                                    <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['Faculty']; ?></td>
                                                    <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['InstituteName']; ?></td>
                                                    <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['ResultName']; ?></td>
                                                    <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['PassingYear']; ?></td>
                                                    <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['Marks']; ?></td>
                                                </tr>                                 
                                                <?php $i ++;
                                                endforeach; ?>
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
                                                <?php $i = 1;
                                                foreach ($row['Training'] as $tra): ?>                                     
                                                    <tr>
                                                        <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['TrainingTitle']; ?></td>
                                                        <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['InstituteName']; ?></td>
                                                        <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['TakenYear']; ?></td>
                                                        <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['CertificationNo']; ?></td>
                                                        <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $tra['CountryName']; ?></td>
                                                    </tr>                                   
                                                <?php $i ++;
                                                endforeach; ?>
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
                                        <td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Personal Info:</u></b></td>
                                    </tr>
                                    <tr>
                                        <td height=20></td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">                                     
                                                <tr>
                                                    <td align="left" style="padding-left:5px;">
                                                        <i>Father Name:</i>&nbsp;&nbsp;<?php echo $row['FatherName']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;">
                                                        <i>Mother Name:</i>&nbsp;&nbsp;<?php echo $row['MotherName']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;">
                                                        <i>Gender:</i>&nbsp;&nbsp;<?php echo $row['Gender']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;">
                                                        <i>DOB:</i>&nbsp;&nbsp;<?php echo get_date_format($row['DOB']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;">
                                                        <i>Religion:</i>&nbsp;&nbsp;<?php echo get_name('Id','ReligionName',$row['Religion'],'LReligion'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;">
                                                        <i>Marital Status:</i>&nbsp;&nbsp;<?php echo $row['MaritalStatus']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;">
                                                        <i>Birth Place:</i>&nbsp;&nbsp;<?php echo $row['BirthPlace']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td height="20"></td>
                                                </tr>                                       
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
                                        <td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Skill:</u></b></td>
                                    </tr>
                                    <tr>
                                        <td height=20></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $row['Skill']; ?>                                  
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
                                        <td style="background-color: #e6e6e6; padding-bottom: 2px; padding-left: 2px; padding-top: 2px;"><b><u>Extra Curriculum:</u></b></td>
                                    </tr>
                                    <tr>
                                        <td height=20></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $row['ExtraCurriculum']; ?>                                  
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
                                            $i = 1;
                                            foreach ($row['Reference'] as $reffr):
                                            ?>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;"><i>Reference-<?php echo $sl++; ?>:</i>&nbsp;&nbsp;<?php echo $reffr['RefName']; ?>&nbsp;&nbsp;,&nbsp;&nbsp;(<?php echo $reffr['RefOccupation']; ?>)</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;"><i>Address:</i>&nbsp;&nbsp;<?php echo $reffr['RefAddress']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;"><i>Contact:</i>&nbsp;&nbsp;<?php echo $reffr['RefContact']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding-left:5px;"><i>Relationship:</i>&nbsp;&nbsp;<?php echo $reffr['RefRelationship']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td height="20"></td>
                                                </tr>
                                            <?php $i ++;
                                            endforeach; ?>
                                            </table>
                                        </td>									
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>-->
                    <?php endforeach; ?> 
                </div>
            </div>
        </div>
<!--        <div class="row">
            <div class="col-md-12">&nbsp;            
                <a href="javascript:history.go(-1)">Back</a>
            </div>          
        </div>         -->
    </div>    
</section> <!-- End about -->