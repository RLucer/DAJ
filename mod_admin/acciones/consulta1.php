<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if ($varsesion == null || $varsesion == '') {
    echo "<h2> Ud NO cuenta con autorización debe loguear primero <h2> <br>  ";
?>
    <a class="nav-link" href="/intranet_girona/login/index.php"> pinche aquí para Loguearse</a>
<?php
    die();
} ?>
<!--<link rel="stylesheet" href="../../login/main.css">-->
<?php

if (isset($_POST['cbx_cliente']))
    $cbx_cliente = $_POST['cbx_cliente'];
if (isset($_POST['fecha_desde']))
    $fecha_desde = $_POST['fecha_desde'];
    $fecha_desde = $_POST['fecha_desde'];
if (isset($_POST['fecha_hasta']))
    $fecha_hasta = $_POST['fecha_hasta'];
if (isset($_POST['fecha_desde2']))
    $fecha_desde2 = $_POST['fecha_desde2'];
if (isset($_POST['fecha_hasta2']))
    $fecha_hasta2 = $_POST['fecha_hasta2'];



include '../database/base.php';

$consulta = "SELECT fecha_documento, sum(monto_total)as total_vta, sum(cantidad)as cant, producto,precio_venta, max(precio_venta)as maximo, min(precio_venta) as minimo, round(avg(precio_venta),0    ) as precio_promedio
            FROM girona_app.ventas
            where cliente='$cbx_cliente' AND  fecha_documento between '$fecha_desde' and '$fecha_hasta' AND documento='FACTURA'
            group by  producto
            order by producto asc";

$resultado = mysqli_query($conexion, $consulta);
$nrow = mysqli_num_rows($resultado);



$consulta2 = "SELECT fecha_documento, sum(monto_total)as total_vta2, sum(cantidad) as cant, producto,precio_venta, max(precio_venta)as maximo, min(precio_venta) as minimo, round(avg(precio_venta),0) as precio_promedio
            FROM girona_app.ventas
            where cliente='$cbx_cliente' AND  fecha_documento between '$fecha_desde2' and '$fecha_hasta2' AND documento='FACTURA'
            group by  producto 
            order by producto asc";

$resultado2 = mysqli_query($conexion, $consulta2);
$nrow2 = mysqli_num_rows($resultado2);
function formatMoney($number, $fractional = false)
{
    if ($fractional) {
        $number = sprintf('%,2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}



if ($nrow == 0) {
    echo "error ";
} else { ?>

    <div class="row">
        <!--<div class="col-md-1">


        </div>-->
        <div class="col-md-6">
            <div class="table-responsive-md">
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">P. Maximo</th>
                            <th scope="col">P. Minimo</th>
                            <th scope="col">P. Prom Ponderado</th>
                            <th scope="col">Monto $ Venta</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = "0";
                        $tot="0";
                        foreach ($resultado as $fila) { ?>

                            <tr>

                                <td><?php echo $fila["producto"]; ?></td>
                                <td><?php echo formatMoney($fila["cant"]);
                                    $sum = $sum + $fila["cant"]; ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["precio_venta"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["maximo"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["minimo"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["precio_promedio"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["total_vta"]); 
                                    $tot = $tot + $fila["total_vta"]; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>TOTALES</td>
                            <td><?php echo " " . formatMoney($sum); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo "$"." " . formatMoney($tot); ?></td>
                        </tr>




                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="table-responsive-md">
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">P. Maximo</th>
                            <th scope="col">P. Minimo</th>
                            <th scope="col">P. Prom Ponderado</th>
                            <th scope="col">Monto $ Venta</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $sum2 = "0";
                        $tot2 = "0";

                        foreach ($resultado2 as $fila2) { ?>

                            <tr>

                                <td><?php echo $fila2["producto"]; ?></td>
                                <td><?php echo formatMoney($fila2["cant"]);
                                    $sum2 = $sum2 + $fila2["cant"]; ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["precio_venta"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["maximo"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["minimo"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["precio_promedio"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["total_vta2"]); 
                                    $tot2 = $tot2 + $fila2["total_vta2"]; ?></td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <td>TOTAL EN KG : </td>
                            <td><?php echo " " . formatMoney($sum2); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo " " . formatMoney($tot2); ?></td>
                        </tr>





                    </tbody>
                </table>
            </div>
        </div>
       <!-- <div class="col-md-1"></div>-->
    </div>
<?php





















} ?>