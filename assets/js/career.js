$(document).ready(function(){
    $('.error').hide();
    
    $("#Nationality,#InstituteName,#CompanyName,#Designation,#Interest,#Experties,#Name,#Occupation,#Relationship").on("keydown", function (event) {
        // Allow controls such as backspace
        var arr = [8,9, 13,16, 17, 20, 32, 35, 36, 37, 38, 39, 40, 45, 46];
        // Allow letters
        for (var i = 65; i <= 90; i++) {
            arr.push(i);
        }
        // Prevent default if not in array
        if ($.inArray(event.which, arr) === -1) {
            event.preventDefault();
        }
    });
    $("#TelNo,#Mobile,#DOB,#NationalId,#ExpSalary,#Marks1,#Marks2,#Marks3,#Marks4,#dpStart,#dpEnd,#LastSalary,#Contact,#RefContact1,#RefContact2").keydown(function (e) {
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
    
    $("#personalinfo").on("click", function(){
        $("#personalinfo").removeClass("single_information");
        $("#personalinfo").addClass("single_information_active");
        $("#education").removeClass("single_information_active");
        $("#education").addClass("single_information");
        $("#training").removeClass("single_information_active");
        $("#training").addClass("single_information");
        $("#experience").removeClass("single_information_active");
        $("#experience").addClass("single_information");
        $("#personalinfo_form").show();
        $("#education_form").hide();
        $("#training_form").hide();
        $("#experience_form").hide();			
    });
    
    $("#education").on("click", function(){
        $("#personalinfo").removeClass("single_information_active");
        $("#personalinfo").addClass("single_information");
        $("#education").removeClass("single_information");
        $("#education").addClass("single_information_active");
        $("#training").removeClass("single_information_active");
        $("#training").addClass("single_information");
        $("#experience").removeClass("single_information_active");
        $("#experience").addClass("single_information");
        $("#personalinfo_form").hide();
        $("#education_form").show();
        $("#training_form").hide();
        $("#experience_form").hide();
    });
    
    $("#training").on("click", function () {
        $("#personalinfo").removeClass("single_information_active");
        $("#personalinfo").addClass("single_information");
        $("#education").removeClass("single_information_active");
        $("#education").addClass("single_information");
        $("#training").removeClass("single_information");
        $("#training").addClass("single_information_active");
        $("#experience").removeClass("single_information_active");
        $("#experience").addClass("single_information");
        $("#personalinfo_form").hide();
        $("#education_form").hide();
        $("#training_form").show();
        $("#experience_form").hide();
    });
    
    $("#experience").on("click", function () {
        $("#personalinfo").removeClass("single_information_active");
        $("#personalinfo").addClass("single_information");
        $("#education").removeClass("single_information_active");
        $("#education").addClass("single_information");
        $("#training").removeClass("single_information_active");
        $("#training").addClass("single_information");
        $("#experience").removeClass("single_information");
        $("#experience").addClass("single_information_active");
        $("#personalinfo_form").hide();
        $("#education_form").hide();
        $("#training_form").hide();
        $("#experience_form").show();
    });
});

$(function(){
    $('#personalinfo_form_id').submit(function(){
        
        $('.error').hide();		
	var UserName = $("input#UserName").val();
        if (UserName === "") {
            $("label#UserName_error").show();
            $("input#UserName").focus();
            return false;
        }		
	var FatherName = $("input#FatherName").val();
        if (FatherName === "") {
            $("label#FatherName_error").show();
            $("input#FatherName").focus();
            return false;
        }
        var MotherName = $("input#MotherName").val();
        if (MotherName === "") {
            $("label#MotherName_error").show();
            $("input#MotherName").focus();
            return false;
        }
        var Add1 = $("textarea#Add1").val();
        if (Add1 === "") {
            $("label#Add1_error").show();
            $("textarea#Add1").focus();
            return false;
        }		
	var Add2 = $("textarea#Add2").val();
        if (Add2 === "") {
            $("label#Add2_error").show();
            $("textarea#Add2").focus();
            return false;
        }
        var Nationality = $("input#Nationality").val();
        if (Nationality === "") {
            $("label#Nationality_error").show();
            $("input#Nationality").focus();
            return false;
        }
        var Gender = $("select#Gender").val();
        if (Gender === "") {
            $("label#Gender_error").show();
            $("select#Gender").focus();
            return false;
        }
        
        var Mobile = $("input#Mobile").val();
        if (Mobile === "") {
            $("label#Mobile_error").show();
            $("input#Mobile").focus();
            return false;
        }
        
        var DOB = $("input#DOB").val();
        if (DOB === "") {
            $("label#DOB_error").show();
            $("input#DOB").focus();
            return false;
        }
        var MaritalStatus = $("select#MaritalStatus").val();
        if (MaritalStatus === "") {
            $("label#MaritalStatus_error").show();
            $("select#MaritalStatus").focus();
            return false;
        }
        var BirthPlace = $("input#BirthPlace").val();
        if (BirthPlace === "") {
            $("label#BirthPlace_error").show();
            $("input#BirthPlace").focus();
            return false;
        }
        var Email = $("input#Email").val();
        if (Email == "") {
            $("label#Email_error").show();
            $("input#Email").focus();
            return false;
        }
        var txtNewPassword = $("input#txtNewPassword").val();
        var txtConfirmPassword = $("input#txtConfirmPassword").val();
     
        if (txtNewPassword === "") {
            $("label#txtNewPassword_error").show();
            $("input#txtNewPassword").focus();
            return false;
        }
        else if(txtConfirmPassword === ""){
            $("label#txtConfirmPassword_error").show();
            $("input#txtConfirmPassword").focus();
            return false;
        }else{
            if(txtNewPassword != txtConfirmPassword){
                console.log(txtNewPassword);
                console.log(txtConfirmPassword);
                $("label#txtConfirmPassword_error").show();
                $("input#txtConfirmPassword").focus();
                return false;
            }
        }        
        var URL = $('#personalinfo_form_id').attr('action');
        var dataString = $('#personalinfo_form_id').serialize();         
        //console.log(dataString);alert(dataString);return false;
        $.ajax
        ({
            type: "POST",
            url: URL,
            data: dataString,
            cache: false,
            success: function(html)
            {
                if(html.st === 0){
                 swal({
                      title: "Oops...",
                      text: "This Email is already in use. Please give another valid Email!!!!",
                      type: "error",
                      confirmButtonText: "Try Again"
                    });
                }else if(html.st === 1){
                    //return false;
                    window.location = html.url;
                    $('#personalinfo_form_id')[0].reset();

                    $("#personalinfo").removeClass("single_information_active");
                    $("#personalinfo").addClass("single_information");
                    $("#education").removeClass("single_information");
                    $("#education").addClass("single_information_active");
                    $("#training").removeClass("single_information_active");
                    $("#training").addClass("single_information");
                    $("#experience").removeClass("single_information_active");
                    $("#experience").addClass("single_information");
                    $("#personalinfo_form").hide();
                    $("#education_form").show();
                    $("#training_form").hide();
                    $("#experience_form").hide(); 
                    $('#personalinfo_form_id')[0].reset();
                }
                else{
                    //return false;
                    alert("Error occoure");
                }
                                
            } 
        });
        return false;
    });
    

    
    $('#education_form_id').submit(function(){
        $('.error').hide();		
	var InstituteName1 = $("input#InstituteName1").val();
        if (InstituteName1 === "") {
            $("label#InstituteName1_error").show();
            $("input#InstituteName1").focus();
            return false;
        }
        var PassingYear1 = $("select#PassingYear1").val();
        if (PassingYear1 === "") {
            $("label#PassingYear1_error").show();
            $("select#PassingYear1").focus();
            return false;
        }
        var EducationLevel1 = $("select#EducationLevel1").val();
        if (EducationLevel1 === "") {
            $("label#EducationLevel1_error").show();
            $("select#EducationLevel1").focus();
            return false;
        }
        var Faculty1 = $("input#Faculty1").val();
        //console.log(Faculty1.length);return false;
        if (Faculty1 === "") {
            $("label#Faculty1_error").show();
            $("input#Faculty1").focus();
            return false;
        }
        
        var Result1 = $("select#Result1").val();
        if (Result1 === "") {
            $("label#Result1_error").show();
            $("select#Result1").focus();
            return false;
        }
        
        var Marks1 = $("input#Marks1").val();
        if (Marks1 === "") {
            $("label#Marks1_error").show();
            $("input#Marks1").focus();
            return false;
        }
        
        var QualificationAttained1 = $("select#QualificationAttained1").val();
        if (QualificationAttained1 === "") {
            $("label#QualificationAttained1_error").show();
            $("select#QualificationAttained1").focus();
            return false;
        }
        
        /*var InstituteName2 = $("input#InstituteName2").val();
        if (InstituteName2 === "") {
            $("label#InstituteName2_error").show();
            $("input#InstituteName2").focus();
            return false;
        }
        var PassingYear2 = $("select#PassingYear2").val();
        if (PassingYear2 === "") {
            $("label#PassingYear2_error").show();
            $("select#PassingYear2").focus();
            return false;
        }
        var EducationLevel2 = $("select#EducationLevel2").val();
        if (EducationLevel2 === "") {
            $("label#EducationLevel2_error").show();
            $("select#EducationLevel2").focus();
            return false;
        }
        var Faculty2 = $("select#Faculty2").val();
        if (Faculty2 === "") {
            $("label#Faculty2_error").show();
            $("select#Faculty2").focus();
            return false;
        }
        var Result2 = $("input#Result2").val();
        if (Result2 === "") {
            $("label#Result2_error").show();
            $("input#Result2").focus();
            return false;
        }
        var Marks2 = $("input#Marks2").val();
        if (Marks2 === "") {
            $("label#Marks2_error").show();
            $("input#Marks2").focus();
            return false;
        }*/
       
        var URL = $('#education_form_id').attr('action');
        var dataString = $('#education_form_id').serialize(); 
        //alert(dataString);        return false;
        $.ajax
        ({
            type: "POST",
            url: URL,
            data: dataString,
            cache: false,
            success: function(html)
            {   
                //console.log(html);
                //return false;
                window.location = html.url;
                                     
                //$('#mgs_container').html(json.msg);
                $('#education_form_id')[0].reset();

            $("#personalinfo").removeClass("single_information_active");
            $("#personalinfo").addClass("single_information");
            $("#education").removeClass("single_information_active");
            $("#education").addClass("single_information");
            $("#training").removeClass("single_information");
            $("#training").addClass("single_information_active");
            $("#experience").removeClass("single_information_active");
            $("#experience").addClass("single_information");
            $("#personalinfo_form").hide();
            $("#education_form").hide();
            $("#training_form").show();
            $("#experience_form").hide();                
            } 
        });
        return false;
    });
    
    $('#training_form_id').submit(function(){
        var URL = $('#training_form_id').attr('action');
        var dataString = $('#training_form_id').serialize();                    
        $.ajax
        ({
            type: "POST",
            url: URL,
            data: dataString,
            cache: false,
            success: function(html)
            {                                
                window.location = html.url;
                console.log(html);                     
                //$('#mgs_container').html(json.msg);
                $('#training_form_id')[0].reset();

                $("#personalinfo").removeClass("single_information_active");
                $("#personalinfo").addClass("single_information");
                $("#education").removeClass("single_information_active");
                $("#education").addClass("single_information");
                $("#training").removeClass("single_information_active");
                $("#training").addClass("single_information");
                $("#experience").removeClass("single_information");
                $("#experience").addClass("single_information_active");
                $("#personalinfo_form").hide();
                $("#education_form").hide();
                $("#training_form").hide();
                $("#experience_form").show();              
            } 
        });
        return false;
    });
    
//    $('#experience_form_id').submit(function(){
//        var URL = $('#experience_form_id').attr('action');
//        var dataString = $('#experience_form_id').serialize();                    
//        $.ajax
//        ({
//            type: "POST",
//            url: URL,
//            data: dataString,
//            cache: false,
//            success: function(html)
//            {     
//                //return false;
//                window.location = html.url;
//                console.log(html);                     
//                //$('#mgs_container').html(json.msg);
//                $('#experience_form_id')[0].reset();
//
////                $("#personalinfo").removeClass("single_information");
////                $("#personalinfo").addClass("single_information_active");
////                $("#education").removeClass("single_information_active");
////                $("#education").addClass("single_information");
////                $("#training").removeClass("single_information_active");
////                $("#training").addClass("single_information");
////                $("#experience").removeClass("single_information_active");
////                $("#experience").addClass("single_information");
////                $("#personalinfo_form").show();
////                $("#education_form").hide();
////                $("#training_form").hide();
////                $("#experience_form").hide();               
//            } 
//        });
//        return false;
//    });

 });
 
// function checkPasswordMatch() {
//    var password = $("#txtNewPassword").val();
//    var confirmPassword = $("#txtConfirmPassword").val();
//
//    if (password != confirmPassword){
//        $("#divCheckPasswordMatch").show();
//        $("#divCheckPasswordMatch").html("Passwords do not match!");
//    }
//    else{
//		if(password.length !=0){
//			$("#divCheckPasswordMatch").html("Passwords match.");
//		}
//    }
//}
//$(document).ready(function () {
//   $("#txtNewPassword, #txtConfirmPassword").keyup(checkPasswordMatch);
//});

