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
        $password = encrypt_ams($obj['password']);
        $secret_phrase = encrypt_ams($obj['secret_phrase']);
        $role = 'Personnel';
        $status = true;
        // $image = 'personnel.jpg';

        $sql = $db->prepare("SELECT * FROM user WHERE username = :username");
        $sql->execute(array(':username' => $username));
        $users = $sql->fetchAll();
        
        
        if($users){
            $return_value = 2;
        }
        else {
            if(preg_match($pattern, $contact_no)){
                if(preg_match($email_pattern, $username)){
                    // INSERT RECORD
                    $sql = $db->prepare("INSERT INTO user (first_name, middle_name, last_name, role_service, birth_date, sex, contact_no, religion, birth_place, address_street, address_barangay, address_municipality, username, password, secret_phrase, role, status) VALUES (:first_name, :middle_name, :last_name, :role_service, :birth_date, :sex, :contact_no, :religion, :birth_place, :address_street, :address_barangay, :address_municipality, :username, :password, :secret_phrase, :role, :status)");
                    //bind
                    $sql->bindParam(':first_name', $first_name);
                    $sql->bindParam(':middle_name', $middle_name);
                    $sql->bindParam(':last_name', $last_name);
                    $sql->bindParam(':role_service', $role_service);
                    $sql->bindParam(':birth_date', $birth_date);
                    $sql->bindParam(':sex', $sex);
                    $sql->bindParam(':contact_no', $contact_no);
                    $sql->bindParam(':religion', $religion);
                    $sql->bindParam(':birth_place', $birth_place);
                    $sql->bindParam(':address_street', $address_street);
                    $sql->bindParam(':address_barangay', $address_barangay);
                    $sql->bindParam(':address_municipality', $address_municipality);
                    $sql->bindParam(':username', $username);
                    $sql->bindParam(':password', $password);
                    $sql->bindParam(':secret_phrase', $secret_phrase);
                    $sql->bindParam(':role', $role);
                    $sql->bindParam(':status', $status);
                    // $sql->bindParam(':image', $image);

                    ($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';

                    // Retrieve updated record
                    $sql_all = $db->prepare("SELECT * FROM user WHERE role IN ('Personnel', 'Admin') ORDER BY date_registered DESC");
                    $sql_all->execute();
                    $records = $sql_all->fetchAll();
                }else{
                    $return_value = 4;
                }
            }else{
                $return_value = 3;
            }
        }
        // echo $return_value = $test;
        
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $return_dict = [
        'status' => $return_value,
        'personnel_update' => $records,
    ];

    echo json_encode($return_dict);
?>