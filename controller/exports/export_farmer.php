<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    require '../../plugins/Spreadsheet/vendor/autoload.php';

    $database = new Connection();
    $db = $database->open();
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $role = 'Farmer';

    $sql = $db->prepare("SELECT * FROM user WHERE role = :role ORDER BY id ASC");
    $sql->execute(array(':role' => $role));
    $farmers = $sql->fetchAll();
    
    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->mergeCells('A1:W1');
    $activeWorksheet->setCellValue('A2', 'FARMER DETAILS');
    $activeWorksheet->setCellValue('A3', 'Date Exported: '.date('F d, Y'));

    $activeWorksheet->setCellValue('A5','Commodity');
    $activeWorksheet->setCellValue('B5','First Name');
    $activeWorksheet->setCellValue('C5','Middle Name');
    $activeWorksheet->setCellValue('D5','Last Name');
    $activeWorksheet->setCellValue('E5','BirthDate');
    $activeWorksheet->setCellValue('F5','Civil Status');
    $activeWorksheet->setCellValue('G5','Sex');
    $activeWorksheet->setCellValue('H5','Contact Number');
    $activeWorksheet->setCellValue('I5','Religion');
    $activeWorksheet->setCellValue('J5','Birth Place');
    $activeWorksheet->setCellValue('K5','Street');
    $activeWorksheet->setCellValue('L5','Barangay');
    $activeWorksheet->setCellValue('M5','Municipality');
    $activeWorksheet->setCellValue('N5','Zip');
    $activeWorksheet->setCellValue('O5','Guardian Full Name');
    $activeWorksheet->setCellValue('P5','Guardian Contact');
    $activeWorksheet->setCellValue('Q5','Farm Type');
    $activeWorksheet->setCellValue('R5','Farm Barangay');
    $activeWorksheet->setCellValue('S5','Farm Municipality');
    $activeWorksheet->setCellValue('T5','Farm Area');
    $activeWorksheet->setCellValue('U5','Email');
    $activeWorksheet->setCellValue('V5','Role');
    $activeWorksheet->setCellValue('W5','Status');

    // Fetch records from database
    $letter = 'A';
    $start_index = 6; 
    foreach ($farmers as $key => $value) { 
        $activeWorksheet->setCellValue('A'.$start_index, $value['role_service']  == 1 ? 'High Value Crops' : ($value['role_service'] == 2 ? 'Corn Value Crop' : 'Rice Crop'));
        $activeWorksheet->setCellValue('B'.$start_index, $value['first_name']);
        $activeWorksheet->setCellValue('C'.$start_index, $value['middle_name']);
        $activeWorksheet->setCellValue('D'.$start_index, $value['last_name']);
        $activeWorksheet->setCellValue('E'.$start_index, date('F j, Y', strtotime($value['birth_date'])));
        $activeWorksheet->setCellValue('F'.$start_index, $value['civil_status'] == 1 ? 'Married' : ($value['civil_status'] == 2 ? 'Single' : 'Widowed'));
        $activeWorksheet->setCellValue('G'.$start_index, $value['sex'] == 1 ? 'Male' : 'Female');
        $activeWorksheet->setCellValue('H'.$start_index, $value['contact_no']);
        $activeWorksheet->setCellValue('I'.$start_index, $value['religion']);
        $activeWorksheet->setCellValue('J'.$start_index, $value['birth_place']);
        $activeWorksheet->setCellValue('K'.$start_index, $value['address_street']);
        $activeWorksheet->setCellValue('L'.$start_index, $value['address_barangay']);
        $activeWorksheet->setCellValue('M'.$start_index, $value['address_municipality']);
        $activeWorksheet->setCellValue('N'.$start_index, $value['address_zip']);
        $activeWorksheet->setCellValue('O'.$start_index, $value['guardian_fname']);
        $activeWorksheet->setCellValue('P'.$start_index, $value['guardian_contact']);
        $activeWorksheet->setCellValue('Q'.$start_index, $value['farm_type']  == 1 ? 'High Value Crops' : ($value['role_service'] == 2 ? 'Corn Value Crop' : 'Rice Crop'));
        $activeWorksheet->setCellValue('R'.$start_index, $value['farm_barangay']);
        $activeWorksheet->setCellValue('S'.$start_index, $value['farm_municipality']);
        $activeWorksheet->setCellValue('T'.$start_index, $value['farm_area']);
        $activeWorksheet->setCellValue('U'.$start_index, $value['username']);
        $activeWorksheet->setCellValue('V'.$start_index, $value['role']);
        $activeWorksheet->setCellValue('W'.$start_index, $value['status'] == 1 ? 'Active' : 'Inactive' );
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