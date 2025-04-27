<?php
    include ("../../php/connection.php");
    session_start();

    $_SESSION['from_page'] = "explore_page_featured";
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/explore_page/all_and_featured_and_latest_property_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <?php
        if($_SESSION['from_page_2'] == "index"){ ?>
            <a href="../index.php"><i class="fa-solid fa-arrow-left" style="color: white; position: absolute; top: 10px; left: 10px; z-index: 1;"></i></a> <?php
        }
        else if($_SESSION['from_page_2'] == "home_page"){ ?>
            <a href="../home_page.php"><i class="fa-solid fa-arrow-left" style="color: white; position: absolute; top: 10px; left: 10px; z-index: 1;"></i></a> <?php
        }
        else if($_SESSION['from_page_2'] == "all_page"){ ?>
            <a href="../all_page.php"><i class="fa-solid fa-arrow-left" style="color: white; position: absolute; top: 10px; left: 10px; z-index: 1;"></i></a> <?php
        }
    ?>
    <i class="fa-solid fa-xmark" style="cursor: pointer; display: none; color: white; position: absolute; top: 10px; left: 11%; transition: 1s; z-index: 1;" id="x_mark" onclick="hide_nav_bar()"></i>
    <i class="fa-solid fa-bars" style="cursor: pointer; color: white; position: absolute; top: 10px; left: 11%; transition: 1s; z-index: 1;" id="bar" onclick="show_nav_bar()"></i>




    
    <!--section 1-->
    <section class="section_1" id="section_1">
        <!--header-->
        <header>
            <p>Ethio<span>Homes</span></p>
        </header>


        <!--main-->
        <main>
            <a href="all_property_page.php"><p id="option"><i class="fa-solid fa-house"></i> All</p></a>
            <a href="featured_property_page.php"><p style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; background: #303030;" id="option"><i class="fa-solid fa-house-flag"></i> Featured</p></a>
            <a href="latest_property_page.php"><p id="option"><i class="fa-solid fa-house"></i> Latest</p></a>
        </main>
    </section>





    <section class="section_2" id="section_2">
        <!--header-->
        <header>
            <div class="search_bar">
                <input type="search" placeholder="Search..." id="search_bar">
                <button onclick="search_bar()"><i class="fa-solid fa-search"></i></button>
            </div>
        </header>


        <!--main-->
        <main id="main">
            <div class="top">
                <p>Property Listing</p>
                <p>Sorted by price</p>
            </div>

            <div class="container">


                <?php
                    $sql_1 = "SELECT * FROM house_table WHERE buy_or_sale='1' ORDER BY house_price";
                    $house_table = mysqli_query($connection, $sql_1);
                        
                    if(mysqli_num_rows($house_table) > 0){
                        while($row = mysqli_fetch_assoc($house_table)){
                            $house_uploader_id = $row['user_id'];

                            $sql_2 = "SELECT * FROM user_table WHERE user_id=$house_uploader_id";
                            $house_uploader = mysqli_query($connection, $sql_2);
                            $row_2 = mysqli_fetch_assoc($house_uploader);
                ?>


                <div class="houses" id="houses">
                    <div id="cards">
                        <div class="image">
                            <img src="../../z_databse_assets/<?php if(!empty($row['house_image'] || $row['house_image'] != "")){ echo $row['house_image']; } else{ echo "no_image.jpg"; } ?>">
                        </div>

                        <div id="details">
                            <h1><?php if(!empty($row['house_name'] || $row['house_name'] != "")){ echo $row['house_name']; } else{?> N/A <?php } ?></h1><br>
                            <p>ETB <?php if(!empty($row['house_price'] || $row['house_price'] != 0)){ echo $row['house_price']; } else{?> N/A <?php } ?></p>
                            <i class="fa-solid fa-location-dot"></i><p><?php if(!empty($row['house_location'] || $row['house_location'] != "")){ echo $row['house_location']; } else{?> N/A <?php } ?></p><br><br>
                            <i class="fa-solid fa-calendar-days"></i><p><?php if(empty($row['date']) || $row['date'] == "0000-00-00"){ ?> N/A <?php }else{ echo $row['date']; } ?></p><br><br>
                            <p><?php if(!empty($row['house_bedroom'] || $row['house_bedroom'] != 0)){ echo $row['house_bedroom']; } else{?> N/A <?php } ?> Bedroom | </p>
                            <p><?php if(!empty($row['house_bathroom'] || $row['house_bathroom'] != 0)){ echo $row['house_bathroom']; } else{?> N/A <?php } ?> Bathroom | </p>
                            <p><?php if(!empty($row['house_area'] || $row['house_area'] != 0)){ echo $row['house_area']; } else{?> N/A <?php } ?> m<sup>2</sup></p>
                            <a href="../view_page/view_page.php?house_id=<?php echo $row['house_id']; ?>">View</a>
                        </div>
                    </div>

                    <div class="description">
                        <a href="../view_page/profile_view_page.php?user_id=<?php echo $row_2['user_id']?>"><img src="../../z_databse_assets/<?php if(!empty($row_2['user_image'] || $row_2['user_image'] != "")){ echo $row_2['user_image']; } else{ echo "user_profile_icon.png"; } ?>" width="30" height="30"></a>
                        <p><?php if(!empty($row['house_name'] || $row['house_name'] != "")){ echo $row['house_name']; } else{?> N/A <?php } ?></p>
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
        </main>




        <!--fotter-->
        <footer>
            <div class="no_result" id="no_result"></div>
        </footer>
    </section>


    


    <script src="../../js/explore_page/all_and_featured_and_latest_property_page.js"></script>
</body>
</html>