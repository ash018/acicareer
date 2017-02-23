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
                    <form action="<?php print base_url(); ?>admin/noticeboard/docreate" enctype='multipart/form-data' method="POST">

                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>Notice Title</label></div>    
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="noticetitle" id="noticename" value="" required >
                            </div>    
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>Notice Description</label></div>    
                            <div class="col-md-8">
                                <textarea id="editor1" class="form-control" name="noticedescription" id="noticedescription" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>Notice Date</label></div>    
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="noticedate" id="noticedate" value=""required>
                            </div>    
                        </div> 
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>Publication Status</label></div>    
                            <div class="col-md-8">
                                <select class="form-control" type="text" name="noticestatus" id="noticestatus">
                                    <option value="1">Yes</option>
                                    <option value="0"> No</option>
                                </select>
                            </div>    
                        </div> 
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>File</label></div>    
                            <div class="col-md-8">
                                <input type='file'name="userfile" id="user_file"/>
                            </div>    
                        </div> 
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label></label></div>    
                            <div class="col-md-8"><input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit"></div>    
                        </div>
                    </form>
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