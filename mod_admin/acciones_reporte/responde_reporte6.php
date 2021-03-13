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

<?php
if (isset($_POST['idrutcliente'])){
$rutcli= $_POST['idrutcliente'];
}




echo 'cliente rut: '.$rutcli;


?>