<?php 

include "conexion.php";


session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}

$usuario = $_SESSION["ID_Usuario"];



$ID= $_REQUEST['Curso'];

       $Nombre_Usuario=$_SESSION['Nombre_usuario_Usuario'];
        $Palabra_Comentario =$_POST['Palabra_Comentario'];
        $Calificacion_Comentario =$_POST['Calificacion_Comentario'];        

$query ="INSERT INTO comentarios (Usuario_Comentario, Curso_Comentario, Nombre_Usuario, Palabra_Comentario, Calificacion_Comentario)VALUES('$usuario', '$ID', '$Nombre_Usuario', '$Palabra_Comentario', '$Calificacion_Comentario')";
$resultado = $conn->query($query);

if($resultado){
    header("Location: index.php");
}else{
echo "No se Inserto";
}



?>