<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                 <?php echo $adminmenubar; ?>
            </div>
            <div class="col-md-7">  
                <?php include('top_menu.php');?>   
					<br>
				  <a class="btn btn-success btn-sm" href="<?php echo base_url();?>admin/resume/cvsummaryExport">Export Excel</a>	
				   <br>
                <table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="head1">Name</th>
                            <th class="head0">Gender</th>
                            <th class="head0">Position</th>
                            <th class="head0">ExpectedSalary</th>                            
                            <th class="head0">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($AllResume)) foreach ($AllResume as $row): ?>
                            <tr>
                                <td><?php echo $row['UserName']; ?></td>
                                <td><?php echo $row['Gender']; ?></td>
                                <td><?php echo $row['JobTitel']; ?></td>
                                <td><?php echo $row['ExpectedSalary']; ?></td>
                                <td><a class="btn btn-success btn-sm" href="<?php echo base_url();?>admin/resume/resumeDetails/<?php echo $row['UserId']; ?>">Details</a></td>
                            </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</section>
