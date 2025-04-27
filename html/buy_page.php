<?php
    include ("../php/connection.php");
    session_start();

    $_SESSION['from_page'] = "buy_page";

    if(isset($_SESSION['user_id'])){
?>





<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/buy_and_rent_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <label for="checkbox">
        <input type="checkbox" id="checkbox" style="display: none;">
        
        <i class="fa-solid fa-bars" style="cursor: pointer; position: absolute; top: 20px; right: 20px; color: white; font-size: 18px; z-index: 6;"></i>
        
        <div class="media_query">
            <a href="index.php">Home</a>
            <a href="all_page.php">All</a>
            <a href="buy_page.php">Buy</a>
            <a href="rent_page.php">Rent</a>
            <a href="post_page.php">Posts</a>
        </div>
    </label>





    <!--Section 1-->
    <section class="section_1">
        <!--header-->
        <header>
            <h1>ETHIO<span>HOMES</span></h1>

            <nav>
                <a href="home_page.php">Home</a>
                <a href="all_page.php">All</a>
                <a href="buy_page.php">Buy</a>
                <a href="rent_page.php">Rent</a>
                <a href="post_page.php">Posts</a>
            </nav>
        </header>


        <!--main-->
        <main class="main" style="background: url('../assets/house_with_orange_lights.jpeg'); background-size: cover; background-position: center;">
            <div class="text">
                <h1>Find your perfect residential property with us.</h1>
                <h1>Where comfort meets convenience.</h1>
            </div>

            <div class="buy_or_rent">
                <a href="buy_page.php">Buy</a>
                <a href="rent_page.php">Rent</a>
            </div>
            
            <div class="search_bar">
                <input type="search" placeholder="Search..." id="search_bar">
                <button onclick="search_bar()"><i class="fa-solid fa-search"></i></button>
            </div>
        </main>
    </div>





    <!--section 2-->
    <div class="section_2">
        <div class="top">
            <p>Property Listing</p>
            <p>Sorted by price</p>
        </div>

        <div class="container">

        
            <?php
                $sql_2 = "SELECT * FROM house_table WHERE buy_or_sale='1' ORDER BY house_price";
                $house_table_2 = mysqli_query($connection, $sql_2);
                
                if(mysqli_num_rows($house_table_2) > 0){
                    while($row_2 = mysqli_fetch_assoc($house_table_2)){
            ?>


            <div id="houses">
                <div class="image">
                    <img src="../z_databse_assets/<?php if(!empty($row_2['house_image'] || $row_2['house_image'] != "")){ echo $row_2['house_image']; } else{ echo "no_image.jpg"; } ?>">
                </div>

                <div id="details">
                    <h1><?php if(!empty($row_2['house_name'] || $row_2['house_name'] != "")){ echo $row_2['house_name']; } else{?> N/A <?php } ?></h1><br>
                    <p>ETB <?php if(!empty($row_2['house_price'] || $row_2['house_price'] != 0)){ echo $row_2['house_price']; } else{?> N/A <?php } ?></p>
                    <i class="fa-solid fa-location-dot"></i><p><?php if(!empty($row_2['house_location'] || $row_2['house_location'] != "")){ echo $row_2['house_location']; } else{?> N/A <?php } ?></p><br><br>
                    <i class="fa-solid fa-calendar-days"></i><p><?php if(empty($row_2['date']) || $row_2['date'] == "0000-00-00"){ ?> N/A <?php }else{ echo $row_2['date']; } ?></p><br><br>
                    <p><?php if(!empty($row_2['house_bedroom'] || $row_2['house_bedroom'] != 0)){ echo $row_2['house_bedroom']; } else{?> N/A <?php } ?> Bedroom | </p>
                    <p><?php if(!empty($row_2['house_bathroom'] || $row_2['house_bathroom'] != 0)){ echo $row_2['house_bathroom']; } else{?> N/A <?php } ?> Bathroom | </p>
                    <p><?php if(!empty($row_2['house_area'] || $row_2['house_area'] != 0)){ echo $row_2['house_area']; } else{?> N/A <?php } ?> m<sup>2</sup></p>
                    <a href="view_page/view_page.php?house_id=<?php echo $row_2['house_id']; ?>">View</a>
                </div>
            </div>


            <?php
                    }
                }
                else{
                    ?>
                    <style>
                        .section_2 .container{
                            display: block;
                        }
                    </style>
                    <div class="style">No property to display yet</div><?php
                }
            ?>
        </div>


        <!--no result-->
        <div class="no_result">
            <div class="style" id="no_result"></div>
        </div>
    </div>





    <!--Section 3-->
    <section class="section_3">
        <!--main-->
        <main>
            <div>
                <h3>Ethio<span>Homes</span></h3>
                <p>A Place You Can Find Your Home</p>
            </div>


            <div>
                <h3>Support</h3>
                <a href="about_page.html">About</a>
                <a href="contact_page.php">Contact</a>  
            </div>


            <div>
                <h3>Contact</h3>
                <p><i class="fa-solid fa-envelope"></i>ethiohomes5@gmail.com</p>
                <p><i class="fa-solid fa-phone"></i>+2515167823</p>
                <p><i class="fa-solid fa-location-dot"></i>4 Kilo</p>
            </div>


            <div> 
                <h3>Socials</h3>

                <div class="socials">
                    <a href="https://www.facebook.com/ethiohomes5" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/ethiohomes5" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="https://www.twitter.com/ethiohomes5" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                </div>
            </div>
        </main>

        
        <footer>
            <hr>
            <p>Copyright © 2024. All Rights Reserved</p>
        </footer>
    </section>





    <script src="../js/buy_and_rent_page.js"></script>
</body>
</html>

<?php
    }
    else{
        header("Location: log_in_page.php?buy_Page=2");
    }
?>