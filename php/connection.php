<!--This page is to connect the database(ethiohomes_data_base) to the server-->
<?php
    $server_name = "localhost";
    $user = "root";
    $password = "";
    $data_base_name = "ethiohomes_data_base";

    $connection = mysqli_connect($server_name, $user, $password, $data_base_name);


    if(mysqli_connect_errno()){
        echo "Error: Database and Server Connection Failed";
    }
?>