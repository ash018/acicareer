<style>
    /*css for apply online by rejvin*/
    .achievement_area1 {
      background: rgba(0, 0, 0, 0) url("<?php echo base_url();?>assets/img/slider_2.png") repeat scroll 0 0 / cover ;
      position:relative;
      padding: 159px 0;
    }

    .achievement_area1::after {
        background: #000 none repeat scroll 0 0;
        content: "";
        height: 100%;
        opacity: 0.7;
        position: absolute;
        top: 0;
        width: 100%;
    }
    .achievement_title h2 span {
        font-size: 35px;
        font-weight: 700;
    }

    .apply-online {
      background: #EEEEEE;
      position: relative;
      height: 300px;
      width: 40%;
      z-index: 1;
      margin-left: 30%;
      padding-top: 5%;
    }
     hr.style-six {
      padding: 0px;
      border: none;
      height: 1px;
      background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
      background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
      background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
      background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
      color: #333;
      text-align: center;
    }
    hr.style-six:after {
        content:"";
        display: inline-block;
        position: relative; 
        top: -.9em;  
        font-size: 1.5em;
        padding: 14px 1.5em;    
        background-size: 90px 90px;
        height: 50px;
    }
</style>
<!--<section id="about" class="section-gray_1 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Job Detail<hr> </h2>
            </div>          
        </div>
        <div class="row">   
            <div class="col-md-4">
                <div class="CurrentJob" style="border: 1px solid #E6E6E6;">
                    <div class="productDiv">
                        <h3>Apply Online</h3>
                        <p>Form</p> 
                    </div> 
                </div>
            </div>
        </div>
        <form action="<?php echo base_url('home/applyNowAction');?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="PostId" value="<?php echo $PostId;?>">
                <input type="hidden" name="UserId" value="<?php echo $UserId;?>">
                Expected Salary: <input type="text" name="ExpectedSalary">
                <input type="submit" name="submit" value="Submit">
            </div>          
        </div>
        </form>         
    </div>    
</section>-->
<section id="team-members" class="achievement_area1 wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="apply-online">
                    <div class="row">
                        <div class="col-md-12">
                            <hr class="style-six">
                        </div>          
                    </div>
                    <br><br>
                    <form action="<?php echo base_url('home/applyNowAction');?>" method="post">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="hidden" name="PostId" value="<?php echo $PostId;?>">
                            <input type="hidden" name="UserId" value="<?php echo $UserId;?>">
                            Expected Salary&nbsp;:&nbsp; <input type="text" name="ExpectedSalary" id="ExpectedSalary">
                            <br><br>
                            <input type="submit" name="submit" value="Submit">
                        </div>          
                    </div>
                    </form>    
                </div>
            </div>
        </div>
    </div> 
</section>
<script>
$(document).ready(function(){
    $('.error').hide();

    $("#ExpectedSalary").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                        (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>