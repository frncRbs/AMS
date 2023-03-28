<?php
    // Redirect to dashboard if user is logged in
    if(isset($_SESSION["login_user_id"])){
        if($_SESSION["user_role"] == 'Admin'){
            header("location:".LOCATION."modules/admin/admin_dash_body.php");
        }
        elseif($_SESSION["user_role"] == 'Personnel'){
            header("location:".LOCATION."modules/personnel/personnel_dash_body.php");
        }
        else{
            header("location:".LOCATION);
        }
        
    }

    $database = new Connection();
    $db = $database->open();
    $sql_query = 'SELECT * FROM home_imgs';
    $results = $db->query($sql_query);

    $sql_query2 = 'SELECT * FROM home_content';
    $results2 = $db->query($sql_query2);
    foreach ($results2 as $key => $value) {
        $image1=$value["image1"];
        $image2=$value["image2"];
        $image3=$value["image3"];
        $content11=$value["content11"];
        $content12=$value["content12"];
        $content21=$value["content21"];
        $content22=$value["content22"];
        $content31=$value["content31"];
        $content32=$value["content32"];
    }
    $database->close();

    include_once('includes/header_guest.php');
?>  
    <style>
        html{
            /*filter: invert(0);*/
            scroll-behavior: smooth;
        }
        .inputC{
            width: 85%; 
            height: auto; 
            padding: 5px;
            margin-bottom: 20px;
            background-color: transparent;
            border-radius: 3px;
        }
        label {
            display: block;
            font-weight: 200;
            font: 1.5rem 'Fira Sans', sans-serif;
        }
        input, label {
            margin: .4rem 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        header .carousel-inner .item {
            height: 100vh;
        }
        .farmer{
            pointer-events: ;
        }
        .personnel{
            pointer-events: ;
        }
        .admin{
            pointer-events: ;
        }
        /*CONTACT SECTION*/
        .contact-form{
        margin: 6em 0;
        position: relative;  
        }

        .contact-form h1{
        padding:2em 1px;
        color: #F97300; 
        }
        .contact-form .right{
        max-width: 600px;
        }
        .contact-form .right .btn-secondary{
        background:  #F97300;
        color: #fff;
        border:0;
        }
        .contact-form .right .form-control::placeholder{
        color: #888;
        font-size: 16px;
        }
        /* .popupReq{
            background: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            z-index: 10;
            display: none;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .popup-contentReq{
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
        } */
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
        .popupPrivacyP{
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
        .popup-contentPrivacyP{
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

        .popup3rd{
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
        .popup-content3rd{
            height: auto;
            width: 650px;
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

        .popup2nd{
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
        .popup-content2nd{
            height: auto;
            width: 650px;
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
        .popup4services{
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
        .popup-content4services{
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

        .popup3crops{
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

        .popup-content3crops{
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

        .popupAdSelect{
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
        .popup-contentAdSelect{
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

        .popupReqLog{
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
        .popup-contentReqLog{
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
        .popupAd{
            background: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            z-index: 10;
            display: none;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .popup-contentAd{
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
        .popupPer{
            background: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            z-index: 10;
            display: none;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .popup-contentPer{
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
        .popup-content3{
            height: auto;
            width: 650px;
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
        /*POPUP START*/
        .popup{
            display: flex;
            background: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            z-index: 10;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .popup-content{
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
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px white inset !important;
        }
        input:focus, textarea:focus, select:focus{
            outline: none;
        }
        ::placeholder{
            color: #ccc;
        }
        .input-box{
            display: flex;
            flex-direction: row;
        }
        .fas{
            position: absolute;
            margin: 0;
            padding: 33px 25px 0 0;
        }
        .eye{
            position: relative;
            padding-right: 10px;
        }
        .eye2{
            position: relative;
            padding-right: 40px;
        }
        #key{
            margin: 0;
            position: absolute;
            padding: 33px 0 0 30px;
        }
        #hide1{
            display: none;
        }
        #hidePer1{
            display: none;
        }
        #hideAd1{
            display: none;
        }
        #hideReqLog1{
            display: none;
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
        .popup-1{
            z-index: 10;
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
        }
        .popup-content-1{
            height: auto;
            width: 900px;
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
        .popInSession{
            text-align: center;
            color: transparent;
            /*margin: 15px 0;*/
            margin: 0;
            padding: 0;
            width: 0;
            height: 0;
            background-color: transparent;
            display: relative;
            /*width: 90%;*/
            /*padding: 8px;*/
            /*margin-left: 20px;*/
            border: none;
        }
        .popIn-1{
            margin: 15px 0;
            background-color: transparent;
            display: relative;
            pointer-events: ;
            width: 90%;
            padding: 8px;
            margin-left: 20px;
            border: none;
            border-bottom: 2px solid black;
        }
        .popup-2{
            z-index: 10;
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
        }
        .popup-content-2{
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
        .popIn-2{
            margin: 20px auto;
            background-color: transparent;
            display: relative;
            width: 100%;
            padding: 8px;
            margin-left: 50px;
            border: none;
            border-bottom: 2px solid black;
        }
        .regB{
            margin-top: 0px;
        }
        .closeB, .loginB, .registerB, .resetB-1, .forB-2, .submitB, .loginPer, .loginAd, .loginReqLog, .reqCrop, .reqRequest{
            color: green;
            display: inline;
            background: white;
            font-size: 12px;
            font-weight: bold;
            padding: 8px 20px;
            margin-right: 20px;
            border-radius: 20px;
            border: 2.5px solid green;
        }
        .closeB:hover, .loginB:hover, .registerB:hover, .resetB-1:hover, .forB-2:hover, .submitB:hover,
        .loginPer:hover, .loginAd:hover, .loginReqLog:hover, .loginReqLog:hover, .reqCrop:hover, .reqRequest:hover{
            background-color: green;
            border: 2.5px solid white;
            color: white;
        }
        /*NAV START*/
        h1{
            font-weight: bold;
        }
        main{
            color: white;
            display: grid;
            grid-template-columns: 50% 25% 25%;
        }
        .box1{
            text-align: justify;
            padding: 0 5em 0 50px;
        }
        .box2{
            text-align: justify;
            padding: 0 5em 0 0;
        }
        .box3{
            text-align: justify;
            padding: 0 5em 0 0;
        }
        .box4{
            background-color: rgba(0,128,0, 1);
            margin-top: 50px;
            padding: 15px 0 15px 0;
            grid-column: 1/4;
        }
        .gridParent{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            justify-items: center;
            justify-content: center;
            gap: 15px 10px;
        }
        .img1{
            box-shadow: 10px 10px 5px #ccc;
            -moz-box-shadow: 10px 10px 5px #ccc;
            -webkit-box-shadow: 10px 10px 5px #ccc;
            -khtml-box-shadow: 10px 10px 5px #ccc;
        }
        .img2{
            box-shadow: 10px 10px 5px #ccc;
            -moz-box-shadow: 10px 10px 5px #ccc;
            -webkit-box-shadow: 10px 10px 5px #ccc;
            -khtml-box-shadow: 10px 10px 5px #ccc;
        }
        .img3{
            box-shadow: 10px 10px 5px #ccc;
            -moz-box-shadow: 10px 10px 5px #ccc;
            -webkit-box-shadow: 10px 10px 5px #ccc;
            -khtml-box-shadow: 10px 10px 5px #ccc;
        }
        .img4{
            box-shadow: 10px 10px 5px #ccc;
            -moz-box-shadow: 10px 10px 5px #ccc;
            -webkit-box-shadow: 10px 10px 5px #ccc;
            -khtml-box-shadow: 10px 10px 5px #ccc;
        }
        .img5{
            box-shadow: 10px 10px 5px #ccc;
            -moz-box-shadow: 10px 10px 5px #ccc;
            -webkit-box-shadow: 10px 10px 5px #ccc;
            -khtml-box-shadow: 10px 10px 5px #ccc;
        }
        .img6{
            box-shadow: 10px 10px 5px #ccc;
            -moz-box-shadow: 10px 10px 5px #ccc;
            -webkit-box-shadow: 10px 10px 5px #ccc;
            -khtml-box-shadow: 10px 10px 5px #ccc;
        }
        .parentCon{
            max-width: 100%;
            height: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .parentCon1{
            display: flex;
            padding-left: 60px;
        }
        article {
            text-align: justify;
            padding: 0 5em 0 0;
        }
        .supp{
            padding: 40px 0 40px 0;
            background-color: rgba(128,128,128, 0.2);
        }
        .btn1, .btn2, .btn3{
            color: green;
            background: white;
            font-size: 12px;
            font-weight: bold;
            padding: 8px 20px;
            margin: 20px;
            border-radius: 20px;
            border: 2.5px solid green;
            cursor: pointer;
        }
        .btn4{
            color: green;
            background: white;
            font-size: 12px;
            font-weight: bold;
            padding: 8px 20px;
            width: 400px;
            margin: 20px;
            margin-left: 90px;
            border-radius: 20px;
            border: 2.5px solid green;
            cursor: pointer;
        }
        .btn1:hover, .btn2:hover, .btn3:hover, .btn4:hover{
            background-color: green;
            border: 2.5px solid white;
            color: white;
        }
        .hr1, .hr2, .hr3{
            width: 500px;
            background: green;
            border: 2px solid green;
            border-radius: 1em;
        }
        .hrSel{
            width: 200px;
            background: green;
            border: 2px solid green;
            border-radius: 1em;
        }
        .hrCrops{
            width: 330px;
            background: green;
            border: 2px solid green;
            border-radius: 1em;
        }
        footer{
            display: block;
            padding: 50px 0 0 0;
            background-color: rgba(0,128,0, 0.8);
            text-align: center;
        }
        .navbar{
            z-index: 1;
        }
        .navbar-inverse {
            background-color: transparent;
            border-color: transparent;
        }
        .navbar-inverse .navbar-brand {
            color: #fff;
            font-size: 40px;
            /*text-shadow: 0px 0px 6px rgba(255,255,255,0.9);*/
            /*background: white;*/
            /*-webkit-background-clip: text;*/
            /*-webkit-text-fill-color: transparent;*/
            text-shadow: 2px 4px 3px rgba(0,0,0,0.7);
            padding: 40px 15px;
            font-weight: 1000;
        }
        .nav.navbar-nav.navbar-right {
            margin: 25px 0;
        }
        .navbar-inverse .navbar-nav>li>a {
            color: #fff;
            /*text-shadow: 0px 0px 6px rgba(255,255,255,0.9);*/
            text-shadow: 2px 4px 3px rgba(0,0,0,0.7);
            font-weight: 700;
            font-size: 15.3px;
            text-transform: uppercase;
        }
        .banner {
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .carousel-caption {
            padding-bottom: 250px;
            font-family: poppins;
        }
        .carousel-caption {
            padding-bottom: 250px;
            font-family: poppins;
        }
        .carousel-caption h2 {
            font-size: 70px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .carousel-caption h2 span {
            color: white;
        }
        .carousel-caption a {
            background: rgba(0, 255, 0, 0.7);
            padding: 15px 35px;
            display: inline-block;
            margin-top: 15px;
            color: #fff;
            text-transform: uppercase;
            border-radius: 25px;
        }
        .carousel-caption h3 {
            color: rgba(0, 255, 0, 0.7);
        }
        .carousel-control.right {
            background-image: none;
        }
        .carousel-control.left {
            background-image: none;
        }
        .carousel-indicators .active {
            background-color: #EDBB00;
            border-color: #EDBB00;
        }
        @media only screen and (min-width: 380px) and (max-width: 991px) {
            .carousel-caption {
                padding-bottom: 350px;
            }
            .carousel-caption h2 {
                font-size: 50px;
            }
        }
        @media only screen and (max-width: 380px) {
            .navbar-inverse .navbar-brand {
                font-size: 30px;
                padding: 20px 15px;
            }
            .navbar-collapse {
                background: rgba(0, 0, 0, 0.5);
            }
            .carousel-caption {
                padding-bottom: 120px;
            }
            .carousel-caption h2 {
                font-size: 25px;
            }
            .carousel-caption h3 {
                font-size: 18px;
            }
            .carousel-caption a {
                padding: 10px 25px;
            }
            .dropbtn {
            color: white;
            background-color: transparent;
            padding: 14px;
            font-size: 15.3px;
            border: none;
            }
        }
        .dropbtn {
        color: white;
        font-family: 'Poppins', sans-serif;
        background-color: transparent;
        /*text-shadow: 0px 0px 6px rgba(255,255,255,0.9);*/
        text-shadow: 2px 4px 3px rgba(0,0,0,0.7);
        padding: 14px;
        font-weight: 700;
        font-size: 16px;
        border: none;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
        position: relative;
        display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
        display: none;
        position: absolute;
        /*background-color: rgba(76, 88, 76, 0.3);*/
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        text-shadow: 2px 4px 3px rgba(0,0,0,0.5);
        display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {display: block;}

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {background-color: transparent;}

        .buttonIn {
            width: 300px;
            position: relative;
        }
    </style>
    <div x-data="landing_page" x-init="get_services_crops">
        <header>
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Ayala | Agriculturist</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#personnelT">Personnel</a></li>
                            <li><a href="#program">Program</a></li>
                            <li><a href="#aboutUs">About us</a></li>
                            <li><a href="#" x-on:click="show_login_requestForm = true">Request</a></li>
                            <li><a href="#home">Home</a></li>
                            <div class="dropdown">
                                <button class="dropbtn">ACCOUNTS</button>
                                <div class="dropdown-content">
                                <a type="button" style="cursor: pointer;" x-on:click="show_farmer_loginForm = true">Sign In</a>
                                <a type="button" style="cursor: pointer;" x-on:click="show_farmer_registrationForm = true">Sign Up</a>
                                </div>
                            </div>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                
                <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox" id="home">
                        <div class="item active">
                        
                            <div class="banner" style="background-image: url('<?php echo IMAGES.$image1;?>');"></div>
                            <div class="carousel-caption">
                                <h2 class="animated slideInDown" style="animation-delay: 1s"><span><?php echo $content11?></span></h2>
                                <h3 class="animated fadeInUp" style="animation-delay: 2s"><?php echo $content12?></h3>
                                <p class="animated zoomIn" style="animation-delay: 3s"><a href="#contact">Contact us</a></p>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="banner" style="background-image: url('<?php echo IMAGES.$image2; ?>')"></div>
                            <div class="carousel-caption">
                                <h2 class="animated slideInDown" style="animation-delay: 1s"><span><?php echo $content21?></span></h2>
                                <h3 class="animated fadeInUp" style="animation-delay: 2s"><?php echo $content22?></h3>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="banner" style="background-image: url('<?php echo IMAGES.$image3;?>');"></div>
                            <div class="carousel-caption">
                                <h2 class="animated zoomIn" style="animation-delay: 1s"><span><?php echo $content31?></span></h2>
                                <h3 class="animated fadeInLeft" style="animation-delay: 2s"><?php echo $content32?></h3>
                            </div>
                        </div>
                    </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>
            
        <!-- POPUP LOG IN --> 
        <div class="popup" x-show="show_farmer_loginForm" style="display: none;">
            <div class="popup-content">
                <div class="popup-child1" style="margin-bottom: 5px">
                    <h1>Welcome Back!</h1>
                    <p>Login to continue your account.</p>
                    <span>
                        <h3 style="color: red" x-text="landing_page_msg"></h3>
                    </span>
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input type="text" placeholder="Username" class="popIn" name="username" x-ref="login_username" required autocomplete="off">
                        </div>
                        <div class="input-box">
                            <i class="fas fa-key"></i>
                            <input type="password" placeholder="Password" class="popIn" name="password" x-ref="login_password" id="inPass" required autocomplete="off">
                            <span class="eye" onclick="myFunction()">
                                <i id="hide1" class="fas fa-eye" style="cursor: pointer"></i>
                                <i id="hide2" class="fas fa-eye-slash" style="cursor: pointer"></i>
                            </span>
                        </div>
                        <h5 class="forPass" style="cursor: pointer; font-weight: bolder; padding-top: 20px" x-on:click="show_exit">Forgot your password?</h5>
                        <hr style="margin-top: 34px;">
                        <!--<a href="" class="loginB" id="loginB" style="position: relative; text-decoration: none; z-index: 1" name="login">LOGIN</a>-->
                        <button class="loginB" type="button" style="position: relative; text-decoration: none; z-index: 1; cursor: pointer" x-ref="login_button" x-on:click="login">LOGIN</button>
                        <!--<button class="loginB" id="loginB" type="submit" name="login" class="btn btn-success">Login</button>-->
                        <button type="button" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_login">X</button>
                        <button type="button" class="closeB" style="position: relative; text-decoration: none; z-index: 1; cursor: pointer" x-on:click="exit_login">CLOSE</button>
                </div>
                <div class="popup-child2">
                    <img src="<?php echo IMAGES; ?>Image.png" width="380" height="280" style="border-radius: 0.6em">
                    <div class="regB">
                        <!-- <label for="registerB" style="font-w">Don't have an account?</label> -->
                        <h5 for="registerB" style="cursor: pointer; font-weight: bolder; margin-bottom: 25px; margin-top: 15px">Don't have an account?</h5>
                        <button type="button" class="registerB" style="text-decoration: none; margin-bottom: 20px" x-on:click="show_farmer_registrationForm = true">Register</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Farmer Registration Form -->           
        <div class="popup3" x-show="show_farmer_registrationForm" style="display: none;">
            <div class="popup-content3">
                <div class="popup-child1">
                    <form>
                    <span>
                        <h3 style="color: red" x-text="landing_page_msg"></h3>
                    </span>
                    <h1>Sign Up?</h1>
                        <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no == 1" style="display: none;">
                            <div style="width: 100%">
                            <h3 style="font-weight: bold">Farmers Information</h3>
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
                        <!-- PAGE 2 -->
                        <div class="formG" style="display: none; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no == 2" style="display: none;">
                            <div style="width: 100%">
                                <h3 style="font-weight: bold">Farmers Address</h3>
                                <hr>
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
                                <h3 style="font-weight: bold">Person to contact in case of emergency</h3>
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
                        <!-- PAGE 3 -->
                        <div class="formG" style="display: none; flex-direction: row; gap: 40px; justify-content: center" x-show="info_no == 3" style="display: none;">
                            <div style="width: 100%">
                            <h3 style="font-weight: bold">Farm Land Description</h3>
                            <hr>
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
                            <h3 style="font-weight: bold">Farmers Account</h3>
                            <hr>
                            <div class="row" style="text-align: left">
                                <!-- <div class="column">
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                            <div class="form-group" >
                                            <label for="username">Username:</label>
                                                <input type="text" name="username" id="username" x-ref="username" class="form-control input-lg" placeholder="Username">
                                            </div>
                                    </div>
                                </div> -->
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="username" name="username" id="username" x-ref="username" class="form-control input-lg" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="secret_phrase">Secret Phrase: (Use to change Password)</label>
                                        <!-- <div style="display: inline">
                                            <input type="secret_phrase" name="secret_phrase" id="secret_phrase" x-ref="secret_phrase" style="display: inline" class="form-control input-lg" placeholder="Secret Phrase">
                                            <button type="button" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em; display: inline">Generate</button>
                                        </div> -->
                                        <div class="buttonIn">
                                            <input type="text" id="enter" name="secret_phrase" x-ref="secret_phrase" class="form-control input-lg" placeholder="Secret Phrase" autocomplete=off>
                                            <button type="button" id="clear" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em; display: inline; margin-top: 6px" x-on:click="generate_secret_phrase" >Generate</button>
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
                            </div>
                        </div>
                        <!-- PAGE 4 -->
                        <div style="text-align: center; overflow-y: scroll; height: 550px" x-show="info_no == 4" style="display: none;">
                            <h1>Privacy Policy for Ayala District City Agriculturist</h1>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">
                                <p>At AyalaDistrictCityAgriculturist, accessible from https://ayaladistrictcityagriculturist.000webhostapp.com/, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by AyalaDistrictCityAgriculturist and how we use it.</p>

                                <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

                                <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in AyalaDistrictCityAgriculturist. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the <a href="https://www.privacypolicygenerator.info">Free Privacy Policy Generator</a>.</p>
                            </div>
                            <br>
                            <h2>Consent</h2>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">
                        
                                <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>
                            </div>
                            <br>
                            <h2>Information we collect</h2>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">

                                <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
                                <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
                                <p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>
                            </div>
                            <br>
                            <h2>How we use your information</h2>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">
                            <p>We use the information we collect in various ways, including to:</p>

                            <ul>
                            <li>Provide, operate, and maintain our website</li>
                            <li>Improve, personalize, and expand our website</li>
                            <li>Understand and analyze how you use our website</li>
                            <li>Develop new products, services, features, and functionality</li>
                            <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
                            <li>Send you emails</li>
                            <li>Find and prevent fraud</li>
                            </ul>
                            </div>
                            <br>
                            <h2>Log Files</h2>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">
                            <p>AyalaDistrictCityAgriculturist follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>
                            </div>


                            <br>
                            <h2>Advertising Partners Privacy Policies</h2>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">
                            <P>You may consult this list to find the Privacy Policy for each of the advertising partners of AyalaDistrictCityAgriculturist.</p>

                            <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on AyalaDistrictCityAgriculturist, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

                            <p>Note that AyalaDistrictCityAgriculturist has no access to or control over these cookies that are used by third-party advertisers.</p>
                            </div>

                            <br>
                            <h2>Third Party Privacy Policies</h2>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">
                            <p>AyalaDistrictCityAgriculturist's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>

                            <p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>
                            </div>
                            <br>
                            <h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">
                            <p>Under the CCPA, among other rights, California consumers have the right to:</p>
                            <p>Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
                            <p>Request that a business delete any personal data about the consumer that a business has collected.</p>
                            <p>Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
                            <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>
                            </div>
                            <br>
                            <h2>GDPR Data Protection Rights</h2>
                            <hr>
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">

                            <p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
                            <p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
                            <p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
                            <p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
                            <p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
                            <p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
                            <p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
                            <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>
                            </div>
                            <br>
                            <h2>Children's Information</h2>
                            <hr>    
                            <div style="text-align: justify; padding: 0 2.5em 0 2.5em">
                            <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

                            <p>AyalaDistrictCityAgriculturist does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>
                            </div>
                            <br>
                            <div>
                                <input type="checkbox" id="terms1" name="terms1" x-on:click="check_me">
                                <label for="terms1"> I agree to the privacy policy</label>
                            </div>
                            <br>
                            <button type="button" class="loginB" style="width: 50%" disabled x-ref="submit_farmer_button" x-on:click="submit_farmer_form">Submit</button>
                            <br>
                            <br>
                        </div>
                        <div class="column" style="text-align: center">
                            <template x-if="info_no != 1">
                                <button type="button" class="loginB" style="width: 25%" x-on:click="back">Back</button>
                            </template>
                            
                            <template x-if="info_no != 4">
                                <button type="button" class="loginB" style="width: 25%" x-on:click="next">Next</button>
                            </template>
                        </div>
                    </form>
                </div>
                <div class="popup-child2">
                    <button type="button" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_register">X</button>
                </div>
            </div>
        </div>

        <!-- Success Password Reset Prompt -->

        <div class="popupError" x-show="show_successForm" style="display: none">
            <div class="popup-contentError">
                <div class="popup-child1" style="margin-bottom: 5px">
                    <h1>Password Successfully Updated!</h1>
                    <p>You can now try re-login your account</p>
                </div>
                <br>
                <button type="button" class="loginB" style="width: 50%" x-on:click="confirm_reset">Confirm</button>
                <div class="popup-child2">
                    <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_reset">X</a>
                </div>
            </div>
        </div>
        
        <!-- Success Registration Prompt -->
        <div class="popupSuccess" x-show="show_success_registrationForm" style="display: none">
            <div class="popup-contentSuccess">
                <div class="popup-child1" style="margin-bottom: 5px">
                    <h1>Account Successfully Created!</h1>
                    <p>You can now try to login your account</p>
                </div>
                <br>
                <button type="button" class="loginB" style="width: 50%" x-on:click="confirm_register_exit">Confirm</button>
                <div class="popup-child2">
                    <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_register_exit">X</a>
                </div>
            </div>
        </div>
        
        <!-- Popup Request Login start -->
        <div class="popupReqLog" x-show="show_login_requestForm" style="display: none">
            <div class="popup-contentReqLog">
                <div class="popup-child1" style="margin-bottom: 5px">
                    <h1>Welcome Back!</h1>
                    <p>Let us verify your account.</p>
                    <span>
                        <h3 style="color: red" x-text="landing_page_msg"></h3>
                    </span>
                    <div class="input-box">
                        <i class="fas fa-envelope"></i><input type="text" placeholder="Username" class="popIn" name="username_request" x-ref="username_request" required="">
                    </div>
                    <div class="input-box">
                        <i class="fas fa-key"></i><input type="password" placeholder="Password" class="popIn" name="password_request" x-ref="password_request" required="">
                        <span class="eye" onclick="myFunctionReqLog()">
                            <i id="hideReqLog1" class="fas fa-eye" style="cursor: pointer"></i>
                            <i id="hideReqLog2" class="fas fa-eye-slash" style="cursor: pointer"></i>
                        </span>
                    </div>
                    <hr style="margin-top: 34px;">
                    <button type="button" class="loginReqLog" style="position: relative; text-decoration: none; z-index: 1; cursor: pointer" x-ref="verify_req_login_button" x-on:click="verify_user_process">VERIFY</button>
                    <button type="button" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_login_request">X</button>
                    <button type="button" class="loginReqLog" style="position: relative; text-decoration: none; z-index: 1; cursor: pointer" x-on:click="exit_login_request">CLOSE</button>
                </div>
            </div>
        </div>

        <!-- REQUEST FORM -->
        <div class="popupAdSelect" x-show="show_services_form" style="display: none">
            <div class="popup-contentAdSelect">
                <div class="popup-child1" style="margin-bottom: 5px">
                    <form role="form">
                        <div style="display: flex; flex-direction: row; gap: 40px; justify-content: center">
                            <div style="width: 100%">
                                <div class="row" style="text-align: left; display: flex; justify-content: center">
                                    <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 10px 0 10px;">
                                        <h2 style="font-weight: bold">Select one request</h2>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                    <div class="row" style="text-align: center">
                                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 10px 0 10px;">
                                            
                                            <button type="button" class="btn btn-success reqCrop" style="width: 80%; margin-left: 20px" id="submitCrop" x-on:click="show_requestCrops_form = true"><h5>Request Crops</h5></button>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 10px 0 10px;">
                                            <button type="button" class="btn btn-success reqRequest" style="width: 80%; margin-left: 20px" id="submitRequest" x-on:click="show_requestServices_form = true"><h5>Request Services</h5></button>
                                        </div>
                                    </div>
                                <button type="button" id="closeB" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_services">X</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Request Crops -->
        <div class="popup3crops" x-show="show_requestCrops_form" style="display: none">
            <div class="popup-content3crops">
                <div class="popup-child3">
                    <form role="form">
                        <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center">
                            <div style="width: 100%">
                            <h2 style="font-weight: bold">Request for crops</h2>
                            <hr>
                            <span>
                                <h3 style="color: red" x-text="landing_page_msg"></h3>
                            </span>
                            <div class="row" style="text-align: left; display: flex; justify-content: center">
                                <div class="column">
                                <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                    <label for="cropSel" style="font-weight: bold">Crops: </label>
                                    <select name="cropSel" style="width: 100%; height: auto; margin-bottom: 0; padding: 10px; border-radius: 3px" x-ref="crop_id" >
                                        <option disabled selected hidden>Choose crop</option>
                                        <template x-for="crop in crops">
                                            <option :value="crop.crop_id" x-text="crop.crop_name" x-ref="crop_type"></option>
                                        </template>
                                        <!-- <option value="1">Mustasa seed</option>
                                        <option value="2">Pechay seed</option>
                                        <option value="3">Calabasa seed</option>
                                        <option value="4">Corn seed</option>
                                        <option value="5">Rice seed</option>
                                        <option value="6">Stringbeans seed</option>
                                        <option value="7">Eggplant seed</option> -->
                                    </select>
                                </div>
                                </div>
                                <div class="column">
                                    <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                            <label for="last_name" style="font-weight: bold">Kilo:</label>
                                                <input type="number" name="last_name" id="last_name" class="form-control input-lg" x-ref="crop_kilo" placeholder="Kilo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <br>
                                <div class="column" style="text-align: center">
                                    <button type="button" class="loginB" style="width: 50%" id="submitBdec" x-ref="request_crop_button" x-on:click="request_crop">Submit</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="popup-child2">
                    <button type="button" id="closeDecB" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_services">X</button>
                </div>
            </div>
        </div>

        <!-- Request Service -->

        <div class="popup4services" x-show="show_requestServices_form" style="display: none">
            <div class="popup-content4services">
                <div class="popup-child3">
                    <form role="form">
                        <div class="formG" style="display: flex; flex-direction: row; gap: 40px; justify-content: center">
                            <div style="width: 100%">
                            <h2 style="font-weight: bold">Request for services</h2>
                            <hr>
                            <span>
                                <h3 style="color: red" x-text="landing_page_msg"></h3>
                            </span>
                            <div style="text-align: left; display: flex; justify-content: center; flex-direction: column; gap: 20px">
                                <div>
                                    <label for="selectD" style="font-weight: bold">Services:</label>
                                    <select class="selectD" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px" x-ref="service_id">
                                        <option disabled selected hidden>Choose services</option>
                                        <template x-for="service in services">
                                            <option :value="service.service_id" x-text="service.service_name"></option>
                                        </template>
                                        <!-- <option selected>Choose service</option>
                                        <option value="1">Soil Sampling</option>
                                        <option value="2">Technical Assistance</option>
                                        <option value="3">Financial Assistance</option> -->
                                    </select>
                                </div>
                                <div>
                                    <div style="text-align: left; display: flex; flex-direction: column">
                                        <label for="selectD" style="font-weight: bold">Purpose of Request:</label>
                                        <textarea name="selectD" id="selectD" cols="65" rows="5" style="display: block" x-ref="service_remarks"></textarea>
                                    </div>
                                </div>
                            </div>
                                <br>
                                <div class="column" style="text-align: center">
                                    <button type="button" class="loginB" style="width: 50%" x-ref="request_service_button" x-on:click="request_service">Submit</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="popup-child2">
                    <button type="button" id="closeDecB" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="exit_services">X</button>
                </div>
            </div>
        </div>
        
        <!-- POPUP FORGOT SECRETPHRASE PASSWORD -->
        <div class="popup-2" x-show="show_forgotPass_form" style="display: none">
            <div class="popup-content-2">
                <div class="popup-child1-2" style="margin-top: 40px">
                    <h1>Forgot your password?</h1><h3 class="xB-2" id="xB-2" style="position: absolute; top: 0px; right: 20px; cursor: pointer" x-on:click="exit_forgot_pass">X</h3>
                    <p>Enter your username and secret phrase to reset your password.</p>
                    <span>
                        <h3 style="color: red" x-text="landing_page_msg"></h3>
                    </span>
                    <form>
                        <div class="input-box" style="width: 80%">
                            <i id="key" class="fas fa-envelope"></i><input type="text" placeholder="Username" class="popIn-2" name="username" x-ref="username_secret_phrase" required>
                        </div>
                        <div class="input-box" style="width: 90%">
                            <i id="key" class="fas fa-mask"></i><input type="password" placeholder="Secret Phrase" id="inPass2" class="popIn-2" name="secret_phrase" x-ref="gen_secret_phrase" required>
                            <span class="eye2" onclick="myFunction2()">
                                <i id="hide1-2" class="fas fa-eye" style="cursor: pointer; display: none"></i>
                                <i id="hide2-2" class="fas fa-eye-slash" style="cursor: pointer"></i>
                            </span>
                        </div>
                        <hr style="margin-top: 30px;">
                        <!-- <a type="button" x-on:click="show_changePass_form = true">Confirm</button> -->
                        <button type="button" class="registerB" style="text-decoration: none; margin-bottom: 20px" x-ref="verify_secret_phrase_button" x-on:click="verify_secret_phrase">Verify</button>
                    </form>
                </div>
                <div class="popup-child2-2">
                    <img src="<?php echo IMAGES; ?>thinking_out_loud.png" width="300" height="auto" style="border-radius: 0.6em">
                </div>
            </div>
        </div>

        <!-- POPUP RESET PASSWORD -->
        <div class="popup-1" x-show="show_changePass_form" style="display: none">
            <div class="popup-content-1">
                <div class="popup-child1-1">
                    <h1>Reset your password.</h1> <h3 class="xB-1" id="xB-1" style="position: absolute; top: 0px; right: 20px; cursor: pointer" x-on:click="exit_forgot_pass">X</h3>
                    <p>Enter a new password for your account.</p>
                    <span>
                        <h3 style="color: red" x-text="landing_page_msg"></h3>
                    </span>
                    <div class="input-box">
                        <i class="fas fa-key"></i><input type="password" placeholder="New password" id="inPass1-1" class="popIn-1" name="" x-ref="confirm_password" required>
                        <span class="eye2" onclick="myFunction1()">
                            <i id="hide1-1" class="fas fa-eye" style="cursor: pointer; display: none"></i>
                            <i id="hide2-1" class="fas fa-eye-slash" style="cursor: pointer"></i>
                        </span>
                    </div>
                    <div class="input-box" style="margin-bottom: 15px">
                        <i class="fas fa-key"></i><input type="password" placeholder="Confirm new password" id="inPass1-2" class="popIn-1" name="" x-ref="confirm_change_password" required>
                        <span class="eye2" onclick="myFunction11()">
                            <i id="hide1-12" class="fas fa-eye" style="cursor: pointer; display: none"></i>
                            <i id="hide2-12" class="fas fa-eye-slash" style="cursor: pointer"></i>
                        </span>
                    </div>
                    <hr>
                    <button class="resetB-1" id="resetB-1" type="button" name="change_password_btn" x-ref="change_password_button" x-on:click="update_password">CHANGE PASSWORD</button>
                </div>
                <div class="popup-child2-1">
                    <img src="<?php echo IMAGES; ?>forgot_password_img.png" width="420" height="320" style="border-radius: 0.6em">
                </div>
            </div>
        </div>
    </div>
    

    <section class="supp">
        <div class="container" style="text-align: center;">
            <div>
                <h1 id="program">DATA-DRIVEN SOLUTION</h1>
            </div>
            <hr class="hr1">
            <div>
                <h3>INDUSTRIES</h3>
                <p>Our farm management software portfolio supports all stakeholders of agrified value chain<br>
                    Find out how we solve real-life challenges in your industry
                </p>
            </div>
        </div>
        <div class="parentCon">
            <div>
                <img src="<?php echo IMAGES; ?>HVC.jpg" width="320" height="auto" style="border-radius: 0.6em">
                <br>
                <center><a href="https://pcic.gov.ph/wp-content/uploads/2019/01/HVCC-Final.pdf"><button class="btn1">Learn more</button></a></center>
            </div>
            <div>
                <img src="<?php echo IMAGES; ?>CORN.jpg" width="320" height="auto" style="border-radius: 0.6em">
                <br>
                <center><a href="https://pcic.gov.ph/wp-content/uploads/2019/01/01-Corn-Crop-Insurance-September-03.pdf" ><button class="btn2">Learn more</button></a></center>
            </div>
            <div>
                <img src="<?php echo IMAGES; ?>RICE.jpg" width="320" height="auto" style="border-radius: 0.6em">
                <br>
                <center><a href="https://pcic.gov.ph/wp-content/uploads/2019/01/01-Rice-Crop-Insurance-September-03.pdf"><button class="btn3" id="aboutUs">Learn more</button></a></center>
            </div>
        </div>
        <br>
        <br>
        <div class="container" style="text-align: center;">
            <div>
                <h1>THE STORY OF AYALA DISTRICT</h1>
                <h1>AGRICULTURIST</h1>
            </div>
            <hr class="hr2">
            <br>
            <br>
            <section class="parentCon1">
                <article class="column" >
                    <p>Ayala Field  Office was among of the first 3 field offices established in the 1980's to cater 
                        the needs of the farmers and implement the different programs of the City Agriculturist Office.</p>
                </article>
                <article class="column" >   
                    <p>Ayala Field  Office was among of the first 3 field offices established in the 1980's to cater 
                        the needs of the farmers and implement the different programs of the City Agriculturist Office</p>
                </article>
            </section>
        </div>
        <br>
        <br>
        <div class="container" style="text-align: center;">
            <div>
                <h1 id="personnelT">LEADERSHIP TEAM</h1>
            </div>
        </div>
        <hr class="hr3">
        <br>
        <br>
        <div class="gridParent">
            <div class="gridChild1">
                <img src="<?php echo IMAGES; ?>sir1.jpg" width="250" height="250" class="img6" style="border-radius: 10em">
                <div style="text-align: center;">
                    <h3>Agricultural Technologist</h3>
                    <h5>Medardo L. Lozada</h5>
                </div>
            </div>
            <div class="gridChild2">
                <img src="<?php echo IMAGES; ?>sir2.jpg" width="250" height="auto" class="img1" style="border-radius: 10em">
                <div style="text-align: center;">
                    <h3>Agricultural Technologist</h3>
                    <h5>Vie Jay N. Eullaran</h5>
                </div>
            </div>
            <div class="gridChild3">
                <img src="<?php echo IMAGES; ?>maam1.jpg" width="250" height="auto" class="img2" style="border-radius: 10em">
                <div style="text-align: center;">
                    <h3>Aquaculturist 2</h3>
                    <h5>Grace Caceres</h5>
                </div>
            </div>
            <div class="gridChild4">
                <img src="<?php echo IMAGES; ?>maam2.jpg" width="250" height="auto" class="img3" style="border-radius: 10em">
                <div style="text-align: center;">
                    <h3>Agriculturist 2</h3>
                    <h5>Haji Monira G. Inggal</h5>
                </div>
            </div>
            <div class="gridChild5">
                <img src="<?php echo IMAGES; ?>maam3.jpg" width="250" height="auto" class="img4" style="border-radius: 10em">
                <div style="text-align: center;">
                    <h3>Agricultural Technician</h3>
                    <h5>Meiselin C. Paclibar</h5>
                </div>
            </div>
            <div class="gridChild6">
                <img src="<?php echo IMAGES; ?>maam4.jpg" width="250" height="auto" class="img5" style="border-radius: 10em">
                <div style="text-align: center;">
                    <h3>Agricultural Technologist</h3>
                    <h5>Margie E. Bernardo</h5>
                </div>
            </div>
        </div>
        <hr id="contact" style="width: 1000px; background: green; border: 2px solid green; border-radius: 1em; margin-top: 80px">
        <div class="contact" id="#">
            <div class="contact-form">
                <div class="container">
                <form>
                <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h1 style="color: green;" >Get in Touch</h1> 
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 right">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Your Name" name="">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" placeholder="YourEmail@email.com" name="email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-lg">
                        </textarea>
                    </div>
                    <input type="submit" class="btn4" value="Send" name="">
                </div>
                </div>
                </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <main>
            <div class="box1">
                <h3>LOGO</h3>
                <p>Lorem Ipsum.</p>
                <p>Lorem Ipsum.</p>
                <p>Lorem Ipsum.</p>
            </div>
            <div class="box2">
                <h3>ABOUT</h3>
                <p>Lorem Ipsum.</p>
                <p>Lorem Ipsum.</p>
                <p>Lorem Ipsum.</p>
            </div>
            <div class="box3">
                <h3>QUICK LINKS</h3>
                <p>Lorem Ipsum.</p>
                <p>Lorem Ipsum.</p>
                <p>Lorem Ipsum.</p>
            </div>
            <div class="box4">
                <h4>RiseTech</h4>
            </div>
        </div>
        </main>
    </footer>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('landing_page', () => ({
                info_no: 1,
                show_changePass_form: false,
                show_farmer_loginForm: false,
                show_farmer_registrationForm: false,
                show_login_requestForm: false,
                show_request_form: false,
                show_forgotPass_form: false,
                show_services_form: false,
                show_requestServices_form: false,
                show_requestCrops_form: false,
                show_successForm: false,
                show_success_registrationForm: false,
                
                error_landing: false,
                landing_page_msg: '',
                user_id: 0,

                crops: [],
                services: [],

                show_exit(){
                    this.show_forgotPass_form = true;
                    this.show_farmer_loginForm = false;
                },

                next(){
                    if(this.info_no < 4){
                        this.info_no = (this.info_no + 1);
                    }
                },

                back(){
                    if(this.info_no > 1){
                        this.info_no = (this.info_no - 1);
                    }

                },

                exit_login(){
                    this.show_farmer_loginForm = false;
                },

                exit_login_request(){
                    this.show_login_requestForm = false;
                },

                exit_register(){
                    this.info_no = 1;
                    this.show_farmer_registrationForm = false;
                },

                exit_forgot_pass(){
                    this.show_changePass_form = false;
                    this.show_forgotPass_form = false;
                },

                exit_services(){
                    this.show_requestServices_form = false;
                    this.show_requestCrops_form = false;
                    this.show_services_form = false;
                    this.user_id = 0;
                },

                check_me(){
                    this.$refs.submit_farmer_button.disabled = !true;
                },

                confirm_reset(){
                    this.show_farmer_loginForm = true;
                    this.show_successForm = false;
                },

                confirm_register_exit(){
                    this.show_farmer_loginForm = true;
                    this.show_success_registrationForm = false;
                },

                async submit_farmer_form(){
                    this.$refs.submit_farmer_button.disabled = true;
                    if(this.$refs.first_name.value && this.$refs.middle_name.value && this.$refs.last_name.value && this.$refs.role_service.value && this.$refs.birth_date.value && this.$refs.civil_status.value && this.$refs.sex.value && this.$refs.contact_no.value && this.$refs.religion.value && this.$refs.birth_place.value && this.$refs.address_street.value && this.$refs.address_barangay.value && this.$refs.address_municipality.value && this.$refs.username.value && this.$refs.password.value && this.$refs.address_zip.value && this.$refs.guardian_fname.value && this.$refs.guardian_contact.value && this.$refs.farm_type.value && this.$refs.farm_barangay.value && this.$refs.farm_municipality.value && this.$refs.farm_area.value){
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
                                civil_status: this.$refs.civil_status.value,
                                sex: this.$refs.sex.value,
                                contact_no: this.$refs.contact_no.value,
                                religion: this.$refs.religion.value,
                                birth_place: this.$refs.birth_place.value,
                                address_street: this.$refs.address_street.value,
                                address_barangay: this.$refs.address_barangay.value,
                                address_municipality: this.$refs.address_municipality.value,
                                username: this.$refs.username.value,
                                password: this.$refs.password.value,
                                address_zip: this.$refs.address_zip.value,
                                guardian_fname: this.$refs.guardian_fname.value,
                                guardian_contact: this.$refs.guardian_contact.value,
                                farm_type: this.$refs.farm_type.value,
                                farm_barangay: this.$refs.farm_barangay.value,
                                farm_municipality: this.$refs.farm_municipality.value,
                                farm_area: this.$refs.farm_area.value,
                                secret_phrase: this.$refs.secret_phrase.value,
                                role: this.$refs.role.value,
                                status: this.$refs.status.value,

                            }

                            await axios.post('controller/farmer/register_farmer.php', data, options)
                            .then((response) => {
                                this.$refs.submit_farmer_button.disabled = false;
                                // console.log((response.data == false));
                                if(response.data == false) {
                                    this.error_landing = true;
                                    this.landing_page_msg = 'Username already taken!';
                                    setTimeout(() => {
                                        this.error_landing = false;
                                        this.landing_page_msg = '';
                                    }, 2000);
                                }
                                else if(response.data == true){
                                    this.info_no = 1;
                                    this.show_farmer_registrationForm = false;
                                    this.show_success_registrationForm = true;
                                }
                            },
                            (error) => {
                                console.log(error);
                            });

                        }
                        else{
                            this.error_landing = true;
                            this.landing_page_msg = 'Password do not match!';
                            this.$refs.submit_farmer_button.disabled = true;
                            setTimeout(() => {
                                this.error_landing = false;
                                this.landing_page_msg = '';
                            }, 2000);
                        }
                    }
                    else{
                        this.error_landing = true;
                        this.landing_page_msg = 'Please fill in all required fields!';

                        setTimeout(() => {
                            this.error_landing = false;
                            this.landing_page_msg = '';
                        }, 2000);
                    }
                },

                async login(){
                    if(this.$refs.login_username.value || this.$refs.login_password.value){
                        this.$refs.login_button.disabled = true;
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            username: this.$refs.login_username.value,
                            password: this.$refs.login_password.value,
                        };

                        await axios.post('controller/login/login_process.php', data, options)
                        .then((response) => {
                            if (response.data == false) {
                                this.$refs.login_button.disabled = false;
                                this.landing_page_msg = 'Invalid Username or Password';
                                
                                setTimeout(() => {
                                    this.landing_page_msg = '';
                                }, 2000);
                            }
                            else if(response.data == 1){
                                window.location = 'modules/admin/admin_dash_body.php';
                            }
                            else if(response.data == 2){
                                // window.location = '';
                            }
                            else if(response.data == 3){
                                window.location = 'modules/personnel/personnel_dash_body.php';
                                // this.$refs.login_button.disabled = false;
                                // this.landing_page_msg = 'Account successfully Logged in!';

                                // setTimeout(() => {
                                //     this.landing_page_msg = '';
                                // }, 2000);
                            }
                            else if(response.data == 4){
                                this.$refs.login_button.disabled = false;
                                this.landing_page_msg = 'Account is not yet verified!';

                                setTimeout(() => {
                                    this.landing_page_msg = '';
                                }, 2000);
                            }
                        });
                    }
                    else{
                        this.landing_page_msg = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg = '';
                        }, 2000);
                    };
                },

                async verify_user_process(){
                    if(this.$refs.username_request.value && this.$refs.password_request.value){
                        this.$refs.verify_req_login_button.disabled = true;
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            username: this.$refs.username_request.value,
                            password: this.$refs.password_request.value,
                        };

                        await axios.post('controller/farmer/verify_user_process.php', data, options)
                        .then((response) => {
                            this.$refs.verify_req_login_button.disabled = false;
                            if (response.data.return_status == false) {
                                this.landing_page_msg = 'Invalid Username or Password!';
                                
                                setTimeout(() => {
                                    this.landing_page_msg = '';
                                }, 2000);
                            }
                            else if(response.data.return_status == true){
                                this.landing_page_msg = 'Account successfully Logged in!';
                                this.show_login_requestForm = false;
                                this.show_services_form = true;
                                this.user_id = response.data.user_id; 
                                setTimeout(() => {
                                    this.landing_page_msg = '';
                                }, 2000);
                            }
                            else if(response.data.return_status == 2){
                                this.landing_page_msg = 'You are not allowed to request!';
                                
                                setTimeout(() => {
                                    this.landing_page_msg = '';
                                }, 2000);
                            }
                            else if(response.data.return_status == 3){
                                this.landing_page_msg = 'You are not yet verified!';
                                
                                setTimeout(() => {
                                    this.landing_page_msg = '';
                                }, 2000);
                            }
                            console.log(response.data)
                        });
                    }
                    else{
                        this.landing_page_msg = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg = '';
                        }, 2000);
                    };
                    
                },

                async generate_secret_phrase(){
                    await axios.get('controller/farmer/generate_secret_key.php')
                    .then((response) => {
                        console.log(response.data);
                        this.$refs.secret_phrase.value = response.data;
                    });
                },

                async verify_secret_phrase(){
                    if(this.$refs.gen_secret_phrase.value){
                        this.$refs.verify_secret_phrase_button.disabled = true;
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            username: this.$refs.username_secret_phrase.value,
                            secret_phrase: this.$refs.gen_secret_phrase.value,
                        };
                        await axios.post('controller/farmer/verify_secret_phrase.php', data, options)
                        .then((response) => {
                            // console.log(response.data.return_status == true);
                            if (response.data.return_status == true) {
                                this.user_id = response.data.user_id;
                                this.$refs.verify_secret_phrase_button.disabled = false;
                                this.show_changePass_form = true;
                                this.show_forgotPass_form = false;
                            }
                            else {
                                this.$refs.verify_secret_phrase_button.disabled = false;
                                this.landing_page_msg = 'Invalid Secret Phrase or Username!';      
                                setTimeout(() => {
                                    this.landing_page_msg = '';
                                }, 2000);
                            }
                        });
                    }
                    else{
                        this.landing_page_msg = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg = '';
                        }, 2000);
                    }
                },

                async update_password(){
                    if(this.$refs.confirm_password.value && this.$refs.confirm_change_password.value){
                        
                        if(this.$refs.confirm_password.value == this.$refs.confirm_change_password.value){
                            this.$refs.change_password_button.disabled = true;
                            
                            const options = {
                                xsrfHeaderName: 'X-XSRF-TOKEN',
                                xsrfCookieName: 'XSRF-TOKEN',
                            };
                            let data = {
                                confirm_password: this.$refs.confirm_password.value,
                                user_id: this.user_id,
                            };
                            await axios.post('controller/farmer/reset_password.php', data, options)
                            .then((response) => {
                                // console.log(response.data);
                                // this.user_id = 0;
                                this.$refs.change_password_button.disabled = false;
                                this.show_changePass_form = false;
                                this.show_successForm = true;
                            });
                        }
                        else{
                            this.landing_page_msg = 'New Password do not match!';
                            setTimeout(() => {
                                this.landing_page_msg = '';
                            }, 2000);
                        }
                        
                    }
                    else{
                        this.landing_page_msg = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg = '';
                        }, 2000);
                    }
                },

                async request_crop(){
                    if(this.$refs.crop_id.value && this.$refs.crop_kilo.value){
                        this.$refs.request_crop_button.disabled = true;
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            crop_id: this.$refs.crop_id.value,
                            service_id: null,
                            crop_kilo: this.$refs.crop_kilo.value,
                            user_id: this.user_id,
                            service_remarks: 'Null',
                            request_type: 'Crop',
                        };
                        await axios.post('controller/farmer/request_crop.php', data, options)
                        .then((response) => {
                            this.$refs.request_crop_button.disabled = false;
                            // console.log(response.data)
                            this.landing_page_msg = 'Crops Successfully Requested!';
                            setTimeout(() => {
                                this.landing_page_msg = '';
                                this.show_requestCrops_form = false;
                                this.show_services_form = true;
                                this.user_id = 0;
                            }, 4000);
                            
                        });
                    }
                    else{
                        this.landing_page_msg = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg = '';
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
                        await axios.post('controller/farmer/request_service.php', data, options)
                        .then((response) => {
                            this.$refs.request_service_button.disabled = false;
                            // console.log(response.data)
                            this.landing_page_msg = 'Service Successfully Requested!';
                            setTimeout(() => {
                                this.landing_page_msg = '';
                                this.show_requestServices_form = false;
                                this.show_services_form = true;
                                this.user_id = 0;
                            }, 4000);
                            
                        });
                    }
                    else{
                        this.landing_page_msg = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg = '';
                        }, 2000);
                    }
                },

                async get_services_crops(){
                    await axios.get("controller/farmer/get_crops_services.php")
                    .then((response)=>{
                        this.crops = (response.data.crops);
                        this.services = (response.data.services);
                        
                    });
                },

                async verify_secret_phrase(){
                    if(this.$refs.gen_secret_phrase.value){
                        this.$refs.verify_secret_phrase_button.disabled = true;
                        const options = {
                            xsrfHeaderName: 'X-XSRF-TOKEN',
                            xsrfCookieName: 'XSRF-TOKEN',
                        }
                        let data = {
                            username: this.$refs.username_secret_phrase.value,
                            secret_phrase: this.$refs.gen_secret_phrase.value,
                        };
                        await axios.post('controller/farmer/verify_secret_phrase.php', data, options)
                        .then((response) => {
                            // console.log(response.data.return_status == true);
                            if (response.data.return_status == true) {
                                this.user_id = response.data.user_id;
                                this.$refs.verify_secret_phrase_button.disabled = false;
                                this.show_changePass_form = true;
                                this.show_forgotPass_form = false;
                            }
                            else {
                                this.$refs.verify_secret_phrase_button.disabled = false;
                                this.landing_page_msg = 'Invalid Secret Phrase or Username!';      
                                setTimeout(() => {
                                    this.landing_page_msg = '';
                                }, 2000);
                            }
                        });
                    }
                    else{
                        this.landing_page_msg = 'Please fill in all required fields!';
                        setTimeout(() => {
                            this.landing_page_msg = '';
                        }, 2000);
                    }
                }
            }))
        })
    </script>
    <script>
    function myFunctionAd() {
        var x = document.getElementById("inPassAd");
        var y = document.getElementById("hideAd1");
        var z = document.getElementById("hideAd2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    function myFunctionReqLog() {
        var x = document.getElementById("inPassReqLog");
        var y = document.getElementById("hideReqLog1");
        var z = document.getElementById("hideReqLog2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    function myFunctionPer() {
        var x = document.getElementById("inPassPer");
        var y = document.getElementById("hidePer1");
        var z = document.getElementById("hidePer2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    function myFunction() {
        var x = document.getElementById("inPass");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    function myFunction2() {
        var x = document.getElementById("inPass2");
        var y = document.getElementById("hide1-2");
        var z = document.getElementById("hide2-2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    function myFunction1() {
        var x = document.getElementById("inPass1-1");
        var y = document.getElementById("hide1-1");
        var z = document.getElementById("hide2-1");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    function myFunction11() {
        var x = document.getElementById("inPass1-2");
        var y = document.getElementById("hide1-12");
        var z = document.getElementById("hide2-12");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    </script>
    
<?php 
    include_once('includes/footer_guest.php');
?>