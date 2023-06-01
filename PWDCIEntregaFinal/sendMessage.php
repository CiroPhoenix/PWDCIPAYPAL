<?php

include "conexion.php";
session_start();
if($_POST)
{
	$name=$_SESSION['Nombre_usuario_Usuario'];
	$id_user=$_SESSION['ID_Usuario'];
    $msg=$_POST['Mensaje'];
	
$ID= $_REQUEST['ID_Usuario'];
$userssql ="SELECT * from usuario where ID_Usuario=$ID";
$resultado=mysqli_query($conn,$userssql);
$filas = $resultado->fetch_assoc();
	
    
	$sql="INSERT INTO `chat`(`Nombre`, `Mensaje`, `id_usuario`,`id_usuario_recibido`) VALUES ('".$name."', '".$msg."','".$id_user."','".$ID."')";

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else
	{
		echo "Algo salió mal";
	}
	
	}
?>