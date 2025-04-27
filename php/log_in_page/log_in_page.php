<?php
    include ("../connection.php");
    session_start();


    if(isset($_POST['log_in'])){
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        
        $sql_1 = "SELECT * FROM user_table WHERE user_name = '$user_name' AND user_password = '$user_password'";
        $user_table = mysqli_query($connection, $sql_1);

        
        if(mysqli_num_rows($user_table) > 0){
            $row = mysqli_fetch_assoc($user_table);
            
            $user_id = $row['user_id'];
            $_SESSION['user_id'] = $row['user_id'];

            $sql_2 = "UPDATE user_table SET user_online ='1' WHERE user_id='$user_id'";
            $change_user_status_to_online = mysqli_query($connection, $sql_2);

            if($change_user_status_to_online == true){
                /*-------------giving random session id for the post page-------------*/
                $sql_count = "SELECT * FROM post_table";
                $post_table_count = mysqli_query($connection, $sql_count);

                $count = 0;
                while($row_count = mysqli_fetch_assoc($post_table_count)){
                    $count++;
                }
                $final = $count - 1;

                $_SESSION['id'] = rand(0, $final);
                
                header("location: ../../html/home_page.php");
            }
        }
        else{
            header("Location: ../../html/log_in_page.php?invalid_inputs");
        }
    }
?>