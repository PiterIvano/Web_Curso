<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="cursos de hacking">
        <link href="https://curso.pitersk.com/logo.jpg" rel="icon" type="image/ico" />    
        <meta property="og:image" content="https://curso.pitersk.com/logo.jpg">
        <meta property="og:url" content="https://curso.pitersk.com/">
        <meta property="og:title" content="Piter Ivano - Cursos">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Piter Ivano">
        <link href="https://curso.pitersk.com/logo.jpg" rel="shortcut icon" sizes="196x196">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="author" content="Piter">
        <title>Registro - Curso Informatica</title>
        <!--Codigo css-->
        <style>
            .salto {
                display: block;
                margin-top: 10px;
                
            }
            *{
                font-size: 0.9rem;
                align-items: center;
            }
            label {
                display: block;
                margin-top: 10px;
            }
            /*espaciado para el elemento .lef*/
            .lef {
                margin-left: 100px;
            }
        </style>
        <!--- Bootstrap CSS -->
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
                        <h1>Registro</h1>
                        <form method="post">
                            <div class="form-group">
                                <label for="nombre">Usuario</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="password2">Repetir Contraseña</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Repetir Contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                            </div>
                            <div class="form-group">
                                <span class="salto"></span>
                                <div class="g-recaptcha" data-sitekey="6LcdPG4dAAAAABLkbXemyJwQmM3Rt-QGJnnDvXUd"></div>
                                <span class="salto"></span>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Registrar</button>
                                <a href="/" class="btn btn-secondary lef">Iniciar sesion</a>
                            </div>
                            </form> 
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $telefono = $_POST['telefono'];
    $captcha = $_POST['g-recaptcha-response'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $secretKey = "SECRET_KEY";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip");
    $response = json_decode($response);
    if ($response->success) {
        if ($password == $password2) {
            $simbolos = array("'", '"', ';', '-', '+', '*', '&', '%', '$', '#', '@', '!', '?', '¿', '¡', '=', '<', '>', '|', '\\', '/', '^', '~', '`', '¬', '°', '¨', 'ª', 'º', 'µ', '·', '¹', '²', '³', '¸', '¼', '½', '¾', '¿', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
            $scorreo = array("'", '"', ';', '-', '+', '*', '&', '%', '$', '#', '!', '?', '¿', '¡', '=', '<', '>', '|', '\\', '/', '^', '~', '`', '¬', '°', '¨', 'ª', 'º', 'µ', '·', '¹', '²', '³', '¸', '¼', '½', '¾', '¿', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
            $nombre = str_replace($simbolos, "", $nombre);
            $email = str_replace($scorreo, "", $email);
            $password = str_replace($simbolos, "", $password);
            $telefono = str_replace($simbolos, "", $telefono);
            
            #verificar que ningun campo este vacio !empty
            if(!empty($nombre) && !empty($email) && !empty($password) && !empty($telefono)){
                #verificar que el nombre no tenga menos de 6 caracteres y mas de 30
                if(strlen($nombre) >= 6 && strlen($nombre) <= 30){
                    #verificar que el correo no tenga menos de 6 caracteres y mas de 30
                    if(strlen($email) >= 6 && strlen($email) <= 30){
                        #verificar que el password no tenga menos de 6 caracteres y mas de 30
                        if(strlen($password) >= 6 && strlen($password) <= 30){
                            #verificar que el telefono no tenga menos de 6 caracteres y mas de 30
                            if(strlen($telefono) >= 6 && strlen($telefono) <= 30){
                                #$conn = mysqli_connect("localhost", "root", "", "curso_h");
                                $conn = mysqli_connect("localhost", "root", "", "curso_h");
                                #verificar que la conexion sea exitosa
                                if($conn){
                                    $utf8 = mysqli_set_charset($conn, "utf8");
                                    #consulta para verificar que el usuario no exista en la base de datos
                                    $sql = "SELECT * FROM users WHERE user = '$nombre'";
                                    $result = mysqli_query($conn, $sql);
                                    #ver si el usuario existe
                                    if(mysqli_num_rows($result) == 0){ 
                                        #insertar los datos en la base de datos incluyendo la ip del usuario
                                        $sql = "INSERT INTO users (user, email, pass, telefono, ip) VALUES ('$nombre', '$email', '$password', '$telefono', '$ip')";
                                        $result = mysqli_query($conn, $sql);
                                        #verificar que la consulta se haya realizado correctamente
                                        if($result){
                                            ?>
                                            <script>
                                                window.location.href = "https://curso.pitersk.com/";
                                            </script>
                                            <?php
                                        }else{
                                            echo '<script>alert("Error al registrar el usuario");</script>';
                                        }
                                    }else{
                                        echo '<script>alert("El usuario ya existe");</script>';
                                    }
                                }else{
                                    echo "Error al conectar con la base de datos";
                                }
                            }else{
                                echo '<script>alert("El numero no puede tener menos de 6 caracteres");</script>';
                            }
                        }else{
                            echo '<script>alert("La contraseña no puede tener menos de 6 caracteres");</script>';
                        }
                    }else{
                        echo '<script>alert("El correo no puede tener menos de 6 caracteres");</script>';
                    }
                }else{
                    echo '<script>alert("El nombre no puede tener menos de 6 caracteres");</script>';
                }
            }else{
                echo '<script>alert("Todos los campos son obligatorios");</script>';
            }
        } else {
            echo "<script>alert('Las contraseñas no coinciden');</script>";
        }
    } else {
        echo "<script>alert('Error al registrar');</script>";
    }
}