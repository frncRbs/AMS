<?php 
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    $database = new Connection();
    $db = $database->open();
    $return_value_crops = [];
    $return_value_services = [];

    try{
        $sql = $db->prepare("SELECT * FROM crops");
        $sql->execute();
        $crops = $sql->fetchAll();
        $return_value_crops = $crops;

        $sql_services = $db->prepare("SELECT * FROM services");
        $sql_services->execute();
        $services = $sql_services->fetchAll();
        $return_value_services = $services;
    }
    catch(PDOException $e) {
        $return_value = $e->getMessage();
        echo $return_value;
    }
    $database->close();

    $data = array(
        'crops' => $return_value_crops,
        'services' => $return_value_services,
    );
    echo json_encode($data);


?>