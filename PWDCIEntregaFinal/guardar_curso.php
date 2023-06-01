<?php 

include "conexion.php";

session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}

$id_usuario = $_SESSION['ID_Usuario'];

$Costo_Curso =$_POST['Costo_Curso'];
$Descripcion_Curso =$_POST['Descripcion_Curso'];
$Calificacion_Curso =$_POST['Calificacion_Curso'];
$Foto_Curso = addslashes(file_get_contents($_FILES['Foto_Curso']['tmp_name']));
$Titulo_Curso =$_POST['Titulo_Curso'];
$Foto_Curso2 = addslashes(file_get_contents($_FILES['Foto_Curso2']['tmp_name']));
$Foto_Curso3 = addslashes(file_get_contents($_FILES['Foto_Curso3']['tmp_name']));
$Categoria_Curso =$_POST['Categoria_Curso'];


$query ="CALL AgregarCurso('$id_usuario','$Costo_Curso','$Descripcion_Curso','$Calificacion_Curso','$Foto_Curso','$Titulo_Curso','$Foto_Curso2','$Foto_Curso3','$Categoria_Curso')";
$resultado = $conn->query($query);

if($resultado){

header("location:indexMaestro.php");
}else{
echo "No se Inserto";
}



?>