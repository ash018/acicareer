//SEARCH
$('#currentvacancy_filter').submit(function(){
    $('.error').hide();		
    var district = $("input#district").val();
    /*if (district === "") {
        $("label#district_error").show();
        $("input#district").focus();
        return false;
    }*/
    var JobLevelId = $("select#JobLevelId").val();
    /*if (JobLevelId === "") {
        $("label#JobLevelId_error").show();
        $("select#JobLevelId").focus();
        return false;
    }*/
    var URL = $('#currentvacancy_filter').attr('action');
    var dataString = $('#currentvacancy_filter').serialize(); 
    //console.log(dataString);        return false;
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
            //window.location = html.url;
            $('.job_offer_area').hide();
            $('#currentvacancy_filter_view').html(html);
            //$('#mgs_container').html(json.msg);
            //$('#currentvacancy_filter')[0].reset();            
        } 
    });
    return false;
});