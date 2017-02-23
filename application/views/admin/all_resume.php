<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                 <?php echo $adminmenubar; ?>
            </div>
            <div class="col-md-7">  
                <?php include('top_menu.php');?>   
                <br>
             
                <div style="text-align: center;">
                    <?php //echo $ExpectedSalary;?>
                <form  method="post" action="<?php echo base_url();?>admin/resume/cvsummary" class="form-horizontal" role="form">
                    <div class="form-group">
                        <input type="checkbox" name="UserName" value="UserName" <?php if($UserName == 'UserName'){ echo 'checked="checked"';}?>>&nbsp;Name                        
                        <input type="checkbox" name="Gender" value="Gender" <?php if($Gender == 'Gender'){ echo 'checked="checked"';}?>>&nbsp;Gender
                        <input type="checkbox" name="JobTitel" value="JobTitel" <?php if($JobTitel == 'JobTitel'){ echo 'checked="checked"';}?>>&nbsp;Job Title
                        <input type="checkbox" name="ExpectedSalary" value="ExpectedSalary" <?php if($ExpectedSalary == 'ExpectedSalary'){ echo 'checked="checked"';}?>>&nbsp;Expected Salary
                        <input type="checkbox" name="Mobile" value="Mobile" <?php if($Mobile == 'Mobile'){ echo 'checked="checked"';}?>>&nbsp;Mobile
                        <input type="checkbox" name="Email" value="Email" <?php if($Email == 'Email'){ echo 'checked="checked"';}?>>&nbsp;Email
                        <div class="form-group" style="text-align: right; padding-right: 30px;">
                            <button type="submit" name="submit" value="Go" class="btn btn-primary">Go</button>
                            <button type="submit" name="submit" value="ExportExcel" class="btn btn-success">Export Excel</button>
                        </div>
                    </div>
                </form>
                </div>
                <?php
                     if(!empty($AllResume)){
                     $index = array_keys($AllResume[0]);  
                     $indexcount = count($index);
                ?>
                <table class="table table-bordered responsive">
                    <thead>               
                        <tr>
                            <?php
                            $con = 0;
                                foreach($index as $row){ 
                                    switch ($row) {
                                        case "JobTitel":
                                        $row = "Job Title";
                                        break;
                                        case "ExpectedSalary":
                                        $row = "Expected Salary";
                                        break; 
                                        case "UserId":
                                        $row = "Detail";
                                        break; 
                                        case "Id":
                                        $row = "Action";
                                        break; 
                                    }
                            $con++; 
                            if($con == $indexcount){
                                break;
                            }
                            ?> 
                            <th class="head1"><?php echo $row; ?></th>
                            <?php 
                                }
                            ?>                            
                        </tr>                        
                    </thead>
                    <tbody>
                        <?php //if (!empty($AllResume)) foreach ($AllResume as $row): ?>
                        <?php
                            for($i=0; $i<count($AllResume); $i++){ 
                            $out_data = array_values($AllResume[$i]);
                           //echo '<pre/>';print_r($out_data);exit();
                        ?>
                            <tr>
                                <?php   
                                $c = 0;
                                for($j=0; $j<count($index)-1; $j++){
                                   $c++;
                                   $value = $out_data[$j]; 
                                ?>
                                <td>
                                    <?php  
                                        if($j == count($index)-2){
                                    ?>
                                                                                                                                                                 
                                      
                                    <a class="btn btn-success btn-xs" href="<?php echo base_url();?>admin/resume/unshortlisted/<?php echo $out_data[$j+1]; ?>">Un-Shortlisted</a>                                                                                                                           
                                    <a class="btn btn-success btn-xs" href="<?php echo base_url();?>admin/resume/resumeDetails/<?php echo $value; ?>">Details</a>
                                    <?php
                                        }else{
                                            echo empty($value) ? '&nbsp;' : $value; 
                                        }                                                                 
                                    ?>
                                </td>
                                
                                <?php
                                } 
                     
//                                foreach ($AllResume as $row){
                                ?>
                                <!--<td></td>-->
                            <?php //} ?>
                            </tr>
                        <?php
                            } 
                        ?>
                        <?php //endforeach; ?> 
                    </tbody>
                </table>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</section>
