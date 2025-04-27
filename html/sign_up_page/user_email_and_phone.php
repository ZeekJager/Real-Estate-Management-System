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
                <h1>Basic Info</h1>
                <p>Enter e-mail and phone number</p>
            </div>

            <div class="inputs">


                <?php
                    if(isset($_GET['email_already_exists'])){
                        ?><style>form{position: relative;}button{position: absolute; bottom: 0; right: 0;}</style><div style="color: red; text-align: center; margin-bottom: 15px;">E-mail already exists, Please try again</div><?php
                    }

                    if(isset($_GET['phone_already_exists'])){
                        ?><style>form{position: relative;}button{position: absolute; bottom: 0; right: 0;}</style><div style="color: red; text-align: center; margin-bottom: 15px;">Phone number already exists, Please try again</div><?php
                    }

                    if(isset($_GET['email_verification_code_sending_failed'])){
                        ?><style>form{position: relative;}button{position: absolute; bottom: 0; right: 0;}</style><div style="color: red; text-align: center; margin-bottom: 15px;">E-mail verification code sending failed, Please try again </div><?php
                    }

                    if(isset($_GET['phone_verification_code_sending_failed'])){
                        ?><style>form{position: relative;}button{position: absolute; bottom: 0; right: 0;}</style><div style="color: red; text-align: center; margin-bottom: 15px;">Phone verification code sending failed, Please try again</div><?php
                    }
                ?>

                
                <form action="../../php/sign_up_page/user_email_and_phone.php"  method="post" enctype="multipart/form-data">
                    <input type="email" placeholder="E-mail" name="user_email" required><br>
                    <input type="number" placeholder="Phone Number" name="user_phone" value="92785437" disabled required style="cursor: no-drop;"><br><br>
                    <button type="submit" name="next_3">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>