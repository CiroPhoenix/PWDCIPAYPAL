<?php 

include "conexion.php";

include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}

$usuario = $_SESSION["ID_Usuario"];


$nombre = $_SESSION["Nombre_Usuario"];
$paterno = $_SESSION["NomPatr_Usuario"];
$materno = $_SESSION["NomMatr_Usuario"];


$ID= $_REQUEST['ID_Curso'];

$query ="SELECT * FROM curso where ID_Curso = '$ID'";
        $resultado=$conn->query($query);
        $filas = $resultado->fetch_assoc();
       
        $Titulo_Curso =  $filas['Titulo_Curso'];
        $Costo_Curso =  $filas['Costo_Curso'];


$query ="INSERT INTO curso_comprados (Usuario, Curso, Titulo, Costo,Usuario_Nombre, Usuario_Nombre_Paterno,Usuario_Nombre_Materno)VALUES('$usuario','$ID','$Titulo_Curso','$Costo_Curso','$nombre','$paterno','$materno')";
$resultado = $conn->query($query);

if($resultado){
    header("location:Cursos_Comprados.php");
}else{
echo "No se Inserto";
}



?>