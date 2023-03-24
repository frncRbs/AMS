<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $is_duplicate = false;
    // require_once('../../settings/custom_sql.php');
    
    
    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $first_name = $obj['first_name'];
        $middle_name = $obj['middle_name'];
        $last_name = $obj['last_name'];
        $role_service = $obj['role_service'];
        $birth_date = $obj['birth_date'];
        $civil_status = $obj['civil_status'];
        $sex = $obj['sex'];
        $contact_no = $obj['contact_no'];
        $religion = $obj['religion'];
        $birth_place = $obj['birth_place'];
        $address_street = $obj['address_street'];
        $address_barangay = $obj['address_barangay'];
        $address_municipality = $obj['address_municipality'];
        $username = $obj['username'];
        $password = encrypt_ams($obj['password']);
        $address_zip = $obj['address_zip'];
        $guardian_fname = $obj['guardian_fname'];
        $guardian_contact = $obj['guardian_contact'];
        $farm_type = $obj['farm_type'];
        $farm_barangay = $obj['farm_barangay'];
        $farm_municipality = $obj['farm_municipality'];
        $farm_area = $obj['farm_area'];
        $secret_phrase = $obj['secret_phrase'];
        $role = 'Farmer';
        $status = 'Pending';

        // $fields = array(
        //     'first_name' => $first_name,
        //     'middle_name' => $middle_name,
        //     'last_name' => $last_name,
        //     'role_service' => $role_service,
        //     'birth_date' => $birth_place,
        //     'civil_status' => $civil_status,
        //     'sex' => $sex,
        //     'contact_no' => $contact_no,
        //     'religion' => $religion,
        //     'birth_place' => $birth_place,
        //     'address_street' => $address_street,
        //     'address_barangay' => $address_barangay,
        //     'address_municipality' => $address_municipality,
        //     'username' => $username,
        //     'password' => $password,
        //     'address_zip' => $address_zip,
        //     'guardian_fname' => $guardian_fname,
        //     'guardian_contact' => $guardian_contact,
        //     'farm_type' => $farm_type,
        //     'farm_barangay' => $farm_municipality,
        //     'farm_municipality' => $farm_municipality,
        //     'farm_area' => $farm_area,
        //     'role' => $role,
        //     'status' => $status
        // );

        // $process = new Process();
        // $new_farmer = $process->insert_data($database, 'user', $fields);
        // echo $new_farmer;

        $sql = $db->prepare("SELECT * FROM user WHERE username = :username");
        $sql->execute(array(':username' => $username));
        $users = $sql->fetchAll();
        
        if($users){
            $return_value = 'false';
        }
        else {
            // INSERT RECORD
            $sql = $db->prepare("INSERT INTO user (first_name, middle_name, last_name, role_service, birth_date, civil_status, sex, contact_no, religion, birth_place, address_street, address_barangay, address_municipality, username, password, address_zip, guardian_fname, guardian_contact, farm_type, farm_barangay, farm_municipality, farm_area, secret_phrase, role, status) VALUES (:first_name, :middle_name, :last_name, :role_service, :birth_date, :civil_status, :sex, :contact_no, :religion, :birth_place, :address_street, :address_barangay, :address_municipality, :username, :password, :address_zip, :guardian_fname, :guardian_contact, :farm_type, :farm_barangay, :farm_municipality, :farm_area, :secret_phrase, :role, :status)");
            //bind
            $sql->bindParam(':first_name', $first_name);
            $sql->bindParam(':middle_name', $middle_name);
            $sql->bindParam(':last_name', $last_name);
            $sql->bindParam(':role_service', $role_service);
            $sql->bindParam(':birth_date', $birth_date);
            $sql->bindParam(':civil_status', $civil_status);
            $sql->bindParam(':sex', $sex);
            $sql->bindParam(':contact_no', $contact_no);
            $sql->bindParam(':religion', $religion);
            $sql->bindParam(':birth_place', $birth_place);
            $sql->bindParam(':address_street', $address_street);
            $sql->bindParam(':address_barangay', $address_barangay);
            $sql->bindParam(':address_municipality', $address_municipality);
            $sql->bindParam(':username', $username);
            $sql->bindParam(':password', $password);
            $sql->bindParam(':address_zip', $address_zip);
            $sql->bindParam(':guardian_fname', $guardian_fname);
            $sql->bindParam(':guardian_contact', $guardian_contact);
            $sql->bindParam(':farm_type', $farm_type);
            $sql->bindParam(':farm_barangay', $farm_barangay);
            $sql->bindParam(':farm_municipality', $farm_municipality);
            $sql->bindParam(':farm_area', $farm_area);
            $sql->bindParam(':secret_phrase', $secret_phrase);
            $sql->bindParam(':role', $role);
            $sql->bindParam(':status', $status);

            $return_value = 'true';
            ($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';
        }
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }
    $database->close();
    echo $return_value;
?>