<?php
	require ('conexion.php');
	
	$iddb_ciudad = $_POST['iddb_ciudad'];
	
	$query = "SELECT * FROM db_comuna WHERE idciudad = '$iddb_ciudad' ORDER BY comuna";
	$resultado=$mysqli->query($query);
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['iddb_comuna']."'>".$row['comuna']."</option>";
	}
	echo $html;
?>