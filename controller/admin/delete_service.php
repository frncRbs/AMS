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

        // Delete record
        $sql_d = $db->prepare("DELETE FROM services WHERE service_id = :service_id");
        $return_value = ($sql_d->execute(array(':service_id' => $service_id))) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';

        // Retrieve updated record
        $sql = $db->prepare("SELECT * FROM services");
        $sql->execute();
        $records = $sql->fetchAll();

    } catch (PDOException $e) {
        $return_value = 'Data cannot be deleted!';
    }
    $database->close();
    
    // FOR DEBUGGING RESPONSE
    $return_dict = [
        'status' => $return_value,
        'services' => $records,
    ];

    echo json_encode($return_dict);
?>