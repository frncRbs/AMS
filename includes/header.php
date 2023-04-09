<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    require_once('../../controller/farmer/farmer_details.php');
    $farmer = new Farmer();

    // Avoid bypass when no user is login
    if(!isset($_SESSION["login_user_id"])) {
        header("location:".LOCATION);
    }
    
    // $database = new Connection();
    // $db = $database->open();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: "Roboto", sans-serif;
            }
            .popupAccept{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: none;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .ppopup-contentAccept{
                height: auto;
                width: 400px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupDecline_Account_Reg{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-contentDecline_Account_Reg{
                height: auto;
                width: 550px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupApprove_Account_Reg{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-contentApprove_Account_Reg{
                height: auto;
                width: 550px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupDecline_request{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-contentDecline_request{
                height: auto;
                width: 550px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupDeactCon{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: none;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-contentDeactCon{
                height: auto;
                width: 400px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupActivate{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                z-index: 10;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .popup-contentActivate{
                height: auto;
                width: 1000px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupError{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                z-index: 10;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .popup-contentError{
                height: auto;
                width: 500px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupSuccessRegistration{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                z-index: 10;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .popup-contentSuccessRegistration{
                height: 500px;
                width: 700px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }

            .popupSuccess_register{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                z-index: 10;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .popup-contentSuccess_register{
                height: auto;
                width: 500px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupHomeContent{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                z-index: 10;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .popup-contentHomeContent{
                height: auto;
                width: 700px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupSuccess{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                z-index: 10;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .popup-contentSuccess{
                height: auto;
                width: 700px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popupDeact{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: none;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-contentDeact{
                height: auto;
                width: 400px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popup4{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: none;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-child5{
                display: flex;
                gap: 10px;
            }
            .popup-content4{
                height: auto;
                width: 550px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popIn4{
                background-color: transparent;
                margin: 16px auto;
                display: relative;
                width: 90%;
                padding: 8px;
                margin-left: 20px;
                border: none;
                border-bottom: 2px solid black;
            }
            .popup3{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                z-index: 10;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .buttonIn {
                width: 300px;
                position: relative;
            }
            .popup-child4{
                display: flex;
                gap: 10px;
            }
            .popup-content3{
                height: auto;
                width: 700px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popIn3{
                background-color: transparent;
                margin: 16px auto;
                display: relative;
                width: 90%;
                padding: 8px;
                margin-left: 20px;
                border: none;
                border-bottom: 2px solid black;
            }
            .popup2{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: none;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-child3{
                display: flex;
                gap: 10px;
            }
            .popup-content2{
                height: auto;
                width: 800px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popIn2{
                background-color: transparent;
                margin: 16px auto;
                display: relative;
                width: 90%;
                padding: 8px;
                margin-left: 20px;
                border: none;
                border-bottom: 2px solid black;
            }
            .popup1{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: none;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-child2{
                display: flex;
                gap: 10px;
            }
            .popup-content1{
                height: auto;
                width: 800px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popIn1{
                background-color: transparent;
                margin: 16px auto;
                display: relative;
                width: 90%;
                padding: 8px;
                margin-left: 20px;
                border: none;
                border-bottom: 2px solid black;
            }
            /* start */
            .popup{
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                display: none;
                flex-wrap: wrap;
                flex-wrap: ;
                justify-content: center;
                align-items: center;
                text-align: center;
                z-index: 120;
            }
            .popup-child1{
                display: flex;
                gap: 10px;
            }
            .popup-content{
                height: auto;
                width: 850px;
                background: white;
                display: flex;
                padding: 20px;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 5px;
                position: relative;
            }
            .popIn{
                background-color: transparent;
                margin: 16px auto;
                display: relative;
                width: 90%;
                padding: 8px;
                margin-left: 20px;
                border: none;
                border-bottom: 2px solid black;
            }
            #leftPanel{
                background-color:green;
                border-radius: 1em;
                color:#fff;
                text-align: center;
            }

            #rightPanel{
                min-height:415px;
            }

            /* Credit to bootsnipp.com for the css for the color graph */
            .colorgraph {
            height: 10px;
            border-top: 0;
            margin-bottom: 0;
            background: #c4e17f;
            border-radius: 5px;
            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            }
            .vl {
            border-left: 2px solid green;
            margin: 0 30px 0 30px;
            height: 20px;
            }
            .navbar{
            display: flex;
            flex-wrap: wrap-reverse;
            }
            #dash{
                display: flex;
                margin-left: 280px;
            }
            .parentCon{
                display: flex;
                flex-wrap: wrap-reverse;
                flex-direction: column;
            }
            main{
                padding-top: 80px;
                margin-left: 265px;
            }
            /* end */

            .nav1 ul{
            margin: 0;
            padding: 0;
            position: relative;
            list-style-type: none;
            }
            .nav1 ul ul{
            position: absolute;
            text-align: left;
            left: 250px;
            width: 250px;
            top: 0;
            background: #2f323a;
            display: none;
            box-shadow: 2px 2px 10px grey;
            }
            .nav1 ul .dropdown{
            position: relative;
            }
            .nav1 ul .dropdown:hover > ul{
            display: initial;
            }
            .nav1 ul .dropdown_two ul{
            width: 180px;
            position: absolute;
            left: 250px;
            top: 0;
            }
            .nav1 ul .dropdown_two:hover ul{
            display: initial;
            }
            .nav1 ul .split ul{
            top: 60px;
            }

            .nav2 ul{
            margin: 0;
            padding: 0;
            position: relative;
            list-style-type: none;
            }
            .nav2 ul ul{
            position: absolute;
            text-align: left;
            left: 250px;
            width: 300px;
            top: 0;
            background: #2f323a;
            display: none;
            box-shadow: 2px 2px 10px grey;
            }
            .nav2 ul .dropdown{
            position: relative;
            }
            .nav2 ul .dropdown:hover ul{
            display: initial;
            }

            #sidebar_btn{
                position: absolute;
                top: 32px;
            }
            header{
            position: fixed;
            background: #22242A;
            padding: 10px;
            padding-bottom: 20px;
            width: 100%;
            z-index: 1;
            height: auto;
            }
            .left_area h3{
            color: #fff;
            margin: 0;
            margin-left: 10px;
            padding-bottom: 10px;
            text-transform: uppercase;
            font-size: 22px;
            font-weight: 900;
            }
            .left_area span{
            color: rgba(0, 255, 0, 0.5);
            }

            .user_btn{
            padding: 5px;
            /* background: rgba(0, 255, 0, 0.5); */
            text-decoration: none;
            float: right;
            margin-top: -40px;
            margin-right: 140px;
            border-radius: 2px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            transition: 0.5s;
            transition-property: background;
            }
            .user_btn:hover{
            color: #0B87A6;
            }

            .notif_btn{
            padding: 5px;
            /* background: rgba(0, 255, 0, 0.5); */
            text-decoration: none;
            float: right;
            margin-top: -40px;
            margin-right: 110px;
            border-radius: 2px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            transition: 0.5s;
            transition-property: background;
            }
            .notif_btn:hover{
            color: #0B87A6;
            }

            .logout_btn{
            padding: 5px;
            background: rgba(0, 255, 0, 0.5);
            text-decoration: none;
            float: right;
            margin-top: -40px;
            margin-right: 40px;
            border-radius: 2px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            transition: 0.5s;
            transition-property: background;
            }

            .logout_btn:hover{
            background: #0B87A6;
            }
            /* sidebar */
            .sidebar {
            background: #2f323a;
            margin-top: 70px;
            padding-top: 30px;
            position: fixed;
            left: 0;
            width: 250px;
            height: 100%;
            transition: 0.5s;
            transition-property: left;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.8);
            }

            .sidebar .profile_image{
            width: 130px;
            height: 130px;
            border-radius: 100px;
            margin-top: 5px;
            margin-bottom: 25px;
            }

            .prof{
            color: #fff;
            margin-top: 0;
            padding: 5px 0 5px 0;
            margin-right: 45px;
            margin-bottom: 20px;
            }

            .sidebar a{
            color: #fff;
            display: block;
            width: 100%;
            line-height: 60px;
            text-decoration: none;
            padding-left: 40px;
            box-sizing: border-box;
            transition: 0.5s;
            transition-property: background;
            }

            .sidebar a:hover{
            background: rgba(0, 255, 0, 0.5);
            }

            .sidebar i{
            padding-right: 10px;

            }

            label #sidebar_btn{
            z-index: 1;
            color: #fff;
            position: fixed;
            cursor: pointer;
            left: 300px;
            font-size: 20px;
            margin: 5px 0;
            transition: 0.5s;
            transition-property: color;
            }

            label #sidebar_btn:hover{
            color:  rgba(0, 255, 0, 0.3);
            }

            #check:checked ~ .sidebar{
            left: -190px;
            }
            #check:checked ~ .sidebar a span{
            display: none;
            }
            #check:checked ~ .sidebar a{
            font-size: 20px;
            margin-left: 170px;
            width: 80px;
            }
            .content{
            margin-left: 260px;
            padding-top: 90px;
            transition: 0.5s;
            }
            #check:checked ~ .content{
            margin-left: 60px;
            }
            #check{
            display: none;
            }
        </style>
        <style>
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
            width: 300px;
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
            left: 300px;
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
        </style>
    </head>

    <body>
        <input type="checkbox" id="check">
        <!--header area start-->
        <div x-data="admin_side" x-init="get_services_crops, initialize_registry(), initialize_farmer_details(), initialize_home_title_details(), initialize_personnel_details()">
            <header style="background: #2f323a;">
                <label for="check">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                </label>
                <div class="left_area">
                    <h3>Admin<span> Dashboard</span></h3>
                    <!-- FOR CURRENT LOGGED USER -->
                    <!-- <h3><?php echo $_SESSION["login_username"]; ?></h3> -->
                </div>

                <div class="right_area">
                    <a type="button" class="user_btn" x-on:click="get_current_user_details()"><i class="fas fa-user"></i></a>
                </div>
                <div class="right_area">
                    <a type="button" class="notif_btn" x-on:click="show_user_profile_form = true"><i class="fas fa-bell" ></i></a>
                </div>
                <div class="right_area">
                    <a href="<?php echo LOCATION;?>settings/logout.php"  class="logout_btn">Logout</a>
                </div>
            </header>

        <!--header area end-->