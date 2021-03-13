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
                    <a class="dropdown-item" href="../vista/ciudad.php"> Ciudades </a>
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
                    <a class="dropdown-item active" href="../vista/reporte_geo.php"> Reportes Geolocalizados</a>

                </div>
            </li>


        </ul>
    </div>
</nav>
<script>
    function modificar(cod) {
        window.location = "http://localhost/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=" + cod;
    }

    function eliminar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/eliminar.php?parametro=" + cod;
    }
</script>


<form action="" class="denun">
    <div class="row">
        <div class="col-md-12">
            <h5>
                <center>Reportes Geolocalizados</center>
            </h5><br>
        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="listo-group">
                <a href="" class="list-group-item list-group-item-action active">Ubicación </a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delincuente.php" class="list-group-item list-group-item-action" target="iframe_a">Residencia Delincuentes</a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=1" class="list-group-item list-group-item-action" target="iframe_a">Delitos Sexuales</a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=2" class="list-group-item list-group-item-action" target="iframe_a">Delitos Corrupción</a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=3" class="list-group-item list-group-item-action" target="iframe_a">Delitos de Drogas</a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=4" class="list-group-item list-group-item-action" target="iframe_a">Delitos Crimen Organizado</a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=5" class="list-group-item list-group-item-action" target="iframe_a">Delitos Económicos</a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=6" class="list-group-item list-group-item-action" target="iframe_a">Delitos Contra el Medio Ambiente</a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=7" class="list-group-item list-group-item-action" target="iframe_a">Delitos Violentos</a>
                <div class="dropdown-divider"></div>
                <a href="/intranet/mod_admin/vista/localizador/mapa_delito.php?parametro=8" class="list-group-item list-group-item-action" target="iframe_a">Delitos Intrafamiliar</a>




            </div>
        </div>

        <div class="col-md-9">



            <div class="embed-responsive embed-responsive-16by9">
                <iframe name="iframe_a" class="embed-responsive-item" allowfullscreen></iframe>
            </div>



        </div>






    </div>

</form>



<?php
include_once '../layout/footer.php'
?>