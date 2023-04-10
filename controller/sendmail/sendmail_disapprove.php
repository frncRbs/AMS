<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $database = new Connection();
    $db = $database->open();

    require ('../../plugins/PHPMailer/src/Exception.php');
    require ('../../plugins/PHPMailer/src/PHPMailer.php');
    require ('../../plugins/PHPMailer/src/SMTP.php');

    // Receive data from axios post
    $obj = json_decode(file_get_contents('php://input'), TRUE);

    // Retrieve email from database using user id
    $sql = $db->prepare("SELECT first_name, username FROM user WHERE id = :id");
    $sql->execute(array(':id' => $obj['id']));
    $farmer = $sql->fetch();

    $message = $obj['message'];
    $request_email = $farmer['username'];
    $mail_subject= 'Account Registration Declined';
    $mail_message = '<b> Hello '.$farmer['first_name'].',</b> <br/><br/>'.$message.'<br/><br/> Regards, <br/> <b>Ayala District Agriculture Office</b>' ;

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
    $mail->AddEmbeddedImage('../../assets/images/LOGO.png', 'ADAO_image',);
    $mail->Body = '<img src="cid:ADAO_image">'.$mail_message;
    
    $database->close();
    
    if($mail->send()){
        echo 'true';
    }
    else{
        echo 'false';
    };
?>