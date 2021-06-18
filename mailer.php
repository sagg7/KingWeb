<?php
    /**
     * PHPMailer multiple files upload and send
     */

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';
    require './PHPMailer/Exception.php';

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'luispandomixen@gmail.com';                     //SMTP username
    $mail->Password   = 'fK)ZK}.^A=14K^YRV3vt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;    

    if(isset($_POST['nombre'])) {
        $name = strip_tags(trim($_POST["nombre"]));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["correo"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["mensaje"]);

        try {
            //Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('luis.pando@mixen.mx');     //Add a recipient
            // $mail->addAddress('');     //Add extra recipient
            $mail->addReplyTo($email, 'I need more information');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'New message from ' . $name;
            $mail->Body    = 'Name: ' . $name . '<br>Email: ' . $email . '<br><br>Message:<br>' . $message . '<br><br>This message was sent through one of the contact forms on King Logistic Oil\'s website.';

            $mail->send();
            echo 'Thank you for contacting us! We\'ll get in touch with you as soon as we can.';
        } catch (Exception $e) {
            echo 'We\'re sorry, something went wrong. Please try again. Mailer Error: {$mail->ErrorInfo}';
        }
    }
?>