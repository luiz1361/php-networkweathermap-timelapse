<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background: #000000;
            color: #ffffff;
        }
        
        .pb-video-container {
            padding-top: 20px;
            font-family: Lato;
        }
        
        .pb-video {
            border: 1px solid #000000;
            padding: 5px;
        }
        
        .pb-video:hover {
            background: #2c3e50;
        }
        
        .pb-video-frame {
            transition: width 2s, height 2s;
        }
        
        .pb-video-frame:hover {
            height: 300px;
        }
        
        .pb-row {
            margin-bottom: 10px;
        }
    </style>

</head>

<div class="container-fluid pb-video-container">

    <div class="col-md-10 offset-md-1">

        <h3 class="text-xs-center">Timelapse</h3>

        <div class="row pb-row">

            <?php

            $files = glob("mp4/*.*");

            for ($i=0; $i<count($files); $i++){
                    $num = $files[$i];
                    $var1 = $_GET["files"]["name"];
                    echo '
                    <div class="col-md-3 pb-video">
                        <video class="pb-video-frame" width="100%" height="230" controls loop>
                            <source src='.$num.' type=video/mp4 width="480" height="360" >
                        </video>
                        <label class="form-control label-warning text-xs-center">'.$num.'</label>
                    </div>';
            }

            ?>

        </div>

    </div>

</div>

</html>
