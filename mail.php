<?php
session_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['sys']) && $_POST['sys'] == 1) {


    /* Exception class. */
    require 'PHPMailer/src/Exception.php';
    /* The main PHPMailer class. */
    require 'PHPMailer/src/PHPMailer.php';
    /* SMTP class, needed if you want to use SMTP. */
    require 'PHPMailer/src/SMTP.php';

    // if (is_null($_SESSION["user"])) {
    //     header('Location: login.html');
    // }

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Enable verbose debug output
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'microdndtech@gmail.com';                     // SMTP username
        $mail->Password   = 'cremzidoroxqugvi';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to
        $mail->CharSet = 'UTF-8';


        //Recipients
        $mail->setFrom('admin@microdnd.com', 'System');
        $mail->addAddress('may@microdnd.com', 'May');     // Add a recipient
        $mail->addCC('mico@microdnd.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '[系統]-' . ucfirst(explode("@", $_SESSION['user'])[0]) . '端午節獎金已打開通知';
        $mail->Body    = 'Hi! May，<b>' . ucfirst(explode("@", $_SESSION['user'])[0]) . '</b>已抽到禮金，再煩請寄送卡片通知！';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('Location: login.html');
}
