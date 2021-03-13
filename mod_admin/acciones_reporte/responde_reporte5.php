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

include '../database/base.php';


include '../database/database.php';
$cx = new database();
$data = $cx->consultar("SELECT * 
FROM db_crimen.db_parentesco
join db_relacion
on db_parentesco.relacion=db_relacion.iddb_relacion
join db_personas
on db_parentesco.delincuente1=db_personas.iddb_persona");
$data2 =  $cx->consultar("SELECT * 
FROM db_crimen.db_parentesco
join db_relacion
on db_parentesco.relacion=db_relacion.iddb_relacion
join db_personas
on db_parentesco.delincuente2=db_personas.iddb_persona");

?>
<div class="table-responsive ">
    <p>Delincuente con sus Parentescos</p>
    <br>
    <a class="btn btn-success " href="/intranet/mod_admin/vista/reportes/rep5.php">Exporta a PDF</a>
    <br>
    <table class="table table-sm table-thead-light">
        <thead>
            <tr>
            <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>A. Paterno</th>
                <th>A. Materno</th>
                <th>Nombres </th>
                <th>Parentesco de --></th>
                <th>Rut</th>
                <th>A. Paterno</th>
                <th>A. Materno</th>
                <th>Nombres </th>

            </tr>
        </thead>
        <?php foreach ($data2 as $fila2) { ?>
        <?php } ?>

        <tbody id=myTable>
            <?php foreach ($data as $fila) {  ?>
                <tr>
                    <td><?php echo $fila["idparentesco" ]; ?></td>
                    <td><?php echo $fila["iddb_persona" ]; ?></td>
                    <td><?php echo $fila["apaterno"     ]; ?></td>
                    <td><?php echo $fila["amaterno"     ]; ?></td>
                    <td><?php echo $fila["nombres"      ]; ?></td>
                    <td><?php echo $fila["nomrelacion"  ]; ?></td>


                    <td><?php echo $fila2["iddb_persona"]; ?></td>
                    <td><?php echo $fila2["apaterno"    ]; ?></td>
                    <td><?php echo $fila2["amaterno"    ]; ?></td>
                    <td><?php echo $fila2["nombres"     ]; ?></td>



                <?php } ?>

                </tr>
        </tbody>
    </table>


</div>