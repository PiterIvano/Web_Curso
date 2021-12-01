<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion - Curso Informatica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--script de capcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Inicio de sesión</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LcdPG4dAAAAABLkbXemyJwQmM3Rt-QGJnnDvXUd">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Iniciar sesión" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
<?php
if (isset($_POST['submit'])) {
    if(isset($_POST['usuario']) && isset($_POST['password'])){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        #verificar recapcha
        $ip = $_SERVER['REMOTE_ADDR'];
        $capcha = $_POST['g-recaptcha-response'];
        $secret_key = "clave secreta aqui";

        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$capcha&remoteip=$ip");
        $array = json_decode($respuesta, true);
        if ($array['success'] == true) {
            #verificar usuario y contraseña
            #limpiar datos de posibles inyecciones SQL con replace
            $signos = array("'",'"', ';', '-', '<', '>', '=', '+', '*', '%', '&', '$', '#', '@', '!', '?', '/', '\\', '|', '^', '~', '`', '´', '¨', '{', '}', ':', '.', ',', '--', '(', ')' );
            $usuario = str_replace($signos, "", $usuario);
            $password = str_replace($signos, "", $password);
            #poner minimo de caracteres
            if(strlen($usuario) < 6){
                echo "<script>alert('El usuario debe tener al menos 6 caracteres');</script>";
            }else{
                if(strlen($password) < 6){
                    echo "<script>alert('La contraseña debe tener al menos 6 caracteres');</script>";
                }else{
                    $conexion = mysqli_connect('localhost', 'root', '', 'curso_h');
                    if(!$conexion){
                        echo 'Error al conectar con la base de datos';
                    }else{
                        $sql = "SELECT * FROM users WHERE user = '$usuario' AND pass = '$password'";
                        $resultado = mysqli_query($conexion, $sql);
                        if(!$resultado){
                            #presentar error
                            echo 'Error al ejecutar la consulta';
                            
                        }else{
                            if(mysqli_num_rows($resultado) > 0){
                                #iniciar sesion
                                
                                $_SESSION['usuario'] = $usuario;
                                header('Location: videos.php');
                                ?>
                                <script>
                                    /*redireccionar a otra pagina*/
                                    window.location.href = 'videos.php';
                                </script>
                                <?php
                            }else{
                                echo '<script>alert("Usuario o contraseña incorrectos")</script>';
                            }
                        }
                    }
                }
            }
        } else {
            echo "<script>alert('Error en el captcha')</script>";
        }
        
        
    }
}
