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

<!-- aca la barra de menu horizontal --
<nav class="navbar navbar-expand-sm bg-light ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../../login/index.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Sector Ciudad</a>
        </li>
    </ul>
</nav>
<br>
<!-----------------menu vertical--------------------



<div class="container-fluid">
    <!-- columna para el menu
    <div class="row">
        <div class="col-sm-2">
            <div class="list-group">
                <a href="../../login/index.php" class="list-group-item list-group-item-action">HOME</a>
                <a href="../vista/institucion.php" class="list-group-item list-group-item-action">Instituciones</a>
                <a href="../vista/usuario.php" class="list-group-item list-group-item-action">Usuarios</a>  
                <a href="../vista/delito.php" class="list-group-item list-group-item-action">Delitos</a>
                <a href="../vista/persona.php" class="list-group-item list-group-item-action">Personas</a>
                <a href="../vista/denuncia.php" class="list-group-item list-group-item-action">Denuncias</a>
                <a href="../vista/reporte.php" class="list-group-item list-group-item-action">Reportes</a>
                <a href="../vista/sector.php" class="list-group-item list-group-item-action">Sectores</a>
                <nav class="navbar  bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../vista/sector.php">Sectores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vista/comuna.php">Comunas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vista/ciudad.php">Ciudades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vista/region.php">Regiones</a>
                        </li>
                    </ul>
            </div>
        </div>

 <!-- script javascript para poder editar-->






<nav class="navbar sticky-top  navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
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
                    <a class="dropdown-item" href="../vista/persona.php"> Delincuentes </a>
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
                    <a class="dropdown-item active" href="../vista/ciudad.php"> Ciudades </a>
                    <a class="dropdown-item" href="../vista/region.php"> Regiones </a>
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
                    <a class="dropdown-item" href="../vista/reporte_geo.php"> Reportes Geolocalizados</a>

                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search </button> </form>
    </div>
</nav>


<form action="/intranet/mod_admin/acciones/agregar_ciudad.php" method="post" class="denun">
    <div class="row">
        <div class="col-md-12">
            <h5>
                <center>Gestor de Provincias</center>
            </h5><br>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-1"> </div>

        <div class="col-sm-3">

            <h6>Ingresar Provincia</h6>
            <label for="">Código</label>
            <input type="text" name="txtcodigo">
            <label for="">Nombre de Provincia</label>
            <input type="text" name="txtciudad"><br>
            <select name="inst" id="">
                <?php
                include 'base.php';

                $consulta = "select * from db_region order by region asc ";
                $resultado = mysqli_query($conexion, $consulta);

                ?>
                
                <option selected="true" disabled="disabled" value="">Seleccione la Región</option>
                <?php foreach ($resultado as $opciones) : ?>

                    <option value="<?php echo $opciones['iddb_region'] ?>"> <?php echo $opciones['region'] ?></option>
                <?php endforeach ?>

            </select><br>

            <input type="submit" value="Registrar Provincia">

        </div>
        <div class="col-sm-7">
            <?php
            include '../database/database.php';
            $cxi = new database();
            $data = $cxi->consultar("select iddb_ciudad, ciudad, region
                                    from db_ciudad
                                    join db_region
                                    on db_ciudad.idregion=db_region.iddb_region"); ?>

            <div class="table-responsive-sm">
                <caption>Lista de Provincias</caption>
                <!-- <table class="table table-bordered">-->
                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">


                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Provincia</th>
                            <th>Region</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>

                        </tr>
                    </thead>
                    <?php foreach ($data as $fila) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $fila["iddb_ciudad"]; ?></td>
                                <td><?php echo $fila["ciudad"]; ?></td>
                                <td><?php echo $fila["region"]; ?></td>
                                <td><img src="/intranet/image/editar.png" width="20" onclick="modificar(<?php echo $fila["iddb_ciudad"] ?>)" /></td>
                                <td><img src="/intranet/image/basura.png" width="20" onclick="eliminar(<?php echo $fila["iddb_ciudad"] ?>)" /></td>

                            </tr>
                        </tbody>
                    <?php } ?>
                </table>

            </div>

        </div>

        <div class="col-sm-1"></div>


    </div>

</form>


<script>
    function modificar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/modificar_ciudad.php?parametro=" + cod;
    }

    function eliminar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/eliminar_ciudad.php?parametro=" + cod;
    }
</script>















<?php
include_once '../layout/footer.php'
?>