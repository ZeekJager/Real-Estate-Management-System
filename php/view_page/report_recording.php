<?php
    include ("../connection.php");
    session_start();
    

    if(isset($_POST['report'])){
        $from_user_id = $_SESSION['user_id'];
        $to_user_id = $_GET['to_user_id'];
        $report_reason = $_POST['report_reason'];

        $sql_1 = "INSERT INTO user_report_table (from_user_id, report_reason, to_user_id) VALUES ('$from_user_id', '$report_reason', '$to_user_id')";
        $insert_report_to_table = mysqli_query($connection, $sql_1);

        $sql = "SELECT * FROM user_table WHERE user_id='$to_user_id'";
        $user_table = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($user_table);

        $pre_report = $row['user_report'];
        $final_report = $pre_report + 1;

        $sql_2 = "UPDATE user_table SET user_report ='$final_report' WHERE user_id='$to_user_id'";
        $updated_user_report = mysqli_query($connection, $sql_2);
                
        if($insert_report_to_table == true && $updated_user_report == true){
            header("Location: ../../html/view_page/profile_view_page.php?user_id=$to_user_id");
        }
    }
?>