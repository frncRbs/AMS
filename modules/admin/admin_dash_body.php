<?php
    include_once('../../includes/header.php');
?>
    <div x-data="admin_side" x-init="get_services_crops, initialize_registry()">
    <?php include('show_farmer_request_modal.php'); ?>
    <?php include('add_crop_modal.php'); ?>
    <?php include('add_service_modal.php'); ?>

    <!-- <div> -->
        <div class="sidebar">
            <center>
                <img src="<?php echo IMAGES; ?>LOGO.png" class="profile_image" alt="">
            </center>
            <hr style="color: white">
            <nav class="navDash">
            <ul>
                <li><a href="admin_dash_body.php" style="color: rgba(0, 255, 0, 0.8)"><i class="fas fa-desktop"></i><span>Dashboard</span></a></li>
                <li class="dash" style="z-index: 10;">
                    <a href="#"><i class="fas fa-cogs"></i><span>Features</span></a>
                    <ul>
                        <li><a type="button" x-on:click="show_personnel_registration_form = true"  style="color: white"><i class="fas fa-user-plus"></i><span>Register Coordinator</span></a></li>
                        <li class="dash_two split"><a href="#"><i class="fas fa-plus-square"></i><span>Set Program</span></a>
                    <ul>
                        <li><a type="button" x-on:click="show_crops_form = true" style="color: white"><i class="fas fa-plus-square"></i><span>Crops</span></a>
                        <li><a type="button" x-on:click="show_services_form = true" style="color: white"><i class="fas fa-plus-square"></i><span>Services</span></a>
                    </ul>
                </li>
                <li><a href="admin_dash_search_farmer.php"><i class="fas fa-search"></i><span>Search Farmer</span></a></li>
                <li><a href="admin_dash_deactivate_account.php"><i class="fas fa-user-slash"></i><span>Activate Account</span></a></li>
                </ul>
                </li>
            </ul>
            <hr style="color: white">
        </nav>
        <nav class="nav2">
            <ul>
                <li class="dropdown">
                <a href="#"><i class="fas fa-tools"></i><span>Home Features</span></a>
                    <ul>
                        <li><a href="admin_dash_home_image.php"><i class="fas fa-wrench"></i><span>Customized Home Image</span></a></li>
                        <li><a href="admin_dash_home_content.php"><i class="fas fa-wrench"></i><span>Customized Home Content</span></a></li>
                    </ul>
                </li>
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
        
        <!-- Farmer Registration Form -->      
        <div class="popup3" x-show="show_personnel_registration_form" style="display: none;">
            <div class="popup-content3">
                <div class="popup-child1">
                    <form>
                    <span>
                        <h3 style="color: red" x-text="admin_error_msg"></h3>
                    </span>
                    <h1 style="font-weight: bolder">Create Coordinators Account</h1>
                        <br>
                        <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no == 1" style="display: none;">
                            <div style="width: 100%">
                            <h3 style="font-weight: bold">Coordinators Information</h3>
                            <hr>
                            <div class="row" style="text-align: left">
                                <div class="column">
                                    <div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 10px;">
                                        <label for="role_service">Register for: </label>
                                        <select class="selectD" name="role_service" id="role_service" x-ref="role_service" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                            <option value="" disabled selected hidden>Choose Services</option>
                                            <option value="1">High Value Crops</option>
                                            <option value="2">Corn Value Crop</option>
                                            <option value="3">Rice Crop</option>
                                        </select>
                                    </div>
                                </div>
                                <hr style="margin: 20px 0 20px 0">                               
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
                                <br>
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
                                <br>
                            </div>
                        </div>
                        <!-- PAGE 2 -->
                        <div class="formG" style="display: none; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no == 2" style="display: none;">
                            <div style="width: 100%">
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

        <div class="content">
            <div class="container-fluid">
                <div class="row-fluid" style="background-color: white; min-height: 600px; padding:10px;">
                    <div class="span12">
                            <div class="printGrp" style="display: flex; flex-direction: row; gap: 20px; justify-content: flex-end; border: 2px solid black;
                                padding: 15px 0 15px 0; margin-top: 10px; flex-wrap: wrap; background: #2f323a; position: relative; border-radius: 5px">
                                <div style="left: 10px; position: absolute">
                                    <h3 style="font-weight: bolder; color: white">Dashboard</h3>
                                </div> 
                                <div style="margin: 0 10px 0 0;">
                                    <a href="#"><button class="logout_btn" style="margin: 0 10px 0 0; border-radius: 3px; width: 100%">Print</button></a>
                                </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="card-box bg-blue">
                                                <div class="inner">
                                                    <h3> 13436 </h3>
                                                    <p> Total Number of Farmers </p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </div>
                                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="card-box bg-green">
                                                <div class="inner">
                                                    <h3> 185358 </h3>
                                                    <p> Total Number of Approved Request </p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                </div>
                                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="card-box bg-orange">
                                                <div class="inner">
                                                    <h3> 5464 </h3>
                                                    <p> Total Number of Pending Request </p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-hourglass-start" aria-hidden="true"></i>
                                                </div>
                                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="card-box bg-red">
                                                <div class="inner">
                                                    <h3> 723 </h3>
                                                    <p> Total Number of Declined Request </p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user-minus"></i>
                                                </div>
                                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div style="display: flex; align-self: flex-end">
                                    <input type="search_farmer" placeholder="Search Request">
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
                                                <th>Program</th>
                                                <th>Date Requested</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-if="registry_records">
                                                <template x-for="(row, index) in registry_records">
                                                    <tr>
                                                        <th scope="row"><span x-text="(index + 1)"></span></th>
                                                        <td><span x-text="get_farmer_first_name(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_middle_name(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_last_name(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_role_service(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_sex(row.user_id)"></span></td>
                                                        <td><span x-text="get_farmer_role_service(row.user_id)"></span></td>
                                                        <td><span x-text="row.date_requested"></span></td>
                                                        <td>
                                                            <!-- <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">View</button> -->
                                                            <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="show_farmer_request_form = true, get_farmer_records(row.user_id)">View</button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </template>
                                        </tbody>
                                    </table>
                                    
                                    <div style="display: flex; flex-direction: row; justify-content: space-evenly">
                                        <button class="btn btn-success">Back</button>
                                        <button class="btn btn-success">Next</button>
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
    <script>
        document.addEventListener('alpine:init', () => {
        Alpine.data('admin_side', () => ({
                show_personnel_registration_form: false,
                show_crops_form: false,
                show_success_registration_form: false,
                show_services_form: false,
                show_personnel_requestForm: false,
                show_farmer_request_form: false,
                admin_error_msg: '',
                admin_success_msg: '',

                error_admin: false,
                info_no: 1,
                farmer_records: [],
                registry_records: [],

                crops: [],
                services: [],

                initialize_registry(){
                    this.registry_records  = '<?php  
                        $database = new Connection();
                        $db = $database->open();
                        $sql = $db->prepare("SELECT * FROM requests_registry GROUP BY user_id");
                        $sql->execute();
                        $results = $sql->fetchAll();
                        $database->close();

                        echo json_encode($results);
                    ;?>';
                    this.registry_records = JSON.parse(this.registry_records);
                    // setTimeout(() => {
                    //     console.log(JSON.parse(this.registry_records));
                    // }, 1500);
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
                    this.show_personnel_registration_form = false;
                },

                confirm_farmer_request_exit(){
                    this.show_personnel_requestForm = false;
                    this.show_farmer_request_form = false;
                },

                confirm_reset(){
                    this.show_crops_form = false;
                    this.show_services_form = false;
                    this.show_success_registration_form = false;
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
                                // console.log(response.data);
                                this.$refs.submit_personnel_button.disabled = false;
                                // console.log('Kini: ' + (response.data == true));
                                if(response.data == false) {
                                    this.error_admin = true;
                                    this.admin_error_msg = 'Username already taken!';
                                    setTimeout(() => {
                                        this.error_admin = false;
                                        this.admin_error_msg = '';
                                    }, 2000);
                                }
                                else if(response.data == true){
                                    this.$refs.submit_personnel_button.disabled = true;
                                    this.info_no = 1;
                                    this.show_personnel_registration_form = false;
                                    this.show_success_registration_form = true;
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
                            if(response.data == false) {
                                this.error_admin = true;
                                this.admin_error_msg = 'Crop is already registered!';
                                setTimeout(() => {
                                    this.error_admin = false;
                                    this.admin_error_msg = '';
                                }, 2000);
                            }
                            else if(response.data == true){
                                this.admin_success_msg = 'Crop successfully registered!';

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
                
                async generate_secret_phrase(){
                    await axios.get('../../controller/admin/generate_secret_key.php')
                    .then((response) => {
                        console.log(response.data);
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
                        farmer_role_service = response.data;
                    }); 
                    return farmer_role_service ? farmer_role_service : '';
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
                    return farmer_sex ? farmer_sex : '';
                },

                async get_farmer_records(user_id){
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

                async delete_request(request_id, user_id, request_type){
                    console.log(request_id);
                    const options = {
                        xsrfHeaderName: 'X-XSRF-TOKEN',
                        xsrfCookieName: 'XSRF-TOKEN',
                    };
                    let data = {
                        request_id: request_id,
                        user_id: user_id,
                        request_type: request_type,
                    };
                    await axios.post('../../controller/admin/delete_farmer_request.php', data, options)
                    .then((response) => {
                        // console.log(response.data.requests);
                        if(response.data.requests.length == 0){
                            window.location = '<?php echo LOCATION; ?>modules/admin/admin_dash_body.php';
                        }
                        else{
                            this.farmer_records = response.data.requests;
                        }
                        
                    }); 
                    // return crop_name ? crop_name : '';
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

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->

    <!-- <script>
        $(document).ready(function () {
            $('#admintable').DataTable({
                "aaSorting": [],
                columnDefs: [{
                orderable: false,
                targets: [0,1,2,3,4,5,6,7,8,9]
                }]
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script> -->

<?php
    include_once('../../includes/footer.php');
?>