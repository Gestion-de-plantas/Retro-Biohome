<?php
/* session_start(); */
if (!empty($_POST['usuario']) && !empty($_POST['password'] )) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['password'];
    if ($usuario=="admin" && $contraseña=="admin" or $usuario=="empleado1" && $contraseña=="admin") {
        echo "Bienvenido cliente@".$usuario."<br>";
        header("Location:principal.PHP");
    }else {
        header("Location:login.php");
    }

} else {
    echo "Falta Ingresar Datos";
}

?>