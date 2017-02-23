<script type="text/javascript">
$(document).ready(function(){
    
    //Eticketing Ajax
    $('#ECategoryId').change(function() {                              
        $.ajax({
            type:"GET",
            url : "<?php echo base_url(); ?>admin/eticketing/loadSubCategory",
            data : "loadESubCategory="+$(this).val(),
            dataType: 'json',
            async: false,
            success : function(response) {
                 //console.log(response.length); 
                 for(i=0; i < response.length; i++){
                     $("#ESubCategory").append($("<option></option>").attr("value",response[i]['ESubCategoryId']).text(response[i]['SubCategory']))
                 }                 
            },
            error: function() {
                alert('Error occured');
            }
        });
    });
    //Eticketing Ajax  
	/*Scrool to Post new job //abu rasel*/
     $('html, body').animate({
        scrollTop: $('.etick_submit_area').offset().top-100
    }, 'slow');
});

/*
function insertjobpost(){
    <?php 
    echo SimpleValidation($IdValue='Department',$Msg='Please select department'); 
    echo SimpleValidation($IdValue='JobCategory',$Msg='Please select job category'); 
    echo TextareaValidation($IdValue='JobTitel',$Msg='Please enter job titel'); 
 
    echo NonRequiredValidation($IdValue='Vacancy'); 
    echo NonRequiredValidation($IdValue='JobDescription'); 
    echo NonRequiredValidation($IdValue='JobNature'); 
    echo NonRequiredValidation($IdValue='EducationalRequirements');
    echo NonRequiredValidation($IdValue = 'FunctionalRequirements'); 
    echo NonRequiredValidation($IdValue = 'BehavioralRequirements');
    echo NonRequiredValidation($IdValue='JobRequirements');
    echo NonRequiredValidation($IdValue='JobLevel');
    echo NonRequiredValidation($IdValue='Salary');
    echo NonRequiredValidation($IdValue='JobLocation');
    echo NonRequiredValidation($IdValue='OtherBenefits');
    echo NonRequiredValidation($IdValue='Experience');
 
    
    ?>        
    var ApplicationDeadline = $("#ApplicationDeadline").val();  
    DataString = "Department="+Department+"&JobCategory="+JobCategory+"&JobTitel="+JobTitel+"&Vacancy="+Vacancy+
        "&JobDescription="+JobDescription+"&JobNature="+JobNature+"&EducationalRequirements="+EducationalRequirements+
        "&FunctionalRequirements="+FunctionalRequirements+"&BehavioralRequirements="+BehavioralRequirements+
        "&JobRequirements="+JobRequirements+"&JobLevel="+JobLevel+"&Salary="+Salary+"&JobLocation="+JobLocation+
        "&OtherBenefits="+OtherBenefits+"&Experience="+Experience+"&ApplicationDeadline="+ApplicationDeadline;
                console.log(DataString);
        $(document).ready(function(){
            $.ajax({
                type:"POST",
                url : "<?php echo base_url(); ?>admin/postjob/docreate",
                data : DataString, 
                async: false,
                success : function(response) {
                    console.log(response);
                    if(response == 1){
                        alert('Successfully Added');
                        $('#form').trigger("reset");                   
                        return false;
                    }else{
                        alert('Something wrong.')
                    }
                    return false;                   
                },
                error: function(response) {
                    console.log(response);
                    alert('Error occured');
                }
            });
        });
        return false;
}
*/
function insertticket(){
    
    <?php 
    echo SimpleValidation($IdValue='subject',$Msg='Please enter subject'); 
    echo SimpleValidation($IdValue='ECategoryId',$Msg='Please select category'); 
    echo SimpleValidation($IdValue='ESubCategory',$Msg='Please select subcategory'); 
    echo SimpleValidation($IdValue='DepartmentId',$Msg='Please select department'); 
    echo TextareaValidation($IdValue='details',$Msg='Please enter details'); 
    ?>
    DataString = 'subject='+subject+'&ECategoryId='+ECategoryId+'&ESubCategory='+ESubCategory+'&DepartmentId='+DepartmentId+'&details='+details;
    $(document).ready(function(){
        $.ajax({
            type:"POST",
            url : "<?php echo base_url(); ?>admin/eticketing/insertEticket",
            data : DataString,
            dataType: 'json',
            async: false,
            success : function(response) {
                if(response == 1){
                    alert('Successfully send');
                    $("#subject").val('')
                    $("#ECategoryId").val('')
                    $("#ESubCategory").val('')
                    $("#DepartmentId").val('')
                    $("#details").val('')                    
                    return false;
                }else{
                    alert('Something wrong.')
                }
                return false;                   
            },
            error: function() {
                alert('Error occured');
            }
        });
    });
    return false;    
}

 

</script>