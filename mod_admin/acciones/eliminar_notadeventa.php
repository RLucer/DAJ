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


include_once '../../layout/header.php';


$parametro = $_GET['parametro'];



$hoy = date("Y-m-d");

include '../vista/includes/conexion.php';

$query = "SELECT * FROM notaventa where idnotaventa='$parametro' ";

$resultado = $mysqli->query($query);


while ($row = $resultado->fetch_assoc()) {
    $FF = $row['fecha_salida'];
}






if ($FF<$hoy){
    echo '<h3><p class="alert alert-danger agileits" role="alert"> NOTA DE VENTA YA FACTURADA no es posible eliminarla</h3>';
    header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/ingresoNV.php');
}else{
    



    include '../database/database.php';
    $hoy = getdate();
    $parametro = $_GET['parametro'];
    
    $obj = new database();
    
    
    $sql = "DELETE 
    from notaventa 
    where idnotaventa='$parametro'";
    $data = $obj->eliminar_notaventa($sql);
    
    


}



 include_once '../../layout/footer.php';