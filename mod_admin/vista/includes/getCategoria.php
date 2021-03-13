<?php
	require ('conexion.php');
	
	$idfam = $_POST['idfamilia'];

	echo "id de familia es".$idfam;
	
	$query = "SELECT * FROM producto WHERE familia_id = '$idfam' ORDER BY idproducto";
	$resultado=$mysqli->query($query);
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['idproducto']."'>".$row['producto']."</option>";
	}
	echo $html;
?>