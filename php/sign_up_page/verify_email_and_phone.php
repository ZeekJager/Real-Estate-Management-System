<?php
    session_start();

    function get_IP_address(){
        foreach (array('HTTP_CLIENT_IP',
                    'HTTP_X_FORWARDED_FOR',
                    'HTTP_X_FORWARDED',
                    'HTTP_X_CLUSTER_CLIENT_IP',
                    'HTTP_FORWARDED_FOR',
                    'HTTP_FORWARDED',
                    'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $IPaddress){
                    $IPaddress = trim($IPaddress); // Just to be safe

                    if (filter_var($IPaddress,
                                FILTER_VALIDATE_IP,
                                FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                        !== false) {

                        return $IPaddress;
                    }
                }
            }
        }
    }
    
    $ip = get_IP_address();
    $location_access = file_get_contents("http://ip-api.com/json/$ip");
    $location_decode =  json_decode($location_access);
    $lat = $location_decode->lat;
    $lon = $location_decode->lon;
    $city = $location_decode->city;
    $region = $location_decode->region;
    $country = $location_decode->country;

    $long_and_lat = "Longtiude: ".$lon." and Latitude: ".$lat;
    $location = $region." , ".$country;

    
    $_SESSION['location'] = $location;
    $_SESSION['city'] = $city;
    $_SESSION['long_and_lat'] = $long_and_lat;


    if(isset($_POST['next_code'])){
        $email_code = $_POST['email_code'];
        $sms_code = $_POST['sms_code'];
        

        if($email_code == $_SESSION['email_verification_code'] && $sms_code == $_SESSION['sms_verification_code']){
            header("Location: ../../html/sign_up_page/user_ip_address_and_location.php");
        }
        else{
            header("Location: ../../html/sign_up_page/verify_email_and_phone.php?invalid_verification_code");
        }
    }
?>