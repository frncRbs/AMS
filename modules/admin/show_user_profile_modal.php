<style>
@import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");
@import url("https://fonts.googleapis.com/css?family=Bree+Serif&display=swap");

.profile-header {
  background: #fff;
  width: 100%;
  display: flex;
  height: 190px;
  position: relative;
  box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.2);
}

.profile-img {
  float: left;
  width: 340px;
  height: 200px;
}

.profile-img img {
  border-radius: 50%;
  height: 230px;
  width: 230px;
  border: 5px solid #fff;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
  position: absolute;
  left: 50px;
  top: 20px;
  z-index: 5;
  background: #fff;
}

.profile-nav_profile-info {
  float: left;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-top: 60px;
}

.profile-nav_profile-info h3 {
  font-variant: small-caps;
  font-size: 2rem;
  font-family: sans-serif;
  font-weight: bold;
}

.profile-nav_profile-info .address {
  display: flex;
  font-weight: bold;
  color: #777;
}

.profile-nav_profile-info .address p {
  margin-right: 5px;
}

.profile-option {
  width: 40px;
  height: 40px;
  position: absolute;
  right: 50px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: all 0.5s ease-in-out;
  outline: none;
  background: #e40046;
}

.profile-option:hover {
  background: #fff;
  border: 1px solid #e40046;
}
.profile-option:hover .notification i {
  color: #e40046;
}

.profile-option:hover span {
  background: #e40046;
}

.profile-option .notification i {
  color: #fff;
  font-size: 1.2rem;
  transition: all 0.5s ease-in-out;
}

.profile-option .notification .alert-message {
  position: absolute;
  top: -5px;
  right: -5px;
  background: #fff;
  color: #e40046;
  border: 1px solid #e40046;
  padding: 5px;
  border-radius: 50%;
  height: 20px;
  width: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 0.8rem;
  font-weight: bold;
}

.main-bd {
  width: 100%;
  display: flex;
  padding-right: 15px;
}

.profile-side {
  width: 300px;
  background: #fff;
  box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
  padding: 120px 30px 120px;
  font-family: "Bree Serif", serif;
  margin-left: 10px;
  z-index: 99;
}

.profile-side p {
  margin-bottom: 7px;
  color: #333;
  font-size: 14px;
}

.profile-side p i {
  color: #e40046;
  margin-right: 10px;
}

.mobile-no i {
  transform: rotateY(180deg);
  color: #e40046;
}

.profile-btn {
  display: flex;
}

button.chatbtn,
button.createbtn {
  border: 0;
  padding: 10px;
  width: 100%;
  border-radius: 3px;
  background: green;
  color: #fff;
  font-family: "Bree Serif";
  font-size: 1rem;
  margin: 5px 2px;
  cursor: pointer;
  outline: none;
  margin-bottom: 10px;
  transition: background 0.3s ease-in-out;
  box-shadow: 0px 5px 7px 0px rgba(0, 0, 0, 0.3);
}

button.chatbtn:hover,
button.createbtn:hover {
  background: rgb(0, 128, 0, 0.7);
}

button.chatbtn i,
button.createbtn i {
  margin-right: 5px;
}

.user-rating {
  display: flex;
}

.user-rating h3 {
  font-size: 2.5rem;
  font-weight: 200;
  margin-right: 5px;
  letter-spacing: 1px;
  color: #666;
}

.user-rating .no-of-user-rate {
  font-size: 0.9rem;
}

.rate {
  padding-top: 6px;
}

.rate i {
  font-size: 0.9rem;
  color: rgba(228, 0, 70, 1);
}

.nav_profile {
  width: 100%;
  z-index: -1;
}

