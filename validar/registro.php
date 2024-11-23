<?php

	$user=$_POST['usuario'];
	$pass= $_POST['pass'];

	require("conexiones.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM usuarios WHERE Nombre=$user");
		if($pass){
			if($checkemail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el usuario colocado, verifique sus datos");</script> ';
					echo "<script>location.href='../registro.php'</script>";	
			}else{
				
				mysqli_query($mysqli,"INSERT INTO usuarios VALUES('','$user','$user','$user@gmail.com','$pass')");

				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				echo "<script>location.href='../loginadmin.php'</script>";	
				
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>