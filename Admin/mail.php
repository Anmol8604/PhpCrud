<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    if (!isset($_SESSION['AccDetails'])) {
        return;
    }
    $AccDetails = $_SESSION['AccDetails'];

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
    $mail->addAddress($AccDetails['email'], $AccDetails['fname'] . ' ' . $AccDetails['lname']);
    // $mail->addAddress('ellen@example.com');              
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');        
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Vendor Added Successfully';
    $mail->Body    = '
    <body style="padding: 0 15%;">
    <div style="padding: 30px 0;">
            <img style="max-width: 100px; margin: auto; display: block;" src="https://assets.bootstrapemail.com/logos/light/square.png" />

        <div style="text-align: center;">
            <h1>Congratulations! You have been added as a vendor.</h1>
            <p>You can now login to your account and start selling
                your products.</p>
            <a style="padding: 10px 20px; background-color: aliceblue; border-radius: 15px; text-decoration: none; color: black;" href="https://Project2.test/pvendor/">Log In</a>
            <p style="color: red;">Don\'t forget to update your password after logging in.
            </p>
        </div>
        <div style="background-color: aliceblue; margin: 0 20px; padding: 30px; margin-top: 30px; border-radius: 40px; ">
            <h3 style="text-align: center;">Here are all your details</h3>
            <table>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>: '. $AccDetails['fname'] . " " . $AccDetails['lname'] . '</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: ' . $AccDetails['email'] .'</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>: ' . $AccDetails['pass'] .' </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>: ' . $AccDetails['city'] . ", " . $AccDetails['state'] . ", " . $AccDetails['country'] .' </td>
                    </tr>
                    <tr>
                        <td >Bussiness Name</td>
                        <td>: ' . $AccDetails['Bname'] . '</td>
                    </tr>
                    <tr>
                        <td >Bussiness Type</td>
                        <td>: ' . $AccDetails['Btype'] . '</td>
                    </tr>
                </tbody>
            </table>
            <hr style="margin: 20px 0">
            <p style="text-align: center;">If you have any questions, contact us at <a href="https://Project2.test/pvendor/">admin@project2.com</a>.
            </p>
        </div>
    </div>
</body>
    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
