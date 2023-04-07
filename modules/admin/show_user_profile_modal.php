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
  background: rgba(288, 0, 70, 0.9);
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
  box-shadow: 0px -3px 0px rgba(288, 0, 70, 0.9) inset;
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
                    <h3 class="user-name">Bright Code</h3>
                    <div class="address">
                        <p id="state" class="state">New York,</p>
                        <span id="country" class="country">USA.</span>
                    </div>

                    </div>
                    <div class="profile-option">
                    <div class="notification">
                        <i class="fa fa-bell"></i>
                        <span class="alert-message">3</span>
                    </div>
                    </div>
                </div>

                <div class="main-bd">
                    <div class="left-side">
                    <div class="profile-side">
                        <p class="mobile-no"><i class="fa fa-phone"></i> +23470xxxxx700</p>
                        <p class="user-mail"><i class="fa fa-envelope"></i> Brightisaac80@gmail.com</p>
                        <div class="user-bio">
                        <h3>Bio</h3>
                        <p class="bio">
                            Lorem ipsum dolor sit amet, hello how consectetur adipisicing elit. Sint consectetur provident magni yohoho consequuntur, voluptatibus ghdfff exercitationem at quis similique. Optio, amet!
                        </p>
                        </div>
                        <div class="profile-btn">
                        <button class="chatbtn" id="chatBtn"><i class="fas fa-plus-square"></i>Update</button>
                        </div>
                    </div>
                </div>
                    <div class="right-side">

                    <div class="nav_profile">
                        <ul>
                        <li x-on:click="show_profile_posts" class="user-post active" style="font-size: 15px">Personal Details</li>
                        <li x-on:click="show_profile_reviews" class="user-review" style="font-size: 15px">Farm Details</li>
                        <li x-on:click="show_profile_settings" class="user-setting" style="font-size: 15px">Account Details</li>
                        </ul>
                    </div>
                    <div class="profile-body">
                        <div x-show="profile_posts" style="display: none">
                            <div class="profile-posts tab" style="display: flex; flex-direction: column">
                            <h3 style="font-weight: bold">User Details</h3>
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
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name:</label>
                                            <input type="text" name="last_name" id="last_name" x-ref="last_name" class="form-control input-lg" tabindex="1" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group" >
                                        <label for="first_name">First Name:</label>
                                            <input type="text" name="first_name" id="first_name" x-ref="first_name" class="form-control input-lg" tabindex="2" placeholder="First Name" required>
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
                                    <label for="civil_status">Civil Status: </label>
                                    <select class="selectD" name="civil_status" id="civil_status" x-ref="civil_status" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                        <option value="" disabled selected hidden>Choose Status</option>
                                        <option value="1">Married</option>
                                        <option value="2">Single</option>
                                        <option value="3">Widowed</option>
                                    </select>
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
                                <div class="column" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="form-group">
                                            <label for="birth_place">Place of Birth:</label>
                                            <input type="text" name="birth_place" id="birth_place" x-ref="birth_place" class="form-control input-lg" placeholder="Place of Birth">
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div x-show="profile_reviews" style="display: none">
                            <div class="profile-reviews tab" style="display: flex; flex-direction: column">
                                <h3 style="font-weight: bold">Address and Guardian Details</h3>
                                <div class="row" style="text-align: left">
                                <div class="column">
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                            <div class="form-group" >
                                            <label for="address_street">Street/Subdiv/Sitio:</label>
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
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="form-group">
                                            <label for="address_zip">Zipcode:</label>
                                            <input type="number" name="address_zip" id="address_zip" x-ref="address_zip" class="form-control input-lg" placeholder="Zipcode">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group" >
                                        <label for="guardian_fname">Full Name:</label>
                                            <input type="text" name="guardian_fname" id="guardian_fname" x-ref="guardian_fname" class="form-control input-lg" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="guardian_contact">Contact Number:</label>
                                            <input type="number" name="guardian_contact" id="guardian_contact" x-ref="guardian_contact" class="form-control input-lg" placeholder="Contact Number">
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div x-show="profile_settings" style="display: none">
                            <div class="profile-settings tab" style="display: flex; flex-direction: column">
                            <h3 style="font-weight: bold">Farm and Account Details</h3>
                                <div class="account-setting">
                                    <div class="row" style="text-align: left">
                                        <div class="column">
                                        <div class="col-xs-12 col-sm-6 col-md-12">
                                            <label for="farm_type">Farm Type: </label>
                                            <select class="selectD" name="farm_type" id="farm_type" x-ref="farm_type" style="width: 100%; height: auto; margin-bottom: 10px; padding: 5px; border-radius: 3px">
                                                <option value="" disabled selected hidden>Choose Services</option>
                                                <option value="1">High Value Crops</option>
                                                <option value="2">Corn Value Crop</option>
                                                <option value="3">Rice Crop</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group" >
                                            <label for="farm_barangay">Barangay:</label>
                                                <input type="text" name="farm_barangay" id="farm_barangay" x-ref="farm_barangay" class="form-control input-lg" placeholder="Barangay">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group" >
                                            <label for="farm_municipality">Municipality:</label>
                                                <input type="text" name="farm_municipality" id="farm_municipality" x-ref="farm_municipality" class="form-control input-lg" placeholder="Municipality">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="text-align: left">
                                        <div class="col-xs-12 col-sm-6 col-md-12">
                                            <div class="form-group">
                                                <label for="farm_area">Total farm area:</label>
                                                <input type="number" name="farm_area" id="farm_area" x-ref="farm_area" class="form-control input-lg" placeholder="Total farm area">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
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
                                                <label for="secret_phrase" style="font-size: 14px">Secret Phrase: (Use to change Password)</label>
                                                <div class="buttonIn">
                                                    <input type="text" id="enter" name="secret_phrase" x-ref="secret_phrase" class="form-control input-lg" placeholder="Secret Phrase" autocomplete=off>
                                                    <button type="button" id="clear" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em; display: inline" x-on:click="generate_secret_phrase" >Generate</button>
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
        }
    }));
});
</script>        