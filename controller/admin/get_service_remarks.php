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
        $service_id = $obj['service_id'];
        $crop_id = $obj['crop_id'];

        if($service_id){
            $sql = $db->prepare("SELECT service_remarks FROM requests_registry WHERE request_id = :service_id");
            $sql->execute(array(':request_id' => $service_id));
            $records = $sql->fetch();
            $flag = 'Service';
        }
        else {
            $sql = $db->prepare("SELECT crops_kilo FROM requests_registry WHERE request_id = :crop_id");
            $sql->execute(array(':request_id' => $crop_id));
            $records = $sql->fetch();
            $flag = 'Crop';
        }

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    
    if($flag == 'Service'){
        echo $records['service_remarks'];
    }
    else if($flag == 'Crop'){
        echo $records['crops_kilo'];
    }
    else {
        echo false;
    }
?>
