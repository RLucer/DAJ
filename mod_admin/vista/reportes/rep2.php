<?php
include 'plantilla.php';
include '../../database/database.php';
include '../../database/base.php';
$d = $_GET['variable1'];
$consulta = "SELECT   *
from  copan_app.notaventa
join detalleventa
on notaventa.idnotaventa=detalleventa.notaventa_id
join direccion
on	notaventa.direccion_id=direccion.iddireccion
join cliente	
on direccion.rutcliente_id=cliente.id_rutcliente
join producto
on producto.idproducto=detalleventa.producto_id
join estado
on notaventa.estado_id=estado.idestado
where fecha_salida='$d'
group by idnotaventa";

$resultado = mysqli_query($conexion, $consulta);
$n = 0;
foreach ($resultado as $fila) {

    $idnota[$n] = $fila["idnotaventa"];
    $rutcli[$n] = $fila["id_rutcliente"];
    $razon[$n] = $fila["razonsoc"];
    $n = $n + 1;
}


/*
var_dump($idnota);
echo"-----";
print_r($idnota);

*/

# code...



$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(30, 9, 'Fecha despacho:', 0, 0, 'C');
$pdf->Cell(40, 9, utf8_decode($d) , 0, 1, 'C');



for ($i = 0; $i < $n; $i++) {
    //echo "valor i:".$i;

    $idno = $idnota[$i];
    $rut =$rutcli[$i];
    $raso=$razon[$i];

    $pdf->SetFillColor(232, 232, 232);
    $pdf->SetFont('Arial', 'B', 9);
   
    $pdf->Cell(30, 4, '', 0, 1, '');
    $pdf->Cell(30, 4, '', 0, 1, '');   
    $pdf->Cell(25, 4, 'Nota Venta    :', 0, 0, '');
    $pdf->Cell(20, 4, utf8_decode($idno), 0, 1, '');
    $pdf->Cell(25, 4, 'Rut Cliente    :     ', 0, 0, '');
    $pdf->Cell(30, 4, utf8_decode($rut), 0, 1, '');
    $pdf->Cell(25, 4, 'Razon Social :', 0, 0, '');
    $pdf->Cell(35, 4, utf8_decode($raso), 0, 1, '');
    $pdf->Cell(30, 4, '', 0, 1, '');   

    $pdf->Cell(20, 6, 'CODIGO', 1, 0, 'C', 1);
    $pdf->Cell(75, 6, 'PRODUCTO', 1, 0, 'C', 1);
    $pdf->Cell(20, 6, 'CANTIDAD', 1, 0, 'C', 1);
    $pdf->Cell(20, 6, 'VALOR', 1, 0, 'C', 1);
    $pdf->Cell(30, 6, 'SUBTOTAL', 1, 1, 'C', 1);

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
            $consulta2 = "select idproducto, producto, cantidad, detalleventa.valor as val
            from  copan_app.notaventa
            join detalleventa
            on notaventa.idnotaventa=detalleventa.notaventa_id
            join direccion
            on	notaventa.direccion_id=direccion.iddireccion
            join cliente	
            on direccion.rutcliente_id=cliente.id_rutcliente
            join producto
            on producto.idproducto=detalleventa.producto_id
            join estado
            on notaventa.estado_id=estado.idestado
            where fecha_salida='$d' and id_rutcliente='$rut';
            ";
    
            $resultado1 = mysqli_query($conexion, $consulta2);
            $nrow = mysqli_num_rows($resultado1);




            $monto=0;

    foreach ($resultado1 as $fila) {
       
        $pdf->Cell(20, 6, utf8_decode($fila["idproducto"]), 1, 0, 'C');
        $pdf->Cell(75, 6, utf8_decode($fila["producto"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["cantidad"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["val"]), 1, 0, 'C');
        $sub=$fila["cantidad"]*$fila["val"];
       
        $pdf->Cell(30, 6, '$'.utf8_decode($sub), 1, 1, 'C');
/*
        $pdf->Cell(20, 6, utf8_decode($fila["fnacimiento"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["apodo"]), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila["direccion"]), 1, 0, 'C');

        $pdf->Cell(20, 6, utf8_decode($fila["estado"]), 1, 1, 'C');
        */
       $monto =$monto + $sub;
    }
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(150, 4, 'Monto Total + IVA:', 0, 0, 'R');
        $monto =
        $pdf->Cell(20, 4, '$'. utf8_decode($monto), 0, 1, 'L');
        $monto=0;
        $pdf->Cell(30, 4, '', 0, 1, '');  


}


$pdf->Output();