.nav_profile ul {
  display: flex;
  justify-content: space-around;
  list-style-type: none;
  height: 40px;
  background: #fff;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}

.nav_profile ul li {
  padding: 10px;
  width: 100%;
  cursor: pointer;
  text-align: center;
  transition: all 0.2s ease-in-out;
}

.nav_profile ul li:hover,
.nav_profile ul li.active {
  box-shadow: 0px -3px 0px rgb(0, 128, 0)  inset;
}

.profile-body {
  width: 100%;
  z-index: -1;
}

.tab {
  display: none;
}

.tab {
  padding: 20px;
  width: 100%;
  text-align: center;
}

@media (max-width: 1100px) {
  .profile-side {
    width: 250px;
    padding: 90px 15px 20px;
  }

  .profile-img img {
    height: 200px;
    width: 200px;
    left: 50px;
    top: 50px;
  }
}

@media (max-width: 900px) {
  body {
    margin: 0 20px;
  }

  .profile-header {
    display: flex;
    height: 100%;
    flex-direction: column;
    text-align: center;
    padding-bottom: 20px;
  }

  .profile-img {
    float: left;
    width: 100%;
    height: 200px;
  }

  .profile-img img {
    position: relative;
    height: 200px;
    width: 200px;
    left: 0px;
  }

  .profile-nav_profile-info {
    text-align: center;
  }

  .profile-option {
    right: 20px;
    top: 75%;
    transform: translateY(50%);
  }

  .main-bd {
    flex-direction: column;
    padding-right: 0;
  }

  .profile-side {
    width: 100%;
    text-align: center;
    padding: 20px;
    margin: 5px 0;
  }

  .profile-nav_profile-info .address {
    justify-content: center;
  }

  .user-rating {
    justify-content: center;
  }
}

@media (max-width: 400px) {
  body {
    margin: ;
  }

  .profile-header h3 {
  }

  .profile-option {
    width: 30px;
    height: 30px;
    position: absolute;
    right: 15px;
    top: 83%;
  }

  .profile-option .notification .alert-message {
    top: -3px;
    right: -4px;
    padding: 4px;
    height: 15px;
    width: 15px;
    font-size: 0.7rem;
  }

  .profile-nav_profile-info h3 {
    font-size: 1.9rem;
  }

  .profile-nav_profile-info .address p,
  .profile-nav_profile-info .address span {
    font-size: 0.7rem;
  }
}
#see-more-bio,
#see-less-bio {
  color: blue;
  cursor: pointer;
  text-transform: lowercase;
}
.tab h1 {
  font-family: "Bree Serif", sans-serif;
  display: flex;
  justify-content: center;
  margin: 20px auto;
}    
</style>
<div class="popupActivate" x-show="show_user_profile_form" style="display: none">
    <div class="popup-contentActivate" style="padding: 0" x-data="user_profile_modal">
        <!-- <div class="popup-child1" style="margin-bottom: 5px"> -->
            <div class="container">
                <div class="profile-header">
                    <div class="profile-img">
                    <img src="./bg.jpg" width="200" alt="Profile Image">
                    </div>
                    <div class="profile-nav_profile-info">
                    <div style="display: inline">
                        <h5 style="color: red" x-text="admin_error_msg"></h5>
                        <h5 style="color: green" x-text="admin_success_msg"></h5>
                      <h3 class="user-name" x-html="cu_full_name"></h3>
                    </div>
                    <div class="address">
                        <p id="state" class="state" x-html="cu_address_m_text">,</p>
                        <span id="country" class="country" x-html="cu_address_b_text">.</span>
                    </div>
                    </div>
                    <!-- <div class="profile-option">
                    <div class="notification">
                        <i class="fa fa-bell"></i>
                        <span class="alert-message">3</span>
                    </div>
                    </div> -->
                </div>

                <div class="main-bd">
                    <div class="left-side">
                    <div class="profile-side">
                        <p class="mobile-no"><i class="fa fa-phone"></i><span x-html="cu_contact_text"></span></p>
                        <p class="user-mail"><i class="fa fa-envelope"></i><span x-html="cu_user_n_text"></span></p>
                        <div class="user-bio">
                        <h3>Bio</h3>
                        <p class="bio">
                            Lorem ipsum dolor sit amet, hello how consectetur adipisicing elit. Sint consectetur provident magni yohoho consequuntur, voluptatibus ghdfff exercitationem at quis similique. Optio, amet!
                        </p>
                        </div>
                        <div class="profile-btn">
                        <button type="button" class="chatbtn" id="chatBtn" x-on:click="update_current_user_details"><i class="fas fa-plus-square" ></i>Update</button>
                        </div>
                        <!-- START TEST -->
                        <div style="display: none">
                          <button type="button" x-on:click="send_mail()">Send Mail</button>
                        </div>
                        <!-- END TEST -->
                    </div>
                </div>
                    <div class="right-side">

                    <div class="nav_profile">
                        <ul>
                        <li x-on:click="change_tab(1)" class="user-post" :class="[tab_index == 1 ? 'active' : '']" style="font-size: 15px">User Details</li>
                        <li x-on:click="change_tab(2)" class="user-review" :class="[tab_index == 2 ? 'active' : '']" style="font-size: 15px">Address & Guardian Details</li>
                        <li x-on:click="change_tab(3)" class="user-setting" :class="[tab_index == 3 ? 'active' : '']" style="font-size: 15px">Farm & Account Details</li>
                        </ul>
                    </div>
                    <div class="profile-body">
                        <div x-show="tab_index == 1" style="display: none">
                            <div class="profile-posts tab" style="display: flex; flex-direction: column">
                            <h3 style="font-weight: bold">User Details</h3>
                            <div class="row" style="text-align: left">
                                <div class="column">
                                  <div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 10px;">
                                      <label for="cu_role_service">Register for: </label>
                                      <select class="selectD" name="cu_role_service" id="cu_role_service" x-model="cu_role_s" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                          <option value="" disabled selected hidden>Choose service</option>
                                          <option value="1">High Value Crops</option>
                                          <option value="2">Corn Value Crop</option>
                                          <option value="3">Rice Crop</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="cu_last_name">Last Name:</label>
                                            <input type="text" name="cu_last_name" id="cu_last_name" x-model="cu_lastname" class="form-control input-lg" tabindex="1" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group" >
                                        <label for="cu_first_name">First Name:</label>
                                            <input type="text" name="cu_first_name" id="cu_first_name" x-model="cu_firstname" class="form-control input-lg" tabindex="2" placeholder="First Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="cu_middle_name">Middle Name:</label>
                                            <input type="text" name="cu_middle_name" id="cu_middle_name" x-model="cu_middlename" class="form-control input-lg" tabindex="5" placeholder="Middle Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="cu_contact_no">Contact Number:</label>
                                            <input type="number" name="cu_contact_no" id="cu_contact_no" x-model="cu_contact" class="form-control input-lg" tabindex="6" placeholder="Contact Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="inputC">
                                            <label for="cu_birth_date">Birth Date:</label>
                                            <input type="date" name="cu_contact_no" id="cu_contact_no" name="trip-start"
                                                value="2000-01-01" x-model="cu_birth_d"
                                                min="1900-01-01" max="2050-12-31" style="width: 100%; padding: 3px;">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="cu_civil_status">Civil Status: </label>
                                    <select class="selectD" name="cu_civil_status" id="cu_civil_status" x-model="cu_civil_s" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                        <option value="" disabled selected hidden>Choose Status</option>
                                        <option value="1">Married</option>
                                        <option value="2">Single</option>
                                        <option value="3">Widowed</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="cu_sex">Sex: </label>
                                    <select class="selectD" name="cu_sex" id="cu_sex" x-model="cu_sex" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                        <option value="" disabled selected hidden>Choose Sex</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="cu_religion">Religion:</label>
                                            <input type="text" name="cu_religion" id="cu_religion" x-model="cu_religion" class="form-control input-lg" value="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="column" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="form-group">
                                            <label for="cu_birth_place">Place of Birth:</label>
                                            <input type="text" name="cu_birth_place" id="cu_birth_place" x-model="cu_birth_p" class="form-control input-lg" placeholder="Place of Birth">
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div x-show="tab_index == 2" style="display: none">
                            <div class="profile-reviews tab" style="display: flex; flex-direction: column">
                                <h3 style="font-weight: bold">Address and Guardian Details</h3>
                                <div class="row" style="text-align: left">
                                <div class="column">
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                            <div class="form-group" >
                                            <label for="cu_address_street">Street/Subdiv/Sitio:</label>
                                                <input type="text" name="cu_address_street" id="cu_address_street" x-model="cu_address_s" class="form-control input-lg" placeholder="Street/Subdiv/Sitio">
                                            </div>
                                    </div>
                                </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group" >
                                        <label for="cu_address_barangay">Barangay:</label>
                                            <input type="text" name="cu_address_barangay" id="cu_address_barangay" x-model="cu_address_b" class="form-control input-lg" placeholder="Barangay">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group" >
                                        <label for="cu_address_municipality">Municipality:</label>
                                            <input type="text" name="cu_address_municipality" id="cu_address_municipality" x-model="cu_address_m" class="form-control input-lg" placeholder="Municipality">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="form-group">
                                            <label for="cu_address_zip">Zipcode:</label>
                                            <input type="number" name="cu_address_zip" id="cu_address_zip" x-model="cu_address_z" class="form-control input-lg" placeholder="Zipcode">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group" >
                                        <label for="cu_guardian_fname">Full Name:</label>
                                            <input type="text" name="cu_guardian_fname" id="cu_guardian_fname" x-model="cu_guardian_fn" class="form-control input-lg" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="cu_guardian_contact">Contact Number:</label>
                                            <input type="number" name="cu_guardian_contact" id="cu_guardian_contact" x-model="cu_guardian_c" class="form-control input-lg" placeholder="Contact Number">
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div x-show="tab_index == 3" style="display: none">
                            <div class="profile-settings tab" style="display: flex; flex-direction: column">
                            <h3 style="font-weight: bold">Farm and Account Details</h3>
                                <div class="account-setting">
                                    <div class="row" style="text-align: left">
                                        <div class="column">
                                        <div class="col-xs-12 col-sm-6 col-md-12">
                                            <label for="cu_farm_type">Farm Type: </label>
                                            <select class="selectD" name="cu_farm_type" id="cu_farm_type" x-model="cu_farm_t" style="width: 100%; height: auto; margin-bottom: 10px; padding: 5px; border-radius: 3px">
                                                <option value="" disabled selected hidden>Choose Services</option>
                                                <option value="1">High Value Crops</option>
                                                <option value="2">Corn Value Crop</option>
                                                <option value="3">Rice Crop</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group" >
                                            <label for="cu_farm_barangay">Barangay:</label>
                                                <input type="text" name="cu_farm_barangay" id="cu_farm_barangay" x-model="cu_farm_b" class="form-control input-lg" placeholder="Barangay">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group" >
                                            <label for="cu_farm_municipality">Municipality:</label>
                                                <input type="text" name="cu_farm_municipality" id="cu_farm_municipality" x-model="cu_farm_m" class="form-control input-lg" placeholder="Municipality">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="text-align: left">
                                        <div class="col-xs-12 col-sm-6 col-md-12">
                                            <div class="form-group">
                                                <label for="cu_farm_area">Total farm area:</label>
                                                <input type="number" name="cu_farm_area" id="cu_farm_area" x-model="cu_farm_a" class="form-control input-lg" placeholder="Total farm area">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row" style="text-align: left">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="cu_username">Email:</label>
                                                <input type="text" name="cu_username" id="cu_username" x-model="cu_user_n" class="form-control input-lg" placeholder="Email" >
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="cu_secret_phrase" style="font-size: 14px">Secret Phrase: (Use to change Password)</label>
                                                <div class="buttonIn">
                                                    <input type="text" id="enter" name="cu_secret_phrase" x-ref="secret_phrase"  x-model="cu_secret_p" class="form-control input-lg" placeholder="Secret Phrase" autocomplete=off>
                                                    <button type="button" id="clear" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em; display: inline" x-on:click="generate_secret_phrase">Generate</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="profile_account_exit">X</a>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('user_profile_modal', () => ({
        profile_posts: true,
        profile_reviews: false,
        profile_settings: false,

        tab_index: 1,
        change_tab(tab_number){
          this.tab_index = tab_number;
        },

        show_profile_posts(){
            this.profile_posts = true;
            this.profile_settings = false;
            this.profile_reviews = false;
        },

        show_profile_reviews(){
            this.profile_posts = false;
            this.profile_settings = false;
            this.profile_reviews = true;
        },

        show_profile_settings(){
            this.profile_posts = false;
            this.profile_settings = true;
            this.profile_reviews = false;
        },
        
        async send_mail(){
          const options = {
              xsrfHeaderName: 'X-XSRF-TOKEN',
              xsrfCookieName: 'XSRF-TOKEN',
          }
          let data = {
            email: 'frncrebollos@gmail.com',
            subject: 'CROP REQUEST',
            message: '<b>Hello Farmer,</b><br/><br/> This is to notify you that your request is now approved.',
          }
          
          await axios.post('../../controller/sendmail/sendmail.php', data, options)
          .then((response) => {
            console.log(response.data);
          });
          // console.log(this.$refs.m_email_address.value, this.$refs.m_subject.value, this.$refs.m_message.value);
        }
    }));
});
</script>        