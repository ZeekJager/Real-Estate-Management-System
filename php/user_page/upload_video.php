<?php
    include ("../connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];


    if(isset($_POST['upload'])){
        $file_name = $_FILES['video']['name'];
        $temp_name = $_FILES['video']['tmp_name'];
        $destination = "../../z_databse_assets/". $file_name;
        move_uploaded_file($temp_name, $destination);

        $video_title = $_POST['video_title'];


        $sql = "INSERT INTO post_table (user_id, video_title, video) VALUES ('$user_id', '$video_title', '$file_name')";
        $insert_post_into_table = $connection -> query($sql);


        if($insert_post_into_table == true){
            header("Location: ../../html/user_page/post_page.php?video_uploaded");
        }
    }
?>