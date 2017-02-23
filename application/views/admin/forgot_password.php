<header class="header_area">
    <div class="container">
        <div class="header_from">
            <div class="row" style="padding-bottom: 100px;">
                <div class="col-sm-5 col-md-4 col-sm-offset-4 col-md-offset-4">
                    <div class="loging text-center animated zoomIn">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/HR-login.png" alt="" /></a>
                        <form action="<?php echo base_url('admin/adminlogin/forgot_password_action');?>" method="post">
                            <div class="form-group animated zoomIn">
                                <label for="exampleInputPassword1">Recovery Password</label>
                                <input type="text" name="EmailId" class="form-control" placeholder="Staff-ID...">
                            </div>                            
                            <button type="submit" name="submit" class="btn btn-default">Submit</button>                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> <!-- End header -->