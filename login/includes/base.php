<?php
$servidor="localhost:3306";
$usuario="root";
$passsword="";
$db="girona_app";
$conexion=mysqli_connect($servidor,$usuario,$passsword,$db) or die (mysqli_error());