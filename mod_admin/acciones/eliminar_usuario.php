<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if ($varsesion == null || $varsesion == '') {
    echo "<h2> Ud NO cuenta con autorización debe loguear primero <h2> <br>  ";
?>
    <a class="nav-link" href="/intranet_copan/login/index.php"> pinche aquí para Loguearse</a>
<?php
    die();
}
?>
<?php include_once '../../layout/header.php'; 
include '../database/database.php';

$parametro = $_GET['parametro'];

$obj = new database();

$sql = "delete from usuario where idrut='$parametro'";
$data = $obj->eliminar_usuario($sql);
?>




<?php include_once '../../layout/footer.php'; ?>