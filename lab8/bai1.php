<?php
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    
    $nguoigui = 'khanhtq.25it@vku.udn.vn';
    $matkhau = 'sdti nlah nfzb ifwf';
    $tennguoigui = 'Trần Quang Khánh';
    
    $mail->Username = $nguoigui;
    $mail->Password = $matkhau;
    $mail->SMTPSecure = 'ssl';         
    $mail->Port = 465;                   

    $mail->setFrom($nguoigui, $tennguoigui);
    
    $to = "tranquangkhanh74qt@gmail.com";     
    $to_name = "Người Nhận Mail";
    $mail->addAddress($to, $to_name);

    $mail->isHTML(true);               
    $mail->Subject = 'Gửi thư thử nghiệm từ PHPMailer';
    $mail->Body    = "<b>Chào bạn!</b><br>Chúc bạn một ngày an lành!";

    if (file_exists("4.jpg")) {
        $mail->addAttachment("4.jpg", "picture.jpg");
    }

    $mail->smtpConnect(array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    ));

    $mail->send();
    echo 'Đã gửi mail thành công!';
} catch (Exception $e) {
    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}
?>