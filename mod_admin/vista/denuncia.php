<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
$usu = $_SESSION['rut'];
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <a class="dropdown-item active" href="../vista/denuncia.php"> Ingreso Actos Delictuales </a>
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

<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>


<form action="/intranet/mod_admin/acciones/agregar_denuncia.php" method="Post" class="denun">
    <div class="row">
        <div class="col-md-12">
            <h5>
                <center>Ingreso de Actos Delictuales</center>
            </h5><br>
        </div>
    </div>
    <script src="validarRUT.js"></script>
    <div class="row">
        <!--<div class="col-sm-1">
        </div>-->

        <div class="col-sm-3">


            <label for="">Rut Delincuente</label>
            <input type="text" name="caja_texto" id="valor1" value="" onblur="return checkRut(caja_texto)" placeholder="formato 12345678-K" /><br>
            <div class="form-inline">
                <input type="button" class="button-limpiar" value="Limpiar" onclick="javascript:eraseText();">
                <input type="button" href="javascript:;" onclick="realizaProceso1($('#valor1').val());return false;" value="Agregar" />
            </div>

            <br><br>
            <span id="resu">

            
                <h6></h6>
            </span>
        </div>

        <!--  <div class="col-md-3">
            <label for="">Rut Victima</label>
            <input type="text" name="caja_texto_2" id="valor2" value="" onblur="return checkRut(caja_texto_2)" placeholder="formato 12345678-K" /><br>
            <div class="form-inline">
                <input type="button" class="button-limpiar" value="Limpiar" onclick="javascript:eraseText_2();">

                <input type="button" href="javascript:;" onclick="realizaProceso2($('#valor2').val());return false;" value="Agregar" />
            </div>

            <br><br>
            <span id="resu2"></span>
        </div>-->


        <div class="col-sm-2">

            <h6>Datos del Delito</h6>
            <input type="hidden" name="txtusuario" value="<?php echo $usu ?>">
            <label for="">Fecha Denuncia</label>
            <?php $fcha = date("Y-m-d"); ?>
            <input type="date" name="txtdate_denuncia" value="<?php echo $fcha; ?>"><br>
            <label for="">Fecha del delito</label>
            <div class="form-inline">
                <input type="date" name="txtdate_delito"><br>
            </div><br>
            <label for="">Hora del delito</label>
            <input type="time" name="txttime">
            <br>
        </div>
        <div class="col-sm-2">
            <label for="">Dirección del Delito</label>
           
            <input type="text" name="txtdireccion_delito"><br>

            <div>
                <label for="">Región</label>
                <select name="cbx_estado" id="cbx_estado">

                    <?php include 'includes/conexion.php';

                    $query = "SELECT * FROM db_region ";

                    $resultado = $mysqli->query($query); ?>

                    <option selected="true" disabled="disabled" value="0">Seleccionar Region</option>
                    <?php while ($row = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $row['iddb_region']; ?>"><?php echo $row['region']; ?></option>
                    <?php } ?>
                </select></div>

            <br />
            <label for="">Provincia</label>
            <div> <select name="cbx_municipio" id="cbx_municipio"></select></div>

            <br />
            <label for="">Comuna</label>
            <div> <select name="cbx_comuna" id="cbx_comuna"></select></div>

            <br />
        </div>

        <div class="col-sm-2">
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

            <br />
            <label for="">Delito</label>
            <div> <select name="cbx_delito" id="cbx_delito"></select></div>






            <br />
            <label for="">Descripción</label>

            <p><textarea name="txtdescripcion" cols="100" rows="7" placeholder="Breve descripción del acto delictual acontecido"></textarea></p>


            <input type="submit" value="Guardar Acto Delictual" name="Guardar Acto Delictual" class="inicio">

        </div>

    </div>


    <div class="col-md-1">

    </div>

</form>




<script>
    function realizaProceso1(valorCaja1) {
        var parametros = {
            "valorCaja1": valorCaja1
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet/mod_admin/acciones/validarut_delincuente.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resu").html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resu").html(response);
            }
        });
    }

    function realizaProceso2(valorCaja2) {
        var parametros = {
            "valorCaja2": valorCaja2
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '/intranet/mod_admin/acciones/validarut_victima.php', //archivo que recibe la peticion
            type: 'post', //método de envio
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
        $("#cbx_estado").change(function() {

            $('#cbx_comuna   ').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#cbx_estado option:selected").each(function() {
                iddb_region = $(this).val();
                $.post("includes/getMunicipio.php", {
                    iddb_region: iddb_region
                }, function(data) {
                    $("#cbx_municipio").html(data);
                });
            });
        })
    });

    $(document).ready(function() {
        $("#cbx_municipio").change(function() {
            $("#cbx_municipio option:selected").each(function() {
                iddb_ciudad = $(this).val();
                $.post("includes/getLocalidad.php", {
                    iddb_ciudad: iddb_ciudad
                }, function(data) {
                    $("#cbx_comuna").html(data);
                });
            });
        })
    });
</script>

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




<?php

include_once '../layout/footer.php'
?>