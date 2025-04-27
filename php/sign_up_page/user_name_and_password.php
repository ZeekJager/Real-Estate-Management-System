<?php
    include ("../connection.php");
    session_start();
    

    if(isset($_POST['next_2'])){
        $user_name = $_POST['user_name'];

        $sql = "SELECT * FROM user_table WHERE user_name = '$user_name'";
        $user_table = mysqli_query($connection, $sql);

        if(mysqli_num_rows($user_table) > 0){
            header("Location: ../../html/sign_up_page/user_name_and_password.php?user_name_already_exists");
        }
        else{
            if(strlen($_POST['user_password']) < 8){
                header("Location: ../../html/sign_up_page/user_name_and_password.php?password_length_too_short");
            }
            else{
                $_SESSION['user_name'] = $_POST['user_name'];
                $_SESSION['user_password'] = $_POST['user_password'];
        
                header("Location: ../../html/sign_up_page/user_email_and_phone.php");
            }
        }
    }
?>