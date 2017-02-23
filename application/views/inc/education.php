<?php //echo '<pre/>';print_r($row[0]['Education']);?>
<form action="<?php echo base_url(); ?>career/careerActionEducation" method="post" id="education_form_id">
<?php 
    $counter=0; 
    if(isset($row[0]['Education']) && count($row[0]['Education'])> 0){ 
        $counter =  count($row[0]['Education']); 
        $head = 1;  
        foreach ($row[0]['Education'] as $rdata){ //echo "Counter".$counter; ?>
            <?php //echo '<pre/>';print_r($rdata);?>
            <div class="colamn_area colamn_padding">
                <div class="underline_bg"></div>           
                <div class="one_colamn_title">
                    <h2>educational qualification - <?php echo $head;?></h2>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="one_colamn_school">
                            <input type="hidden" name="EducationId[]" value="<?php echo isset($rdata['Id']) ? $rdata['Id'] : '' ?>"/>
                            <input type="text" autocomplete="off" name="InstituteName[]" id="InstituteName<?php echo $head; ?>" value="<?php echo isset($rdata['InstituteName']) ? $rdata['InstituteName'] : '' ?>"  placeholder="Institute Name *" maxlength="250"  />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="one_colamn_year">
                            <select name="PassingYear[]" id="PassingYear<?php echo $head; ?>">
                                <option value="">Year of Passing *</option>
                                <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                <option value="<?php if($i == $rdata['PassingYear']){echo $i; }else{echo $i;}?>" <?php if($i == $rdata['PassingYear']){echo 'selected'; }?> > <?php if($i == $rdata['PassingYear']){echo $i; } else{ echo $i;}?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-md-12">
                        <div class="one_colamn_topics">
                            <div class="checkbox">
                                <label style="color:gray;">
                                    <?php //echo $rdata['IsForeignInstitute']; ?>
                                    <input type="checkbox" autocomplete="off" name="IsForeignInstitute[]" id="IsForeignInstitute1" 
                                    <?php
                                    if( isset($rdata['IsForeignInstitute']) && $rdata['IsForeignInstitute'] == '1'){
                                        echo 'checked="checked"'; 
                                    }else{
                                        echo '';
                                    }
                                    ?> value="<?php echo $head-1;?>">
                                    Foreign Institute
                                </label>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-md-6">
                        <div class="one_colamn_year">
                            <select name="EducationLevel[]" id="EducationLevel<?php echo $head; ?>">
                                <option value="">Area of Study *</option>
                                <?php echo isset($rdata['EducationLevel']) ? select_option_selected('LEducationLevel', 'Id', 'EducationLevel', $rdata['EducationLevel']) : select_option('LEducationLevel', 'Id', 'EducationLevel'); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="one_colamn_year">                        
                            <input type="text" autocomplete="off" name="Faculty[]" id="Faculty<?php echo $head; ?>" value="<?php echo isset($rdata['Faculty']) ? $rdata['Faculty'] : '' ?>"  placeholder="Major/Concentration *" maxlength="250"  />
                            <label class="error" for="Faculty<?php echo $head; ?>" id="Faculty<?php echo $head; ?>_error">This field is required.</label>
    <!--                        <select name="Faculty[]" id="Faculty<?php echo $head; ?>">
                                <option value="">Major/Concentration *</option>
                                <?php //echo isset($rdata['Faculty']) ? select_option_selected('LFaculty', 'Id', 'FacultyName', $rdata['Faculty']) : select_option('LFaculty', 'Id', 'FacultyName'); ?>
                            </select>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="one_colamn_year">
                            <select name="Result[]" id="Result<?php echo $head; ?>">
                                <option value="">Select Result *</option>
                                <?php echo isset($rdata['Result']) ? select_option_selected('LResult', 'Id', 'ResultName', $rdata['Result']) : select_option('LResult', 'Id', 'ResultName'); ?>
                            </select>
                            <!--<input type="text" autocomplete="off"  id="Result<?php echo $head; ?>" name="Result[]" value="<?php echo isset($rdata['Result']) ? $rdata['Result'] : '' ?>" placeholder="Result" />-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="one_colamn_school">
                            <input type="text" autocomplete="off"  id="Marks<?php echo $head; ?>" name="Marks[]" value="<?php echo isset($rdata['Marks']) ? $rdata['Marks'] : '' ?>" placeholder="Mark(%)/CGPA/GPA *" maxlength="20"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="one_colamn_school">
                            <select name="QualificationAttained[]" id="QualificationAttained<?php echo $head; ?>">
                                <option value="">out of</option>
                                    <option value="Division" <?php if(isset($rdata['QualificationAttained']) && $rdata['QualificationAttained'] == 'Division'){echo 'selected';}?>>Division/Class</option>
                                    <option value="5" <?php if(isset($rdata['QualificationAttained']) && $rdata['QualificationAttained'] == '5'){echo 'selected';}?>>5.00</option>
                                    <option value="4" <?php if(isset($rdata['QualificationAttained']) && $rdata['QualificationAttained'] == '4'){echo 'selected';}?>>4.00</option>
                            </select>
                            <!--<input type="text" autocomplete="off" id="QualificationAttained" name="QualificationAttained[]" value="<?php echo isset($rdata['QualificationAttained']) ? $rdata['QualificationAttained'] : '' ?>" placeholder="" />-->
                        </div>
                    </div>
                </div>
            </div>        
        <?php 
        $head++; 
        }
}

