<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if ($varsesion == null || $varsesion == '') {
    echo "<h2> Ud NO cuenta con autorización debe loguear primero <h2> <br>  ";
?>
    <a class="nav-link" href="/intranet_copan/login/index.php"> pinche aquí para Loguearse</a>
<?php
    die();
}
?>
<?php

include_once '../../layout/header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<nav class="navbar sticky-top navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- SI PONGO ACA EL CODIGO DEL HOME ESTE QUEDA A LA IZQUIERDA Y EL BOTON A LA DERECHA-->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <!--SI PO DEJO ACA QUEDA EL CODIGO EL BOTON SE VA A LA DERECHA Y EL HOME A LA IZQUIERDA -->
    <a class="navbar-brand" href="../../login/index.php"> MENU </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Por Cliente</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item active" href="../vista/Consu_por_cliente_uno.php"> Comparador de Periodo</a>
                    <div class="dropdown-divider"></div>
                    <!-- <a class="dropdown-item" href="../vista/consulta_notaventa.php"> Consulta Notas de Ventas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/exporta.php"> Exportar Nota de Venta </a>
                      <a class="dropdown-item" href="#"> Actualizacion Denunica </a>-->
                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Por Productos</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/Consu_por_producto_uno.php"> Comparador de Periodo</a>
                    <!--  <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/cliente.php"> Clientes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/producto.php"> Productos </a>-->


                </div>
            </li>
            <!--

            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Reportes </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <!--   <a class="dropdown-item" href="../vista/reporte.php"> Reportes por Delicuente</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/reporte_delito.php"> Reportes por Delito</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item disabled" href="../vista/reporte_geo.php"> Clientes Geolocalizados</a>

                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Estado de Cuenta </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vista/reporte_deuda.php"> Consultar Deuda Cliente</a>
                    <!--   <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../vista/reporte_delito.php"> Reportes por Delito</a>
                    <div class="dropdown-divider"></div>
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
                    <a class="dropdown-item" href="../vista/asignacomuna.php"> Asignar Comuna a un Sector </a>
                </div>
            </li>-->
        </ul>
        <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search" id=myInput placeholder="buscador" aria-label="Search"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Buscar en Tabla </button> </form>

    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>

<script src="validarRUT.js"></script>

<form action="" method="post" class="denun">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <h3>
                <center>Comparador de Periodos por Cliente</center>
            </h3>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">


        <div class="col-sm-1"> </div>
        <div class="col-sm-2"> <label for="">Seleccione cliente</label>
            <select name="cbx_cliente" id="cbx_cliente">
                <?php
                include 'base.php';
                $consulta = "select cliente from ventas group by cliente order by cliente asc";
                $resultado = mysqli_query($conexion, $consulta);
                ?>
                <option selected="true" disabled="disabled" value="">Cliente</option>
                <?php foreach ($resultado as $opciones) : ?>

                    <option value="<?php echo $opciones['cliente'] ?>"> <?php echo $opciones['cliente'] ?></option>
                <?php endforeach ?>

            </select><br>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-5"></div>



    </div>


    <div class="row">
        <div class="col-sm-1"></div>


        <div class="col-sm-5">


            <div class="row">
                <div class="col-sm-12">
                    <center>
                        <fieldset><label for="">Periodo 1</label></fieldset>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">

                    <label for="">Fecha Desde</label><input type="date" id="fecha_desde" required value="" name="fecha_desde">

                </div>
                <div class="col-sm-6">

                    <label for="">Fecha Hasta</label><input type="date" id="fecha_hasta" required value="" name="fecha_hasta">

                </div>

            </div>
        </div>



        <div class="col-sm-5">


            <div class="row">
                <div class="col-sm-12">
                    <center>
                        <fieldset><label for="">Periodo 2</label></fieldset>
                </div>

            </div>
            <div class="row">

                <div class="col-sm-6">

                    <label for="">Fecha Desde</label><input type="date" id="fecha_desde2" required value="" name="fecha_desde2">

                </div>
                <div class="col-sm-6">

                    <label for="">Fecha Hasta</label><input type="date" id="fecha_hasta2" required value="" name="fecha_hasta2">

                </div>

            </div>
        </div>
        <div class="col-sm-1">
            <td><img src="/intranet_girona/image/lupa.png" width="30" onclick="realizaProceso2($('#cbx_cliente').val(),$('#fecha_desde').val(),$('#fecha_hasta').val(),$('#fecha_desde2').val(),$('#fecha_hasta2').val());return false;" value="Ingresar" /></td>
        </div>


    </div>




</form>

<div class="row">

    <div class="col-md-12">
        <span id="resu2"></span>
    </div>







    <script>
        function realizaProceso2(cbx_cliente, fecha_desde, fecha_hasta, fecha_desde2, fecha_hasta2) {
            var parametros = {
                "cbx_cliente": cbx_cliente,
                "fecha_desde": fecha_desde,
                "fecha_hasta": fecha_hasta,
                "fecha_desde2": fecha_desde2,
                "fecha_hasta2": fecha_hasta2
            };
            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: '/intranet_girona/mod_admin/acciones/consulta1.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    $("#resu2").html("Procesando, espere por favor...");
                },
                success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resu2").html(response);
                }
            });
        }

        function realizaProceso3() {

            $.ajax({

                url: '/intranet_copan/mod_admin/vista/tabladetalle.php', //archivo que recibe la peticion

                beforeSend: function() {
                    $("#resu2").html("Procesando, espere por favor...");
                },
                success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resu2").html(response);
                }
            });
        }

        function eraseText() {
            document.getElementById("valor1").value = "";
            document.getElementById("resu").innerHTML = "";
        }

        function eraseText_2() {
            document.getElementById("valor2").value = "";
            document.getElementById("resu2").innerHTML = "";
        }
    </script>



    <script language="javascript">
        $(document).ready(function() {
            $("#cbx_categoria").change(function() {

                //   $('#txtcomuna   ').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

                $("#cbx_categoria option:selected").each(function() {
                    idfamilia = $(this).val();
                    $.post("includes/getCategoria.php", {
                        idfamilia: idfamilia
                    }, function(data) {
                        $("#cbx_delito").html(data);
                    });
                });
            })
        });
    </script>
    <!-- script javascript para poder editar-->
    <script>
        function modificar(cod) {


            //   window.location = "http://localhost/intranet_copan/mod_admin/acciones/modificar_usuario.php?parametro=" + cod;

        }

        function eliminar(cod) {
            window.location = "http://localhost/intranet_copan/mod_admin/acciones/eliminar_notadeventa.php?parametro=" + cod;
        }
    </script>







    <?php
    //include_once '../../layout/footer.php'
    ?>