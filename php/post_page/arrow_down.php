<?php
    include ("../connection.php");
    session_start();


    $_SESSION['id'] = $_SESSION['id'] + 1;

    header("Location: ../../html/post_page.php");
?>