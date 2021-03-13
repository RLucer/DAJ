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
                    <a class="dropdown-item" href="../vista/parentesco.php"> Parentesco </a>
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
                    <a class="dropdown-item active" href="../vista/region.php"> Regiones </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/asignacomuna.php"> Asigna comunas a sector </a>
                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Reportes</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item " href="../vista/reporte.php">Reportes por Delincuente</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/reporte_delito.php">Reportes por Delitos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="../vista/reporte_geo.php"> Reportes Geolocalizados</a>

                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search </button> </form>
    </div>
</nav>




<!-- script javascript para poder editar-->
<script>
    function modificar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/modificar_region.php?parametro=" + cod;
    }

    function eliminar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/eliminar_region.php?parametro=" + cod;
    }
</script>
<!-- primera columna para el desarrollo-->

<form action="/intranet/mod_admin/acciones/agregar.php" method="post" class="denun">
    <div class="row">
        <div class="col-md-12">
            <h5>
                <center>Gestor de Regiones</center>
            </h5><br>
        </div>
    </div>
    <DIV class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-3">

            <h6>Ingresar Región</h6>
            <label for="">Código</label>
            <input type="text" name="txtcodigo"><br>
            <label for="">Nombre de Región</label>
            <input type="text" name="txtinstitucion"><br>
            <input type="submit" value="Registrar Región">
<br><br>
        </div>
        <div class="col-md-7">
            <?php
            include '../database/database.php';
            $cxi = new database();
            $data = $cxi->consultar("select * from db_region"); ?>

            <div class="table-responsive">
                <caption>Lista de Regiones</caption>
                <!--<table class="table table-striped table-bordered" style="margin-bottom: 0">-->
                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Región</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>

                        </tr>
                    </thead>
                    <?php foreach ($data as $fila) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $fila["iddb_region"]; ?></td>
                                <td><?php echo $fila["region"]; ?></td>
                                <td><img src="/intranet/image/editar.png" width="20" onclick="modificar(<?php echo $fila["iddb_region"] ?>)" /></td>
                                <td><img src="/intranet/image/basura.png" width="20" onclick="eliminar(<?php echo $fila["iddb_region"] ?>)" /></td>

                            </tr>
                        </tbody>
                    <?php } ?>
                </table>


            </div>
        </div>
        <div class="col-md-1"></div>


    </DIV>



</form>



<!-- script javascript para poder editar-->
<script>
    function modificar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/modificar.php?parametro=" + cod;
    }

    function eliminar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/eliminar.php?parametro=" + cod;
    }
</script>








<?php
include_once '../layout/footer.php'
?>