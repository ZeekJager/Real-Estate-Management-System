<?php
    include ("../connection.php");
    session_start();


    if(isset($_SESSION['user_id'])){
        $from_user_id = $_SESSION['user_id'];
    }
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/post_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
    
    <style>
        .section_2 main{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 100px;
            padding: 20px;
        }

        .section_2 main .video{
            position: relative;
            border: 1px solid white;
            border-radius: 20px;
            width: 300px;
            height: 530px;
            background: #00082c;
            overflow: hidden;
        }

        .section_2 main .video video{
            width: 100%;
            height: 100%;
        }

        .section_2 main .style{
            color: #00082c;
            font-weight: 600;
        }
    </style>

</head>
<body>
    <a href="../../html/post_page.php"><i class="fa-solid fa-arrow-left" style="position: absolute; top: 10px; left: 10px; color: white; z-index: 1;"></i></a>





    <!--section 1-->
    <div class="section_1">
        <!--nav-->
        <nav>
            <p><a href="../../html/home_page.php"><i class="fa-solid fa-house"></i> <span>Home</span></a></p>
            <p><a href="../../html/all_page.php"><i class="fa-solid fa-house"></i> <span>All</span></a></p>
            <p><a href="../../html/buy_page.php"><i class="fa-solid fa-house"></i> <span>Buy</span></a></p>
            <p><a href="../../html/rent_page.php"><i class="fa-solid fa-house"></i> <span>Rent</span></a></p>
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
                <form action="" method="post">
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
                <img src="../../z_databse_assets/<?php if($row_user['user_image']){ echo $row_user['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="30" height="30">
            </div>
        </header>

        
        <!--main-->
        <main>
            <?php
                if(isset($_POST['search_button'])){
                    $search_input = $_POST['search_input'];
                }
            
                $sql_1 = "SELECT * FROM post_table WHERE video_title REGEXP '$search_input'";
                $post_table = mysqli_query($connection, $sql_1);

                if(mysqli_num_rows($post_table) > 0){
                    while($row = mysqli_fetch_assoc($post_table)){
                        $user_id = $row['user_id'];
                        $post_id = $row['post_id'];

                        $sql_2 = "SELECT * FROM user_table WHERE user_id='$user_id'";
                        $user_table = mysqli_query($connection, $sql_2);
                        $row_2 = mysqli_fetch_assoc($user_table);
            ?>


            <a href="../../html/post_page.php?post_id=<?php echo $post_id; ?>">
                <div class="video">
                    <video autoplay loop muted>
                        <source src="../../z_databse_assets/<?php echo $row['video']; ?>">
                    </video>
                </div>
            </a>


            <?php
                    }
                }
                else{ ?>
                    <style>
                        .section_2 main{
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }
                    </style>

                    <div class="style">No result found</div> <?php
                }
            ?>
        </main>
    </div>
    




    <script src="../../js/post_page.js"></script>
</body>
</html>