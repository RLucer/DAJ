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
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<?php


if (isset($_POST['cbx_producto']))
    $cbx_producto = $_POST['cbx_producto'];
if (isset($_POST['fecha_desde']))
    $fecha_desde = $_POST['fecha_desde'];
  if (isset($_POST['fecha_hasta']))
    $fecha_hasta = $_POST['fecha_hasta'];
if (isset($_POST['fecha_desde2']))
    $fecha_desde2 = $_POST['fecha_desde2'];
if (isset($_POST['fecha_hasta2']))
    $fecha_hasta2 = $_POST['fecha_hasta2'];



include '../database/base.php';

if ($cbx_producto == "TODOS") {
    $consulta = "SELECT  rut,codigo, sum(cantidad) AS KG , cliente , precio_venta, max(precio_venta)as maximo, min(precio_venta) as minimo, ROUND (avg(precio_venta),0) as precio_promedio, sum(monto_total) as vta
    FROM girona_app.ventas
    where fecha_documento between '$fecha_desde' and '$fecha_hasta' and documento='FACTURA'
    group by cliente
    order by cantidad";

    $resultado = mysqli_query($conexion, $consulta);
    $nrow = mysqli_num_rows($resultado);

} else {
    $consulta = "SELECT  rut,codigo, sum(cantidad) AS KG , cliente , precio_venta, max(precio_venta)as maximo, min(precio_venta) as minimo, ROUND (avg(precio_venta),0) as precio_promedio, sum(monto_total) as vta
    FROM girona_app.ventas
    where producto='$cbx_producto' AND  fecha_documento between '$fecha_desde' and '$fecha_hasta' and documento='FACTURA'
    group by cliente
    order by cantidad";

    $resultado = mysqli_query($conexion, $consulta);
    $nrow = mysqli_num_rows($resultado);
}



if ($cbx_producto == "TODOS") {

    $consulta2 = "SELECT  rut,codigo, sum(cantidad) AS KG , cliente , precio_venta, max(precio_venta)as maximo, min(precio_venta) as minimo, ROUND (avg(precio_venta),0) as precio_promedio, sum(monto_total) as vta
    FROM girona_app.ventas
    where fecha_documento between '$fecha_desde2' and '$fecha_hasta2' and documento='FACTURA'
    group by cliente
    order by cantidad";

    $resultado2 = mysqli_query($conexion, $consulta2);
    $nrow2 = mysqli_num_rows($resultado2);


} else {
    $consulta2 = "SELECT  rut,codigo, sum(cantidad) AS KG , cliente , precio_venta, max(precio_venta)as maximo, min(precio_venta) as minimo, ROUND (avg(precio_venta),0) as precio_promedio, sum(monto_total) as vta
    FROM girona_app.ventas
    where producto='$cbx_producto' AND  fecha_documento between '$fecha_desde2' and '$fecha_hasta2' and documento='FACTURA'
    group by cliente
    order by cantidad";

    $resultado2 = mysqli_query($conexion, $consulta2);
    $nrow2 = mysqli_num_rows($resultado2);
}




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

        <div class="col-md-6">
            <div class="table-responsive-md">
                <table class="table table-striped">

                    <thead>
                        <tr>

                            <th scope="col">Cliente</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">P. Maximo</th>
                            <th scope="col">P. Minimo</th>
                            <th scope="col">P. Prom Ponderado</th>
                            <th scope="col">Monto $ Venta</th>
                            <th scope="col">Ver Detalle</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = "0";
                        $tot = "0";
                        foreach ($resultado as $fila) { ?>

                            <tr>


                                <td><?php echo $fila["cliente"]; ?></td>
                                <td><?php echo formatMoney($fila["KG"]);
                                    $sum = $sum + $fila["KG"]; ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["precio_venta"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["maximo"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["minimo"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["precio_promedio"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila["vta"]);
                                    $tot = $tot + $fila["vta"]; ?></td>

                                <td>
                                
                                    <?php if ($cbx_producto == "TODOS") { ?>
                                        <a href="http://localhost/intranet_girona/mod_admin/acciones/detalle.php?parametro=<?php echo $fila['rut']; ?>">Ver..</a>

                                    <?php } else {    ?>


                                        <a href="http://localhost/intranet_girona/mod_admin/acciones/detalle.php?parametro=<?php echo $fila['rut']; ?>&&parametro2=<?php echo $fila['codigo']; ?>">Ver..</a>

                                    <?php } ?>

                                               
                                </td>
                                <td>

                                </td>


                            <?php
                        } ?>










                            <!--img src="/intranet/image/editar.png" width="20" onclick="modificar(<?php echo $fila['"rut"']; ?>, <?php echo $fila['codigo'] ?>)" /-->
                            </td>
                            <!----modal fin---->

                        <?php } ?>
                            <tr>

                                <td>TOTALES</td>
                                <td><?php echo " " . formatMoney($sum); ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td><?php echo "$" . " " . formatMoney($tot); ?></td>
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
                            <!--th scope="col">Ver Detalle</th-->
                            <th scope="col">Cliente</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">P. Maximo</th>
                            <th scope="col">P. Minimo</th>
                            <th scope="col">P. Prom Ponderado</th>
                            <th scope="col">Monto $ Venta</th>
                            <th scope="col">Ver Detalle</th>



                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sum2 = "0";
                        $tot2 = "0";

                        foreach ($resultado2 as $fila2) { ?>

                            <tr>

                                <td><?php echo $fila2["cliente"]; ?></td>
                                <td><?php echo formatMoney($fila2["KG"]);
                                    $sum2 = $sum2 + $fila2["KG"]; ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["precio_venta"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["maximo"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["minimo"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["precio_promedio"]); ?></td>
                                <td><?php echo "$" . " " . formatMoney($fila2["vta"]);
                                    $tot2 = $tot2 + $fila2["vta"]; ?></td>
                                    <td>
                                    </td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <!--td></td-->
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

    </div>
    <?php





    ?>
    <script>
        function modificar(cod, cod2) {
            var num = cod

            alert(num);
            // window.location = "http://localhost/intranet_girona/mod_admin/acciones/detalle.php?parametro=" + cod + "parametro2"+ cod2;
            // <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
            //  window.location.href = 'http://localhost/intranet_girona/mod_admin/acciones/detalle.php?parametro=' + encodeURIComponent(cod) +
            //    '&parametro2=' + encodeURIComponent(cod2);
        }
    </script>