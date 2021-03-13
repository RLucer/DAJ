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

$com            = $_POST['txtcomuna'];

$obj = new database();
$sql = "SELECT * FROM db_comuna where iddb_comuna=$com";
$data = $obj->consultar($sql); ?>

<?php foreach ($data as $fila) {
    $comu = $fila["comuna"];

}




$direccion      = $_POST['txtdireccion'];




$diravalida = $direccion .",". $comu;



if ($_POST) {
    // get geocode address details



    $geocodeData = getGeocodeData($diravalida);
    if ($geocodeData) {
        $latitud = $geocodeData[0];
        $longitud = $geocodeData[1];
        $dir = $geocodeData[2];

      

?>

<?php
    } else {
        echo "Dirección Incorrecta, Verifica por Facvor";
    }
}






$rut            = $_POST['txtrut'];
$nombres        = $_POST['txtnombres'];
$apaterno       = $_POST['txtapaterno'];
$amaterno       = $_POST['txtamaterno'];
$apodo          = $_POST['txtapodo'];
$direccion      = $_POST['txtdireccion'];
$fonofijo       = $_POST['txtfonofijo'];
$email          = $_POST['txtemail'];
$fonomovil      = $_POST['txtcelular'];
$fnacimiento    = $_POST['txtfnacimiento'];
$sexo           = $_POST['txtsexo'];
$dultima        = $_POST['txtdireccionultima'];
$idcomuna       = $_POST['txtcomuna'];
$idestado       = $_POST['txtestado'];
$ultimacomuna   = $_POST['txtultimacomuna'];
$funcion        = $_POST['funcion'];
/*
echo $rut          ;
echo $nombres       ;
echo $apaterno       ;
echo $amaterno      ;
echo $apodo          ;
echo $direccion      ;
echo $fonofijo       ;
echo $email          ;
echo $fonomovil     ;
echo $fnacimiento  ;
echo $sexo         ;
echo $direccionultima;
echo $idcomuna    ;
echo $idestado    ;
echo $idclasificacion;
echo $latitud;
echo $longitude;

*/

$obj = new database();



if ($funcion == "modificar") {


    $sql1 = "update db_personas set nombres='$nombres' where iddb_persona='$rut'";
    $sql2 = "update db_personas set apaterno='$apaterno' where iddb_persona='$rut'";
    $sql3 = "update db_personas set amaterno='$amaterno' where iddb_persona='$rut'";
    $sql4 = "update db_personas set apodo='$apodo' where iddb_persona='$rut'";
    $sql5 = "update db_personas set direccion='$direccion' where iddb_persona='$rut'";
    $sql6 = "update db_personas set fonoredfija='$fonofijo' where iddb_persona='$rut'";
    $sql7 = "update db_personas set email='$email' where iddb_persona='$rut'";
    $sql8 = "update db_personas set fonomovil='$fonomovil' where iddb_persona='$rut'";
    $sql9 = "update db_personas set fnacimiento='$fnacimiento' where iddb_persona='$rut'";
    $sql10 = "update db_personas set sexo='$sexo' where iddb_persona='$rut'";
    $sql11 = "update db_personas set dultima='$dultima' where iddb_persona='$rut'";
    $sql12 = "update db_personas set idcomuna='$idcomuna' where iddb_persona='$rut'";
    $sql13 = "update db_personas set idestado='$idestado' where iddb_persona='$rut'";
    $sql14 = "update db_personas set ultimacomuna='$ultimacomuna' where iddb_persona='$rut'";
    $sql15 = "update db_personas set latitud='$latitud' where iddb_persona='$rut'";
    $sql16 = "update db_personas set longitud='$longitud' where iddb_persona='$rut'";
    $sql17 = "update db_personas set direcciongoogle='$dir' where iddb_persona='$rut'";



    $obj->ingresar_mod_persona($sql1);
    $obj->ingresar_mod_persona($sql1);
    $obj->ingresar_mod_persona($sql2);
    $obj->ingresar_mod_persona($sql3);
    $obj->ingresar_mod_persona($sql4);
    $obj->ingresar_mod_persona($sql5);
    $obj->ingresar_mod_persona($sql6);
    $obj->ingresar_mod_persona($sql7);
    $obj->ingresar_mod_persona($sql8);
    $obj->ingresar_mod_persona($sql9);
    $obj->ingresar_mod_persona($sql10);
    $obj->ingresar_mod_persona($sql11);
    $obj->ingresar_mod_persona($sql12);
    $obj->ingresar_mod_persona($sql13);
    $obj->ingresar_mod_persona($sql14);
    $obj->ingresar_mod_persona($sql15);
    $obj->ingresar_mod_persona($sql16);
    $obj->ingresar_mod_persona($sql17);
} else {
    //ingresar una nueva persona
    $sql = "INSERT INTO DB_PERSONAS(IDDB_PERSONA,NOMBRES,APATERNO,AMATERNO,APODO,DIRECCION,
FONOREDFIJA,EMAIL,FONOMOVIL,FNACIMIENTO,SEXO,DIRECCION_ULTIMAUBICA,IDCOMUNA,IDESTADO,ULTIMACOMUNA,LATITUD,LONGITUD,DIRECCIONGOOGLE) 
values ('$rut','$nombres','$apaterno','$amaterno','$apodo','$direccion','$fonofijo','$email','$fonomovil','$fnacimiento','$sexo','$dultima',$idcomuna,$idestado,'$ultimacomuna',$latitud,$longitud,'$dir')";
    $obj->ingresar_persona($sql);
}







function getGeocodeData($address)
{
    $address = urlencode($address);
    $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyDsdPmZv3_aXiNIk8quqAtDJA1thfyWBGA";
    $geocodeResponseData = file_get_contents($googleMapUrl);
    $responseData = json_decode($geocodeResponseData, true);
    if ($responseData['status'] == 'OK') {
        $latitude = isset($responseData['results'][0]['geometry']['location']['lat']) ? $responseData['results'][0]['geometry']['location']['lat'] : "";
        $longitude = isset($responseData['results'][0]['geometry']['location']['lng']) ? $responseData['results'][0]['geometry']['location']['lng'] : "";
        $formattedAddress = isset($responseData['results'][0]['formatted_address']) ? $responseData['results'][0]['formatted_address'] : "";
        if ($latitude && $longitude && $formattedAddress) {
            $geocodeData = array();
            array_push(
                $geocodeData,
                $latitude,
                $longitude,
                $formattedAddress
            );
            return $geocodeData;
        } else {
            return false;
        }
    } else {
        echo "ERROR: {$responseData['status']}";
        return false;
    }
}


include_once '../../layout/header.php'; ?>