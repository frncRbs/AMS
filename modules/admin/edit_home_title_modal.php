<div class="popupHomeContent" x-show="show_home_content_form"  style="display: none">
    <div class="popup-contentHomeContent">
        <div class="popup-child1">
            <div style="display: flex; flex-direction: column;">
                <br>
                <h1 style="font-weight: bolder">Manage Home Title Content</h1>
                    <hr>
                        <h3 style="color: red" x-text="admin_error_msg"></h3>
                        <h3 style="color: green" x-text="admin_success_msg"></h3>
                        <input type="text" hidden x-ref="_id">
                        <div class="row-fluid span12" style="overflow-y: scroll; max-height: 500px">
                            <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">First Slide Upper Title Tag :</label></div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control form-control-lg span11" placeholder="Enter first slide upper title here..." required x-ref="title11"></textarea>
                                    </div>
                                    <!-- <input type="text" class="form-control span11" placeholder="1st Paragraph" name="firsttag1" required/> -->
                                </div>
                            </div>
                            <br>

                            <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">First Slide Lower Title Tag :</label></div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control form-control-lg span11" placeholder="Enter first slide lower title here..." required x-ref="title12"></textarea>
                                    </div>
                                    <!-- <input type="text" class="form-control span11" placeholder="2nd Paragraph" name="firsttag2" required/> -->
                                </div>
                            </div>
                            <br>

                            <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">Second Slide Upper Title Tag :</label></div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control form-control-lg span11" placeholder="Enter second slide upper title here..." required x-ref="title21"></textarea>
                                    </div>
                                    <!-- <input type="text" class="form-control span11" placeholder="1st Paragraph" name="secondtag1" required/> -->
                                </div>
                            </div>
                            <br>

                            <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">Second Slide Lower Title Tag :</label></div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control form-control-lg span11" placeholder="Enter second slide lower title here..." required x-ref="title22"></textarea>
                                    </div>
                                    <!-- <input type="text" class="form-control span11" placeholder="2nd Paragraph" name="secondtag2" required/> -->
                                </div>
                            </div>
                            <br>

                            <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">Third Slide Upper Title Tag :</label></div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control form-control-lg span11" placeholder="Enter third slide upper title here..." required x-ref="title31"></textarea>
                                    </div>
                                    <!-- <input type="text" class="form-control span11" placeholder="1st Paragraph" name="thirdtag1" required/> -->
                                </div>
                            </div>
                            <br>

                            <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">Third Slide Lower Title Tag :</label></div>  
                            <div class="control-group">
                                <div class="controls">
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control form-control-lg span11" placeholder="Enter third slide lower title here..." required x-ref="title32"></textarea>
                                    </div>
                                    <!-- <input type="text" class="form-control span11" placeholder="2nd Paragraph" name="thirdtag2" required/> -->
                                </div>
                            </div>

                            <div class="form-actions" style="display: flex; justify-content: center; margin: 20px">
                                <button type="submit" name="submit1" class="btn btn-success" style="width: 25%; margin-top: 10px" x-ref="submit_home_title_button" x-on:click="update_home_title_form">Save</button>
                            </div> 
                        </div>
                    </div> 
                </div>
            <div class="popup-child2">
                <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_edit_home_features">X</a>
            </div>
    </div>
</div>