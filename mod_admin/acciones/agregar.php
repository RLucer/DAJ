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

$cod         = $_POST['txtcodigo'];
$in          = $_POST['txtinstitucion'];
$funcion     = $_POST['funcion'];
$parametro   = $_POST['parametro'];
$roles       = $_POST['roles'];



$obj = new database();


        if($funcion == "modificar"){
            $sql="update db_institucion set institucion='$in' where iddb_institucion='$parametro'";
            $obj->ingresar_institucion($sql);
    
        }else{
        //ingresar una nueva institucion
        $sql = "INSERT INTO db_institucion(iddb_institucion,institucion) VALUES ($cod, '$in')";
        $obj->ingresar_institucion($sql);
            }



?>

<?php include_once '../../layout/header.php'?>