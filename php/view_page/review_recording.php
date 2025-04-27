<?php
    include ("../connection.php");
    session_start();

    if(isset($_SESSION['user_id'])){
        $from_user_id = $_SESSION['user_id'];
    }

    if(isset($_SESSION['to_user_id'])){
        $to_user_id = $_SESSION['to_user_id'];
    }

    if(isset($_GET['house_id'])){
        $house_id = $_GET['house_id'];
    }

    


    
    if(isset($_POST['submit'])){
        $house_review = $_POST['house_review'];
        
        $sql_1 = "INSERT INTO house_review (from_user_id, house_review, house_id, to_user_id, date) VALUES ('$from_user_id', '$house_review', '$house_id', '$to_user_id', current_date())";
        $house_review_table = mysqli_query($connection, $sql_1);
        echo "out";

        $sql_2 = "SELECT * FROM house_table WHERE house_id='$house_id'";
        $house_table = mysqli_query($connection, $sql_2);
        $row = mysqli_fetch_assoc($house_table);
        $house_review_1 = $row['house_review_number'] + 1;

        $sql_3 = "UPDATE house_table SET house_review_number='$house_review_1' WHERE house_id='$house_id'";
        $update_house_review = mysqli_query($connection, $sql_3);
                
        if($house_review_table == true){
            header("Location: ../../html/view_page/view_page.php?house_id= $house_id");
            echo "in";
        }
    }
?>