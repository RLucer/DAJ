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
}

?>

<?php

//responder la consulta y mostra la denuncia 
include '../database/base.php';;
$consulta = "SELECT  iddb_detalledelito,fecha_delito, detalledelito, direcciondelito, comuna, iddelincuente,db_personas.nombres, db_personas.apaterno,db_personas.amaterno,estado, iddb_rut
from db_denuncia
join db_personas
on db_denuncia.iddelincuente=db_personas.iddb_persona
join db_detallede
on db_denuncia.iddetalle=db_detallede.iddb_detalle
join db_comuna
on db_denuncia.idcomuna_denun=db_comuna.iddb_comuna
join db_estado
on db_personas.idestado=db_estado.iddb_estado
join db_usuarios
on db_denuncia.usuarioingreso=db_usuarios.iddb_rut
order by iddb_detalledelito desc  ";
$resultado = mysqli_query($conexion, $consulta);
$nrow = mysqli_num_rows($resultado);

if ($nrow == 0) { ?>
    <script>
        alert('NO fue posible encontrar acto delictual asociado al Rut Ingresado');
    </script>

<?php
    //no encuentra persona pide q la cree y da link
    echo '<p class="alert alert-danger agileits" role="alert">Para Ingresar un acto delictual a un criminal ';
    echo '<p class="alert alert-info agileits" role="alert"><a href="http://localhost/intranet/mod_admin/vista/denuncia.php"> Pinche aquí</a>';
} else { ?>




    <div class="container">

        <div class="table-responsive">
            <caption>Lista Delitos Cometidos </caption><br>
            <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">

                <thead>
                    <tr>
                       <!-- <th>Correlativo</th>-->
                        <th>Fecha Delito</th>
                        <th>Delito</th>
                        <th>Dirección Delito</th>
                        <th>Comuna</th>
                        <th>Rut Delincuente</th>
                        <th>Nombres</th>
                        <th>A. Paterno</th>
                        <th>A. Materno</th>
                        <th>Estado</th>
                        <th>Usuario Ingreso</th>

                    </tr>
                </thead>
                <?php foreach ($resultado as $fila) { ?>
                    <tbody id=myTable>
                        <tr>
                            <!--<td><?php echo $fila["iddb_detalledelito"]; ?></td>-->
                            <td><?php echo $fila["fecha_delito"]; ?></td>
                            <td><?php echo $fila["detalledelito"]; ?></td>
                            <td><?php echo $fila["direcciondelito"]; ?></td>
                            <td><?php echo $fila["comuna"]; ?></td>
                            <td><?php echo $fila["iddelincuente"]; ?></td>
                            <td><?php echo $fila["nombres"]; ?></td>
                            <td><?php echo $fila["apaterno"]; ?></td>
                            <td><?php echo $fila["amaterno"]; ?></td>
                            <td><?php echo $fila["estado"]; ?></td>
                            <td><?php echo $fila["iddb_rut"]; ?></td>

                        </tr>
                    </tbody>
                <?php } ?>
            </table>









        <?php
    }

        ?>