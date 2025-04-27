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
                <h1>User Identification</h1>
                <p>Enter your national ID and chapa API key</p>
            </div>

            <div class="inputs">


                <?php
                    if(isset($_GET['user_national_id_already_exists'])){
                        ?><style>form{position: relative;}button{position: absolute; bottom: 0; right: 0;}</style><div style="color: red; text-align: center; margin-bottom: 15px;">National ID already exists, Please try again</div><?php
                    }
                ?>

                
                <form action="../../php/sign_up_page/user_national_id_and_chapa_key.php" method="post">
                    <input type="number" placeholder="National ID(6 digit)" name="user_national_id" required><br>
                    <input type="text" placeholder="Chapa API Key (optional)" name="user_chapa_api_key"><br><br>
                    <button type="submit" name="next_5">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>