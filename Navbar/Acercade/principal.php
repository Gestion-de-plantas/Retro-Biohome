<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practica_01</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body bgcolor="#6CF26D">
   
    <form action="principal.php" method="POST" enctype="multipart/form-data">
    <center><h1 style="color : red">REGISTRO DEL NUEVO CLIENTE</h1></center>
    <center><img src="img/res.jpg" alt=""><br><br></center>
    <center><label class="codi">codigo:</label>
    <input type="text" class="cod" name="codigo" maxlength="5" id=""><br><br>
    <label class="nomb">nombre:</label>
    <input type="text" class="nom" name="nombre" size="50px" maxlength="50" id=""><br><br>
    <label class="pate">paterno:</label>
    <input type="text" class="pat" name="paterno" size="50px" maxlength="50" id=""><br><br>
    <label class="mate">materno:</label>
    <input type="text" class="mat" name="materno" size="50px" maxlength="50" id=""><br><br>
    <label class="dire">direccion:</label>
    <input type="text" class="dir" name="direccion" size="50px" maxlength="50" id=""><br><br>
    <label class="tele">telefono:</label>
    <input type="text" class="tel" name="telefono" size="50px" maxlength="50" id=""><br><br>
    <label class="d">distrito:</label>
    <select name="opcion" id="">
            
        <option value="1">selecciona una opcion </option>
        <option value="sjl">san juan de lurigancho </option>
        <option value="surco">surco</option>
        <option value="breña">breña</option>
    </select><br><br>
    <label class="correo">correo electronico</label>
    <input type="text"class="ce" name="correo" size="40px" maxlength="50" id=""><br><br>
    <input type="submit" class="re"name="registrar" value="registrar" size="15px" id="">
    <input type="submit" class="mr"name="mostrar" value="mostrar" size="15px" id="">
    <input type="submit" class="ac" name="actualizar" value="actualizar" size="15px" id="">       
    <a href="eliminar.php">eliminar</a>
    <input type="file" class="ft" name="foto" id=""><br><br></center>
   



    <?php
    
    include("conexion.php");
   if (isset($_POST['registrar'])) {
       $cod=$_REQUEST['codigo'];
       $nom=$_REQUEST['nombre'];
       $pat=$_REQUEST['paterno'];
       $mat=$_REQUEST['materno'];
       $dir=$_REQUEST['direccion'];
       $tel=$_REQUEST['telefono'];
       $dis=$_REQUEST['opcion'];
       $correo=$_REQUEST['correo'];
       $nombreimg=$_FILES['foto']['name'];
       $archivo=$_FILES['foto']['tmp_name'];
       $ruta="fotos";
       $ruta=$ruta."/".$nombreimg;
       //guardar imagenes adjuntar//
       move_uploaded_file($archivo,$ruta);
  

       if ($cod=="" or $nom=="" or $pat=="" or $mat=="" or $dir=="" or $nombreimg=="") {

           echo "los campos son obligatorios";
       }else{
           $insert= mysqli_query($conexion,"INSERT INTO clientes(codigo, nombre, apellidoP, apellidoM, direccion, telefono, distrito, correo, foto) 
           VALUES ('$cod','$nom','$pat','$mat','$dir','$tel','$dis','$correo','$ruta')");
           echo "registro exitoso";
        }

    }
    // boton mostrar//
   
    if(isset($_POST['mostrar'])){
        $cod=$_POST['codigo'];
        //consulta
        if($resultados=mysqli_query($conexion,"SELECT * FROM clientes WHERE codigo='$cod'")){
            echo"<table align=center class=tabla border=2 width=250 cellspacing=0 cellpading=5>";
            echo"<th>"."CODIGO"."</th>";
            echo"<th>"."NOMBRE"."</th>";
            echo"<th>"."AP. PATERNO"."</th>";
            echo"<th>"."AM. MATERNO"."</th>";
            echo"<th>"."DIRECCION"."</th>";
            echo"<th>"."TELEFONO"."</th>";
            echo"<th>"."DISTRITO"."</th>";
            echo"<th>"."CORREO"."</th>";
            echo"<th>"."FOTO"."</th>";

            while($mostrar=mysqli_fetch_array($resultados)) {
                echo"<tr>";
                echo"<td>".$cod=$mostrar['codigo']."</td>";
                echo"<td>".$nom=$mostrar['nombre']."</td>";
                echo"<td>".$pat=$mostrar['apellidoP']."</td>";
                echo"<td>".$mat=$mostrar['apellidoM']."</td>";
                echo"<td>".$dir=$mostrar['direccion']."</td>";
                echo"<td>".$tel=$mostrar['telefono']."</td>";
                echo"<td>".$dis=$mostrar['distrito']."</td>";
                echo"<td>".$correo=$mostrar['correo']."</td>";
                echo"<td>".'<img src="'.$foto=$mostrar['foto'].'" width="30" heigth="30">'."</td>";
                 echo"</tr>";
                 echo"<table>";
            }
            
        }else{
            echo"error en la busqueda";
        }

        
    }
    //boton actualizar
    if (isset($_POST['actualizar'])) {
        $cod=$_REQUEST['codigo'];
        $nom=$_REQUEST['nombre'];
        $pat=$_REQUEST['paterno'];
        $mat=$_REQUEST['materno'];
        $dir=$_REQUEST['direccion'];
        $tel=$_REQUEST['telefono'];
        $dis=$_REQUEST['opcion'];
        $correo=$_REQUEST['correo'];
        $nombreimg=$_FILES['foto']['name'];
        $archivo=$_FILES['foto']['tmp_name'];
        $ruta="fotos";
        $ruta=$ruta."/".$nombreimg;
        //guardar imagenes adjuntar//
        move_uploaded_file($archivo,$ruta);
 
        if ($cod=="" or $nom=="" or $pat=="" or $mat=="" or $dir=="" or $nombreimg=="") {
 
            echo "los campos son obligatorios";
        }else{
            $insert= mysqli_query($conexion,"UPDATE `clientes` SET `nombre`='$nom',`apellidoP`='$pat',
            `apellidoM`='$mat',`direccion`='$dir',`telefono`='$tel',`distrito`='$dis',`correo`='$correo',`foto`='$ruta' WHERE `codigo`='$cod'");
            echo "registro exitoso";
         }
 
     }
     
   



    ?>
  </form>

</body>
</html>