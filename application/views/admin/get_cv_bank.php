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
            <div class="col-md-4">
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
            <div class="col-md-4">
                <div class="single_name">
                    <h2><?php echo $row['UserName']; ?></h2>
                    <ul>
                        <li><span>Age: <?php echo number_format($row['Age']); ?></span></li>
                        <li><span>Education: <?php if(isset($row['Education'][0]['EducationLevel'])){echo $row['Education'][0]['EducationLevel'];} ?></span></li>
                        <li><span><?php if(isset($row['Education'][0]['InstituteName'])){echo $row['Education'][0]['InstituteName'];} ?></span></li>	
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single_details" style="float: left;">
                    <h2>Contact Details</h2>
                    <ul>
                        <li><span><?php echo $row['Mobile']; ?></span></li>
                        <li><span><?php echo $row['TelNo']; ?></span></li>
                        <li><span><?php echo $row['Email']; ?></span></li>
                    </ul>
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

                    
                