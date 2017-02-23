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
                    <?php if (!empty($notice))
                        foreach ($notice as $row) {
                    ?>
                        <form action="<?php print base_url(); ?>admin/noticeboard/doupdate" enctype='multipart/form-data' method="post">
                            <input type="hidden" name="noticeid" value="<?php echo $row['NoticeId']; ?>">
                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label>Notice Title</label></div>    
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="noticetitle" id="noticename" value="<?php echo $row['NoticeName']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label>Notice Description</label></div>    
                                <div class="col-md-8">
                                    <textarea id="editor1" cols="40" class="form-control" rows="4" name="noticedescription" id="noticedescription"><?php echo $row['NoticeDescription']; ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label>Notice Date</label></div>    
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="noticedate" id="noticedate" value="<?php echo date('m/d/Y',strtotime($row['NoticeDate'])); ?>">
                                </div>
                            </div> 
                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label>Publication Status</label></div>    
                                <div class="col-md-8">
                                    <select class="form-control" type="text" name="noticestatus" id="noticestatus">
                                        <option value="1">Yes</option>
                                        <option value="0" <?php if ($row['Status'] == 0) echo "selected"; ?>> No</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label>File</label></div>    
                                <div class="col-md-8">
                                    <input type="file" name="userfile" value="" id="user_file"/>
                                </div>    
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-3"><label></label></div>    
                                <div class="col-md-8">
                                    <input class="btn btn-info" type="submit" name="submit" id="submit" value="Update">
                                </div>
                            </div>
                        </form>
                    <?php
                        break;
                        }
                    ?> 
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
