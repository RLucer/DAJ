<?php
include 'plantilla.php';
include '../../database/database.php';
include '../../database/base.php';


$comuna = $_GET['variable1'];



$consulta = "SELECT iddb_persona,apaterno,amaterno,nombres,apodo,fnacimiento,comuna,direccion,estado
    from db_personas
    join db_comuna
    on db_personas.idcomuna=db_comuna.iddb_comuna
    join db_estado
    on db_personas.idestado=db_estado.iddb_estado
    where iddb_comuna='$comuna'";

$resultado = mysqli_query($conexion, $consulta);

foreach ($resultado as $fila) {

    $com = $fila["comuna"];
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(80, 6, 'Delincuentes agrupados por Comuna de Residencia', 0, 1, '');
$pdf->Cell(30, 15, 'Comuna:', 0, 0, '');

$pdf->Cell(20, 15, utf8_decode($com), 0, 1, 'C');

$pdf->Cell(20, 6, 'RUT', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'APATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'AMATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'NOMBRES', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'F.NACIMI', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'APODO', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'ESTADO', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'DIRECCION', 1, 1, 'C', 1);


$pdf->SetFont('Arial', '', 8);
/*
            while ($row = $del->fetch_assoc()) {
                $pdf->Cell(20, 6, utf8_decode($fila["iddb_persona"]), 1, 0, 'C');
                    $pdf->Cell(20, 6, utf8_decode($fila["apaterno"]), 1, 0, 'C');
                    $pdf->Cell(20, 6, utf8_decode($fila["amaterno"]), 1, 0, 'C');
                    $pdf->Cell(20, 6, utf8_decode($fila["nombres"]), 1, 0, 'C');
                    $pdf->Cell(20, 6, utf8_decode($fila["fnacimiento"]), 1, 0, 'C');
                    $pdf->Cell(20, 6, utf8_decode($fila["apodo"]), 1, 0, 'C');
                    $pdf->Cell(20, 6, utf8_decode($fila["direccion"]), 1, 0, 'C');
                    $pdf->Cell(20, 6, utf8_decode($fila["comuna"]), 1, 1, 'C');
            }*/

foreach ($resultado as $fila) {

    $pdf->Cell(20, 6, utf8_decode($fila["iddb_persona"]), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila["apaterno"]), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila["amaterno"]), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila["nombres"]), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila["fnacimiento"]), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila["apodo"]), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($fila["estado"]), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila["direccion"]), 1, 1, 'C');
   
}



$pdf->Output();
