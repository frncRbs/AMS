<div class="popupHomeContent" x-show="show_home_content_form" style="display: none">
    <div class="popup-contentHomeContent" x-data="show_home_content_modal">
        <div class="popup-child1" style="margin-bottom: 5px">
            <div style="display: flex; flex-direction: column;">
                <br>
                <h1 style="font-weight: bolder">Customize Home Title Content</h1>
                    <hr>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">
                                    <div class="widget-title"><span class="icon"><i class="icon-align-justify"></i></span>
                                    </div>
                                    <div class="widget-content nopadding">
                                        <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">First Slide Upper Title Tag :</label></div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control span11" placeholder="1st Paragraph" name="firsttag1" required/>
                                            </div>
                                        </div>
                                        <br>

                                        <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">First Slide Lower Title Tag :</label></div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control span11" placeholder="2nd Paragraph" name="firsttag2" required/>
                                            </div>
                                        </div>
                                        <br>

                                        <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">Second Slide Upper Title Tag :</label></div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control span11" placeholder="1st Paragraph" name="secondtag1" required/>
                                            </div>
                                        </div>
                                        <br>

                                        <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">Second Slide Lower Title Tag :</label></div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control span11" placeholder="2nd Paragraph" name="secondtag2" required/>
                                            </div>
                                        </div>
                                        <br>

                                        <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">Third Slide Upper Title Tag :</label></div>
                                        <div class="control-group">
                                            
                                            <div class="controls">
                                                <input type="text" class="form-control span11" placeholder="1st Paragraph" name="thirdtag1" required/>
                                            </div>
                                        </div>
                                        <br>

                                        <div style="display: flex; align-self: flex-end"><label class="control-label" style="font-weight: bold">Third Slide Lower Title Tag :</label></div>  
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control span11" placeholder="2nd Paragraph" name="thirdtag2" required/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions" style="display: flex; justify-content: center; margin: 20px">
                                            <button type="submit" name="submit1" class="btn btn-success" style="width: 25%">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>   
            </div>  
        </div>
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_activate_account_exit">X</a>
        </div>
    </div>
</div>