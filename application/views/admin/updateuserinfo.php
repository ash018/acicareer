
<?php
    $UserPhoto = $userinfo[0]['UserPhoto'];
    $UserName = $userinfo[0]['UserName'];
    $UserDesignation = $userinfo[0]['UserDesignation'];
    $EmpCode = $userinfo[0]['EmpCode'];
?>
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                 <?php echo $adminmenubar; ?>
            </div>
            <div class="col-md-7">  
                <?php include('top_menu.php');?>   
					
                    <fieldset style="border: 1px solid #CCC; margin-top: 20px;">         
                    
                        <form action="<?php print base_url(); ?>admin/resume/updateuserinfo" style="margin-top: 20px;" 
                            method="post" enctype="multipart/form-data">
                            
                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label>Name</label></div>    
                                <div class="col-md-8"><input class="form-control" type="text" name="name" id="name" 
                                    value="<?php echo $UserName; ?>"></div>    
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label>Designation</label></div>    
                                <div class="col-md-8"><input class="form-control" type="text" name="designation" id="designation" 
                                    value="<?php echo $UserDesignation; ?>"></div>    
                            </div>                                 
                            
                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label>Change Photo</label></div>    
                                <div class="col-md-8"><input class="form-control" type="file" name="photo" id="photo"></div>    
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <div class="col-md-3">&nbsp;</div>    
                                <div class="col-md-8"><input class="btn btn-success" type="submit" name="update" 
                                    value="Update"></div>    
                            </div>
                            
                        </form>   
                    </fieldset>       
            </div>
        </div>
    </div>
</section>
