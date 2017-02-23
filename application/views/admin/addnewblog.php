<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <?php echo $adminmenubar; ?>
            </div>
            <div class="col-md-7">
                <?php include('top_menu.php'); ?>
                <div class="dash_user">
                    <h2>Post A New Blog</h2>
                </div><br>
                <fieldset style="border: 1px solid #CCC; padding: 10px;">
                    <form action="<?php print base_url(); ?>admin/BlogPost/saveBlogPost"  enctype='multipart/form-data' method="POST">

                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>Blog Title</label></div>    
                            <div class="col-md-8"><?php if(isset($blog) && count($blog)> 0){?>
                                <input class="form-control" type="hidden" name="BlogId" id="BlogId" value="<?php echo $blog[0]['BlogId']; ?>" >
                            <?php }?>
                                <input class="form-control" type="text" name="Title" id="Title" value="<?php if(isset($blog) && count($blog)> 0){echo $blog[0]['Title'];}?>" required placeholder="<?php if(isset($blog) && count($blog)> 0){echo $blog[0]['Title'];}?>">
                            </div>    
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>Blog Description</label></div>    
                            <div class="col-md-8">
                                <textarea cols="40" class="form-control" rows="4" name="Details" id="Details" value="<?php if(isset($blog) && count($blog)> 0){echo $blog[0]['Details'];}?>" required><?php if(isset($blog) && count($blog)> 0){echo $blog[0]['Details'];} ?></textarea>
                            </div>    
                        </div>

                        <!--                        <div class="col-md-12 form-group">
                                                    <div class="col-md-3"><label>Notice Date</label></div>    
                                                    <div class="col-md-8"><input class="form-control" type="text" name="noticedate" id="noticedate" value=""required></div>    
                                                </div> -->
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>Publication Status</label></div>    
                            <div class="col-md-8">
                                <select class="form-control" type="text" name="Publish" id="Publish">                            
                                    <option value="1" <?php if(isset($blog) && count($blog)> 0 && $blog[0]['Publish'] == 1){echo 'selected';}?>>Yes</option>
                                    <option value="0" <?php if(isset($blog) && count($blog)> 0 && $blog[0]['Publish'] == 0){echo 'selected';}?>> No</option>
                                </select>
                            </div>    
                        </div> 
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label> <?php if(isset($blog) && count($blog)> 0){ echo 'Change Image'; } else{ echo 'Attached File';}?></label></div>    
                            <div class="col-md-8">
                                <input type='file'name="userfile[]" id="user_file"/>
                            </div>    
                        </div>
                        <?php if(isset($blog) && count($blog)> 0){?>
                        
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label>Current Images</label></div>    
                            <div class="col-md-6">
                                <div class="img-thumbnail">
                                    <img src="<?php echo base_url().'assets/uploads_blog/'.$blog[0]['Attachment']; ?>" alt="" />
                                </div>
                            </div>    
                        </div>
                        <?php }?>
                        
                        <div class="col-md-12 form-group">
                            <div class="col-md-3"><label></label></div>    
                            <div class="col-md-8">
                                <input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit">
                            </div>    
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