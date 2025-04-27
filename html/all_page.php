<?php
    include ("../php/connection.php");
    session_start();

    $_SESSION['from_page'] = "all_page";
    $_SESSION['from_page_2'] = "all_page";

    if(isset($_SESSION['user_id'])){
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/all_page.css">
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
    <section class="section_1" id="section_1">
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
        <main>
            <div class="container">
                <h1>Explore</h1>
                <h1>Find your perfect residential property.</h1>
    
                <div class="search">
                    <input type="search" placeholder="Search" required>
                    <button type="submit" name="subscribe">Search</button>
                </div>

                <div class="statistics">


                    <?php
                        $number_of_houses = 0;
                        $number_of_houses_to_rent = 0;
                        $number_of_users = 0;


                        $sql_1 = "SELECT * FROM house_table";
                        $house_table_1 = mysqli_query($connection, $sql_1);

                        while($row_1 = mysqli_fetch_assoc($house_table_1)){
                            $number_of_houses ++;
                        }


                        $sql_2 = "SELECT * FROM house_table WHERE buy_or_sale='0'";
                        $house_table_2 = mysqli_query($connection, $sql_2);

                        while($row_2 = mysqli_fetch_assoc($house_table_2)){
                            $number_of_houses_to_rent ++;
                        }


                        $sql_3 = "SELECT * FROM user_table";
                        $house_table_3 = mysqli_query($connection, $sql_3);

                        while($row_3 = mysqli_fetch_assoc($house_table_3)){
                            $number_of_users ++;
                        }
                    ?>


                    <h2><?php echo $number_of_houses ?><span>+</span>    <br>      <label>Houses</label></h2>
                    <h2><?php echo $number_of_houses_to_rent ?><span>+</span>    <br>      <label>Rentals</label></h2>
                    <h2><?php echo $number_of_users ?><span>+</span>    <br>      <label>Users</label></h2>
                </div>

                <div class="view_all_property">
                    <a href="explore_page/all_property_page.php"><p>All</p></a>
                    <a href="explore_page/featured_property_page.php"><p>Featured</p></a>
                    <a href="explore_page/latest_property_page.php"><p>Latest</p></a>
                </div>
            </div>

            <div class="fade_top"></div>
            <div class="fade_left"></div>
            <div class="fade_bottom"></div>

            <video autoplay loop muted>
                <source src="../assets/house_with_swimming_pool.mp4">
            </video>
        </main>
    </section>





    <!--Section 2-->
    <section class="section_2" id="section_2">
        <!--header-->
        <header>
            <div class="search_bar">
                <input type="search" placeholder="Search..." id="search_bar">
                <button onclick="search_bar()"><i class="fa-solid fa-search"></i></button>
                <p onclick="show_profile_card()"><i class="fa-solid fa-microphone"></i></p>
            </div>

            <div class="filter_on_off">
                <span onclick="slide_in()">on</span> <span onclick="slide_out()">off</span>
            </div>

            <div class="container_of_additional_inputs" id="container_of_additional_inputs">
                <div class="additional_inputs" id="additional_inputs">
                    <input type="number" placeholder="Price" min="0"  id="price" onkeyup="search_filter()">
                    <input type="text" placeholder="Location" id="location" onkeyup="search_filter()">
                    <input type="number" placeholder="Bedroom" min="0"  id="bedroom" onkeyup="search_filter()">
                    <input type="number" placeholder="Bathroom" min="0"  id="bathroom" onkeyup="search_filter()">
                    <input type="number" placeholder="Area" min="0" id="area" onkeyup="search_filter()">
                </div>
            </div>
        </header>
        

        <!--main-->
        <main id="main">
            <div class="top">
                <p>Property Listing</p>
                <p>Sorted by price</p>
            </div>
            
            <div class="cont">
            <div class="container">

            
                <?php
                    $sql_2 = "SELECT * FROM house_table ORDER BY house_price";
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
                            .section_2 main .container{
                                display: block;
                            }
                        </style>
                        <div class="style">No property to display yet</div><?php
                    }
                ?>
            </div>
            </div>
        </main>


        <!--fotter-->
        <footer>
            <div class="style" id="no_result"></div>
        </footer>
    </section>





    <!--Section 3-->
    <section class="section_3" id="section_3">
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




    <div class="voice_search">
        <div class="speech_to_text" id="speech_to_text">
            <h1>Voice Search</h1>

            <textarea id="textarea">

            </textarea>
            
            <p onclick="start_audio()"><i class="fa-solid fa-microphone"></i></p>

            <button type="reset" onclick="hide_profile_card()">Cancel</button>
        </div>
    </div>




    
    <script src="../js/all_page.js"></script>
</body>
</html>

<?php
    }
    else{
        header("Location: log_in_page.php?all_Page=2");
    }
?>