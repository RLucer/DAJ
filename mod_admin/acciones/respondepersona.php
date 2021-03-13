<?php

if (isset($_POST['valorCaja']))
    $rut = $_POST['valorCaja'];


if (empty($rut)) {
    echo '<p class="alert alert-danger agileits" role="alert">  Ingrese un Rut, Campo Vacio';
} else {

    include '../database/base.php';;
    $consulta = "select * from db_personas join db_estado on db_personas.idestado=db_estado.iddb_estado join db_comuna
    on db_personas.idcomuna=db_comuna.iddb_comuna where iddb_persona='$rut'";
    $resultado = mysqli_query($conexion, $consulta);
    $nrow = mysqli_num_rows($resultado);



    if ($nrow == 0) { ?>
        <script>
            alert('NO fue posible encontrar persona');
        </script>

    <?php
        //no encuentra persona pide q la cree y da link
        echo '<p class="alert alert-danger agileits" role="alert">Ingrese persona en Mantenedores - Personas';
        echo '<p class="alert alert-info agileits" role="alert"><a href="http://localhost/intranet/mod_admin/vista/persona.php"> Pinche aquí para ingresar Persona</a>';
    } else { ?>
    


        <div class="table-responsive">

              
        <a class="btn btn-success " href="http://localhost/intranet/mod_admin/vista/delincuente_modifica.php?variable1=<?php echo $rut ?>">Modificar Datos Delincuente</a>
        <br>
      
      
        <br><br>

            <table class="table-responsive-sm table-bordered">
            
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
                        <!--<th><label for="">Última vez Visto</label></th>-->
                        <th><label for="">Comuna Última vez Visto</label></th>
                        <th><label for="">Estado</label></th>
                       
                    </tr>
                </thead>
                <?php foreach ($resultado as $opciones) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $opciones["iddb_persona"]; ?></td>
                            <td><?php echo $opciones["nombres"]; ?></td>
                            <td><?php echo $opciones["apaterno"]; ?></td>
                            <td><?php echo $opciones["amaterno"]; ?></td>
                            <td><?php echo $opciones["apodo"]; ?></td>
                            <td><?php echo $opciones["direccion"]; ?></td>
                            <td><?php echo $opciones["comuna"]; ?></td>
                            <td><?php echo $opciones["email"]; ?></td>
                            <td><?php echo $opciones["fnacimiento"]; ?></td>
                            <td><?php echo $opciones["sexo"]; ?></td>
                            <!--  <td><?php echo $opciones["direccion_ultimaUbica"]; ?></td>-->
                            <td><?php echo $opciones["ultimacomuna"]; ?></td>
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