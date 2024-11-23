<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet</title>
  <link rel="shortcut icon" href="../img/2.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- fontawesone -->
    <script src="https://kit.fontawesome.com/2c55bdff64.js" crossorigin="anonymous"></script>
    <style>
        body {
            height: 800px;
            background-image: url("https://media.giphy.com/media/USVgVUitCduCP9DjKo/giphy.gif");
            background-size: cover;
            background-size: 95rem;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center text-primary display-1 fw-bold">REGISTRO DEL NUEVO CLIENTE</h1>
            <div class="col-lg-6 mx-auto my-150px">
            <br><br><br>
                <form action="" method="POST">

                    <!-- <img src="img/res.jpg" alt=""><br><br> -->
                    <table class="table table-dark table-hover">
                        <tr>
                            <!-- CODIGO -->
                            <td>
                                <label class="codi">Codigo:</label>
                            </td>
                            <td>
                                <!-- <input type="text" class="cod" name="codigo" maxlength="5" id=""> -->
                                <select name="codigo" id="">
                                    <?php
                                    include("../validar/conexiones.php");
                                    $evalua = $mysqli->query("SELECT codigo FROM cliente");
                                    echo '<option value=>Selecciona una opción </option>';
                                    while ($resultado = mysqli_fetch_array($evalua)) {
                                        echo '<option value="' . $resultado['codigo'] . '">' . $resultado['codigo'] . '</option>';
                                    }
                                    ?>

                                </select>



                                <!-- <select name="codigo" >

                                    
                                </select> -->
                            </td>
                        </tr>
                        <tr>
                            <!-- NOMBRE -->
                            <td>
                                <label class="nomb">Nombre:</label>
                            </td>
                            <td>
                                <input type="text" class="nom" name="nombre" size="50px" maxlength="50" id="">
                            </td>
                        </tr>
                        <tr>
                            <!-- PATERNO -->
                            <td>
                                <label class="pate">Paterno:</label>
                            </td>
                            <td>
                                <input type="text" class="pat" name="paterno" size="50px" maxlength="50" id="">
                            </td>
                        </tr>
                        <tr>
                            <!-- MATERNO -->
                            <td>
                                <label class="mate">Materno:</label>
                            </td>
                            <td>
                                <input type="text" class="mat" name="materno" size="50px" maxlength="50" id="">
                            </td>
                        </tr>
                        <tr>
                            <!-- DIRECCION -->
                            <td>
                                <label class="dire">Direccion:</label>
                            </td>
                            <td>
                                <input type="text" class="dir" name="direccion" size="50px" maxlength="50" id="">
                            </td>
                        </tr>
                        <tr>
                            <!-- TELEFONO -->
                            <td>
                                <label class="tele">Telefono:</label>
                            </td>
                            <td>
                                <input type="text" class="tel" name="telefono" size="50px" maxlength="9" id="">
                            </td>
                        </tr>
                        <tr>
                            <!--  -->
                            <td>
                                <label class="d">Distrito:</label>
                            </td>
                            <td>
                                <select name="opcion" id="" class="">
                                    <option value="1">selecciona una opcion </option>
                                    <option value="sjl">san juan de lurigancho </option>
                                    <option value="surco">surco</option>
                                    <option value="breña">breña</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="correo">Correo Electronico</label>
                            </td>
                            <td>
                                <input type="text" class="ce" name="correo" size="40px" maxlength="50" id="">
                            </td>
                        </tr>
                    </table>
                    <!-- Botones -->
                    <input type="submit" class="re" name="registrar" value="registrar" size="15px" id="">
                    <a href="../Navbarforms/productospdf.php">
                        <input type="button" class="mr" name="mostrar" value="Mostrar Productos" size="15px" id="">
                    </a>
                    <input type="submit" class="br" name="eliminar" value="borrar" size="15px" id="">
                    <input type="submit" class="" name="actualizar" value="actualizar" size="15px">
                    <a href="../reporte.php">
                        <input type="button" name="" value="Importar a PDF" id="">
                    </a> 
                    <a href="../index.php">
                        <button type="button" class="btn btn-danger" size="15px">Salir</button>
                    </a>
                    <br><br>

                    <?php
                    include("../validar/conexiones.php");
                    if (isset($_POST['registrar'])) {
                        $cod = $_REQUEST['codigo'];
                        $nom = $_REQUEST['nombre'];
                        $pat = $_REQUEST['paterno'];
                        $mat = $_REQUEST['materno'];
                        $dir = $_REQUEST['direccion'];
                        $tel = $_REQUEST['telefono'];
                        $dis = $_REQUEST['opcion'];
                        $correo = $_REQUEST['correo'];

                        if ($cod == "" or $nom == "" or $pat == "" or $mat == "" or $dir == "" or $correo == "") {

                            echo "<script> alert('Los campos son obligatorios')</script>";
                        } else {
                            $insert = mysqli_query($mysqli, "INSERT INTO `cliente`(`codigo`, `nombre`, `apellidoP`, `apellidoM`, `direccion`, `telefono`, `distrito`, `correo`)
    VALUES ('$cod','$nom','$pat','$mat','$dir','$tel','$dis','$correo')");
                            echo "<script> alert('Se registro correctamente')</script>";
                        }
                    }


                    //boton eliminar
                    if (isset($_POST['eliminar'])) {
                        $cod = $_POST['codigo'];
                        //crear variable consulta
                        $consulta = mysqli_query($mysqli, "SELECT `codigo` FROM `cliente` WHERE `codigo`='$cod'");
                        //estructura if
                        if ($recorrido = mysqli_fetch_array($consulta)) {
                            mysqli_query($mysqli, "DELETE FROM `cliente` WHERE `codigo`='$cod'");
                            echo "<script> alert('Se eliminó correctamente')</script>";
                        }
                    }




                    //boton actualizar
                    if (isset($_POST['actualizar'])) {
                        $cod = $_REQUEST['codigo'];
                        $nom = $_REQUEST['nombre'];
                        $pat = $_REQUEST['paterno'];
                        $mat = $_REQUEST['materno'];
                        $dir = $_REQUEST['direccion'];
                        $tel = $_REQUEST['telefono'];
                        $dis = $_REQUEST['opcion'];
                        $correo = $_REQUEST['correo'];
                        if ($cod == "" or $nom == "" or $pat == "" or $mat == "" or $dir == "" or $correo == "") {

                            echo "los campos son obligatorios";
                        } else {
                            $insert = mysqli_query($mysqli, "UPDATE `cliente` SET `nombre`='$nom',`apellidoP`='$pat',
        `apellidoM`='$mat',`direccion`='$dir',`telefono`='$tel',`distrito`='$dis',`correo`='$correo' WHERE `codigo`='$cod'");
                            echo "<script> alert('Se actualizo correctamente')</script>";
                        }
                    }

                    ?>

                </form>
            </div>
        </div>
    </div>

</body>

</html>