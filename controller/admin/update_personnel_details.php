<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $is_duplicate = false;
    $records = '';
    $pattern = "/^09\d{9}$/";
    // $test = 'Working';
    // require_once('../../settings/custom_sql.php');
    
    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $first_name = $obj['first_name'];
        $middle_name = $obj['middle_name'];
        $last_name = $obj['last_name'];
        $role_service = $obj['role_service'];
        $birth_date = $obj['birth_date'];
        $sex = $obj['sex'];
        $contact_no = $obj['contact_no'];
        $religion = $obj['religion'];
        $birth_place = $obj['birth_place'];
        $address_street = $obj['address_street'];
        $address_barangay = $obj['address_barangay'];
        $address_municipality = $obj['address_municipality'];
        $username = $obj['username'];
        $role = $obj['role'];
        $id = $obj['id'];
       
        // $secret_phrase = encrypt_ams($obj['secret_phrase']);

        // $sql = $db->prepare("SELECT * FROM user WHERE username = :username");
        // $sql->execute(array(':username' => $username));
        // $users = $sql->fetchAll();
        
        if(preg_match($pattern, $contact_no)){
            // INSERT RECORD
            $sql_u = $db->prepare("UPDATE user SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name, role_service = :role_service, birth_date = :birth_date, sex = :sex, contact_no = :contact_no, religion = :religion, birth_place = :birth_place, address_street = :address_street, address_barangay = :address_barangay, address_municipality = :address_municipality, username = :username, role = :role WHERE id = :id");
            //bind
            $sql_u->bindParam(':first_name', $first_name);
            $sql_u->bindParam(':middle_name', $middle_name);
            $sql_u->bindParam(':last_name', $last_name);
            $sql_u->bindParam(':role_service', $role_service);
            $sql_u->bindParam(':birth_date', $birth_date);
            $sql_u->bindParam(':sex', $sex);
            $sql_u->bindParam(':contact_no', $contact_no);
            $sql_u->bindParam(':religion', $religion);
            $sql_u->bindParam(':birth_place', $birth_place);
            $sql_u->bindParam(':address_street', $address_street);
            $sql_u->bindParam(':address_barangay', $address_barangay);
            $sql_u->bindParam(':address_municipality', $address_municipality);
            $sql_u->bindParam(':username', $username);
            $sql_u->bindParam(':role', $role);
            $sql_u->bindParam(':id', $id);

            $return_value = ($sql_u->execute()) ? 'true' : 'false';

            // Retrieve updated record
            $sql_all = $db->prepare("SELECT * FROM user WHERE role IN ('Personnel', 'Admin') ORDER BY date_registered DESC");
            $sql_all->execute();
            $records = $sql_all->fetchAll();
        }
        else {
            $return_value = 'false';
            // echo $return_value = $test;
        }
        
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
    }
    $database->close();

    $return_dict = [
        'status' => $return_value,
        'personnel_update' => $records,
    ];
    echo json_encode($return_dict);
?>