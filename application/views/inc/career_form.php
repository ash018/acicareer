<div class="col-md-7" id="personalinfo_form">
    <?php //echo '<pre/>'; print_r($row);   exit(); ?>
    <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
                echo $message;
                $this->session->unset_userdata('message');
        }
    ?>
    <?php include('personalinfo.php');?>
</div>
<?php  //echo '<pre/>'; print_r($row[0]['Education']); echo count($row[0]['Education']);   exit(); ?>
<div class="col-md-7" id="education_form" style="display:none;">
    <?php include('education.php');?>
</div>
<div class="col-md-7" id="training_form" style="display:none;">
    <?php  //echo '<pre/>'; print_r($row[0]['Training']); echo count($row[0]['Training']);   exit(); ?>
    <?php include('training.php');?>
</div>
<?php //echo '<pre/>'; print_r($row[0]['Experience']); echo count($row[0]['Experience']);   exit();//echo $row->Id;print_r($row);exit();?>
<div class="col-md-7" id="experience_form" style="display:none;">
    <div id="experience_result"></div>
    <?php include('experience.php');?>
</div>