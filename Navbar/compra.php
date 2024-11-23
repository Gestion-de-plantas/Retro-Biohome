<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/2.png">
  <title>Listado agronomo</title>
  <!-- Bo con PHPotstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Iconos -->
  <script src="https://kit.fontawesome.com/f368768ce7.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <header class="text-center">
      <h1 class="text-primary">Campo Agricola</h1>
      <hr>
      <p class="lead">Lo mejor del cuidado agronomo <br> <br>
        <img src="https://www.wallpapertip.com/wmimgs/31-311431_4k-wallpaper-agriculture.jpg" class="img-fluid rounded mx-auto d-block ">
      </p>
    </header>


    <div class="row">
      <div class="col-lg-6">
        <form action="" method="post" class="col-lg-5">
          <h3>Compra de producto</h3>
          Codigo:
          <!-- <input type="text" name="nombre" class="form-control"> -->
          <select name="selid" id="" class="form-select bg-info">
            <?php
            include("../validar/cone.php");
            $evalua = $mysqli->query("SELECT `id` FROM `productos`");
            /* echo '<option value=>Selecciona una opción </option>'; */
            while ($resultado = mysqli_fetch_array($evalua)) {
              echo '<option value="' . $resultado['id'] . '">' . $resultado['id'] . '</option>';
            }
            ?>
          </select>
          <input type="submit" value="Buscar" class="btn btn-outline-success " name="mostrar"><br>
          <?php
          error_reporting(0);
          include("../validar/cone.php");
          if (isset($_POST['mostrar'])) {
            $cod = $_POST['selid'];
            if ($resultado = mysqli_query($mysqli, "SELECT * FROM productos Where id='$cod'")) {
              while ($mostrar = mysqli_fetch_array($resultado)) {
                /* echo "Nombre: <input type='text' name='nombre' disabled value='" . $mostrar['nombre'] . "' class='form-control'>";
                echo "Precio: <input type='text' name='precio' disabled value='" . $mostrar['precio'] . "' class='form-control'>";
                echo "Marcca: <input type='text' name='marca' disabled value='" . $mostrar['marca'] . "' class='form-control'>"; */
                $id = $mostrar['id'];
                $nombre = $mostrar['nombre'];
                $precio = $mostrar['precio'];
                $marca = $mostrar['marca'];
              }
            }
          }

          ?>
          <br>
        </form>
      </div>
      <div class="col-lg-6">
        <hr>
        <form action="#" method="post" class="col-lg-8">
          Codigo: <input type="text" name="codigo" class="form-control" value=<?php echo $id; ?>>
          Nombre: <input type="text" name="nombre" class="form-control" value=<?php echo $nombre; ?>>
          Precio: <input type="text" name="precio" class="form-control" value=<?php echo $precio; ?>>
          Marca: <input type="text" name="marca" class="form-control" value=<?php echo $marca; ?>>
          Cantidad: <input type="number" name="cantidad" class="form-control" max="99" min="0" required maxlength="2"><br>
          <a href="../Navbarforms/comprapdf.php ">
            <input type="submit" value="Comprar" class="btn btn-outline-dark " name="comprar">
          </a>
          <?php
          include("../validar/cone.php");
          include("../validar/logcompra.php");
          if (isset($_POST['comprar'])) {
            $cod = $_REQUEST['codigo'];
            $nom = $_REQUEST['nombre'];
            $precio = $_REQUEST['precio'];
            $marca = $_REQUEST['marca'];
            $clienteC = $cliente;
            $telefonoC =$telefono;
            $cant=$_REQUEST['cantidad'];
            if ($cant == "") {
              echo "<script> alert('Los campos son obligatorios')</script>";
            } else {
              $insert = mysqli_query($mysqli, "INSERT INTO `compras`(`id_pro`, `nombre`, `precio`, `marca`, `cliente`, `telefono`, `cant`)
            VALUES ('$cod','$nom','$precio','$marca','$clienteC','$telefonoC','$cant')");
              echo "<script> alert('Se registro correctamente');window.location='../Navbarforms/comprapdf.php'</script>";
            }
          }

          ?>
        </form>
      </div>
    </div>
  </div>

  <!-- agregar el codigo del footer -->

  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © Página desarrollado por:
      <a class="text-white" href="https://mdbootstrap.com/">@lumnoSeoane</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>

</html>