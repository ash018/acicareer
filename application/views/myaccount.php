<style>
    .myheader{ 
            background-color: #436F7A;
            color: #fff;
    }
    .panel-heading-01{ 
            background-color: #00a65e ;
            color: #fff;

    }
    .panel-body-02{
            background-color: #fff;
            padding: 30px;
            line-height: 24px;
    }	
    .mod{ 
            background-color: #436F7A;
            color: #fff;

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
                <h2>My Account<hr> </h2>
            </div>
            <div class="col-md-3" style="padding-bottom:1px; text-align: center;">
                <?php if(!empty($Myresume)) foreach($Myresume as $row): ?>
                    <img src="<?php echo base_url();?>assets/image/upload/thumbnail/<?php if(empty($row['UserPhoto'][0]['Thumb'])){echo "dummy-image.jpg";}else{echo $row['UserPhoto'][0]['Thumb'];}?>" height="120" width="95">
                    <br/>
                    <?php echo $row['UserName']?>
                <?php endforeach;?> 
            </div>
            <div class="col-md-9">
                <?php
                    $message = $this->session->userdata('message');
                    if (isset($message)) {
                        echo $message;
                        $this->session->unset_userdata('message');
                    }
                ?>
            </div>
        </div>
        <div class="row">  
            <div class="col-md-3">				
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a style="color: #fff;" href="<?php echo base_url(); ?>home/myAccount">Status</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>home/myresume">View Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>career/careerform">Edit Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>career/careerform#changepassword">Change Password</a></li>
                </ul>            
           </div>		   
           <div class="col-md-8"> 
                <div class="panel-heading panel-heading-01">My Status</div>
                <div class="panel-body panel-body-02">
                    <table class="table table-bordered">
                        <thead>						
                                <tr>
                                    <th style="text-align: center">Position</th>
                                    <th style="text-align: center">Application Date</th>
                                    <th style="text-align: center">Application Status</th>
                                    <th style="text-align: center">Shortlisted</th>
                                </tr>
                        </thead>
                        <tbody>						
                            <?php if(!empty($Myapply)) foreach($Myapply as $row):?>
                            <tr>
                                    <td style="text-align: left">
                                        <a href="<?php echo base_url();?>home/job_details_view/<?php echo $row['PostId']?>">
                                        <?php echo $row['JobTitel']; ?>
                                        </a>
                                    </td>
                                    <td style="text-align: center"><?php echo get_date_format($row['AppliedDate']); ?></td>
                                    <td style="text-align: center"> <?php echo "Applied"; ?></td>   	
                                    <td style="text-align: center"> 
                                    <?php if($row['ShortList']==1)echo "Yes";else echo "No"; ?></td>   	
                            </tr>
                            <?php endforeach;?>  
                        </tbody>
                    </table>  
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





