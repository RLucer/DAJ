<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if ($varsesion == null || $varsesion == '') {
    echo "<h2> Ud NO cuenta con autorización debe loguear primero <h2> <br>  ";
?>
    <a class="nav-link" href="/intranet_copan/login/index.php"> pinche aquí para Loguearse</a>
<?php
    die();
}

?>

<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>


<div class="table" id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
    <!-- <caption>Lista de Producto</caption><br>-->
    <!--   <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">

        <thead>
            <tr>
                <th> N°</th>
                <th>Cod_Prod</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Valor</th>
                <th>Subtotal </th>
                <th>Eliminar</th>

            </tr>
        </thead>

        
            <tbody>
                <tr>
                    <td><?php echo $fila2["iddetalle"]; ?></td>
                    <td><?php echo $fila2["cod_prod"]; ?></td>
                    <td><?php echo $fila2["nom_prod"]; ?></td>
                    <td><?php echo $fila2["cantidad"]; ?></td>
                    <td><?php echo $fila2["valor"]; ?></td>
                    <td><?php echo $fila2["subtotal"]; ?></td>

                    <!--    <td><img src="/intranet_copan/image/editar.png" width="20" onclick="modificar(<?php echo $fila2["iddetalle"] ?>)" /></td>
                    <td><img src="/intranet_copan/image/basura.png" width="20" onclick="eliminar(<?php echo $fila2["iddetalle"] ?>)" /></td>
                </tr>
            </tbody>
    
    </table>
-->
    <?php
    include '../database/database.php';
    $cxi2 = new database();
    $data2 = $cxi2->consultar("SELECT * FROM detalle");

    $i = 0; ?>





    <?php
    foreach ($data2 as $fila2) { ?>
        <div class="centrar">
            <div class="row">
                <div class="col-md-1">
                    <input type="text" id="cer"  name="<?php echo 'txtiddetalle' . $i ?>" value=" <?php echo $fila2["iddetalle"]; ?>">
                </div>
                <div class="col-md-2">
                    <input type="text" id="cer"  name="<?php echo 'txtcod_prod' . $i ?>" value="<?php echo $fila2["cod_prod"]; ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" id="cer"  name="<?php echo 'nom_pro' . $i ?>" value="<?php echo $fila2["nom_prod"]; ?>">
                </div>
                <div class="col-md-1">
                    <input type="text" id="cer"  name="<?php echo 'txtcantidad' . $i ?>" value="<?php echo $fila2["cantidad"]; ?>">

                </div>
                <div class="col-md-1">
                    <input type="text" id="cer"  name="<?php echo 'txtvalor' . $i ?>" value="<?php echo $fila2["valor"]; ?>">

                </div>
                <div class="col-md-2">
                    <input type="text" id="cer"  name="<?php echo 'subtotal' . $i ?>" value="<?php echo $fila2["subtotal"]; ?>">
                </div>
                <div class="col-md-1">
                    <td><img src="/intranet_copan/image/basura.png" width="20" onclick="eliminar(<?php echo $fila2["iddetalle"] ?>)" /></td>
                </div>
            </div>
        </div>
        <?php
        $i = $i + 1; ?>


    <?php } ?>

    <!-- script javascript para poder editar-->
    <script>
        function modificar(cod) {


            window.location = "http://localhost/intranet_copan/mod_admin/acciones/modificar_usuario.php?parametro=" + cod;

        }

        function eliminar(cod) {
            window.location = "http://localhost/intranet_copan/mod_admin/acciones/eliminar_detalle.php?parametro=" + cod;
        }
    </script>


</div>