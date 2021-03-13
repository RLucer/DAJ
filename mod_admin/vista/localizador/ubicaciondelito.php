<?php
//require("phpsqlajax_dbinfo.php");


if($_GET){

    $parametro = $_GET['parametro'];

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
                $query = "SELECT  * -- fecha_delito, iddetalle, detalledelito, direcciondelito, comuna, latitud_delito,longitud_delito,direcciondelito_google
                FROM db_crimen.db_denuncia
                join db_comuna
                on db_denuncia.idcomuna_denun=db_comuna.iddb_comuna
                join db_detallede
                on db_denuncia.iddetalle=db_detallede.iddb_detalle
                join db_delito
                on db_detallede.iddelit=db_delito.iddb_delito
                join db_personas
                on db_denuncia.iddelincuente=db_personas.iddb_persona
                where iddb_delito ='$parametro'";
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
                echo 'id="' . $row['iddelincuente'] . '" ';
                echo 'name="' . parseToXML($row['nombres']) . '" ';
                echo 'apaterno="' . parseToXML($row['apaterno']) . '" ';
                echo 'detalledelito="' . parseToXML($row['detalledelito']) . '" ';
                echo 'address="' . parseToXML($row['direcciondelito_google']) . '" ';
                echo 'lat="' . $row['latitud_delito'] . '" ';
                echo 'lng="' . $row['longitud_delito'] . '" ';
                echo 'type="' . $row['comuna'] . '" ';
                echo '/>';
                $ind = $ind + 1;
                }

                // End XML file
                echo '</markers>';

}else{
                echo "no hay get";
            }

?>
	