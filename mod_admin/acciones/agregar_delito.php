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

include_once '../../layout/header.php';

include '../database/database.php';

$cod = $_POST['txtcodigo'];
$delito = $_POST['txtdelito'];
$detalle = $_POST['det'];

$funcion = $_POST['funcion'];
$parametro = $_POST['parametro'];
$roles = $_POST['roles'];


$obj = new database();


        if($funcion == "modificar"){
            $sql="update db_detallede set detalledelito='$delito' where iddb_detalle='$parametro'";
            $obj->ingresar_delito($sql);
    
        }else{
        //ingresar una nueva institucion
        $sql = "INSERT INTO db_detallede(iddb_detalle,detalledelito,iddelit) VALUES ('$cod', '$delito', '$detalle')";
        $obj->ingresar_delito($sql);
            }



?>

<?php include_once '../../layout/header.php'?>