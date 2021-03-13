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

$del1        = $_POST['txtdelincuente1'];
$del2        = $_POST['txtdelincuente2'];
$relacion     = $_POST['parentesco'];
$parametro   = $_POST['parametro'];
$roles       = $_POST['roles'];



$obj = new database();


        if($funcion == "modificar"){
         //   $sql="update db_institucion set institucion='$in' where iddb_institucion='$parametro'";
           // $obj->ingresar_institucion($sql);
    
        }else{
        //ingresar una nueva institucion
        $sql = "INSERT INTO `db_crimen`.`db_parentesco` (`delincuente1`, `delincuente2`, `relacion`) VALUES ('$del1', '$del2', '$relacion');
        ";
        $obj->ingresar_parentesco($sql);
            }
            


?>

<?php include_once '../../layout/header.php'?>