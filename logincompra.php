<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/2.png">
    <title>Comprar</title>
    <!-- Código de instalación Cliengo para jordan137.jdcf@gmail.com -->
    <script type="text/javascript">
        (function() {
            var ldk = document.createElement('script');
            ldk.type = 'text/javascript';
            ldk.async = true;
            ldk.src = 'https://s.cliengo.com/weboptimizer/618a9101c1fa5b002adadda9/618a9104c1fa5b002adaddaf.js?platform=registration';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ldk, s);
        })();
    </script>
    <!-- Css -->
    <link rel="stylesheet" href="assets/css/logincompra.css">
    <!-- js -->
    <script src="assets/js/logincompra.js"></script>
    <!-- fontawesone -->
    <script src="https://kit.fontawesome.com/2c55bdff64.js" crossorigin="anonymous"></script>

</head>

<body>
    <form action="validar/logcompra.php" method="POST">
        <div id="login-box">
            <h1>Login</h1>
            <!--El título de Inicio de sesión-->

            <div class="form">
                <div class="item">
                    <!--parte de nombre de usuario-->
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <!--Se utilizará para dibujar el icono delante del nombre de usuario-->
                    <input type="text" placeholder="nombre" name="nombre">
                    <!--Entrada de nombre de usuario realizada por cuadro de texto-->
                </div>

                <div class="item">
                    <!--parte de la contraseña-->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <!--Se utilizará para dibujar el icono delante de la contraseña en el futuro-->
                    <input type="password" placeholder="telefono" name="telefono">
                    <!--Entrada de contraseña usando el cuadro de texto de contraseña-->
                </div>

            </div>

            <button type="submit">Login</button>
            <!--Botón de inicio de sesión implementado con el botón-->
            <h5>
                <font color="white">Le sugerimos tomar sus datos del registro</font>
            </h5>

        </div>
    </form>

</body>

</html>