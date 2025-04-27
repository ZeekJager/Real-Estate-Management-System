<?php
    include ("../connection.php");
    session_start();


    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/post_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>

    <style>
        .section_1{
            position: sticky;
            top: 0;
        }

        .section_2{
            padding: 0 30px;
        }

        .section_2 header{
            position: sticky;
            top: 0;
            display: flex;
            justify-content: start;
            align-items: start;
            border-bottom: 1px solid gray;
            border-radius: 0 0 20px 20px;
            width: 100%;
            height: 30px;
            background: #00082c;
            box-shadow: 5px 5px 10px black;
            overflow: hidden;
            transition: 1s;
            z-index: 1;
        }

        .section_2 header:hover{
            width: 100%;
            height: 100px;
            padding: 30px 0;
        }

        .section_2 header > div{
            display: none;
            transition: 1s;
        }

        .section_2 header:hover > div{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section_2 header > div img{
            border-radius: 100%;
            margin-left: 50px;
            margin-right: 10px;
        }

        .section_2 header > div .details p{
            color: white;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .section_2 header > div .details p:first-of-type{
            font-weight: 600;
        }

        .section_2 > div{
            margin-top: 30px;
        }

        .section_2 main{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-row-gap: 50px;
            padding: 20px;
        }

        .section_2 main .video{
            border: 1px solid white;
            border-radius: 20px;
            width: 300px;
            height: 350px;
            background: black;
            overflow: hidden;
        }

        .section_2 main .video video{
            width: 100%;
            height: 100%;
        }

        .section_2 main .style{
            font-weight: 600;
        }
    </style>

</head>
<body>
    <a href="../../html/post_page.php"><i class="fa-solid fa-arrow-left" style="position: fixed; top: 10px; left: 10px; color: white; z-index: 1;"></i></a>





    <!--section 1-->
    <div class="section_1">
        <!--nav-->
        <nav>
            <p><a href="../../html/home_page.php"><i class="fa-solid fa-house"></i> <span>Home</span></a></p>
            <p><a href="../../html/all_page.php"><i class="fa-solid fa-house"></i>  <span>All</span></a></p>
            <p><a href="../../html/buy_page.php"><i class="fa-solid fa-house"></i>  <span>Buy</span></a></p>
            <p><a href="../../html/rent_page.php"><i class="fa-solid fa-house"></i> <span>Rent</span></a></p>
        </nav>
    </div>




    
    <!--section 2-->
    <div class="section_2">
        <!--header-->
        <header>
            <?php
                $sql_user = "SELECT * FROM user_table WHERE user_id='$user_id'";
                $users_table = mysqli_query($connection, $sql_user);
                $row_user = mysqli_fetch_assoc($users_table);
            ?>
            
            <div>
                <img src="../../z_databse_assets/<?php if($row_user['user_image']){ echo $row_user['user_image']; }else{ echo "user_profile_icon.png"; }?>" width="80" height="80">

                <div class="details">
                    <p><?php if(empty($row_user['user_name']) || $row_user['user_name'] == ""){ ?> N/A <?php }else{ echo $row_user['user_name']; } ?></p>
                    <p><?php if(empty($row_user['user_email']) || $row_user['user_email'] == ""){ ?> N/A <?php }else{ echo $row_user['user_email']; } ?></p>
                </div>
            </div>
        </header>


        <div>
            <h3>Videos</h3>
        </div>

        
        <!--main-->
        <main>
            <?php
                $sql_1 = "SELECT * FROM post_table WHERE user_id='$user_id'";
                $post_table = mysqli_query($connection, $sql_1);

                if(mysqli_num_rows($post_table) > 0){
                    while($row = mysqli_fetch_assoc($post_table)){
                        $post_id = $row['post_id'];
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

                    <div class="style">No videos here yet</div> <?php
                }
            ?>
        </main>
    </div>
    




    <script src="../../js/post_page.js"></script>
</body>
</html>