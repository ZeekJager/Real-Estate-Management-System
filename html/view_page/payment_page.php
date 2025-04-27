<?php
    include ("../../php/connection.php");

    if(isset($_GET['house_price'])){
        $house_price = $_GET['house_price'];
    }
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/view_page/payment_information.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <!--container   1-->
    <div class="container">
        <!--description-->
        <div class="description">
            <h2>Payment Information</h2>

            <div class="image">
                <img src="../../assets/chapa_logo.webp">
            </div>

            <p>Connect with chapa:</p>
            <div>
                <a href="https://www.facebook.com/chapa"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/chapa"><i class="fa-brands fa-square-instagram"></i></a>
                <a href="https://www.twitter.com/chapa"><i class="fa-brands fa-square-x-twitter"></i></a>
            </div>


            <div class="blue_circle"></div>
        </div>





        <!--contact form-->
        <div class="contact_form">
            <h2>Credientials</h2>

            <form action="confirm_payment_page.php?house_price=<?php echo $house_price ?>" method="post">
                <p><i class="fa-regular fa-user"></i>   <input type="text" placeholder="First Name" name="first_name" required></p>
                <p><i class="fa-solid fa-user"></i></i> <input type="text" placeholder="Last Name" name="last_name" required></p>
                <p><i class="fa-solid fa-envelope"></i> <input type="email" placeholder="E-mail" name="email" required></p>
                <p><i class="fa-solid fa-key"></i>     <input type="text" placeholder="Your Chapa API Key" name="tx_ref"></p>
                <p>                                     <input type="hidden" name="amount" value="<?php echo $house_price ?>"></p>

                <div>
                    <button type="submit" name="continue">Continue</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>