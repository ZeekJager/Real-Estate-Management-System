<?php
    include ("../../php/connection.php");
    session_start();

    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $from_user_id = $_SESSION['user_id'];
    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/view_page/profile_view_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <?php
        $sql_user = "SELECT * FROM user_table WHERE user_id='$user_id'";
        $user_table = mysqli_query($connection, $sql_user);
        
        $row_user = mysqli_fetch_assoc($user_table);
    ?>


    <i class="fa-solid fa-triangle-exclamation" id="image" onclick="show_profile_card()" style="cursor: pointer; position: absolute; top: 20px; right: 20px; color: red; font-size: 30px; z-index: 1;"></i>





    <!--main-->
    <main id="main">
        <!--profile container-->
        <div class="profile_container" id="profile_container">
            <div class="display">
                <?php
                    $sql_0 = "SELECT * FROM user_table WHERE user_id = '$user_id'";
                    $user_table = mysqli_query($connection, $sql_0);
                    $row = mysqli_fetch_assoc($user_table);
                ?>


                <div class="info">
                    <img src="../../z_databse_assets/<?php if($row['user_image']){ echo $row['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="100" height="100">
                    <p>Saler, <span><?php if(empty($row['first_name']) && empty($row['last_name'])){ echo "N/A"; }else{ echo $row['first_name']." ".$row['last_name']; } ?></span></p>

                    <p>Report Number: <?php if($row['user_report'] == 0){ ?><span style="color: lightgreen;"><?php echo $row['user_report']; ?></span> <?php } else{?> <span style="color: red;"><?php echo $row['user_report']; ?></span> <?php } ?> </p>
                    <p>Check out salers profile, Just hover on the icon below</p>

                    <div class="socials">
                        <a href="https://www.facebook.com/ethiohomes5" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.twitter.com/ethiohomes5" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                        <a href="https://www.tiktok.com/@ethiohomes6" target="_blank"><i class="fa-brands fa-tiktok"></i></a><br>
                    </div>

                    <div class="toogle_button">
                        <button onclick="for_sale()">Properties</button>
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
        </div>





        <!--for sale houses display-->
        <div class="for_sale_houses_display" id="for_sale">
            <h1><span><?php echo $row_user['user_name']; ?></span>'s houses for <span>sale</span></h1>


            <div class="search">
                <input type="search" id="search_bar">
                <button onclick="search_bar()">Search</button>
            </div>

                    
            <div class="toogle_button">
                <button onclick="profile1()">Profile</button>
                <button onclick="for_rent()">Go to rent</button>
            </div>


            <div class="houses_container1" id="houses_container1">


                <?php
                    $sql_1 = "SELECT * FROM house_table WHERE buy_or_sale='1' AND user_id = '$user_id' ORDER BY house_price";
                    $buy_table = mysqli_query($connection, $sql_1);
                                
                    if($buy_table -> num_rows > 0){
                        while($row = mysqli_fetch_assoc($buy_table)){
                ?>


                <div class="houses" id="houses">
                    <div class="image">
                        <img src="../../z_databse_assets/<?php if($row['house_image']){ echo $row['house_image']; }else{ echo "no_image.jpg"; }?>" width="100%" height="250px">
                    </div>


                    <div class="details">
                        <h4><?php if(empty($row['house_name']) || $row['house_name'] == ""){ ?> N/A <?php }else{ echo $row['house_name']; } ?></h4>
                        <i class="fa-solid fa-location-dot"></i><p><?php if(empty($row['house_location']) || $row['house_location'] == ""){ ?> N/A <?php }else{ echo $row['house_location']; } ?></p><br>
                        <p>ETB <?php if(empty($row['house_price']) || $row['house_price'] == 0){ ?> N/A <?php }else{ echo $row['house_price']; } ?></p><br>
                        <i class="fa-solid fa-calendar-days"></i><p><?php if(empty($row['house_date']) || $row['house_date'] == "0000-00-00"){ ?> N/A <?php }else{ echo $row['house_date']; } ?></p><br><br>
                        <p><?php if(empty($row['house_bedroom']) || $row['house_bedroom'] == 0){ ?> N/A <?php }else{ echo $row['house_bedroom']; } ?> Bedroom | </p>
                        <p><?php if(empty($row['house_bathroom']) || $row['house_bathroom'] == 0){ ?> N/A <?php }else{ echo $row['house_bathroom']; } ?> Bathroom | </p>
                        <p><?php if(empty($row['house_area']) || $row['house_area'] == 0){ ?> N/A <?php }else{ echo $row['house_area']; } ?> m<sup>2</sup></p>
                    </div>


                    <div class="slide">
                        <p><i class="fa-solid fa-star"></i><?php echo $row['house_rating'] ?></p>
                        <p><i class="fa-solid fa-comments"></i><?php echo $row['house_review_number'] ?></p>
                    </div>
                </div>


                <?php
                        }
                    }
                    else{ ?>
                        <style>
                            .houses_container1{
                                display: block;
                            }
                        </style>

                        <div style="color: blue; font-weight: 600; text-align: center;">No house for sale here yet</div><?php
                    }
                ?>
            </div>
        </div>





        <!--for rent houses display-->
        <div class="for_rent_houses_display" id="for_rent">
            <h1><span><?php echo $row_user['user_name']; ?></span>'s houses for <span>rent</span></h1>


            <div class="search">
                <input type="search" id="search_bar">
                <button onclick="search_bar()">Search</button>
            </div>

                    
            <div class="toogle_button">
            <button onclick="profile1()">Profile</button>
                <button onclick="for_sale()">Go to sale</button>
            </div>

                    
            <div class="houses_container2" id="houses_container2">


                <?php
                    $sql_2 = "SELECT * FROM house_table WHERE buy_or_sale='0' AND user_id = '$user_id' ORDER BY house_price";
                    $rent_table = mysqli_query($connection, $sql_2);
                                
                    if($rent_table -> num_rows > 0){
                        while($row = mysqli_fetch_assoc($rent_table)){
                ?>


                <div class="houses" id="houses">
                    <div class="image">
                        <img src="../../z_databse_assets/<?php if($row['house_image']){ echo $row['house_image']; }else{ echo "no_image.jpg"; }?>" width="100%" height="250px" alt="Image unavalible">
                    </div>


                    <div class="details">
                        <h4><?php if(empty($row['house_name']) || $row['house_name'] == ""){ ?> N/A <?php }else{ echo $row['house_name']; } ?></h4>
                        <i class="fa-solid fa-location-dot"></i><p><?php if(empty($row['house_location']) || $row['house_location'] == ""){ ?> N/A <?php }else{ echo $row['house_location']; } ?></p><br>
                        <p>ETB <?php if(empty($row['house_price']) || $row['house_price'] == 0){ ?> N/A <?php }else{ echo $row['house_price']; } ?></p><br>
                        <i class="fa-solid fa-calendar-days"></i><p><?php if(empty($row['house_date']) || $row['house_date'] == "0000-00-00"){ ?> N/A <?php }else{ echo $row['house_date']; } ?></p><br><br>
                        <p><?php if(empty($row['house_bedroom']) || $row['house_bedroom'] == 0){ ?> N/A <?php }else{ echo $row['house_bedroom']; } ?> Bedroom | </p>
                        <p><?php if(empty($row['house_bathroom']) || $row['house_bathroom'] == 0){ ?> N/A <?php }else{ echo $row['house_bathroom']; } ?> Bathroom | </p>
                        <p><?php if(empty($row['house_area']) || $row['house_area'] == 0){ ?> N/A <?php }else{ echo $row['house_area']; } ?> m<sup>2</sup></p>
                    </div>


                    <div class="slide">
                        <p><i class="fa-solid fa-star"></i><?php echo $row['house_rating'] ?></p>
                        <p><i class="fa-solid fa-comments"></i><?php echo $row['house_review_number'] ?></p>
                    </div>
                </div>


                <?php
                        }
                    }
                    else{ ?>
                        <style>
                            .houses_container2{
                                display: block;
                            }
                        </style>

                        <div style="color: blue; font-weight: 600; text-align: center;">No house for rent here yet</div><?php
                    }
                ?>
            </div>
        </div>
    </main>
    



    
    <?php
        $sql_report = "SELECT * FROM user_report_table WHERE from_user_id='$from_user_id' AND to_user_id='$user_id'";
        $user_report = mysqli_query($connection, $sql_report);
        $row_report = mysqli_fetch_assoc($user_report);
        
        $report = 1;
        if(mysqli_num_rows($user_report) > 0){
            $report = 0;
        }

        if($report == 1){
    ?>


    <!--footer-->
    <footer>
        <!--div-->
        <div class="div" id="div" onclick="hide_profile_card()">
            
        </div>

        <div class="profile" id="profile">
            <img src="../../z_databse_assets/<?php if($row_user['user_image']){ echo $row_user['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="40" height="40">
            
            <form action="../../php/view_page/report_recording.php?to_user_id=<?php echo $user_id ?>" method="post">
                <input type="text" placeholder="Reason For Report" name="report_reason" required>

                <div class="buttons">
                    <button type="submit" name="report">Report</button>
                    <button type="reset" onclick="hide_profile_card()">Cancel</button>
                <div>
            </form>
        </div>
    </footer>


    <?php
        }
    ?>





    <script src="../../js/view_page/profile_view_page.js"></script>
<script>
*-------------***option click functionality for house sale and rent***-------------*/
let profile_container = document.getElementById("profile_container");
let for_sale_container = document.getElementById("for_sale");
let for_rent_container = document.getElementById("for_rent");


function profile1(){
    profile_container.style.display = "block";
    for_sale_container.style.display = "none";
    for_rent_container.style.display = "none";
}

function for_sale(){
    profile_container.style.display = "none";
    for_sale_container.style.display = "grid";
    for_rent_container.style.display = "none";
}

function for_rent(){
    profile_container.style.display = "none";
    for_sale_container.style.display = "none";
    for_rent_container.style.display = "grid";
}
</script>
</style>
</body>
</html>