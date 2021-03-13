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
</nav>
<!-- script javascript para poder editar-->
<script>
    function modificar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/modificar_delito.php?parametro=" + cod;
    }

    function eliminar(cod) {
        window.location = "http://localhost/intranet/mod_admin/acciones/eliminar_delito.php?parametro=" + cod;
    }
</script>

<form action="/intranet_copan/mod_admin/acciones/agregar_delito.php" method="post" class="denun">
    <div class="row">
        <div class="col-md-12">
            <h5>
                <center>Gestor de Producto</center>
            </h5><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>

        <div class="col-md-2">
            <h6>Ingresar Producto</h6>

            <br>
            <fieldset>
                <?php
                include '../database/base.php';
                $consulta = "select * from familia";
                $resultado = mysqli_query($conexion, $consulta);
                ?>
                <br>

                <select name="det" id="">
                    <option selected="true" disabled="disabled" value="">Elige la FAMILIA</option>
                    <?php foreach ($resultado as $opciones) : ?>

                        <option value="<?php echo $opciones['idfamilia'] ?>"> <?php echo $opciones['familia'] ?></option>
                    <?php endforeach ?>

                </select>
                <br>
                <label for="">Código</label>

                <input type="text" name="txtcodigo" placeholder=" "><br>
                <label for="">Nombre Producto</label>
                <input type="text" name="txtdelito" placeholder=" " required><br>
                <label for="">Precio</label>
                <input type="text" name="txtvalor" placeholder=" " required><br>




                <br>

                <input type="hidden" name="roles" value="delito">
                <input type="hidden" name="funcion" value="0">
                <input type="hidden" name="parametro" value="0>">
                <input type="submit" value="Registrar Producto" name="Registrar Producto">
                <br>
            </fieldset>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6">

            <?php
            include '../database/database.php';
            $cxi = new database();
            $data = $cxi->consultar("select * from producto "); ?>

<!--
<div class="table-responsive-sm">
 
    ...
  </table>
</div>
    -->




            <div class="table-responsive-sm">
                <caption>Lista de Producto</caption><br>
                <table class="table table-sm" .thead-dark>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Precio Lista</th>
                            <th>Descto 1 (%)</th>
                            <th>Descto 2 (%)</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>

                        </tr>
                    </thead>

                    <?php
                    $m = "$";
                    foreach ($data as $fila) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $fila["idproducto"]; ?></td>
                                <td><?php echo $fila["producto"]; ?></td>
                                <td><?php echo $m . formatoMoney($fila["valor"]); ?></td>
                                <td> <?php echo $fila["descuento1"]; ?></td>
                                <td><?php echo $fila["descuento2"];  ?></td>



                                <td><img src="/intranet_copan/image/editar.png" width="20" onclick="modificar(<?php echo $fila["idproducto"] ?>)" /></td>
                                <td><img src="/intranet_copan/image/basura.png" width="20" onclick="eliminar(<?php echo $fila["idprodcuto"] ?>)" /></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>


            </div>
        </div>

        <div class="col-md-1">

        </div>

    </div>

</form>


<?php
function formatoMoney($number, $fractional = false)
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



<?php
include_once '../../layout/footer.php'
?>