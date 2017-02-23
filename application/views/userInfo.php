<section id="slider_1">
    <div id="top_slider-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo base_url();?>assets/img/slider_5.png" alt="" />
            </div>
            <div class="item">
                <img src="<?php echo base_url();?>assets/img/slider_5.png" alt="" />
            </div>
        </div>
        <a class="left top_slider-control" href="#top_slider-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right top_slider-control" href="#top_slider-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div>
</section> <!-- End slider -->

<section class="section-padding50 wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">				
                <div class="drop_area">
                    <div class="row">
                        <div class="drop_title">
                            <h2>DROP YOUR CV</h2>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-12">										
                                    <a href="javascript:">
                                        <div  id="personalinfo" class="single_information_active">
                                            <i class="fa fa-info-circle"></i>
                                            <p>PERSONAL INFO</p>
                                        </div>
                                    </a>										
                                    <a href="javascript:">
                                        <div  id="education" class="single_information">
                                            <i class="fa fa-book"></i>
                                            <p>EDUCATION</p>
                                        </div>
                                    </a>
                                    <a href="javascript:">
                                        <div  id="training" class="single_information">
                                            <i class="fa fa-book"></i>
                                            <p>TRAINING</p>
                                        </div>
                                    </a>
                                    <a href="javascript:">
                                        <div id="experience" class="single_information">
                                            <i class="fa fa-book"></i>
                                            <p>EXPERIENCE</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $ci = get_instance();
                            $UserId = $ci->session->userdata('UserId');
                            $UserName = $ci->session->userdata('UserName');
                        ?>
                        <div class="col-md-7" id="personalinfo_form">
                        <form action="<?php echo base_url();?>career/careerActionPersonalInfo" method="post" id="personalinfo_form_id">
                            <div class="page_title_one">
                                <p>
                                    import info from Bdjobs
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="one_colamn">
                                        <input type="hidden" id="page" name="page" value="page_user_info" />
                                        <input type="text" id="UserName" name="UserName" value="<?php echo isset($row->UserName) ? $row->UserName : $UserName;?>" placeholder="our Name *" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="text" id="FatherName" name="FatherName" value="<?php echo isset($row->FatherName) ? $row->FatherName : ''?>" placeholder="Father's Name *" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="text" id="MotherName" name="MotherName" value="<?php echo isset($row->MotherName) ? $row->MotherName : ''?>" placeholder="Mother's Name *" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="one_colamn">
                                        <textarea id="Add1" name="Add1" id="" cols="30" rows="10" placeholder="Address (Present) *"><?php echo isset($row->Add1) ? $row->Add1 : ''?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="one_colamn">
                                        <textarea id="Add2" name="Add2" id="" cols="30" rows="10" placeholder="Address (Permanent) *"><?php echo isset($row->Add2) ? $row->Add2 : ''?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="text" id="Nationality" name="Nationality" value="<?php echo isset($row->Nationality) ? $row->Nationality : ''?>" placeholder="Nationality *" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single_text_area">
                                        <select id="Gender" name="Gender" required>
                                            <option value="">Select a Gender</option>
                                            <option value="Male" <?php if(isset($row->Gender) && $row->Gender == 'Male'){ echo 'selected';}?>>Male</option>
                                            <option value="Female" <?php if(isset($row->Gender) && $row->Gender == 'Female'){ echo 'selected';}?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                    
                                    <div class="two_colamn date" data-provide="datepicker">
                                        <input type="text" id="DOB" name="DOB"  class="datepicker" data-date-format="mm/dd/yyyy" value="<?php echo isset($row->DOB) ? $row->DOB : ''?>" placeholder="Date of Birth *" />
                                        <div class="input-group-addon input-group-addon_custom"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single_text_area">
                                        <select id="Religion" name="Religion" required>
                                            <option value="">Select a Religion</option>
                                            <?php echo isset($row->Religion) ? select_option_selected('LReligion', 'Id','ReligionName',$row->Religion) : select_option('LReligion', 'Id','ReligionName'); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single_text_area">
                                        <select id="MaritalStatus" name="MaritalStatus" required>
                                            <option value="">Marital Status*</option>
                                            <option value="Single" <?php if(isset($row->Gender) && $row->Gender == 'Single'){ echo 'selected';}?>>Single</option>
                                            <option value="Married" <?php if(isset($row->Gender) && $row->Gender == 'Married'){ echo 'selected';}?>>Married</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single_text_area">
                                        <select id="BloodGroup" name="BloodGroup" required>
                                            <option value="">Blood Group*</option>
                                            <?php echo isset($row->BloodGroup) ? select_option_selected('LBlood', 'Id','BloodGroup',$row->BloodGroup) : select_option('LBlood', 'Id','BloodGroup'); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="text" id="TelNo" name="TelNo" value="<?php echo isset($row->TelNo) ? $row->TelNo : ''?>" placeholder="Tel. No." />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="text" id="Mobile" name="Mobile" value="<?php echo isset($row->Mobile) ? $row->Mobile : ''?>" placeholder="Mobile No. * " required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="two_colamn">
                                        <input type="text" id="NationalId" name="NationalId" value="<?php echo isset($row->NationalId) ? $row->NationalId : ''?>" placeholder="National ID No. *" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="text" id="PassportNo" name="PassportNo" value="<?php echo isset($row->PassportNo) ? $row->PassportNo : ''?>" placeholder="Passport No.(If any)" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="text" id="BirthPlace" name="BirthPlace" value="<?php echo isset($row->BirthPlace) ? $row->BirthPlace : ''?>" placeholder="Place of Birth *" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                           <input type="text" id="ExpSalary" name="ExpSalary" value="<?php echo isset($row->ExpSalary) ? $row->ExpSalary : ''?>" placeholder="Expected Salary Tk/month *" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="text"  id="Email" name="Email" value="<?php echo isset($row->Email) ? $row->Email : ''?>" placeholder="Email Address * " />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                           <input type="password" id="Password" name="Password" value="<?php echo isset($row->Password) ? $row->Password : ''?>" placeholder="Password *" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="two_colamn">
                                        <input type="password"  id="ConfirmPassword" name="ConfirmPassword" value="<?php echo isset($row->ConfirmPassword) ? $row->ConfirmPassword : ''?>" placeholder="Confirm Password * " />
                                    </div>
                                </div>
                            </div>
                            <div class="cv_titale">
                                <p><span>ATTENTION:</span>Please keep your email secure. For future access you need to login with your given mail. No password will be required.</p>
                            </div>
                            <div class="save_area">
                                <button class="save_future" type="submit" id="save_future_per_info">Save for future</button>
                                <button class="save_continue" type="submit" id="save_continue_per_info">Save and continue</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="team-members" class="wins_area_area wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="co-md-12">
                <div class="single_wins">
                    <h2>TALENT<span>WINS</span>GAMES</h2>
                    <h2>BUT<span>TEAMWORK</span>AND<span>INTELLIGENCE</span></h2>
                    <h2>WINS<span>CHAMPIONSHIPS</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>




