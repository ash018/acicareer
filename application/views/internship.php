<section id="about" class="section-gray_1 section-padding">     
    <div class="col-md-12">
        <div class="center-block">
            <div class="drop_title">
                <h2>Internship Form</h2>
            </div>
            <form autocomplete="off" action="<?php echo base_url(); ?>internship/preview_internship" method="post" id="your_form_id" name="internship_form" class="form-horizontal">
                <div class="underline_bg"></div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="one_colamn_school">
                            <input type="text" autocomplete="off" id="UserName" required name="UserName" placeholder="Name *" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="one_colamn_school">
                            <input type="text" autocomplete="off" id="FatherName" required name="FatherName" placeholder="Father's Name *" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="one_colamn_school">
                            <input type="text" autocomplete="off" id="MotherName" required name="MotherName" placeholder="Mother's Name *" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="one_colamn">
                            <textarea id="Add1" autocomplete="off" required name="Add1" id="" cols="30" rows="10" placeholder="Address (Present) *" onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly');    this.blur();    this.focus();  }"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="one_colamn">
                            <textarea id="Add2" autocomplete="off" required name="Add2" id="" cols="30" rows="10" placeholder="Address (Permanent) *"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="single_text_area">
                            <?php //echo $row->Gender;?>
                            <select id="Gender" name="Gender" required>
                                <option value="">Select a Gender *</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="two_colamn">
                            <input type="text" autocomplete="off" required id="contactnumber" name="contactnumber" placeholder="Contact Number *" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">                                
                        <div class="two_colamn" >
                            <input type="email" autocomplete="off" id="Email" required name="Email" placeholder="Email *" />                    
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
                                <input type="text" autocomplete="off" required name="InstituteName" placeholder="Institute Name *"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="one_colamn_year">
                                <?php //echo $row[0]['PassingYear'];?>
                                <select autocomplete="off" name="PassingYear" id="PassingYear" >
                                    <option value="">Year of Passing </option>
                                    <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                        <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
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
                                        foreach ($LEducationLevel AS $rowel)
                                        {
                                            echo '<option value="'.$rowel['Id'].'">'.$rowel['EducationLevel'].'</option>';
                                        }
                                    ?>
                                    <?php //echo isset($row[0]['EducationLevel']) ? select_option_selected('LEducationLevel', 'Id', 'EducationLevel', $row[0]['EducationLevel']) : select_option('LEducationLevel', 'Id', 'EducationLevel'); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="one_colamn_school">
                                <input type="text" autocomplete="off" required name="MajorConcentration" placeholder="Major/Concentration *"   />
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
                                    <?php echo select_option('LResult', 'Id', 'ResultName'); ?>
                                </select>   
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="one_colamn_school">
                                <input type="text" autocomplete="off" id="Marks" name="Marks" placeholder="<?php echo isset($row[0]['Marks'])&&$row[0]['Marks']!='' ? $row[0]['Marks'] : 'Mark(%) /CGPA' ?>" />                                                     
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="one_colamn_year">
                                <!--<input type="text" id="QualificationAttained" name="QualificationAttained" value="<?php echo isset($row[0]['QualificationAttained']) ? $row[0]['QualificationAttained'] : '' ?>" placeholder="<?php echo isset($row[0]['QualificationAttained']) ? $row[0]['QualificationAttained'] : 'Qualification attained ' ?>" />-->
                                <select name="QualificationAttained" id="QualificationAttained<?php echo $head; ?>">
                                    <option value="">out of</option>
                                    <option value="Division">Division/Class</option>
                                    <option value="5">5.00</option>
                                    <option value="4">4.00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="one_colamn">
                                <textarea id="CourseAttended" name="CourseAttended" cols="30" rows="10" placeholder="Course / Training"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="one_colamn">
                                <textarea id="Skill" name="Skill" cols="30" rows="10" placeholder="IT / Other Skill"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="one_colamn">
                                <textarea id="ExtraCurriculum" name="ExtraCurriculum" cols="30" rows="10" placeholder="Extra Curricular Activities"></textarea>
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
                                                <select autocomplete="off" name="PassingYear1" class="form-control" id="PassingYear1" required>
                                                    <option value="">Duration</option>
                                                    <?php
                                                        for($i=1; $i<= 12 ; $i++){
                                                            echo  '<option value="'.$i.'">'.$i.'</option>';
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
                                                <input autocomplete="off" class="form-control" required="required" type="text" id="FromMonth" name="FromMonth" placeholder="Start Date"/>
                                            </div>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to</td>
                                        <td><input  autocomplete="off" class="form-control"required="required" type="text" id="ToMonth" name="ToMonth" placeholder="End Date" readonly></td>                                    
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <div class="save_area">                                         	
                                                <br/>
                                                <button class="save_continue btn btn-lg btn-block" type="submit" id="save_continue">
                                                    <span style="color: #fff; font-size: 16px;">Submit</span>
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


