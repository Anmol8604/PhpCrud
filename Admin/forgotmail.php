<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

try {
    if (!isset($_SESSION['link'])) {
        return;
    }

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shanmol6740@gmail.com';
    $mail->Password   = 'zwxvvjwcpvdgossb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('shanmol6740@gmail.com', 'E-Commerce');
    $mail->addAddress($_SESSION['email']);
    // $mail->addAddress('ellen@example.com');              
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');        
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Password Reset Link';
    $mail->Body    = '
    <body style="padding: 0 15%;">
    <div style="padding: 30px 0; max-width: 600px; margin: auto">
        <img style="max-width: 100px; margin: auto; display: block;" src="https://assets.bootstrapemail.com/logos/light/square.png" />
        <div style="text-align: center;">
            <h1>Password Reset</h1>
            <p>
                We received a request to reset your password. Click the button below to set a new password. If you did not make this request, please ignore this email.
            </p>
            <div style="margin: 30px 0;">
                <a style="padding: 10px 20px; background-color: rgba(0, 0, 0, 0.735); color: #fff; text-decoration: none; padding: 15px 30px; border-radius: 4px; font-size: 16px;" href="' . $link . '">Reset Password</a></a>
            </div>
            <p style="font-size: 14px; color: #888; text-align: center;">
                If the button doesn\'t work, copy and paste the following link in your web browser: <br>
                <a href="' . $link . '" style="color: #3498db;"> ' . $link . ' </a>
            </p>
        </div>
    </div>
</body>
    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
