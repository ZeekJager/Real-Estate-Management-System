<?php
    include ("../../php/connection.php");
    session_start();

    if(isset($_SESSION['user_id'])){
        $from_user_id = $_SESSION['user_id'];
    }
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/view_page/chat_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
</head>
<body>
    <a href="view_page.php?house_id=<?php echo $_SESSION['house_id']; ?>"><i class="fa-solid fa-arrow-left" style="position: absolute; top: 10px; left: 10px; color: white; z-index: 1;"></i></a>
    
    
    
    
    
    <header>
        <secttion class="users">
            <div class="top">


                <?php
                    $sql_1 = "SELECT * FROM user_table WHERE user_id='$from_user_id'";
                    $user_table = mysqli_query($connection, $sql_1);
                    $row_1 = mysqli_fetch_assoc($user_table);
                ?>


                <div class="content">
                <img src="../../z_databse_assets/<?php if($row_1['user_image']){ echo $row_1['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="50" height="50">
                    
                    <div class="details">
                        <span><?php echo $row_1['user_name'] ?></span>
                        <p>Online</p>
                    </div>
                </div>
            </div>


            <div class="search">
                <span class="text">Select a user below</span>
                <input type="text" placeholder="Search User..." id="search_bar" onkeyup="search_user()">
                <button> <i class="fa-solid fa-search"></i> </button>
            </div>


            <div class="users_list">


                <?php
                    $sql_2 = "SELECT * FROM user_table";
                    $user_table_2 = mysqli_query($connection, $sql_2);
                    
                    if(mysqli_num_rows($user_table_2) > 0){
                        while($row_2 = mysqli_fetch_assoc($user_table_2)){
                            if($row_2['user_id'] == $from_user_id){
                                continue;
                            }
                            $receiver_id = $row_2['user_id'];

                            $sql_last_msg = "SELECT * FROM chat_table WHERE from_user_id='$from_user_id' AND to_user_id='$receiver_id' OR from_user_id='$receiver_id' AND to_user_id='$from_user_id' ORDER BY id DESC";
                            $last_msg = mysqli_query($connection, $sql_last_msg);
                            $row_last_msg = mysqli_fetch_assoc($last_msg);
                ?>


                <a href="chat_page.php?to_user_id=<?php echo $row_2['user_id'] ?>" id="users">
                    <div class="content">
                    <img src="../../z_databse_assets/<?php if($row_2['user_image']){ echo $row_2['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="30" height="30">

                        <div class="details">
                            <span><?php echo $row_2['user_name'] ?></span>

                            <?php
                                if(mysqli_num_rows($last_msg) > 0){ ?>
                                    <p> <?php if(!empty($row_last_msg['message']) || $row_last_msg['message'] != ""){ echo $row_last_msg['message']; }else{ echo "No message yet"; } ?></p> <?php
                                }
                                else{ ?>
                                    <p>No message</p> <?php
                                }
                            ?>
                        </div>
                    </div>

                    <div class="status_dot" id="status_dot"><?php if($row_2['user_online'] == 1){  echo "<i class='fa-solid fa-circle'></i>"; }else{ echo "<i class='fa-solid fa-circle' style='color: gray;'></i>"; } ?></div>
                </a>


                <?php
                        }
                    }
                    else{ ?>
                        <div class="style">No users yet</div> <?php
                    }
                ?>
            </div>
        </secttion>
    </header>





    <main>
        <section class="chat_area">


            <?php
                if(isset($_GET['to_user_id'])){
                    $to_user_id = $_GET['to_user_id'];
            ?>


            <div class="top">

                <?php
                    $sql_3 = "SELECT * FROM user_table WHERE user_id = '$to_user_id'";
                    $user_table_3 = mysqli_query($connection, $sql_3);
                    $row_3 = mysqli_fetch_assoc($user_table_3);
                ?>

                <img src="../../z_databse_assets/<?php if($row_3['user_image']){ echo $row_3['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="30" height="30">

                <div class="details">
                    <span><?php echo $row_3['user_name'] ?></span>
                    <p><?php if($row_3['user_online'] == 1){ echo "Online"; }else{ echo "Offline"; } ?></p>
                </div>
            </div>


            <div class="chat_box">
                

                <?php
                    $sql_4 = "SELECT * FROM chat_table";
                    $chat_table = mysqli_query($connection, $sql_4);

                    $sql_exists = "SELECT * FROM chat_table WHERE from_user_id='$from_user_id' AND to_user_id='$to_user_id' OR from_user_id='$to_user_id' AND to_user_id='$from_user_id'";
                    $chat_exists = mysqli_query($connection, $sql_exists);

                    if(mysqli_num_rows($chat_exists) > 0){
                        while($row_4 = mysqli_fetch_assoc($chat_table)){
                ?>


                <div class="chat outgoing">


                    <?php
                        if($row_4['from_user_id'] == $from_user_id && $row_4['to_user_id'] == $to_user_id){ ?>
                            <div class="details">
                                <p> <?php
                                    echo $row_4['message']; ?>
                                </p>
                            </div> <?php
                        }
                    ?>
                </div>
                

                <div class="chat incoming">


                    <?php
                        if($row_4['from_user_id'] == $to_user_id && $row_4['to_user_id'] == $from_user_id){ ?>
                            <img src="../../z_databse_assets/<?php if($row_3['user_image']){ echo $row_3['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="30" height="30">
                            
                            <div class="details">
                                <p> <?php
                                    echo $row_4['message']; ?>
                                </p>
                            </div> <?php
                        }
                    ?>
                </div>


                <?php
                        }
                    }
                    else{ ?>
                        <style>
                            .chat_box{
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }
                        </style>

                        <div class="style" style="color: blue; font-weight: 600;">Start Conversation with <?php echo $row_3['user_name'] ?></div><?php
                    }
                ?>
            </div>


            <form class="typing_area" action="../../php/view_page/chat_message_recording.php?to_user_id=<?php echo $to_user_id ?>" method="post">
                <input type="text" placeholder="Message..." name="message">
                <button type="submit" name="send"><i class="fa-solid fa-paper-plane"></i></button>
            </form>


            <?php
                }
                else{
                    ?>
                    <style>
                        .chat_area{
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                        }
                        .style_2{
                            color: blue;
                            font-weight: 800;
                        }
                    </style>
                    <div class="style_2">Start Conversation with any user</div><?php
                }
            ?>
        </section>
    </main>





    <script src="../../js/view_page/chat_page.js"></script>
</body>
</html>