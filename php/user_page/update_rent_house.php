<?php
    include ("../../php/connection.php");
    session_start();

    $house_id = $_GET['house_id'];
    $user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial;
        }


        a{
            position: absolute;
            top: 40px;
            left: 100px;
            font-size: 20px;
        }



        /*-------------main-------------*/
        main{
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            padding-left: 30px;
        }



        main p:first-of-type{
            color: blue;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        main p:nth-of-type(n+2){
            color: gray;
            margin-bottom: 10px;
        }

        main p:last-of-type{
            margin-bottom: 25px;
        }

        main i{
            color: blue;
            margin-right: 10px;
        }

        main .buttons i{
            color: white;
        }

        main span{
            color: blue;
            font-size: 20px;
            margin-right: 60px;
        }

        main .buttons{
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        main .buttons a{
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            margin-right: 20px;
            margin-bottom: 20px;
            padding: 5px 10px;
            background: blue;
            transition: 1s;
        }

        main .buttons a:hover{
            transform: scale(1.1);
            background: darkblue;
        }





        /*-------------additional-------------*/
        .input{
            font-weight: 700;
            border: none;
            border-bottom: 2px solid gray;
            padding: 7px 13px;
            background: transparent;
            transition: 1s;
        }

        .input:focus{
            outline: none;
            border-color: blue;
            transform: scale(1.1);
        }

        .input[type="number"]::-webkit-outer-spin-button, .input[type="number"]::-webkit-inner-spin-button{
            -webkit-appearance: none;
            margin: 0;
        }

        .input[type="number"]{
            -moz-appearance: textfield;
        }

        .form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .h1{
            color: gray;
        }

        #p1{
            color: gray;
            font-size: 16px;
            font-weight: 500;
        }

        .button1{
            cursor: pointer;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 30px;
            margin-right: 100px;
            padding: 8px 13px;
            background: gray;
        }

        .button1:hover{
            background: darkblue;
        }



        .h1{
            margin-top: 40px;
            text-align: center;
            transition: 1s;
        }

        .h1:hover{
            color: blue;
        }

        .p1{
            margin-top: 50px;
            margin-left: -3%;
        }

        .p2{
            margin-top: 50px;
        }

        .p3{
            margin-top: 60px;
            margin-left: 5%;
        }

        .p4{
            margin-top: 60px;
            margin-left: -1%;
        }

        .p5{
            margin-top: 50px;
            margin-left: 10%;
            margin-bottom: 5px;
        }


        .failed{
            position: absolute;
            top: 90px;
            left: 610px;
            color: lightgreen;
            font-weight: 700;
            text-align: center;
        }
    </style>
</head>
<body>
    <main>
        <a href="../../html/user_page/houses_for_rent.php"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="h1" style="color: blue;">Update House Details</h1>

        <?php
            if(isset($_POST['update'])){
                $house_name = $_POST['house_name'];
                $house_price = $_POST['house_price'];
                $house_location = $_POST['house_location'];
                $house_bedroom = $_POST['house_bedroom'];
                $house_bathroom = $_POST['house_bathroom'];
                $house_area = $_POST['house_area'];

                $sql_1 = "UPDATE house_table SET  house_name ='$house_name', house_price ='$house_price', house_location = '$house_location', house_bedroom ='$house_bedroom', house_bathroom ='$house_bathroom', house_area = '$house_area' WHERE buy_or_sale='0' AND house_id='$house_id'";
                $updated_table = mysqli_query($connection, $sql_1);

                if($updated_table == true){
                    ?><div class="failed">House details updated</div><?php
                }
            
            }
        ?>

        <?php
            $sql = "SELECT * FROM house_table WHERE buy_or_sale='0' AND house_id='$house_id'";
            $buy_table = mysqli_query($connection, $sql);
        
            while($row = mysqli_fetch_assoc($buy_table)){
        ?>
        
        <form class="form" action="" method="post">
            <p class="p1" id="p1">House title <input class="input" type="text" name="house_name" value="<?php echo $row['house_name']; ?>"></p>
            <p class="p2">ETB                 <input class="input" type="number" name="house_price" value="<?php echo $row['house_price']; ?>"></p>
            <p class="p3">                    <input class="input" type="number" name="house_bedroom" value="<?php echo $row['house_bedroom']; ?>"> Bedroom | <input class="input" type="number" name="house_bathroom" value="<?php echo $row['house_bathroom']; ?>"> Bathroom | <input class="input" type="number" name="house_area" value="<?php echo $row['house_area'];?>"> m<sup>2</sup></p>
            <p class="p4">Location            <input class="input" type="text" name="house_location" value="<?php echo $row['house_location']; ?>"></p>
            <p class="p5">                    <button class="button1" type="reset">Reset</button> <button class="button1" type="submit" name="update">Update</button></p>
        </form>

        <?php
            }
        ?>
    </main>    

</body>
</html>