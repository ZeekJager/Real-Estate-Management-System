<?php
    include ("../../php/connection.php");
    session_start();

    if(isset($_GET['house_id'])){
        $house_id = $_GET['house_id'];

        if(isset($_SESSION['user_id'])){
            $from_user_id = $_SESSION['user_id'];
        }
    }
    $_SESSION['house_id'] = $house_id;
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/view_page/view_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body id="body">
    <?php
        if($_SESSION['from_page'] == "index"){ ?>
            <a href="../index.php" id="arrow"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 10px; left: 10px; transition: 1s;"></i></a>
            <?php
        }
        else if($_SESSION['from_page'] == "home_page"){ ?>
            <a href="../home_page.php" id="arrow"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 10px; left: 10px; transition: 1s;"></i></a>
            <?php
        }
        else if($_SESSION['from_page'] == "all_page"){ ?>
            <a href="../all_page.php" id="arrow"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 10px; left: 10px; transition: 1s;"></i></a>
            <?php
        }
        else if($_SESSION['from_page'] == "buy_page"){ ?>
            <a href="../buy_page.php" id="arrow"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 10px; left: 10px; transition: 1s;"></i></a>
            <?php
        }
        else if($_SESSION['from_page'] == "rent_page"){ ?>
            <a href="../rent_page.php" id="arrow"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 10px; left: 10px; transition: 1s;"></i></a>
            <?php
        }
        else if($_SESSION['from_page'] == "explore_page_all"){ ?>
            <a href="../explore_page/all_property_page.php" id="arrow"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 10px; left: 10px; transition: 1s;"></i></a>
            <?php
        }
        else if($_SESSION['from_page'] == "explore_page_featured"){ ?>
            <a href="../explore_page/featured_property_page.php" id="arrow"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 10px; left: 10px; transition: 1s;"></i></a>
            <?php
        }
        else if($_SESSION['from_page'] == "explore_page_latest"){ ?>
            <a href="../explore_page/latest_property_page.php" id="arrow"><i class="fa-solid fa-arrow-left" style="color: #00082c; position: absolute; top: 10px; left: 10px; transition: 1s;"></i></a>
            <?php
        }
    ?>
    

    <div class="div_top" id="div_top" onclick="scale_image_down()"></div>
    <div class="div_top_2" id="div_top_2" onclick="scale_rating_box_down()"></div>




    
    <div class="rating" id="rating">
        <h1>Give Rating</h1>

        <form action="../../php/view_page/rating_recording.php?house_id=<?php echo $house_id; ?>" method="post">
            <p>
                <input type="radio" id="rating1" name="rating" value="1" style="display: none;">
                <input type="radio" id="rating2" name="rating" value="2" style="display: none;">
                <input type="radio" id="rating3" name="rating" value="3" style="display: none;">
                <input type="radio" id="rating4" name="rating" value="4" style="display: none;">
                <input type="radio" id="rating5" name="rating" value="5" style="display: none;">
                <label for="rating1"><i class="fa-regular fa-star" style="cursor: pointer; font-size: 30px; margin-right: 5px;" id="rating_1" onclick="rating_11()"></i></label>
                <label for="rating2"><i class="fa-regular fa-star" style="cursor: pointer; font-size: 30px; margin-right: 5px;" id="rating_2" onclick="rating_22()"></i></label>
                <label for="rating3"><i class="fa-regular fa-star" style="cursor: pointer; font-size: 30px; margin-right: 5px;" id="rating_3" onclick="rating_33()"></i></label>
                <label for="rating4"><i class="fa-regular fa-star" style="cursor: pointer; font-size: 30px; margin-right: 5px;" id="rating_4" onclick="rating_44()"></i></label>
                <label for="rating5"><i class="fa-regular fa-star" style="cursor: pointer; font-size: 30px; margin-right: 5px;" id="rating_5" onclick="rating_55()"></i></label>
            </p>
            
            <div>
                <button type="submit" name="rate">Rate</button>
                <button type="reset" onclick="scale_rating_box_down()">Cancel</button>
            </div>
        </form>
    </div>





    <!--header-->
    <header>

        
        <?php
            $sql_1 = "SELECT * FROM house_table WHERE house_id='$house_id'";
            $image_table = mysqli_query($connection, $sql_1);

            while($row_1 = mysqli_fetch_assoc($image_table)){
        ?>


        <!--image-->
        <div class="images" id="images" onclick="scale_image_up()">
            <img class="arrow_left" src="../../assets/white_arrow_left.png" width="30" height="30">
            <img class="house_images" src="../../z_databse_assets/<?php if($row_1['image_1']){ echo $row_1['image_1']; } else{ echo "no_image.jpg"; } ?>">
            <img class="arrow_right" src="../../assets/white_arrow_right.png" width="30" height="30">
        </div>

        <script>
            let house_images = document.querySelector('.house_images');
            let arrow_left = document.querySelector('.arrow_left');
            let arrow_right = document.querySelector('.arrow_right');
            let id = 0;

            
            let images = [];
            <?php if($row_1['image_1']){?>
                images[0] = "<?php echo $row_1['image_1']; ?>";
            <?php } ?>

            <?php if($row_1['image_2']){?>
                images[1] = "<?php echo $row_1['image_2']; ?>";
            <?php } ?>

            <?php if($row_1['image_3']){?>
                images[2] = "<?php echo $row_1['image_3']; ?>";
            <?php } ?>

            <?php if($row_1['image_4']){?>
                images[3] = "<?php echo $row_1['image_4']; ?>";
            <?php } ?>

            <?php if($row_1['image_5']){?>
                images[4] = "<?php echo $row_1['image_5']; ?>";
            <?php } ?>


            arrow_left.addEventListener('click', ()=>{
                id--;

                if(id < 0){
                    id = images.length - 1;
                }

                slide(id);
            });

            arrow_right.addEventListener('click', ()=>{
                id++;

                if(id > images.length - 1){
                    id = 0;
                }

                slide(id);
            });


            function slide(id){
                house_images.setAttribute('src', `../../z_databse_assets/${images[id]}`);

                // house_images.classList.add('image_fade');
                // setTimeout(()=>{
                //     house_images.classList.remove('image_fade');
                // }, 1000);
            }

        </script>


        <?php
            }
        ?>


        <!--review box-->
        <div class="review_section" id="review_section">
            <div class="top">
                <p>Reviews</p>
                <p><i class="fa-solid fa-xmark" id="x_button" onclick="hide_review_section()"></i></p>
            </div>

            <!--review area-->
            <div class="reviews">


                <?php
                    $sql_review = "SELECT * FROM house_review WHERE house_id='$house_id' ORDER BY id DESC";
                    $review_table = mysqli_query($connection, $sql_review);
                    
                    if(mysqli_num_rows($review_table) > 0){
                        while($row_review = mysqli_fetch_assoc($review_table)){
                            $from_user_id_1 = $row_review['from_user_id'];

                            $sql_user = "SELECT * FROM user_table WHERE user_id='$from_user_id_1'";
                            $user_table = mysqli_query($connection, $sql_user);
                            $row_user = mysqli_fetch_assoc($user_table);
                ?>


                <!--single review container-->
                <div class="review">
                    <img src="../../z_databse_assets/<?php if($row_user['user_image']){ echo $row_user['user_image']; } else{ echo "user_profile_icon.png"; } ?>" width="30" height="30">

                    <div>
                        <p><?php echo $row_user['user_name']; ?></p>
                        <p><?php if(!empty($row_review['house_review']) || $row_review['house_review'] != ""){ echo $row_review['house_review']; }else{ echo "N/A"; } ?></p>
                    </div>
                </div>


                <?php
                        }
                    }
                    else{
                        ?><div class="style">No reviews yet</div><?php
                    }
                ?>
            </div>


            <!--review typing container-->
            <div class="type_review">
                <form action="../../php/view_page/review_recording.php?house_id=<?php echo $house_id ?>" method="post">
                    <input type="text" placeholder="Give a review..." name="house_review">
                    <button type="submit" name="submit"></button>
                </form>
            </div>
        </div>
    </header>





    <!--main-->
    <main id="main">

            
        <?php
            $sql_2 = "SELECT * FROM house_table WHERE house_id='$house_id'";
            $house_table = mysqli_query($connection, $sql_2);

            $row_2 = mysqli_fetch_assoc($house_table);
            $house_name = $row_2['house_name'];
            $house_price = $row_2['house_price'];
            $house_location = $row_2['house_location'];
            $to_user_id = $row_2['user_id'];
            
            $_SESSION['house_id'] = $house_id;
            $_SESSION['house_price'] = $house_price;
            $_SESSION['to_user_id'] = $to_user_id;

            $sql_rating = "SELECT * FROM house_rating_table WHERE from_user_id='$from_user_id' AND house_id='$house_id'";
            $house_rating = mysqli_query($connection, $sql_rating);
            $row_rating = mysqli_fetch_assoc($house_rating);
            
            $rating = 1;
            if(mysqli_num_rows($house_rating) > 0){
                $rating = 0;
            }
        ?>


        <div class="stat">
            <span><?php if($rating == 1){ ?><i class="fa-regular fa-star" style="filter: drop-shadow(5px 5px 5px black);" onclick="scale_rating_box_up()"></i><?php }else{ ?> <i class="fa-solid fa-star" style="color: yellow; filter: drop-shadow(5px 5px 5px black);"></i><?php } if(!empty($row_2['house_rating']) || $row_2['house_rating'] != 0){ echo $row_2['house_rating']; }else{ echo "No Rating"; } ?></span>
            <span><i class="fa-solid fa-comments" onclick="show_review_section()"></i><?php if(!empty($row_2['house_review_number']) || $row_2['house_review_number'] != 0){ echo $row_2['house_review_number']; }else{ echo "No Reviews"; } ?></span>
        </div>
        

        <p><img src="../../assets/<?php if($row_2['house_status'] == 1){ echo "green_circle.png"; }else{ echo "red_circle.png"; } ?>" width="30" height="30"><?php if(!empty($row_2['house_name']) || $row_2['house_name'] != 0){ echo $row_2['house_name']; }else{ echo "N/A"; } ?></p>
        <p>ETB <?php if(!empty($row_2['house_price']) || $row_2['house_price'] != 0){ echo $row_2['house_price']; }else{ echo "N/A"; } ?></p>
        <p><?php if(!empty($row_2['house_bedroom']) || $row_2['house_bedroom'] != 0){ echo $row_2['house_bedroom']; }else{ echo "N/A"; } ?> Bedroom | <?php if(!empty($row_2['house_bathroom']) || $row_2['house_bathroom'] != 0){ echo $row_2['house_bathroom']; }else{ echo "N/A"; } ?> Bathroom |  <?php if(!empty($row_2['house_area']) || $row_2['house_area'] != 0){ echo $row_2['house_area']; }else{ echo "N/A"; } ?>m<sup>2</sup></p>

        <div class="location_and_date">
            <span><i class="fa-solid fa-location-dot"></i> <?php if(!empty($row_2['house_location']) || $row_2['house_location'] != ""){ echo $row_2['house_location']; }else{ echo "N/A"; } ?></span>
            <span><i class="fa-solid fa-calendar-days"></i> <?php if(empty($row_2['date']) || $row_2['date'] == "0000-00-00"){ echo "N/A"; }else{ echo $row_2['date']; } ?></span>
        </div>

        <div class="buttons">
            <a href="profile_view_page.php?user_id=<?php echo $to_user_id ?>"><i class="fa-solid fa-user"></i>Saler</a>
            <a href="chat_page.php?to_user_id=<?php echo $to_user_id ?>"><i class="fa-solid fa-comment"></i>Chat</a>
            <a href="payment_page.php?house_price=<?php echo $house_price ?>"><i class="fa-solid fa-house"></i><?php if($row_2['buy_or_sale'] == 1){ echo "Buy";  $_SESSION['buy_or_sale'] = 1; }else{ echo "Rent";  $_SESSION['buy_or_sale'] = 0; } ?></a>
        </div>
    </main>





    <!--footer-->
    <footer id="footer">
        <div class="top">
            <p>Related Properties</p>
            <p>Sorted By Price</p>
        </div>


        <div class="container">

            
                <?php
                    $sql_3 = "SELECT * FROM house_table WHERE house_name REGEXP '$house_name' OR house_price REGEXP '$house_price' OR house_location REGEXP '$house_location' ORDER BY house_price";
                    $house_table = mysqli_query($connection, $sql_3);
                    $row = mysqli_fetch_assoc($house_table);

                    
                    if(mysqli_num_rows($house_table) > 1){
                        while($row_3 = mysqli_fetch_assoc($house_table)){
                            if($row_3['house_id'] == $house_id){
                                continue;
                            }
                ?>


                <div class="houses">
                    <div class="image">
                        <img src="../../z_databse_assets/<?php if(!empty($row_3['house_image'] || $row_3['house_image'] != "")){ echo $row_3['house_image']; } else{ echo "no_image.jpg"; } ?>">
                    </div>

                    <div class="details">
                        <h1><?php if(!empty($row_3['house_name'] || $row_3['house_name'] != "")){ echo $row_3['house_name']; } else{?> N/A <?php } ?></h1><br>
                        <p>ETB <?php if(!empty($row_3['house_price'] || $row_3['house_price'] != 0)){ echo $row_3['house_price']; } else{?> N/A <?php } ?></p>
                        <i class="fa-solid fa-location-dot"></i><p><?php if(!empty($row_3['house_location'] || $row_3['house_location'] != "")){ echo $row_3['house_location']; } else{?> N/A <?php } ?></p><br><br>
                        <i class="fa-solid fa-calendar-days"></i><p><?php if(empty($row_3['date']) || $row_3['date'] == "0000-00-00"){ ?> N/A <?php }else{ echo $row_3['date']; } ?></p><br><br>
                        <p><?php if(!empty($row_3['house_bedroom'] || $row_3['house_bedroom'] != 0)){ echo $row_3['house_bedroom']; } else{?> N/A <?php } ?> Bedroom | </p>
                        <p><?php if(!empty($row_3['house_bathroom'] || $row_3['house_bathroom'] != 0)){ echo $row_3['house_bathroom']; } else{?> N/A <?php } ?> Bathroom | </p>
                        <p><?php if(!empty($row_3['house_area'] || $row_3['house_area'] != 0)){ echo $row_3['house_area']; } else{?> N/A <?php } ?> m<sup>2</sup></p>
                        <a href="../view_page/view_page.php?house_id=<?php echo $row_3['house_id']; ?>">View</a>
                    </div>
                </div>


                <?php
                        }
                    }
                    else{
                        ?>
                        <style>
                            footer .container{
                                display: block;
                            }
                        </style>

                        <div class="style">No related properties yet</div><?php
                    }
                ?>
            </div>
    </footer>





    <script src="../../js/view_page/view_page.js"></script>
</body>
</html>