<?php
$mysqli = new mysqli("localhost", "root","", "plants");
if($mysqli)
    echo"coneccion exitosa";
else{
  echo"alerta mysqli,No se establecio coneccion";
} 

?>