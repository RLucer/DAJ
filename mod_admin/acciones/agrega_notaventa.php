<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="../../login/main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php


if (isset($_POST['txthoy'], $_POST['txtfentrega'], $_POST['txtestado'], $_POST['txtdir']))
    $hoy = $_POST['txthoy'];
$fentrega = $_POST['txtfentrega'];
$estado = $_POST['txtestado'];
$dir = $_POST['txtdir'];



$monto = '0';


for ($i = 0; $i < 10; $i++) {
    # code...   los recibo y los asigno a la variable
    if (isset($_POST['txtcod_prod' . $i], $_POST['txtcantidad' . $i], $_POST['txtvalor' . $i])) {
        ${'cod' . $i} = $_POST["txtcod_prod" . $i];
        ${'cant' . $i} = $_POST["txtcantidad" . $i];
        ${'valor' . $i} = $_POST["txtvalor" . $i];


        $monto = $monto + (${'valor' . $i} * ${'cant' . $i});
    } else {
        ${'cod' . $i} = 'null';
        ${'cant' . $i} = 'null';
        ${'valor' . $i} = 'null';
        // echo "no llego nada";
    }
}




 


//aca inserto la nota de venta y guardo el id que se genero por esa nota//

include '../database/base.php';
$sql = "INSERT INTO `copan_app`.`notaventa` (`fecha_ingreso`, `fecha_salida`, `monto`, `estado_id`, `direccion_id`) VALUES ('$hoy', '$fentrega', '$monto', '$estado', '$dir')";
if (mysqli_query($conexion, $sql)) {
    $ultimoID = mysqli_insert_id($conexion);

?>

       
        <br><br><br><br><br><br>
        <div class="row">
            <div class="col sm-2"></div>
            <div class="col sm-7">

                <?php
                echo '<h3><p class="alert alert-success agileits" role="alert">Nota de Venta Grabada con el Folio: ' . $ultimoID . '</h3>'; ?>

            </div>
            <div class="col sm-3"></div>
        </div>
    


<?php



} else {
    echo "No se inserto el registro correctamente.";
}




//   aca debo colocar el insert   AL DETALLE DE VENTA
//echo '--- inicio for para mostrar--------';
for ($i = 0; $i < 10; $i++) {
    # code..
    if (${'cod' . $i}  != 'null') {

        ${'sql' . $i} = "INSERT INTO `copan_app`.`detalleventa` (`producto_id`, `cantidad`, `valor`, `notaventa_id`) VALUES (' ${'cod' .$i}', '${'cant' .$i}', '${'valor' .$i}', '$ultimoID')";
    } else {
        ${'sql' . $i} = 'null';
    }
}






for ($i = 0; $i < 10; $i++) {
    # code...
    if (${'sql' . $i} != 'null') {

        include '../database/base.php';
        if (mysqli_query($conexion, ${'sql' . $i})) {
            //   echo 'ok' . $i;
        }
    }
}







//borro los productos de la tabla de detalle temporal

include '../vista/includes/conexion.php';

$query = "DELETE FROM DETALLE ";

$resultado = $mysqli->query($query);




header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/ingresoNV.php');
