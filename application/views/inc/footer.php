	<!--<div id="mySidenav" class="sidenav mobile_menu">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<ul>
			<li>
				<a  class="dropdown-toggle" data-toggle="dropdown" href="#">ACI Resources<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Learning & Development</a></li>
					<li><a href="#">Career Development</a></li>
					<li><a href="#">How ACI is Different</a></li>
					<li><a href="<?php echo base_url('home/aciresource'); ?>">Resource</a></li>	
				</ul>
			</li>
			<li>
				<a href="#">Future Employer</a>
			</li>
			<li>
				<a href="#">Internship</a>
			</li>
			<li>
				<a href="#">Notice Board</a>
			</li>
			<li>
				<a href="#">Contact</a>
			</li>
		</ul>
	</div>-->
	<!--
	<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "300px";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
	</script>-->
	<footer id="footer" class="footer_area wow bounceIn">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-offset-1">
					<a href="header.php"></a>
					<div class="footer-title">
						<p>&copy; <?php echo date('Y');?> ACI Ltd. All rights reserved</p>
					</div>
				</div>

				<div class="col-md-5 col-md-offset-1">
					<div class="footer-widget">
					   <ul>                
							<!--<li><a href="<?php echo base_url(); ?>login/privacy_policy">Privacy policy</a></li>-->
							<li><a href="<?php echo base_url(); ?>login/site_map">Sitemap</a></li>
							<li><a href="<?php echo base_url(); ?>contact">Contact us</a></li>  
							<li><a href="https://www.facebook.com/acibdhr/" target="_blank"><img src="<?php echo base_url();?>assets/img/facebook-128.png" width="20" height="20"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer> <!-- End footer -->

	</div>


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

<script type="text/javascript" src="<?php echo base_url();?>assets/sweetalert/dist/sweetalert-dev.js"></script>
<!-- jQuery main script -->
<script src="<?php echo base_url();?>assets/js/main.js"></script>

<?php if(isset($page) && $page == 'internship'):?>
    <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/intern.js"></script>	
<?php endif;?>
<?php if(isset($page) && $page == 'currentvacancy'):?>
    <script src="<?php echo base_url();?>assets/js/currentvacancy.js"></script>	
<?php endif;?>

<script>
//    $('#CurrentlyWorking1').click(function(){
//         $('#dpEnd').hide();
//        
//    });
        $('#dpStart').datepicker ().on ('changeDate', function (e) {
          $('#dpEnd').datepicker ('setStartDate', e.date);
        });
        $('#dpEnd').datepicker ().on ('changeDate', function (e) {
          $('#dpStart').datepicker ('setEndDate', e.date)
        });
        
		<?php for($i = 1; $i <= 20; $i++){?>
            $('#dpStart<?php echo $i;?>').datepicker ().on ('changeDate', function (e) {
              $('#dpEnd<?php echo $i;?>').datepicker ('setStartDate', e.date);
            });
            $('#dpEnd<?php echo $i;?>').datepicker ().on ('changeDate', function (e) {
              $('#dpStart<?php echo $i;?>').datepicker ('setEndDate', e.date)
            });
        <?php }?>
</script>


<?php if(isset($page) && $page == 'Search'):?>
<script>
    $(document).ready(function(){
        $("#QuickFilters").click(function(){
            $("#QuickFilters").addClass('single_quick_filter_active');
            $("#QuickFilters").removeClass('single_quick_filter');
            $("#Academic").addClass('single_quick_filter');
            $("#Academic").removeClass('single_quick_filter_active');
            $("#Experience").addClass('single_quick_filter');
            $("#Experience").removeClass('single_quick_filter_active');
            $("#QuickFilters_form").show();
            $("#Academic_form").hide();
            $("#Experience_form").hide();
        });
        $("#Academic").click(function(){
            $("#QuickFilters").addClass('single_quick_filter');
            $("#QuickFilters").removeClass('single_quick_filter_active');
            $("#Academic").addClass('single_quick_filter_active');
            $("#Academic").removeClass('single_quick_filter');
            $("#Experience").addClass('single_quick_filter');
            $("#Experience").removeClass('single_quick_filter_active');
            $("#QuickFilters_form").hide();
            $("#Academic_form").show();
            $("#Experience_form").hide();
        });
        $("#Experience").click(function () {
            $("#QuickFilters").addClass('single_quick_filter');
            $("#QuickFilters").removeClass('single_quick_filter_active');
            $("#Academic").addClass('single_quick_filter');
            $("#Academic").removeClass('single_quick_filter_active');
            $("#Experience").addClass('single_quick_filter_active');
            $("#Experience").removeClass('single_quick_filter');
            $("#QuickFilters_form").hide();
            $("#Academic_form").hide();
            $("#Experience_form").show();
        });
    });
