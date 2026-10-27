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

    
    $recipients = "tranquangkhanh74qt@gmail.com, tranquangkhanhqt74@gmail.com";
    $email_array = explode(",", $recipients);

    foreach ($email_array as $email) {
        $email = trim($email);
        if (!empty($email)) {
            $mail->addAddress($email, "Khách hàng");
        }
    }

    $mail->isHTML(true);
    $mail->Subject = 'Gửi thư thử nghiệm cho nhiều người';
    $mail->Body    = "<b>Chào các bạn!</b><br>Đây là thư gửi tự động cho nhiều địa chỉ.";

    $mail->smtpConnect(array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    ));

    $mail->send();
    echo 'Đã gửi mail tới tất cả địa chỉ thành công!';
} catch (Exception $e) {
    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}
?>