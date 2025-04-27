<?php
    include ("../connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];


    if(isset($_POST['upload'])){
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $destination = "../../z_databse_assets/". $file_name;
        move_uploaded_file($temp_name, $destination);

        $house_name = $_POST['house_name'];
        $house_price = $_POST['house_price'];
        $house_price_formated = number_format($house_price);
        $house_location = $_POST['house_location'];
        $house_bedroom = $_POST['house_bedroom'];
        $house_bathroom = $_POST['house_bathroom'];
        $house_area = $_POST['house_area'];


        if($_POST['sale'] == 1){
            $sql = "INSERT INTO house_table (house_image, image_1, house_name, house_price, house_location, house_bedroom, house_bathroom, house_area, house_status, house_promotion, buy_or_sale, date, user_id) VALUES ('$file_name', '$file_name', '$house_name', '$house_price_formated', '$house_location', '$house_bedroom', '$house_bathroom', '$house_area', 1, 0, 1, current_date(), '$user_id')";
            $insert_house_into_table = $connection -> query($sql);


            if($insert_house_into_table == true){
                header("Location: ../../html/user_page/upload_page.php?house_uploaded");
            }
        }
        else if($_POST['sale'] == 0){
            $sql = "INSERT INTO house_table (house_image, image_1, house_name, house_price, house_location, house_bedroom, house_bathroom, house_area, house_status, house_promotion, buy_or_sale, date, user_id) VALUES ('$file_name', '$file_name', '$house_name', '$house_price_formated', '$house_location', '$house_bedroom', '$house_bathroom', '$house_area', 1, 0, 0, current_date(), '$user_id')";
            $insert_house_into_table = $connection -> query($sql);

            
            if($insert_house_into_table == true){
                header("Location: ../../html/user_page/upload_page.php?house_uploaded");
            }
        }
    }
?>