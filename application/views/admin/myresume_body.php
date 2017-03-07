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
                      <img src="<?php echo base_url();?>assets/image/upload/thumbnail/<?php if(empty($row['UserPhoto'][0]['Thumb'])){echo "dummy-image.jpg";}else{echo $row['UserPhoto'][0]['Thumb'];}?>" width="110" height="120" >
                  <?php endforeach;?> 
              </div>
              <div class="col-md-8 text-left" style="border: 1px solid #E6E6E6; margin-left: 30px; height:120px;">
                  <h4><strong><?php echo $row['UserName']?></h4></strong>
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
                    <?php
                        $year = 0;
                        foreach ($row['Experience'] as $expr): 
                           $year += $expr['EndDate']-$expr['StartDate'];
                        endforeach;
                      //echo $year;
                    ?>
                        <tr>
                            <td style="background-color: #A8D08D; padding-bottom: 2px; padding-left: 5px; padding-top: 2px;"><b>Work Experience (Total Experience <?php echo $year?> years)</b></td>
                        </tr>
                        <tr>
                            <td height=5></td>
                        </tr>                                        
                    <?php 
                        $i = 1;
                        $year = 0;
                       // var_dump($row['Experience']);
                    foreach($row["Experience"] as $ThisExperience)$Experience[$ThisExperience["EndDate"]] = $ThisExperience;
                    ksort($Experience);
                        foreach (array_reverse($Experience) as $expr):
                    ?>
                        <tr>
                            <td>
                                <?php
                                echo $i.')';
                                ?>
                                <b style="margin-left: 15px;">Company: </b><?php echo $expr['CompanyName'].' (from ';
                                for( $x = 0; $x<10; $x++ ) {
                                    echo $expr['StartDate'][$x];
                                }

                                echo ' to ';

                                for( $x = 0; $x<10; $x++ ) {
                                    echo $expr['EndDate'][$x];
                                }

                                echo ' ) ';

                                ?>
                                <?php 
                                    $year += $expr['EndDate']-$expr['StartDate'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="margin-left: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Designation: </b><?php echo $expr['Designation']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="margin-left: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Major Responsibility: </b>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 35px;"><?php echo $expr['Responsibility']; ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                      <?php 
                        $i ++;
                        endforeach; 
                        //echo  $year;        
                      ?>
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

                         foreach($row["Education"] as $ThisEducation)$Education[$ThisEducation["PassingYear"]] = $ThisEducation;
                         ksort($Education);

                            foreach (array_reverse($Education) as $edu): ?>
                                <div class="col-md-6">
                                    <b><?php echo $edu['InstituteName']; ?> (<?php echo $edu['PassingYear']; ?>)</b><br>
                                    <?php if($edu['IsForeignInstitute']==1){?><i style="color: #ED7D31;">Foreign institute</i><br><?php } ?>
                                    <?php echo $edu['EducationLevel']; ?>&nbsp;(<?php echo $edu['Faculty']; ?>)<br>
                                    Result: <?php
                                       if($edu['QualificationAttained']=='Division/Class') {

                                           if($edu['Result']==1)
                                               echo $edu['Result'].'st  '.$edu['QualificationAttained'];
                                           if($edu['Result'] == 2)
                                               echo $edu['Result'].'nd  '.$edu['QualificationAttained'];
                                           if($edu['Result'] == 3)
                                               echo $edu['Result'].'rd  '.$edu['QualificationAttained'];



                                        }
                                       else{
                                        echo $edu['Result'].' Out of  '.$edu['QualificationAttained'];
                                       }
                                    ?>


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
                                      foreach ($row['Training'] as $edu): ?>
                                      <tr>
                                          <td width="20%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['InstituteName']; ?></td>
                                          <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['TrainingTitle']; ?></td>
                                          <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['TopicsCovered']; ?></td>
                                          <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;"><?php echo $edu['TakenYear']; ?></td>
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
                                          <b>Father's Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  </b>&nbsp;&nbsp;<?php echo $row['FatherName']; ?></td>
                                  </tr>
                                  <tr>
                                      <td align="left" style="padding-left:5px;">
                                      <b>Mother's Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>&nbsp;&nbsp;<?php echo $row['MotherName']; ?></td>
                                  </tr>
                                  <tr>
                                      <td align="left" style="padding-left:5px;">
                                      <b>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>&nbsp;&nbsp;<?php echo $row['Gender']; ?></td>
                                  </tr>
                                  <tr>
                                      <td align="left" style="padding-left:5px;">
                                          <b>Permanent Address &nbsp;:</b>&nbsp;&nbsp;<?php echo $row['Add1']; ?></td>
                                  </tr>
                                  <tr>
                                      <td align="left" style="padding-left:5px;">
                                          <b>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>&nbsp;&nbsp;<?php echo get_date_format($row['DOB']); ?></td>
                                  </tr>
                                  <tr>
                                      <td align="left" style="padding-left:5px;">
                                          <b>Religion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>&nbsp;&nbsp;<?php echo get_name('Id','ReligionName',$row['Religion'],'LReligion'); ?></td>
                                  </tr>
                                  <tr>
                                      <td align="left" style="padding-left:5px;">
                                          <b>Marital Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>&nbsp;&nbsp;<?php echo $row['MaritalStatus']; ?></td>
                                  </tr>
                                  <tr>
                                      <td align="left" style="padding-left:5px;">
                                          <b>NID/ Passport No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>&nbsp;&nbsp;<?php echo $row['NationalId']; ?></td>
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
                          Email: <?php echo $reffr['RefEmail']; ?>
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
  <?php endforeach; ?> 
                