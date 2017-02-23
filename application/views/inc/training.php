<form action="<?php echo base_url(); ?>career/careerActionTraining" method="post" id="training_form_id">
        <?php $counttrain = 0; if(isset($row[0]['Training'])&& count($row[0]['Training']) > 0 ){$counttrain = count($row[0]['Training']);  $traincnt=1; foreach ($row[0]['Training'] as $rdata){ ?>
        <div class="colamn_area colamn_padding">
            <div class="underline_bg"></div>
            <div class="one_colamn_title">
                <h2>Training Details - <?php echo $traincnt;?></h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="one_colamn_school">
                        <input type="hidden" name="TrainingId[]" id="TrainingId" value="<?php echo isset($rdata['Id']) ? $rdata['Id'] : '' ?>">
                        <input type="text" autocomplete="off" name="TrainingTitle[]" id="TrainingTitle" value="<?php echo isset($rdata['TrainingTitle']) ? $rdata['TrainingTitle'] : '' ?>" placeholder="Training Title">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="one_colamn_year">
                        <select name="TakenYear[]" id="TakenYear" >
                            <option value="">Taken Year *</option>
                            <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                            <option value="<?php if($i == $rdata['TakenYear']){echo $i; }else{echo $i;}?>" <?php if($i == $rdata['TakenYear']){echo 'selected'; }?> > <?php if($i == $rdata['TakenYear']){echo $i; } else{ echo $i;}?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="TopicsCovered[]" id="TopicsCovered" value="<?php echo isset($rdata['TopicsCovered']) ? $rdata['TopicsCovered'] : '' ?>" placeholder="Topics Covered">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="InstituteNameTraining[]" value="<?php echo isset($rdata['InstituteName']) ? $rdata['InstituteName'] : '' ?>" placeholder="Institute Name/Organized by">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="one_colamn_school">
                        <input type="text" autocomplete="off" name="CertificationNo[]" id="CertificationNo" value="<?php echo isset($rdata['CertificationNo']) ? $rdata['CertificationNo'] : '' ?>" placeholder="Certification No">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="one_colamn_year">
                        <select id="Country" name="CountryName[]" >
                            <option value="">Country *</option>
                            <?php echo isset($rdata['Country']) ? select_option_selected('LCountry', 'Id', 'CountryName', $rdata['Country']) : select_option('LCountry', 'Id', 'Country'); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
         <?php $traincnt++;}
             }if($counttrain<3){for($tcon = 1;$tcon < 4 - $counttrain; $tcon++){ ?>
             <div class="colamn_area colamn_padding">
            <div class="underline_bg"></div>
            <div class="one_colamn_title">
                <h2>Training Details - <?php echo $tcon + $counttrain;?></h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="one_colamn_school">
                        <input type="text" autocomplete="off" name="TrainingTitle[]" id="TrainingTitle" value="<?php echo isset($row->TrainingTitle) ? $row->TrainingTitle : '' ?>" placeholder="Training Title">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="one_colamn_year">
                        <select name="TakenYear[]" id="TakenYear" >
                            <option value="">Taken Year *</option>
                            <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="TopicsCovered[]" id="TopicsCovered" value="<?php echo isset($row->TopicsCovered) ? $row->TopicsCovered : '' ?>" placeholder="Topics Covered" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="one_colamn_topics">
                        <input type="text" autocomplete="off" name="InstituteNameTraining[]" value="<?php echo isset($row->InstituteName) ? $row->InstituteName : '' ?>" placeholder="Institute Name/Organized by" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="one_colamn_school">
                        <input type="text" autocomplete="off" name="CertificationNo[]" id="CertificationNo" value="<?php echo isset($row->CertificationNo) ? $row->CertificationNo : '' ?>" placeholder="Certification No." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="one_colamn_year">
                        <select id="Country" name="CountryName[]" >
                            <option value="">Country *</option>
                            <?php echo isset($row->Country) ? select_option_selected('LCountry', 'Id', 'CountryName', $row->Country) : select_option('LCountry', 'Id', 'CountryName'); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
       <?php 
            }
        }
        ?>
        <div class="save_area">
            <?php
            if (empty($UserId)) {
                echo '<div style="float:left; margin-top:10px; color:red;">Please login First to save and continue.</div>';
            } else {
            ?>
                <input type="hidden" name="UserId" value="<?php echo $UserId; ?>"  />
                <input type="hidden" id="page" name="page" value="page_training_info" />
                <button type="submit" class="save_future" id="save_training_button">Save and continue</button>
                <!--<button type="submit" class="save_continue" id="save_future_edu_info">Save and continue</button>-->
            <?php } ?>
        </div>
    </form>