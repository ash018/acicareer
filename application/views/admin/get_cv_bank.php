<!--<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr>
            <th class="head1">SL</th>
            <th class="head1">Name</th>
            <th class="head0">Address</th>
            <th class="head0">Gendar</th>
            <th class="head0">DOB</th> 
        </tr>
    </thead>
    <tbody>
        <?php 
        $i = $vpb_start_page+1;
        if (!empty($rows)) foreach ($rows as $cvb): ?>
                <tr id="tr_<?php echo $cvb['Id']; ?>">                   
                    <td><?php echo $i; ?></td>
                    <td><?php echo $cvb['UserName']; ?></td>
                    <td><?php echo $cvb['Add1']; ?></td>
                    <td><?php echo $cvb['Gender']; ?></td>
                    <td><?php echo explode(' ',$cvb['DOB'])[0]; ?></td>
                    <td><a class="btn btn-success btn-xs" href="<?php echo base_url('admin/postjob/editjob').'/'.$job['PostId']; ?>">Edit</a></td>
                </tr>
        <?php $i++;
        endforeach; ?>
    </tbody>
</table>-->
<?php
$i = $vpb_start_page+1;
if (!empty($rows)) foreach ($rows as $row): 
//print_r($row);
?>
<div class="contact_dita" style="height: 100%;" >
        <div class="row">
            <div class="col-md-2">
               <div class="single_img wow pulse">
                    <?php 
                    if(empty($row['Thumb'])){	
                        $img_url = base_url().'assets/img/HR---Dashboard_02.png';                                                                                                  
                        }else{
                            $img_url = base_url().'assets/image/upload/thumbnail/'.$row['Thumb'];                                                     
                        }
                    ?>
                    <img src="<?php echo $img_url;?>" width="80px" height="60px" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="single_name">
                    <h2><?php echo $row['UserName']; ?></h2>
                    <ul>
                        <li><span>Age: <?php echo number_format($row['Age']); ?></span></li>
                        <li><span>Education: <?php if(isset($row['Education'][0]['EducationLevel'])){echo $row['Education'][0]['EducationLevel'];} ?></span></li>
                        <li><span><?php if(isset($row['Education'][0]['InstituteName'])){echo $row['Education'][0]['InstituteName'];} ?></span></li>	
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="single_details" style="float: left;">
                    <h2>Contact Details</h2>
                    <ul>
						<li>
							<?php
								$sl = '';
								switch ($row['ShortList']) {
								   case 1:
									   $sl = 'ShortListed'; 
										break;
									case 2:
									   $sl = 'Deleted'; 
									break;
									case 3:
									   $sl = 'Viewed'; 
									break;
									case 4:
									   $sl = 'Recommended'; 
									break;
								}
							?>
							<span id="ShortListedName<?php echo $row['UserId'];?>"><?php echo $sl;?></span>
						</li>
					    <li>													  
							<select name="Recommendation" id="Business<?php echo $row['UserId']; ?>">
							<option value="">Select</option>   
							<?php select_option_business('Business','Business','BusinessName');?>                                      
							</select>
						</li>
                        <li><span><?php echo $row['Mobile']; ?></span></li>
                        <li><span><?php echo $row['Email']; ?></span></li>
                    </ul>
                </div>
            </div>
			<div class="col-md-4">
				<div class="single_icon" id="message_approve_shortlist<?php echo $row['PostId'];?><?php echo $row['UserId'];?>">                                       
					<?php if($row['ShortList']==1){$cd1 = 'check_done';}else{$cd1 = '';}?>
						<a href="javascript:;" onclick="approve_shortlist('<?php echo $row['UserId'];?>','<?php echo $row['PostId'];?>','1')"><i  id="check_done1<?php echo $row['UserId'].$row['PostId'];?>" class="fa fa-check <?php echo $cd1;?>"></i></a>
					<?php if($row['ShortList']==2){$cd2 = 'check_done';}else{$cd2 = '';}?>
						<a href="javascript:;" onclick="approve_shortlist('<?php echo $row['UserId'];?>','<?php echo $row['PostId'];?>','2')"><i id="check_done2<?php echo $row['UserId'].$row['PostId'];?>" class="fa fa-times <?php echo $cd2;?>"></i></a>                               
						<a href="javascript:;" onclick="cv_view('<?php echo $row['UserId'];?>','<?php echo $row['PostId'];?>','1')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<a href="javascript:;" onclick="approve_recommendation('<?php echo $row['UserId'];?>','<?php echo $row['PostId'];?>','1')"><i class="fa fa-thumbs-o-up"></i></a>
				</div>
			</div>
        </div>
    </div>
<?php 
    $i++;
    endforeach; 
?>


