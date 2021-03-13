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

include_once '../../layout/header.php'; ?>


<nav class="navbar sticky-top navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- SI PONGO ACA EL CODIGO DEL HOME ESTE QUEDA A LA IZQUIERDA Y EL BOTON A LA DERECHA-->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <!--SI PO DEJO ACA QUEDA EL CODIGO EL BOTON SE VA A LA DERECHA Y EL HOME A LA IZQUIERDA -->
    <a class="navbar-brand" href="../../login/index.php"> MENU </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item "> <a class="nav-link" href="../../login/index.php"> Home <span class="sr-only"> (current) </span></a> </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Actos Delictuales </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/denuncia.php"> Ingreso Actos Delictuales </a>
                    <a class="dropdown-item" href="../vista/consultadenuncia.php"> Consulta Actos Delictuales</a>
                    <!--   <a class="dropdown-item" href="#"> Actualizacion Denunica </a>-->
                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Gestor </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/usuario.php"> Usuarios </a>
                    <a class="dropdown-item" href="../vista/institucion.php"> Instituciones</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/delito.php"> Delitos </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/persona.php"> Delincuentes</a>
                    <a class="dropdown-item active" href="../vista/parentesco.php"> Parentesco </a>
                </div>
            </li>
            <!-- agregar un link con  <li class="nav-item"> <a class="nav-link" href="#"> Delitos </a> </li> -->
            <!--  este para desactivar un link  <li class="nav-item"> <a class="nav-link disabled" href="#"> Disabled </a> </li>-->
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sectores </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/sector.php"> Sectores </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/comuna.php"> Comunas</a>
                    <a class="dropdown-item" href="../vista/ciudad.php"> Ciudades </a>
                    <a class="dropdown-item" href="../vista/region.php"> Regiones </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="../vista/asignacomuna.php"> Asigna comunas a sector </a>
                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Reportes</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item " href="../vista/reporte.php">Reportes por Delincuente</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/reporte_delito.php">Reportes por Delitos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/reporte_geo.php"> Reportes Geolocalizados</a>

                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search" id=myInput placeholder="buscador" aria-label="Search"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Buscar en Tabla </button> </form>
    </div>
</nav>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<form action="/intranet/mod_admin/acciones/agregar_parentesco.php" method="post" class="denun">
    <div class="row">
        <div class="col-md-12">
            <h5>
                <center>Gestor de Parentesco </center>
            </h5><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <center>
                <h6>Asignar un Parentesco entre delincuentes</h6>
                <center><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>

        <div class="col-md-3">
            <div text-align: right;>
                <label for="">Paso 1: Delincuente 1</label>
            </div>
            <select name="txtdelincuente1" id="">
                <?php
                include 'base.php';

                $consulta = "select * from db_personas";
                $resultado = mysqli_query($conexion, $consulta);

                ?>
                <option selected="true" disabled="disabled" value="">Seleccione Delincuete</option>
                <?php foreach ($resultado as $opciones) : ?>

                    <option value="<?php echo $opciones['iddb_persona'] ?>"> <?php echo $opciones['iddb_persona'] ?>-<?php echo $opciones['apaterno'] ?>-<?php echo $opciones['nombres'] ?></option>
                <?php endforeach ?>

            </select><br>

        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">
                    Paso 2 : Posee la relación
                </label>
                <select name="parentesco" id="">
                    <?php
                    include 'base.php';

                    $consulta = "select *  from db_relacion";
                    $resultado = mysqli_query($conexion, $consulta);

                    ?>
                    <option selected="true" disabled="disabled" value="">Seleccione Relación Existente</option>
                    <?php foreach ($resultado as $opciones) : ?>

                        <option value="<?php echo $opciones['iddb_relacion'] ?>"> <?php echo $opciones['nomrelacion'] ?></option>
                    <?php endforeach ?>

                </select><br>
            </div>


        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Paso 3: Delincuente 2</label>
                <select name="txtdelincuente2" id="">
                    <?php
                    include 'base.php';
                    $consulta = "select * from db_personas";
                    $resultado = mysqli_query($conexion, $consulta);

                    ?>
                    <option selected="true" disabled="disabled" value="">Seleccione Delincuente</option>
                    <?php foreach ($resultado as $opciones) : ?>

                        <option value="<?php echo $opciones['iddb_persona'] ?>"> <?php echo $opciones['iddb_persona'] ?>-<?php echo $opciones['apaterno'] ?>-<?php echo $opciones['nombres'] ?></option>
                    <?php endforeach ?>

                </select><br>
            </div>
        </div>
        <div class="col-md-2">
            <label for="">Paso 4: Guarda Relación</label>
            <input type="submit" name="" value="Guardar Relación">
        </div>
    </div>
    </div>



    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <?php
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
            <br><br>

            <div class="table-responsive ">
                <p>Delincuente con sus Parentescos</p>
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
                            <th>Eliminar Relación </th>

                        </tr>
                    </thead>
                    <?php foreach ($data2 as $fila2) { ?>



                    <?php } ?>
                    <tbody id=myTable>
                        <?php foreach ($data as $fila) {  ?>
                            <tr>
                                <td><?php echo $fila["idparentesco"]; ?></td>
                                <td><?php echo $fila["iddb_persona"]; ?></td>
                                <td><?php echo $fila["apaterno"]; ?></td>
                                <td><?php echo $fila["amaterno"]; ?></td>
                                <td><?php echo $fila["nombres"]; ?></td>
                                <td><?php echo $fila["nomrelacion"]; ?></td>


                                <td><?php echo $fila2["iddb_persona"]; ?></td>
                                <td><?php echo $fila2["apaterno"]; ?></td>
                                <td><?php echo $fila2["amaterno"]; ?></td>
                                <td><?php echo $fila2["nombres"]; ?></td>
                                <td><img src="/intranet/image/basura.png" width="20" onclick="eliminar(<?php echo $fila["idparentesco"] ?>)" /></td>



                            <?php } ?>

                            </tr>
                    </tbody>
                </table>


            </div>
        </div>
        <div class="col-md-2"></div>

</form>







<!-- script javascript para poder editar-->
<script>
    function modificar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/modificar_comuna.php?parametro=" + cod;
    }

    function eliminar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/eliminar_parentesco.php?parametro=" + cod;
    }
</script>
<!-- primera columna para el desarrollo-->




<?php
include_once '../layout/footer.php'
?>