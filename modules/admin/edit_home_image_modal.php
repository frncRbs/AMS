<div class="popupHomeContent" x-show="show_home_image_form" style="display: none">
    <div class="popup-contentHomeContent">
        <div class="popup-child1">
            <div style="display: flex; flex-direction: column;">
                <br>
                <h1 style="font-weight: bolder">Manage Home Image Carousell</h1>
                    <hr>
                    <div class="row-fluid span12" style="overflow-y: scroll; max-height: 500px">
                        <br>
                            <div style="display: flex; justify-content: center; margin: 20px; gap: 20px; flex-direction: column">
                                <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">First Slide Image :</label></div>
                                <div class="control-group">
                                    <div class="controls">
                                        <img src="<?php echo $image1;?>" height="100" width="200" name="image1" style="margin-left: 200px;">
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">Second Slide Image :</label></div>
                                <div class="control-group">
                                    <div class="controls">
                                        <img src="<?php echo $image2;?>" height="100" width="200" name="image2" style="margin-left: 200px;">
                                    </div>
                                </div>

                                <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">Third Slide Image :</label></div>
                                <div class="control-group">
                                    <div class="controls">
                                        <img src="<?php echo $image3;?>" height="100" width="200" name="image3" style="margin-left: 200px;">
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">First Slide Image :</label></div>
                        <div class="control-group">
                            <div class="controls">
                            <input type="file" class="form-control span11" name="img1"/>
                            </div>
                        </div>
                        <br>

                        <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">Second Slide Image :</label></div>
                        <div class="control-group">
                            <div class="controls">
                            <input type="file" class="form-control span11" name="img2"/>
                            </div>
                        </div>
                        <br>

                        <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">Third Slide Image :</label></div>
                        <div class="control-group">
                            <div class="controls">
                            <input type="file" class="form-control span11" name="img3"/>
                            </div>
                        </div>
                        
                        <div class="form-actions" style="display: flex; justify-content: center; margin: 20px">
                            <button type="submit" name="submit1" class="btn btn-success" style="width: 25%">Save</button>
                    </div>
                </div>   
            </div>  
        </div>
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_edit_home_features">X</a>
        </div>
    </div>
</div>