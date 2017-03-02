<style>
    .panel-heading-01{ 
        background-color: #00a65e;
        color: #fff;

    }
    .panel-body-02{
        background-color: #fff;
        padding: 30px;
        line-height: 24px;
    }
    .nav li.active a {
        color: #fff;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
        background-color: #00a65e !important;
    } 
</style>
<section id="about" class="section-gray_1 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>My Resume<hr></h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-3" style="background-color: #fff;">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="<?php echo base_url(); ?>home/myAccount">My Status</a></li>
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>home/myresume">View Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>career/careerform">Edit Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>career/careerform">Change Password</a></li>
                </ul>            
            </div>
            <div class="col-md-8">             
                <div class="panel-heading panel-heading-01">
                    View Resume
                </div>
                <div class="panel-body panel-body-02">
                    <?php include('myresume_body.php');?>
                </div>
            </div>
        </div>
<!--        <div class="row">
            <div class="col-md-12">&nbsp;            
                <a href="javascript:history.go(-1)">Back</a>
            </div>          
        </div>         -->
    </div>    
</section> <!-- End about -->