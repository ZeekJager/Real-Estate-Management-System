<?php
    session_start();
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/sign_up_page/first_and_last_name.css">
    <title>EthioHomes</title>
    <style>
        .display{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 600px;
        }

        .display a{
            text-decoration: none;
        }

        .display h1{
            color: blue;
            margin-bottom: 20px;
        }

        .qr_code_reader{
            border-radius: 20px;
            width: 100%;
            height: 400px;
            margin-bottom: 20px;
            overflow: hidden;
            transition: 1s;
        }

        .text{
            color: blue;
            font-size: 30px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .qr_code_result{
            display: inline;
            color: #00082c;
        }

        .name_matching_failed{
            color: red;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .button{
            cursor: pointer;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 20px;
            background: rgb(63, 63, 255);
            transition: 1s;
        }

        .button:hover{
            background: darkblue;
        }
    </style>
</head>
<body>
    <!-- style="width: 800px; height: 500px;" -->
    <div class="display">
        <h1>Scan your national ID</h1>

        <div class="qr_code_reader" id="qr_code_reader" ></div>

        <div class="text">Result: <div class="qr_code_result" id="qr_code_result"></div></div>

        <div class="name_matching_failed" id="name_matching_failed"></div>

        <a href="take_picture_page.php"><div class="button" id="button"></div></a>
    </div>
    




    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        function dom_ready(fn){
            if(document.readyState === "complete" || document.readyState === "interactive"){
                setTimeout(fn, 1);
            }
            else{
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        dom_ready(function (){
            let user_input_name = "<?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?>".toLowerCase();
            var qr_code_reader = document.getElementById("qr_code_reader");
            var qr_code_result = document.getElementById("qr_code_result");
            var name_matching_failed = document.getElementById("name_matching_failed");
            var button = document.getElementById("button");
            var last_result = 0;

            function scan_success(decode_text, decode_result){
                if(decode_text !== last_result){
                    last_result = decode_result;

                    qr_code_result.innerHTML = `${decode_text}`;
                    
                    if(decode_text.toLowerCase() === user_input_name){
                        name_matching_failed.style.display = "none";
                        button.style.display = "block";
                        button.innerHTML = "Next";
                        button.style.padding = "10px 20px";
                    }
                    else{
                        name_matching_failed.style.display = "block";
                        button.innerHTML = "";
                        button.style.padding = "0";
                        name_matching_failed.innerHTML = "Your input and national id input don't match";
                    }
                }
            }

            var htmlscanner = new Html5QrcodeScanner("qr_code_reader",{fps:10,qrbox:250});
            htmlscanner.render(scan_success);
        });
    </script>
</body>
</html>