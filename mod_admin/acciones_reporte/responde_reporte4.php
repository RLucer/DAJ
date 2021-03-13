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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php
if (isset($_POST['valorCaja4']))
    $com4 = $_POST['valorCaja4'];


if (empty($com4)) {
    echo '<p class="alert alert-danger agileits" role="alert">  Campo Vacio, Debe seleccionar una comuna para consultar';
} else {

    include '../database/base.php';

    $consulta = "SELECT * 
    FROM db_crimen.db_personas
    join db_estado
    on db_personas.idestado=db_estado.iddb_estado
    where ultimacomuna='$com4'
    order by apaterno asc";
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




        <div class="table-responsive">
            <p>Delincuente según Comuna donde se vio por ultima vez:</p>




            <a class="btn btn-success " href="http://localhost/intranet/mod_admin/vista/reportes/rep4.php?variable1=<?php echo $com4 ?>">Exporta a PDF</a>
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
                            <!-- <th><label for="">Direccion</label></th>-->
                            <!--  <th><label for="">Comuna</label></th>-->
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
                                <!-- <td><?php echo $opciones["direccion"]; ?></td>-->
                                <!-- <td><?php echo $opciones["comuna"]; ?></td>-->
                                <td><?php echo $opciones["estado"]; ?></td>
                            </tr>

                        </tbody>
                    <?php endforeach ?>
                </table>
           
        </div>

<?php
    }
}

?>