<?php
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
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
        
        $to = $_POST['email'];
        $to_name = "Khách hàng";
        $tieude = $_POST['tieude'];
        
        $mail->addAddress($to, $to_name);

        $mail->isHTML(true);
        $mail->Subject = $tieude;
        
        $noidungthu = '
        <div class="card" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
            <div class="card-body">
                <h5 class="card-title"><b>Xin chào ' . htmlspecialchars($to_name) . '</b></h5>
                <hr>
                <div class="card-text">' . $_POST['content'] . '</div>
            </div>
        </div>';
        
        $mail->Body = $noidungthu;

        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $mail->addAttachment($uploadfile, $_FILES['file']['name']);
            }
        }

        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));

        if ($mail->send()) {
            echo "<script>alert('Gửi mail thành công!'); window.location.href='index.php';</script>";
        }
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }
}
?>