</script>
<?php endif;?>
<?php if(isset($page) && $page == 'career'):?>
<script type="text/javascript">
    //$countex = 2;
    $countex = $('.experenceCounter').length;

$(function(){        
    $('#addButton').click(function(){
        var con = $('.experenceCounter').length + 1;        
        console.log(con);
        $category = $("\
        <div class='paddingtop20'></div>\n\
        <div class='one_colamn_title'>\n\
            <h2 class='experenceCounter'>EXPERIENCE-"+con+"</h2>\n\
        </div>\n\
        <div class='row'>\n\
            <div class='col-md-8'>\n\
                            <div class='one_colamn_topics'>\n\
                                <input type='text' autocomplete='off' name='CompanyName[]' id='CompanyName' value='' placeholder='Company Name *' />\n\
                                <input type='hidden' id='page' name='page' value='page_experience_info' />\n\
                              </div>\n\
                        </div>\n\
                        <div class='col-md-4'>\n\
                            <div class='one_colamn_topics'>\n\
                                <input type='text' autocomplete='off' name='Designation[]' id='Designation' value='' placeholder='Position Held *' />\n\
                            </div>\n\
                        </div>\n\
        </div>\n\
        <div class='row'>\n\
            <div class='col-md-12'>\n\
                <div class='one_colamn_topics'>\n\
                    <input autocomplete='off' name='EmpAddress[]' type='text' placeholder='Address of Employer *' />\n\
                </div>\n\
            </div>\n\
        </div>\n\
        <div class=\"row\">\n\
            <div class=\"col-md-12\"><p>&nbsp;</p></div>\n\
        </div>\n\
        <div class='row'>\n\
            <div class='col-sm-6 '>\n\
                <div id='dpStartAM"+con+"' class=\"input-group date\">\n\
                    <input autocomplete='off' class='form-control' type='text' name='StartDate[]' placeholder='Starting Date' value=''>\n\
                    <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"></i></span>\n\
                </div>\n\
            </div>\n\
            <div class='col-sm-6'>\n\
                <div id='dpEndAM"+con+"' class=\"input-group date\">\n\
                    <input autocomplete='off' class=\"form-control\" type=\"text\" name=\"EndDate[]\" placeholder=\"End Date\">\n\
                    <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"></i></span>\n\
                </div>\n\
            </div>\n\
        </div>\n\
        <div class='row'>\n\
            <div class=\"col-md-6\">\n\
                <div class=\"one_colamn_topics\">\n\
                </div>\n\
            </div>\n\
            <div class=\"col-md-6\">\n\
                <div class=\"one_colamn_topics\">\n\
                    <div class=\"checkbox\">\n\
                        <label style=\"color:gray;\">\n\
                        <input type='hidden' name='CurrentlyWorking[]' id='CurrentlyWorking' value=''/>\n\
                    </div>\n\
                </div>\n\
            </div>\n\
        </div>\n\
        <div class=\"row\">\n\
            <div class=\"col-md-4\">\n\
                <div class=\"one_colamn_topics\">\n\
                    <input type='hidden' name='LastSalary[]' id='LastSalary' value='0' placeholder='' />\n\
                </div>\n\
            </div>\n\
            <div class=\"col-md-8\">\n\
                <div class=\"one_colamn_topics\">\n\
                    <input type='hidden' name='LeaveReason[]' id='LeaveReason' value='' placeholder='' />\n\
                </div>\n\
            </div>\n\
        </div>\n\
                </div>\n\
                </div>\n\
        </div>\n\
        <div class='row'>\n\
            <div class='col-md-12'>\n\
                <div class='one_colamn'>\n\
                    <textarea id='editor"+con+"' autocomplete='off' name='Responsibility[]' id='' cols='30' rows='10' placeholder='Duties / Responsibilities*'></textarea>\n\
                </div>\n\
            </div>\n\
        </div>");
                    
        $('#category_div').append($category); 
        //
        initSample(con);   
        //
        $('#dpStartAM'+con).datepicker ().on ('changeDate', function (e) {
          $('#dpEndAM'+con).datepicker ('setStartDate', e.date);
        });
        $('#dpEndAM'+con).datepicker ().on ('changeDate', function (e) {
          $('#dpStartAM'+con).datepicker ('setEndDate', e.date)
        });
        $countex++; 
        return false;
    });

        
    $("#removeButton").click(function () {
        if($countex==1){
            alert("No more textbox to remove");
            return false;
        }   
        $countex--;
        console.log($("#TextBoxDiv" + $countex));
        $("#TextBoxDiv" + $countex).remove();
        $("#TextBoxDiv" + $countex).hide();
        $("#Actions_product"+$countex).remove();
    });	

});

