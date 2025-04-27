<?php
    include ("../connection.php");
    session_start();
    

    if(isset($_POST['next_5'])){
        if(isset($_POST['user_chapa_api_key'])){
            $user_national_id = $_POST['user_national_id'];
            $user_chapa_api_key = $_POST['user_chapa_api_key'];

            $sql = "SELECT * FROM user_table WHERE user_national_id = '$user_national_id'";
            $user_table = mysqli_query($connection, $sql);

            if(mysqli_num_rows($user_table) > 0){
                header("Location: ../../html/sign_up_page/user_national_id_and_chapa_key.php?user_national_id_already_exists");
            }
            else{
                $_SESSION['user_national_id'] = $_POST['user_national_id'];
                $_SESSION['user_chapa_api_key'] = $_POST['user_chapa_api_key'];
        
                header("Location: ../../html/sign_up_page/qr_code_scanner_page.php");
            }
        }
        else{
            $user_national_id = $_POST['user_national_id'];

            $sql = "SELECT * FROM user_table WHERE user_national_id = '$user_national_id'";
            $user_table = mysqli_query($connection, $sql);

            if(mysqli_num_rows($user_table) > 0){
                header("Location: ../../html/sign_up_page/user_national_id_and_chapa_key.php?user_national_id_already_exists");
            }
            else{
                $_SESSION['user_national_id'] = $_POST['user_national_id'];
                
                header("Location: ../../html/sign_up_page/qr_code_scanner_page.php");
            }
        }
    }
?>