$(function () {
    var date = new Date();
    date.setDate(date.getDate() - 1);
    $('#FromMonth').datepicker({
        startDate: date,
        autoclose: true,
    });
});




$("#PassingYear1").change(function () {
    var PassingYear1 = $("#PassingYear1").val();
    var rec = $("#ToMonth");
    var recF = $("#FromMonth").val();

    var startDate = new Date(recF);
    var endDateMoment = moment(startDate);
    if(isNaN(endDateMoment)){
        rec.val();
    }else{
        //$("#ToMonth").val(endDateMoment.add(PassingYear1, 'months').toString().substring(0, 15));
        var d = endDateMoment.add(PassingYear1, 'months').format("MM/DD/YYYY");
            //console.log("d  "+d.toString());
       rec.val(d.toString());
    }

}).change();


$("#FromMonth").change(function () {
    var PassingYear1 = $("#PassingYear1").val();
    var rec = $("#ToMonth");
    var recF = $("#FromMonth").val();

    var startDate = new Date(recF);
    var endDateMoment = moment(startDate);
    if(isNaN(endDateMoment)){
        rec.val();
    }else{
       var d = endDateMoment.add(PassingYear1, 'months').format("MM/DD/YYYY");
            //console.log("d  "+d.toString());
       rec.val(d.toString());
    } 
    

}).change();


$(document).ready(function(){
    /*$("#UserName,#FatherName,#MotherName,#InstituteName").on("keydown", function (event) {
        console.log(event);
        var arr = [8,9, 13,16, 17, 20, 32, 35, 36, 37, 38, 39, 40, 45, 46,110];
        // Allow letters
        for (var i = 65; i <= 90; i++) {
            arr.push(i);
        }
        // Prevent default if not in array
        if ($.inArray(event.which, arr) === -1) {
            event.preventDefault();
        }
    });
    */
    $("#contactnumber,#Marks").keydown(function (e) {
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

$(function(){
    $('#internship_form').submit(function(){
        
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
        var Email = $("input#Email").val();
        if (Email == "") {
            $("label#Email_error").show();
            $("input#Email").focus();
            return false;
        }
        var InstituteName = $("input#InstituteName").val();
        if (InstituteName === "") {
            $("label#InstituteName_error").show();
            $("input#InstituteName").focus();
            return false;
        }
//        var PassingYear = $("select#PassingYear").val();
//        if (PassingYear === "") {
//            $("label#PassingYear_error").show();
//            $("select#PassingYear").focus();
//            return false;
//        }
        var EducationLevel = $("select#EducationLevel").val();
        if (EducationLevel === "") {
            $("label#EducationLevel_error").show();
            $("select#EducationLevel").focus();
            return false;
        }        
        var MajorConcentration = $("input#MajorConcentration").val();
        if (MajorConcentration === "") {
            $("label#MajorConcentration_error").show();
            $("input#MajorConcentration").focus();
            return false;
        }
        var FromMonth = $("input#FromMonth").val();
        if (FromMonth === "") {
            $("label#FromMonth_error").show();
            $("input#FromMonth").focus();
            return false;
        }        
        var ToMonth = $("input#ToMonth").val();
        if (ToMonth === "") {
            $("label#ToMonth_error").show();
            $("input#ToMonth").focus();
            return false;
        }
        var AvailableMonthFor = $("select#AvailableMonthFor").val();
        if (AvailableMonthFor === "") {
            $("label#AvailableMonthFor_error").show();
            $("select#AvailableMonthFor").focus();
            return false;
        }  
        $.post($('#internship_form').attr('action'), $('#internship_form').serialize(), function(json){
                if ( json.st == 0 ){
                    $('#internship_mesg').html(json.msg);
                    $('html, body').animate({
                        scrollTop: $("#internship_mesg").offset().top
                    }, 1000);
                } else {
                  //alert(json.msg);
                  //window.location = json.url;
                    //$('#msg-container').html(json.msg);
                    //$('#internship_mesg').hide();
                    $("#internship_mesg").show();
                    swal("Congratulations!", json.msg, "success");
                    $('#internship_form')[0].reset();
                    window.location = json.url;                
                }
            },'json');
            return false;
    });
        
//        var URL = $('#internship_form').attr('action');
//        var dataString = $('#internship_form').serialize();         
        //console.log(dataString);alert(dataString);return false;
        /*$.ajax
        ({
            type: "POST",
            url: URL,
            data: dataString,
            cache: false,
            success: function(html)
            {
                alert(html.st);
                console.log(html.st); 
                console.log(html.msg);return false;
                if(html.st === 0){
                 swal({
                      title: "Oops...",
                      text: "This CV not submitted!!!!",
                      type: "error",
                      confirmButtonText: "Try Again"
                    });
                }else if(html.st === 1){
                    //return false;
                    //window.location = html.url;
                    $('#internship_form')[0].reset();
                    $("#internship_mesg").show();
                    swal("Congratulations!", html.msg, "success");
                }
                else{
                    alert("Error occoure");
                }
                                
            } 
        });
        return false;*/
});