/* ******* addEducationButton ****/
$count = 5;
$(function(){        
    $('#addEducationButton').click(function(){ 
    console.log($(this));
    $category = $("\
<div class='paddingtop20'></div>\n\
<div class='one_colamn_title'>\n\
    <h2>educational qualification -"+$count+"</h2>\n\
</div>\n\
<div class='row'>\n\
    <div class='col-md-8'>\n\
        <div class='one_colamn_school'>\n\
            <input autocomplete=\"off\" type=\"text\" id=\"InstituteName\" name=\"InstituteName[]\" placeholder=\"Institute Name * \" />\n\
        </div>\n\
    </div>\n\
    <div class='col-md-4'>\n\
        <div class='one_colamn_year'>\n\
            <select name=\"PassingYear[]\" id=\"PassingYear\">\n\
                <option value=''>Year of Passing *</option><?php for($i=date('Y'); $i >= 1970; $i--){?>\n\
                <option value=\"<?php echo $i;?>\"><?php echo $i;?></option><?php } ?>\n\
            </select>\n\
        </div>\n\
    </div>\n\
</div>\n\
<div class=row'>\n\
                <div class='col-md-12'>\n\
                    <div class='one_colamn_topics'>\n\
                        <div class='checkbox'>\n\
                            <label style='color:gray;'><input type='checkbox' autocomplete=\"off\" name='isForeignInstitute[]' value=\"<?php echo isset($rdata['isForeignInstitute']) ? $rdata['isForeignInstitute'] : ''; ?>\">\n\
                            Foreign Institute</label>\n\
                        </div>\n\
                    </div>\n\
                </div>\n\
            </div>\n\
<div class='row'>\n\
    <div class='col-md-6'>\n\
        <div class='one_colamn_school'>\n\
            <select name=\"EducationLevel[]\">\n\
                <option value=''>Area of Study *</option>\n\
                <?php select_option('LEducationLevel', 'Id','EducationLevel'); ?>\n\
            </select>\n\
        </div>\n\
    </div>\n\
    <div class='col-md-6'>\n\
        <div class='one_colamn_year'>\n\
            <input type=\"text\" autocomplete=\"off\" name=\"Faculty[]\" placeholder=\"Major/Concentration *\"   />\n\
        </div>\n\
    </div>\n\
</div>\n\
<div class='row'>\n\
    <div class='col-md-4'>\n\
        <div class='one_colamn_year'>\n\
            <select name=\"Result[]\">\n\
                <option value=''>Select Result</option>\n\
                <?php select_option('LResult', 'Id','ResultName'); ?>\n\
            </select>\n\
        </div>\n\
    </div>\n\
    <div class='col-md-4'>\n\
        <div class='one_colamn_school'>\n\
            <input autocomplete=\"off\" type=\"text\" id=\"Marks\" name=\"Marks[]\" placeholder=\"Mark(%) /CGPA/GPA\" />\n\
        </div>\n\
    </div>\n\
	<div class='col-md-4'>\n\
        <div class='one_colamn_school'>\n\
            <select name=\"QualificationAttained[]\">\n\
				<option value=''>out of</option>\n\
				<option value=\"Division\">Division/Class</option>\n\
				<option value=\"5\">5.00</option>\n\
				<option value=\"4\">4.00</option>\n\
			</select>\n\
        </div>\n\
    </div>\n\
</div>\n\
");	
       
    $('#education_div').append($category);              
        $count++; 
        return false;
    });
            
    $("#removeButton").click(function () {
        if($count==1){
            alert("No more textbox to remove");
            return false;
        }   
        $count--;
        console.log($("#TextBoxDiv" + $count));
        $("#TextBoxDiv" + $count).remove();
        $("#TextBoxDiv" + $count).hide();
        $("#Actions_product"+$count).remove();
    });	
    
});
/*****************************************/
 
