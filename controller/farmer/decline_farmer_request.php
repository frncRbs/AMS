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
        $is_cancelled = true;
        $user_id = $_SESSION["login_user_id"];
        $request_id = $obj['request_id'];

        $sql_u = $db->prepare("UPDATE requests_registry SET is_cancelled = :is_cancelled WHERE request_id = :request_id");

        //bind
        $sql_u->bindParam(':is_cancelled', $is_cancelled);
        $sql_u->bindParam(':request_id', $request_id);
        $return_value = ($sql_u->execute()) ? 'true' : 'false';

        // Retrieve updated record
        $sql_all = $db->prepare("SELECT * FROM requests_registry WHERE user_id = :user_id");
        $sql_all->execute(array(':user_id'=> $user_id));
        $records = $sql_all->fetchAll();
        
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
    }
    $database->close();

    $return_dict = [
        'status' => $return_value,
        'request_update' => $records,
    ];
    echo json_encode($return_dict);
?>