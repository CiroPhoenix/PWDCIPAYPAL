<?php 
include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}




$ID = $_REQUEST['ID_Usuario'];

$sql ="DELETE from usuario where ID_Usuario = '$ID'";
$result=mysqli_query($conn,$sql);

if($result){
  header("location:indexAdministrador.php");
}else{
 echo "no se elimino el usuario";
}

?>






