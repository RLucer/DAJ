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
include '../database/base.php';
$consulta = "SELECT * 
    FROM db_crimen.db_personas
    join db_estado
    on db_personas.idestado=db_estado.iddb_estado
    order by ultimacomuna asc ";
$resultado = mysqli_query($conexion, $consulta);
$nrow = mysqli_num_rows($resultado);

if ($nrow == 0) { ?>
    <script>
        alert('NO existen datos asociados a la comuna seleccionada');
    </script>
<?php
    echo '<p class="alert alert-danger agileits" role="alert">Seleccione una Comuna';
    // echo '<p class="alert alert-info agileits" role="alert"><a href="http://localhost/intranet/mod_admin/vista/persona.php"> Pinche aquí para ingresar Persona</a>';
} else { ?>

    <div class="table-responsive ">
        <p>Delincuente según Comuna de Residencia:</p>
        <a class="btn btn-success " href="http://localhost/intranet/mod_admin/vista/reportes/rep4-2.php?variable1=<?php echo $com3 ?>">Exporta a PDF</a>
        <br>
        <br>
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
                        <th><label for="">Estado</label></th>
                        <th><label for="">Ultima Comuna Visto</label></th>

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
                            <td><?php echo $opciones["estado"]; ?></td>
                            <td><?php echo $opciones["ultimacomuna"]; ?></td>

                        </tr>

                    </tbody>
                <?php endforeach ?>
            </table>
        
    </div>

<?php
}


?>