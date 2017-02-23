<style>
    hr {
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid silver;
        margin: 1em 0;
        padding: 0; 
    }
</style>
<?php if($this->session->flashdata('message')){?>
    <div class="alert alert-success">      
            <?php echo $this->session->flashdata('message')?>
    </div>
<?php } ?>
<section>
    <div class="row">
        <div class="col-sm-12">
            <?php include('inc/slider.php');?>
        </div>
    </div> 
</section> <!-- End slider -->
<div class="alert-danger" align="center">
    <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo '<h2>'.$message.'</h2>';
            $this->session->unset_userdata('message');
        }
    ?>
</div>
<section id="about" class="section-gray_1 section-padding50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><span style="color: #00a65e;">Job Opening(<?php echo $LiveJobs;?>)</span><hr> </h2>
            </div>          
        </div>
        <div class="row">
            <?php if(!empty($JobPost)) foreach($JobPost as $row):?>
                <div class="col-md-4" style="text-align: center;">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b><?php echo $row['JobTitel']; ?></b></div>
                        <div class="panel-body">
                            <?php 
                   
                            if(get_date_format($row['ApplicationDeadline']) == get_date_format(date("Y-m-d"))){
                                    echo '<span style="color:red;">'.get_date_format($row['ApplicationDeadline']).'</span>';
                            }else{
                                    echo get_date_format($row['ApplicationDeadline']);
                            }                            
                                //echo date('F d',strtotime($appdate)).",&nbsp;".date('Y',strtotime($appdate));
                            ?> 
                            <hr>
                            <a href="<?php echo base_url();?>home/job_details_view/<?php echo $row['PostId'];?>" target="_blank">
                                SEE DETAILS
                            </a> 
                        </div>
                    </div>
                </div>
            <?php endforeach;?>            
            <div class="row">
                <div class="col-md-12">&nbsp;</div>          
            </div>         
        </div> 
    </div>
</section> <!-- End about -->



<?php include('inc/pic_footer.php');?>


