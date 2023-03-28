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
        $first_name = $obj['first_name'];
        $middle_name = $obj['middle_name'];
        
        if($users){
            $return_value = 'false';
        }
        else {
            // INSERT RECORD
            $sql = $db->prepare("INSERT INTO user (first_name, middle_name, role, status) VALUES (:first_name, :middle_name, :role, :status)");
            //bind
            $sql->bindParam(':first_name', $first_name);
            $sql->bindParam(':middle_name', $middle_name);

            $return_value = 'true';
            ($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';
        }
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }
    $database->close();
    echo $return_value;
?>