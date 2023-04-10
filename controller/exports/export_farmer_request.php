<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    require '../../plugins/Spreadsheet/vendor/autoload.php';

    $database = new Connection();
    $db = $database->open();
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $request_value = '';

    // $obj = json_decode(file_get_contents('php://input'), TRUE);
    $user_id = $_GET['key_id'];

    $sql = $db->prepare("SELECT * FROM requests_registry WHERE user_id = :user_id ORDER by date_requested DESC");
    $sql->execute(array(':user_id' => $user_id));
    $request_registry = $sql->fetchAll();
    
    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->mergeCells('A1:W1');
    $activeWorksheet->setCellValue('A2', 'FARMER REQUEST DETAILS');
    $activeWorksheet->setCellValue('A3', 'Date Exported: '.date('F d, Y'));

    $activeWorksheet->setCellValue('A5','Status');
    $activeWorksheet->setCellValue('B5','Request Type');
    $activeWorksheet->setCellValue('C5','Service Remarks');
    $activeWorksheet->setCellValue('D5','Crops Kilo');
    $activeWorksheet->setCellValue('E5','Date Requested');
    

    // Fetch records from database
    $letter = 'A';
    $start_index = 6; 
    foreach ($request_registry as $key => $value) { 
        $activeWorksheet->setCellValue('A'.$start_index, $value['status'] == 1 ? 'Service' : 'Crop' );
        $activeWorksheet->setCellValue('B'.$start_index, $value['request_type']);
        $activeWorksheet->setCellValue('C'.$start_index, $value['service_remarks']);
        $activeWorksheet->setCellValue('D'.$start_index, $value['crops_kilo']);
        $activeWorksheet->setCellValue('E'.$start_index, $value['date_requested']);
        $start_index = ($start_index + 1);
    }

    $writer = new Xlsx($spreadsheet);
    ob_end_clean();
    // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Type: application/vnd.ms-excel"); 
    header('Content-Disposition: attachment;filename="filename_' . time() . '.xlsx"');
    // header('Cache-Control: max-age=0');
    exit($writer->save('php://output'));

    // echo $_SERVER['REQUEST_URI'];
    // echo $_GET['key_id'];
    
?>