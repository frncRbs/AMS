<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $records = [];
    $flag = '';

    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $service_id = $obj['service_id'];
        $crop_id = $obj['crop_id'];

        if($service_id){
            $sql = $db->prepare("SELECT service_name FROM services WHERE service_id = :service_id");
            $sql->execute(array(':service_id' => $service_id));
            $records = $sql->fetch();
            $flag = 'Service';
        }
        else {
            $sql = $db->prepare("SELECT crop_name FROM crops WHERE crop_id = :crop_id");
            $sql->execute(array(':crop_id' => $crop_id));
            $records = $sql->fetch();
            $flag = 'Crop';
        }

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    
    if($flag == 'Service'){
        echo $records['service_name'];
    }
    else if($flag == 'Crop'){
        echo $records['crop_name'];
    }
    else {
        echo false;
    }
?>