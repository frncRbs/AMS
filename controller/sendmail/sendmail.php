<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // $database = new Connection();
    // $db = $database->open();

    require ('../../plugins/PHPMailer/src/Exception.php');
    require ('../../plugins/PHPMailer/src/PHPMailer.php');
    require ('../../plugins/PHPMailer/src/SMTP.php');

    // Receive data from axios post
    $obj = json_decode(file_get_contents('php://input'), TRUE);
    $request_email = $obj['email'];
    $mail_subject= $obj['subject'];
    $mail_message = $obj['message'];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'frncrebollos@gmail.com';
    $mail->Password = 'bbvzlrmmueqeopzj';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('frncrebollos@gmail.com');

    $mail->addAddress($request_email);
    $mail->isHTML(true);

    $mail->Subject = $mail_subject;
    $mail->Body = $mail_message;
    $mail->send();

    echo true;
?>