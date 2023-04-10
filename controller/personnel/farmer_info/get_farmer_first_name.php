<?php
    require_once('../../../settings/config.php');
    require_once('../../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $records = [];
    $flag = false;

    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $user_id = $obj['user_id'];

        $sql = $db->prepare("SELECT first_name FROM user WHERE id = :user_id");
        $sql->execute(array(':user_id' => $user_id));
        $records = $sql->fetch();

        if($records){
            $flag = true;
        }

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    
    if($flag){
        echo $records['first_name'];
    }
    else {
        echo false;
    }
?>