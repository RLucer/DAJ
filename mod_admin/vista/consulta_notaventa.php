<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
$usu = $_SESSION['rut'];
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

<!--<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>

-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
<script src="validarRUT.js"></script>

<form action="" class="denun">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5>
                <center>Reportes Nota de Venta</center>
            </h5>
        </div>
        <div class="col-md-4"></div>

    </div>

    <FIeldset>

        <div class="row">

            <div class="col-md-2">
                <label for="">Nota de Venta Salida Detalle</label>
                <div class="form-inline">
                    <input type="date" id="valor1">
                    <td><img src="/intranet_copan/image/lupa.png" width="30" onclick="realizaProceso1($('#valor1').val());return false;" value="Ingresar" /></td>
                </div>
            </div>
            <div class="col-md-2">
                <label for="">Listado Nota de Venta</label>
                <input type="date" class="consu" id="valor2">
                <div class="form-inline">
                    <input type="date" class="consu" id="valor22">
                    <td><img src="/intranet_copan/image/lupa.png" width="30" onclick="realizaProceso2($('#valor2').val());return false;" value="Ingresar" /></td>
                </div>
            </div>
            <div class="col-md-2">
                <label for="">Nota de Venta </label>
                <div class="form-inline">
                    <input type="number" placeholder="Nota Venta N° ?" class="consu" id="valor32">
                    <td><img src="/intranet_copan/image/lupa.png" width="30" onclick="realizaProceso3($('#valor2').val());return false;" value="Ingresar" /></td>
                </div>
            </div>

            <div class="col-md-2">
                <label for="">Historico por Cliente</label>
                <div class="form-inline">
                    <input type="text" placeholder="Ingrese Rut" class="consu" id="valor4">
                    <td><img src="/intranet_copan/image/lupa.png" width="30" onclick="realizaProceso4($('#valor4').val());return false;" value="Ingresar" /></td>
                </div>
            </div>

            <div class="col-md-2">
                <label for="">Limpiar </label>
                <div class="form-inline">
                    <td><img src="/intranet_copan/image/basu.png" width="40" value="Limpiar" onclick="javascript:eraseText();" /></td>

                </div>
            </div>


        </div>
    </FIeldset>



    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div>
                <span id="resu">



                </span>
            </div>
        </div>
        <div class="col-sm-1"></div>


    </div>






    <br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>








</form>






<script>
    function realizaProceso1(valorCaja1) {
        var parametros = {
            "valorCaja1": valorCaja1
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet_copan/mod_admin/acciones/responde_consulta_notaventa.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }

    function realizaProceso2(valorCaja1) {
        var parametros = {
            "valorCaja1": valorCaja1
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet_copan/mod_admin/acciones/responde_consulta_notaventa2.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }

    function realizaProceso3(valorCaja1) {
        var parametros = {
            "valorCaja1": valorCaja1
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet_copan/mod_admin/acciones/responde_consulta_notaventa.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }

    function realizaProceso4(valorCaja4) {
        var parametros = {
            "valorCaja4": valorCaja4
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet_copan/mod_admin/acciones/responde_consulta_notaventa4.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }







    function consultardenuncia(valorCaja) {
        var parametros = {
            "valorCaja": valorCaja
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet_copan/mod_admin/acciones/responde_denuncia.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }

    function consultartodasdenuncia() {

        $.ajax({

            url: '/intranet/mod_admin/acciones/responde_denuncia_todas.php', //archivo que recibe la peticion

            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }

    function eraseText() {
        document.getElementById("valor1").value = "";
        document.getElementById("resu").innerHTML = "";
    }
</script>






<?php

include_once '../../layout/footer.php'
?>