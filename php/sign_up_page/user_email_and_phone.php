<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    require 'vendor/autoload.php';

    include ("../connection.php");
    session_start();
    

    if(isset($_POST['next_3'])){
        $user_email = $_POST['user_email'];
        $user_phone = $_POST['user_phone'];

        $sql = "SELECT * FROM user_table WHERE user_email = '$user_email'";
        $email_table = mysqli_query($connection, $sql);

        $sql_2 = "SELECT * FROM user_table WHERE user_phone = '$user_phone'";
        $phone_table = mysqli_query($connection, $sql_2);

        if(mysqli_num_rows($email_table) > 0){
            header("Location: ../../html/sign_up_page/user_email_and_phone.php?email_already_exists");
        }
        else if(mysqli_num_rows($phone_table) > 0){
            header("Location: ../../html/sign_up_page/user_email_and_phone.php?phone_already_exists");
        }
        else{
            $_SESSION['user_email'] = $_POST['user_email'];
            $_SESSION['user_phone'] = $_POST['user_phone'];


            /*----------------------------***Email_verification_sending***------------------------------*/
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();                                                //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through xcwr olog vqaz jiow
                $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
                $mail->Username   = 'ethiohomes5@gmail.com';                    //SMTP username
                $mail->Password   = 'xcwrologvqazjiow';                         //SMTP password
                $mail->SMTPSecure = 'tls';                                      //Enable implicit TLS encryption
                $mail->Port       = 587;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('ethiohomes5@gmail.com', 'EthioHomes');
                $mail->addAddress($user_email);                                 //Add a recipient
            
                //Content
                $verification_code_1 = mt_rand(100000, 999999);
                $_SESSION['email_verification_code'] = $verification_code_1;
                $mail->isHTML(true);                                            //Set email format to HTML
                $mail->Subject = 'Email Verification';
                $mail->Body    = '<p>Your verification code is:- <b style="font-size: 30px;">'.$verification_code_1.'</b></p>';
            
                $mail->send();
            } catch (Exception $e) {
                header("Location: ../../html/sign_up_page/user_email_and_phone.php?email_verification_code_sending_failed");
            }




            /*----------------------------***Phone_verification_sending***------------------------------*/
            try{
                $username = "ethiohomes5@gmail.com";
                $hash = "d63cc96282609b29535c3225fcff710d759f1131ea688499e2324d6defce548f";
                $test = "0";
                $user_full_name = $_SESSION['first_name']." ".$_SESSION['last_name'];
                // $verification_code = mt_rand(100000, 999999);
                $verification_code = 123456;
                $_SESSION['sms_verification_code'] = $verification_code;
                $sender = "EthioHomes";
                $numbers = $_POST['user_phone'];
                $message = "Hi there, ".$user_full_name." your verification code is:- ".$verification_code;
                $message = urlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('https://api.txtlocal.com/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
            }
            catch(Exception $e){
                // header("Location: ../../html/sign_up_page/user_email_and_phone.php?phone_verification_code_sending_failed");
            }
            

            header("Location: ../../html/sign_up_page/verify_email_and_phone.php");
        }
    }
?>