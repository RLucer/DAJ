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
$codigo       = $_POST['txtcodigo'];
$sector       = $_POST['txtsector'];
$description = $_POST['txtdescripcion'];


$obj = new database();



if($funcion == "modificar"){
    //actualiza un usuario ya agreagadp
    $sql="update db_usuarios set password='$password' where iddb_rut='$parametro'";
    $obj->ingresar_usuario($sql);

}else{
//ingresar un nueva usuario
$sql = "INSERT INTO DB_SECTOR(IDDB_SECTOR, SECTOR,DESCRIPCION) values ($codigo,'$sector','$description')";
$obj->ingresar_sector($sql);


}



 include_once '../../layout/header.php'; ?>