<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if ($varsesion == null || $varsesion == '') {
    echo "<h2> Ud NO cuenta con autorización debe loguear primero <h2> <br>  ";
?>
    <a class="nav-link" href="/intrane_copant/login/index.php"> pinche aquí para Loguearse</a>
<?php
    die();
}

?>

<?php

if (isset($_POST['valorCaja1']))
    $fsalida = $_POST['valorCaja1'];




//responder la consulta y mostra la denuncia 
include '../database/base.php';

$consulta = "select  *
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
join comuna
on comuna.idcomuna=direccion.comuna_id
where fecha_salida='$fsalida'
group by idnotaventa";

$resultado2 = mysqli_query($conexion, $consulta);
$nrow = mysqli_num_rows($resultado2);

if ($nrow == 0) { ?>
    <script>
        alert('NO fue posible encontrar Notas de Ventas en la fecha Ingresada');
    </script>

<?php
    //no encuentra persona pide q la cree y da link
    // echo '<p class="alert alert-danger agileits" role="alert">Para Ingresar un acto delictual a un criminal ';
    //echo '<p class="alert alert-info agileits" role="alert"><a href="http://localhost/intranet/mod_admin/vista/denuncia.php"> Pinche aquí</a>';
} else { ?>

    <?php

    ?>



    <div class="row">
        <div class="col-sm-2">
           
        </div>
        <div class="col-sm-7"><br><br>



            <h3>Notas de Venta día: <?php echo $fsalida; ?></h3>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
    
<div class="row">
    <div class="col-sm-1"><a class="btn btn-success " href="http://localhost/intranet_copan/mod_admin/vista/reportes/rep2.php?variable1=<?php echo $fsalida ?>">Exporta a PDF</a></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
</div>


    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-9">
            <div class="table-responsive">



                <?php foreach ($resultado2 as $fila2) { ?>

                    <table>
                        <tr>

                            <th>Nota N°
                                <?php echo $fila2["idnotaventa"];
                                $nvta=$fila2["idnotaventa"]; ?> <br>
                                RUT.......................:
                                <?php echo $fila2["id_rutcliente"]; ?><br>
                                Cliente..................:
                                <?php echo $fila2["razonsoc"]; ?><br>
                                Dirección............:
                                <?php echo $fila2["direccion"] . " Comuna : ".$fila2['comuna']; ?><br>
                                <?php $eserut = $fila2["id_rutcliente"]; ?>
                            </th>

                            <td><img src="/intranet_copan/image/editar.png" width="20" onclick="modificar(<?php echo $fila2["idnotaventa"] ?>)" /></td>
                            <td> </td>
                            <td><img src="/intranet_copan/image/basura.png" width="20" onclick="eliminar(<?php echo $fila2["idnotaventa"] ?>)" /></td>




                        </tr>
                        <tr>

                            <td>

                                <?php
                                $consulta2 = "select  idnotaventa, idproducto, producto, cantidad, detalleventa.valor as val
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
                                where fecha_salida='$fsalida' and id_rutcliente='$eserut' and idnotaventa=$nvta;
                                ";

                                $resultado1 = mysqli_query($conexion, $consulta2);
                                $nrow = mysqli_num_rows($resultado1);


                                ?>


                                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><label for="">Cod Pro</label></th>
                                            <th><label for="">Producto</label></th>
                                            <th><label for="">Cantidad</label></th>
                                            <th><label for="">Valor</label></th>
                                            <th><label for="">Subtotal</label></th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($resultado1 as $fila1) { ?>
                                        <?php $subt = $fila1["val"] * $fila1["cantidad"];
                                        $monto = $monto + $subt;
                                        ?>
                                        <tbody id=myTable>
                                            <tr>
                                                <td><?php echo $fila1["idproducto"]; ?></td>
                                                <td><?php echo $fila1["producto"]; ?></td>
                                                <td><?php echo $fila1["cantidad"]; ?></td>
                                                <td><?php echo $fila1["val"]; ?></td>
                                                <td><?php echo $subt; ?> </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Monto Total Venta: $<?php echo $monto;
                                                    $monto = 0; ?>
                                <br><br><br>
                            </td>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                <?php } ?>
            <?php
        }

            ?>


            </div>
            <div class="col-sm-2"></div>
        </div>





        <!-- script javascript para poder editar-->
        <script>
            function modificar(cod) {
                window.location = "http://localhost/intranet_copan/mod_admin/acciones/modificar_delito.php?parametro=" + cod;
            }

            function eliminar(cod) {
                window.location = "http://localhost/intranet_copan/mod_admin/acciones/eliminar_notadeventa.php?parametro=" + cod;
            }
        </script>