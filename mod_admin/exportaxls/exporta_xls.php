<?php ob_start();
include '../database/base.php';

$fech1 = $_POST['txtf1'];
$fech2 = $_POST['txtf2'];


?>
<style type="text/css">

.formato{
    mso-style-parent:style0;
    mso-number-format:"\@";
}

</style>

<?php

//establecemos el timezone para obtener la hora local
date_default_timezone_set('America/Lima');
 
//la fecha y hora de exportación sera parte del nombre del archivo Excel
$fecha = date("d-m-Y H:i:s");
 
//Inicio de exportación en Excel
//header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:application/xls; charset=utf-8");
//----

//header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=IMP_$fecha.csv"); //Indica el nombre del archivo resultante
//header("Pragma: no-cache");
//header("Expires: 0");


//$salida = fopen('php://output', 'w');





$repor = $conexion->query("SELECT  id_rutcliente, glosa,rutsuc, fecha_salida,idnotaventa,idproducto,cantidad,detalleventa.valor as val,cod_vendedor,condicion,dias 
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
where fecha_salida between '$fech1' AND '$fech2'");

?>
<table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
    
   
    <?php foreach ($repor as $fila1) { ?>

        <tbody id=myTable>
            <tr>
                
                <td><?php echo "" ?></td>
                <td><?php echo "" ?></td>    
                <td><?php echo $fila1["id_rutcliente"]; ?></td>
                <td><?php echo $fila1["rutsuc"]; ?></td>
                <td><?php echo $fila1['fecha_salida']; ?></td>
                <td><?php echo $fila1["idnotaventa"]; ?></td>
                <td><?php echo $fila1['fecha_salida']; //fecha vencimiento factura?></td> 
                <td><?php echo "$"; ?></td>
                <td><?php echo "0"?></td>
                <td><?php echo "0" ?></td>
                <td><?php echo $fila1["idproducto"]; ?></td>
                <td><?php echo $fila1["cantidad"]; ?></td>
                <td><?php echo $fila1["val"]; ?></td>
                <td><?php echo "0"; ?></td>
                <td><?php echo "B1"; //bodega que rebaja stock?></td>
                <td><?php echo "310101"; //cuenta venta ?></td>
                <td><?php echo "1003"; //centro de costo?></td>
                <td><?php echo "" //observaciones; ?></td>
                <td><?php echo ""; ?></td>
                <td><?php echo ""; ?></td>
                <td><?php echo ""; ?></td>
                <td><?php echo "";?></td>
                <td><?php echo "";//numero OC?></td>
                <td class="formato"> <?php echo $fila1['cod_vendedor']; ?></td>
                <td><?php echo "1" ;//cod_sucursal?></td>
                <td ><?php echo "1";//glosa pago ?></td>
                <td class="formato"><?php echo $fila1['condicion'];//cod forma de pago?></td>
                <td ><?php echo $fila1['dias']; //dias de vencimiento?></td>  
                <td><?php echo "" ?></td>
                <td><?php echo "" ?></td>         
                <td><?php echo "Vendedor" ?></td>  
            </tr>
        </tbody>
    <?php } ?>
</table>