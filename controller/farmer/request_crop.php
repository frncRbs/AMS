<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $is_duplicate = false;
    $test = "WORKING REQUEST CROP";
    // require_once('../../settings/custom_sql.php');
    
    
    try {
        // // Receive data from axios post
        // $obj = json_decode(file_get_contents('php://input'), TRUE);
        // $first_name = $obj['first_name'];
        // $middle_name = $obj['middle_name'];
        // $role = 'Farmer';
        // $status = 'Pending';

        // $sql = $db->prepare("SELECT * FROM user WHERE username = :username");
        // $sql->execute(array(':username' => $username));
        // $users = $sql->fetchAll();
        
        // if($users){
        //     $return_value = 'false';
        // }
        // else {
        //     // INSERT RECORD
        //     $sql = $db->prepare("INSERT INTO user (first_name, middle_name, last_name, role_service, birth_date, civil_status, sex, contact_no, religion, birth_place, address_street, address_barangay, address_municipality, username, password, address_zip, guardian_fname, guardian_contact, farm_type, farm_barangay, farm_municipality, farm_area, secret_phrase, role, status) VALUES (:first_name, :middle_name, :last_name, :role_service, :birth_date, :civil_status, :sex, :contact_no, :religion, :birth_place, :address_street, :address_barangay, :address_municipality, :username, :password, :address_zip, :guardian_fname, :guardian_contact, :farm_type, :farm_barangay, :farm_municipality, :farm_area, :secret_phrase, :role, :status)");
        //     //bind
        //     $sql->bindParam(':first_name', $first_name);
        //     $sql->bindParam(':middle_name', $middle_name);

        //     $return_value = 'true';
        //     ($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';
        // }
        $return_value = $test;
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }
    $database->close();
    echo $return_value;
?>