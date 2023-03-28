<?php
    include_once('../../includes/header.php');
?>
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="img/LOGO.png" class="profile_image" alt="">
      </center>
      <hr style="color: white">
        <nav class="nav1">
          <ul>
            <li><a href="personnel_dash_body.php" style="color: rgba(0, 255, 0, 0.8)"><i class="fas fa-desktop"></i><span>Dashboard</span></a></li>
            <li class="dropdown">
              <a href="#"><i class="fas fa-cogs"></i><span>Features</span></a>
              <ul>
                  <li><a href="personnel_dash_farmers_request.php"><i class="fas fa-user-edit"></i><span>Farmers Request</span></a></li>
                  <li><a href="personnel_dash_approved_panel.php"><i class="fas fa-thumbs-up"></i><span>Approved Panel</span></a></li>
                  <li><a href="#" id="viewB"><i class="fas fa-user-plus"></i><span>Add Farmer</span></a></li>
                  <li><a href="personnel_dash_farmers_list.php"><i class="far fa-address-book"></i><span>Farmers List</span></a></li>
                  <!-- <li><a href="personnel_dash_deactivate_farmer.php"><i class="fas fa-user-slash"></i><span>Deactivate Farmer</span></a></li> -->
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
                  <li><a href="personnel_dash_home_image.php"><i class="fas fa-wrench"></i><span>Customized Home Image</span></a></li>
                  <li><a href="personnel_dash_home_content.php"><i class="fas fa-wrench"></i><span>Customized Home Content</span></a></li>
              </ul>
            </li>
        </ul>
      </nav>
    </div>
    <div class="popup">
        <div class="popup-content">
            <div class="popup-child1">
                    <form role="form">
                    <h3>Create Farmers Account</h3>
                        <hr class="colorgraph" style="height: 10px">
                        <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center">
                            <div style="width: 100%">
                            <br>
                            <h5>Farmers Information</h5>
                            <hr>
                            <div class="row" style="text-align: left">
                                <div class="column">
                                  <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                    <label for="selectD">Register for: </label>
                                      <select class="selectD" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                          <option selected>Choose Services</option>
                                          <option value="1">High Value Crops</option>
                                          <option value="2">Corn Value Crop</option>
                                          <option value="3">Rice Crop</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group">
                                            <label for="first_name">Last Name:</label>
                                            <input type="text" name="last_name" id="first_name" class="form-control input-lg" tabindex="1" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                        <label for="last_name">First Name:</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" tabindex="2" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group">
                                            <label for="password">Middle Name:</label>
                                            <input type="text" name="password" id="password" class="form-control input-lg" tabindex="5" placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group">
                                            <label for="password_confirmation">Contact Number:</label>
                                            <input type="number" name="password_confirmation" id="password_confirmation" class="form-control input-lg" tabindex="6" placeholder="Contact Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="inputC">
                                            <label for="start">Birth Date:</label>
                                            <input type="date" id="start" name="trip-start"
                                                value="2000-01-01"
                                                min="1900-01-01" max="2050-12-31" style="width: 100%" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                    <label for="selectD">Civil Status: </label>
                                      <select class="selectD" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                          <option selected>Choose Status</option>
                                          <option value="1">Married</option>
                                          <option value="2">Single</option>
                                          <option value="3">Widowed</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                    <label for="selectD">Sex: </label>
                                      <select class="selectD" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                          <option selected>Choose Sex</option>
                                          <option value="1">Male</option>
                                          <option value="2">Female</option>
                                      </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group">
                                            <label for="first_name">Religion:</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" value="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="column" style="text-align: left">
                                    <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                        <div class="form-group">
                                            <label for="password">Place of Birth:</label>
                                            <input type="text" name="password" id="password" class="form-control input-lg" placeholder="Place of Birth">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="button" class="btn btn-success" style="width: 50%" id="nextB">Next</button>
                                <hr class="colorgraph" style="height: 10px">
                            </div>
                        </div>
                    </form>
                <!-- </div> -->
            </div>
            <div class="popup-child2">
                <a type="button" href="" id="closeB" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em">X</a>
            </div>
        </div>
    </div>
    <div class="popup1">
        <div class="popup-content1">
            <div class="popup-child2">
                    <form role="form">
                        <hr class="colorgraph" style="height: 10px">
                        <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center">
                            <div style="width: 100%">
                            <br>
                            <h5>Farmers Address</h5>
                            <hr>
                            <div class="row" style="text-align: left">
                                <div class="column">
                                  <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                        <label for="last_name">Street/Subdiv/Sitio:</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Street/Subdiv/Sitio">
                                        </div>
                                  </div>
                                </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                        <label for="last_name">Barangay:</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Barangay">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                        <label for="last_name">Municipality:</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Municipality">
                                        </div>
                                    </div>
                            </div>
                            <div class="row" style="text-align: left">
                                <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                    <div class="form-group">
                                            <label for="password_confirmation">Zipcode:</label>
                                            <input type="number" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Zipcode">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h5>Person to contact in case of emergency</h5>
                            <hr>
                            <div class="row" style="text-align: left">
                                <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                        <label for="last_name">Full Name:</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Full Name">
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                    <div class="form-group">
                                            <label for="password_confirmation">Contact Number:</label>
                                            <input type="number" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Contact Number">
                                    </div>
                                </div>
                            </div>
                                <br>
                                <div class="column" style="text-align: center">
                                    <button type="button" class="btn btn-dark" style="width: 25%" id="backB">Back</button>
                                    <button type="button" class="btn btn-success" style="width: 25%" id="next1B">Next</button>
                                </div>
                                <hr class="colorgraph" style="height: 10px">
                            </div>
                        </div>
                    </form>
                <!-- </div> -->
            </div>
            <div class="popup-child2">
                <a type="button" href="" id="close1B" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em">X</a>
            </div>
        </div>
    </div>
    <div class="popup2">
        <div class="popup-content2">
            <div class="popup-child2">
                    <form role="form">
                        <hr class="colorgraph" style="height: 10px">
                        <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center">
                            <div style="width: 100%">
                            <br>
                            <h5>Farm Land Description</h5>
                            <hr>
                            <div class="row" style="text-align: left">
                                <div class="column">
                                  <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                    <label for="selectD">Farm Type: </label>
                                      <select class="selectD" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                                          <option selected>Choose Services</option>
                                          <option value="1">High Value Crops</option>
                                          <option value="2">Corn Value Crop</option>
                                          <option value="3">Rice Crop</option>
                                      </select>
                                  </div>
                                </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                        <label for="last_name">Barangay:</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Barangay">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                        <label for="last_name">Municipality:</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Municipality">
                                        </div>
                                    </div>
                            </div>
                            <div class="row" style="text-align: left">
                                <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                    <div class="form-group">
                                            <label for="password_confirmation">Total farm area:</label>
                                            <input type="number" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Total farm area">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h5>Farmers Account</h5>
                            <hr>
                            <div class="row" style="text-align: left">
                                <div class="column">
                                    <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                            <div class="form-group" >
                                            <label for="last_name">Username:</label>
                                                <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Username">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                    <div class="form-group">
                                            <label for="password_confirmation">Password:</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6" style="margin: 10px 0 10px;">
                                    <div class="form-group">
                                            <label for="password_confirmation">Confirm Password:</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                                <br>
                                <div class="column" style="text-align: center">
                                    <button type="button" class="btn btn-dark" style="width: 25%" id="back1B">Back</button>
                                    <button type="button" class="btn btn-success" style="width: 25%" id="submitBx">Submit</button>
                                </div>
                                <hr class="colorgraph" style="height: 10px">
                            </div>
                        </div>
                    </form>
                <!-- </div> -->
            </div>
            <div class="popup-child2">
                <a type="button" href="" id="close2B" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em">X</a>
            </div>
        </div>
    </div>
  <div class="content">
  <div class="container-fluid">
      <div class="row-fluid" style="background-color: white; min-height: 600px; padding:10px;">
          <div class="span12">
                <div class="printGrp" style="display: flex; flex-direction: row; gap: 20px; justify-content: flex-end; border: 2px solid black;
                    padding: 15px 0 15px 0; margin-top: 10px; flex-wrap: wrap; background-color: rgba(0, 128, 0, 0.7); position: relative">
                    <div style="left: 10px; position: absolute">
                        <h3 style="font-weight: bolder; color: white">Dashboard</h3>
                    </div>
                        <div style="margin: 0 10px 0 0">
                            <!-- <label for="middlename">Program: </label>
                            <input class="inputC" type="text" name="middlename" placeholder="Program" required> -->
                            <label for="drpProg" style="font-weight: bold">Program:</label>
                                <select id="mylist2" onchange="myFunction2()" style="width: 150px; height: auto; padding: 2.5px" class="drpProg">
                                    <option value="">None</option>
                                    <option value="HVC">High Value Crops(HVC)</option>
                                    <option value="Rice">Rice Program(Rice)</option>
                                    <option value="Corn">Corn Program(Corn)</option>
                                </select>
                        </div>
                        <div style="margin: 0 10px 0 0">
                            <label for="drpBar" style="font-weight: bold">Barangay:</label>
                                <select id="mylist1" onchange="myFunction1()" style="width: 150px; height: auto; padding: 2.5px">
                                    <option value="">None</option>
                                    <option value="Sinunuc">Sinunuc</option>
                                    <option value="Maasin">Maasin</option>
                                    <option value="Cawit">Cawit</option>
                                    <option value="Baluno">Baluno</option>
                                    <option value="Recodo">Recodo</option>
                                    <option value="Tulungatung">Tulungatung</option>
                                    <option value="Ayala">Ayala</option>
                                    <option value="Talisayan">Talisayan</option>
                                    <option value="Sinubong">Sinubong</option>
                                    <option value="Patalon">Patalon</option>
                                    <option value="Labuan">Labuan</option>
                                    <option value="Limpapa">Limpapa</option>
                                </select>
                        </div>
                        <div style="margin: 0 10px 0 0">
                            <label for="middlename" style="font-weight: bold">Search name: </label>
                            <input id="myInput" onkeyup="myFunction3()" class="inputC" type="text" name="middlename" placeholder="Search name" required>
                        </div>
                    <div style="margin: 0 10px 0 0">
                          <a href="#"><button class="logout_btn" style="margin: 0 10px 0 0; border-radius: 3px; width: 100%">Print</button></a>
                      </div>
                    </div>
                    <!-- <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box bg-blue">
                                    <div class="inner">
                                        <h3> 230 </h3>
                                        <p> Total Number of Farmers </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box bg-green">
                                    <div class="inner">
                                        <h3> 123 </h3>
                                        <p> Total Number of Approved Request </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box bg-orange">
                                    <div class="inner">
                                        <h3> 0 </h3>
                                        <p> Total Number of Pending Request </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-hourglass-start" aria-hidden="true"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box bg-red">
                                    <div class="inner">
                                        <h3> 15 </h3>
                                        <p> Total Number of Declined Request </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-minus"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm" id="myTable">
                            <thead>
                                <tr>
                                    <th>Reference No.</th>
                                    <th>Full Name</th>
                                    <th>Sex</th>
                                    <th>Birth Date</th>
                                    <th>Commodity</th>
                                    <th>Size(HA)</th>
                                    <th>Barangay</th>
                                    <th>Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th scope="row">453567</th>
                                        <td>France Perez</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>HVC</td>
                                        <td>1.5</td>
                                        <td>Ayala</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">185463</th>
                                        <td>Respituto Rompetrapo</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Rice</td>
                                        <td>1.5</td>
                                        <td>Recodo</td>
                                        <td>09661573159</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">254636</th>
                                        <td>Jessa Mendoza</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>HVC</td>
                                        <td>1.5</td>
                                        <td>Tulungatung</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">542626</th>
                                        <td>Vanessa Jane</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Corn</td>
                                        <td>1.5</td>
                                        <td>Recodo</td>
                                        <td>09661573159</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">424623</th>
                                        <td>Mary Jane</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Corn</td>
                                        <td>1.5</td>
                                        <td>Patalon</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">987945</th>
                                        <td>Jenny Santisima</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Rice</td>
                                        <td>1.5</td>
                                        <td>Labuan</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">754753</th>
                                        <td>George Hokage</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Rice</td>
                                        <td>1.5</td>
                                        <td>Limpapa</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">647383</th>
                                        <td>Mark Ruffalo</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>HVC</td>
                                        <td>1.5</td>
                                        <td>Limpapa</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">522473</th>
                                        <td>Norton Limpapa</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>HVC</td>
                                        <td>1.5</td>
                                        <td>Recodo</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">426146</th>
                                        <td>Tabs Mercado</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Corn</td>
                                        <td>1.5</td>
                                        <td>Ayala</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">874724</th>
                                        <td>Tabs Mercado</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Corn</td>
                                        <td>1.5</td>
                                        <td>Ayala</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">957352</th>
                                        <td>Tabs Mercado</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Corn</td>
                                        <td>1.5</td>
                                        <td>Ayala</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">536233</th>
                                        <td>Tabs Mercado</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Corn</td>
                                        <td>1.5</td>
                                        <td>Ayala</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">424263</th>
                                        <td>Tabs Mercado</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Corn</td>
                                        <td>1.5</td>
                                        <td>Ayala</td>
                                        <td>09661573159</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">124526</th>
                                        <td>Tabs Mercado</td>
                                        <td>Male</td>
                                        <td>12/7/1989</td>
                                        <td>Corn</td>
                                        <td>1.5</td>
                                        <td>Ayala</td>
                                        <td>09661573159</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
function myFunction1() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("mylist1");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[5];
                if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }

        function myFunction2() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("mylist2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function myFunction3() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
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
<!-- <style>
.navDash ul{
  margin: 0;
  padding: 0;
  position: relative;
  list-style-type: none;
}
.navDash ul ul{
  position: absolute;
  text-align: left;
  left: 250px;
  width: 250px;
  top: 0;
  background: #2f323a;
  display: none;
  box-shadow: 2px 2px 10px grey;
}
.navDash ul .dash{
  position: relative;
}
.navDash ul .dash:hover > ul{
  display: initial;
}
.navDash ul .dash_two ul{
  width: 180px;
  position: absolute;
  left: 250px;
  top: 0;
}
.navDash ul .dash_two:hover ul{
  display: initial;
}
.navDash ul .split ul{
  top: 60px;
}

.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}
</style> -->

<?php
    include_once('../../includes/footer.php');
?>