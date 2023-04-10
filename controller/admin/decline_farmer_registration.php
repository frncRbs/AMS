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
        $id = $obj['id'];
        $status = 2;


        // Delete record
        $sql_d = $db->prepare("UPDATE user SET status = :status WHERE id = :id");
        $return_value = ($sql_d->execute(array(':status' => $status, ':id' => $id))) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';

        // Retrieve updated record
        $sql = $db->prepare("SELECT * FROM user WHERE id = :id ORDER BY date_registered DESC");
        $sql->execute(array(':id' => $id));
        $records = $sql->fetchAll();

    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }
    $database->close();

    // Pwede tu ki mn append el sms code after el delete query nuay pa iyo mn add table para donde mn insert el message etu ylng ase
    

    $return_dict = [
        'status' => $return_value,
        'farmer_update' => $records,
    ];

    echo json_encode($return_dict);
?>