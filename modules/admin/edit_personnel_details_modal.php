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
                            <input type="text" name="_id" id="_id" x-ref="_id" x-model="p_id" style="display: none">
                        <hr>
                            <div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 10px;">
                                <label for="p_role_service">Register for: </label>
                                <select class="selectD" name="p_role_service" id="p_role_service" x-ref="p_role_service" x-model="p_role_s" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
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
                                <label for="p_first_name">First Name:</label>
                                    <input type="text" name="p_first_name" id="p_first_name" x-ref="p_first_name" x-model="p_fn" class="form-control input-lg" tabindex="2" placeholder="First Name" required>
                                </div>
                            </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group" >
                                <label for="p_last_name">Last Name:</label>
                                    <input type="text" name="p_last_name" id="p_last_name" x-ref="p_last_name" x-model="p_ln" class="form-control input-lg" tabindex="1" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="p_middle_name">Middle Name:</label>
                                    <input type="text" name="p_middle_name" id="p_middle_name" x-ref="p_middle_name" x-model="p_mn" class="form-control input-lg" tabindex="5" placeholder="Middle Name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="p_contact_no">Contact Number:</label>
                                    <input type="number" name="p_contact_no" id="p_contact_no" x-ref="p_contact_no" x-model="p_c_no" class="form-control input-lg" tabindex="6" placeholder="Contact Number" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="inputC">
                                    <label for="p_birth_date">Birth Date:</label>
                                    <input type="date" name="p_birth_date" id="p_birth_date" name="trip-start"
                                        value="2000-01-01" x-ref="p_birth_date" x-model="p_b_date"
                                        min="1900-01-01" max="2050-12-31" style="width: 100%; padding: 3px;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="p_birth_place">Place of Birth:</label>
                                    <input type="text" name="p_birth_place" id="p_birth_place" x-ref="p_birth_place" x-model="p_b_place" class="form-control input-lg" placeholder="Place of Birth">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            <label for="p_sex">Sex: </label>
                            <select class="selectD" name="p_sex" id="p_sex" x-ref="p_sex" x-model="p_seggs" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                <option value="" disabled selected hidden>Choose Sex</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="p_religion">Religion:</label>
                                    <input type="text" name="p_religion" id="p_religion" x-ref="p_religion" x-model="p_rel" class="form-control input-lg" value="Religion">
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
                                    <label for="p_address_street">Provincial Address:</label>
                                        <input type="text" name="p_address_street" id="p_address_street"  x-ref="p_address_street" x-model="p_a_street" class="form-control input-lg" placeholder="Street/Subdiv/Sitio">
                                    </div>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="p_address_barangay">Barangay:</label>
                                    <input type="text" name="p_address_barangay" id="p_address_barangay" x-ref="p_address_barangay" x-model="p_a_barangay" class="form-control input-lg" placeholder="Barangay">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="p_address_municipality">Municipality:</label>
                                    <input type="text" name="p_address_municipality" id="p_address_municipality" x-ref="p_address_municipality" x-model="p_a_municipality" class="form-control input-lg" placeholder="Municipality">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 style="font-weight: bold">Coordinators Login Information</h3>
                        <hr>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="p_username">Email:</label>
                                <input type="text" name="p_username" id="p_username" x-ref="p_username" x-model="p_user_n" class="form-control input-lg" placeholder="Email" disable>
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="p_secret_phrase">Secret Phrase:</label>
                                    <div class="buttonIn">
                                        <input type="text" id="enter" name="p_secret_phrase" x-ref="secret_phrase" x-model="p_secret_p" class="form-control input-lg" placeholder="Secret Phrase" autocomplete=off>
                                        <button type="button" id="clear" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em; display: inline" x-on:click="generate_secret_phrase">Generate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 10px;">
                                <label for="p_user_role">Change Role: </label>
                                <select class="selectD" name="p_user_role" id="p_user_role" x-ref="p_user_role" x-model="p_role" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                    <option value="" disabled selected hidden>Choose Role</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Personnel">Personnel</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="p_password">Password:</label>
                                    <input type="password" name="p_password" id="p_password" x-ref="p_password" class="form-control input-lg" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="p_confirmPassword">Confirm Password:</label>
                                    <input type="password" name="p_confirmPassword" id="p_confirmPassword" x-ref="p_confirmPassword" class="form-control input-lg" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="p_status">Status:</label>
                                    <input type="text" name="p_status" id="p_status" x-ref="p_status" class="form-control input-lg" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    <br>
                    </div>
                    <button type="button" class="btn btn-success" style="width: 50%" x-ref="update_personnel_button" x-on:click="update_personnel_details">Submit</button>
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