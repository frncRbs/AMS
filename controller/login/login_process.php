<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');

    $database = new Connection();
    $db = $database->open();
    $return_value = '';

    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $username = $obj['username'];
        $password = $obj['password'];

        $user_exists = false;
        $user_role = '';
        $is_verified = '';
        $is_active = '';

        $sql = $db->prepare("SELECT * FROM user WHERE username = :username");
        $sql->execute(array(':username' => $username));
        $users = $sql->fetch();
        
        if($users){
            if(strtolower($password) == decrypt_ams($users['password'])){
                $user_exists = true;
                $is_verified = $users['status'];
                $is_active = $users['is_active'];
                $user_role = $users['role'];

                // Set session variable for logged user
                $_SESSION["login_user_id"] = $users['id'];
                $_SESSION["login_username"] = $users['username'];
                $_SESSION["user_role"] = $users['role'];
                $_SESSION["user_firstname"] = $users['first_name'];

            }
        }
        else {
            $return_value = 'false';
        }

        if($user_exists){
            if($is_verified){
                if($is_active){
                    if($user_role == 'Admin'){
                        $return_value = 1; //Admin
                    }
                    else if($user_role == 'Personnel'){
                        $return_value = 2; // User/Personnel
                    }
                    else if($user_role == 'Farmer'){
                        $return_value = 3; // Farmer
                    }
                }else{
                    $return_value = 5; // Deactivated
                }
            }
            else {
                $return_value = 4; // Not verified
            }
        }

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    echo $return_value;
?>