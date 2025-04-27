<?php
    include ("../php/connection.php");
    session_start();

    if(isset($_SESSION['user_id'])){
        $from_user_id = $_SESSION['user_id'];


        $sql_count = "SELECT * FROM post_table";
        $post_table_count = mysqli_query($connection, $sql_count);

        $id = [];
        $count = 0;
        if(mysqli_num_rows($post_table_count) > 0){
            while($row_count = mysqli_fetch_assoc($post_table_count)){
                $id[$count] = $row_count['post_id'];
                $count++;
            }


            if($_SESSION['id'] < 0){
                $_SESSION['id'] = $count - 1;
                $post_id = $id[$_SESSION['id']];
            }
            else if($_SESSION['id'] > ($count - 1)){
                $_SESSION['id'] = 0;
                $post_id = $id[$_SESSION['id']];
            }
            else{
                $post_id = $id[$_SESSION['id']];
            }
        }

        
        if(isset($_GET['post_id'])){
            $post_id = $_GET['post_id'];
        }
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/post_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <!--section 1-->
    <div class="section_1">
        <!--nav-->
        <nav>
            <p><a href="home_page.php"><i class="fa-solid fa-house"></i> <span>Home</span></a></p>
            <p><a href="all_page.php"><i class="fa-solid fa-house"></i> <span>All</span></a></p>
            <p><a href="buy_page.php"><i class="fa-solid fa-house"></i> <span>Buy</span></a></p>
            <p><a href="rent_page.php"><i class="fa-solid fa-house"></i> <span>Rent</span></a></p>
        </nav>
    </div>




    
    <!--section 2-->
    <div class="section_2">
        <!--header-->
        <header>
            <div style="visibility: hidden;">
                <p>visibility hidden</p>
            </div>

            <div class="search_bar">
                <form action="../php/post_page/search.php" method="post">
                    <input type="search" placeholder="Search..." name="search_input">
                    <button type="submit" name="search_button"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>


            <?php
                $sql_user = "SELECT * FROM user_table WHERE user_id='$from_user_id'";
                $users_table = mysqli_query($connection, $sql_user);
                $row_user = mysqli_fetch_assoc($users_table);
            ?>


            <div class="user_image">
                <a href="../php/post_page/post_profile_page.php?user_id=<?php echo $from_user_id; ?>"><img src="../z_databse_assets/<?php if($row_user['user_image']){ echo $row_user['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="30" height="30"></a>
            </div>
        </header>

        
        <!--main-->
        <main>
            <div class="arrows">
                <p class="arrow_up" onclick="arrow_up()"><i class="fa-solid fa-arrow-up"></i></p>
                <p class="arrow_down" onclick="arrow_down()"><i class="fa-solid fa-arrow-down"></i></p>
            </div>


            <script>
                function arrow_up(){
                    window.open("../php/post_page/arrow_up.php", "_self");
                }

                function arrow_down(){
                    window.open("../php/post_page/arrow_down.php", "_self");
                }
            </script>


            <?php
                if(!isset($post_id)){
                    $post_id = 0;
                }


                $sql = "SELECT * FROM post_table WHERE post_id='$post_id'";
                $post_table = mysqli_query($connection, $sql);
                
                if(mysqli_num_rows($post_table) != 0){
                    $row = mysqli_fetch_assoc($post_table);
                    $_SESSION['post_id'] = $row['post_id'];
                    $post_id = $row['post_id'];
                    $user_id = $row['user_id'];

                    $sql_2 = "SELECT * FROM user_table WHERE user_id='$user_id'";
                    $user_table = mysqli_query($connection, $sql_2);
                    $row_2 = mysqli_fetch_assoc($user_table);
            ?>


            <!--video container-->
            <div class="video_container">
                <div class="comment_section" id="comment_section">
                    <div class="top">
                        <p>Comments</p>
                        <p><i class="fa-solid fa-xmark" onclick="hide_comment_section()"></i></p>
                    </div>

                    <div class="comment_area">
                        <?php
                            $sql_comments = "SELECT * FROM post_comment_table WHERE post_id='$post_id'";
                            $post_comments = mysqli_query($connection, $sql_comments);

                            if(mysqli_num_rows($post_comments) > 0){
                                while($row_comments = mysqli_fetch_assoc($post_comments)){
                                    $from = $row_comments['from_user_id'];

                                    $sql_commenter = "SELECT * FROM user_table WHERE user_id='$from'";
                                    $commenter_table = mysqli_query($connection, $sql_commenter);
                                    $row_commenter = mysqli_fetch_assoc($commenter_table);
                        ?>


                        <div class="comment">
                            <img src="../z_databse_assets/<?php if($row_commenter['user_image']){ echo $row_commenter['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="30" height="30">

                            <div>
                                <p><?php echo $row_commenter['user_name'] ?></p>
                                <p><?php echo $row_comments['comment'] ?></p>
                            </div>
                        </div>


                        <?php
                                }
                            }
                            else{ ?>
                                <style>
                                    .comment_area{
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        overflow: hidden;
                                    }
                                </style>
            
                                <div style="color: white; font-weight: 600;">No comments yet</div> <?php
                            }
                        ?>
                    </div>

                    <div class="typing_area">
                        <form action="../php/post_page/comment_recording.php?to_user_id=<?php echo $user_id; ?>" method="post">
                            <input type="text" placeholder="comment..." name="comment">
                            <button type="submit" name="send">Send</button>
                        </form>
                    </div>
                </div>


                <div class="video" id="video">
                    <video autoplay loop controls width="100" height="100">
                        <source src="../z_databse_assets/<?php echo $row['video']; ?>">
                    </video>

                    <div class="video_details">
                        <a href="../php/post_page/post_profile_page.php?user_id=<?php echo $user_id; ?>"><img src="../z_databse_assets/<?php if($row_2['user_image']){ echo $row_2['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="30" height="30"></a>
                        <p><?php echo $row['video_title']; ?></p>
                    </div>
                </div>


                <div class="stat">
                    <?php
                        $sql_like_checker = "SELECT * FROM post_like_table WHERE from_user_id='$from_user_id' AND post_id='$post_id'";
                        $post_like_table = mysqli_query($connection, $sql_like_checker);
                    ?>


                    <p><?php if(mysqli_num_rows($post_like_table) > 0){ ?> <a href="../php/post_page/remove_like_recording.php?to_user_id=<?php echo $user_id; ?>"><i class="fa-solid fa-heart" style="color: red;"></i></a> <?php }else{ ?> <a href="../php/post_page/like_recording.php?to_user_id=<?php echo $user_id; ?>"><i class="fa-solid fa-heart"></i></a> <?php } ?><span><?php echo $row['number_of_likes']; ?></span></p>
                    <p><i class="fa-solid fa-comments" onclick="show_comment_section()"></i><span><?php echo $row['number_of_comments']; ?></span></p>
                    <p><i class="fa-solid fa-ellipsis-vertical"></i></p>
                </div>
            </div>


            <?php
                }
                else{ ?>
                    <style>
                        .section_2 main{
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }
                    </style>

                    <div style="color: #00082c; font-weight: 600;">No videos yet</div> <?php
                }
            ?>
        </main>
    </div>
    




    <script src="../js/post_page.js"></script>
</body>
</html>

<?php
    }
    else{
        header("Location: log_in_page.php?post_page=2");
    }
?>