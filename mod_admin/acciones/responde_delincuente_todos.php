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

//responder la consulta y mostra la denuncia 
include '../database/base.php';;
$consulta = "SELECT iddb_persona, nombres, apaterno,amaterno,apodo,direccion,comuna,email,fnacimiento,sexo,ultimacomuna,estado
FROM db_personas
join db_estado
on db_personas.idestado=db_estado.iddb_estado
join db_comuna
on db_personas.idcomuna=db_comuna.iddb_comuna
order by iddb_persona asc";
$resultado = mysqli_query($conexion, $consulta);
$nrow = mysqli_num_rows($resultado);

if ($nrow == 0) { ?>
    <script>
        alert('NO fue posible encontrar acto delictual asociado al Rut Ingresado');
    </script>

<?php
    //no encuentra persona pide q la cree y da link
   // echo '<p class="alert alert-danger agileits" role="alert">Para Ingresar un acto delictual a un criminal ';
    //echo '<p class="alert alert-info agileits" role="alert"><a href="http://localhost/intranet/mod_admin/vista/denuncia.php"> Pinche aquí</a>';
} else { ?>




    <div class="container">

        <div class="table-responsive">
            <caption>Lista Delitos Cometidos </caption><br>
            <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">

                <thead>
                    <tr>
                       
                        <th><label for="">Rut</label></th>
                        <th><label for="">Nombre</label></th>
                        <th><label for="">A. Paterno</label></th>
                        <th><label for="">A. Materno</label></th>
                        <th><label for="">Apodo</label></th>
                        <th><label for="">Dirección</label></th>
                        <th><label for="">Comuna</label></th>
                        <th><label for="">email</label></th>
                        <th><label for="">F. Nacimiento</label></th>
                        <th><label for="">Sexo</label></th>
                        <th><label for="">Comuna Última vez Visto</label></th>
                        <th><label for="">Estado</label></th>

                    </tr>
                </thead>
                <?php foreach ($resultado as $fila) { ?>
                    <tbody id=myTable>
                        <tr>
                            <td><?php echo $fila["iddb_persona"]; ?></td>
                            <td><?php echo $fila["nombres"]; ?></td>
                            <td><?php echo $fila["apaterno"]; ?></td>
                            <td><?php echo $fila["amaterno"]; ?></td>
                            <td><?php echo $fila["apodo"]; ?></td>
                            <td><?php echo $fila["direccion"]; ?></td>
                            <td><?php echo $fila["comuna"]; ?></td>
                            <td><?php echo $fila["email"]; ?></td>
                            <td><?php echo $fila["fnacimiento"]; ?></td>
                            <td><?php echo $fila["sexo"]; ?></td>
                            <td><?php echo $fila["ultimacomuna"]; ?></td>
                            <td><?php echo $fila["estado"]; ?></td>
                           

                        </tr>
                    </tbody>
                <?php } ?>
            </table>









        <?php
    }

        ?>