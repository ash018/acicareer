<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
<section id="about" class="section-gray_1 section-padding">     
    <div class="col-md-12">
        <div class="center-block">
            <div class="drop_title">
                <h2>Internship Form</h2>
                <div class="alert-success" align="center">
                    <?php
                        $message = $this->session->userdata('message');
                        if (isset($message)) {
                            echo $message;
                            $this->session->unset_userdata('message');
                        }
                    ?>
                </div>
                <?php
                //print_r($post['UserName']);
                $row[0] = $post;
                if(isset($post['UserName']) && $post['UserName']!=''){?>
                <div class="alert alert-success">
                    <h3 class="text-center">Please Review and Resubmit. Review option is valid for the first time only.</h3>
                </div>
                <?php  } ?>
            </div>
            <div id="internship_mesg"></div>
            <form action="<?php echo base_url(); ?>internship/submit_internship" method="post" id="internship_form" name="internship_form" class="form-horizontal">
                <div class="underline_bg"></div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="one_colamn_school">
                            <input type="text" autocomplete="off" id="UserName" required name="UserName" value="<?php echo isset($row[0]['UserName']) ? $row[0]['UserName'] : ''; ?>" placeholder="Name *" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="one_colamn_school">
                            <input type="text" autocomplete="off" id="FatherName" required name="FatherName" value="<?php echo isset($row[0]['FatherName']) ? $row[0]['FatherName'] : ''; ?>" placeholder="Father's Name *" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="one_colamn_school">
                            <input type="text" autocomplete="off" id="MotherName" required name="MotherName" value="<?php echo isset($row[0]['MotherName']) ? $row[0]['MotherName'] : ''; ?>" placeholder="Mother's Name *" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="one_colamn">
                            <textarea id="Add1" autocomplete="off" required name="Add1" id="" cols="30" rows="10" placeholder="Address (Present) *"><?php echo isset($row[0]['Add1']) ? $row[0]['Add1'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="one_colamn">
                            <textarea id="Add2" autocomplete="off" required name="Add2" id="" cols="30" rows="10" placeholder="Address (Permanent) *"><?php echo isset($row[0]['Add2']) ? $row[0]['Add2'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="single_text_area">
                            <?php //echo $row->Gender;?>
                            <select id="Gender" name="Gender" required>
                                <option value="">Select a Gender *</option>
                                <option value="Male" <?php if (isset($row[0]['Gender']) && $row[0]['Gender'] == 'Male') {
                                echo 'selected="selected"';
                            } ?>>Male</option>
                                <option value="Female" <?php if (isset($row[0]['Gender']) && $row[0]['Gender'] == 'Female') {
                                echo 'selected';
                            } ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="two_colamn">
                            <input type="text" autocomplete="off" required id="contactnumber" name="contactnumber" value="<?php echo isset($row[0]['Mobile']) ? $row[0]['Mobile'] : ''; ?>" placeholder="Contact Number *" />
                            <label class="error" for="contactnumber" id="contactnumber_error">This field is required.</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">                                
                        <div class="two_colamn" >
                            <input type="email" autocomplete="off" id="Email" required name="Email" value="<?php echo isset($row[0]['Email']) ? $row[0]['Email'] : ''; ?>" placeholder="Email *" />                    
                            <label class="error" for="Email" id="Email_error">This field is required.</label>
                        </div>
                    </div>            
                </div>
                <div class="drop_title">
                    <h2>Last Educational Qualification</h2>
                </div>
                <div class="underline_bg"></div>
                <div class="colamn_area colamn_padding">                       
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="one_colamn_school">   
                                <input type="text" autocomplete="off" required name="InstituteName" value="<?php echo isset($row[0]['InstituteName']) ? $row[0]['InstituteName'] : '' ?>"  placeholder="Institute Name *"   />
                                <label class="error" for="InstituteName" id="InstituteName_error">This field is required.</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="one_colamn_year">
                                <?php //echo $row[0]['PassingYear'];?>
                                <select name="PassingYear" id="PassingYear" >
                                    <option value="">Year of Passing </option>
                                    <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                        <option value="<?php echo $i; ?>" <?php if(isset($row[0]['PassingYear']) && $row[0]['PassingYear'] == $i){echo 'selected';} ?> > <?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="one_colamn_year">
                                <select name="EducationLevel" name="Choose Location" required>
                                    <option value="">Level of Education *</option>
                                    <?php
                                    if(isset($row[0]['EducationLevel'])){
                                        $c_EducationLevel = $row[0]['EducationLevel'];
                                    }
                                    foreach ($LEducationLevel AS $rowel)
                                        {
                                            if (isset($c_EducationLevel) && $c_EducationLevel == $rowel['Id']) {$selected = ' selected="selected"';}
                                            else {$selected = '';}
                                            echo '<option value="'.$rowel['Id'].'"'.$selected.'>'.$rowel['EducationLevel'].'</option>';
                                        }
                                    ?>
                                    <?php //echo isset($row[0]['EducationLevel']) ? select_option_selected('LEducationLevel', 'Id', 'EducationLevel', $row[0]['EducationLevel']) : select_option('LEducationLevel', 'Id', 'EducationLevel'); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="one_colamn_school">
                                <input type="text" autocomplete="off" required name="MajorConcentration" value="<?php echo isset($row[0]['MajorConcentration']) ? $row[0]['MajorConcentration'] : '' ?>"  placeholder="Major/Concentration *"   />
<!--                                <select name="MajorConcentration" required>
                                    <option value="">Major/Concentration *</option>
                                    <?php //echo isset($row[0]['Faculty']) ? select_option_selected('LFaculty', 'Id', 'FacultyName', $row[0]['Faculty']) : select_option('LFaculty', 'Id', 'FacultyName'); ?>
                                </select>-->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3  col-md-offset-2">
                            <div class="one_colamn_year">
                                <!--<input type="text"  id="Result" name="Result" value="<?php echo isset($row[0]['Result']) ? $row[0]['Result'] : '' ?>" placeholder="<?php echo isset($row[0]['Result']) ? $row[0]['Result'] : 'Result' ?>" />-->
                                <select name="Result" id="Result<?php echo $head; ?>">
                                    <option value="">Result</option>
                                    <?php echo isset($row[0]['Result']) ? select_option_selected('LResult', 'Id', 'ResultName', $row[0]['Result']) : select_option('LResult', 'Id', 'ResultName'); ?>
                                </select>   
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="one_colamn_school">
                                <input type="text" autocomplete="off" id="Marks" name="Marks" value="<?php echo isset($row[0]['Marks']) ? $row[0]['Marks'] : '' ?>" placeholder="<?php echo isset($row[0]['Marks'])&&$row[0]['Marks']!='' ? $row[0]['Marks'] : 'Mark(%) /CGPA' ?>" />                                                     
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="one_colamn_year">
                                <!--<input type="text" id="QualificationAttained" name="QualificationAttained" value="<?php echo isset($row[0]['QualificationAttained']) ? $row[0]['QualificationAttained'] : '' ?>" placeholder="<?php echo isset($row[0]['QualificationAttained']) ? $row[0]['QualificationAttained'] : 'Qualification attained ' ?>" />-->
                                <select name="QualificationAttained" id="QualificationAttained<?php echo $head; ?>">
                                    <option value="">out of</option>
                                    <option value="Division" <?php if(isset($row[0]['QualificationAttained']) && $row[0]['QualificationAttained'] == 'Division'){echo 'selected';}?>>Division/Class</option>
                                    <option value="5" <?php if(isset($row[0]['QualificationAttained']) && $row[0]['QualificationAttained'] == '5'){echo 'selected';}?>>5.00</option>
                                    <option value="4" <?php if(isset($row[0]['QualificationAttained']) && $row[0]['QualificationAttained'] == '4'){echo 'selected';}?>>4.00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="one_colamn">
                                <textarea id="CourseAttended" name="CourseAttended" cols="30" rows="10" placeholder="Course / Training"><?php echo isset($row[0]['CourseAttended']) ? $row[0]['CourseAttended'] : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="one_colamn">
                                <textarea id="Skill" name="Skill" cols="30" rows="10" placeholder="IT / Other Skill"><?php echo isset($row[0]['Skill']) ? $row[0]['Skill'] : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="one_colamn">
                                <textarea id="ExtraCurriculum" name="ExtraCurriculum" cols="30" rows="10" placeholder="Extra Curricular Activities"><?php echo isset($row[0]['ExtraCurriculum']) ? $row[0]['ExtraCurriculum'] : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="underline_bg"></div>
                <div class="colamn_area colamn_padding"> 
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <div style="width:100%; border: 0px solid #ff0000; height:40px;">
                                <table>
                                    <tr>
                                        <td>Available for&nbsp;&nbsp;</td>
                                        <td>
                                            <div class="one_colamn_year">
                                                <select name="PassingYear1" class="form-control" id="PassingYear1" required>
                                                    <option value="">Duration</option>
                                                    <?php
                                                        for($i=1; $i<= 12 ; $i++){
                                                            if($i==$row[0]['AvailableMonthFor']){$selected = "selected";}else{$selected ='';}
                                                            echo  '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>&nbsp;months.</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Internship from&nbsp;</td>
                                        <td>
                                            <div class="one_colamn_school date"> 
                                                <input autocomplete="off" class="form-control" required="required" type="text" id="FromMonth" name="FromMonth" placeholder="Start Date" value="<?php echo isset($row[0]['FromMonth']) && $row[0]['FromMonth']!='1970-01-01' ? date('m/d/Y',strtotime($row[0]['FromMonth'])) : '';?>" >
                                            </div>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to</td>
                                        <td><input  autocomplete="off" class="form-control"required="required" type="text" id="ToMonth" name="ToMonth" placeholder="End Date" value="<?php echo isset($row[0]['ToMonth'])&& $row[0]['ToMonth']!='1970-01-01' ? date('m/d/Y',strtotime($row[0]['ToMonth'])) : '';?>" readonly></td>                                    
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <div class="save_area">                                        	
                                                <br/>
                                                <button class="save_continue btn btn-lg btn-block" type="submit" id="save_continue">
                                                    <span style="color: #fff; font-size: 16px;">Resubmit</span>
                                                </button>                                                   
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>     
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
</section> <!-- End about -->


<?php //include('inc/pic_footer.php');?>


