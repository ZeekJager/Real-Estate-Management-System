<?php
    include("../connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];
    $house_id = $_GET['house_id'];

    
    $sql = "DELETE FROM house_table WHERE buy_or_sale='0' AND house_id='$house_id'";
    $house_deleted = mysqli_query($connection, $sql);


    if($house_deleted == true){
        header("Location: ../../html/user_page/houses_for_rent.php?house_deleted");
    }
?>