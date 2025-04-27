<?php
    include ("../php/connection.php");
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/log_in_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <!--container-->
    <div class="container">
        <!--description-->
        <div class="description">
            <h2>Welcome Back</h2>
            <p>Dont have an account?</p>
            <a href="sign_up_page/first_and_last_name.php">SignUp</a>
        </div>


        <!--input form-->
        <div class="input_form">
            <h2>LogIn</h2>


            <form action="../php/log_in_page/log_in_page.php" method="post">


                <?php
                    if(isset($_GET['account_created'])){
                        ?><div class="style_pass">Account created successfully</div><?php
                    }
                    
                    if(isset($_GET['invalid_inputs'])){
                        ?><div class="style_fail">Invalid user name or password</div><?php
                    }

                    if(isset($_GET['home_Page'])){
                        ?><div class="style_fail">You have to login before accessing home page</div><?php
                    }

                    if(isset($_GET['all_Page'])){
                        ?><div class="style_fail">You have to login before accessing all page</div><?php
                    }

                    if(isset($_GET['buy_Page'])){
                        ?><div class="style_fail">You have to login before accessing buy page</div><?php
                    }

                    if(isset($_GET['rent_page'])){
                        ?><div class="style_fail">You have to login before accessing rent page</div><?php
                    }

                    if(isset($_GET['post_page'])){
                        ?><div class="style_fail">You have to login before accessing post page</div><?php
                    }

                    if(isset($_GET['user_page'])){
                        ?><div class="style_fail">You have to login before accessing user page</div><?php
                    }

                    if(isset($_GET['success_page'])){
                        ?><div class="style_fail">You have to login before accessing success page</div><?php
                    }
                ?>


                <p><input type="text" placeholder="User Name" name="user_name" required><i class="fa-solid fa-user"></i></p>
                <p><input type="password" placeholder="Password" id="password" name="user_password" required><i class="fa-solid fa-eye" id="icon" style="cursor: pointer;" onclick="show_or_hide_password()"></i></p>
                
                <div>
                    <button type="submit" name="log_in">LogIn</button>
                </div>
            </form>
        </div>
    </div>
    
    


    
    <script>
        let password = document.getElementById("password");
        let icon = document.getElementById("icon");

        function show_or_hide_password(){
            if(password.getAttribute('type') === "password" && icon.getAttribute('class') === "fa-solid fa-eye"){
                password.setAttribute('type', 'text');
                icon.setAttribute('class', 'fa-solid fa-eye-slash');
            }
            else{
                password.setAttribute('type', 'password');
                icon.setAttribute('class', 'fa-solid fa-eye');
            }
        }
    </script>
</body>
</html>