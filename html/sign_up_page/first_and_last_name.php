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
                <h1>Create Account</h1>
                <p>Enter your name</p>
            </div>

            <div class="inputs">
                <form action="../../php/sign_up_page/first_and_last_name.php" method="post">
                    <input type="text" placeholder="First Name" name="first_name" required><br>
                    <input type="text" placeholder="Last Name" name="last_name" required><br><br>
                    <button type="submit" name="next_1">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>