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
                    <a class="dropdown-item active" href="../vista/persona.php"> Delincuentes </a>
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
                    <a class="dropdown-item" href="../vista/reporte_geo.php"> Reportes Geolocalizados</a>

                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search </button> </form>
    </div>
</nav>
<!-- primera columna para el desarrollo-->



<!--------------------------------------------->

<?php
$rut = $_GET['variable1'];




?>
<?php
include '../database/database.php';
$cxi = new database();
$data = $cxi->consultar("select * from db_personas where iddb_persona='$rut'"); ?>



<?php

foreach ($data as $fila) {

    $rrut           = $fila['iddb_persona'];
    $nombres       = $fila['nombres'];
    $apaterno      = $fila['apaterno'];
    $amaterno      = $fila['amaterno'];
    $apodo         = $fila['apodo'];
    $direccion     = $fila['direccion'];
    $fonoredfija      = $fila['fonoredfija'];
    $email         = $fila['email'];
    $fonomovil       = $fila['fonomovil'];
    $fnacimiento   = $fila['fnacimiento'];
    $sexo          = $fila['sexo'];
    $dultima       = $fila['direccion_ultimaUbica'];
    $idcomuna      = $fila['comuna'];
    $idestado      = $fila['estado'];
    $ultimacomuna  = $fila['utimacomuna'];
}

?>




<!------------------------ --------------------->
<script src="validarRUT.js"></script>


<form action="/intranet/mod_admin/acciones/agregar_persona.php" method="Post" onsubmit="return checkRut(txtrut)" class="denun">

    <div class="row">
        <div class="col-md-2"></div>

        <!--
        <div class="col-md-1">
            <div class="list-group">
                <a href="persona.php" class="list-group-item list-group-item-action ">Ingreso Delincuente</a>
                <a href="consultapersonarut.php" class="list-group-item list-group-item-action">Consulta Delincuente </a>
                <!-- <a href="#" class="list-group-item list-group-item-action active">Modificar Delincuente </a>

            </div>
        </div>
-->

        <div class="col-md-4">
            <h5>Modificar Información de Delincuente</h5>
            <label for="Rut">Rut</label>
            <input type="text" value="<?php echo $rrut ?>" name="txtrut" onblur="return checkRut(txtrut)">
            <label for="nombre">Nombre</label>
            <input type="text" value="<?php echo $nombres ?>" name="txtnombres" required>
            <label for="apaterno">Apellido Paterno</label>
            <input type="text" name="txtapaterno" value="<?php echo  $apaterno ?>">
            <label for="amaterno">Apellido Materno</label>
            <input type="text" name="txtamaterno" value="<?php echo $amaterno ?>">
            <label for="fnacimiento">Fecha de Nacimiento</label>
            <input type="date" name="txtfnacimiento" value="<?php echo $fnacimiento ?>">
            <label for="sexo">Sexo</label>
            <select name="txtsexo" id="">
                <option selected="" value="<?php echo $sexo ?>"><?php echo $sexo ?></option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select><br>
            <label for="apodo">Apodo</label>
            <input type="text" name="txtapodo" value="<?php echo $apodo ?>">
            <label for="fonofijo">Fono red Fija</label>
            +56 2 <input type="number" min="00000001" max="99999999" value="<?php echo $fonoredfija ?>" name="txtfonofijo">
<br>
           
        </div>
        <div class="col-md-4">

            <label for="celular">Fono Movil + 56 9 </label>
            <input type="number" min="00000001" max="99999999" value="<?php echo $fonomovil ?>" name="txtcelular">
            <label for="email">Email</label>
            <input type="email" name="txtemail" value="<?php echo $email ?>">
            <label for="dirección">Dirección Particular</label>
            <input type="text" name="txtdireccion" value="<?php echo $direccion ?>"><br>
            <label for="comuna"><strong> No olvides volver a seleccionar Comuna </strong></label>
            <?php include 'base.php';
            $consulta = "select * from db_comuna order by comuna asc";
            $resultado = mysqli_query($conexion, $consulta);
            ?>
            <select name="txtcomuna">
                <option value="<?php $idcomuna ?>"><?php echo $opciones['comuna']; ?></option>
                <?php foreach ($resultado as $opciones) : ?>
                    <option value="<?php echo $opciones['iddb_comuna']; ?>"><?php echo $opciones['comuna']; ?></option>
                <?php endforeach ?>
            </select><br>
            <fieldset>
                <label for="txtdireccionultima">Dirección Ultima vez Visto</label>
                <input type="text" name="txtdireccionultima" value="<?php echo $dultima ?>"><br>

                <label for="ultima _ comuna"><strong> No olvides volver a seleccionar Comuna </strong></label>
                <?php include 'base.php';
                $consulta = "select * from db_comuna order by comuna asc";
                $resultado = mysqli_query($conexion, $consulta);
                ?>
                <select name="txtultimacomuna">
                    <?php foreach ($resultado as $opciones) : ?>
                        <option value="<?php echo $opciones['comuna']; ?>"><?php echo $opciones['comuna']; ?></option>
                    <?php endforeach ?>
                </select><br>
            </fieldset>

            <label for="estado"><strong> No olvides volver a seleccionar Estado </strong></label>
            <?php $consulta = "select * from db_estado order by estado asc";
            $resultado = mysqli_query($conexion, $consulta);
            ?>
            <select name="txtestado">

                <?php foreach ($resultado as $opciones) : ?>
                    <option value="<?php echo $opciones['iddb_estado']; ?>"><?php echo $opciones['estado']; ?></option>
                <?php endforeach ?>
            </select>
            <br>
            <br>


            <input type="hidden" value="modificar" name="funcion">
            <input type="submit" name="Guardar" value="Guardar">
            <br>
            <a class="btn btn-secondary btn-lg" href="http://localhost/intranet/mod_admin/vista/persona.php">Cancelar</a>




        </div>


        <div class="col-md-2">

        </div>






    </div>


</form>




<?php include_once '../layout/footer.php' ?>