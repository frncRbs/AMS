<!-- Farmer Registration Form -->      
<div class="popup3" x-show="update_personnel_registration_form" style="display: none;">
    <div class="popup-content3" >
        <div class="popup-child1">
            <form>
            <span>
                <h3 style="color: red" x-text="admin_error_msg"></h3>
            </span>
            <h1 style="font-weight: bolder">Update Coordinators Account</h1>
                <br>
                <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no == 1" style="display: none;">
                    <div style="width: 100%; padding: 0 20px 0 20px">
                    <h3 style="font-weight: bold">Coordinators Information</h3>
                    
                    <div class="row" style="text-align: left">
                        <div class="column">
                        <hr>
                            <div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 10px;">
                                <label for="role_service">Register for: </label>
                                <select class="selectD" name="role_service" id="role_service_p" x-ref="role_service" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                    <option value="" disabled selected hidden>Choose Services</option>
                                    <option value="1">High Value Crops</option>
                                    <option value="2">Corn Value Crop</option>
                                    <option value="3">Rice Crop</option>
                                </select>
                            </div>
                        <hr>
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name" id="first_name" x-ref="first_name" class="form-control input-lg" tabindex="2" placeholder="First Name" required>
                                </div>
                            </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group" >
                                <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" id="last_name" x-ref="last_name" class="form-control input-lg" tabindex="1" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="middle_name">Middle Name:</label>
                                    <input type="text" name="middle_name" id="middle_name" x-ref="middle_name" class="form-control input-lg" tabindex="5" placeholder="Middle Name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="contact_no">Contact Number:</label>
                                    <input type="number" name="contact_no" id="contact_no" x-ref="contact_no" class="form-control input-lg" tabindex="6" placeholder="Contact Number" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="inputC">
                                    <label for="birth_date">Birth Date:</label>
                                    <input type="date" name="birth_date" id="birth_date" name="trip-start"
                                        value="2000-01-01" x-ref="birth_date"
                                        min="1900-01-01" max="2050-12-31" style="width: 100%; padding: 3px;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="birth_place">Place of Birth:</label>
                                    <input type="text" name="birth_place" id="birth_place" x-ref="birth_place" class="form-control input-lg" placeholder="Place of Birth">
                                </div>
                            </div>
                        </div>

                        
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            <label for="sex">Sex: </label>
                            <select class="selectD" name="sex" id="sex" x-ref="sex" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                <option value="" disabled selected hidden>Choose Sex</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="religion">Religion:</label>
                                    <input type="text" name="religion" id="religion" x-ref="religion" class="form-control input-lg" value="Religion">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PAGE 2 -->
                <div class="formG" style="display: none; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no == 2" style="display: none;">
                    <div style="width: 100%; padding: 0 20px 0 20px">
                        <h3 style="font-weight: bold">Coordinators Address</h3>
                        <hr>
                        <div class="row" style="text-align: left">
                        <div class="column">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="form-group" >
                                    <label for="address_street">Provincial Address:</label>
                                        <input type="text" name="address_street" id="address_street"  x-ref="address_street" class="form-control input-lg" placeholder="Street/Subdiv/Sitio">
                                    </div>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="address_barangay">Barangay:</label>
                                    <input type="text" name="address_barangay" id="address_barangay" x-ref="address_barangay" class="form-control input-lg" placeholder="Barangay">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="address_municipality">Municipality:</label>
                                    <input type="text" name="address_municipality" id="address_municipality" x-ref="address_municipality" class="form-control input-lg" placeholder="Municipality">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 style="font-weight: bold">Coordinators Login Information</h3>
                        <hr>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="username" name="username" id="username" x-ref="username" class="form-control input-lg" placeholder="Username">
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="secret_phrase">Secret Phrase:</label>
                                    <div class="buttonIn">
                                        <input type="text" id="enter" name="secret_phrase" x-ref="secret_phrase" class="form-control input-lg" placeholder="Secret Phrase" autocomplete=off>
                                        <button type="button" id="clear" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em; display: inline" x-on:click="generate_secret_phrase">Generate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" x-ref="password" class="form-control input-lg" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password:</label>
                                    <input type="password" name="confirmPassword" id="confirmPassword" x-ref="confirmPassword" class="form-control input-lg" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <input type="password" name="role" id="role" x-ref="role" class="form-control input-lg" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <input type="password" name="status" id="status" x-ref="status" class="form-control input-lg" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    <br>
                    </div>
                    <button type="button" class="btn btn-success" style="width: 50%" x-ref="submit_personnel_button" x-on:click="submit_personnel_form">Submit</button>
                    <br>
                </div>
                <hr>
                <div class="column" style="text-align: center">
                    <template x-if="info_no != 1">
                        <button type="button" class="btn btn-success" style="width: 25%; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="back">Back</button>
                    </template>
                    
                    <template x-if="info_no != 2">
                        <button type="button" class="btn btn-success" style="width: 25%; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em " x-on:click="next">Next</button>
                    </template>
                </div>
            </form>
        </div>
        <div class="popup-child2">
            <button type="button" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_register">X</button>
        </div>
    </div>
</div>

<!-- <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('edit_personnel_details_modal', () => ({
            info_no: 1,

            next(){
                if(this.info_no < 2){
                    this.info_no = (this.info_no + 1);
                }
            },

            back(){
                if(this.info_no > 1){
                    this.info_no = (this.info_no - 1);
                }
            },

            exit_register(){
                this.info_no = 1;
                this.show_personnel_registration_form = false;
            },
        }));
    });
</script> -->