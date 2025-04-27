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
                <h1>User Crediential</h1>
                <p>Enter user name and password</p>
            </div>

            <div class="inputs">


                <?php
                    if(isset($_GET['user_name_already_exists'])){
                        ?><style>form{position: relative;}button{position: absolute; bottom: 0; right: 0;}</style><div style="color: red; text-align: center; margin-bottom: 15px;">User name already exists, Please try again</div><?php
                    }

                    if(isset($_GET['password_length_too_short'])){
                        ?><style>form{position: relative;}button{position: absolute; bottom: 0; right: 0;}</style><div style="color: red; text-align: center; margin-bottom: 15px;">Password length should be 8 characters minimum</div><?php
                    }
                ?>

                
                <form action="../../php/sign_up_page/user_name_and_password.php" method="post">
                    <input type="text" placeholder="User Name" name="user_name" required><br>
                    <input type="password" placeholder="Password" name="user_password" required><br><br>
                    <button type="submit" name="next_2">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>