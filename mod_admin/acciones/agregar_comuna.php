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
$codigo        =$_POST['txtcodigo'];
$comuna       = $_POST['txtcomuna'];
$ciudad       = $_POST['ciu'];
$sector       = $_POST['sect'];


$obj = new database();



if($funcion == "modificar"){
    //actualiza un usuario ya agreagadp
    $sql="update db_usuarios set password='$password' where iddb_rut='$parametro'";
    $obj->ingresar_usuario($sql);

}else{
//ingresar un nueva usuario
$sql = "INSERT INTO DB_COMUNA(IDDB_COMUNA,COMUNA,IDCIUDAD,IDSECTOR) values ($codigo,'$comuna',$ciudad,$sector)";



$obj->ingresar_comuna($sql);


}



 include_once '../../layout/header.php'; ?>