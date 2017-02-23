<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr>
            <th class="head1">SL</th>
            <th class="head1">Job Title</th>
            <!--<th class="head0">Description</th>-->
            <th class="head0">Vacancy</th>
            <th class="head0">Applications</th>			 
            <th class="head0">Department</th>
            <th class="head0">Deadline</th>
            <th class="head0">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i = $vpb_start_page+1;
        if (!empty($rows)) foreach ($rows as $job): ?>
                <tr id="tr_<?php echo $job['PostId']; ?>">                   
                    <td><?php echo $i; ?></td>
                    <td><a href="<?php echo base_url();?>admin/postjob/jobwiseapplication/<?php echo $job['PostId'];?>"><?php echo $job['JobTitel']; ?></a></td>
                    <!--<td><?php echo $job['JobDescription']; ?></td>-->
                    <td><?php echo $job['Vacancy']; ?></td>
                    <td><?php echo $job['Applications']; ?></td>					  
                    <td><?php echo $job['DepartmentName']; ?></td>  	
                    <td class="text-center"><?php echo explode(' ',$job['ApplicationDeadline'])[0]; ?></td>                                            
                    <td>
                        <a class="btn btn-success btn-xs" href="<?php echo base_url('admin/postjob/editjob').'/'.$job['PostId']; ?>">Edit</a>
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/resume/jobwisecvsummary');?>" >CV Summary</a>
                    </td>
                </tr>
        <?php $i++;
        endforeach; ?>
<!--        <tr>
            <td colspan="7">
                <button class="btn green" type="submit">Done</button>
            </td>
        </tr>-->
    </tbody>
</table>
<!--</form>-->
<br clear="all" />
<div style="" align="left"><?php echo $vpb_pagination_system; ?></div><!-- This is the pagination buttons -->
<br clear="all" />