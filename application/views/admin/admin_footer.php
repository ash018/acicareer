<div id="mySidenav" class="sidenav mobile_menu">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Brands</a>
    <a href="#">CSR</a>
    <a href="#">Career</a>
    <a href="#">Mission</a>
    <a href="#">Contact</a>
</div>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<footer id="footer" class="footer_area wow bounceIn">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="footer-title">
                    <p>&copy; <?php echo date('Y');?> ACI Bangladesh. All rights reserved</p>
                </div>
            </div>                       

            <div class="col-md-5 col-md-offset-1">
                <div class="footer-widget">
                    <ul>                
                        <li><a href="<?php echo base_url(); ?>admin/adminLogin/privacy_policy">Privacy policy</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/adminLogin/site_map">Sitemap</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/adminLogin/contact_us">Contact us</a></li>                           
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer> <!-- End footer -->

<!-- jQuery form CDN -->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<!-- Bootstrap form CDN -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src='<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js'></script>
<!-- jQuery Counterup -->
<script src="<?php echo base_url();?>assets/js/waypoints.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.counterup.min.js"></script>

<!-- jQuery sticky -->
<script src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script>

<!-- jQuery scrolly -->
<script src="<?php echo base_url();?>assets/js/jquery.scrolly.js"></script>


<!-- jQuery owl carousel -->
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>


<!-- WOW Animation -->
<script src="<?php echo base_url();?>assets/js/wow.min.js"></script>

<!-- jQuery main script -->
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<?php if(isset($page) && $page == 'career'):?>
<script src="<?php echo base_url();?>assets/js/career.js"></script>
<?php endif;?>
<?php if(isset($page) && $page == 'postjob'):?>
<script>
 $(document).ready(function() {
    var date = new Date();
    date.setDate(date.getDate()-1);
    $('#ApplicationDeadline')
        .datepicker({
            autoclose: true,
            format: 'mm/dd/yyyy',
            startDate: date
        });
    });
</script>
<?php endif;?>
<?php if(isset($page) && $page == 'joblist'):?>
<script>
$(document).ready(function()
{
        vpb_pagination_system('1')
        
});
//This is the Pagination Function
function vpb_pagination_system(page_id)
{	
    var dataString = "page=" + page_id;
    $.ajax({  
        type: "POST",  
        url: "<?php echo base_url();?>admin/postjob/content_displayer",  
        data: dataString,
        beforeSend: function() 
        {
            $('#vpb_pagination_system_displayer').html('<br clear="all"><div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait <img src="<?php echo base_url();?>assets/img/loadings.gif" align="absmiddle" /></div><br clear="all">');
        },  
        success: function(response)
        {
            $("#vpb_pagination_system_displayer").fadeIn(2000).html(response);
        }
    });
}
</script>
<?php endif;?>
<?php if(isset($page) && $page == 'jobWiseCVSummary'):?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.table2excel.js"></script>
<script type="text/javascript">
    $('#btn').click(function(){
        $('.table').table2excel({
            exclude: ".noExl",
            name: "CVsummary",
            filename: "jobwise_cvsummary"
        });
    });
</script>
<script>
function myFunction() {
    //document.getElementById("demo").innerHTML = "Hello World";
    $('.table').table2excel({
            exclude: ".noExl",
            name: "CVsummary",
            filename: "jobwise_cvsummary"
        });

}
</script>
<?php endif;?>
<?php if(isset($page) && $page == 'Cvbank'):?>
<script>
$(document).ready(function()
{
        vpb_pagination_system('1')
        
});
//This is the Pagination Function
function vpb_pagination_system(page_id)
{	
    var dataString = "page=" + page_id;
    $.ajax({  
        type: "POST",  
        url: "<?php echo base_url();?>admin/cvbank/content_displayer",  
        data: dataString,
        beforeSend: function() 
        {
            $('#vpb_pagination_system_displayer').html('<br clear="all"><div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait <img src="<?php echo base_url();?>assets/img/loadings.gif" align="absmiddle" /></div><br clear="all">');
        },  
        success: function(response)
        {
            $("#vpb_pagination_system_displayer").fadeIn(2000).html(response);
        }
    });
}
</script>
<?php endif;?>
<?php if(isset($page) && $page == 'NoticeBoard' || $page == 'postjob'):?>
<script>
    initSample('1');
//    initSample1();
</script>
<?php endif;?>
<?php if(isset($page) && $page == 'postjob'):?>
<script>
        initSample('2');
        initSample('3');
        initSample('4');
        initSample('5');
        initSample('6');
        //initSample('7');
</script>
<?php endif;?>

