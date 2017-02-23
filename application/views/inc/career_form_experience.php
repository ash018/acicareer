<?php //print_r($row);?>
<div class="col-md-7" id="personalinfo_form"  style="display:none;">
    <?php include('personalinfo.php');?>
</div>
<div class="col-md-7" id="education_form"  style="display:none;">
    <?php include('education.php');?>
</div>
<div class="col-md-7" id="training_form" style="display:none;">
    <?php include('training.php');?>
</div>
<?php //echo $row->Id;print_r($row);exit();?>
<div class="col-md-7" id="experience_form">
    <div id="experience_result"></div>
    <?php //echo print_r($row[0]['Experience']);exit();?>
    <?php include('experience.php');?>
</div>