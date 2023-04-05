<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value = 'false';
    $is_duplicate = false;
    // $test = 'Working';
    // require_once('../../settings/custom_sql.php');
    
    try {
        // Receive data from axios post
        $obj = json_decode(file_get_contents('php://input'), TRUE);
        
        $content11 = $obj['content11'];
        $content12 = $obj['content12'];
        $content21 = $obj['content21'];
        $content22 = $obj['content22'];
        $content31 = $obj['content31'];
        $content32 = $obj['content32'];
        $id = $obj['id'];

        $sql_u = $db->prepare("UPDATE home_content SET content11 = :content11, content12 = :content12, content21 = :content21, content22 = :content22, content31 = :content31, content32 = :content32 WHERE id = :id");
        $sql_u->bindParam(':content11', $content11);
        $sql_u->bindParam(':content12', $content12);
        $sql_u->bindParam(':content21', $content21);
        $sql_u->bindParam(':content22', $content22);
        $sql_u->bindParam(':content31', $content31);
        $sql_u->bindParam(':content32', $content32);
        $sql_u->bindParam(':id', $id);

        $return_value = ($sql_u->execute()) ? 'true' : 'false';

        // INSERT RECORD
        // $sql = $db->prepare("INSERT INTO home_content (content11, content12, content21, content22, content31, content32) VALUES (:content11, :content12, :content21, :content22, :content31, :content32)");
        //bind
        // $sql->bindParam(':content11', $content11);
        // $sql->bindParam(':content12', $content12);
        // $sql->bindParam(':content21', $content21);
        // $sql->bindParam(':content22', $content22);
        // $sql->bindParam(':content31', $content31);
        // $sql->bindParam(':content32', $content32);

        // $return_value = ($sql->execute(array(':id'=> $id,':content11' => $content11, ':content12' => $content12, ':content21' => $content21, ':content22' => $content22, ':content31' => $content31, ':content32' => $content32))) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';
        // ($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';

        // echo $return_value = $test;

        // Retrieve updated record
        $sql = $db->prepare("SELECT * FROM home_content");
        $sql->execute();
        $records = $sql->fetchAll();
        
    } catch (PDOException $e) {
        $return_value = $e->getMessage();
    }
    $database->close();

    $return_dict = [
        'status' => $return_value,
        'title' => $records,
    ];

    echo json_encode($return_dict);
?>