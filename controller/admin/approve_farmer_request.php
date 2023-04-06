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
        $request_status = $obj['request_status'];
        $user_id = $obj['user_id'];

        // UPDATE RECORD
        $sql_u = $db->prepare("UPDATE requests_registry SET request_status = :request_status WHERE request_id = :request_id");
        $return_value = ($sql_u->execute( array(':request_status' => $request_status, ':request_id' => $request_id) )) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';

        // Retrieve updated record
        $sql = $db->prepare("SELECT * FROM requests_registry WHERE user_id = :user_id");
        $sql->execute(array(':user_id' => $user_id));
        $records = $sql->fetchAll();

    } catch (PDOException $e) {
        $return_value = 'Data cannot be deleted!';
    }
    $database->close();
    
    // FOR DEBUGGING RESPONSE
    $return_dict = [
        'status' => $return_value,
        'requests_registry' => $records,
    ];

    echo json_encode($return_dict);
?>