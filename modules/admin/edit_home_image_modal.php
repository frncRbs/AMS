<div class="popupHomeContent" x-show="show_home_image_form" style="display: none" x-data="home_images" x-init="initialize_images">
    <div class="popup-contentHomeContent">
        <div class="popup-child1">
            <div style="display: flex; flex-direction: column;">
                <br>
                <h1 style="font-weight: bolder">Manage Home Image Carousell</h1>
                    <h3 style="color: red" x-text="admin_error_msg"></h3>
                    <h3 style="color: green" x-text="admin_success_msg"></h3>
                    <hr>
                    <div class="row-fluid span12" style="overflow-y: scroll; max-height: 500px">
                        <br>
                            <div style="display: flex; justify-content: center; margin: 20px; gap: 20px; flex-direction: column">
                                <div style="display: flex; align-self: flex-start">
                                <label class="control-label" style="font-weight: bold">First Slide Image :</label></div>
                                <div class="control-group">
                                    <div class="controls" x-show="!imageUrl1">
                                        <img :src="image_slide1" height="100" width="200" name="image1" style="margin-left: 200px;">
                                    </div>
                                    <div class="controls" x-show="imageUrl1">
                                        <img :src="imageUrl1" height="100" width="200" name="image1" style="margin-left: 200px;">
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">Second Slide Image :</label></div>
                                <div class="control-group">
                                    <div class="controls" x-show="!imageUrl2">
                                        <img :src="image_slide2" height="100" width="200" name="image2" style="margin-left: 200px;">
                                    </div>
                                    <div class="controls" x-show="imageUrl2">
                                        <img :src="imageUrl2" height="100" width="200" name="image2" style="margin-left: 200px;">
                                    </div>
                                </div>

                                <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">Third Slide Image :</label></div>
                                <div class="control-group">
                                    <div class="controls" x-show="!imageUrl3">
                                        <img :src="image_slide3" height="100" width="200" name="image3" style="margin-left: 200px;">
                                    </div>
                                    <div class="controls" x-show="imageUrl3">
                                        <img :src="imageUrl3" height="100" width="200" name="image3" style="margin-left: 200px;">
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">First Slide Image :</label></div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="file" class="form-control span11" x-ref="home_photo_update1" name="img1" x-on:change="fileChosen_update(event, 1)"/>
                            </div>
                        </div>
                        <br>

                        <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">Second Slide Image :</label></div>
                        <div class="control-group">
                            <div class="controls">
                            <input type="file" class="form-control span11" x-ref="home_photo_update2" name="img2" x-on:change="fileChosen_update(event, 2)"/>
                            </div>
                        </div>
                        <br>

                        <div style="display: flex; align-self: flex-start"><label class="control-label" style="font-weight: bold">Third Slide Image :</label></div>
                        <div class="control-group">
                            <div class="controls">
                            <input type="file" class="form-control span11" x-ref="home_photo_update3" name="img3" x-on:change="fileChosen_update(event, 3)"/>
                            </div>
                        </div>
                        
                        <div class="form-actions" style="display: flex; justify-content: center; margin: 20px">
                            <button type="submit" name="submit1" class="btn btn-success" style="width: 25%" x-on:click="update_images()">Save</button>
                    </div>
                </div>   
            </div>  
        </div>
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_edit_home_features">X</a>
        </div>
    </div>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('home_images', () => ({
            image_slide1: '',
            image_slide2: '',
            image_slide3: '',

            imageUrl1: '',
            imageUrl2: '',
            imageUrl3: '',

            s_image1: '',
            s_image2: '',
            s_image3: '',
            row_id: 0,

            initialize_images(){
                const images_location = '../../assets/uploads/';
                let slide_images = '<?php 
                    $database = new Connection();
                    $db = $database->open();
                    $sql = $db->prepare("SELECT * FROM home_imgs");
                    $sql->execute();
                    $results = $sql->fetchAll();
                    $database->close();

                    echo json_encode($results);
                ?>';
                let _images = JSON.parse(slide_images);
                this.row_id = _images[0].id;
                this.image_slide1 = images_location + _images[0].image1;
                this.image_slide2 = images_location + _images[0].image2;
                this.image_slide3 = images_location + _images[0].image3;
            },
            fileChosen_update(event, slide_no) {
                var allowed_ext = ['jpeg', 'jpg', 'png', 'gif'];
                var uploaded_img_ext = '';
                var allowed = false;
                if(slide_no == 1){
                    if(this.$refs.home_photo_update1){
                        uploaded_img_ext = this.$refs.home_photo_update1.value.split('.').pop();
                    }
                    for(let i = 0; i < allowed_ext.length; i++){
                        if(uploaded_img_ext.toLowerCase() == allowed_ext[i]){
                            allowed = true;
                            break;
                        }
                    }
                    if(allowed){
                        this.s_image1 = event.target.files;
                        this.fileToDataUrl(event, src => this.imageUrl1 = src);
                    }
                    else {
                        this.admin_error_msg = 'Invalid file type';
                        this.imageUrl1 = null;
                        setTimeout(() => {
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                }
                else if(slide_no == 2){
                    if(this.$refs.home_photo_update2){
                        uploaded_img_ext = this.$refs.home_photo_update2.value.split('.').pop();
                    }
                    for(let i = 0; i < allowed_ext.length; i++){
                        if(uploaded_img_ext.toLowerCase() == allowed_ext[i]){
                            allowed = true;
                            break;
                        }
                    }
                    if(allowed){
                        this.s_image2 = event.target.files;
                        this.fileToDataUrl(event, src => this.imageUrl2 = src)
                    }
                    else {
                        this.admin_error_msg = 'Invalid file type';
                        this.imageUrl2 = null;
                        setTimeout(() => {
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                }
                else if(slide_no == 3){
                    if(this.$refs.home_photo_update3){
                        uploaded_img_ext = this.$refs.home_photo_update3.value.split('.').pop();
                    }
                    for(let i = 0; i < allowed_ext.length; i++){
                        if(uploaded_img_ext.toLowerCase() == allowed_ext[i]){
                            allowed = true;
                            break;
                        }
                    }
                    if(allowed){
                        this.s_image3 = event.target.files;
                        this.fileToDataUrl(event, src => this.imageUrl3 = src)
                    }
                    else {
                        this.admin_error_msg = 'Invalid file type';
                        this.imageUrl3 = null;
                        setTimeout(() => {
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                }
                console.log(this.$refs.home_photo_update1.value);
            },
            fileToDataUrl(event, callback) {
                if (! event.target.files.length) return

                let file = event.target.files[0];
                reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = e => callback(e.target.result);
            },
            async update_images(){
                const formData = new FormData();
                formData.append('image1', this.$refs.home_photo_update1.files[0]);
                formData.append('image2', this.$refs.home_photo_update2.files[0]);
                formData.append('image3', this.$refs.home_photo_update3.files[0]);
                formData.append('id', this.row_id);

                await fetch('../../controller/admin/update_home_images.php', {
                    method: 'POST',
                    body: formData
                })
                .then((response )=> {
                    setTimeout(() => {
                        this.admin_success_msg = 'Images updated successfully!';
                        // this.imageUrl1 = null;
                        // this.imageUrl2 = null;
                        // this.imageUrl3 = null;
                        this.initialize_images;
                    }, 1000);

                    setTimeout(() => {
                        this.admin_success_msg = '';
                    }, 2000);
                })
                .catch(error => {
                    console.error(error);
                });
            }
        }));
    });
            
</script>