<?php
//require("phpsqlajax_dbinfo.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server


$con = mysqli_connect("localhost", "rlucero", "Rls232408", "db_crimen") or die("Error en la conexión.");
$query = "select * from db_personas ORDER BY iddb_persona DESC";
$result = mysqli_query($con,$query);


if (!$result) {
  die('Invalid query: ');
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['iddb_persona'] . '" ';
  echo 'name="' . parseToXML($row['nombres']) . '" ';
  echo 'lastname="' . parseToXML($row['apaterno']) . '" ';
  echo 'address="' . parseToXML($row['direcciongoogle']) . '" ';
  echo 'lat="' . $row['latitud'] . '" ';
  echo 'lng="' . $row['longitud'] . '" ';
  echo 'type="' . $row['sexo'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>
