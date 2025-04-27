<?php 
    include ("../../php/connection.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    if(isset($_SESSION['user_id'])){
        $sql_notifications = "SELECT * FROM house_review WHERE to_user_id='$user_id' AND viewed='0'";
        $notifications_table = mysqli_query($connection, $sql_notifications);

        if(mysqli_num_rows($notifications_table) > 0){
            $i = 0;
            while($row_notifications = mysqli_fetch_assoc($notifications_table)){
                $i++;
            }

            $_SESSION['number_of_notifications'] = $i;
        }

        $sql = "SELECT * FROM user_table WHERE user_id='$user_id'";
        $user_table = mysqli_query($connection, $sql);

        $row = mysqli_fetch_assoc($user_table);
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/user_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EthioHomes</title>
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
            <div><a href="profile_page.php"><i class="fa-solid fa-user"></i>                                                                        <span id="option_labels">Profile</span></a></div>
            <div><a href="update_page.php"><i class="fas fa-user-edit navigation-icon"></i>                                                         <span id="option_labels">Update</span></a></div>
            <div><a href="upload_page.php"><i class="fa-solid fa-upload"></i>                                                                       <span id="option_labels">Upload</span></a></div>
            <div><a href="houses_page.php"><i class="fa-solid fa-house"></i>                                                                        <span id="option_labels">Houses</span></a></div>
            <div style="position: relative;"><a href="notification_page.php"><i class="fa-solid fa-bell"></i>                                       <?php if(isset($_SESSION['number_of_notifications']) && $_SESSION['number_of_notifications'] != 0){?><span style="position: absolute; top: 0; left: 10px; color: white; font-size: 14px; font-weight: 600; border-radius: 100%; padding: 4px; background: red;"><?php echo $_SESSION['number_of_notifications']; ?></span> <?php } ?> <span id="option_labels">Notifications</span></a></div>
            <div><a href="post_page.php"><i class="fa-solid fa-cloud"></i>                                                                          <span id="option_labels">Post</span></a></div>
            <div><a href="../../php/user_page/log_out.php"><i class="fa-solid fa-right-from-bracket" style="transform: rotate(-180deg);"></i>       <span id="option_labels">Logout</span></a></div>
        </div>
    </header>


    

    
    <!--Dashboard container-->
    <div class="dash_board_container">
        <!--cards container-->
            <div class="cards_container">
                <div class="card house_sold">
                    <p>House Sold</p>
                    <p><?php echo $row['house_sold'] ?></p>
                </div>

                <div class="card house_rented_out">
                    <p>House Rented</p>
                    <p><?php echo $row['house_rented'] ?></p>
                </div>

                <div class="card house_bought">
                    <p>House Bought</p>
                    <p><?php echo $row['house_bought'] ?></p>
                </div>

                <div class="card house_rented_in">
                    <p>House Rented In</p>
                    <p><?php echo $row['house_rented_from_others'] ?></p>
                </div>
            </div>


            <div class="graphs_container">
                <div class="graph bar_graph_container">
                    <canvas id="bar_graph" width="300" height="300"></canvas>
                </div>

                <div class="graph pie_chart_container">
                    <canvas id="pie_chart" width="300" height="100"></canvas>
                </div>
            </div>


            <div class="sales_container">
                <div class="card total_sales">
                    <p>Sales</p>
                    <p>ETB <span><?php echo $row['total_sales'] ?></span></p>
                </div>

                <div class="card total_expense">
                    <p>Purchase</p>
                    <p>ETB <span><?php echo $row['total_expense'] ?></span></p>
                </div>
            </div>
    </div>




    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <script src="node_modules/chart.js/dist/chart.cjs"></script>
    <script src="node_modules/chart.js/dist/chart.js"></script>
    <script src="node_modules/chart.js/dist/chart.js.map"></script>
    <script src="node_modules/chart.js/dist/chart.umd.js"></script>
    <script src="node_modules/chart.js/dist/chart.umd.map"></script> -->
    <script src="../../js/user_page.js"></script>
    <script>
        const bar_graph = document.getElementById('bar_graph');

        new Chart(bar_graph, {
            type: 'bar',
            data: {
            labels: ['Sold', 'Rented', 'Bought', 'RentedIn'],
            datasets: [{
                label: 'Number of houses',
                data: [<?php echo $row['house_sold'] ?>, <?php echo $row['house_rented'] ?>, <?php echo $row['house_bought'] ?>, <?php echo $row['house_rented_from_others'] ?>],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>

    <script>
        const pie_chart = document.getElementById('pie_chart');

        new Chart(pie_chart, {
            type: 'doughnut',
            data: {
            labels: ['Sold', 'Rented', 'Bought', 'RentedIn'],
            datasets: [{
                label: 'Number of houses',
                data: [<?php echo $row['house_sold'] ?>, <?php echo $row['house_rented'] ?>, <?php echo $row['house_bought'] ?>, <?php echo $row['house_rented_from_others'] ?>],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>

</body>
</html>

<?php
    }
    else{
        header("Location: ../log_in_page.php?user_page=2");
    }
?>