<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


//Create an instance; passing `true` enables exceptions

try {
    if (!isset($_SESSION['link']) || !isset($_SESSION['email'])) {
        return;
    }
    $link = $_SESSION['link'];
    $email = $_SESSION['email'];
    $user = $_SESSION['user'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shanmol6740@gmail.com';
    $mail->Password   = 'zwxvvjwcpvdgossb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('shanmol6740@gmail.com', "E-Commerce");
    $mail->addAddress($email, $user);
    // $mail->addAddress('ellen@example.com');              
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');        
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Verify your account';
    $mail->Body    = '  
    <body style="padding: 0 15%;">
    <div style="padding: 30px 0;">
        <img style="max-width: 100px; margin: auto; display: block;" src="https://assets.bootstrapemail.com/logos/light/square.png" />
        <div style="text-align: center;">
            <h1>Thank you! For signing up in our Page</h1>
            <p>
                We are happy to have you in our page. We are looking forward to provide you the best service. <br>
                Click the link below to verify your email and complete the registration process.
            </p>
            <a style="padding: 10px 20px; background-color: rgba(0, 0, 0, 0.735); border-radius: 15px; text-decoration: none; color: white;" href="' . $link . '">Click here</a></a>
        </div>
    </div>
</body>
    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
