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
<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</nav>
<script src="validarRUT.js"></script>
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
<br>
<form action="" class="denun">



    <div class="row">

        <div class="col-sm-1">
            <input type="button" class="button-limpiar" value="Limpiar" onclick="javascript:eraseText();">

        </div>
        <div class="col-sm-1">

            <input type="button" href="javascript:;" onclick="consulta_rut_cliente($('#rutcliente').val(),$('#suc').val());return false;" value="Consultar" />
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>


    </div>
    <br>

    <div class="row">
        <div class="col-sm-2">
            <a href="#" class="list-group-item list-group-item-primary">
                <!-- <label for="">Estado de Cuenta por Rut<br> </label>-->
                <div class="form-inline">
                    <input type="text" autofocus name="txtrutcliente" id="rutcliente" onblur="return checkRut(txtrutcliente)" placeholder="  Ingrese Rut de Cliente">
                    <br> <br><br>
                    <select name="suc" id="suc">

                        <option selected value="1">Casa Matriz</option>
                        <option value="2">Sucursal 2</option>
                        <option value="3">Sucursal 3</option>
                        <option value="4">Sucursal 4</option>
                        <option value="5">Sucursal 5</option>
                        <option value="6">Sucursal 6</option>
                    </select>
                    <br>
                    <br>
                </div>
            </a>
        </div>

        <div class="col-sm-10">
            <span id="resu"></span>
        </div>
    </div>
    <br><br>





    <script>
        function consulta_rut_cliente(idrutcliente, suc) {
            var parametros = {
                "idrutcliente": idrutcliente,
                "suc": suc,
            };
            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: '/intranet_copan/mod_admin/acciones_reporte/responde_reporte1.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    $("#resu").html("Procesando, espere por favor...");
                },
                success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resu").html(response);
                }
            });
        }




        function realizaReporte3(valorCaja3) {
            var parametros = {
                "valorCaja3": valorCaja3
            };
            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: '/intranet/acciones_reporte/responde_reporte3.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    $("#resu").html("Procesando, espere por favor...");
                },
                success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resu").html(response);
                }
            });
        }

        function realizaReporte4(valorCaja4) {
            var parametros = {
                "valorCaja4": valorCaja4
            };
            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: '/intranet/acciones_reporte/responde_reporte4.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    $("#resu").html("Procesando, espere por favor...");
                },
                success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resu").html(response);
                }
            });
        }

        function realizaReporte41() {

            $.ajax({

                url: '/intranet/acciones_reporte/responde_reporte4-2.php', //archivo que recibe la peticion

                beforeSend: function() {
                    $("#resu").html("Procesando, espere por favor...");
                },
                success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resu").html(response);
                }
            });
        }

        function realizaReporte5() {

            $.ajax({

                url: '/intranet/acciones_reporte/responde_reporte5.php', //archivo que recibe la peticion

                beforeSend: function() {
                    $("#resu").html("Procesando, espere por favor...");
                },
                success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resu").html(response);
                }
            });
        }

        function eraseText() {

            document.getElementById("resu").innerHTML = "";
            document.getElementById("rutcliente").value = "";
        }
    </script>

    <br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</form>
<?php
include_once '../../layout/footer.php'
?>