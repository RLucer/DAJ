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


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<nav class="navbar sticky-top navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- SI PONGO ACA EL CODIGO DEL HOME ESTE QUEDA A LA IZQUIERDA Y EL BOTON A LA DERECHA-->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <!--SI PO DEJO ACA QUEDA EL CODIGO EL BOTON SE VA A LA DERECHA Y EL HOME A LA IZQUIERDA -->
    <a class="navbar-brand" href="../../login/index.php"> MENU </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notas de Venta</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/ingresoNV.php"> Ingreso Nota de Venta </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/consulta_notaventa.php"> Consulta Notas de Ventas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/exporta.php"> Exportar Nota de Venta </a>
                    <!--   <a class="dropdown-item" href="#"> Actualizacion Denunica </a>-->
                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Gestor de Datos </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/usuario.php"> Usuarios </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/cliente.php"> Clientes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/producto.php"> Productos </a>


                </div>
            </li>


            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Reportes </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <!--   <a class="dropdown-item" href="../vista/reporte.php"> Reportes por Delicuente</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/reporte_delito.php"> Reportes por Delito</a>
                    <div class="dropdown-divider"></div>-->
                    <a class="dropdown-item disabled" href="../vista/reporte_geo.php"> Clientes Geolocalizados</a>

                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Estado de Cuenta </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/reporte_deuda.php"> Consultar Deuda Cliente</a>
                    <!--   <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/reporte_delito.php"> Reportes por Delito</a>
                    <div class="dropdown-divider"></div>-->
                    <a class="dropdown-item" href="../cargar_info/carga_deuda.php"> Actualizar Deuda</a>

                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Mi Perfil </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/cambiarpw.php"> Cambiar Contraseña </a>
                    <!--  <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="../vista/comuna.php"> Comunas</a>
                    <a class="dropdown-item" href="../vista/ciudad.php"> Ciudades </a>
                    <a class="dropdown-item" href="../vista/region.php"> Regiones </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/asignacomuna.php"> Asignar Comuna a un Sector </a>-->
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search" id=myInput placeholder="buscador" aria-label="Search"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Buscar en Tabla </button> </form>
  
    </div>
</nav><script src="validarRUT.js"></script>
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

<!-- script javascript para poder editar-->
<script>
    function modificar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/modificar.php?parametro=" + cod;
    }

    function eliminar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/eliminar.php?parametro=" + cod;
    }
</script>

<!-- primera columna para el desarrollo-->
<form action="/intranet/mod_admin/acciones/agregar.php" method="post" class="denun">




    <div class="row">
        <div class="col-md-12">
            <h5>
                <center>Gestor de Clientes</center>
            </h5><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-2">
            <h6>Ingresar Cliente</h6>
            <fieldset>
                <br>
                <label for="">RUT</label>
                <input type="text" name="txtrut" onblur="return checkRut(txtrut)">
                <label for="">Nombre de cliente</label>
                <input type="text" name="txtcliente" placeholder=" " required>
                <label for="">Dirección</label>
                <input type="text" name="txtdireccion" placeholder=" " required>
                <label for="">Comuna</label>
                <select name="comuna" id="">
                    <?php
                    include 'base.php';
                    $consulta = "select * from comuna order by comuna asc";
                    $resultado = mysqli_query($conexion, $consulta);
                    ?>
                    <option selected="true" disabled="disabled" value="">Comuna</option>
                    <?php foreach ($resultado as $opciones) : ?>

                        <option value="<?php echo $opciones['idcomuna'] ?>"> <?php echo $opciones['comuna'] ?></option>
                    <?php endforeach ?>

                </select><br>


                <label for="">Condición de Pago</label>
                <select name="condicion" id="">
                    <?php
                    include 'base.php';
                    $consulta = "select * from condicion";
                    $resultado = mysqli_query($conexion, $consulta);
                    ?>
                    <option selected="true" disabled="disabled" value="">Condición de Pago</option>
                    <?php foreach ($resultado as $opciones) : ?>

                        <option value="<?php echo $opciones['idcondicion'] ?>"> <?php echo $opciones['condicion'] ?></option>
                    <?php endforeach ?>

                </select><br>
                <label for="">Tipo de Cliente</label>
                <select name="categoria" id="">
                    <?php
                    include 'base.php';
                    $consulta = "select * from categoria";
                    $resultado = mysqli_query($conexion, $consulta);
                    ?>
                    <option selected="true" disabled="disabled" value="">Categoria</option>
                    <?php foreach ($resultado as $opciones) : ?>

                        <option value="<?php echo $opciones['idcategoria'] ?>"> <?php echo $opciones['categoria'] ?></option>
                    <?php endforeach ?>

                </select><br>
                <label for="">Estado Actual</label>
                <select name="estado" id="">
                    <?php
                    include 'base.php';
                    $consulta = "select * from estado LIMIT 2";
                    $resultado = mysqli_query($conexion, $consulta);
                    ?>
                    <option selected="true" disabled="disabled" value="">Estado</option>
                    <?php foreach ($resultado as $opciones) : ?>

                        <option value="<?php echo $opciones['idestado'] ?>"> <?php echo $opciones['estado'] ?></option>
                    <?php endforeach ?>

                </select><br>

                <label for="">Vendedor Asociado</label>
                <select name="vendedor" id="">
                    <?php
                    include 'base.php';
                    $consulta = "select * from usuario";
                    $resultado = mysqli_query($conexion, $consulta);
                    ?>
                    <option selected="true" disabled="disabled" value=""> Vendedor</option>

                    <?php foreach ($resultado as $opciones) : ?>

                        <option value="<?php echo $opciones['idrut'] ?>"> <?php echo $opciones['nombre'];
                                                                            echo " ";
                                                                            echo $opciones['apaterno'] ?></option>
                    <?php endforeach ?>

                </select><br>





                <input type="hidden" name="roles" value="institucion">
                <input type="hidden" name="funcion" value="0">
                <input type="hidden" name="parametro" value="0>">
                <input type="submit" value="Registrar Cliente">
                <br>
            </fieldset>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">


            <?php
            include '../database/database.php';
            $cxi = new database();
            $data = $cxi->consultar(" SELECT *
            from direccion
            join usuario
            on direccion.idrut_usuario=usuario.idrut
            join cliente
            on direccion.rutcliente_id=cliente.id_rutcliente
            join comuna
            on direccion.comuna_id=comuna.idcomuna 
             "); ?>

            <div class="table-responsive-sm ">
                <caption>Lista de Clientes</caption>



                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">



                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Rut</th>
                            <th>Cliente</th>
                            <th>DIRECCION</th>
                            <th>COMUNA</th>
                            <th>Modif</th>
                            <th>Borrar</th>

                        </tr>
                    </thead>
                    <?php $i=1;?>
                    <?php foreach ($data as $fila) { ?>
                        <tbody id=myTable>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fila["id_rutcliente"]; ?></td>
                                <td><?php echo $fila["razonsoc"]; ?></td>
                                <td><?php echo $fila["direccion"]; ?></td>
                                <td><?php echo $fila["comuna"]; ?></td>
                                <td><img src="/intranet/image/editar.png" width="20" onclick="modificar(<?php echo $fila['id_rutcliente'] ?>)" /></td>
                                <td><img src="/intranet/image/basura.png" width="20" onclick="eliminar(<?php echo $fila["idrutcliente"] ?>)" /></td>

                            </tr>
                        </tbody>
                        <?php $i++;?>
                    <?php } ?>
                </table>


            </div>

        </div>

        <div class="col-md-1"></div>
    </div>


</form>










<?php
include_once '../../layout/footer.php'
?>