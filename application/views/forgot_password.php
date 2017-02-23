<!-- To display the flash message-->
 <div class="alert-success" align="center">
    <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
    ?>
</div>

<section id="about" class="section-gray_1 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Forgot Password<hr> </h2>
            </div>          
        </div>
        <div class="row">
            <form action="<?php echo base_url('home/forgot_password_action'); ?>" method="post">
                <div class="form-group animated zoomIn">
                    <label for="exampleInputPassword1">Recovery Password</label>
                    <input type="text" name="Email" class="form-control" placeholder="E-Mail Address">
                </div>                            
                <button type="submit" name="submit" class="btn btn-default">Submit</button>                            
            </form>
        </div> 
    </div>
</section> <!-- End about -->



<section id="team-members" class="achievement_area wow zoomIn">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 co-md-12">
                <div class="single-fact">
                    <h2><span>YES</span>-IT'S OUR ACHIEVEMENT</h2>
                    <p>Over</p>
                    <h2><span class="counter">30,000</span></h2>
                    <p>Smiles</p>
                </div>
            </div>
        </div>
    </div>
</section>


