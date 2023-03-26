<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $user_secret = '';
    $user_id = '';

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
            $user_id = $users['id'];
            if($user_secret == $secret_phrase){
                $return_value = true;
            }
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