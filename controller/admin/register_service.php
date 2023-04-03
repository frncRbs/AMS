<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $is_duplicate = false;
    // $test = 'Working';
    // require_once('../../settings/custom_sql.php');
    
    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $service_type = null;
        $service_name = $obj['service_name'];
        $is_available = true;

        $sql = $db->prepare("SELECT * FROM services WHERE service_name = :service_name");
        $sql->execute(array(':service_name' => $service_name));
        $users = $sql->fetchAll();
        
        if($users){
            $return_value = 'false';
        }
        else {
            // INSERT RECORD
            $sql = $db->prepare("INSERT INTO services (service_type, service_name, is_available) VALUES (:service_type, :service_name, :is_available)");
            //bind
            $sql->bindParam(':service_type', $service_type);
            $sql->bindParam(':service_name', $service_name);
            $sql->bindParam(':is_available', $is_available);

            ($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';
        }
        // echo $return_value = $test;
        
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }
    $database->close();
    echo $return_value;
?>