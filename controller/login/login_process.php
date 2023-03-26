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

        $sql = $db->prepare("SELECT * FROM user WHERE username = :username");
        $sql->execute(array(':username' => $username));
        $users = $sql->fetch();
        
        if($users){
            if(strtolower($password) == decrypt_ams($users['password'])){
                $user_exists = true;
                $user_role = $users['role'];
            }
        }
        else {
            $return_value = 'false';
        }

        if($user_exists){
            if($user_role == 'Admin'){
                $return_value = 1; //Admin
            }
            else if($user_role == 'User'){
                $return_value = 2; // User/Personnel
            }
            else {
                $return_value = 3; // Farmer
            }
        }
        


    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    echo $return_value;
?>