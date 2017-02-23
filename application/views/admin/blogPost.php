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
                    <h2>Blog Post</h2>
                </div>
                <div class="alert-success" align="center">
                    <?php
                        $message = $this->session->userdata('message');
                        if (isset($message)) {
                            echo $message;
                            $this->session->unset_userdata('message');
                        }
                    ?>
                </div>
                <fieldset style="border: 1px solid #CCC; padding: 10px;">
                    <p><a href="<?php echo base_url(); ?>admin/BlogPost/addnewblog/" class="btn btn-success">Add New Blog </a></p>
                    <table class="table table-bordered">
                        <?php
                        if (!empty($blogList))
                            foreach ($blogList as $row):
                                $dt = new DateTime($row['EntryDate']);
                                $strip = $dt->format('Y-m-d');
                                ?>
                                <tr>
                                    <td><?php echo $row['Title']; ?></td>
                                    <td><?php echo $row['Details']; ?></td>
                                    <td><?php echo $strip; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>admin/BlogPost/blogEdit/<?php echo $row['BlogId']; ?>" class="btn btn-success btn-xs">Edit</a> &nbsp;&nbsp;&nbsp;
                                        <a onclick="return confirm_delete();" href="<?php echo base_url(); ?>admin/BlogPost/blogDelete/<?php echo $row['BlogId']; ?>" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
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