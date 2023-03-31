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
        $request_id = $obj['request_id'];
        $user_id = $obj['user_id'];
        $request_type = $obj['request_type'];


        // Delete record
        $sql_d = $db->prepare("DELETE FROM requests_registry WHERE request_id = :request_id");
        $return_value = ($sql_d->execute(array(':request_id' => $request_id))) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';

        // Retrieve updated record
        $sql = $db->prepare("SELECT * FROM requests_registry WHERE user_id = :user_id");
        $sql->execute(array(':user_id' => $user_id, ':request_type' => $request_type));
        $records = $sql->fetchAll();

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }
    $database->close();
    
    $return_dict = [
        'status' => $return_value,
        'requests' => $records,
    ];

    echo json_encode($return_dict);
?>