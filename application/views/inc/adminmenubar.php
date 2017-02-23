<?php
    $UserPhoto = $userinfo[0]['UserPhoto'];
    $UserName = $userinfo[0]['UserName'];
    $UserDesignation = $userinfo[0]['UserDesignation'];
    $EmpCode = $userinfo[0]['EmpCode'];
?>
<!--<div class="dash_search">
    <input type="text" placeholder="Search..."/>
    <i class="fa fa-search"></i>
</div>-->
<div class="dash_imag">
    <?php if(empty($UserPhoto)){?>
	<img src="<?php echo base_url(); ?>assets/img/man.png" alt="" />
	<?php } else{?>
	<img src="<?php echo base_url(); ?>assets/image/adminuser/<?php echo $UserPhoto;?>" alt="" />
	<?php } ?>
    <div class="img_title">
        <h2><?php print $UserName; ?></h2>
        <p><?php print $UserDesignation; ?></p>
        <p>Staff ID: <?php print $EmpCode; ?></p>
    </div>
    <div class="dash_btn_area">
        <a href="<?php print base_url();?>admin/resume/updateuserinfo">Manage/Update</a>
    </div>
</div>
<div class="dash_sidebar_area">
    <div class="accordion-container">
        <div class="set">
            <a href="#">
                Brief Background 
                <i class="fa fa-chevron-right"></i>
            </a>
            <div class="content">
                <p><a href=""><i class="fa fa-chevron-right"></i>Medical Reimburse Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Transport Requisition Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Guest lunch form </a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Leave application form</a></p>
            </div>
        </div>
        <div class="set">
            <a href="#">
                Account 
                <i class="fa fa-chevron-right"></i>
            </a>
            <div class="content">
                <p><a href=""><i class="fa fa-chevron-right"></i>Medical Reimburse Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Transport Requisition Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Guest lunch form </a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Leave application form</a></p>
            </div>
        </div>
        <div class="set">
            <a href="#">
                HR Services 
                <i class="fa fa-chevron-right"></i>
            </a>
            <div class="content">
                <p><a href=""><i class="fa fa-chevron-right"></i>Medical Reimburse Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Transport Requisition Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Guest lunch form </a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Leave application form</a></p>
            </div>
        </div>
        <div class="set">
            <a class="<?php if(isset($page) && $page == 'Eticketing'){echo 'active';}?>" href="#">
                e-Ticketing 
                <i class="fa fa-chevron-right"></i>
            </a>
            <div class="content">
                <p><a href="<?php echo base_url(); ?>admin/eticketing"><i class="fa fa-chevron-right"></i>Medical Reimburse Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Transport Requisition Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Guest lunch form </a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Leave application form</a></p>
            </div>
        </div>
        <div class="set">
            <a href="#">
                Blog 
                <i class="fa fa-chevron-right"></i>
            </a>
            <div class="content">
                <p><a href=""><i class="fa fa-chevron-right"></i>Medical Reimburse Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Transport Requisition Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Guest lunch form </a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Leave application form</a></p>
            </div>
        </div>
        <div class="set">
            <a href="#">
                Notice Board 
                <i class="fa fa-chevron-right"></i>
            </a>
            <div class="content">
                <p><a href=""><i class="fa fa-chevron-right"></i>Medical Reimburse Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Transport Requisition Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Guest lunch form </a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Leave application form</a></p>
            </div>
        </div>
        <div class="set">
            <a href="#">
                Upcoming events
                <i class="fa fa-chevron-right"></i>
            </a>
            <div class="content">
                <p><a href=""><i class="fa fa-chevron-right"></i>Medical Reimburse Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Transport Requisition Form</a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Guest lunch form </a></p>
                <p><a href=""><i class="fa fa-chevron-right"></i>Leave application form</a></p>
            </div>
        </div>
    </div>
</div>
