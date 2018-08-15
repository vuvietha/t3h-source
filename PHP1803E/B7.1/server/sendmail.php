<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function sendMailPHPMailer($email, $subject, $content) {
    // khoi tao doi tuong cho thu vien
    $mail = new PHPMailer(true);
    try {
        // cho phep hien thi loi khi khong send mail dc
        $mail->SMTPDebug = 2; // khi test nhan dc email bo dong nay di nhe
        $mail->isSMTP(); // su dung STMP cua gmail
        $mail->Host = 'smtp.googlemail.com';

        // kiem tra quyen bao mat
        $mail->SMTPAuth = true;
        $mail->Username = 'trieuntgvt3h@gmail.com';
        $mail->Password = 'trieunt123';
        $mail->SMTPSecure = 'tls'; // tsl or ssl
        $mail->Port = 587;

        // cau hinh ai gui den - nguoi gui
        $mail->setFrom('trieuntgvt3h@gmail.com', 'Demo-Mailer');
        // send mail cho ai - nguoi nhan
        $mail->addAddress($email);
        $mail->addCC('nguyenthanhtrieu90@gmail.com');
        $mail->addBCC('thanhtrieut3h@gmail.com');

        // dinh kem file
        $mail->addAttachment('images/a2.jpg');

        // send noi dung buc thu
        $mail->isHTML(true); // cho phep gui email duoi dinh dang file html
        // tieu de cua email
        $mail->Subject = $subject;
        // noi dung
        $mail->Body = $content;

        if($mail->send())
        {
            return true;
        }
        return false;

    } catch(Exception $e) {
        print_r($mail->ErrorInfo);
        die;
    }
}


if(isset($_POST['btnSendmail'])){
    $email = $_POST['txtEmail'] ?? '';
    $email = strip_tags($email);

    $subject = $_POST['txtSubject'] ?? '';
    $subject = strip_tags($subject);

    $content = $_POST['txtContent'] ?? '';
    // khong can dung strip_tags - de send mail HTML
    if($email === '' OR $subject === '' OR $content ===''){
        header("Location:../email.php?state=fail");
    }else {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // xu ly send mail
            if(sendMailPHPMailer($email, $subject, $content)){
                header("Location:../email.php?state=success");
            } else {
                header("Location:../email.php?state=bad");
            }
        } else {
            header("Location:../email.php?state=err");
        }
    }
}

function sendmail($email, $subject, $content){

    $header = "From:trieuntgvt3h@gmail.com \r\n";
    $header = "Cc:trieunguyenthanh@admicro.vn \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    if(mail($email, $subject, $content, $header)){
        return TRUE;
    }
    return FALSE;
}
?>