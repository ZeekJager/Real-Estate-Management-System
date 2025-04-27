<?php
    include ("../connection.php");
    session_start();


    $from_user_id = $_SESSION['user_id'];

    if(isset($_GET['to_user_id']) && isset($_SESSION['post_id'])){
        $to_user_id = $_GET['to_user_id'];
        $post_id = $_SESSION['post_id'];
    }


    $sql = "DELETE FROM post_like_table WHERE from_user_id='$from_user_id' AND post_id='$post_id'";
    $delete_like_from_table = mysqli_query($connection, $sql);

    $sql_2 = "SELECT * FROM post_table WHERE post_id='$post_id'";
    $post_table = mysqli_query($connection, $sql_2);
    $row = mysqli_fetch_assoc($post_table);

    $number_of_likes = $row['number_of_likes'] - 1;

    $sql_3 = "UPDATE post_table SET number_of_likes ='$number_of_likes' WHERE post_id='$post_id'";
    $update_like_number = mysqli_query($connection, $sql_3);

    if($delete_like_from_table == true && $update_like_number == true){
        header("Location: ../../html/post_page.php");
    }
?>