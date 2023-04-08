<?php
    session_start();
    require ('custom.php');

    define("HOST",              "localhost");
    define("LOCATION",          "http://".HOST."/AMS/");
    define("DATABASE_NAME",     "db_agriculture");
    define("DATABASE_USERNAME", "root");
    define("DATABASE_PASSWORD", "");

    define("ASSETS",    LOCATION."assets/");
    define("CSS",       ASSETS."css/");
    define("JS",        ASSETS."js/");
    define("IMAGES",    ASSETS."images/");
    define("UPLOADS",   ASSETS."uploads/");
    define("LANDING_PAGE",   "modules/landing_page.php");
    define("CIPHER",   "aes-128-gcm");
    define("PHP_MAILER",   LOCATION."plugins/PHPMailer/src/");

    define('INCLUDES', LOCATION."includes/");

    // rWF+fL6meIM2Z+01+73BLh1KgP5YNrzgCIXMX2xMR5FlOqrP2kAinIcD3p5aS0hZOuXhCWdtqkh9XiTPxSWIEQrgIlZiMW+sioi8D6a2tl8=
?>

