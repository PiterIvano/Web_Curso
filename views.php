<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Video - Curso hacking</title>
        <!-- Bootstrap Core CSS desde la pagina oficial-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Curso Hacking</h1>
                    <form method="post">
                        <input type="hidden" name="cerrar" value="cerrar">
                        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                    </form>
                    <?php
                    if (isset($_POST['cerrar'])) {
                        session_destroy();
                        header("Location: index.php");
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Videos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img width="100%" height="315" src="images/ppphish.jpg" alt="PPPhish">
                                                <div class="caption">
                                                    <h4>PRESENTACION</h4>
                                                    <p>PRESENTACION.</p>    
                                                    <p> <form action="reproductor.php" method="post">
                                                            <input type="hidden" name="video" value="Presentacion.mp4">
                                                            <input class="btn btn-primary" type="submit" value="Ver Video">
                                                            <a href="#" class="btn btn-default" role="button">Ver Detalles</a>
                                                        </form>
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img width="100%" height="315" src="images/ppphish.jpg" alt="PPPhish">
                                                <div class="caption">
                                                    <h4>ppphish</h4>
                                                    <p>ppphish este es un script para hacer phishing con templates muy actualizados, especialmente facebook, este estando en Ngrok dilata hasta 8 horas sin caidas.</p>
                                                    <p> <form action="reproductor.php" method="post">
                                                            <input type="hidden" name="video" value="PPPhish.mp4">
                                                            <input class="btn btn-primary" type="submit" value="Ver Video">
                                                            <a href="#" class="btn btn-default" role="button">Ver Detalles</a>
                                                        </form>
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img width="100%" height="315" src="images/cronos.png" alt="Cronos">
                                                <div class="caption">
                                                    <h4>ADB android Cronos</h4>
                                                    <p>En este video vemos muy de la manera mas facil de entrar al ADB androis por el port:5555 el cal es usado por este servicio...</p>
                                                    <p> <form action="reproductor.php" method="post">
                                                            <input type="hidden" name="video" value="Cronos.mp4">
                                                            <input class="btn btn-primary" type="submit" value="Ver Video">
                                                            <a href="#" class="btn btn-default" role="button">Ver Detalles</a>
                                                        </form>
                                                     </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img width="100%" height="315" src="images/mailsuplant.jpg" alt="MailSuplant">
                                                <div class="caption">
                                                    <h4>MailSuplant</h4>
                                                    <p>Esta herramienta esta creada en Python, funciona en Windows, Termux, Linux... Puedes enviar correo phishing con html sin problemas, esto sirve mucho a la hora de querer hackear a alguien.</p>
                                                    <p> <form action="reproductor.php" method="post">
                                                            <input type="hidden" name="video" value="mialsuplant.mp4">
                                                            <input class="btn btn-primary" type="submit" value="Ver Video">
                                                            <a href="#" class="btn btn-default" role="button">Ver Detalles</a>
                                                        </form>
                                                     </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>