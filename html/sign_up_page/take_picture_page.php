<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/sign_up_page/first_and_last_name.css">
    <title>EthioHomes</title>
    <style>
        .text_and_video{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .text_and_video h1{
            color: blue;
            margin-bottom: 20px;
        }

        .text_and_video a{
            text-decoration: none;
        }

        .button{
            display: none;
            cursor: pointer;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 20px;
            margin-top: 20px;
            padding: 10px 20px;
            background: rgb(63, 63, 255);
            transition: 1s;
        }

        .button:hover{
            background: darkblue;
        }
        
        canvas{
            position: absolute;
        }
    </style>
</head>
<body>
    <div class="text_and_video">
        <h1>Take a picture</h1>

        <video id="video" width="600" height="400" autoplay muted></video>

        <a href="../../php/sign_up_page/user_recording.php"><div class="button" id="button">Next</div></a>
    </div>





    <script src="face-api.min.js"></script>
    <script>
        const video = document.getElementById("video");
        const button = document.getElementById("button");

        Promise.all([
            faceapi.nets.tinyFaceDetector.loadFromUri('models'),
            faceapi.nets.faceLandmark68Net.loadFromUri('models'),
            faceapi.nets.faceRecognitionNet.loadFromUri('models'),
            faceapi.nets.faceExpressionNet.loadFromUri('models'),
        ]).then(start_camera);

        function start_camera(){
            navigator.getUserMedia(
                { video: {} },
                stream => video.srcObject = stream,
                err => console.log(err)
            )
        }

        video.addEventListener('play', () => {
            const video_size = { width: video.width, height: video.height }
            const canvas = faceapi.createCanvasFromMedia(video);

            faceapi.matchDimensions(canvas, video_size);
            document.body.append(canvas);
            
            setInterval(async () => {
                const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()
                const resizedDetections = faceapi.resizeResults(detections, video_size);

                canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
                faceapi.draw.drawDetections(canvas, resizedDetections);
                faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);
                faceapi.draw.drawFaceExpressions(canvas, resizedDetections);
                
                if(detections.length > 0){
                    button.style.display = "block";
                }
                else{
                    button.style.display = "none";
                }
            }, 100)
        });
    </script>
</body>
</html>