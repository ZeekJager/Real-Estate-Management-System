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
        <!--upload_container-->
            <div class="display">
                <h1>Upload</h1>


                <?php
                    $sql0 = "SELECT * FROM user_table WHERE user_id = '$user_id'";
                    $user_table = mysqli_query($connection, $sql0);
                    $row = mysqli_fetch_assoc($user_table);
                ?>


                <div class="info">
                    <?php
                        if(isset($_GET['house_uploaded'])){
                            ?><div style="color: lightgreen; font-weight: 600; text-align: center;">House uploaded successfully</div><?php
                        }
                    ?>


                    <img src="../../assets/two_people_uploading_a_file.png" width="160" height="100">
                    <p>Hey, <span><?php if(empty($row['first_name']) && empty($row['last_name'])){ echo "N/A"; }else{ echo $row['first_name']." ".$row['last_name']; } ?></span>, do you know</p>
                    <p>You can upload a house to sale and rent. Just hover on the icon below</p>

                    <div class="socials">
                    <a href="https://www.facebook.com/ethiohomes5" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.twitter.com/ethiohomes5" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                    <a href="https://www.tiktok.com/@ethiohomes6" target="_blank"><i class="fa-brands fa-tiktok"></i></a><br>
                    </div>


                    <div class="down upload_down">
                        <label><i class="fa-solid fa-arrow-up"></i></label>


                        <form action="../../php/user_page/upload_house.php" method="post" enctype="multipart/form-data">
                            <div class="image">
                                <input id="upload_image" type="file" accept="image/*" name="image" multiple required>
                                <label for="upload_image">Images</label>
                            </div>
  

                            <div class="fields" id="field">
                                <div>
                                    <i class="fa-solid fa-house"></i><input type="text" placeholder="House Name" name="house_name" required>
                                    <input type="number" placeholder="House Price" name="house_price" required>
                                </div>
                                <!-- <i class="fa-solid fa-money-bill"></i> -->
                                <div>
                                    <i class="fa-solid fa-location-dot"></i><input type="text" placeholder="House Location" name="house_location" required>
                                    <i class="fa-solid fa-bed"></i><input type="number" placeholder="House Bedroom" name="house_bedroom" min="0" required>
                                </div>

                                <div>
                                    <i class="fa-solid fa-bathtub"></i><input type="number" placeholder="House Bathroom" name="house_bathroom" min="0" required>
                                    <i class="fa-solid fa-square"></i><input type="number" placeholder="House Area In m2" name="house_area" min="0" required>
                                </div>

                                <div class="place" style="display: flex; justify-content: center;">
                                    <label for="for_sale">
                                        For Sale
                                        <input type="radio" id="for_sale" name="sale" value="1" required>
                                    </label>
                                    <label for="for_rent">
                                        For Rent
                                        <input type="radio" id="for_rent" name="sale" value="0" required>
                                    </label>
                                </div>
                            </div>


                            <div class="buttons" id="button">
                                <div>
                                    <button type="reset">Reset</button>
                                    <button type="submit" name="upload">Upload</button>
                                </div>
                            </div>
                        </form>
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