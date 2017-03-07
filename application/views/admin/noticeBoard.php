<script language="Javascript" type="text/javascript"><!--
    function confirm_delete()
    {
        if (confirm('confirm delete data ? ')) {return true;}
        else {return false;}
    }
    //-->
</script>
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <?php echo $adminmenubar; ?>
            </div>
            <div class="col-md-7">
                <?php include('top_menu.php'); ?>
                <div class="dash_user">
                    <h2>Notice Board</h2>
                </div><br>
                <fieldset style="border: 1px solid #CCC; padding: 10px;">
                    <p>
                        <a class="btn btn-success" href="<?php echo base_url(); ?>admin/NoticeBoard/addnotice/">
                        Add New Notice</a>
                    </p>
                    <table class="table table-bordered">
                            <tr>
                                <th>Notice Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                                <!--th>File</th-->
                            </tr>
                        <?php if (!empty($previousnotice)) foreach ($previousnotice as $row): ?>
                            <tr>
                                <td><?php echo $row['NoticeName']; ?></td>
                                <td><?php echo $row['NoticeDescription']; ?></td>
                                <td><?php echo date('m/d/Y',strtotime($row['NoticeDate'])); ?></td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>admin/NoticeBoard/NoticeEdit/<?php echo $row['NoticeId']; ?>">Edit</a> &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-danger btn-xs" onclick="return confirm_delete();" href="<?php echo base_url(); ?>admin/NoticeBoard/NoticeDelete/<?php echo $row['NoticeId']; ?>">Delete</a>
                                </td>
                                <!--td><?php echo $row['NoticeFile']; ?></td-->
                            </tr>
                        <?php endforeach; ?> 
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</section>
<section id="team-members" class="wins_area_area wow bounceIn">
    <div class="container">
        <div class="row">
            <div class="co-md-12">
                <div class="single_wins">
                    <h2>TALENT <span>WINS</span> GAMES</h2>
                    <h2>BUT <span>TEAMWORK</span> AND <span>INTELLIGENCE</span></h2>
                    <h2>WINS <span>CHAMPIONSHIPS </span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
.required{
    color: red;
}
</style>