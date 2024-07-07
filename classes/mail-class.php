<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class email extends Connection
{
    public function emailsend($subject,$body)
    {
    //Include required PHPMailer files
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';
        require 'phpmailer/Exception.php';
    //Define name spaces
        
    //Create instance of PHPMailer
        $mail = new PHPMailer();
    //Set mailer to use smtp
        $mail->isSMTP();
    //Define smtp host
        $mail->Host = "smtp.gmail.com";
    //Enable smtp authentication
        $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
        $mail->SMTPSecure = "tls";
        $smtp_debug = true;
    //Port to connect smtp
        $mail->Port = "587";
    //Set gmail username
        $mail->Username = "mujahid.xiteb@gmail.com";
    //Set gmail password
        $mail->Password = 'iuxtfswwahqfparn';
    //Email subject
    $mail->Subject =$subject;

    //Set sender email
        $mail->setFrom('mujahid.xiteb2@gmail.com', 'Xiteb Medicals');
    //Enable HTML
        $mail->isHTML(true);
    //Email body

        $mail->Body   .= "";
        $mail->Body   .= $body;
    //Add recipient\

    $mail->addCC('mujahidmjhd2001@gmail.com');
    //Finally send email
        if ( $mail->send() ) {
            echo "Email Sent..!";
            $_SESSION['mail']= 1;
        }else{
            echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
            $_SESSION['mail']= 2;
        }
    //Closing smtp connection
        $mail->smtpClose();
    }
}
?>