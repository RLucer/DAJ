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
if (isset($_POST['cbx_delito']))
    $delito = $_POST['cbx_delito'];


if (empty($delito)) {
    echo '<p class="alert alert-danger agileits" role="alert">  Campo Vacio, Debe seleccionar un delito para consultar';
} else {

    include '../database/base.php';

    $consulta = "SELECT iddb_persona,apaterno,amaterno,nombres,apodo,fnacimiento,comuna,direccion,estado
    FROM db_denuncia
    join db_personas
    on db_denuncia.iddelincuente=db_personas.iddb_persona
    join db_detallede
    on db_denuncia.iddetalle=db_detallede.iddb_detalle
    join db_comuna
    on db_personas.idcomuna=db_comuna.iddb_comuna
    join db_estado
    on db_personas.idestado=db_estado.iddb_estado
    where iddb_detalle='$delito'
    group by iddb_persona";
    $resultado = mysqli_query($conexion, $consulta);
    $nrow = mysqli_num_rows($resultado);


    if ($nrow == 0) { ?>
        <script>
            alert('NO existen datos asociados al delito seleccionado');
        </script>

    <?php

        echo '<p class="alert alert-danger agileits" role="alert">Seleccione un Delito';
        // echo '<p class="alert alert-info agileits" role="alert"><a href="http://localhost/intranet/mod_admin/vista/persona.php"> Pinche aquí para ingresar Persona</a>';
    } else { ?>





        <div class="table-responsive">
            <p>Delincuentes según delito cometido:</p>
            <a class="btn btn-success " href="http://localhost/intranet/mod_admin/vista/reportes/rep2.php?variable1=<?php echo $delito ?>">Exporta a PDF</a>
            <br>
            <br>
            <div class="table-responsive-sm">
                <table class="table table-sm table-thead-light">
                    <thead>
                        <tr>
                            <th><label for="">Rut </label></th>
                            <th><label for="">APaterno</label></th>
                            <th><label for="">AMaterno</label></th>
                            <th><label for="">Nombres</label></th>
                            <th><label for="">F.Nacimi</label></th>
                            <th><label for="">Apodo</label></th>
                            <th><label for="">Direccion</label></th>
                            <th><label for="">Comuna</label></th>
                            <th><label for="">Estado</label></th>
                        </tr>
                    </thead>
                    <?php foreach ($resultado as $opciones) : ?>
                        <tbody id=myTable>
                            <tr>
                                <td><?php echo $opciones["iddb_persona"]; ?></td>
                                <td><?php echo $opciones["apaterno"]; ?></td>
                                <td><?php echo $opciones["amaterno"]; ?></td>
                                <td><?php echo $opciones["nombres"]; ?></td>
                                <td><?php echo $opciones["fnacimiento"]; ?></td>
                                <td><?php echo $opciones["apodo"]; ?></td>
                                <td><?php echo $opciones["direccion"]; ?></td>
                                <td><?php echo $opciones["comuna"]; ?></td>
                                <td><?php echo $opciones["estado"]; ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
<?php
    }
}











?>