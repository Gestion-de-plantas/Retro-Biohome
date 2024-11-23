<?php
require_once('../validar/cone.php');
require_once('../fpdf/fpdf.php');

//mysqli a BD
$sql= "SELECT * FROM compras";
$resu=$mysqli->query($sql);

//configurar el reporte PDF
$pdf = new FPDF("P","pt","A5");
//añadir una pagina
$pdf->AddPage();

//agregar imagenes
$pdf->Image('../img/2.png',20,8,50,50);

//encabezado
//Tipo,estilo. tamaño de la letra
$pdf->SetFont('Times','B',20);
//Definir color de fuente
$pdf->SetTextColor(93, 173, 226);
$pdf->Cell(500,20,utf8_decode('Boleta de compra'),0,1,"C");

//agregar fecha 
$pdf->SetFont('Times','B',16);
$pdf->Cell(100,50,utf8_decode("Fecha: ".date("d/m/Y")),0,1,"C");

//Cuerpo del reporte
$pdf->SetX(10);
$pdf->SetFont('Times','B',12);
$pdf->SetTextColor(0, 0, 0);


//mostrar los registros almacenados en la tabla cliente
while($cliente=mysqli_fetch_array($resu)){
    /* $pdf->SetX(10); */
    $pdf->SetFont('Times','',12);
    $pdf->SetX(100);
    $pdf->Cell(10,15,utf8_decode('Codigo del compra: '),0,0);
    $pdf->SetX(220);
    $pdf->Cell(50,15,utf8_decode($cliente['codigo']),0,1);
    $pdf->SetX(100);
    $pdf->Cell(10,15,utf8_decode('Codigo del producto: '),0,0);
    $pdf->SetX(220);
    $pdf->Cell(10,15,utf8_decode($cliente['id_pro']),0,1);
    $pdf->SetX(100);
    $pdf->Cell(10,15,utf8_decode('Producto'),0,0);
    $pdf->SetX(220);
    $pdf->Cell(10,15,utf8_decode($cliente['nombre']),0,1);
    $pdf->SetX(100);
    $pdf->Cell(10,15,utf8_decode('Marca'),0,0);
    $pdf->SetX(220);
    $pdf->Cell(10,15,utf8_decode($cliente['marca']),0,1);
    $pdf->SetX(100);
    $pdf->Cell(10,15,utf8_decode('Cantidad'),0,0);
    $pdf->SetX(220);
    $pdf->Cell(10,15,utf8_decode($cliente['cant']),0,1); 
    $pdf->SetX(100);
    $pdf->Cell(10,15,utf8_decode('Total a pagar: '),0,0);
    $pdf->SetX(220);
    $pdf->Cell(10,15,utf8_decode($cliente['precio']*$cliente['cant']),0,1);



}
$pdf->Image('../img/codigoqr.png',110,200,200,200);
//conteo
/* $numero = mysqli_num_rows($resu);
$pdf->SetFont('Times','B',12);
$pdf->Ln(2);
$pdf->Cell(0,15,utf8_decode("En total son: ".$numero." registrados"),0,1,"C");
 */
$pdf->Output(/* 'compra.pdf',"d" */);

?>