//        $(function(){
//            $('.datepickerDOB').datepicker({
//                format: 'mm-dd-yyyy',
//                endDate: '-144m',
//                autoclose: true
//            });
//        });

		
        $(function(){
            $('#contact_form').submit(function(){                
              $("#loading_img").show();
              $("#send_button").hide();

                $.post($('#contact_form').attr('action'), $('#contact_form').serialize(), function(json){
                    if ( json.st == 1 ){
                        //$('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('#mgs_container').html(json.msg);
                        $('#contact_form')[0].reset();

                        $("#loading_img").hide();
                        //$("#send_button").show();
                    }
                },'json');
                return false;
            });
        });
</script>
<script>
 $(document).ready(function() {
    var date = new Date();
    date.setDate(date.getDate()-4320);
    $('#DOB')
        .datepicker({
            autoclose: true,
            format: 'mm/dd/yyyy',
            endDate: date
        });
    });
</script>
<script type="text/javascript">
    $(function () {        
        $('#dpStart21').datepicker ().on ('changeDate', function (e) {
          $('#dpEnd21').datepicker ('setStartDate', e.date);
        });
        $('#dpEnd21').datepicker ().on ('changeDate', function (e) {
          $('#dpStart21').datepicker ('setEndDate', e.date)
        });
    });
</script>
<?php endif;?>
<?php if(isset($page) && $page == 'Search'):?>
<script src="<?php echo base_url();?>assets/js/jquery.barfiller.js"></script>
<script>
$('#bar1,#bar2').barfiller();
$(document).ready(function(){
        $("#QuickFilters").click(function(){
                $("#QuickFilters").addClass('single_quick_filter_active');
                $("#QuickFilters").removeClass('single_quick_filter');
                $("#Academic").addClass('single_quick_filter');
                $("#Academic").removeClass('single_quick_filter_active');
                $("#Experience").addClass('single_quick_filter');
                $("#Experience").removeClass('single_quick_filter_active');
                $("#QuickFilters_form").show();
                $("#Academic_form").hide();
                $("#Experience_form").hide();
        });
        $("#Academic").click(function(){
                $("#QuickFilters").addClass('single_quick_filter');
                $("#QuickFilters").removeClass('single_quick_filter_active');
                $("#Academic").addClass('single_quick_filter_active');
                $("#Academic").removeClass('single_quick_filter');
                $("#Experience").addClass('single_quick_filter');
                $("#Experience").removeClass('single_quick_filter_active');
                $("#QuickFilters_form").hide();
                $("#Academic_form").show();
                $("#Experience_form").hide();
        });
        $("#Experience").click(function(){
                $("#QuickFilters").addClass('single_quick_filter');
                $("#QuickFilters").removeClass('single_quick_filter_active');
                $("#Academic").addClass('single_quick_filter');
                $("#Academic").removeClass('single_quick_filter_active');
                $("#Experience").addClass('single_quick_filter_active');
                $("#Experience").removeClass('single_quick_filter');
                $("#QuickFilters_form").hide();
                $("#Academic_form").hide();
                $("#Experience_form").show();
        });
});
</script>
<?php endif;?>
<script type="text/javascript">
    $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</body>
</html>