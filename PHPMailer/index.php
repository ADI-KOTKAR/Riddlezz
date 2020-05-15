<?php

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    function mailUser($email,$otp){
            
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
        //Port to connect smtp
            $mail->Port = "587";
        //Set gmail username
            $mail->Username = "developer.adi.kotkar@gmail.com";
        //Set gmail password
            $mail->Password = "sxkmrqplsickjcjx";
        //Email subject
            $mail->Subject = "OTP for Riddlezz";
        //Set sender email
            $mail->setFrom('developer.adi.kotkar@gmail.com');
        //Enable HTML
            $mail->isHTML(true);
        //Email body
            $mail->Body = "<h1>Welcome to Riddlezz.</h1></br><p>Requested OTP: ".$otp."</p></br><p>Have fun solving Riddles!</p>";
        //Add recipient
            $mail->addAddress($email);
        //Finally send email
            if ( $mail->send() ) {
                echo "Email Sent..!";
            }else{
                echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
            }
        //Closing smtp connection
            $mail->smtpClose();
    
    }
