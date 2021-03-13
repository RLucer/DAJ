<?php
include 'plantilla.php';

include '../../database/database.php';
$cxi = new database();
$data = $cxi->consultar("SELECT iddb_persona,apaterno,amaterno,nombres,fnacimiento,apodo,direccion,comuna,estado 
FROM db_crimen.db_personas
join db_estado
on db_personas.idestado=db_estado.iddb_estado
join db_comuna
on db_personas.idcomuna=db_comuna.iddb_comuna
order by apaterno asc"); 


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(180,10, 'Delincuentes Ordenados Alfabeticamente por apellido',1,1,'');
$pdf->Cell(20, 6, 'RUT', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'APATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'AMATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'NOMBRES', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'F.NACIMI', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'APODO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'DIRECCION', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'COMUNA', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'ESTADO', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 8);
/*
while ($row = $data->fetch_assoc()) {
    $pdf->Cell(30, 6, utf8_decode($row['iddb_persona']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['nombres']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($row['apaterno']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($row['apodo']), 1, 1, 'C');
}*/

 foreach ($data as $fila) { 
             
        $pdf->Cell(20, 6, utf8_decode($fila["iddb_persona"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["apaterno"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["amaterno"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["nombres"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["fnacimiento"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["apodo"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["direccion"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["comuna"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["estado"]), 1, 1, 'C');
}




$pdf->Output();

?>