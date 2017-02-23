<header class="header_area">
    <div class="container">
        <div class="header_from">
            <div class="row" style="padding-bottom: 100px;">
                <div class="col-sm-5 col-md-4 col-sm-offset-4 col-md-offset-4">
                    <div class="loging text-center animated zoomIn">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/HR-login.png" alt="" /></a>
						<div class="alert-danger" align="center" style="margin-top:10px;">
							<?php
								$message = $this->session->userdata('message');
								if (isset($message)) {
									echo $message;
									$this->session->unset_userdata('message');
								}
							?>
						</div>
                        <form action="<?php echo base_url('admin/adminlogin');?>" method="post">
                            <div class="form-group animated zoomIn">
                                <label for="exampleInputPassword1">department : HR</label>
                                <input type="text" name="EmpCode" class="form-control" placeholder="Stat ID...">
                            </div>
                            <div class="form-group animated zoomIn">                                
                                <input type="password" name="Password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-default">Login</button>
                            <a style="color:#fff" href="<?php echo base_url(); ?>admin/adminLogin/forgot_password/">Forgot password?</a>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> <!-- End header -->