<?php
    include ("../connection.php");
    session_start();


    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $user_name = $_SESSION['user_name'];
    $user_password = $_SESSION['user_password'];
    $user_email = $_SESSION['user_email'];
    $user_phone = $_SESSION['user_phone'];
    $user_location = $_SESSION['long_and_lat']." , ".$_SESSION['city']." , ".$_SESSION['location'];
    $user_national_id = $_SESSION['user_national_id'];
    
    if(isset($_SESSION['user_chapa_api_key'])){
        $user_chapa_api_key = $_SESSION['user_chapa_api_key'];

        $sql = "INSERT INTO user_table (first_name, last_name, user_name, user_email, user_password, user_phone, user_address, user_national_id, user_chapa_api_key, date) VALUES ('$first_name', '$last_name', '$user_name', '$user_email', '$user_password', '$user_phone', '$user_location', '$user_national_id', '$user_chapa_api_key', current_date())";
        $insert_user_into_table = mysqli_query($connection, $sql);

        if($insert_user_into_table == true){
            header("Location: ../../html/sign_up_page/sign_up_successfull.php");
        }
    }
    else{
        $sql = "INSERT INTO user_table (first_name, last_name, user_name, user_email, user_password, user_phone, user_address, user_national_id, date) VALUES ('$first_name', '$last_name', '$user_name', '$user_email', '$user_password', '$user_phone', '$user_location', '$user_national_id', current_date())";
        $insert_user_into_table =  mysqli_query($connection, $sql);
        
        if($insert_user_into_table == true){
            header("Location: ../../html/sign_up_page/sign_up_successfull.php");
        }
    }
?>