<br clear="all" />
<div style="" align="left"><?php echo $vpb_pagination_system; ?></div><!-- This is the pagination buttons -->
<br clear="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/sweetalert/dist/sweetalert-dev.js"></script>
<script>
	function cv_view(UserId,PostId,ViewList) {
		 var dataString = "PostId=" + PostId +
				"&UserId=" + UserId +
				"&ViewList=" + ViewList +
				"&action=view";
				console.log(dataString);//return false;
				jQuery.ajax({  
					type: "POST",  
					url: "<?php echo base_url();?>admin/search/cv_view",  
					data: dataString,
					beforeSend: function() 
					{
						jQuery("#display_approve_loading"+PostId+UserId).show();
						jQuery("#display_approve_loading"+PostId+UserId).html('<img src="<?php echo base_url();?>assets/images/loading.gif" align="absmiddle" alt="Loading..."> Receiving...');
					},  
					success: function(html)
					{
//                            window.location = html.url;
						window.open(html.url,'_blank');
					}
				}); 
	}
	function approve_shortlist(UserId,PostId,ShortList){        
		if(UserId == "" && PostId == ""){alert("Please write Return quantity.");return false;}
	
			if(PostId != "")
			{
				var shli;
				switch(parseInt(ShortList)) {
					case 1:
						shli = "ShortListed";
						break;
					case 2:
						shli = "Deleted";
						break;
					case 3:
						shli = "Viewed";
						break;
					case 4:
						shli = "Recommended";
						break;
				}
				console.log(ShortList); console.log(shli);
				var dataString = "PostId=" + PostId +
				"&UserId=" + UserId +
				"&ShortList=" + ShortList +
				"&action=approve";
				console.log(dataString);//return false;
				jQuery.ajax({  
					type: "POST",  
					url: "<?php echo base_url();?>admin/search/approveShortList",  
					data: dataString,
					beforeSend: function() 
					{
						jQuery("#display_approve_loading"+PostId+UserId).show();
						jQuery("#display_approve_loading"+PostId+UserId).html('<img src="<?php echo base_url();?>assets/images/loading.gif" align="absmiddle" alt="Loading..."> Receiving...');
					},  
					success: function(html)
					{
						jQuery("#display_approve_loading"+PostId+UserId).hide();
						//jQuery("#message_approve_shortlist"+PostId+UserId).hide();                 
						var TShortList = jQuery("#TShortList").text();
						console.log(TShortList);
						var tsl = parseInt(TShortList)+1;
						console.log(tsl);
						jQuery("#TShortList").text(tsl);                            
						if(html.st === 0){
							swal({
								title: "Oops...",
								text: "This CV is already in "+ html.msg +". Please choose another CV!!!!",
								type: "error",
								confirmButtonText: "Try Again"
							});
						}
						if(html.st === 1){
							swal({
								title: "Success",
								text: html.msg,
								type: "success",
								confirmButtonText: "OK"
							});
						}
						$("#check_done1"+UserId+PostId).removeClass("check_done");
						$("#check_done2"+UserId+PostId).removeClass("check_done");
						$("#check_done"+ShortList+UserId+PostId).addClass("check_done");
						$("#ShortListedName"+UserId).html(shli);
					}
				}); 
			}
			else 
			{
				alert("Sorry, we could not verify the identity of the post you have just clicked. Please try again or contact the site admin if this problem persist. Thanks...");
			}
	}
</script>
        
<script>
	function approve_recommendation(UserId,PostId,Recommendation){ 
		var Business = jQuery("#Business"+UserId).val();
		//console.log(Business);return false;
		if(UserId == "" && PostId == ""){alert("Please write Return quantity.");return false;}
		if(PostId != "")
		{
			var dataString = "PostId=" + PostId +
			"&UserId=" + UserId +
			"&Recommendation=" + Recommendation +
			"&Business=" + Business +
			"&action=approve";
			console.log(dataString);//return false;
			jQuery.ajax({  
				type: "POST",  
				url: "<?php echo base_url();?>admin/search/approveRecommendation",  
				data: dataString,
				beforeSend: function() 
				{
					jQuery("#display_approve_loading"+PostId+UserId).show();
					jQuery("#display_approve_loading"+PostId+UserId).html('<img src="<?php echo base_url();?>assets/images/loading.gif" align="absmiddle" alt="Loading..."> Receiving...');
				},  
				success: function(html)
				{
					jQuery("#display_approve_loading"+PostId+UserId).hide();
					//jQuery("#message_approve_shortlist"+PostId+UserId).hide();
					if(html.st === 1){
						swal({
							title: "Success",
							text: html.msg,
							type: "success",
							confirmButtonText: "OK"
						});
					}
				}
			}); 
		}
		else 
		{
			alert("Sorry, we could not verify the identity of the post you have just clicked. Please try again or contact the site admin if this problem persist. Thanks...");
		}
	}
</script>

                    
                