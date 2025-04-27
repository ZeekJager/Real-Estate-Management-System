<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';

    require '../../vendor/autoload.php';

    
    include ("../connection.php");


    if(isset($_POST['send'])){
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message']; 
        $message_receiver = "ethiohomes5@gmail.com";


        /*----------------------------***Email sending***------------------------------*/
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                                //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through //xcwr olog vqaz jiow
            $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
            $mail->Username   = 'ethiohomes5@gmail.com';                    //SMTP username
            $mail->Password   = 'xcwrologvqazjiow';                         //SMTP password
            $mail->SMTPSecure = 'tls';                                      //Enable implicit TLS encryption
            $mail->Port       = 587;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($email, $user_name);
            $mail->addAddress($message_receiver);                                 //Add a recipient
        
            //Content
            $mail->isHTML(true);                                            //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            
            $mail->send();
            header("Location: ../../html/contact_page.php?message_sent");
        } catch (Exception $e) {
            header("Location: ../../html/contact_page.php?message_not_sent");
        }
    }
?>