<?php
    include ("../../php/connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/user_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <a href="houses_page.php"><i class="fa-solid fa-arrow-left" style="color: blue; position: absolute; top: 30px; left: 30px; z-index: 1;"></i></a>
    
    
    
    
    
    <!--for_sale_houses_display-->
    <div class="container" id="for_sale">
        <div class="style">
            <div class="display">
                <h1>Your houses for <span>sale</span></h1>


                <div class="search">
                    <input type="search" id="search_bar">
                    <button onclick="search_bar()">Search</button>
                </div>

                    
                <div class="buttons">
                    <a href="houses_for_rent.php"><button>Go to rent</button></a>
                </div>

                
                <?php
                    if(isset($_GET['house_deleted'])){
                        ?><div style="color: lightgreen; font-weight: 600; text-align: center;">House deleted successfully</div><?php
                    }
                ?>


                <div class="houses_container1" id="houses_container1">


                    <?php
                        $sql_1 = "SELECT * FROM house_table WHERE buy_or_sale='1' AND user_id = '$user_id' ORDER BY house_price";
                        $buy_table = mysqli_query($connection, $sql_1);
                                
                        if($buy_table -> num_rows > 0){
                            while($row = mysqli_fetch_assoc($buy_table)){
                    ?>


                    <div class="houses" id="houses">
                        <div class="image">
                            <img src="../../z_databse_assets/<?php if($row['house_image']){ echo $row['house_image']; }else{ echo "no_image.jpg"; }?>" width="100%" height="250px" alt="Image unavalible">
                        </div>


                        <div class="details">
                            <h4><?php if(empty($row['house_name']) || $row['house_name'] == ""){ ?> N/A <?php }else{ echo $row['house_name']; } ?></h4>
                            <i class="fa-solid fa-location-dot"></i><p><?php if(empty($row['house_location']) || $row['house_location'] == ""){ ?> N/A <?php }else{ echo $row['house_location']; } ?></p><br>
                            <p>ETB <?php if(empty($row['house_price']) || $row['house_price'] == 0){ ?> N/A <?php }else{ echo $row['house_price']; } ?></p><br>
                            <i class="fa-solid fa-calendar-days"></i><p><?php if(empty($row['date']) || $row['date'] == "0000-00-00"){ ?> N/A <?php }else{ echo $row['date']; } ?></p><br><br>
                            <p><?php if(empty($row['house_bedroom']) || $row['house_bedroom'] == 0){ ?> N/A <?php }else{ echo $row['house_bedroom']; } ?> Bedroom | </p>
                            <p><?php if(empty($row['house_bathroom']) || $row['house_bathroom'] == 0){ ?> N/A <?php }else{ echo $row['house_bathroom']; } ?> Bathroom | </p>
                            <p><?php if(empty($row['house_area']) || $row['house_area'] == 0){ ?> N/A <?php }else{ echo $row['house_area']; } ?> m<sup>2</sup></p>
                        </div>


                        <div class="slide">
                            <div>
                                <p><i class="fa-solid fa-star"></i><?php echo $row['house_rating'] ?></p>
                                <p><i class="fa-solid fa-comments"></i><?php echo $row['house_review_number'] ?></p>
                            </div>
                                
                            <a href="../../php/user_page/update_buy_house.php?house_id=<?php echo $row['house_id']; ?>" name="update">Update</a>
                            <a href="../../php/user_page/delete_buy_house.php?house_id=<?php echo $row['house_id']; ?>" name="delete">Delete</a>
                        </div>
                    </div>


                    <?php
                            }
                        }
                        else{ ?>
                            <style>
                                .houses_container1{
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    height: 300px;
                                }
                            </style>

                            <div style="color: blue; font-weight: 600;">You did dot upload any house for sale</div><?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div>
        <p id="no_result" style="color: blue; font-weight: 600; text-align: center;"></p>
    </div>





    <script src="../../js/user_page.js"></script>
</body>
</html>