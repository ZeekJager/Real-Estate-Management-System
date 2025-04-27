<?php
    include ("../connection.php");
    session_start();
    

    if(isset($_POST['rate'])){
        $from_user_id = $_SESSION['user_id'];
        $house_id = $_GET['house_id'];
        $rating = $_POST['rating'];

        $sql = "SELECT * FROM house_table WHERE house_id='$house_id'";
        $house_table = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($house_table);

        $pre_rating = $row['house_rating'];
        $final_rating = ($rating + $pre_rating) / 2;
        $final_rating_rounded = round($final_rating, 1);
        
        $sql_1 = "INSERT INTO house_rating_table (from_user_id, house_id) VALUES ('$from_user_id', '$house_id')";
        $insert_rating_to_table = mysqli_query($connection, $sql_1);

        $sql_2 = "UPDATE house_table SET  house_rating ='$final_rating_rounded' WHERE house_id='$house_id'";
        $updated_rating = mysqli_query($connection, $sql_2);
                
        if($insert_rating_to_table == true && $updated_rating == true){
            header("Location: ../../html/view_page/view_page.php?house_id=$house_id");
        }
    }
?>