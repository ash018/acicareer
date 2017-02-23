<form action="<?php echo base_url(); ?>career/careerActionPersonalInfo" method="post" id="personalinfo_form_id">
        <div class="page_title_one">
            <!--ACI CvHub-->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="one_colamn">
                    <input type="hidden" id="UserGeneraiInfoId" name="UserGeneraiInfoId" value="<?php echo isset($row[0]['Id']) ? $row[0]['Id'] : ''; ?>" />
                    <input type="hidden" id="page" name="page" value="page_user_info" />
                    <input autocomplete="off" type="text" id="UserName" name="UserName" value="<?php echo isset($row[0]['UserName']) ? $row[0]['UserName'] : ''; ?>" placeholder="Name *" maxlength="150"/>
                    <label class="error" for="UserName" id="UserName_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="FatherName" name="FatherName" value="<?php echo isset($row[0]['FatherName']) ? $row[0]['FatherName'] : ''; ?>" placeholder="Fathers Name *" maxlength="150" />
                    <label class="error" for="FatherName" id="FatherName_error">This field is required.</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="MotherName" name="MotherName" value="<?php echo isset($row[0]['MotherName']) ? $row[0]['MotherName'] : ''; ?>" placeholder="Mothers Name *" maxlength="150"/>
                    <label class="error" for="MotherName" id="MotherName_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="one_colamn">
                    <textarea autocomplete="off" id="Add1" name="Add1" id="Add1" cols="30" rows="10" placeholder="Address (Present) *" maxlength="250"><?php echo isset($row[0]['Add1']) ? $row[0]['Add1'] : ''; ?></textarea>
                    <label class="error" for="Add1" id="Add1_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="one_colamn">
                    <textarea autocomplete="off" id="Add2" name="Add2" id="" cols="30" rows="10" placeholder="Address (Permanent) *" maxlength="250"><?php echo isset($row[0]['Add2']) ? $row[0]['Add2'] : ''; ?></textarea>
                    <label class="error" for="Add2" id="Add2_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="Nationality" name="Nationality" value="<?php echo isset($row[0]['Nationality']) ? $row[0]['Nationality'] : ''; ?>" placeholder="Nationality *" maxlength="50"/>
                    <label class="error" for="Nationality" id="Nationality_error">This field is required.</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single_text_area">
                    <select id="Gender" name="Gender">
                        <option value="">Select a Gender *</option>
                        <option value="Male" <?php if (isset($row[0]['Gender'] ) && $row[0]['Gender'] == 'Male') { echo 'selected="selected"'; } ?>>Male</option>
                        <option value="Female" <?php if (isset($row[0]['Gender']) && $row[0]['Gender'] == 'Female') { echo 'selected'; }?>>Female</option>
                    </select>
                    <label class="error" for="Gender" id="Gender_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-6">                                    
                <div class="date">
                    <!--<input autocomplete="off" type="text" id="DOB" name="DOB" class="datepickerDOB" value="<?php echo isset($row[0]['DOB']) ? date('m/d/Y',strtotime($row[0]['DOB'])) : ''; ?>" placeholder="Date of Birth *" />-->
                    <!--<div class="input-group-addon input-group-addon_custom"></div>-->
                    <!--<label class="error" for="DOB" id="DOB_error">This field is required.</label>-->
                    <!---->
                    <div class="input-group input-append date" id="DOB">
                        <input type="text" class="form-control" name="DOB" value="<?php echo isset($row[0]['DOB']) ? date('m/d/Y',strtotime($row[0]['DOB'])) : '';?>" placeholder="Date of Birth *"/>
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        <label class="error" for="DOB" id="DOB_error">This field is required.</label>
                    </div>
                    <!---->
                </div>
            </div>
            <div class="col-md-6">
                <div class="single_text_area_date">
                    <select id="Religion" name="Religion">
                        <option value="">Select a Religion</option>
                        <?php echo isset($row[0]['Religion']) ? select_option_selected('LReligion', 'Id', 'ReligionName', $row[0]['Religion']) : select_option('LReligion', 'Id', 'ReligionName'); ?>
                    </select>
                </div>
            </div>
        </div>		 
        <div class="row">
            <div class="col-md-6">
                <div class="single_text_area">
                    <select id="MaritalStatus" name="MaritalStatus">
                        <option value="">Marital Status*</option>
                        <option value="Single" <?php
                                if (isset($row[0]['MaritalStatus']) && $row[0]['MaritalStatus'] == 'Single') {
                                    echo 'selected';
                                }
                                ?>>Single</option>
                        <option value="Married" <?php
                                if (isset($row[0]['MaritalStatus']) && $row[0]['MaritalStatus'] == 'Married') {
                                    echo 'selected';
                                }
                                ?>>Married</option>
                    </select>
                    <label class="error" for="MaritalStatus" id="MaritalStatus_error">This field is required.</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single_text_area">
                    <select id="BloodGroup" name="BloodGroup">
                        <option value="">Blood Group</option>
                        <?php echo isset($row[0]['BloodGroup']) ? select_option_selected('LBlood', 'Id', 'BloodGroup', $row[0]['BloodGroup']) : select_option('LBlood', 'Id', 'BloodGroup'); ?>
                    </select>
                    <label class="error" for="BloodGroup" id="BloodGroup_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row" id="changepassword">
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="TelNo" name="TelNo" value="<?php echo isset($row[0]['TelNo']) ? $row[0]['TelNo'] : ''; ?>" placeholder="Telephone" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="Mobile" name="Mobile" value="<?php echo isset($row[0]['Mobile']) ? $row[0]['Mobile'] : ''; ?>" placeholder="Mobile *" maxlength="15"/>
                    <label class="error" for="Mobile" id="Mobile_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="NationalId" name="NationalId" value="<?php echo isset($row[0]['NationalId']) ? $row[0]['NationalId'] : ''; ?>" placeholder="National-ID" maxlength="20" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="PassportNo" name="PassportNo" value="<?php echo isset($row[0]['PassportNo']) ? $row[0]['PassportNo'] : ''; ?>" placeholder="Passport(If Any)" maxlength="20" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="BirthPlace" name="BirthPlace" value="<?php echo isset($row[0]['BirthPlace']) ? $row[0]['BirthPlace'] : ''; ?>" placeholder="Place of Birth *" maxlength="150" />
                    <label class="error" for="BirthPlace" id="BirthPlace_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="text" id="ExpSalary" name="ExpSalary" value="<?php echo isset($row[0]['ExpSalary']) ? $row[0]['ExpSalary'] : ''; ?>" placeholder="Expected Salary" maxlength="10" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="two_colamn">
                    <input autocomplete="off" type="email"  id="Email" name="Email" value="<?php echo isset($row[0]['Email']) ? $row[0]['Email'] : ''; ?>" placeholder="Email *" maxlength="150" />
                    <label class="error" for="Email" id="Email_error">This field is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="two_colamn">
                    <input type="password" id="txtNewPassword" name="Password" value="<?php echo isset($row[0]['Password']) ? $row[0]['Password'] : ''; ?>" placeholder="Password *" maxlength="150"/>
                    <label class="error" for="password" id="txtNewPassword_error">This field is required.</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="two_colamn">
                    <input type="password"  id="txtConfirmPassword" name="ConfirmPassword" value="<?php echo isset($row[0]['Password']) ? $row[0]['Password'] : ''; ?>" placeholder="Confirm Password" />
                    <label class="error" for="password" id="txtConfirmPassword_error">Passwords do not match!</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="one_colamn">
                    <textarea id="CareerObjective" autocomplete="off" name="CareerObjective" id="CareerObjective" cols="30" rows="10" placeholder="Career Objective "><?php echo isset($row[0]['CareerObjective']) ? $row[0]['CareerObjective'] : ''; ?></textarea>
                    <!--<label class="error" for="Add1" id="Add1_error">This field is required.</label>-->
                </div>
            </div>
        </div>
        <div class="cv_titale">
            <p><span>ATTENTION: </span>Please keep your email secure. For future access you need to login with your given mail.</p>
        </div>
        <div class="save_area">
            <!--<button class="save_future" type="submit" id="save_future_per_info">Save and continue</button>-->
            <button class="save_continue" type="submit" id="save_continue_per_info">Save and continue</button>
        </div>
    </form>