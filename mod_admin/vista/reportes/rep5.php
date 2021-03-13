<?php
include 'plantilla.php';

include '../../database/database.php';

$cx = new database();
$data = $cx->consultar("SELECT * 
FROM db_crimen.db_parentesco
join db_relacion
on db_parentesco.relacion=db_relacion.iddb_relacion
join db_personas
on db_parentesco.delincuente1=db_personas.iddb_persona");
$data2 =  $cx->consultar("SELECT * 
FROM db_crimen.db_parentesco
join db_relacion
on db_parentesco.relacion=db_relacion.iddb_relacion
join db_personas
on db_parentesco.delincuente2=db_personas.iddb_persona");


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(180,10, 'Delincuentes con Relacion Familiar entre Ellos',1,1,'');
$pdf->Cell(20, 6, 'RUT', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'APATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'AMATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'NOMBRES', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'RELACION', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'RUT', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'APATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'AMATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'NOMBRES', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 8);
/*
while ($row = $data->fetch_assoc()) {
    $pdf->Cell(30, 6, utf8_decode($row['iddb_persona']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['nombres']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($row['apaterno']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($row['apodo']), 1, 1, 'C');
}*/


 foreach ($data2 as $fila2) { 
    } 
 foreach ($data as $fila) { 
             
        $pdf->Cell(20, 6, utf8_decode($fila["iddb_persona"  ]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["apaterno"      ]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["amaterno"      ]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["nombres"       ]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["nomrelacion"   ]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila2["iddb_persona" ]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila2["apaterno"     ]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila2["amaterno"     ]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila2["nombres"      ]), 1, 1, 'C');
}






$pdf->Output();

?>