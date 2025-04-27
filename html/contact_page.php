<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/contact_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <!--container-->
    <div class="container">
        <!--description-->
        <div class="description">
            <h2>Let's Get In Touch</h2>

            <div class="image">
                <img src="../assets/doll_holding_contact_us.png">
            </div>
            
            <div>
                <p>Connect with us:</p>
                <div>
                    <a href="https://www.facebook.com/ethiohomes5" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.twitter.com/ethiohomes5" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                    <a href="https://www.tiktok.com/@ethiohomes6" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>

            <div class="blue_circle"></div>
        </div>

        
        <!--contact form-->
        <div class="contact_form">
            <h2>Send Message</h2>

            <form action="../php/contact_page/contact_page.php" method="post">


                <?php
                    if(isset($_GET['message_sent'])){
                        ?>
                        <style>
                            .container .contact_form h2{
                                color: white;
                                font-weight: 800;
                                text-align: center;
                                margin-bottom: 10px;
                            }
                        </style>

                        <div class="style" style="color: lightgreen; font-weight: 600; margin-bottom: 15px;">Message sent, We will get to you soon</div><?php
                    }
                    
                    if(isset($_GET['message_not_sent'])){
                        ?>
                        <style>
                            .container .contact_form h2{
                                color: white;
                                font-weight: 800;
                                text-align: center;
                                margin-bottom: 10px;
                            }
                        </style>

                        <div class="style" style="color: lightgreen; font-weight: 600; margin-bottom: 15px;">Message not sent, Please try again</div><?php
                    }
                ?>


                <input type="text" placeholder="User Name" name="user_name" required><br>
                <input type="email" placeholder="E-mail" name="email" required><br>
                <input type="text" placeholder="Subject" name="subject" required><br>
                <input type="text" placeholder="Type your message" name="message" required><br>
                
                <div>
                    <button type="submit" name="send">Send</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>