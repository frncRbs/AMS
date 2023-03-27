<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $is_verified = '';
    $user_id = 0;

    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $username = $obj['username'];
        $password = $obj['password'];

        $sql = $db->prepare("SELECT * FROM user WHERE username = :username");
        $sql->execute(array(':username' => $username));
        $users = $sql->fetch();
        
        if($users){
            $is_verified = $users['status'];
            if($is_verified){
                if(strtolower($password) == decrypt_ams($users['password'])){
                    if($users['role'] == 'Farmer'){
                        $return_value = true; // If account is a farmer
                        $user_id = $users['id'];
                    }
                    else{
                        $return_value = 2; // If account is not a farmer
                    }
                }else{
                    $return_value = 'false';
                }
            }else{
                $return_value = 3;
            }   
        }
        else {
            $return_value = 'false';
        }
        


    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    $return_dic = [
        'return_status' => $return_value,
        'user_id' => $user_id,
    ];

    echo json_encode($return_dic);
?>