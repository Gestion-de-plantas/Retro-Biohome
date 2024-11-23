<?php
require_once('../validar/cone.php');
require_once('../fpdf/fpdf.php');

//configurar el reporte PDF
$pdf = new FPDF("L","pt","A4");
//añadir una pagina
$pdf->AddPage();

//agregar imagenes
$pdf->Image('../img/logo.png',20,8,50,50);

$sql3= "SELECT * FROM plantas";
$resu3=$mysqli->query($sql3);
//Tipo,estilo. tamaño de la letra
$pdf->SetFont('Times','B',20);
//Definir color de fuente
$pdf->SetTextColor(93, 173, 226);
$pdf->SetX(350);
$pdf->Cell(500,20,utf8_decode('PLANTAS'),0,1);

//Cuerpo del reporte hortalizas 
$pdf->Ln(15);
$pdf->SetX(280);
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(195, 155, 211);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(50,15,utf8_decode("Codigo"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("Nombre"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("Precio"),1,0,"C",true);
$pdf->Cell(80,15,utf8_decode("Marca"),1,1,"C",true);

//mostrar los registros almacenados en la tabla cliente
while($producto=mysqli_fetch_array($resu3)){
    $pdf->SetX(280);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(50,15,utf8_decode($producto['id']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($producto['name']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($producto['precio']),1,0,"C");
    $pdf->Cell(80,15,utf8_decode($producto['section']),1,1,"C");

}
//conteo
$numero3 = mysqli_num_rows($resu3);
$pdf->SetFont('Times','B',12);
$pdf->Ln(2);
$pdf->SetX(280);
$pdf->Cell(0,15,utf8_decode("En total son: ".$numero3." registrados"),0,1);


$pdf->Output(/* 'reporte.pdf',"d" */);

?>
