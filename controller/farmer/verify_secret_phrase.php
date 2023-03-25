<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $user_secret = '';

    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $secret_phrase = $obj['secret_phrase'];
        $username = $obj['username'];

        $sql = $db->prepare("SELECT * FROM user WHERE username = :username");
        $sql->execute(array(':username' => $username));
        $users = $sql->fetch();

        if($users){
            $user_secret = decrypt_ams($users['secret_phrase']);
            if($user_secret == $secret_phrase){
                $return_value = 'true';
            }
        }

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    echo $return_value;
?>