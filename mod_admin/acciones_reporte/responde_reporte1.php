<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if ($varsesion == null || $varsesion == '') {
    echo "<h2> Ud NO cuenta con autorización debe loguear primero <h2> <br>  ";
?>
    <a class="nav-link" href="/intranet/login/index.php"> pinche aquí para Loguearse</a>
<?php
    die();
}?>
<link rel="stylesheet" href="../../login/main.css">
<?php 
if (isset($_POST['idrutcliente'])) {

    $ru = $_POST['idrutcliente'];
} else {
    echo '<script language="javascript">alert("Error de rut");</script>';
}

if (isset($_POST['suc'])) {
    $sucur = $_POST['suc'];
} else {
    echo '<script language="javascript">alert("Error de sucursal");</script>';
}

if ($sucur == 1) {

    $rutcli = $ru;
} else {
    $rutcli = $ru . "-" . $sucur;
}



//responder la consulta y mostra la denuncia 
include '../database/base.php';

$consulta = "SELECT * from deuda_clientes
where rut = '$rutcli'
limit 1";

$resultado2 = mysqli_query($conexion, $consulta);
$nrow = mysqli_num_rows($resultado2);





if ($nrow == 0) { ?>
    <script>
        alert('Cliente NO Presenta Deuda');
    </script>

<?php
    //no encuentra persona pide q la cree y da link
    // echo '<p class="alert alert-danger agileits" role="alert">Para Ingresar un acto delictual a un criminal ';
    //echo '<p class="alert alert-info agileits" role="alert"><a href="http://localhost/intranet/mod_admin/vista/denuncia.php"> Pinche aquí</a>';
} else { ?>

    <?php

    ?>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
     
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"><a class="btn btn-success " href="http://localhost/intranet_copan/mod_admin/vista/reportes/rep2.php?variable1=<?php echo $rutcli ?>">Exporta a PDF</a></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
    </div>
    <br>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
            <div class="table-responsive">
                <?php foreach ($resultado2 as $fila2) { ?>
                    <table>
                        <tr>
                            <?php $hoy = date("d/m/Y");
                            echo "Fecha: " . $hoy; ?>
                        </tr>
                        <tr>
                            <br><br>

                            <th>
                                RUT.......................:
                                <?php echo $fila2["rut"]; ?><br>
                                Cliente..................:
                                <?php echo $fila2["razsoc"]; ?><br>
                                Dirección..............:
                                <?php echo $fila2["dir"] ?><br>
                                Vendedor...............:
                                <?php echo $fila2['pers_nom'] . " " . $fila2['pers_apell'] ?>
                                <br>
                                <br>
                            </th>

                        </tr>
                        <tr>
                            <td>
                                <?php
                                $consulta = "SELECT * from deuda_clientes
                               where rut = '$rutcli'
                               order by numfact desc";

                                $resultado1 = mysqli_query($conexion, $consulta);
                                $nrow = mysqli_num_rows($resultado1);

                                ?>


                                <table class="table table-striped table-bordered table-sm table-hover" cellspacing="0" width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><label for="">Tipo Documento</label></th>
                                            <th><label for="">Folio N°</label></th>
                                            <th><label for="">Fecha Factura</label></th>
                                            <th><label for="">Vencimiento</label></th>
                                            <th><label for="">Monto Fact.</label></th>
                                            <th><label for="">Abono</label></th>
                                            <th><label for="">Saldo x Cancelar</label></th>


                                        </tr>
                                    </thead>

                                    <?php
                                    $TOT = 0;
                                    $atrasado = 0;


                                    foreach ($resultado1 as $fila1) { ?>

                                        <tbody id=myTable >
                                            <tr>
                                                <td><?php echo $fila1["doc_cod"]; ?></td>
                                                <td><?php echo $fila1["numfact"]; ?></td>
                                                <td><?php echo $fila1["fecha"]; ?></td>
                                                <td><?php echo $fila1["vencimie"];
                                                    $ven = $fila1["vencimie"];   ?></td>
                                                <td><?php echo "$" . formatMoney($fila1["debe"]); ?></td>
                                                <td><?php echo "$" . formatMoney($fila1["haber"]); ?></td>
                                                <td><?php echo "$" . formatMoney($fila1["doc_sdo"]);
                                                    ?></td>
                                            </tr>
                                            <?PHP $TOT = $TOT + $fila1["doc_sdo"];

                                            $dt1 = DateTime::createFromFormat('d/m/Y', $hoy);
                                            $dt2 = DateTime::createFromFormat('d/m/Y', $ven);


                                            if ($dt1 > $dt2) {
                                                $atrasado = $atrasado + $fila1["debe"];
                                            }
                                            ?>


                                        </tbody>
                                    <?php } ?>



                                </table>
                                <table  class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">

                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"></div>
                                    <?php $t = formatMoney($TOT);
                                    $atras = formatMoney($atrasado);
                                    $porvencer = $TOT - $atrasado;
                                    ?>

                                    <tr>
                                        <th>Deuda Vencida</th>
                                        <th>Deuda por Vencer</th>
                                        <th>Total Deuda </th>
                                    </tr>
                                    <tr>
                                        <td><?PHP echo "$" . $atras; ?></td>
                                        <td><?PHP echo "$" . formatMoney($porvencer); ?></td>
                                        <td><?PHP echo "$ " . $t; ?></td>
                                    </tr>

                                </table>

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






        <?php



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



        ?>