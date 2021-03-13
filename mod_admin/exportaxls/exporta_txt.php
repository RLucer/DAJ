<?php ob_start();
include '../database/base.php';

$fech1 = $_POST['txtf1'];
$fech2 = $_POST['txtf2'];

$fecha = date("d_m_Y");



$consulta = ("SELECT  id_rutcliente, glosa,rutsuc,idnotaventa,idproducto,cantidad,detalleventa.valor as val,cod_vendedor,condicion,dias, fecha_salida
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
join usuario
on direccion.idrut_usuario=usuario.idrut
join condicion
on cliente.condicion_id=condicion.idcondicion
where fecha_salida between '$fech1' AND '$fech2' ");

$file = "IMP_Venta_$fecha.csv";
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Content-Disposition: attachment; filename=$file");



$resultado2 = mysqli_query($conexion, $consulta);
$nrow = mysqli_num_rows($resultado2);



if ($nrow > 0) {
    $separator = ";";
    $vacio = "";
    $fp = fopen($file, 'w');
    $registro = '';
    fwrite($fp, $registro);
    $u = 1;
    while ($row = mysqli_fetch_array($resultado2)) {


        if ($nrow > $u) {  //cuenta las lineas de la consulta y decide si lleba o no salto de linea la ultima no lleva

            $fechaNueva = date('d-m-Y', strtotime(str_replace('-', '/',  $row['fecha_salida'])));

            $registro = $vacio . $separator . $vacio . $separator . $row['id_rutcliente'] . $separator . $row['rutsuc'] . $separator . $fechaNueva . $separator . $row['idnotaventa'] . $separator . $row['fecha_salida'] . $separator . "$" . $separator . "0" . $separator . "0" . $separator . $row['idproducto'] . $separator . $row['cantidad'] . $separator . $row['val'] . $separator . "0" . $separator . "B1" . $separator . "310101" . $separator . "1003" . $separator . $vacio . $separator . $vacio . $separator . $vacio . $separator . $vacio . $separator . $vacio . $separator . $vacio . $separator . $row['cod_vendedor'] . $separator . "1" . $separator . "1" . $separator . $row['condicion'] . $separator . $row['dias'] . $separator . $vacio . $separator . $vacio . $separator . "Vendedor";
            fwrite($fp, $registro . "\r\n");
        } else {

            $fechaNueva = date('d-m-Y', strtotime(str_replace('-', '/',  $row['fecha_salida'])));

            $registro = $vacio . $separator . $vacio . $separator . $row['id_rutcliente'] . $separator . $row['rutsuc'] . $separator . $fechaNueva . $separator . $row['idnotaventa'] . $separator . $row['fecha_salida'] . $separator . "$" . $separator . "0" . $separator . "0" . $separator . $row['idproducto'] . $separator . $row['cantidad'] . $separator . $row['val'] . $separator . "0" . $separator . "B1" . $separator . "310101" . $separator . "1003" . $separator . $vacio . $separator . $vacio . $separator . $vacio . $separator . $vacio . $separator . $vacio . $separator . $vacio . $separator . $row['cod_vendedor'] . $separator . "1" . $separator . "1" . $separator . $row['condicion'] . $separator . $row['dias'] . $separator . $vacio . $separator . $vacio . $separator . "Vendedor";
            fwrite($fp, $registro);
        }

        $u = $u + 1;
    }
}








fclose($fp);
chmod($file, 0777);


ob_clean();
flush();
readfile($file);
