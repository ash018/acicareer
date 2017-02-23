<?php
	header("Content-Type: application/vnd.ms-word"); 
	header("Expires: 0"); 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
	header("content-disposition: attachment;filename=cv_$UserId.doc");
?>
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
    /*.row{
        float: left;
        width: 100%;
    }
    .col-sm-3{
        float: left;
        width: 29%;
    }
    .col-sm-3{
        float: left;
        width: 69%;
    }*/
</style>
<section id="about" class="section-gray_1 section-padding">
    <div class="container">   
        <div class="row">      		   
            <div class="col-md-8">
                <div class="panel-body panel-body-02">
                    <?php if (!empty($Myresume)) foreach ($Myresume as $row): ?>
                      <div class="row">                      
                        <div class="col-sm-12" style="border: 1px solid #C6C6C6;">
                            <div class="row">
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table>
                                        <tr>
                                            <td>
                                                <!--<img src="<?php echo base_url(); ?>assets/img/View-resume.jpg">-->
                                                <?php if(!empty($Myresume)) foreach($Myresume as $row): ?>
                                                   <img src="<?php echo base_url();?>assets/image/upload/thumbnail/<?php if(empty($row['UserPhoto'][0]['Thumb'])){echo "dummy-image.jpg";}else{echo $row['UserPhoto'][0]['Thumb'];}?>" height="100" width="80">
                                               <?php endforeach;?> 
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>
                                                <div style="border: 1px solid #E6E6E6; text-align: left;">
                                                    <h4><?php echo $row['UserName']?></h4>
                                                    <p>
                                                        <?php echo $row['Add1']; ?><br>
                                                        <b>Contact No: <?php echo $row['Mobile']; ?></b><br>
                                                        <b>E-mail: <?php echo $row['Email']; ?></b>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
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
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
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
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
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
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
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
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
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
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
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
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
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
                                                            <b>Permanent Address : </b>&nbsp;&nbsp;<?php echo $row['Gender']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Date of Birth : </b>&nbsp;&nbsp;<?php echo get_date_format($row['DOB']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>Marital Status : </b>&nbsp;&nbsp;<?php echo get_name('Id','ReligionName',$row['Religion'],'LReligion'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-left:5px;">
                                                            <b>NID/ Passport No : </b>&nbsp;&nbsp;<?php echo $row['MaritalStatus']; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr> 
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table style="background-color: #fff; width: 100%;">
                                        <tr>
                                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b> References</b></td>
                                        </tr>
                                        <tr>
                                            <td height=5></td>
                                        </tr>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table>
                                                <tr>
                                        <?php
                                            $sl = 1;
                                            $i = 1;
                                            foreach ($row['Reference'] as $reffr):
                                        ?>
                                                <td>
                                                    <b><?php echo $reffr['RefName']; ?></b><br>
                                                    <?php echo $reffr['RefOccupation']; ?><br>
                                                    <?php echo $reffr['RefAddress']; ?><br>
                                                    Cell: <?php echo $reffr['RefContact']; ?><br>
                                                    Email: <?php echo $reffr['RefRelationship']; ?>
                                                </td>
                                                
                                        <?php $i ++;
                                            endforeach; ?>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                           
                            <div class="row">
                                <div class="col-sm-12">&nbsp;</div>
                            </div>   
                        </div>
                      </div>  
                    <?php endforeach; ?> 
                </div>
            </div>
            
        </div>
               
    </div>    
</section> <!-- End about -->