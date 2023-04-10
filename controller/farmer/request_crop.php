<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');

    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    // require_once('../../settings/custom_sql.php');
    
    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $crop_id = $obj['crop_id'];
        $service_id = $obj['service_id'];
        $crop_kilo = $obj['crop_kilo'];
        $user_id = $_SESSION["login_user_id"];
        $service_remarks = $obj['service_remarks'];
        $request_type = $obj['request_type'];
        
        // INSERT RECORD
        $sql = $db->prepare("INSERT INTO requests_registry (request_type, crops_kilo, user_id, crop_id, service_id, service_remarks) VALUES (:request_type, :crops_kilo, :user_id, :crop_id, :service_id, :service_remarks)");
        //bind
        $sql->bindParam(':request_type', $request_type);
        $sql->bindParam(':crops_kilo', $crop_kilo);
        $sql->bindParam(':user_id', $user_id);
        $sql->bindParam(':crop_id', $crop_id);
        $sql->bindParam(':service_id', $service_id);
        $sql->bindParam(':service_remarks', $service_remarks);

        $return_value = 'true';
        ($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';

        $sql_all = $db->prepare("SELECT * FROM requests_registry WHERE user_id = :user_id ORDER BY date_requested DESC");
        $sql_all->execute(array(':user_id'=>$user_id));
        $records = $sql_all->fetchAll();

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }
    $database->close();

    $return_dict = [
        'status' => $return_value,
        'request_update' => $records,
    ];
    echo json_encode($return_dict);
?>