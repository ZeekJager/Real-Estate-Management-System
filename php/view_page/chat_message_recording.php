<?php
    include ("../connection.php");
    session_start();

    if(isset($_SESSION['user_id'])){
        $from_user_id = $_SESSION['user_id'];
    }

    if(isset($_GET['to_user_id'])){
        $to_user_id = $_GET['to_user_id'];
    }


    if(isset($_POST['send'])){
        $message = $_POST['message'];

        $sql_1 = "INSERT INTO chat_table (from_user_id, message, to_user_id) VALUE ('$from_user_id', '$message', '$to_user_id')";
        $insert_message = mysqli_query($connection, $sql_1);

        if($insert_message == true){
                header("Location: ../../html/view_page/chat_page.php?to_user_id= $to_user_id");
        }
    }
?>