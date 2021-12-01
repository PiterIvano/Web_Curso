<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reproductor de videos</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        input {
            width: 130px;
            height: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 20px;
            margin-bottom: 10px;
            margin: 10px;

        }
        </style>
</head>
<body>
<?php
if (isset($_POST['video'])) {
    $name = $_POST['video'];
    echo '<div class="container">
    <div class="row">
        <video id="video" width="900" height="450">  
            <source src="videos/'.$name.'">
        </video> 
    </div>';
}?>
    <div class="row">
        <input  type="button" id="boton1" value="Reproducir"> 
        <input type="button" id="boton2" value="Volumen">
        <input type="button" id="boton3" value="volumen +">
        <input type="button" id="boton4" value="volumen -">
    </div>
</div>
        <script>
            var video = document.getElementById("video");
            var boton1 = document.getElementById("boton1");
            var boton2 = document.getElementById("boton2");
            var boton3 = document.getElementById("boton3");

            boton1.addEventListener("click", function(){
                if(video.paused){
                    video.play();
                    boton1.value = "Pausar";
                }else{
                    video.pause();
                    boton1.value = "Reproducir";
                }
            });

            boton2.addEventListener("click", function(){
                if(video.volume == 1){
                    video.volume = 0;
                    boton2.value = "Silencio";
                }else{
                    video.volume = 1;
                    boton2.value = "Volumen";
                }
            });

            boton3.addEventListener("click", function(){
                video.volume += 0.1;
            });
            boton4.addEventListener("click", function(){
                video.volume -= 0.1;
            });
        </script>
        </div>
    </div>
</body>
</html>
