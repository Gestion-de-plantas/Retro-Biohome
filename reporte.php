<?php
require_once('validar/conexiones.php');
require_once('fpdf/fpdf.php');

//mysqli a BD
//admin's
$sqlad= "SELECT * FROM usuarios";
$resuad=$mysqli->query($sqlad);
//clientes
$sql= "SELECT codigo, nombre, apellidoP, apellidoM, direccion, telefono, distrito, correo FROM cliente";
$resu=$mysqli->query($sql);


//configurar el reporte PDF
$pdf = new FPDF("L","pt","A4");
//añadir una pagina
$pdf->AddPage();

//agregar fecha 
$pdf->SetFont('Times','B',16);
$pdf->Cell(100,80,utf8_decode("Fecha: ".date("d/m/Y")),0,1,"C");

//agregar imagenes
$pdf->Image('img/2.png',20,8,50,50);

/* ADMINS  */
//Tipo,estilo. tamaño de la letra
$pdf->SetFont('Times','B',20);
//Definir color de fuente
$pdf->SetTextColor(93, 173, 226);
$pdf->setX(300);
$pdf->Cell(10,20,utf8_decode('ADMINISTRADORES'),0,1);
$pdf->Ln(1);


//Cuerpo del reporte
$pdf->SetX(200);
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(78, 231, 204);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(50,15,utf8_decode("ID"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("Nombre"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("USERNAME"),1,0,"C",true);
$pdf->Cell(100,15,utf8_decode("EMAIL"),1,0,"C",true);
$pdf->Cell(120,15,utf8_decode("PASSWORD"),1,1,"C",true);



//mostrar los registros almacenados en la tabla cliente
while($admin=mysqli_fetch_array($resuad)){
    $pdf->SetX(200);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(50,15,utf8_decode($admin['id']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($admin['Nombre']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($admin['username']),1,0,"C");
    $pdf->Cell(100,15,utf8_decode($admin['email']),1,0,"C");
    $pdf->Cell(120,15,utf8_decode($admin['password']),1,1,"C");;

}
//conteo
$numero2 = mysqli_num_rows($resuad);
$pdf->SetFont('Times','B',12);
$pdf->Ln(2);
$pdf->setX(200);
$pdf->Cell(0,15,utf8_decode("En total son: ".$numero2." registrados"),0,1);

/* CLIENTES */
//Tipo,estilo. tamaño de la letra
$pdf->Ln(15);
$pdf->SetFont('Times','B',20);
//Definir color de fuente
$pdf->SetTextColor(93, 173, 226);
$pdf->setX(350);
$pdf->Cell(500,20,utf8_decode('CLIENTES'),0,1);

//Cuerpo del reporte
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(195, 155, 211);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetX(100);
$pdf->Cell(50,15,utf8_decode("Codigo"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("Nombre"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("Paterno"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("Materno"),1,0,"C",true);
$pdf->Cell(120,15,utf8_decode("Dirección"),1,0,"C",true);
$pdf->Cell(70,15,utf8_decode("Telefono"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("Distrito"),1,0,"C",true);
$pdf->Cell(100,15,utf8_decode("Correo"),1,1,"C",true);



//mostrar los registros almacenados en la tabla cliente
while($cliente=mysqli_fetch_array($resu)){
    $pdf->SetX(100);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(50,15,utf8_decode($cliente['codigo']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($cliente['nombre']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($cliente['apellidoP']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($cliente['apellidoM']),1,0,"C");
    $pdf->Cell(120,15,utf8_decode($cliente['direccion']),1,0,"C");
    $pdf->Cell(70,15,utf8_decode($cliente['telefono']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($cliente['distrito']),1,0,"C");
    //echo "<td>" . $correo = $mostrar['correo'] . "</td>";
    $pdf->Cell(100,15,utf8_decode($cliente['correo']),1,1,"C");
  /*   $pdf->Cell(100,15,utf8_decode($cliente['foto']),1,0,"C");
    $pdf->Cell(50, 15, $pdf->Image($image, $pdf->GetX()+18, $pdf->GetY()+1, 15), 1, 1, "C");  */


}
//conteo
$numero = mysqli_num_rows($resu);
$pdf->SetFont('Times','B',12);
$pdf->Ln(2);
$pdf->SetX(100);
$pdf->Cell(0,15,utf8_decode("En total son: ".$numero." registrados"),0,1);

$pdf->Output(/* 'reporte.pdf',"d" */);

?>