if( $counter < 5){
    for($edform = 1; $edform < 5 - $counter; $edform ++){ 
?>                
    <div class="colamn_area colamn_padding">
        <div class="underline_bg"></div>
        <div class="one_colamn_title">
            <h2>educational qualification - <?php echo $counter + $edform; ?></h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="one_colamn_school">
                    <input type="text" autocomplete="off" name="InstituteName[]" id="InstituteName<?php echo $counter + $edform; ?>"  placeholder="Institute Name *"  maxlength="250" />
                    <label class="error" for="InstituteName<?php echo $counter + $edform; ?>" id="InstituteName<?php echo $counter + $edform; ?>_error">This field is required.</label>
                    <input type="hidden" name="UserId" value="<?php echo isset($row->Id) ? $row->Id : ''; ?>"  />
                    <input type="hidden" id="page" name="page" value="page_education_info" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="one_colamn_year">
                    <select name="PassingYear[]" id="PassingYear<?php echo $counter + $edform; ?>">
                        <option value="">Year of Passing *</option>
                        <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                            <option value="<?php echo $i; ?>" > <?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <label class="error" for="PassingYear<?php echo $counter + $edform; ?>" id="PassingYear<?php echo $counter + $edform; ?>_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="one_colamn_topics">
                    <div class="checkbox">
                        <label style="color:gray;">
                            <?php //echo $rdata['IsForeignInstitute']; ?>
                            <input type="checkbox" autocomplete="off" name="IsForeignInstitute[]" id="IsForeignInstitute1" 
                             value="<?php echo $counter + $edform-1;?>">
                            Foreign Institute
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="one_colamn_year">
                    <select name="EducationLevel[]" id="EducationLevel<?php echo $counter + $edform; ?>">
                        <option value="">Area of Study *</option>
                        <?php echo select_option('LEducationLevel', 'Id', 'EducationLevel'); ?>
                    </select>
                    <label class="error" for="EducationLevel<?php echo $counter + $edform; ?>" id="EducationLevel<?php echo $counter + $edform; ?>_error">This field is required.</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="one_colamn_year">
                    <input type="text" autocomplete="off" name="Faculty[]" id="Faculty<?php echo $counter + $edform; ?>" placeholder="Major/Concentration *" maxlength="250"/>
                <!--<select name="Faculty[]" id="Faculty<?php echo $counter + $edform; ?>">
                        <option value="">Major/Concentration *</option>
                        <?php //echo isset($rdata['Faculty']) ? select_option_selected('LFaculty', 'Id', 'FacultyName', $rdata['Faculty']) : select_option('LFaculty', 'Id', 'FacultyName'); ?>
                    </select>-->
                    <label class="error" for="Faculty<?php echo $counter + $edform; ?>" id="Faculty<?php echo $counter + $edform; ?>_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="one_colamn_year">
                    <select name="Result[]" id="Result<?php echo $counter + $edform; ?>">
                        <option value="">Select Result *</option>
                        <?php echo select_option('LResult', 'Id', 'ResultName'); ?>
                    </select>
                    <!--<input type="text" autocomplete="off"  id="Result<?php echo $counter + $edform; ?>" name="Result[]" value="<?php echo isset($row->Result) ? 'Result' : '' ?>" placeholder="Result" />-->
                    <label class="error" for="Result<?php echo $edform;?>" id="Result<?php echo $counter + $edform; ?>_error">This field is required.</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="one_colamn_school">
                    <input type="text" autocomplete="off"  id="Marks<?php echo $counter + $edform; ?>" name="Marks[]" placeholder="Mark(%)/CGPA/GPA *" maxlength="20"/>
                    <label class="error" for="Marks<?php echo $counter + $edform; ?>" id="Marks<?php echo $counter + $edform; ?>_error">This field is required.</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="one_colamn_school">
                    <select name="QualificationAttained[]" id="QualificationAttained<?php echo $counter + $edform; ?>">
                        <option value="">out of</option>
                        <option value="Division">Division/Class</option>
                        <option value="5">5.00</option>
                        <option value="4">4.00</option>
                    </select>
                    <label class="error" for="QualificationAttained<?php echo $edform;?>" id="QualificationAttained<?php echo $counter + $edform; ?>_error">This field is required.</label>
                        <!--<input type="text" id="QualificationAttained" name="QualificationAttained[]" value="<?php echo isset($rdata['QualificationAttained']) ? $rdata['QualificationAttained'] : '' ?>" placeholder="" />-->
                </div>
            </div>
        </div>
    </div>                
<?php 
        }
}
?>        
        <div id='education_div'></div>
        <div class="more_area">
            <button class="more_btn" id="addEducationButton">ADD MORE</button>
        </div>
        <div class="save_area">
        <?php
        if (empty($UserId)) {
            echo '<div style="float:left; margin-top:10px; color:red;">Please login First to save and continue.</div>';
        } else {
            ?>
            <input type="hidden" name="UserId" value="<?php echo $UserId; ?>"  />
            <input type="hidden" id="page" name="page" value="page_education_info" />     
            <button type="submit" class="save_future" id="save_education_button">Save and continue</button>
        <?php } ?>
        </div>        
    </form>