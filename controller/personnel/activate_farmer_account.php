<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';
    $is_duplicate = false;
    $records = '';
    // $test = 'Working';
    // require_once('../../settings/custom_sql.php');
    
    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $is_active = true;
        $id = $obj['id'];

        $sql_u = $db->prepare("UPDATE user SET is_active = :is_active WHERE id = :id");
        //bind
        $sql_u->bindParam(':id', $id);
        $sql_u->bindParam(':is_active', $is_active);

        $return_value = ($sql_u->execute()) ? 'true' : 'false';

        // Retrieve updated record
        $sql_all = $db->prepare("SELECT * FROM user WHERE role = 'Farmer'");
        $sql_all->execute();
        $records = $sql_all->fetchAll();
        // echo $return_value = $test;
        // }
        
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
    }
    $database->close();

    $return_dict = [
        'status' => $return_value,
        'farmer_update' => $records,
    ];
    echo json_encode($return_dict);
?>