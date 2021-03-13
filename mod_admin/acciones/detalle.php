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

<?php include_once '../../layout/header.php';

$pro="";
$cliente = $_GET["parametro"];
$pro = $_GET["parametro2"];

?>
<?PHP
include '../database/base.php';


if($pro == ""){ 
    $consulta3 = "SELECT  * 
    FROM girona_app.ventas
    where  rut='$cliente' AND documento='FACTURA';";
    
    $resultado3 = mysqli_query($conexion, $consulta3);
    $nrow2 = mysqli_num_rows($resultado3);

}else{

    
    $consulta3 = "SELECT  * 
    FROM girona_app.ventas
    where  rut='$cliente'and codigo='$pro' AND documento='FACTURA';";
    
    $resultado3 = mysqli_query($conexion, $consulta3);
    $nrow2 = mysqli_num_rows($resultado3);
    
}


?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <td>cliente
                    <?php foreach ($resultado3 as $f){}
                        echo $f['cliente'];
                    ?>

                    </td>
                </tr>
                <tr>
                    <th scope="col">fecha</th>
                    <th scope="col">factura</th>
                    <th scope="col">producto</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">precio</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($resultado3 as $fila) { ?>

                    <tr>
                        <td><?php echo $fila["fecha_documento"]; ?></td>
                        <td><?php echo $fila["n_documento"]; ?></td>
                        <td><?php echo $fila["producto"]; ?></td>
                        <td><?php echo $fila["cantidad"]; ?></td>
                        <td><?php echo $fila["precio_venta"]; ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <div class="col-sm-3"></div>
</div>





<?php //include_once '../../layout/footer.php'; ?>