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
                <h1>Verify Info</h1>
                <p>Enter the codes sent</p>
            </div>

            <div class="inputs">


                <?php
                    if(isset($_GET['invalid_verification_code'])){
                        ?><style>form{position: relative;}button{position: absolute; bottom: 0; right: 0;}</style><div style="color: red; text-align: center; margin-bottom: 15px;">Invalid E-mail and/or SMS verification code</div><?php
                    }
                ?>


                <form action="../../php/sign_up_page/verify_email_and_phone.php" method="post">
                    <input type="number" placeholder="E-mail code" name="email_code" required><br>
                    <input type="number" placeholder="SMS code" name="sms_code" value="123456" disabled  required style="cursor: no-drop;"><br><br>
                    <button type="submit" name="next_code">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>