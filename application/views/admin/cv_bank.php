<section class="section-padding50">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <?php echo $adminmenubar;?>
            </div>

            <div class="col-md-7">
                <?php include('top_menu.php');?>
				<br>
                <div class="dash_user">
                    <h2>All Resume</h2>
                </div>
					
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">Name</th>
                                    <th class="head0">Address</th>
                                    <th class="head0">Gendar</th>
                                    <th class="head0">DOB</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    foreach($cvbank as $cvb)
                                    {               
                                    ?>
                                        <tr>
                                            <td><?php echo $cvb['UserName']; ?></td>
                                            <td><?php echo $cvb['Add1']; ?></td>
                                            <td><?php echo $cvb['Gender']; ?></td>
                                            <td><?php echo explode(' ',$cvb['DOB'])[0]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>


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
