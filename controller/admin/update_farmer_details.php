<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $is_duplicate = false;
    $records = '';
    $pattern = "/^09\d{9}$/";
    $email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
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
        $civil_status = $obj['civil_status'];
        $sex = $obj['sex'];
        $contact_no = $obj['contact_no'];
        $religion = $obj['religion'];
        $birth_place = $obj['birth_place'];
        $address_street = $obj['address_street'];
        $address_barangay = $obj['address_barangay'];
        $address_municipality = $obj['address_municipality'];
        $address_zip = $obj['address_zip'];
        $guardian_fname = $obj['guardian_fname'];
        $guardian_contact = $obj['guardian_contact'];
        $farm_type = $obj['farm_type'];
        $farm_barangay = $obj['farm_barangay'];
        $farm_municipality = $obj['farm_municipality'];
        $farm_area = $obj['farm_area'];
        $username = $obj['username'];
        $id = $obj['id'];        
       
        if(preg_match($pattern, $contact_no) && preg_match($pattern, $guardian_contact)){
            
            if(preg_match($email_pattern, $username)){
                // INSERT RECORD
                $sql_u = $db->prepare("UPDATE user SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name, role_service = :role_service, birth_date = :birth_date, civil_status = :civil_status, sex = :sex, contact_no = :contact_no, religion = :religion, birth_place = :birth_place, address_street = :address_street, address_barangay = :address_barangay, address_municipality = :address_municipality, address_zip = :address_zip, guardian_fname = :guardian_fname, guardian_contact = :guardian_contact, farm_type = :farm_type, farm_barangay = :farm_barangay, farm_municipality = :farm_municipality, farm_area = :farm_area, username = :username WHERE id = :id");
                //bind
                $sql_u->bindParam(':first_name', $first_name);
                $sql_u->bindParam(':middle_name', $middle_name);
                $sql_u->bindParam(':last_name', $last_name);
                $sql_u->bindParam(':role_service', $role_service);
                $sql_u->bindParam(':birth_date', $birth_date);
                $sql_u->bindParam(':civil_status', $civil_status);
                $sql_u->bindParam(':sex', $sex);
                $sql_u->bindParam(':contact_no', $contact_no);
                $sql_u->bindParam(':religion', $religion);
                $sql_u->bindParam(':birth_place', $birth_place);
                $sql_u->bindParam(':address_street', $address_street);
                $sql_u->bindParam(':address_barangay', $address_barangay);
                $sql_u->bindParam(':address_municipality', $address_municipality);
                $sql_u->bindParam(':address_zip', $address_zip);
                $sql_u->bindParam(':guardian_fname', $guardian_fname);
                $sql_u->bindParam(':guardian_contact', $guardian_contact);
                $sql_u->bindParam(':farm_type', $farm_type);
                $sql_u->bindParam(':farm_barangay', $farm_barangay);
                $sql_u->bindParam(':farm_municipality', $farm_municipality);
                $sql_u->bindParam(':farm_area', $farm_area);
                $sql_u->bindParam(':username', $username);                      
                $sql_u->bindParam(':id', $id);

                $return_value = ($sql_u->execute()) ? 'true' : 'false';

                // Retrieve updated record
                $sql_all = $db->prepare("SELECT * FROM user WHERE role = 'Farmer'");
                $sql_all->execute();
                $records = $sql_all->fetchAll();
            }else{
                $return_value = 3;
            }
        }
        else {
            $return_value = 2;
            // echo $return_value = $test;
        }
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
    }
    $database->close();

    $return_dict = [
        'status' => $return_value,
        'farmer_update' => $records,
    ];
    echo json_encode($return_dict);
?>