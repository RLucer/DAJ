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


include_once '../../layout/header.php'; ?>

<?php
$parametro = $_GET["parametro"];
include '../database/database.php';

$obj = new database();
$sql = "select * from usuario where idrut='$parametro'";
$data = $obj->consultar($sql);
foreach ($data as $fila) {
    $rut = $fila["idrut"];
    $nom = $fila["nombre"];
    $apat = $fila["apaterno"];
    $amat = $fila["amaterno"];
    $pass = $fila["password"];

}

?>

<nav class="navbar sticky-top navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- SI PONGO ACA EL CODIGO DEL HOME ESTE QUEDA A LA IZQUIERDA Y EL BOTON A LA DERECHA-->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <!--SI PO DEJO ACA QUEDA EL CODIGO EL BOTON SE VA A LA DERECHA Y EL HOME A LA IZQUIERDA -->
    <a class="navbar-brand" href="../../login/index.php"> MENU </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item "> <a class="nav-link" href="../../login/index.php"> Home <span class="sr-only"> (current) </span></a> </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Ingreso Denuncias </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/denuncia.php"> Ingreso Denuncia Delitos </a>
                    <a class="dropdown-item" href="#"> Consulta Denuncia</a>
                    <a class="dropdown-item" href="#"> Actualizacion Denunica </a>
                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Gestor </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/usuario.php"> Usuarios </a>
                    <a class="dropdown-item" href="../vista/institucion.php"> Instituciones</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/delito.php"> Delitos </a>
                    <a class="dropdown-item" href="../vista/persona.php"> Personas </a>
                </div>
            </li>
            <!-- agregar un link con  <li class="nav-item"> <a class="nav-link" href="#"> Delitos </a> </li> -->
            <!--  este para desactivar un link  <li class="nav-item"> <a class="nav-link disabled" href="#"> Disabled </a> </li>-->
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="../../login/index.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sectores </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/sector.php"> Sectores </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/comuna.php"> Comunas</a>
                    <a class="dropdown-item" href="../vista/ciudad.php"> Ciudades </a>
                    <a class="dropdown-item" href="../vista/region.php"> Regiones </a>
                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Reportes </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#"> Reporte 1 </a>
                    <a class="dropdown-item" href="#"> Reporte 2</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Reporte 3 </a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search </button> </form>
    </div>
</nav>

<form action="/intranet_copan/mod_admin/acciones/agregar_usuario.php" method="post" class="denun">
    <div class="row">
        <div class="col-md-1"> </div>
        <div class="col-md-8">


            <h6>Modificar PASSWORD de Usuario</h6>
            <input type="text" name="txtrut" value="<?php echo $rut ?>" readonly=»readonly><br>
            <input type="text" name="txtnombre" value="<?php echo $nom ?> " readonly=»readonly><br>
            <input type="text" name="txtapaterno" value="<?php echo $apat ?>" readonly=»readonly><br>
            <input type="text" name="txtamaterno" value="<?php echo  $amat ?>" readonly=»readonly><br>
            <input type="password" name="txtpassword" value="" placeholder="INGRESE NUEVA CONTRASEÑA"><br>
            <!--     <select name="inst" id="">
                     <?php/* include '../vista/base.php';

                        $consulta = "select * from db_institucion";
                        $resultado = mysqli_query($conexion, $consulta); */ ?>

                        <option value="">Elige Institución</option>
                        <?php //foreach ($resultado as $opciones) : 
                        ?>

                            <option value="<?php //echo $opciones['iddb_institucion'] 
                                            ?>"> <?php //echo $opciones['institucion'] 
                                                    ?></option>
                        <?php// endforeach ?>

                    </select><br>

                    <select name="perm" id="">
                        <?php/*  include '../vista/base.php';
                        $consulta = "select * from db_permisos";
                        $resultado = mysqli_query($conexion, $consulta);
                        */?>
                        <option value="">Elige Permisos</option>
                        <?php// foreach ($resultado as $opciones) : ?>

                            <option value="<?php //echo $opciones['iddb_permiso'] 
                                            ?>"> <?php //echo $opciones['permiso'] 
                                                    ?></option>
                        <?php// endforeach ?>

                    </select><br>    -->

            <input type="hidden" name="funcion" value="modificar">
            <input type="hidden" name="parametro" value="<?php echo $rut ?>">
            <input type="submit" value="A C T U A L I Z A R">



        </div>
        <div class="col-md-2">

        </div>
    </div>

    <div class="col-sm-5 text-center">
        <div class="container-fluid text-center">






        </div>
    </div>

</form>


<?php include_once '../../layout/footer.php'; ?>