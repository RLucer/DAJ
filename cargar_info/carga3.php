<?php


$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

if (!file_exists('archivos')) {
  mkdir('archivos', 0777, true);
  if (file_exists('archivos')) {
    if (move_uploaded_file($guardado, 'archivos/' . $nombre)) {
    //  echo "Archivo guardado con exito";
    } else {
      echo "Archivo no se pudo guardar";
    }
  }
} else {
  if (move_uploaded_file($guardado, 'archivos/' . $nombre)) {
    //echo "Archivo guardado con exito";
  } else {
    echo "Archivo no se pudo guardar";
  }
}

?>

<?php

include 'base.php';


$sql0 = "delete from girona_app.ventas;";
mysqli_query($conexion, $sql0);

$arc = '../cargar_info/archivos/' . $nombre;
$filas = file($arc);
$registros=0;

$nograbados=0;
foreach ($filas as $value) {

  list($x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10,$x11,$x12,$x13,) = explode(",", $value);

  $xx1= substr($x1,1,10);  //insert de fecha

 //echo 'fecha: '.$xx1.'/'; 

 $partes = explode('-',$xx1);
 $fecha_nueva = "{$partes[2]}-{$partes[1]}-{$partes[0]}";

//echo 'fecha nueva'.$fecha_nueva,

  /*
  echo 'venci: '.$RUT.'/';
  echo ' debe: '.$CLIENTE.'/';
  echo 'haber: '.$CODIGO.'/';
  echo 'saldo: '.$PRODUCTO.'/';
  echo 'total: '.$FAMILIA.'/';
  echo 'cod vend: '.$CLASE.'/';
  echo 'glosa: '.$CANTIDAD.'/';
  echo 'razon: '.$PRECIO_VENTA.'/';
  echo 'razon2: '.$MONTO_TOTAL.'/';
  echo 'ape vend: '.$VENDEDOR.'<br>';
*/

  
  $sql = "INSERT INTO `girona_app`.`ventas` (`FECHA_DOCUMENTO`, `VENDEDOR`, `N_DOCUMENTO`, `DOCUMENTO`, `RUT`, `CLIENTE`, `CODIGO`, `PRODUCTO`, `FAMILIA`, `CLASE`, `CANTIDAD`, `PRECIO_VENTA`, `MONTO_TOTAL`) VALUES('$fecha_nueva',$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10,$x11,$x12,$x13)";
    if($registros>=1)
     if( mysqli_query($conexion, $sql)){
      //echo 'grabo en la base';
     }else{
     //echo 'no grabo un registro en la base de datos, favor avisar';
     $nograbados++;
     }


$registros++;
 
}


//aca, elimino los registros de comillas en los datos que contiene la base de datos
$vb='"';
$vr='';

/*
$sqlx0="UPDATE deuda_clientes SET doc_cod = REPLACE(doc_cod,'$vb','$vr')";
$sqlx1="UPDATE deuda_clientes SET razsoc = REPLACE(razsoc,'$vb','$vr')";
$sqlx2="UPDATE deuda_clientes SET razsoc2 = REPLACE(razsoc2,'$vb','$vr')";
$sqlx3="UPDATE deuda_clientes SET rut = REPLACE(rut,'$vb','$vr')";
$sqlx4="UPDATE deuda_clientes SET dir = REPLACE(dir,'$vb','$vr')";
$sqlx5="UPDATE deuda_clientes SET fono = REPLACE(fono,'$vb','$vr')";
$sqlx6="UPDATE deuda_clientes SET clase2 = REPLACE(clase2,'$vb','$vr')";
$sqlx7="UPDATE deuda_clientes SET pers_nom = REPLACE(pers_nom,'$vb','$vr')";
$sqlx8="UPDATE deuda_clientes SET pers_apell = REPLACE(pers_apell,'$vb','$vr')";
$sqlx9="UPDATE deuda_clientes SET glosacon = REPLACE(glosacon,'$vb','$vr')";



for ($i=0; $i <10 ; $i++) { 
  # code...
  mysqli_query($conexion, ${'sqlx' . $i});

}
*/

echo '<h1> Numero de registros ingresados :'.$registros.'</h1>';
echo '<h1> Numero de registros NO grabados :'.$nograbados.'</h1>';

echo '<p class="alert alert-success agileits" role="alert"> Accion Realizada Correctamente!';
//header('Refresh: 3; URL=http://localhost/intranet_copan/login/index.php');

?>





