<?php
if(!empty($_GET['rut'])){
    //DB details
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'girona_app';
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if ($db->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
       
    }
    $rr=$_GET['rut'];

}
    
include '../database/base.php';

$consulta3 = "SELECT  * 
FROM girona_app.ventas
where  rut='$rr'";

$resultado3 = mysqli_query($conexion, $consulta3);
$nrow2 = mysqli_num_rows($resultado3);


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




