<?php
    include ("../../php/connection.php");
    session_start();

    if(isset($_SESSION['to_user_id'])){
        $to_user_id = $_SESSION['to_user_id'];
    }
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/view_page/confirm_payment_page.css">
    <title>EthioHomes</title>
</head>
<body>
    <!--container-->
    <div class="container">


        <?php
            if(isset($_POST['continue']) && isset($_GET['house_price'])){
                $house_price = $_GET['house_price'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];

                $sql = "SELECT * FROM user_table WHERE user_id='$to_user_id'";
                $saler_table = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($saler_table);

                $saler_chapa_api_key = $row['user_chapa_api_key'];
                $saler_chapa_api_key = "CHAPUBK_TEST-54gUPu3nt4itb8I6KZaInuI5cOPLZgNK";
                $tx_ref = mt_rand(100000, 999999);
                $_SESSION['tx_ref'] = $tx_ref;
        ?>


        <h2>Are you sure you want to continue with the payment</h2>


        <form method="POST" action="https://api.chapa.co/v1/hosted/pay" >
            <input type="hidden" name="public_key" value="<?php echo $saler_chapa_api_key; ?>" />
            <input type="hidden" name="tx_ref" value="<?php echo $tx_ref; ?>" />
            <input type="hidden" name="amount" value="<?php echo $house_price; ?>" />
            <input type="hidden" name="currency" value="ETB" />
            <input type="hidden" name="email" value="<?php echo $email; ?>" />
            <input type="hidden" name="first_name" value="<?php echo $first_name; ?>" />
            <input type="hidden" name="last_name" value="<?php echo $last_name; ?>" />
            <input type="hidden" name="title" value="EthioHomes" />
            <input type="hidden" name="description" value="EthioHomes is a lifestyle" />
            <input type="hidden" name="logo" value="https://localhost/ethiohomes/assets/house_with_iron_gate.png" />
            <input type="hidden" name="callback_url" value="https://localhost/ethiohomes/html/view_page/successfull_payment_page.php" />
            <input type="hidden" name="return_url" value="https://localhost/ethiohomes/html/view_page/successfull_payment_page.php" />
            <input type="hidden" name="meta[title]" value="test" />
            <button type="submit">Confirm</button>
        </form>


        <?php
            }
        ?>
    </div>
</body>
</html>