<!-- Farmer Registration Form -->      
<div class="popup3" x-show="update_farmer_registration_form" style="display: none;">
    <div class="popup-content3" x-data="edit_farmer_details_modal">
        <div class="popup-child1">
            <form>
            <span>
                <h3 style="color: red" x-text="admin_error_msg"></h3>
            </span>
            <h1 style="font-weight: bolder">Update Farmer Account</h1>
                <br>
                <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no_farmer == 1" style="display: none;">
                    <div style="width: 100%; padding: 0 20px 0 20px">
                    <h3 style="font-weight: bold">Farmer Information</h3>
                    <div class="row" style="text-align: left">
                        <div class="column">
                        <hr>
                            <div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 10px;">
                                <label for="f_role_service">Register for: </label>
                                <select class="selectD" name="f_role_service" id="f_role_service" x-model="f_role_s" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
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
                                <label for="f_first_name">First Name:</label>
                                    <input type="text" name="f_first_name" id="f_first_name" x-model="f_firstname" class="form-control input-lg" tabindex="2" placeholder="First Name" required>
                                </div>
                            </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group" >
                                <label for="f_last_name">Last Name:</label>
                                    <input type="text" name="f_last_name" id="f_last_name" x-model="f_lastname" class="form-control input-lg" tabindex="1" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="f_middle_name">Middle Name:</label>
                                    <input type="text" name="f_middle_name" id="f_middle_name" x-model="f_middlename" class="form-control input-lg" tabindex="5" placeholder="Middle Name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="f_contact_no">Contact Number:</label>
                                    <input type="number" name="f_contact_no" id="f_contact_no" x-model="f_contact" class="form-control input-lg" tabindex="6" placeholder="Contact Number" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 5px">
                            <label for="f_civil_status" style="float: left">Civil Status: </label>
                            <select class="selectD" name="f_civil_status" id="f_civil_status" x-model="f_civil_s" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                <option value="" disabled selected hidden>Choose Status</option>
                                <option value="1">Married</option>
                                <option value="2">Single</option>
                                <option value="3">Widowed</option>
                            </select>
                        </div>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="inputC">
                                    <label for="f_birth_date">Birth Date:</label>
                                    <input type="date" name="f_birth_date" id="f_birth_date" name="trip-start"
                                        value="2000-01-01" x-model="f_birth_d"
                                        min="1900-01-01" max="2050-12-31" style="width: 100%; padding: 3px;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="f_birth_place">Place of Birth:</label>
                                    <input type="text" name="f_birth_place" id="f_birth_place" x-model="f_birth_p" class="form-control input-lg" placeholder="Place of Birth">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            <label for="f_sex">Sex: </label>
                            <select class="selectD" name="f_sex" id="f_sex" x-model="f_sex" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                <option value="" disabled selected hidden>Choose Sex</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="f_religion">Religion:</label>
                                    <input type="text" name="f_religion" id="f_religion" x-model="f_religion" class="form-control input-lg" value="Religion">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PAGE 2 -->
                
                <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no_farmer == 2" style="display: none;">
                    <div style="width: 100%; padding: 0 20px 0 20px">
                    <h3 style="font-weight: bold">Farmer Information</h3>
                    <div class="row" style="text-align: left">
                        <div class="column">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <label for="f_farm_type">Farm Type: </label>
                                <select class="selectD" name="f_farm_type" id="f_farm_type" x-model="f_farm_t" style="width: 100%; height: auto; margin-bottom: 10px; padding: 5px; border-radius: 3px">
                                    <option value="" disabled selected hidden>Choose Services</option>
                                    <option value="1">High Value Crops</option>
                                    <option value="2">Corn Value Crop</option>
                                    <option value="3">Rice Crop</option>
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group" >
                                <label for="f_address_street">Street/Subdiv/Sitio:</label>
                                    <input type="text" name="f_address_street" id="f_address_street"  x-model="f_address_s" class="form-control input-lg" placeholder="Street/Subdiv/Sitio">
                                </div>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="f_address_barangay">Barangay:</label>
                                    <input type="text" name="f_address_barangay" id="f_address_barangay" x-model="f_address_b" class="form-control input-lg" placeholder="Barangay">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="f_address_municipality">Municipality:</label>
                                    <input type="text" name="f_address_municipality" id="f_address_municipality" x-model="f_address_m" class="form-control input-lg" placeholder="Municipality">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group">
                                    <label for="f_address_zip">Zipcode:</label>
                                    <input type="number" name="f_address_zip" id="f_address_zip" x-model="f_address_z" class="form-control input-lg" placeholder="Zipcode">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 style="font-weight: bold">Person to contact in case of emergency</h3>
                        <hr>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="f_guardian_fname">Full Name:</label>
                                    <input type="text" name="f_guardian_fname" id="f_guardian_fname" x-model="f_guardian_fn" class="form-control input-lg" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="f_guardian_contact">Contact Number:</label>
                                    <input type="number" name="f_guardian_contact" id="f_guardian_contact" x-model="f_guardian_c" class="form-control input-lg" placeholder="Contact Number">
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

                <!-- PAGE 3 -->
                <div class="formG" style="display: none; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no_farmer == 3" style="display: none;">
                    <div style="width: 100%; padding: 0 20px 0 20px">
                        <h3 style="font-weight: bold">Farmers Address</h3>
                        <hr>
                        <div class="row" style="text-align: left">
                        <div class="column">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="form-group" >
                                    <label for="f_address_street">Provincial Address:</label>
                                        <input type="text" name="f_address_street" id="f_address_street"  x-model="f_address_s" class="form-control input-lg" placeholder="Street/Subdiv/Sitio">
                                    </div>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="f_address_barangay">Barangay:</label>
                                    <input type="text" name="f_address_barangay" id="f_address_barangay" x-model="f_address_b" class="form-control input-lg" placeholder="Barangay">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                <label for="f_address_municipality">Municipality:</label>
                                    <input type="text" name="f_address_municipality" id="f_address_municipality" x-model="f_address_m" class="form-control input-lg" placeholder="Municipality">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group">
                                    <label for="f_farm_area">Total farm area:</label>
                                    <input type="number" name="f_farm_area" id="f_farm_area" x-model="f_farm_a" class="form-control input-lg" placeholder="Total farm area">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 style="font-weight: bold">Farmers Login Information</h3>
                        <hr>
                        <div class="row" style="text-align: left">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="f_username">Email:</label>
                                <input type="text" name="f_username" id="f_username" x-model="f_user_n" class="form-control input-lg" placeholder="Email">
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="f_secret_phrase">Secret Phrase:</label>
                                    <div class="buttonIn">
                                        <input type="text" id="f_secret_phrase" name="f_secret_phrase" x-ref="secret_phrase" x-model="f_secret_p" class="form-control input-lg" placeholder="Secret Phrase" autocomplete=off>
                                        <button type="button" id="clear" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em; display: inline" x-on:click="generate_secret_phrase">Generate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" x-model="password" class="form-control input-lg" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password:</label>
                                    <input type="password" name="confirmPassword" id="confirmPassword" x-model="confirmPassword" class="form-control input-lg" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <input type="password" name="role" id="role" x-model="role" class="form-control input-lg" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" style="display: none">
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <input type="password" name="status" id="status" x-model="status" class="form-control input-lg" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    <br>
                    </div>
                    <button type="button" class="btn btn-success" style="width: 50%" x-ref="submit_farmer_button" x-on:click="update_farmer_details">Update</button>
                    <br>
                </div>
                <hr>
                <div class="column" style="text-align: center">
                    <template x-if="info_no_farmer != 1">
                        <button type="button" class="btn btn-success" style="width: 25%; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="back_farmer">Back</button>
                    </template>
                    
                    <template x-if="info_no_farmer != 3">
                        <button type="button" class="btn btn-success" style="width: 25%; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em " x-on:click="next_farmer">Next</button>
                    </template>
                </div>
            </form>
        </div>
        <div class="popup-child2">
            <button type="button" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_register">X</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('edit_farmer_details_modal', () => ({
            info_no_farmer: 1,

            next_farmer(){
                if(this.info_no_farmer < 3){
                    this.info_no_farmer = (this.info_no_farmer + 1);
                }
            },

            back_farmer(){
                if(this.info_no_farmer > 1){
                    this.info_no_farmer = (this.info_no_farmer - 1);
                }
            },
        }));
    });
</script>