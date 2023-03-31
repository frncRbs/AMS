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
        $crop_id = $obj['crop_id'];

        $sql = $db->prepare("SELECT crop_name FROM crops WHERE crop_id = :crop_id");
        $sql->execute(array(':crop_id' => $crop_id));
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
        echo $records['crop_name'];
    }
    else {
        echo false;
    }
?>