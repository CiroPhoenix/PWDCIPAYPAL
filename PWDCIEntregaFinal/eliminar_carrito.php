<?php 

include "conexion.php";

include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}

$usuario = $_SESSION["ID_Usuario"];



$ID= $_REQUEST['ID_Curso'];

        
        //DELETE from usuario where ID_Usuario = '$ID'

$query ="DELETE from carrito where ID_Curso = '$ID'";
$resultado = $conn->query($query);

if($resultado){
    header("location:Carrito.php");
}else{
echo "No se Inserto";
}



?>