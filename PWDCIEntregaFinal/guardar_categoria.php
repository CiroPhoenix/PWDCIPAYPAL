<?php 

include "conexion.php";

session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}

$id_usuario = $_SESSION['ID_Usuario'];
$Titulo_Categoria =$_POST['Titulo_Categoria'];
$Descripcion_Categoria =$_POST['Descripcion_Categoria'];


$query ="CALL AgregarCategoria('$id_usuario','$Titulo_Categoria','$Descripcion_Categoria')";
$resultado = $conn->query($query);

if($resultado){
    header("location:indexAdministrador.php");
}else{
echo "No se Inserto";
}



?>