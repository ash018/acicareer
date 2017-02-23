<style>
    input[type="file"]{
        color: transparent;
    }
</style>
<form action="<?php echo base_url(); ?>career/careerActionExperience" method="post" enctype="multipart/form-data">
    <div class="colamn_area colamn_padding">
        <h5 style="text-align:right; color: blue;">Start with your latest experience</h5>
        <?php  
            $counttrain = 0; 
            $head = 1; 
            if(isset($row[0]['Experience'])&& count($row[0]['Experience']) > 0 ){
            $counttrain = count($row[0]['Experience']);  
            foreach ($row[0]['Experience'] as $rdata){ 
        ?>
        <div class="underline_bg"></div>
        <div class="one_colamn_title">
            <h2 class="experenceCounter">EXPERIENCE-<?php echo $head;?></h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="one_colamn_topics">
                    <input type="text" autocomplete="off" name="CompanyName[]" id="CompanyName" value="<?php echo isset($rdata['CompanyName']) ? $rdata['CompanyName'] : '' ?>" placeholder="Company Name *" maxlength="150"/>
                    <input type="hidden" name="UserId" value="<?php echo isset($rdata['UserId']) ? $rdata['UserId'] : ''; ?>"  />
                    <input type="hidden" id="page" name="page" value="page_experience_info" />
                    <input type="hidden" id="page" name="ExperienceId[]" value="<?php echo isset($rdata['Id']) ? $rdata['Id'] : ''; ?>" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="one_colamn_topics">
                    <input type="text" autocomplete="off" name="Designation[]" id="Designation" value="<?php echo isset($rdata['Designation']) ? $rdata['Designation'] : '' ?>" placeholder="Position Held *" maxlength="150" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="one_colamn_topics">
                    <input type="text" autocomplete="off" name="EmpAddress[]" id="EmpAddress" value="<?php echo isset($rdata['EmpAddress']) ? $rdata['EmpAddress'] : '' ?>" placeholder="Address of Employer *" maxlength="250"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><p>&nbsp;</p></div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div id="dpStart<?php echo $head;?>" class="input-group date">																																
                    <input class="form-control" type="text" autocomplete="off" name="StartDate[]" placeholder="Start Date" value="<?php if($rdata['StartDate']=='1970-01-01 00:00:00.000') {echo '';} else { echo date('m/d/Y',strtotime($rdata['StartDate']));}?>">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="dpEnd<?php echo $head;?>" class="input-group date">
                    <input class="form-control" type="text" autocomplete="off" name="EndDate[]" placeholder="End Date" value="<?php if($rdata['EndDate']=='1970-01-01 00:00:00.000') {echo '';} else { if($rdata['CurrentlyWorking']==1){echo '';}else{ echo date('m/d/Y',strtotime($rdata['EndDate']));}}?>" >
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="one_colamn_topics">
                </div>
            </div>
            <div class="col-md-6">
                <div class="one_colamn_topics">
                    <div class="checkbox" <?php if($head == 1){}else{ echo "style='display:none;'";}?>>
                        <label style="color:gray;" >
                 <?php //if($head == 1){echo 'checkbox';} else {echo 'hidden';} ?>
                            <?php //if(isset($rdata['CurrentlyWorking']) && $rdata['CurrentlyWorking'] == '1'){ echo 'checked="checked"'; }else{ echo '';} ?>
                            <?php //if($head == 1){echo 'Currently Working';}else {echo '';} ?>
                        <input id="CurrentlyWorking<?php echo $head;?>" type="checkbox" name="CurrentlyWorking[]" 
   <?php if(isset($rdata['CurrentlyWorking']) && $rdata['CurrentlyWorking'] == '1'){ echo 'checked="checked"'; }else{ echo '';} ?>
   value="<?php if($head == 1){echo '1';}else {echo '0';}?>">
                            Currently Working
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="one_colamn_topics">
                    <input type="<?php if($head == 1){echo 'text';}else {echo 'hidden';} ?>" name="LastSalary[]" id="LastSalary" value="<?php echo isset($rdata['LastSalary']) ? $rdata['LastSalary'] : '0' ?>" placeholder="Last Salary Drawn" />
                </div>
            </div>
            <div class="col-md-8">
                <div class="one_colamn_topics">
                    <input type="<?php if($head == 1){echo 'text';}else {echo 'hidden';} ?>" name="LeaveReason[]" id="LeaveReason" value="<?php echo isset($rdata['LeaveReason']) ? $rdata['LeaveReason'] : '' ?>" placeholder="Reason for Leave *" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="one_colamn">
                    <?php 
                    if(isset($rdata['Responsibility']) && $rdata['Responsibility']==''){?>
                    <textarea id="editor<?php echo $head;?>" name="Responsibility[]" id="Responsibility" cols="30" rows="10" placeholder="<?php echo 'Duties / Responsibilities *' ?>"></textarea>
                    <?php }else{ ?>
                    <textarea id="editor<?php echo $head;?>" name="Responsibility[]" id="Responsibility" cols="30" rows="10" placeholder="<?php echo isset($rdata['Responsibility']) ? $rdata['Responsibility'] : 'Duties / Responsibilities *' ?>"><?php echo isset($rdata['Responsibility']) ? $rdata['Responsibility'] : 'Duties / Responsibilities *' ?></textarea>
                    <?php }?>
                </div>
            </div>
        </div>
        <script>
            initSample('<?php echo $head;?>');
        </script>
    <?php 
        $head ++;
        }        
    }else{ ?>
        <div class="colamn_area colamn_padding">
            <div class="underline_bg"></div>
            <div class="one_colamn_title">
                <h2 class="experenceCounter">EXPERIENCE-1</h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="CompanyName[]" id="CompanyName" placeholder="Company Name *" maxlength="150" />
                        <input type="hidden" name="UserId" value="<?php echo isset($rdata['UserId']) ? $rdata['UserId'] : ''; ?>"  />
                        <input type="hidden" id="page" name="page" value="page_experience_info" />            
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="Designation[]" id="Designation" placeholder="Position Held *" maxlength="150" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="EmpAddress[]" id="EmpAddress" placeholder="Address of Employer *" maxlength="250"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><p>&nbsp;</p></div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div id="dpStart" class="input-group date">
                        <input class="form-control" type="text" autocomplete="off" name="StartDate[]" placeholder="Start Date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="dpEnd" class="input-group date">
                        <input class="form-control" type="text" autocomplete="off" name="EndDate[]" placeholder="End Date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="one_colamn_topics">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="one_colamn_topics">
                        <div class="checkbox">
                            <label style="color:gray;">
                                <input type="checkbox" name="CurrentlyWorking[]" <?php if(isset($rdata['CurrentlyWorking']) && $rdata['CurrentlyWorking'] == '1'){ echo 'checked="checked"'; }else{ echo '';} ?>  value="<?php echo isset($rdata['CurrentlyWorking']) ? $rdata['CurrentlyWorking'] : '1'; ?>">Currently Working
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="LastSalary[]" id="LastSalary" value="<?php echo isset($rdata['LastSalary']) ? $rdata['LastSalary'] : '' ?>" placeholder="Last Salary Drawn" />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="LeaveReason[]" id="LeaveReason" value="<?php echo isset($rdata['LeaveReason']) ? $rdata['LeaveReason'] : '' ?>" placeholder="Reason for Leave *" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="one_colamn">
                        <textarea id="editor1" name="Responsibility[]" id="Responsibility" placeholder="Duties / Responsibilities *"></textarea>
                    </div>
                </div>
            </div>
            <script>
                initSample('1');
            </script>
            <?php } ?>
            <div id='category_div'></div>
            <div class="more_area">
                <button class="more_btn" id="addButton">ADD MORE</button>
            </div>
        </div>
        <div class="colamn_area colamn_padding">
                <div class="underline_bg"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="one_colamn">
                            <textarea id="Skill" name="Skill" cols="30" rows="10" placeholder="IT / Professional Skill"><?php echo isset($row[0]['Skill']) ? $row[0]['Skill'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="one_colamn">
                            <textarea id="ExtraCurriculum" name="ExtraCurriculum" cols="30" rows="10" placeholder="Extra Curricular Activities"><?php echo isset($row[0]['ExtraCurriculum']) ? $row[0]['ExtraCurriculum'] : ''; ?></textarea>
                        </div>
                    </div>
               </div>
        </div>
        <?php 
            //echo '<pre/>'; print_r($row[0]['Reference']); echo count($row[0]['Reference']);   exit(); 
            $counttrain = 0; 
            if(isset($row[0]['Reference']) && count($row[0]['Reference']) > 0 ){ 
                $counttrain = count($row[0]['Reference']);
                $head = 1; 
                foreach ($row[0]['Reference'] as $rdata){  
        ?>
            <div class="colamn_area colamn_padding">
                <div class="underline_bg"></div>
                <div class="one_colamn_title">
                    <h2>REFERENCE-<?php echo $head; ?></h2>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="one_colamn_school">
                            <input type="hidden" name="RefId[]" value="<?php echo isset($rdata['Id']) ? $rdata['Id'] : '' ?>" />
                            <input type="text" autocomplete="off" name="RefName[]" value="<?php echo isset($rdata['RefName']) ? $rdata['RefName'] : '' ?>" placeholder="Name *" maxlength="150"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="one_colamn_year">
                            <input type="text" autocomplete="off" name="RefOccupation[]"  value="<?php echo isset($rdata['RefOccupation']) ? $rdata['RefOccupation'] : '' ?>" placeholder="Occupation *" maxlength="250"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="one_colamn_topics">
                            <input type="text" autocomplete="off" name="RefAddress[]" value="<?php echo isset($rdata['RefAddress']) ? $rdata['RefAddress'] : '' ?>" placeholder="Address *" maxlength="250"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="one_colamn_topics">
                            <input type="text" autocomplete="off" name="RefContact[]" value="<?php echo isset($rdata['RefContact']) ? $rdata['RefContact'] : '' ?>" placeholder="Contact No *" maxlength="15"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="one_colamn_topics">
                            <input required type="email" autocomplete="off" name="RefEmail[]" value="<?php echo isset($rdata['RefEmail']) ? $rdata['RefEmail'] : '' ?>" placeholder="Email *" maxlength="150" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="one_colamn_topics">
                            <input type="text" autocomplete="off" name="RefRelationship[]" id="RefRelationship" value="<?php echo isset($rdata['RefRelationship']) ? $rdata['RefRelationship'] : '' ?>" placeholder="Relationship with Applicant *" maxlength="200"/>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            $head++;
            }
        }
        if($counttrain<2){ 
            for($tcon = 1; $tcon < 3 - $counttrain; $tcon++){ //echo '##'.$tcon; ?>
                <div class="colamn_area colamn_padding">
                    <div class="underline_bg"></div>
                    <div class="one_colamn_title">
                        <h2>REFERENCE-<?php echo $counttrain + $tcon; ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="one_colamn_school">
                                <input type="text" autocomplete="off" name="RefName[]" value="" placeholder="Name *" maxlength="150"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="one_colamn_year">
                                <input type="text" autocomplete="off" name="RefOccupation[]"  value="" placeholder="Occupation *" maxlength="250" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="one_colamn_topics">
                                <input type="text" autocomplete="off" name="RefAddress[]" value="" placeholder="Address *" maxlength="250"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="one_colamn_topics">
                                <input type="text" autocomplete="off" name="RefContact[]" id="RefContact<?php echo $counttrain + $tcon; ?>" value="" placeholder="Contact No *" maxlength="15" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="one_colamn_topics">
                                <input type="email" autocomplete="off" name="RefEmail[]" placeholder="Email *" maxlength="150"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="one_colamn_topics">
                                <input type="text" autocomplete="off" name="RefRelationship[]" id="RefRelationship" placeholder="Relationship with Applicant *" maxlength="200"/>
                            </div>
                        </div>
                    </div>
                </div>                
        <?php  
            }
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <h4>Upload Picture</h4>
                <div class="one_colamn_topics">
                    <input type="file" name="photo" />
                    <?php $UserPhoto = get_photo('UserId','Thumb',$UserId,'UserPhoto');if($UserPhoto!=''){?>
                    <img src="<?php echo base_url();?>/assets/image/upload/thumbnail/<?php echo $UserPhoto;?>" width="120" height="95">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row"><div class="col-md-12"><br/></div></div>
        <div class="save_area">
        <?php
            if (empty($UserId)) {
                echo '<div style="float:left; margin-top:10px; color:red;">Please login First to save and continue.</div>';
            } else { ?>
                <input type="hidden" id="page" name="page" value="page_experience_info" />
                <input type="hidden" name="UserId" value="<?php echo $UserId; ?>"/> 
                <button type="submit" class="save_future">Save and continue</button>
                <!--<button type="submit" class="save_continue" id="save_future_edu_info">Save and continue</button>-->
        <?php } ?>
        </div>
    </div>
</form>
<script>
$(function () {
     $('input[type="file"]').change(function () {
          if ($(this).val() != "") {
                 $(this).css('color', '#333');
          }else{
                 $(this).css('color', 'transparent');
          }
     });
});
</script>