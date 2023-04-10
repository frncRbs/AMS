<?php
    include_once('../../includes/header.php');
    // session_start();
?>
<div x-data="farmer_side" x-init="get_services_crops(), initialize_farmer_details()">

    <?php include('show_user_profile_modal.php'); ?>
    <?php include('show_crop_request_form.php'); ?>
    <?php include('show_service_request_form.php'); ?>
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

                        <template x-if="<?php echo $_SESSION["user_role"] == 'Admin'?>">
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

        <!-- Deactivate Personnel/Farmer Service Request Prompt -->
        <div class="popupDecline_request" x-show="show_cancel_farmer_request_form" style="display: none">
            <div class="popup-contentDecline_request">
                <div class="popup-child1" style="margin-bottom: 5px; display: flex; flex-direction: column">
                    <div>
                        <h2 style="font-weight: bolder">Are you sure you want to decline request? <span x-text="f_firstname"></span></h2>
                    </div>
                    <hr>
                    <div style="display: flex; justify-content: space-around">
                        <button type="button" class="btn btn-success" style="max-width: 100%" x-on:click="decline_farmer_request">Yes</button>
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
                                    <input type="text" placeholder="Search Request" x-model="search_service" x-on:keyup="search_farmer_func()" x-on:keyup.backspace="search_farmer_func()">
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm" id="admintable">
                                        <thead>
                                            <tr>
                                            <th style="min-width: 150px; text-align: center">Program</th>
                                            <th style="min-width: 150px; text-align: center">Request Type</th>
                                            <th style="min-width: 150px; text-align: center">Service Remarks</th>
                                            <th style="min-width: 150px; text-align: center">Crops Kilo</th>
                                            <th style="min-width: 150px; text-align: center">Date Requested</th>
                                            <th style="min-width: 150px; text-align: center">Status</th>
                                            <th style="min-width: 150px; text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-if="c_farmer_requests">
                                                <template x-for="(row, index) in custom_pagination(c_farmer_requests)">
                                                <tr>
                                                    <td style="min-width: 150px; text-align: center"><span x-text="row.request_type"></span></td>
                                                    <td style="min-width: 150px; text-align: center"><span x-text="get_service_name(row.crop_id, row.service_id)"></span></td>
                                                    <td style="min-width: 150px; text-align: center"><span x-text="row.service_remarks ? row.service_remarks : 'N/A'"></span></td>
                                                    <td style="min-width: 150px; text-align: center"><span x-text="row.crops_kilo ? row.crops_kilo : 'N/A'"></span></td>
                                                    <td style="min-width: 150px; text-align: center"><span x-text="row.date_requested"></span></td>
                                                    
                                                    <td style="min-width: 150px; text-align: center">
                                                        <template x-if="row.request_status == 1">
                                                            <h4 style="color: green; font-weight: bold">Approved</h4>
                                                        </template>
                                                        <template x-if="row.request_status == 0 && row.is_cancelled == 0">
                                                            <h4 style="color: red; font-weight: bold">Pending</h4>
                                                        </template>
                                                        <template x-if="row.request_status == 2">
                                                            <h4 style="color: red; font-weight: bold">Declined</h4>
                                                        </template>
                                                        <template x-if="row.is_cancelled == 1">
                                                            <h4 style="color: red; font-weight: bold">Cancelled</h4>
                                                        </template>
                                                        <!-- <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">Delete</button> -->
                                                    </td>
                                                    <td style="min-width: 150px; text-align: center">
                                                        <template x-if="row.is_cancelled == 0 && row.request_status == 0">
                                                            <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="show_cancel_farmer_request_form = true, r_id = row.request_id, r_is_cancelled = row.is_cancelled">Cancel</button>
                                                        </template>
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
        Alpine.data('farmer_side', () => ({
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
                show_cancel_farmer_request_form: false,
                show_decline_account_regform: false,
                show_approve_account_regform: false,
                show_deactivate_personnel_account_form: false,
                show_decline_farmer_account_form: false,
                show_success_update_form: false,
                show_home_content_form: false,
                show_home_image_form: false,
                show_user_profile_form: false,
                show_loading_form: false,
                show_request_crop_form: false,
                show_request_service_form: false,
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
                c_farmer_requests: [],
                c_farmer_requests_backup: [],
                personnel_details: [],
                personnel_details_backup: [],
                crops: [],
                services: [],
                landing_page_msg_error: '',
                landing_page_msg_success: '',

                // CURRENT USER DETAILS
                r_request_id: 0,
                r_user_id: 0,
                f_user_id: 0,
                r_id: 0,
                r_is_cancelled: 0,

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
                    this.c_farmer_requests  = '<?php  
                        $database = new Connection();
                        $db = $database->open();
                        $c_user_id = $_SESSION["login_user_id"];
                        $sql = $db->prepare("SELECT * FROM requests_registry WHERE user_id = :user_id ORDER BY date_requested DESC");
                        $sql->execute(array(':user_id' => $c_user_id));
                        $results = $sql->fetchAll();
                        $database->close();

                        echo json_encode($results);
                    ?>';
                    this.c_farmer_requests = JSON.parse(this.c_farmer_requests);
                    this.c_farmer_requests_backup = this.c_farmer_requests;
                    // setTimeout(() => {
                    //     console.log(JSON.parse(this.c_farmer_requests));
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
                    //     console.log(JSON.parse(this.c_farmer_requests));
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

                exit_services(){
                    this.show_request_service_form = false;
                    this.show_request_crop_form = false;
                    this.show_services_form = false;
                    // this.user_id = 0;
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
                    this.show_decline_farmer_account_form = false,
                    this.show_cancel_farmer_request_form = false;
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
                                    this.c_farmer_requests = response.data.farmer_update;
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
                    await axios.get("../../controller/farmer/get_crops_services.php")
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
                    await axios.post('../../controller/farmer/get_service_name.php', data, options)
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
                        
                        await axios.post('../../controller/farmer/update_current_user_details.php', data, options)
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

                async request_service(){
                    
                    if(this.$refs.service_id.value && this.$refs.service_remarks.value){
                        this.$refs.request_service_button.disabled = true;
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            service_id: this.$refs.service_id.value,
                            crop_id: null,
                            crop_kilo: null,
                            service_remarks: this.$refs.service_remarks.value,
                            user_id: this.user_id,
                            request_type: 'Service',
                        };
                        await axios.post('../../controller/farmer/request_service.php', data, options)
                        .then((response) => {
                            this.$refs.request_service_button.disabled = false;
                            // console.log(response.data)
                            this.landing_page_msg_success = 'Service Successfully Requested!';
                            setTimeout(() => {
                                this.landing_page_msg_success = '';
                                this.c_farmer_requests = response.data.request_update;
                                this.show_request_service_form = false;
                                this.show_services_form = true;
                                // this.user_id = 0;
                            }, 2000);
                            
                        });
                    }
                    else{
                        this.landing_page_msg_error = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg_error = '';
                        }, 2000);
                    }
                },

                async request_crop(){
                    if(this.$refs.r_crop_id.value && this.$refs.r_crop_kilo.value){
                        this.$refs.request_crop_button.disabled = true;
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            crop_id: this.$refs.r_crop_id.value,
                            service_id: null,
                            crop_kilo: this.$refs.r_crop_kilo.value,
                            user_id: this.user_id,
                            service_remarks: null,
                            request_type: 'Crop',
                        };
                        await axios.post('../../controller/farmer/request_crop.php', data, options)
                        .then((response) => {
                            this.$refs.request_crop_button.disabled = false;
                            // console.log(response.data)
                            this.landing_page_msg_success = 'Crops Successfully Requested!';
                            
                            setTimeout(() => {
                                this.landing_page_msg_success = '';
                                this.c_farmer_requests = response.data.request_update;
                                this.show_request_crop_form = false;
                                this.show_services_form = true;
                                // this.user_id = 0;
                            }, 2000);
                            
                        });

                    }
                    else{
                        this.landing_page_msg_error = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg_error = '';
                        }, 2000);
                    }
                },

                search_service: '',

                async search_farmer_func(){
                    const preseve_req = this.c_farmer_requests;
                    this.c_farmer_requests = [];
                    
                    if(this.search_service != ''){
                        for (const key in preseve_req) {
                            if (Object.hasOwnProperty.call(preseve_req, key)) {
                                const element = preseve_req[key];
                                let row_record = (element.request_type +' '+ (element.crops_kilo ? element.crops_kilo : '') +' '+ (element.service_remarks ? element.service_remarks : '')).toLowerCase();
                                if(row_record.includes(this.search_service.toLowerCase())){
                                    this.c_farmer_requests.push(element);
                                };
                            }
                        }
                    }
                    else {
                        this.c_farmer_requests = this.c_farmer_requests_backup;
                    }
                },

                async decline_farmer_request(){
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        request_id: this.r_id,
                        is_cancelled: this.r_is_cancelled,
                    };
                    await axios.post('../../controller/farmer/decline_farmer_request.php', data, options)
                    .then((response) => {
                        // console.log(response.data);
                        if(response.data.status = 'true'){
                            this.info_no = 1;
                            this.c_farmer_requests = response.data.request_update;
                            this.show_cancel_farmer_request_form = false;

                            this.admin_success_msg = 'Request successfully cancelled!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_success_msg = '';
                            }, 2000);
                        }else{
                            this.admin_error_msg = 'Cannot cancel request!';
                            setTimeout(() => {
                                this.error_admin = false;
                                this.admin_error_msg = '';
                            }, 2000);
                        }
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
                    return this.c_farmer_requests.slice(start, end);
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