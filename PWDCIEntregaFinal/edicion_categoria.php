<?php 

include "conexion.php";

session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}

$id= $_REQUEST['ID_Categoria'];
$id_usuario = $_SESSION['ID_Usuario'];
$Titulo_Categoria =$_POST['Titulo_Categoria'];
$Descripcion_Categoria =$_POST['Descripcion_Categoria'];


$query ="UPDATE categoria set Titulo_Categoria= '$Titulo_Categoria', Descripcion_Categoria='$Descripcion_Categoria' WHERE ID_Categoria=$id";
$resultado = $conn->query($query);

if($resultado){
    header("location:indexAdministrador.php");
}else{
echo "No se Inserto";
}



?>