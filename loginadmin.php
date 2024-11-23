
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Herbicides Shopping</title>

	<link rel="icon" type="icon" href="img/2.png">

<link rel="stylesheet" type="text/css" href="css/background-style.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
        body {
            background: #a8ff78;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #78ffd6, #a8ff78);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #78ffd6, #a8ff78);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>

</head>


<body>


	<div class="container-start">
	

		<div class="container-following">
	

			<div class="container-form">
	

<form action="validar/login.php" method="post">

	<div class="row">

		<div class="col-10">

			<img src="img/2.png" width="30%">
			<div class="form-group">
    		<label type="text"></label>
    		<div class="input"><input type="text" name="username" class="form-control" placeholder="Usuario o Correo" required=""></div>
  			</div>

  			<div class="form-group">
    		<div class="input"><input type="password" name="password" class="form-control" placeholder="Contraseña" required=""></div>
  			</div>


  			<div class="button"><button type="submit" class="btn btn-primary">INGRESAR</button></div><br>
  			<p>¿No tienes una cuenta? <a href="registro.php"><font color="white">Regístrate</font></a></p>

  			


		</div>

	</div>

</form>



			</div>

		</div>

	</div>



</body>
</html>