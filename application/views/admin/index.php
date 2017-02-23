<?php include 'admin_header.php';?>
<div class="page-content">
    <?php echo $main_content;?>
</div> 
<?php include 'admin_footer.php';?>
<?php if(!empty($ajax)){ echo $ajax; } ?>