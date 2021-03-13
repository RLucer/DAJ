<?php
include_once '../layout/header.php'; ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<nav class="navbar sticky-top navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- SI PONGO ACA EL CODIGO DEL HOME ESTE QUEDA A LA IZQUIERDA Y EL BOTON A LA DERECHA-->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <!--SI PO DEJO ACA QUEDA EL CODIGO EL BOTON SE VA A LA DERECHA Y EL HOME A LA IZQUIERDA -->
    <a class="navbar-brand" href="../login/index.php"> MENU </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Por Cliente</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../mod_admin/vista/Consu_por_cliente_uno.php"> Comparador de Periodo</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../mod_admin/vista/consulta_notaventa.php"> Total Ventas por Cliente</a>
                    <div class="dropdown-divider"></div>
                    <!--<a class="dropdown-item" href="../mod_admin/vista/exporta.php"> Exportar Nota de Venta </a>
                    <a class="dropdown-item" href="#"> Actualizacion Denunica </a>-->
                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Por Productos </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../mod_admin/vista/Consu_por_producto_uno.php">Comparador de Periodo </a>
                    <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="../mod_admin/vista/cliente.php"> Total Ventas por Producto</a>
                  <!--  <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../mod_admin/vista/producto.php"> Productos </a>-->


                </div>
            </li>


            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cargar Información </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="../cargar_info/carga_deuda.php"> Subir información</a>
                    <div class="dropdown-divider"></div>
                  <!--  <a class="dropdown-item" href="../mod_admin/vista/reporte_delito.php"> Reportes por Delito</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item disabled" href="../mod_admin/vista/reporte_geo.php"> Clientes Geolocalizados</a>
-->
                </div>
            </li>
         <!--    
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Estado de Cuenta </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../mod_admin/vista/reporte_deuda.php"> Consultar Deuda Cliente</a>
                    <!--   <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../mod_admin/vista/reporte_delito.php"> Reportes por Delito</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../mod_admin/cargar_info/carga_deuda.php"> Actualizar Deuda</a>

                </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Mi Perfil </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../mod_admin/vista/cambiarpw.php"> Cambiar Contraseña </a>
                    <!--  <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="../mod_admin/vista/comuna.php"> Comunas</a>
                    <a class="dropdown-item" href="../mod_admin/vista/ciudad.php"> Ciudades </a>
                    <a class="dropdown-item" href="../mod_admin/vista/region.php"> Regiones </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../mod_admin/vista/asignacomuna.php"> Asignar Comuna a un Sector </a>-->
                </div>
            </li>
        </ul>




    </div>
</nav>

<form action="" class="denun">

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

 
    <?php

    include 'base.php';
    $consulta = "SELECT  cliente, sum(monto_total) as total
    from girona_app.ventas
    where fecha_documento between '2021-01-01' and '2021-01-30'
    group by cliente
    order by total desc
    limit 10";
    $resultado = mysqli_query($conexion, $consulta);



    $valoresY = array();
    $valoresX = array();

    while ($ver = mysqli_fetch_row($resultado)) {
        $valoresY[] = $ver[1];
        $valoresX[] = $ver[0];
    }

    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);

    ?>

    <script type="text/javascript">
        function crearcadenalineal(json) {
            var parsed = JSON.parse(json);
            var arr = [];
            for (var x in parsed) {
                arr.push(parsed[x]);
            }
            return arr;
        }
    </script>
    

    <div class="row">
        <div class="col-md-1"> </div>
        <div class="col-md-4">
            <div id="graficalineal"></div>
        </div>
        <div class="col-md-4">
            <div id="graficalineal2"></div>
        </div>
        <div class="col-md-1"> </div>
    </div>






    <script>
        datosX = crearcadenalineal('<?php echo $datosX ?>');
        datosY = crearcadenalineal('<?php echo $datosY ?>');
        var trace1 = {
            type: 'bar',
            x: datosX,
            y: datosY,
            marker: {
                color: '1276E6',
                line: {
                    width: 1
                }
            }
        };

        var data = [trace1];

        var layout = {
            title: ' Top 10 Venta total por Cliente',
            font: {
                size: 10
            },
            xaxis: {
                title: 'Clientes'
            },
            yaxis: {
                title: 'Monto de Venta'
            },
        };

        var config = {
            responsive: true
        }

        Plotly.newPlot('graficalineal', data, layout, config);
    </script>








    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<!--
    <?php
    include 'base.php';
    $consulta2 = "SELECT sector, count(iddb_detalledelito)as cont
    FROM db_crimen.db_denuncia
    join db_comuna
    on db_denuncia.idcomuna_denun=db_comuna.iddb_comuna
	right join db_sector
    on db_comuna.idsector=db_sector.iddb_sector
    group by sector
    order by cont desc";
    $resultado2 = mysqli_query($conexion, $consulta2);



    $valoresY = array();
    $valoresX = array();

    while ($ver = mysqli_fetch_row($resultado2)) {
        $valoresY[] = $ver[1];
        $valoresX[] = $ver[0];
    }

    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);

    ?>

    <script type="text/javascript">
        function crearcadenalineal2(json) {
            var parsed = JSON.parse(json);
            var arr = [];
            for (var x in parsed) {
                arr.push(parsed[x]);
            }
            return arr;
        }
    </script>


    <script>
        datosX = crearcadenalineal2('<?php echo $datosX ?>');
        datosY = crearcadenalineal2('<?php echo $datosY ?>');
        var trace1 = {
            type: 'bar',
            x: datosX,
            y: datosY,
            marker: {
                color: '1276E6',
                line: {
                    width: 1
                }
            }
        };

        var data = [trace1];

        var layout = {
            title: 'Delitos por Sectores',
            font: {
                size: 10
            },
            xaxis: {
                title: 'Sector'
            },
            yaxis: {
                title: 'Cantidad Delitos'
            },
        };

        var config = {
            responsive: true
        }

        Plotly.newPlot('graficalineal2', data, layout, config);
    </script>


-->







<!--
</form>

    

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
<h1>
    <center>bienvenido </center>
</h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<br>
<br>
<br>
<br>
<br>
<br>
<br>-->
<?php
include_once '../layout/footer.php'
?>