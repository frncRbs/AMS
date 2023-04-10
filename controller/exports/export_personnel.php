<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    require '../../plugins/Spreadsheet/vendor/autoload.php';

    $database = new Connection();
    $db = $database->open();
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $role1 = 'Admin';
    $role2 = 'Personnel';

    $sql = $db->prepare("SELECT * FROM user WHERE role = :role1 OR role = :role2 ORDER BY id ASC");
    $sql->execute(array(':role1' => $role1, ':role2' => $role2));
    $personnels = $sql->fetchAll();
    
    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->mergeCells('A1:W1');
    $activeWorksheet->setCellValue('A2', 'PERSONNEL DETAILS');
    $activeWorksheet->setCellValue('A3', 'Date Exported: '.date('F d, Y'));

    $activeWorksheet->setCellValue('A5','First Name');
    $activeWorksheet->setCellValue('B5','Middle Name');
    $activeWorksheet->setCellValue('C5','Last Name');
    $activeWorksheet->setCellValue('D5','BirthDate');
    $activeWorksheet->setCellValue('E5','Sex');
    $activeWorksheet->setCellValue('F5','Contact Number');
    $activeWorksheet->setCellValue('G5','Religion');
    $activeWorksheet->setCellValue('H5','Birth Place');
    $activeWorksheet->setCellValue('I5','Street');
    $activeWorksheet->setCellValue('J5','Barangay');
    $activeWorksheet->setCellValue('K5','Municipality');
    $activeWorksheet->setCellValue('L5','Email');
    $activeWorksheet->setCellValue('M5','Role');
    $activeWorksheet->setCellValue('N5','Status');

    // Fetch records from database
    $letter = 'A';
    $start_index = 6; 
    foreach ($personnels as $key => $value) {
        $activeWorksheet->setCellValue('A'.$start_index, $value['first_name']);
        $activeWorksheet->setCellValue('B'.$start_index, $value['middle_name']);
        $activeWorksheet->setCellValue('C'.$start_index, $value['last_name']);
        $activeWorksheet->setCellValue('D'.$start_index, date('F j, Y', strtotime($value['birth_date'])));
        $activeWorksheet->setCellValue('E'.$start_index, $value['sex'] == 1 ? 'Male' : 'Female');
        $activeWorksheet->setCellValue('F'.$start_index, $value['contact_no']);
        $activeWorksheet->setCellValue('G'.$start_index, $value['religion']);
        $activeWorksheet->setCellValue('H'.$start_index, $value['birth_place']);
        $activeWorksheet->setCellValue('I'.$start_index, $value['address_street']);
        $activeWorksheet->setCellValue('J'.$start_index, $value['address_barangay']);
        $activeWorksheet->setCellValue('K'.$start_index, $value['address_municipality']);
        $activeWorksheet->setCellValue('L'.$start_index, $value['username']);
        $activeWorksheet->setCellValue('M'.$start_index, $value['role']);
        $activeWorksheet->setCellValue('N'.$start_index, $value['status'] == 1 ? 'Active' : 'Inactive' );
        $start_index = ($start_index + 1);
    }

    // foreach (range('A', 'D') as $letter) {
    //     $activeWorksheet->setCellValue($letter . '5', 'Column ' . $letter);
    // }

    $writer = new Xlsx($spreadsheet);
    ob_end_clean();
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="filename_' . time() . '.xlsx"');
    header('Cache-Control: max-age=0');
    exit($writer->save('php://output'));
    
?>