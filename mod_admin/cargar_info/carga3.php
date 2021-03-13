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


$sql0 = "delete from copan_app.deuda_clientes;";
mysqli_query($conexion, $sql0);

$arc = '../cargar_info/archivos/' . $nombre;
$filas = file($arc);
$registros=0;
$nograbados=0;
foreach ($filas as $value) {
  list(,,,,$doc_cod,,$numfact,,$fecha,$vencimie,$debe,$haber,$doc_sdo,,,,,,$total,,,,,,,,,,,,,,,,,,,$codvend,$glosacon,,,,,$razsoc,$razsoc2,$rut,$dir,$fono,,,$clase2,,,,,,,,,,,$pers_nom,$pers_apell,,,,,,,,,,,,,,,,,) = explode(",", $value);
  echo 'tipo docu: '.$doc_cod.'/'; 
  echo 'N_Fact: '.$numfact.'/'; 
  echo 'fecha: '.$fecha.'/';
  echo 'venci: '.$vencimie.'/';
  echo ' debe: '.$debe.'/';
  echo 'haber: '.$haber.'/';
  echo 'saldo: '.$doc_sdo.'/';
  echo 'total: '.$total.'/';
  echo 'cod vend: '.$codvend.'/';
  echo 'glosa: '.$glosacon.'/';
  echo 'razon: '.$razsoc.'/';
  echo 'razon2: '.$razsoc2.'/';
  echo 'rut: '.$rut.'/';
  echo 'dir: '.$dir.'/';
  echo 'fono: '.$fono.'/';
  echo 'clase2: '.$clase2.'/';
  echo 'nom vend: '.$pers_nom.'/';
  echo 'ape vend: '.$pers_apell.'<br>';




  
  $sql = "INSERT INTO `copan_app`.`deuda_clientes` (`doc_cod`, `numfact`, `fecha`, `vencimie`, `debe`, `haber`, `doc_sdo`, `total`, `codvend`, `glosacon`, `razsoc`, `razsoc2`, `rut`, `dir`, `fono`, `clase2`, `pers_nom`, `pers_apell`) VALUES('$doc_cod','$numfact','$fecha','$vencimie','$debe','$haber','$doc_sdo','$total','$codvend','$glosacon','$razsoc','$razsoc2','$rut','$dir','$fono','$clase2','$pers_nom','$pers_apell')";
    if($registros>=0)
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


echo '<h1> Numero de registros ingresados :'.$registros.'</h1>';
echo '<h1> Numero de registros NO grabados :'.$nograbados.'</h1>';

echo '<p class="alert alert-success agileits" role="alert"> Accion Realizada Correctamente!';
//header('Refresh: 3; URL=http://localhost/intranet_copan/login/index.php');

?>





