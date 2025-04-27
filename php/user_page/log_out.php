<?php
    include ("../connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE user_table SET user_online ='0' WHERE user_id='$user_id'";
    $change_user_status_to_offline = mysqli_query($connection, $sql);


    if($change_user_status_to_offline == true){
        unset($_SESSION['user_id']);
        header("Location: ../../html/index.php");
    }
?>