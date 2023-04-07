<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $records = [];

    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $program_id = $obj['program_id'];
        $status = $obj['status'];
        $type = $obj['type'];

        $field_name = substr($type, 0, -1).'_id'; // field name in database
        $bind_field_name = ':'.$field_name;       // binding of name sa database

        // Update record

        $sql_u = $db->prepare("UPDATE $type SET is_available = :is_available WHERE ".$field_name." = ".$bind_field_name."");
        $return_value = ($sql_u->execute(array(':is_available' => $status, $bind_field_name => $program_id))) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';

        // Retrieve updated record
        $sql = $db->prepare("SELECT * FROM ".$type." ORDER BY date_created DESC");
        $sql->execute();
        $records = $sql->fetchAll();

    } catch (PDOException $e) {
        $return_value = 'Data cannot be updated!';
    }
    $database->close();
    
    // FOR DEBUGGING RESPONSE
    $return_dict = [
        'status' => $return_value,
        'programs' => $records,
    ];

    echo json_encode($return_dict);
?>