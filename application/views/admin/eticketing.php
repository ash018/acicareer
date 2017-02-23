<section class="section-padding50 wow zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <?php echo $adminmenubar; ?>
            </div>

            <div class="col-md-7">
                <div class="etick_area">
                    <div class="etick_text_area">
                        <h2>About e-Ticketing system</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    </div>
                    <div class="etick_user">
                        <h2>Terms and conditions</h2>
                        <ol>
                            <li><a href="">Lorem Ipsum is simply dummy text of the printing</a></li>
                            <li><a href="">Typesetting industry. Lorem Ipsum has been the industry's </a></li>
                            <li><a href="">Standard dummy text ever since the 1500s, when an unknown</a></li>
                            <li><a href="">Printer took a galley of type and scrambled it to make </a></li>
                            <li><a href="">Type specimen book. It has survived not only five centuries</a></li>
                            <li><a href="">Also the leap into electronic typesetting, remaining essentially unchanged.</a></li>
                        </ol>
                    </div>
                    <button class="hrere_btn">Let me out from here</button>
                    <button class="agree_btn">I’m agree</button>
                </div>
                <div class="etick_submit_area">
                    <h2>Submit Ticket</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="etick_submit_title">
                                <ul>
                                    <li><a href="">Subject</a></li>
                                    <li><a href="">Category</a></li>
                                    <li><a href="">Sub-category</a></li>
                                    <li><a href="">Related Dept.</a></li>
                                    <li><a href="">Details</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="etick_submit_text_area">
                                <form action="" onsubmit="return insertticket()">
                                    <div class="etick_submit_text">
                                        <input type="text" name="subject" id="subject" maxlength="200" placeholder="Write here"/>
                                    </div>
                                    <div class="etick_submit_select">
                                        <select id="ECategoryId" name="ECategoryId">
                                            <option value="">Select a Categroy</option>
                                            <?php echo isset($row->ECategroyId) ? select_option_selected('LECategory', 'ECategroyId','ECategory',$row->ECategoryId) : select_option('LECategory', 'ECategroyId','ECategory'); ?>
                                        </select>
                                    </div>
                                    <div class="etick_submit_select">
                                        <select name="ESubCategory" id="ESubCategory">                
                                            <option value="">Select Sub Categroy</option>
                                            
                                        </select>
                                    </div>
                                    <div class="etick_submit_select">
                                        <select id="DepartmentId" name="DepartmentId">
                                            <option value="">Select a Department</option>
                                            <?php echo isset($row->DepartmentId) ? select_option_selected('LDepartment', 'DepartmentId','DepartmentName',$row->DepartmentId) : select_option('LDepartment', 'DepartmentId','DepartmentName'); ?>
                                        </select>
                                    </div>
                                    <div class="etick_submit">
                                        <textarea name="details" id="details" cols="30" rows="10"></textarea>
                                    </div>
                                    <button class="submit_btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>