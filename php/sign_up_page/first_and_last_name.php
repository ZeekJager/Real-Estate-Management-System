<?php
    include ("../connection.php");
    session_start();
    

    if(isset($_POST['next_1'])){
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];

        header("Location: ../../html/sign_up_page/user_name_and_password.php");
    }
?>