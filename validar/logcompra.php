<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["telefono"])){
		if($_POST["nombre"]!=""&&$_POST["telefono"]!=""){
			include "conexion.php";
			
			$user_id=null;
			$sql1= "select * from cliente where nombre=\"$_POST[nombre]\" and telefono=\"$_POST[telefono]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["codigo"];
				$cl=$r['nombre'];
				$tl=$r['telefono'];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Nombre/Telefono Incorrecta\");window.location='../logincompra.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				
				print "<script>window.location='../Navbar/compra.php';</script>";			
			}
		}
	}
}



?>