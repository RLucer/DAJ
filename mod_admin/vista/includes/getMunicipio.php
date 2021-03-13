<?php
	
	require ('conexion.php');
	
	$iddb_region = $_POST['iddb_region'];
	
	$queryM = "SELECT * FROM db_ciudad WHERE idregion = '$iddb_region' ORDER BY ciudad";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Provincia</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['iddb_ciudad']."'>".$rowM['ciudad']."</option>";
	}
	
	echo $html;
?>		