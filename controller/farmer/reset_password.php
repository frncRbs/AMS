<?php 
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = '';

    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        $password = encrypt_ams($obj['confirm_password']);
        $user_id = $obj['user_id'];

        $sql = $db->prepare("UPDATE user SET password = :password WHERE id = :id");
        $sql->bindParam(':password', $password);
        $sql->bindParam(':id', $user_id);

        $return_value = ( $sql->execute()) ? true : false;
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }

    $database->close();
    echo $return_value;
?>