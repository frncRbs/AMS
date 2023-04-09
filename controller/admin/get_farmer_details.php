<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $records = [];
    $flag = false;

    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $user_id = $obj['user_id'];

        $sql = $db->prepare("SELECT * FROM requests_registry WHERE user_id = :user_id ORDER BY date_requested DESC");
        $sql->execute(array(':user_id' => $user_id));
        $records = $sql->fetchAll();

        if($records){
            $flag = true;
        }

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    
    if($flag){
        echo json_encode($records);
    }
    else {
        echo 'false';
    }
?>