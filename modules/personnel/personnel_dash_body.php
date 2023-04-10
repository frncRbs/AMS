<?php
    include_once('../../includes/header.php');
    // session_start();
?>
    <div x-data="personnel_side" x-init="get_services_crops(), initialize_registry(), initialize_farmer_details(), initialize_home_title_details(), initialize_personnel_details()">
        <?php include('show_farmer_request_modal.php'); ?>
        <?php include('add_crop_modal.php'); ?>
        <?php include('add_service_modal.php'); ?>
        <?php include('manage_farmer_modal.php'); ?>
        <?php include('manage_personnel_modal.php'); ?>
        <?php include('edit_home_title_modal.php'); ?>
        <?php include('edit_home_image_modal.php'); ?>
        <?php include('edit_personnel_details_modal.php'); ?>
        <?php include('edit_farmer_details_modal.php'); ?>
        <?php include('show_user_profile_modal.php'); ?>
        <?php include('loading_modal.php'); ?>
        <?php include('decline_request_modal.php'); ?>
        <?php include('decline_registration_modal.php'); ?>
        <?php include('register_farmer_modal.php'); ?>


        <div class="sidebar">
            <center>
                <img src="<?php echo IMAGES; ?>LOGO.png" class="profile_image" alt="">
            </center>
            <hr style="color: white">
            <nav class="navDash">
            <ul>
                <li><a href="farmer_dash_body.php" style="color: rgba(0, 255, 0, 0.8)"><i class="fas fa-desktop"></i><span>Dashboard</span></a></li>
                <template x-if="<?php echo $_SESSION["user_role"] == 'Admin' || $_SESSION["user_role"] == 'Personnel'?>">
                    <li class="dash" style="z-index: 10;">
                        <a href="#"><i class="fas fa-cogs"></i><span>Features</span></a>
                        <ul>
                            <template x-if="<?php echo $_SESSION["user_role"] == 'Personnel' || $_SESSION["user_role"] == 'Admin'?>">
                                <li><a type="button" x-on:click="show_farmer_registration_form = true"  style="color: white"><i class="fas fa-user-plus"></i><span>Register Farmer</span></a></li>
                            </template>

                            <template x-if="<?php echo $_SESSION["user_role"] == 'Admin'?>">
                                <li><a type="button" x-on:click="show_personnel_registration_form = true"  style="color: white"><i class="fas fa-user-plus"></i><span>Register Coordinator</span></a></li>
                            </template>
                            
                            <template x-if="<?php echo $_SESSION["user_role"] == 'Admin'?>">
                                <li class="dash_two split"><a href="#"><i class="fas fa-plus-square"></i><span>Set Program</span></a>
                                <ul>
                                    <li><a type="button" x-on:click="show_crops_form = true" style="color: white"><i class="fas fa-plus-square"></i><span>Crops</span></a></li>
                                    <li><a type="button" x-on:click="show_services_form = true" style="color: white"><i class="fas fa-plus-square"></i><span>Services</span></a></li>
                                </ul>
                            </template>
                    </li>

                    <template x-if="<?php echo $_SESSION["user_role"] == 'Admin'?>">
                        <li><a type="button" x-on:click="show_manage_personnel_form = true" style="color: white"><i class="fa fa-user-secret"></i><span style="font-size: 16px">Manage Personnels Account</span></a></li>
                    </template>

                    <template x-if="<?php echo $_SESSION["user_role"] == 'Personnel'?>">
                        <li><a type="button" x-on:click="show_manage_farmer_form = true" style="color: white"><i class="fa fa-users"></i><span style="font-size: 16px">Manage Farmers Account</span></a></li>
                    </template>
                </template>
                </ul>
                </li>
            </ul>
            <hr style="color: white">
            </nav>
            <nav class="nav2">
            <ul>
                <li><a type="button" style="color: white" x-on:click="get_current_user_details()"><i class="fas fa-user-circle"></i><span>Profile</span></a></li>
                <template x-if="<?php echo $_SESSION["user_role"] == 'Admin'; ?>">
                    <li class="dropdown">
                    <a type="button" style="color: white"><i class="fas fa-tools"></i><span>Home Features</span></a>
                        <ul>
                            <li><a type="button" x-on:click="show_home_image_form = true" style="color: white"><i class="fas fa-wrench"></i><span style="font-size: 14px">Manage Home Image Carousell</span></a></li>
                            <li><a type="button" x-on:click="show_home_content_form = true" style="color: white"><i class="fas fa-wrench"></i><span style="font-size: 14px">Manage Home Title Content</span></a></li>
                        </ul>
                    </li>
                </template>
                <template x-if="<?php echo $_SESSION["user_role"] == 'Farmer'; ?>">
                    <li class="dropdown">
                        <a type="button" style="color: white"><i class="fas fa-tools"></i><span>Request Services</span></a>
                        <ul>
                            <li><a type="button" x-on:click="show_request_crop_form = true" style="color: white"><i class="fas fa-wrench"></i><span style="font-size: 20px">Request Crop</span></a></li>
                            <li><a type="button" x-on:click="show_request_service_form = true" style="color: white"><i class="fas fa-wrench"></i><span style="font-size: 20px">Request Service</span></a></li>
                        </ul>
                    </li>
                </template>
            </ul>
        </nav>
    </div>
        
        <!-- Success Registration Prompt -->
        <div class="popupSuccess_register" x-show="show_success_registration_form" style="display: none">
            <div class="popup-contentSuccess_register">
                <div class="popup-child1" style="margin-bottom: 5px">
                    <div style="display: flex;  ">
                        <h1 style="font-weight: bolder">Account Successfully Created!</h1>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-success" style="width: 50%" x-on:click="confirm_reset">Confirm</button>
                <div class="popup-child2">
                    <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_reset">X</a>
                </div>
            </div>
        </div>

        <!-- Success Update Prompt Personnel/Farmer -->
        <div class="popupSuccess_register" x-show="show_success_update_form" style="display: none">
            <div class="popup-contentSuccess_register">
                <div class="popup-child1" style="margin-bottom: 5px">
                    <div style="display: flex;  ">
                        <h1 style="font-weight: bolder">Account Successfully Updated!</h1>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-success" style="width: 50%" x-on:click="confirm_reset">Confirm</button>
                <div class="popup-child2">
                    <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_reset">X</a>
                </div>
            </div>
        </div>
        
        <!-- Farmer Registration Form -->      
        <div class="popup3" x-show="show_personnel_registration_form" style="display: none;">
            <div class="popup-content3">
                <div class="popup-child1">
                    <form>
                    <span>
                        <h3 style="color: red" x-text="admin_error_msg"></h3>
                    </span>
                    <h1 style="font-weight: bolder">Register Coordinators Account</h1>
                        <br>
                        <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no == 1" style="display: none;">
                            <div style="width: 100%; padding: 0 20px 0 20px">
                            <h3 style="font-weight: bold">Coordinators Information</h3>
                            
                            <div class="row" style="text-align: left">
                                <div class="column">
                                <hr>
                                    <div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 10px;">
                                        <label for="role_service">Register for: </label>
                                        <select class="selectD" name="role_service" id="role_service" x-ref="role_service" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
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
                                            
                                            <input type="number" name="contact_no" id="contact_no" x-ref="contact_no" class="form-control input-lg" tabindex="6" placeholder="Contact Number" required="" autocomplete="off" pattern="\d{11}">
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
                                        <label for="username">Email:</label>
                                        <input type="username" name="username" id="username" x-ref="username" class="form-control input-lg" placeholder="Email">
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

        <!-- Deactivate Personnel/Farmer Service Request Prompt -->
        <div class="popupDecline_request" x-show="show_deactivate_personnel_account_form" style="display: none">
            <div class="popup-contentDecline_request">
                <div class="popup-child1" style="margin-bottom: 5px; display: flex; flex-direction: column">
                    <div>
                        <h2 style="font-weight: bolder">Are you sure you want to deactivate? <span x-text="p_fn"></span></h2>
                    </div>
                    <hr>
                    <div style="display: flex; justify-content: space-around">
                        <button type="button" class="btn btn-success" style="max-width: 100%" x-on:click="deactivate_personnel_account">Yes</button>
                        <button type="button" class="btn btn-danger" style="max-width: 100%" x-on:click="confirm_reset">No</button>
                    </div>
                </div>
                <div class="popup-child2">
                    <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_reset">X</a>
                </div>
            </div>
        </div>

        <!-- Deactivate Personnel/Farmer Service Request Prompt -->
        <div class="popupDecline_request" x-show="show_deactivate_farmer_account_form" style="display: none">
            <div class="popup-contentDecline_request">
                <div class="popup-child1" style="margin-bottom: 5px; display: flex; flex-direction: column">
                    <div>
                        <h2 style="font-weight: bolder">Are you sure you want to deactivate? <span x-text="f_firstname"></span></h2>
                    </div>
                    <hr>
                    <div style="display: flex; justify-content: space-around">
                        <button type="button" class="btn btn-success" style="max-width: 100%" x-on:click="deactivate_farmer_account">Yes</button>
                        <button type="button" class="btn btn-danger" style="max-width: 100%" x-on:click="confirm_reset">No</button>
                    </div>
                </div>
                <div class="popup-child2">
                    <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_reset">X</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row-fluid" style="background-color: white; min-height: 600px; padding:10px;">
                    <div class="span12">
                            <div class="printGrp" style="display: flex; flex-direction: row; gap: 20px; justify-content: flex-end; padding: 15px 0 15px 0; 
                            margin-top: 10px; flex-wrap: wrap; background: #2f323a; position: relative ">
                                <div style="left: 10px; position: absolute">
                                    <h3 style="font-weight: bolder; color: white">WELCOME <?php echo strtoupper($_SESSION["user_firstname"]); ?></h3>
                                </div> 
                                <div style="margin: 0 10px 0 0">
                                    <button class="btn btn-success" style="color: rgba(0, 0, 0, 0);" disabled>Generate Report</button>
                                    <button class="btn btn-success" style="color: rgba(0, 0, 0, 0);" disabled>Generate Report</button>
                                    <button class="btn btn-success" style="color: rgba(0, 0, 0, 0);" disabled>Generate Report</button>
                                </div>
                                </div>
                                
                                <hr>
                                <div style="display: flex; align-self: flex-end">
                                    <input type="search_farmer" placeholder="Search Request" x-model="search_request" x-on:keyup="search_request_func()" x-on:keyup.backspace="search_request_func()">
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm" id="admintable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Commodity</th>
                                                <th>Sex</th>
                                                <th>Date Requested</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-if="registry_records">
                                                <template x-for="(row, index) in custom_pagination(registry_records)">
                                                    <tr>
                                                        <th scope="row"><span x-text="(index + 1)"></span></th>
                                                        <td><span x-text="get_farmer_first_name(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_middle_name(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_last_name(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_role_service(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_sex(row.user_id)"></span></td>
                                                        <td><span x-text="row.date_requested"></span></td>
                                                        <td>
                                                            <!-- <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="decline_request(row.request_id, row.user_id, 'Crop')">View</button> -->
                                                            <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="show_farmer_request_form = true, get_farmer_records(row.user_id), f_user_id = row.user_id">View</button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </template>
                                        </tbody>
                                    </table>
                                    
                                    <div style="display: flex; flex-direction: row; justify-content: space-evenly">
                                        <button class="btn btn-success" x-on:click="prevPage" :disabled="pageNumber==0" >Back</button>
                                        <button class="btn btn-success" x-on:click="nextPage" :disabled="pageNumber >= pageCount() -1">Next</button>
                                    </div>

                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        document.addEventListener('alpine:init', () => {
        Alpine.data('personnel_side', () => ({
                // MODAL-FORMS
                show_personnel_registration_form: false,
                show_farmer_registration_form: false,
                update_personnel_registration_form: false,
                update_farmer_registration_form: false,
                show_crops_form: false,
                show_manage_farmer_form: false,
                show_manage_personnel_form: false,
                show_success_registration_form: false,
                show_services_form: false,
                show_personnel_requestForm: false,
                show_farmer_request_form: false,
                show_decline_request_form: false,
                show_decline_registration_form: false,
                show_decline_account_regform: false,
                show_approve_account_regform: false,
                show_deactivate_personnel_account_form: false,
                show_deactivate_farmer_account_form: false,
                show_success_update_form: false,
                show_home_content_form: false,
                show_home_image_form: false,
                show_user_profile_form: false,
                show_loading_form: false,
                admin_error_msg: '',
                admin_success_msg: '',
                
                //ONE WAY DATA
                error_admin: false,
                info_no: 1,
                home_title_records: [],
                farmer_records: [],
                farmer_records_backup: [],
                registry_records: [],
                registry_records_backup: [],
                user_details: [],
                user_details_backup: [],
                personnel_details: [],
                personnel_details_backup: [],
                crops: [],
                services: [],
                search_request: '',

                // CURRENT USER DETAILS
                r_request_id: 0,
                r_user_id: 0,
                f_user_id: 0,

                // CURRENT PERSONNEL DETAILS
                p_id: 0,
                p_fn: '',
                p_mn: '',
                p_ln: '',
                p_role_s: '',
                p_b_date: '',
                p_c_status: '',
                p_seggs: '',
                p_c_no: '',
                p_rel: '',
                p_b_place: '',
                p_a_street: '',
                p_a_barangay: '',
                p_a_street: '',
                p_a_municipality: '',
                p_user_n: '',
                p_secret_p: '',
                p_role: '',
                p_is_active: '',

                // CURRENT USER DETAILS
                cu_full_name: '',
                cu_firstname: '',
                cu_middlename: '',
                cu_lastname: '',
                cu_role_s: '',
                cu_birth_d: '',
                cu_civil_s: '',
                cu_sex: '',
                cu_contact: '',
                cu_religion: '',
                cu_birth_p: '',
                cu_address_s: '',
                cu_address_b: '',
                cu_address_m: '',
                cu_address_z: '',
                cu_guardian_fn: '',
                cu_guardian_c: '',
                cu_farm_t: '',
                cu_farm_b: '',
                cu_farm_m: '',
                cu_farm_a: '',
                cu_user_n: '',
                cu_secret_p: '',
                cu_id: '',

                cu_address_m_text: '',
                cu_address_b_text: '',
                cu_user_n_text: '',
                cu_contact_text: '',
                cu_image: '',
                
                // CURRENT FARMER DETAILS
                f_full_name: '',
                f_firstname: '',
                f_middlename: '',
                f_lastname: '',
                f_role_s: '',
                f_birth_d: '',
                f_civil_s: '',
                f_sex: '',
                f_contact: '',
                f_religion: '',
                f_birth_p: '',
                f_address_s: '',
                f_address_b: '',
                f_address_m: '',
                f_address_z: '',
                f_guardian_fn: '',
                f_guardian_c: '',
                f_farm_t: '',
                f_farm_b: '',
                f_farm_m: '',
                f_farm_a: '',
                f_user_n: '',
                f_secret_p: '',
                f_status: '',
                f_is_active: '',
                f_id: '',


                initialize_registry(){
                    this.registry_records  = '<?php  
                        $database = new Connection();
                        $db = $database->open();
                        $sql = $db->prepare("SELECT * FROM requests_registry GROUP BY user_id ORDER BY date_requested DESC");
                        $sql->execute();
                        $results = $sql->fetchAll();
                        $database->close();

                        echo json_encode($results);
                    ?>';
                    this.registry_records = JSON.parse(this.registry_records);
                    this.registry_records_backup = this.registry_records;
                    // setTimeout(() => {
                    //     console.log(JSON.parse(this.registry_records));
                    // }, 1500);
                },

                initialize_farmer_details(){
                    this.user_details  = '<?php  
                        $database = new Connection();
                        $db = $database->open();
                        $sql = $db->prepare("SELECT * FROM user WHERE role = 'Farmer' ORDER BY date_registered DESC");
                        $sql->execute();
                        $results = $sql->fetchAll();
                        $database->close();

                        echo json_encode($results);
                    ?>';
                    this.user_details = JSON.parse(this.user_details);
                    this.user_details_backup = this.user_details;
                    // setTimeout(() => {
                    //     console.log(JSON.parse(this.user_details));
                    // }, 1500);
                },

                initialize_personnel_details(){
                    this.personnel_details  = '<?php  
                        $database = new Connection();
                        $db = $database->open();
                        $sql = $db->prepare("SELECT * FROM user WHERE role IN ('Personnel', 'Admin') ORDER BY date_registered DESC");
                        $sql->execute();
                        $results = $sql->fetchAll();
                        $database->close();

                        echo json_encode($results);
                    ?>';
                    this.personnel_details = JSON.parse(this.personnel_details);
                    this.personnel_details_backup = this.personnel_details;
                    // setTimeout(() => {
                    //     console.log(JSON.parse(this.user_details));
                    // }, 1500);
                },

                initialize_home_title_details(){ 
                    const rec = '<?php  
                        $database = new Connection();
                        $db = $database->open();
                        $sql = $db->prepare("SELECT * FROM home_content");
                        $sql->execute();
                        $results = $sql->fetchAll();
                        $database->close();

                        echo json_encode($results);
                    ;?>';
                    this.home_title_records = JSON.parse(rec);
                    this.$refs.title_id.value = this.home_title_records[0].id;
                    this.$refs.title11.value = this.home_title_records[0].content11;
                    this.$refs.title12.value = this.home_title_records[0].content12;
                    this.$refs.title21.value = this.home_title_records[0].content21;
                    this.$refs.title22.value = this.home_title_records[0].content22;
                    this.$refs.title31.value = this.home_title_records[0].content31;
                    this.$refs.title32.value = this.home_title_records[0].content32;
                },
                
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
                    this.info_no_farmer = 1;
                    this.show_personnel_registration_form = false;
                    this.update_personnel_registration_form = false;
                    this.update_farmer_registration_form = false;
                    this.show_farmer_registration_form = false;
                },
                
                exit_edit_home_features(){
                    this.show_home_content_form = false;
                    this.show_home_image_form = false;
                },

                confirm_farmer_request_exit(){
                    this.show_personnel_requestForm = false;
                    this.show_farmer_request_form = false;
                },

                confirm_reset(){
                    this.show_crops_form = false;
                    this.show_services_form = false;
                    this.show_services_form = false;
                    this.show_success_registration_form = false;
                    this.show_deactivate_personnel_account_form = false,
                    this.show_deactivate_farmer_account_form = false,
                    this.show_decline_request_form = false;
                    this.show_decline_registration_form = false;
                    this.show_success_update_form = false;
                },

                confirm_activate_account_exit(){
                    this.show_manage_farmer_form = false;
                    this.show_manage_personnel_form = false;
                },

                profile_account_exit(){
                    this.show_user_profile_form = false;
                },

                async submit_personnel_form(){
                    this.$refs.submit_personnel_button.disabled = false;
                    if(this.$refs.first_name.value && this.$refs.middle_name.value && this.$refs.last_name.value && this.$refs.role_service.value && this.$refs.birth_date.value && this.$refs.sex.value && this.$refs.contact_no.value && this.$refs.religion.value && this.$refs.birth_place.value && this.$refs.address_street.value && this.$refs.address_barangay.value && this.$refs.address_municipality.value && this.$refs.username.value && this.$refs.password.value){
                        if(this.$refs.password.value == this.$refs.confirmPassword.value){
                            const options = {
                                xsrfHeaderName: 'X-XSRF-TOKEN',
                                xsrfCookieName: 'XSRF-TOKEN',
                            }
                            let data = {
                                first_name: this.$refs.first_name.value,
                                middle_name: this.$refs.middle_name.value,
                                last_name: this.$refs.last_name.value,
                                role_service: this.$refs.role_service.value,
                                birth_date: this.$refs.birth_date.value,
                                sex: this.$refs.sex.value,
                                contact_no: this.$refs.contact_no.value,
                                religion: this.$refs.religion.value,
                                birth_place: this.$refs.birth_place.value,
                                address_street: this.$refs.address_street.value,
                                address_barangay: this.$refs.address_barangay.value,
                                address_municipality: this.$refs.address_municipality.value,
                                username: this.$refs.username.value,
                                password: this.$refs.password.value,
                                secret_phrase: this.$refs.secret_phrase.value,
                                role: this.$refs.role.value,
                                status: this.$refs.status.value,
                            }

                            await axios.post('../../controller/admin/register_personnel.php', data, options)
                            .then((response) => {
                                console.log(response.data);
                                this.$refs.submit_personnel_button.disabled = false;
                                // console.log('Kini: ' + (response.data == true));
                                if(response.data.status == 2) {
                                    this.error_admin = true;
                                    this.admin_error_msg = 'Email already taken!';
                                    setTimeout(() => {
                                        this.error_admin = false;
                                        this.admin_error_msg = '';
                                    }, 2000);
                                }
                                else if(response.data.status == 3){
                                    this.error_admin = true;
                                    this.admin_error_msg = 'Contact No. should start from 09 and eleven digit max!';
                                    setTimeout(() => {
                                        this.error_admin = false;
                                        this.admin_error_msg = '';
                                    }, 2000);
                                }
                                else if(response.data.status == 4){
                                    this.error_admin = true;
                                    this.admin_error_msg = 'Invalid email format!';
                                    setTimeout(() => {
                                        this.error_admin = false;
                                        this.admin_error_msg = '';
                                    }, 2000);
                                }
                                else if(response.data.status == 'true'){
                                    this.info_no = 1;
                                    this.show_personnel_registration_form = false;
                                    this.show_success_registration_form = true;
                                    this.personnel_details = response.data.personnel_update;
                                }
                            },
                            (error) => {
                                console.log(error);
                            });

                        }
                        else{
                            this.error_admin = true;
                            this.admin_error_msg = 'Password do not match!';
                            this.$refs.submit_personnel_button.disabled = false;
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                    }
                    else{
                        this.error_admin = true;
                        this.$refs.submit_personnel_button.disabled = false;
                        this.admin_error_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_admin = false;
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                },

                async register_farmer_details(){
                    this.$refs.submit_personnel_button.disabled = false;
                    if(this.$refs.f_first_name.value && this.$refs.f_middle_name.value && this.$refs.f_last_name.value && this.$refs.f_role_service.value && this.$refs.f_birth_date.value && this.$refs.f_civil_status.value && this.$refs.f_seggs.value && this.$refs.f_contact_no.value && this.$refs.f_rel.value && this.$refs.f_birth_place.value && this.$refs.f_address_street.value && this.$refs.f_address_barangay.value && this.$refs.f_address_municipality.value && this.$refs.f_address_zip.value && this.$refs.f_guardian_fname.value && this.$refs.f_guardian_contact.value && this.$refs.f_farm_type.value && this.$refs.f_farm_barangay.value && this.$refs.f_farm_municipality.value && this.$refs.f_farm_area.value && this.$refs.f_username.value && this.$refs.f_password.value && this.$refs.secret_phrase.value){
                        if(this.$refs.f_password.value == this.$refs.f_confirmPassword.value){
                            const options = {
                                xsrfHeaderName: 'X-XSRF-TOKEN',
                                xsrfCookieName: 'XSRF-TOKEN',
                            }
                            let data = {
                                first_name: this.$refs.f_first_name.value,
                                middle_name: this.$refs.f_middle_name.value,
                                last_name: this.$refs.f_last_name.value,
                                role_service: this.$refs.f_role_service.value,
                                birth_date: this.$refs.f_birth_date.value,
                                civil_status: this.$refs.f_civil_status.value,
                                sex: this.$refs.f_seggs.value,
                                contact_no: this.$refs.f_contact_no.value,
                                religion: this.$refs.f_rel.value,
                                birth_place: this.$refs.f_birth_place.value,
                                address_street: this.$refs.f_address_street.value,
                                address_barangay: this.$refs.f_address_barangay.value,
                                address_municipality: this.$refs.f_address_municipality.value,
                                address_zip: this.$refs.f_address_zip.value,
                                guardian_fname: this.$refs.f_guardian_fname.value,
                                guardian_contact: this.$refs.f_guardian_contact.value,
                                farm_type: this.$refs.f_farm_type.value,
                                farm_barangay: this.$refs.f_farm_barangay.value,
                                farm_municipality: this.$refs.f_farm_municipality.value,
                                farm_area: this.$refs.f_farm_area.value,
                                username: this.$refs.f_username.value,
                                password: this.$refs.f_password.value,
                                secret_phrase: this.$refs.secret_phrase.value,
                                role: this.$refs.f_role.value,
                                status: this.$refs.f_status.value,
                            }

                            await axios.post('../../controller/admin/register_farmer.php', data, options)
                            .then((response) => {
                                console.log(response.data);
                                this.$refs.submit_register_farmer_button.disabled = false;
                                // console.log('Kini: ' + (response.data == true));
                                if(response.data.status == 2) {
                                    this.error_admin = true;
                                    this.admin_error_msg = 'Email already taken!';
                                    setTimeout(() => {
                                        this.error_admin = false;
                                        this.admin_error_msg = '';
                                    }, 2000);
                                }
                                else if(response.data.status == 3){
                                    this.error_admin = true;
                                    this.admin_error_msg = 'Contact No. should start from 09 and eleven digit max!';
                                    setTimeout(() => {
                                        this.error_admin = false;
                                        this.admin_error_msg = '';
                                    }, 2000);
                                }
                                else if(response.data.status == 4){
                                    this.error_admin = true;
                                    this.admin_error_msg = 'Invalid email format!';
                                    setTimeout(() => {
                                        this.error_admin = false;
                                        this.admin_error_msg = '';
                                    }, 2000);
                                }
                                else if(response.data.status == 'true'){
                                    this.info_no = 1;
                                    this.show_farmer_registration_form = false;
                                    this.show_success_registration_form = true;
                                    this.user_details = response.data.farmer_update;
                                }
                            },
                            (error) => {
                                console.log(error);
                            });

                        }
                        else{
                            this.error_admin = true;
                            this.admin_error_msg = 'Password do not match!';
                            this.$refs.submit_register_farmer_button.disabled = false;
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                    }
                    else{
                        this.error_admin = true;
                        this.$refs.submit_register_farmer_button.disabled = false;
                        this.admin_error_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_admin = false;
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                },

                async submit_crop_form(){
                    this.$refs.submit_crop_button.disabled = false;
                    if(this.$refs.register_crop_name.value){
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            crop_name: this.$refs.register_crop_name.value,
                        }

                        await axios.post('../../controller/admin/register_crop.php', data, options)
                        .then((response) => {
                            // console.log(response.data);
                            this.$refs.submit_crop_button.disabled = false;
                            // console.log('Kini: ' + (response.data == true));
                            if(response.data.status == 'false') {
                                this.error_admin = true;
                                this.admin_error_msg = 'Crop is already registered!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                            else if(response.data.status == 'true'){
                                this.admin_success_msg = 'Crop successfully registered!';
                                // this.crops = [];
                                this.crops = response.data.crops;
                                // location.reload(); // Refresh current page
                                // console.log('hehe');
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_success_msg = '';
                                }, 2000);
                            }
                        },
                        (error) => {
                            console.log(error);
                        });
                    }
                    else{
                        this.error_admin = true;
                        this.$refs.submit_crop_button.disabled = false;
                        this.admin_error_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_admin = false;
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                },

                async submit_service_form(){
                    this.$refs.submit_service_button.disabled = false;
                    if(this.$refs.register_service_name.value){
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            service_name: this.$refs.register_service_name.value,
                        }

                        await axios.post('../../controller/admin/register_service.php', data, options)
                        .then((response) => {
                            this.$refs.submit_service_button.disabled = false;
                            if(response.data.status == 'false') {
                                this.error_admin = true;
                                this.admin_error_msg = 'Service is already registered!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                            else if(response.data.status == 'true'){
                                this.admin_success_msg = 'Service successfully registered!';
                                this.services = response.data.services;
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_success_msg = '';
                                }, 2000);
                            }
                        },
                        (error) => {
                            console.log(error);
                        });
                    }
                    else{
                        this.error_admin = true;
                        this.$refs.submit_service_button.disabled = false;
                        this.admin_error_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_admin = false;
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                },
                
                async generate_secret_phrase(){
                    await axios.get('../../controller/admin/generate_secret_key.php')
                    .then((response) => {
                        this.$refs.secret_phrase.value = response.data;
                    });
                },

                async get_farmer_first_name(user_id){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: user_id,
                    };
                    await axios.post('../../controller/admin/farmer_info/get_farmer_first_name.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        farmer_first_name = response.data;
                    }); 
                    return farmer_first_name ? farmer_first_name : '';
                }, // return response.data;

                async get_farmer_middle_name(user_id){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: user_id,
                    };
                    await axios.post('../../controller/admin/farmer_info/get_farmer_middle_name.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        farmer_middle_name = response.data;
                    }); 
                    return farmer_middle_name ? farmer_middle_name : '';
                }, // return response.data;

                async get_farmer_last_name(user_id){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: user_id,
                    };
                    await axios.post('../../controller/admin/farmer_info/get_farmer_last_name.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        farmer_last_name = response.data;
                    }); 
                    return farmer_last_name ? farmer_last_name : '';
                }, // return response.data;

                async get_farmer_role_service(user_id){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: user_id,
                    };
                    await axios.post('../../controller/admin/farmer_info/get_farmer_role_service.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        farm_type = response.data;
                    }); 
                    return farm_type == 1 ? 'High Value Crops' : (farm_type == 2 ? 'Corn Value Crop' : 'Rice Crop');
                }, // return response.data;

                async get_farmer_sex(user_id){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: user_id,
                    };
                    await axios.post('../../controller/admin/farmer_info/get_farmer_sex.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        farmer_sex = response.data;
                    }); 
                    return farmer_sex == 1 ? 'Male' : 'Female';
                },

                export_url: '',
                async get_farmer_records(user_id){
                    this.export_url = '../../controller/exports/export_farmer_request.php?key_id=' + user_id;
                    // console.log(user_id);
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: user_id
                    };
                    await axios.post('../../controller/admin/get_farmer_details.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        this.farmer_records = response.data;
                    }); 
                },

                async get_services_crops(){
                    await axios.get("../../controller/admin/get_crops_services.php")
                    .then((response)=>{
                        this.crops = (response.data.crops);
                        this.services = (response.data.services);
                    });
                },
                
                async get_service_name(crop_id, service_id){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        crop_id: crop_id,
                        service_id: service_id,
                    };
                    await axios.post('../../controller/admin/get_service_name.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        service_name = response.data;
                    }); 
                    return service_name ? service_name : '';
                    // return response.data;
                }, // return response.data;

                async get_service_remarks(crop_id, service_id){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        crop_id: crop_id,
                        service_id: service_id,
                    };
                    await axios.post('../../controller/admin/get_service_remarks.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        service_remarks = response.data;
                    }); 
                    return service_remarks ? service_remarks : '';
                    // return response.data;
                },

                async get_personnel_records(user_id){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: user_id
                    };
                    await axios.post('../../controller/admin/get_farmer_details.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        this.farmer_records = response.data;
                    }); 
                },

                async approve_request(request_id, user_id, request_type){
                    this.$refs.declinerequest_button.disabled = true;
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        request_id: request_id,
                        user_id: user_id,
                        request_type: request_type,
                        decline_message: this.$refs.decline_message.value,
                    };

                    let mail_data = {
                        user_id: user_id,
                        subject: request_type + ' REQUEST',
                        message: this.$refs.decline_message.value,
                    };
                    this.show_loading_form = true;
                    await axios.post('../../controller/admin/decline_farmer_request.php', data, options)
                    .then((response) => {
                        if(response.data.status == 'true'){
                            this.farmer_records = response.data.requests;
                            this.show_decline_request_form = false;

                            axios.post('../../controller/sendmail/sendmail.php', mail_data, options)
                            .then((mail_response) => {
                                console.log(mail_response.data);
                                this.farmer_records = response.data.requests;
                                setTimeout(() => {
                                    this.show_loading_form = false;
                                    this.$refs.declinerequest_button.disabled = false;
                                    this.$refs.decline_message.value = '';
                                }, 2000);
                            });
                        }
                    }); 
                },

                r_request_type: '',
                async decline_request(request_id, user_id, request_type){
                    this.$refs.declinerequest_button.disabled = true;
                    // console.log(this.$refs.decline_message2.value);
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        request_id: request_id,
                        user_id: user_id,
                        request_type: request_type,
                        decline_message: this.$refs.decline_message2.value,
                    };

                    let mail_data = {
                        user_id: user_id,
                        subject: request_type + ' REQUEST',
                        message: this.$refs.decline_message2.value,
                    };
                    this.show_loading_form = true;
                    await axios.post('../../controller/admin/decline_farmer_request.php', data, options)
                    .then((response) => {
                        if(response.data.status == 'true'){
                            this.farmer_records = response.data.requests;
                            this.show_decline_request_form = false;

                            axios.post('../../controller/sendmail/sendmail.php', mail_data, options)
                            .then((mail_response) => {
                                console.log(mail_response.data);
                                this.farmer_records = response.data.requests;
                                setTimeout(() => {
                                    this.show_loading_form = false;
                                    this.$refs.declinerequest_button.disabled = false;
                                    this.$refs.decline_message.value = '';
                                }, 2000);
                            });
                        }
                    }); 
                },

                async decline_registration(f_id){
                    this.$refs.declinerequest_button.disabled = true;
                    // console.log(this.$refs.decline_message2.value);
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        id: f_id,
                    };

                    let mail_data = {
                        id: f_id,
                        message: this.$refs.decline_message_reg.value,
                    };
                    this.show_loading_form = true;
                    await axios.post('../../controller/admin/decline_farmer_registration.php', data, options)
                    .then((response) => {
                        if(response.data.status == 'true'){
                            this.farmer_records = response.data.farmer_update;
                            this.show_decline_registration_form = false;

                            axios.post('../../controller/sendmail/sendmail_disapprove.php', mail_data, options)
                            .then((mail_response) => {
                                console.log(mail_response.data);
                                this.farmer_records = response.data.requests;
                                setTimeout(() => {
                                    this.show_loading_form = false;
                                    this.$refs.declinerequest_button.disabled = false;
                                    this.$refs.decline_message.value = '';
                                }, 2000);
                            });
                        }
                    }); 
                },

                async approve_farmer(){
                    this.$refs.declinerequest_button.disabled = true;
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        id: this.f_id,
                        // decline_message: this.$refs.decline_message.value,
                    };

                    let mail_data = {
                        farmer_id: this.f_id,
                    };
                    this.show_loading_form = true;
                    await axios.post('../../controller/admin/approve_farmer_registration.php', data, options)
                    .then((response) => {
                        if(response.data.status == 'true'){
                            this.farmer_records = response.data.farmer_update;
                            this.show_decline_request_form = false; 
                            // console.log(response.data.status);
                            axios.post('../../controller/sendmail/sendmail_approve.php', mail_data, options)
                            .then((mail_response) => {
                                console.log(mail_response.data);
                                this.farmer_records = response.data.farmer_update;
                                setTimeout(() => {
                                    this.show_loading_form = false;
                                    this.$refs.declinerequest_button.disabled = false;
                                    this.$refs.decline_message.value = '';
                                }, 2000);
                            });
                        }
                        else{
                            this.error_admin = true;
                            this.admin_error_msg = 'Sorry cannot approve account!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                    }); 
                },

                async delete_crops(crop_id){
                    // console.log(crop_id);
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        crop_id: crop_id,
                    };
                    await axios.post('../../controller/admin/delete_crop.php', data, options)
                    .then((response) => {
                        // console.log(response.data.requests);
                        if(response.data.status != 'true'){
                            this.admin_error_msg = response.data.status;
                            setTimeout(() => {
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                        else {
                            if(response.data.crops.length == 0){
                                window.location = '<?php echo LOCATION; ?>modules/admin/admin_dash_body.php';
                            }
                            else{
                                this.crops = response.data.crops;
                            }
                        }
                        
                    }); 
                    // return crop_name ? crop_name : '';
                },

                async delete_services(service_id){
                    console.log(service_id);
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        service_id: service_id,
                    };
                    await axios.post('../../controller/admin/delete_service.php', data, options)
                    .then((response) => {
                        console.log(response.data.services);
                        if(response.data.status != 'true'){
                            this.admin_error_msg = response.data.status;
                            setTimeout(() => {
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                        else {
                            if(response.data.services.length == 0){
                                window.location = '<?php echo LOCATION; ?>modules/admin/admin_dash_body.php';
                            }
                            else{
                                this.services = response.data.services;
                            }
                        }
                        
                    }); 
                    // return crop_name ? crop_name : '';
                },

                async search_request_func(){
                    const preseve_rec = this.registry_records;
                    this.registry_records = [];

                    if(this.search_request != ''){
                        for (const key in preseve_rec) {
                            if (Object.hasOwnProperty.call(preseve_rec, key)) {
                                const element = preseve_rec[key];
                                let row_record = (await this.get_farmer_first_name(element.user_id) +' '+ await this.get_farmer_middle_name(element.user_id) +' '+ await this.get_farmer_last_name(element.user_id) +' '+ await this.get_farmer_role_service(element.user_id) +' '+ await this.get_farmer_sex(element.user_id)).toLowerCase();
                                
                                if(row_record.includes(this.search_request.toLowerCase())){
                                    this.registry_records.push(element);
                                };
                            }
                        }
                    }
                    else {
                        this.registry_records = this.registry_records_backup;
                    }
                },

                async update_program_status(program_id, status, type){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        program_id: program_id,
                        status: status,
                        type: type.toLowerCase(),
                    };

                    // console.log(program_id, status, type);

                    await axios.post('../../controller/admin/update_program_status.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        if(response.data.status == 'true'){
                            if(type == 'Crops'){
                                this.crops = response.data.programs;
                            }
                            else {
                                this.services = response.data.programs;
                            }
                            // Success Messages
                        }
                        else {
                            // Error Messages
                        }
                    }); 
                },

                async update_farmer_request_status(crop_id, service_id, type){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        crop_id: crop_id,
                        service_id: service_id,
                        type: type.toLowerCase(),
                    };

                    // console.log(program_id, status, type);
                    
                    await axios.post('../../controller/admin/update_farmer_request_status.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        if(response.data.status == 'true'){
                            if(type == 'Crops'){
                                this.crops = response.data.programs;
                            }
                            else{
                                this.services = response.data.programs;
                            }
                            // Success Messages
                        }
                        else {
                            // Error Messages
                        }
                    }); 
                }, 

                async update_home_title_form(){
                    this.$refs.submit_home_title_button.disabled = false;
                    if(this.$refs.title11.value && this.$refs.title12.value && this.$refs.title21.value && this.$refs.title22.value && this.$refs.title31.value && this.$refs.title31.value){
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            content11: this.$refs.title11.value,
                            content12: this.$refs.title12.value,
                            content21: this.$refs.title21.value,
                            content22: this.$refs.title22.value,
                            content31: this.$refs.title31.value,
                            content32: this.$refs.title32.value,
                            id: this.$refs.title_id.value,
                        };

                        await axios.post('../../controller/admin/update_home_title.php', data, options)
                        .then((response) => {
                            // console.log(response.data);
                            this.$refs.submit_home_title_button.disabled = true;

                            if(response.data.status == 'false') {
                                this.error_admin = true;
                                this.admin_error_msg = 'Something went wrong cannot update title!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                            else if(response.data.status == 'true'){
                                this.admin_success_msg = 'Titles successfully updated!';
                                this.home_title_records = response.data.title;
                                setTimeout(() => {
                                    this.$refs.submit_home_title_button.disabled = false;
                                    this.error_admin = false;
                                    this.admin_success_msg = '';
                                }, 2000);
                            }
                        },
                        (error) => {
                            console.log(error);
                        });
                    }
                    else{
                        this.error_admin = true;
                        this.$refs.submit_home_title_button.disabled = false;
                        this.admin_error_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_admin = false;
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                },

                async update_personnel_details(){
                    if(this.p_role_s && this.p_fn && this.p_mn && this.p_ln && this.p_c_no && this.p_b_date && this.p_b_place && this.p_seggs && this.p_rel && this.p_a_street && this.p_a_barangay && this.p_a_municipality && this.p_user_n && this.p_role){
                        const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                        };
                        let data = {
                            first_name: this.p_fn,
                            middle_name: this.p_mn,
                            last_name: this.p_ln,
                            role_service: this.p_role_s,
                            birth_date: this.p_b_date,
                            civil_status: this.p_c_status,
                            sex: this.p_seggs,
                            contact_no: this.p_c_no,
                            religion: this.p_rel,
                            birth_place: this.p_b_place,
                            address_street: this.p_a_street,
                            address_barangay: this.p_a_barangay,
                            address_municipality: this.p_a_municipality,
                            username: this.p_user_n,
                            role: this.p_role,
                            id: this.p_id,
                            // p_secret_phrase: true,
                        };
                        // this.admin_error_msg = 'Pasok sa database!';
                        await axios.post('../../controller/admin/update_personnel_details.php', data, options)
                        .then((response) => {
                            console.log(response.data);
                            if(response.data.status == 'true') {
                                this.info_no = 1;
                                this.personnel_details = response.data.personnel_update;
                                this.update_personnel_registration_form = false;
                                this.show_success_update_form = true;
                            }
                            else if(response.data.status == 2){
                                //error msg
                                this.admin_error_msg = 'Contact No. should start from 09 and eleven digit max!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                            else if(response.data.status == 3){
                                //error msg
                                this.error_admin = true;
                                this.admin_error_msg = 'Invalid email format!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                        });
                    }
                    else{
                        this.error_admin = true;
                        this.$refs.submit_home_title_button.disabled = false;
                        this.admin_error_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_admin = false;
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                },

                async deactivate_personnel_account(){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        id: this.p_id,
                        is_active: this.p_is_active,
                    };
                    await axios.post('../../controller/admin/deactivate_personnel_account.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        if(response.data.status = 'true'){
                            this.info_no = 1;
                            this.personnel_details = response.data.personnel_update;
                            this.show_deactivate_personnel_account_form = false;

                            this.admin_success_msg = 'Personnel account successfully deactivated!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_success_msg = '';
                            }, 2000);
                        }else{
                            this.admin_error_msg = 'Cannot deactivate the account!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                    });
                },

                async deactivate_farmer_account(){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        id: this.f_id,
                        is_active: this.f_is_active,
                    };
                    await axios.post('../../controller/admin/deactivate_farmer_account.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        if(response.data.status = 'true'){
                            this.info_no = 1;
                            this.user_details = response.data.farmer_update;
                            this.show_deactivate_farmer_account_form = false;

                            this.admin_success_msg = 'Farmer registration successfully declined!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_success_msg = '';
                            }, 2000);
                        }else{
                            this.admin_error_msg = 'Cannot decline the account!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                    }); 
                },

                async activate_personnel_account(){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        id: this.p_id,
                        is_active: this.p_is_active,
                    };
                    await axios.post('../../controller/admin/activate_personnel_account.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        if(response.data.status = 'true'){
                            this.info_no = 1;
                            this.personnel_details = response.data.personnel_update;

                            this.admin_success_msg = 'Account successfully activated!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_success_msg = '';
                            }, 2000);
                        }else{
                            this.admin_error_msg = 'Cannot activate account!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                    }); 
                },

                async activate_farmer_account(){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        id: this.f_id,
                        is_active: this.f_is_active,
                    };
                    await axios.post('../../controller/admin/activate_farmer_account.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        if(response.data.status = 'true'){
                            this.info_no = 1;
                            this.user_details = response.data.farmer_update;
                            this.admin_success_msg = 'Account successfully activated!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_success_msg = '';
                            }, 2000);
                        }else{
                            this.admin_error_msg = 'Cannot activate the account!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                    }); 
                },

                async get_current_user_details(){
                    this.show_user_profile_form = true;
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: "<?php echo $_SESSION["login_user_id"]; ?>",
                    };
                    await axios.post('../../controller/admin/get_current_user_details.php', data, options)
                    .then((response) => {
                        
                        // Assign response to refs
                        setTimeout(() => {
                            this.cu_id = response.data[0].id;
                            this.cu_firstname = response.data[0].first_name;
                            this.cu_middlename = response.data[0].middle_name;
                            this.cu_lastname = response.data[0].last_name;
                            this.cu_contact = response.data[0].contact_no;
                            this.cu_full_name = response.data[0].first_name +' '+ response.data[0].middle_name +' '+response.data[0].last_name;
                            this.cu_birth_d = response.data[0].birth_date;
                            this.cu_birth_p = response.data[0].birth_place;
                            this.cu_sex = response.data[0].sex;
                            this.cu_religion = response.data[0].religion;
                            this.cu_address_s = response.data[0].address_street;
                            this.cu_address_b = response.data[0].address_barangay;
                            this.cu_address_m = response.data[0].address_municipality;
                            this.cu_address_z = response.data[0].address_zip;
                            this.cu_guardian_fn = response.data[0].guardian_fname;
                            this.cu_guardian_c = response.data[0].guardian_contact;
                            this.cu_farm_t = response.data[0].farm_type;
                            this.cu_farm_b = response.data[0].farm_barangay;
                            this.cu_farm_m = response.data[0].farm_municipality;
                            this.cu_farm_a = response.data[0].farm_area;
                            this.cu_role_s = response.data[0].role_service; //Kini
                            this.cu_civil_s = response.data[0].civil_status;
                            this.cu_user_n = response.data[0].username;
                            this.cu_secret_p = response.data[0].secret_phrase;
                            
                            this.cu_address_m_text = response.data[0].address_municipality;
                            this.cu_address_b_text = response.data[0].address_barangay;
                            this.cu_user_n_text = response.data[0].username;
                            this.cu_contact_text = response.data[0].contact_no;
                            this.cu_image = '../../assets/images/'+response.data[0].image;
                        }, 100);
                                         
                    }); 
                },

                async update_current_user_details(){
                    if(this.cu_firstname && this.cu_middlename && this.cu_lastname && this.cu_contact && this.cu_birth_d && this.cu_role_s && this.cu_birth_p && this.cu_sex && this.cu_religion && this.cu_address_s && this.cu_address_b && this.cu_address_m && this.cu_address_z && this.cu_guardian_fn && this.cu_guardian_c && this.cu_farm_t && this.cu_farm_b && this.cu_farm_m && this.cu_farm_a && this.cu_user_n && this.cu_civil_s){
                        const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                        };
                        let data = {
                            first_name: this.cu_firstname,
                            middle_name: this.cu_middlename,
                            last_name: this.cu_lastname,
                            role_service: this.cu_role_s,
                            birth_date: this.cu_birth_d,
                            civil_status: this.cu_civil_s,
                            sex: this.cu_sex,
                            contact_no: this.cu_contact,
                            religion: this.cu_religion,
                            birth_place: this.cu_birth_p,
                            address_street: this.cu_address_s,
                            address_barangay: this.cu_address_b,
                            address_municipality: this.cu_address_m,
                            address_zip: this.cu_address_z,
                            guardian_fname: this.cu_guardian_fn,
                            guardian_contact: this.cu_guardian_c,
                            farm_type: this.cu_farm_t,
                            farm_barangay: this.cu_farm_b,
                            farm_municipality: this.cu_farm_m, 
                            farm_area: this.cu_farm_a, 
                            username: this.cu_user_n,
                            // secret_phrase: this.cu_secret_p,
                            id: this.cu_id,
                        };
                        
                        await axios.post('../../controller/admin/update_current_user_details.php', data, options)
                        .then((response) => {
                            console.log(response.data);
                            if(response.data.status == 'true') {
                                this.info_no = 1;
                                this.personnel_details = response.data.personnel_update;
                                this.update_personnel_registration_form = false;
                                this.show_success_update_form = true;
                            }
                            else if(response.data.status == 2){
                                //error msg
                                this.admin_error_msg = 'Contact No. should start from 09 and eleven digit max!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                            else if(response.data.status == 3){
                                //error msg
                                this.error_admin = true;
                                this.admin_error_msg = 'Invalid email format!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                        });
                    }
                    else{
                        // console.log(response.data);
                        this.error_admin = true;
                        this.$refs.submit_home_title_button.disabled = false;
                        this.admin_error_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_admin = false;
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                },

                async update_farmer_details(){
                    
                    if(this.f_firstname && this.f_middlename && this.f_lastname && this.f_contact && this.f_role_s && this.f_birth_d && this.f_birth_p && this.f_sex && this.f_religion && this.f_address_s && this.f_address_b && this.f_address_m && this.f_address_z && this.f_guardian_fn && this.f_guardian_c && this.f_farm_t && this.f_farm_b && this.f_farm_m && this.f_farm_a && this.f_user_n && this.f_civil_s){
                        const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                        };
                        let data = {
                            first_name: this.f_firstname,
                            middle_name: this.f_middlename,
                            last_name: this.f_lastname,
                            role_service: this.f_role_s,
                            birth_date: this.f_birth_d,
                            civil_status: this.f_civil_s,
                            sex: this.f_sex,
                            contact_no: this.f_contact,
                            religion: this.f_religion,
                            birth_place: this.f_birth_p,
                            address_street: this.f_address_s,
                            address_barangay: this.f_address_b,
                            address_municipality: this.f_address_m,
                            address_zip: this.f_address_z,
                            guardian_fname: this.f_guardian_fn,
                            guardian_contact: this.f_guardian_c,
                            farm_type: this.f_farm_t,
                            farm_barangay: this.f_farm_b,
                            farm_municipality: this.f_farm_m, 
                            farm_area: this.f_farm_a, 
                            username: this.f_user_n,
                            // secret_phrase: this.f_secret_p,
                            id: this.f_id,
                        };
                        
                        await axios.post('../../controller/admin/update_farmer_details.php', data, options)
                        .then((response) => {
                            console.log(response.data);
                            if(response.data.status == 'true') {
                                this.info_no = 1;
                                this.user_details = response.data.farmer_update;
                                this.update_farmer_registration_form = false;
                                this.show_success_update_form = true;
                            }
                            else if(response.data.status == 2){
                                //error msg
                                this.admin_error_msg = 'Contact No. should start from 09 and eleven digit max!';

                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                            else if(response.data.status == 3){
                                //error msg
                                this.error_admin = true;
                                this.admin_error_msg = 'Invalid email format!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                        });
                    }
                    else{
                        // console.log(response.data);
                        this.error_admin = true;
                        this.admin_error_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_admin = false;
                            this.admin_error_msg = '';
                        }, 2000);
                    }
                },

                async approve_farmer_account(){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        id: this.f_id,
                        status: this.f_status,
                    };
                    let mail_data = {};
                    await axios.post('../../controller/admin/approve_farmer_registration.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        if(response.data.status = 'true'){
                            axios.post('../../controller/sendmail/sendmail_approve.php', mail_data, options)
                            .then((response) => {
                                console.log(response.data);
                            });
                            this.info_no = 1;
                            this.user_details = response.data.farmer_update;
                            this.admin_success_msg = 'Farmer registration approved!';

                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_success_msg = '';
                            }, 2000);
                            ax
                        }else{
                            this.admin_error_msg = 'Cannot approve this account!';
                            
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
                    }); 
                },

                async generate_farmer_request_report(){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        user_id: this.f_user_id,
                    };
                    await axios.post('../../controller/exports/export_farmer_request.php', data, options)
                    .then((response) => {
                        console.log(response.data);
                        // location.reload();
                    }); 
                },

                // Pagination Javascript
                'search': "",
                'pageNumber': 0,
                'size': 10,
                'total': "",

                custom_pagination(paginate_records) {
                    const start = this.pageNumber * this.size,
                    end = start + this.size;

                    // this.total = this.services.length;
                    this.total = paginate_records.length;
                    return this.registry_records.slice(start, end);
                },

                //Create array of all pages (for loop to display page numbers)
                pages() {
                    return Array.from({
                        length: Math.ceil(this.total / this.size),
                    });
                },

                //Next Page
                nextPage() {
                    this.pageNumber++;
                },

                //Previous Page
                prevPage() {
                    this.pageNumber--;
                },

                //Total number of pages
                pageCount() {
                    return Math.ceil(this.total / this.size);
                },

                //Return the start range of the paginated results
                startResults() {
                    return this.pageNumber * this.size + 1;
                },

                //Return the end range of the paginated results
                endResults() {
                    let resultsOnPage = (this.pageNumber + 1) * this.size;

                    if (resultsOnPage <= this.total) {
                        return resultsOnPage;
                    }

                    return this.total;
                },

                //Link to navigate to page
                viewPage(index) {
                    this.pageNumber = index;
                },
            }));
        });
    
    </script>
    <script>
        function myFunction2() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("mylist2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];
                if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

      document.getElementById("viewB").addEventListener("click", function(){
            document.querySelector(".popup").style.display = "flex";
        })

      document.getElementById("closeB").addEventListener("click", function(){
          document.querySelector(".popup").style.display = "none";
      })
      document.getElementById("nextB").addEventListener("click", function(){
            document.querySelector(".popup1").style.display = "flex";
            document.querySelector(".popup").style.display = "none";
        })
      document.getElementById("backB").addEventListener("click", function(){
            document.querySelector(".popup1").style.display = "none";
            document.querySelector(".popup").style.display = "flex";
        })
      document.getElementById("close1B").addEventListener("click", function(){
          document.querySelector(".popup1").style.display = "none";
      })
      document.getElementById("next1B").addEventListener("click", function(){
            document.querySelector(".popup2").style.display = "flex";
            document.querySelector(".popup1").style.display = "none";
        })
        document.getElementById("back1B").addEventListener("click", function(){
            document.querySelector(".popup2").style.display = "none";
            document.querySelector(".popup1").style.display = "flex";
        })
        document.getElementById("close2B").addEventListener("click", function(){
          document.querySelector(".popup2").style.display = "none";
      })
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<?php
    include_once('../../includes/footer.php');
?>