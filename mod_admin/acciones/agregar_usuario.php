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

$rut         = $_POST['txtrut'];
$nombre      = $_POST['txtnombre'];
$apaterno    = $_POST['txtapaterno'];
$amaterno    = $_POST['txtamaterno'];
$pa          = $_POST['txtpassword'];
$permiso    = $_POST['perm'];
$parametro  = $_POST['parametro'];
$funcion    = $_POST['funcion'];
$cod_vendedor=$_POST['txtcod_vendedor'];
$password = md5($pa);

$obj = new database();
/*
echo "rut :".$rut;
echo "-nom".$nombre;

echo "-apat".$apaterno;
echo "-funcion".$funcion;
echo "-amat".$amaterno;
echo "-pass :".$password;
echo "-parametro:".$parametro;
echo "-permiso:".$permiso;
*/

if($funcion == "modificar"){
    //actualiza un usuario ya agreagadp
    $sql="update usuario set password='$password' where idrut='$parametro'";
    $obj->ingresar_usuario($sql);

}else{
//ingresar un nueva usuario
$sql = "INSERT INTO `copan_app`.`usuario` (`idrut`, `nombre`, `apaterno`, `amaterno`, `permiso_id`, `password`,`cod_vendedor`) VALUES ('$rut','$nombre','$apaterno','$amaterno',$permiso,'$password','$cod_vendedor')";
$obj->ingresar_usuario($sql);




}



 include_once '../../layout/header.php'; ?>