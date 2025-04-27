<?php 
    include ("../../php/connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];
    
    if(isset($_SESSION['user_id'])){
        $sql_notifications = "UPDATE house_review SET viewed='1'";
        $update_notifications_as_viewed = mysqli_query($connection, $sql_notifications);
        $_SESSION['number_of_notifications'] = 0;
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/user_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
<style>
.display .down.notifications_down{
    display: flex;
    justify-content: start;
    position: absolute;
    bottom: 0;
    border-radius: 15px;
    width: 100%;
    height: 50px;
    padding: 10px;
    background: white;
    overflow-y: scroll;
    ms-overflow-style: none;
    scrollbar-width: none;
    transition: 1s;
}

.display .down.notifications_down::-webkit-scrollbar{
    display: none;
}

.display .down.notifications_down:hover{
    height: 480px;
}

.display .down.notifications_down .list{
    display: flex;
    border-bottom: 1px solid gray;
    width: 720px;
    height: 70px;
    padding: 10px;
    overflow: hidden;
    transform: translateY(1000%);
    transition: 1s;
}

.display .down.notifications_down:hover .list{
    transform: translateY(0);
}

.display .down.notifications_down .list img{
    cursor: pointer;
    border-radius: 100px;
    margin: 0;
    margin-right: 5px;
}

.display .down.notifications_down .list img:hover{
    transform: scale(1.09);
}

.display .down.notifications_down .list p{
    color: gray;
    font-size: 12px;
    font-weight: 400;
}

.display .down.notifications_down .list p span{
    color: gray;
    margin-left: 20px;
}

.display .down.notifications_down .list p:first-of-type{
    color: blue;
    font-weight: 600;
}
</style>
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
            <div><a href="profile_page.php"><i class="fa-solid fa-user"></i>                                         <span id="option_labels">Profile</span></a></div>
            <div><a href="update_page.php"><i class="fas fa-user-edit navigation-icon"></i>                          <span id="option_labels">Update</span></a></div>
            <div><a href="upload_page.php"><i class="fa-solid fa-upload"></i>                                        <span id="option_labels">Upload</span></a></div>
            <div><a href="houses_page.php"><i class="fa-solid fa-house"></i>                                         <span id="option_labels">Houses</span></a></div>
            <div><a href="notification_page.php"><i class="fa-solid fa-bell"></i>                                    <span id="option_labels">Notifications</span></a></div>
            <div><a href="post_page.php"><i class="fa-solid fa-cloud"></i>                                           <span id="option_labels">Post</span></a></div>
            <div><a href="../../php/user_page/log_out.php"><i class="fa-solid fa-right-from-bracket" style="transform: rotate(-180deg);"></i>       <span id="option_labels">Logout</span></a></div>
        </div>
    </header>





    <!--main-->
    <main>
        <!--notifications_container-->
            <div class="display">
                <h1>Notifications</h1>

                <?php
                    $sql3 = "SELECT * FROM user_table WHERE user_id = '$user_id'";
                    $user_table = mysqli_query($connection, $sql3);
                    $row = mysqli_fetch_assoc($user_table);                   
                ?>

                <div class="info">
                    <img src="../../assets/two_people_uploading_a_file.png" width="160" height="100">
                    <p>Hey there, <span><?php if(empty($row['first_name']) && empty($row['last_name'])){ echo "N/A"; }else{ echo $row['first_name']." ".$row['last_name']; } ?></span></p>
                    <p>Check all of your likes, reviews and comments. Just hover on the card below</p>

                    <div class="socials">
                    <a href="https://www.facebook.com/ethiohomes5" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.twitter.com/ethiohomes5" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                    <a href="https://www.tiktok.com/@ethiohomes6" target="_blank"><i class="fa-brands fa-tiktok"></i></a><br>
                    </div>


                    <div class="down notifications_down">
                        <?php
                            $sql4 = "SELECT * FROM house_review WHERE to_user_id = '$user_id' ORDER BY id DESC";
                            $table =  mysqli_query($connection, $sql4);

                            if($table -> num_rows > 0){
                                while($row0 = mysqli_fetch_assoc($table)){
                                    $from_user_id = $row0['from_user_id'];
                                    $house_id = $row0['house_id'];

                                    $sql5 = "SELECT * FROM user_table WHERE user_id = '$from_user_id'";
                                    $user_table = mysqli_query($connection, $sql5);
                                    $row = mysqli_fetch_assoc($user_table);

                                    $sql6 = "SELECT * FROM house_table WHERE house_id = '$house_id'";
                                    $house_table = mysqli_query($connection, $sql6);
                                    $row1 = mysqli_fetch_assoc($house_table);
                        ?>


                        <div class="list">
                            <?php
                                if($row0['house_review'] != ""){
                            ?>
                            
                            <a href="../view_page/profile_view_page.php?user_id=<?php echo $row['user_id']?>"><img src="../../z_databse_assets/<?php if($row['user_image']){ echo $row['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="30" height="30"></a>
                            
                            <div>
                                <p><?php echo $row['user_name']; ?><span><?php echo $row0['date']; ?></span></p>
                                <p><?php echo $row0['house_review']; ?><span>on house:- <?php echo $row1['house_name']; ?></span></p>
                            </div>

                            <?php
                                }
                            ?>
                        </div>

                
                        <?php
                                }
                            }
                            
                            else{ ?>
                                <style>
                                .down.notifications_down{
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }
                                </style>

                                <div style="color: blue; font-weight: 600;">No notifications yet</div><?php
                            }
                        ?>
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