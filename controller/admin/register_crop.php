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
        $crop_type = null;
        $crop_name = $obj['crop_name'];
        $crop_description = null;
        $is_available = true;

        $sql = $db->prepare("SELECT * FROM crops WHERE crop_name = :crop_name");
        $sql->execute(array(':crop_name' => $crop_name));
        $users = $sql->fetchAll();
        
        if($users){
            $return_value = 'false';
        }
        else {
            // INSERT RECORD
            $sql = $db->prepare("INSERT INTO crops (crop_type, crop_name, crop_description, is_available) VALUES (:crop_type, :crop_name, :crop_description, :is_available)");
            //bind
            $sql->bindParam(':crop_type', $crop_type);
            $sql->bindParam(':crop_name', $crop_name);
            $sql->bindParam(':crop_description', $crop_description);
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