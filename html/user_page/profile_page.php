<?php 
    include ("../../php/connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    if(isset($_SESSION['user_id'])){
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/user_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <a href="../home_page.php"><i class="fa-solid fa-arrow-left" style="color: white; position: absolute; top: 10px; left: 10px; z-index: 1;"></i></a>
    
    
    
    
    
    <!--header-->
    <header id="header">
        <!--brand name-->
        <div class="brand_name">
            <label id="label">Ethio<span>Homes</span></label><img id="arrow" src="../../assets/white_arrow_left.png" width="30" height="30" onclick="collapse_sidebar()">
        </div>

        
        <!--options-->
        <div class="options">
            <div><a href="dash_board_page.php"><i class="fa-solid fa-gauge"></i>                                                                     <span id="option_labels">Dashboard</span></a></div>
            <div><a href="profile_page.php"><i class="fa-solid fa-user"></i>                                                                        <span id="option_labels">Profile</span></a></div>
            <div><a href="update_page.php"><i class="fas fa-user-edit navigation-icon"></i>                                                         <span id="option_labels">Update</span></a></div>
            <div><a href="upload_page.php"><i class="fa-solid fa-upload"></i>                                                                       <span id="option_labels">Upload</span></a></div>
            <div><a href="houses_page.php"><i class="fa-solid fa-house"></i>                                                                        <span id="option_labels">Houses</span></a></div>
            <div style="position: relative;"><a href="notification_page.php"><i class="fa-solid fa-bell"></i>                                       <?php if(isset($_SESSION['number_of_notifications']) && $_SESSION['number_of_notifications'] != 0){?><span style="position: absolute; top: 0; left: 10px; color: white; font-size: 14px; font-weight: 600; border-radius: 100%; padding: 4px; background: red;"><?php echo $_SESSION['number_of_notifications']; ?></span> <?php } ?> <span id="option_labels">Notifications</span></a></div>
            <div><a href="post_page.php"><i class="fa-solid fa-cloud"></i>                                                                          <span id="option_labels">Post</span></a></div>
            <div><a href="../../php/user_page/log_out.php"><i class="fa-solid fa-right-from-bracket" style="transform: rotate(-180deg);"></i>       <span id="option_labels">Logout</span></a></div>
        </div>
    </header>


    

    
    <!--main-->
    <main>
        <!--profile container-->
            <div class="display">
                <h1>Profile</h1>


                <?php
                    $sql0 = "SELECT * FROM user_table WHERE user_id = '$user_id'";
                    $user_table = mysqli_query($connection, $sql0);
                    $row = mysqli_fetch_assoc($user_table);
                ?>


                <div class="info">
                    <img src="../../z_databse_assets/<?php if($row['user_image']){ echo $row['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="100" height="100">
                    <p>Welcome, <span><?php if(empty($row['first_name']) && empty($row['last_name'])){ echo "N/A"; }else{ echo $row['first_name']." ".$row['last_name']; } ?></span></p>

                    <p>Check out your profile that are visible to others</p>
                    <div class="socials">
                    <a href="https://www.facebook.com/ethiohomes5" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.twitter.com/ethiohomes5" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                    <a href="https://www.tiktok.com/@ethiohomes6" target="_blank"><i class="fa-brands fa-tiktok"></i></a><br>
                    </div>


                    <div class="down profile_down">
                        <label><i class="fa-solid fa-arrow-up"></i></label>
                        <p><i class="fa-solid fa-envelope"></i><?php if(empty($row['user_email']) || $row['user_email'] == ""){ ?> N/A <?php }else{ echo $row['user_email']; } ?></p><br>
                        <p><i class="fa-solid fa-phone"></i><?php if(empty($row['user_phone']) || $row['user_phone'] == 0){ ?> N/A <?php }else{ echo $row['user_phone']; } ?></p><br>
                        <p><i class="fa-solid fa-location-dot"></i><?php if(empty($row['user_address']) || $row['user_address'] == ""){ ?> N/A <?php }else{ echo $row['user_address']; } ?></p><br>
                        <p><i class="fa-solid fa-user-doctor"></i><?php if(empty($row['user_chapa_api_key']) || $row['user_chapa_api_key'] == ""){ ?> N/A <?php }else{ echo $row['user_chapa_api_key']; } ?></p><br>
                    </div>
                </div>
            </div>
    </main>




    
    <script src="../../js/user_page.js"></script>
</body>
</html>

<?php
    }
    else{
        header("Location: ../log_in_page.php?user_page=2");
    }
?>