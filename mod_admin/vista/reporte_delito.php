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
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-1"><input type="button" class="button-limpiar" value="Limpiar" onclick="javascript:eraseText();"> </div>
    <div class="col-sm-5"></div>
    <div class="col-sm-5"></div>
</div>
<br>
<!--
<div class="row">
    <div class="col-sm-1">

    </div>

    <div class="col-sm-2">
        <a href="#" class="list-group-item list-group-item-primary">
            <label for="">Listado de delincuentes<br> ordenados alfabéticamente</label><br>
            <div class="form-inline"><br>
                <input type="button" href="javascript:;" onclick="consultarpersona();return false;" value="Consultar" />
                <br>
            </div>
        </a>
    </div>

    <div class="col-sm-2">
        <a href="#" class="list-group-item list-group-item-primary">
            <label for="">Listado de delincuentes agrupados por delito cometido</label>
            <div>
                <label for="">Categoria de Delitos</label>
                <select name="cbx_categoria" id="cbx_categoria">
                    <?php include 'includes/conexion.php';
                    $query = "SELECT * FROM db_delito ";
                    $resultado = $mysqli->query($query); ?>
                    <option selected="true" disabled="disabled" value="0">Seleccionar Categoria</option>
                    <?php while ($row = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $row['iddb_delito']; ?>"><?php echo $row['delitos']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <label for="">Delito</label>
            <div>
                <select name="cbx_delito" id="cbx_delito">
                </select>
            </div><br>
            <div class="form-inline">
                <input type="button" href="javascript:;" onclick="realizaReporte2($('#cbx_delito').val());return false;" value="Consultar" /><br>
            </div>



        </a>
    </div>
    <div class="col-sm-2">
        <a href="#" class="list-group-item list-group-item-primary">
            <label for="">Listado de delincuentes agrupados por comunas de residencia</label>
            <select name="txtcomuna" id="valor3">
                <?php
                include 'base.php';
                $consulta = "select * from db_comuna order by comuna asc";
                $resultado = mysqli_query($conexion, $consulta);
                ?>
                <option selected="true" disabled="disabled" value="">Seleccione Comuna</option>
                <?php foreach ($resultado as $opciones) : ?>
                    <option value="<?php echo $opciones['iddb_comuna'] ?>"> <?php echo $opciones['comuna'] ?></option>
                <?php endforeach ?>
            </select><br>

            <div class="form-inline">

                <input type="button" href="javascript:;" onclick="realizaReporte3($('#valor3').val());return false;" value="Consultar" /><br>

            </div>


        </a>
    </div>
    <div class="col-sm-2">
        <a href="#" class="list-group-item list-group-item-primary">
            <label for="">Listado de delincuentes por comunas donde se vio por última vez al delincuente</label>

            <select name="txtcomuna" id="valor4">
                <?php
                include 'base.php';
                $consulta = "select * from db_comuna order by comuna asc";
                $resultado = mysqli_query($conexion, $consulta);
                ?>
                <option selected="true" disabled="disabled" value="">Seleccione Comuna</option>
                <?php foreach ($resultado as $opciones) : ?>
                    <option value="<?php echo $opciones['comuna'] ?>"> <?php echo $opciones['comuna'] ?></option>
                <?php endforeach ?>
            </select><br>

            <div class="form-inline">

                <input type="button" href="javascript:;" onclick="realizaReporte4($('#valor4').val());return false;" value="Consultar" /><br>
                <input type="button" class="btn-warning" href="javascript:;" onclick="realizaReporte41();return false;" value="Todos" />
            </div>


        </a>
    </div>
    <div class="col-sm-2">
        <a href="#" class="list-group-item list-group-item-primary">
            <label for="">Listado de delincuentes con algún parentesco entre ellos</label>
            <select name="txtcomuna" id="valor3">
                <?php
                include 'base.php';
                $consulta = "select * from db_comuna order by comuna asc";
                $resultado = mysqli_query($conexion, $consulta);
                ?>
                <option selected="true" disabled="disabled" value="">Seleccione Comuna</option>
                <?php foreach ($resultado as $opciones) : ?>
                    <option value="<?php echo $opciones['iddb_comuna'] ?>"> <?php echo $opciones['comuna'] ?></option>
                <?php endforeach ?>
            </select><br>

            <div class="form-inline">

                <input type="button" href="javascript:;" onclick="realizaReporte5($('#valor3').val());return false;" value="Consultar" /><br>

            </div>
        </a>
    </div>
    <div class="col-sm-2">

    </div>
    <div class="col-sm-1">

    </div>
</div>-->

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-2">
        <a href="#" class="list-group-item list-group-item-dark"><label for="">Listado de delitos ocurridos por comuna o sector, en fechas específicas</label>

<!--******-->
            <select name="txtcomuna" id="v4">
                <?php
                include 'base.php';
                $consulta = "select * from db_comuna order by comuna asc";
                $resultado = mysqli_query($conexion, $consulta);
                ?>
                <option selected="true" disabled="disabled" value="">Seleccione Comuna</option>
                <?php foreach ($resultado as $opciones) : ?>
                    <option value="<?php echo $opciones['iddb_comuna'] ?>"> <?php echo $opciones['comuna'] ?></option>
                <?php endforeach ?>
            </select>

            <div class="form-inline">

               
            </div><br>
            <select name="txtcomuna" id="v3">
                <?php
                include 'base.php';
                $consulta = "select * from db_sector order by sector asc";
                $resultado = mysqli_query($conexion, $consulta);
                ?>
                <option selected="true" disabled="disabled" value="">Seleccione Sector</option>
                <?php foreach ($resultado as $opciones) : ?>
                    <option value="<?php echo $opciones['iddb_sector'] ?>"> <?php echo $opciones['sector'] ?></option>
                <?php endforeach ?>
            </select>

            <div class="form-inline">

               
            </div><br>
                    <label for="">Desde</label>
            <input type="date" name="desde" id="v1">
            <label for="">Hasta</label>
            <input type="date" name="hasta" id="v2"><br>

            <input type="button" href="javascript:;" onclick="realizaReporte6($('#v1').val(),$('#v2').val(),$('#v3').val(),$('#v4').val());return false;" value="Consultar" /><br>




        </a>

    </div>
    <!--
    <div class="col-sm-2">
        <a href="#" class="list-group-item list-group-item-dark"><label for="">Listado histórico de delitos ocurridos por sectores</label></a>
    </div>
    <div class="col-sm-2">
        <a href="#" class="list-group-item list-group-item-dark"><label for="">Ranking de comunas o sectores con mayor cantidad de delitos en fechas determinadas</label></a>

    </div>-->
    <div class="col-sm-2"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-1"></div>
</div>
<br><br>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <span id="resu"></span>
    </div>
    <div class="div-col-sm-1"></div>
</div>


<!--  




4.	
5.	Listado de delincuentes con algún parentesco entre ellos
6.	Listado de delitos ocurridos por comuna o sector, en fechas específicas
7.	Listado histórico de delitos ocurridos por sectores
8.	Búsqueda en cualquier campo
9.	Rankin de comunas o sectores con mayor cantidad de delitos en fechas determinadas

-->



</div>

<script language="javascript">
    $(document).ready(function() {
        $("#cbx_categoria").change(function() {

            //   $('#txtcomuna   ').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#cbx_categoria option:selected").each(function() {
                iddb_delito = $(this).val();
                $.post("includes/getCategoria.php", {
                    iddb_delito: iddb_delito
                }, function(data) {
                    $("#cbx_delito").html(data);
                });
            });
        })
    });
</script>

<script>
    function consultarpersona() {

        $.ajax({

            url: '/intranet/mod_admin/acciones_reporte/responde_reporte1.php', //archivo que recibe la peticion

            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }
    function realizaReporte6(v1,v2,v3,v4) {
        var parametros = {
            "desde": v1,
            "hasta": v2,
            "sector": v3,
            "comuna": v4,

        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet/mod_admin/acciones_reporte/responde_reporte6.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }
    function realizaReporte2(cbx_delito) {
        var parametros = {
            "cbx_delito": cbx_delito
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet/mod_admin/acciones_reporte/responde_reporte2.php', //archivo que recibe la peticion
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
            url: '/intranet/mod_admin/acciones_reporte/responde_reporte3.php', //archivo que recibe la peticion
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
            url: '/intranet/mod_admin/acciones_reporte/responde_reporte4.php', //archivo que recibe la peticion
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

            url: '/intranet/mod_admin/acciones_reporte/responde_reporte4-2.php', //archivo que recibe la peticion

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
    }
</script>
<?php
include_once '../layout/footer.php'
?>