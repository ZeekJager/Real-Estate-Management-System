<?php
    include ("../connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];


    if(isset($_POST['update']))
    {
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $destination = "../../z_databse_assets/". $file_name;
        move_uploaded_file($temp_name, $destination);

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_phone_number = $_POST['user_phone_number'];
        $user_address = $_POST['user_address'];
        $user_chapa_api_key = $_POST['user_chapa_api_key'];


        $sql = "UPDATE user_table SET user_image ='$file_name', user_name ='$user_name', user_email ='$user_email', user_password = '$user_password', user_phone ='$user_phone_number', user_address ='$user_address', user_chapa_api_key = '$user_chapa_api_key' WHERE user_id='$user_id'";
        $update_user = mysqli_query($connection, $sql);


        if($update_user == true){
            header("Location: ../../html/user_page/update_page.php?account_updated");
        }
    }
?>