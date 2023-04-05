<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();

    $uploadDir = '../../assets/uploads/';
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $filePath1 = $uploadDir . $image1;
    $filePath2 = $uploadDir . $image2;
    $filePath3 = $uploadDir . $image3;

    $id = 7;

    move_uploaded_file($_FILES['image1']['tmp_name'], $filePath1);
    move_uploaded_file($_FILES['image2']['tmp_name'], $filePath2);
    move_uploaded_file($_FILES['image3']['tmp_name'], $filePath3);

    $sql_u = $db->prepare("UPDATE home_imgs SET image1 = :image1, image2 = :image2, image3 = :image3  WHERE id = :id");
    $return_value = ($sql_u->execute(array(':image1' => $image1, ':image2' => $image2, ':image3' => $image3, ':id' => $id))) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot saved record.';
?>