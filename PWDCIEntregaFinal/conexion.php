<?php 

$server="localhost";
$user="cirodb";
$pass="starkphoenix";
$database="Proyecto_BDM";

$conn = mysqli_connect($server,$user,$pass,$database);

if(!$conn){
die("Conexion Fallida");

}

?>