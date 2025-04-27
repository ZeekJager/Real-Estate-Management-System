<?php
    include ("../php/connection.php");
    session_start();

    $_SESSION['from_page'] = "index";
    $_SESSION['from_page_2'] = "index";
    $_SESSION['post_id'] = "not_set";
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/home_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <video autoplay loop muted>
        <source src="../assets/house_with_swimming_pool.mp4">
    </video>

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
                <a href="index.php">Home</a>
                <a href="all_page.php">All</a>
                <a href="buy_page.php">Buy</a>
                <a href="rent_page.php">Rent</a>
                <a href="post_page.php">Posts</a>
                <a href="log_in_page.php" style="position: static; border: solid blue; border-radius: 10px; padding: 5px 7px; transition: 1s;">LogIn</a>
            </nav>
        </header>

        <!--main-->
        <main>
            <h1>WELCOME!</h1>
            <h1><span>YOUR DREAM PROPERTIES</span></h1>
            <a href="explore_page/all_property_page.php">Explore</a>
        </main>
    </section>





    <!--Section 2-->
    <section class="section_2">
        <!--header-->
        <header>
            <img class="image_1" src="../assets/border_frame.png">
            <img class="image_2" src="../assets/corridor_of_a_house.jpg">
            <img class="image_3" src="../assets/fully_white_color_room.jpeg">
        </header>
        

        <!--main-->
        <main>
            <h1>Find a Place You Can Call Home</h1>
            <p>Our site exposes you to multiple houses with different styles and different designs uploades by different people.</p>

            <div>
                <p><img src="../assets/architecture_design_of_house.png" width="50px" height="50px">The Best House Designs</p>
                <p><img src="../assets/house_with_green_area.png" width="50px" height="50px">Beautiful Compounds</p>
                <p><img src="../assets/security_guard.png" width="50px" height="50px">Secured Houses</p>
                <p><img src="../assets/house_with_iron_gate.png" width="50px" height="50px">Desired Lifestyle</p>
            </div>

            <p>You can also upload a house you want to sell. By choosing our site you are choosing a lifestyle.</p>

            <div class="button">
                <a href="about_page.html">Our Service</a>
            </div>
        </main>
    </section>





    <!--Section 3-->
    <section class="section_3">
        <!--header-->
        <header>
            <h1>Latest Houses</h1>
            <h3>- Nice Homes and Great Prices -</h3>
        </header>
        

        <!--main-->
        <main id="main">


            <?php
                $sql_1 = "SELECT * FROM house_table ORDER BY house_id DESC";
                $house_table = mysqli_query($connection, $sql_1);
                
                if(mysqli_num_rows($house_table) > 0){
                    $i = 0;
                    while($row = mysqli_fetch_assoc($house_table)){

                        if($i > 5){
                            break;
                        }
                        $i++;
            ?>


            <div id="houses">
                <div class="image">
                    <img src="../z_databse_assets/<?php if(!empty($row['house_image'] || $row['house_image'] != "")){ echo $row['house_image']; } else{ echo "no_image.jpg"; } ?>">
                </div>

                <div id="details">
                    <h1><?php if(!empty($row['house_name'] || $row['house_name'] != "")){ echo $row['house_name']; } else{?> N/A <?php } ?></h1><br>
                    <p>ETB <?php if(!empty($row['house_price'] || $row['house_price'] != 0)){ echo $row['house_price']; } else{?> N/A <?php } ?></p>
                    <i class="fa-solid fa-location-dot"></i><p><?php if(!empty($row['house_location'] || $row['house_location'] != "")){ echo $row['house_location']; } else{?> N/A <?php } ?></p><br><br>
                    <i class="fa-solid fa-calendar-days"></i><p><?php if(empty($row['date']) || $row['date'] == "0000-00-00"){ ?> N/A <?php }else{ echo $row['date']; } ?></p><br><br>
                    <p><?php if(!empty($row['house_bedroom'] || $row['house_bedroom'] != 0)){ echo $row['house_bedroom']; } else{?> N/A <?php } ?> Bedroom | <?php if(!empty($row['house_bathroom'] || $row['house_bathroom'] != 0)){ echo $row['house_bathroom']; } else{?> N/A <?php } ?> Bathroom | <?php if(!empty($row['house_area'] || $row['house_area'] != 0)){ echo $row['house_area']; } else{?> N/A <?php } ?> m<sup>2</sup></p>
                    <a href="view_page/view_page.php?house_id=<?php echo $row['house_id']; ?>">View</a>
                </div>
            </div>


            <?php
                    }
                }
                else{
                    ?>
                    <script>
                        let main = document.getElementById("main");

                        function display_block(){
                            main.style.display = "block";
                        }

                        display_block();
                    </script>
                    <div class="style">No property to display yet</div><?php
                }
            ?>
        </main>
    </section>





    <!--Section 4-->
    <section class="section_4">
        <!--main-->
        <main>
            <div class="card_1">
                <p>The Best House Designs</p>
                <button id="buy_now_1">Explore</button>
            </div>


            <div class="card_2">
                <p>Beautiful Compound</p>
                <button id="buy_now_2">Explore</button>
            </div>


            <div class="card_3">
                <p>Secured Houses</p>
                <button id="buy_now_3">Explore</button>
            </div>


            <div class="card_4">
                <p>Desired LifeStyle</p>
                <button id="buy_now_4">Explore</button>
            </div>

            
            <div class="card_5">
                <p>Enjoy</p>
                <button id="buy_now_5">Explore</button>
            </div>
        </main>
    </section>





    <!--Section 5-->
    <section class="section_5">
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
                    <a href="https://www.twitter.com/ethiohomes5" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                    <a href="https://www.tiktok.com/@ethiohomes6" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </main>

        
        <footer>
            <hr>
            <p>Copyright © 2024. All Rights Reserved</p>
        </footer>
    </section>





    <script src="../js/home_page.js"></script>
</body>
</html>