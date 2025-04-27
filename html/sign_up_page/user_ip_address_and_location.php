<?php
    session_start();
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/sign_up_page/first_and_last_name.css">
    <title>EthioHomes</title>
</head>
<body>
    <div class="container">
        <img src="../../assets/logo.png" width="60" height="60">

        <div class="texts_and_inputs">
            <div class="texts">
                <h1>Geolocation Access</h1>
                <p>Your location and coordinate</p>
            </div>

            <div class="inputs">
                <form action="../../php/sign_up_page/user_ip_address_and_location.php" method="post">
                    <input type="text" placeholder="Location:- <?php echo $_SESSION['city']." , ".$_SESSION['location']; ?>" disabled style="cursor: no-drop;"><br><br>
                    <input type="text" placeholder="Coordinates:- <?php echo $_SESSION['long_and_lat']; ?>" disabled style="cursor: no-drop;"><br>
                    <button type="submit" name="next_4">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>