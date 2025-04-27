<?php
    include ("../../php/connection.php");
    session_start();

    if(isset($_SESSION['user_id'])){
    $from_user_id = $_SESSION['user_id'];
    $to_user_id = $_SESSION['to_user_id'];
    $house_id = $_SESSION['house_id'];
    $house_price = $_SESSION['house_price'];
    $tx_ref = $_SESSION['tx_ref'];

    $sql = "SELECT * FROM house_table WHERE house_id='$house_id'";
    $house_table = mysqli_query($connection, $sql);
    $row_ = mysqli_fetch_assoc($house_table);
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/view_page/successfull_payment_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <a href="../buy_page.php"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 50px; left: 50px; transition: 1s;"></i></a>
    
    
    
    
    <!--container-->
    <div class="container">


        <?php
            /*--1) getting the buyer info from database--*/
            $sql_1 = "SELECT * FROM user_table WHERE user_id='$from_user_id'";
            $from_user_table = mysqli_query($connection, $sql_1);
            $row_1 = mysqli_fetch_assoc($from_user_table);


            /*--2) getting the saler info from database--*/
            $sql_2 = "SELECT * FROM user_table WHERE user_id='$to_user_id'";
            $to_user_table = mysqli_query($connection, $sql_2);
            $row_2 = mysqli_fetch_assoc($to_user_table);


            /*--3) storing the transaction in database--*/
            $sql_3 = "INSERT INTO transaction_table (house_id, house_price, saler_user_id, buyer_user_id, tx_ref) VALUES ('$house_id', '$house_price', '$to_user_id', '$from_user_id', '$tx_ref')";
            $insert_transaction = mysqli_query($connection, $sql_3);


            /*--4) storing the bought or rented house to buyer table--*/
            $sql_4 = "SELECT * FROM user_table WHERE user_id='$from_user_id'";
            $from_user_table_2 = mysqli_query($connection, $sql_4);
            $row = mysqli_fetch_assoc($from_user_table_2);

            $house_bought = $row['house_bought'] + 1;
            $house_rented_from_others = $row['house_rented_from_others'] + 1;
            $total_expense = $row['total_expense'] + $house_price;

            if($row_['buy_or_sale'] == 1){
                $sql_4 = "UPDATE user_table SET house_bought ='$house_bought', total_expense = '$total_expense' WHERE user_id='$from_user_id'";
                $update_house_bought = mysqli_query($connection, $sql_4);
            }
            else if($row_['buy_or_sale'] == 0){
                $sql_4 = "UPDATE user_table SET house_rented_from_others ='$house_rented_from_others', total_expense = '$total_expense' WHERE user_id='$from_user_id'";
                $update_house_rented_from_others = mysqli_query($connection, $sql_4);
            }


            /*--5) storing the sold or rented house to saler table--*/
            $sql_5 = "SELECT * FROM user_table WHERE user_id='$to_user_id'";
            $to_user_table_2 = mysqli_query($connection, $sql_5);
            $row_2 = mysqli_fetch_assoc($to_user_table_2);

            $house_sold = $row_2['house_sold'] + 1;
            $house_rented = $row_2['house_rented'] + 1;
            $total_sales = $row['total_sales'] + $house_price;

            if($row_['buy_or_sale'] == 1){
                $sql_5 = "UPDATE user_table SET house_sold ='$house_sold', total_sales = '$total_sales' WHERE user_id='$to_user_id'";
                $update_house_sold = mysqli_query($connection, $sql_5);
            }
            else if($row_['buy_or_sale'] == 0){
                $sql_5 = "UPDATE user_table SET house_rented ='$house_rented', total_sales = '$total_sales' WHERE user_id='$to_user_id'";
                $update_house_rented = mysqli_query($connection, $sql_5);
            }


            /*--6) delete the house from database--*/
            $sql_6 = "DELETE FROM house_table WHERE house_id='$house_id'";
            $delete_house = mysqli_query($connection, $sql_6);
        ?>


        <h2>Congratulations, <span><?php echo $row_1['user_name']; ?></span></h2>
        <h3>Your payment was successfully made</h2>
        <h3>You paid, <span>ETB <?php echo $house_price; ?></span> to <span><?php echo $row_2['user_name']; ?></span></h3>
    </div>
</body>
</html>

<?php
    }
    else{
        header("Location: ../log_in_page.php?success_page=2");
    }
?>