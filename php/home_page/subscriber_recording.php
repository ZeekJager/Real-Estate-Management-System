<?php
    include ("../connection.php");


    if(isset($_POST['subscribe'])){
        $subscriber_email = $_POST['email'];
                
        $sql_1 = "SELECT * FROM subscriber_table WHERE subscriber_email = '$subscriber_email'";
        $subscriber_table = mysqli_query($connection, $sql_1);
                
                
        if(mysqli_num_rows($subscriber_table) > 0){
            header("Location: ../../html/home_page.php?email_exists");
        }
        else{
            $sql_2 = "INSERT INTO subscriber_table (subscriber_email) VALUE ('$subscriber_email')";
            $insert_subscriber_to_table = mysqli_query($connection, $sql_2);
                
            if($insert_subscriber_to_table == true){
                header("Location: ../../html/home_page.php?subscribed");
            }
            else{
                header("Location: ../../html/home_page.php?subscribtion_failed");
            }
        }
    }
?>