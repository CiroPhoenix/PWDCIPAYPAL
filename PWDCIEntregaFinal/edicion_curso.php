<?php 

include "conexion.php";

session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}
$id= $_REQUEST['ID_Curso'];
$id_usuario = $_SESSION['ID_Usuario'];
$Niveles_Curso =$_POST['Niveles_Curso'];
$Costo_Curso =$_POST['Costo_Curso'];
$Descripcion_Curso =$_POST['Descripcion_Curso'];
$Calificacion_Curso =$_POST['Calificacion_Curso'];
$Foto_Curso = addslashes(file_get_contents($_FILES['Foto_Curso']['tmp_name']));
$Titulo_Curso =$_POST['Titulo_Curso'];
$Foto_Curso2 = addslashes(file_get_contents($_FILES['Foto_Curso2']['tmp_name']));
$Foto_Curso3 = addslashes(file_get_contents($_FILES['Foto_Curso3']['tmp_name']));
$Categoria_Curso =$_POST['Categoria_Curso'];


//INSERT INTO curso(Instructor_Curso, Niveles_Curso, Costo_Curso, Descripcion_Curso, Calificacion_Curso, Titulo_Curso) VALUES ('$id_usuario', '$Niveles_Curso', '$Costo_Curso', '$Descripcion_Curso', '$Calificacion_Curso', '$Foto_Curso','$Titulo_Curso','$Foto_Curso2','$Foto_Curso3');

//  $sql="UPDATE usuario set Foto_Usuario= '$Foto_Usuario',Nombre_Usuario='$Nombre_Usuario', NomPatr_Usuario = '$NomPatr_Usuario', NomMatr_Usuario = '$NomMatr_Usuario',Rol_Usuario='$Rol_Usuario',Rol_Usuario='$Rol_Usuario',Genero_Usuario='$Genero_Usuario',Nacimiento_Usuario='$Nacimiento_Usuario',Correo_Usuario='$Correo_Usuario',Nombre_usuario_Usuario='$Nombre_usuario_Usuario',Contrasena_Usuario='$Contrasena_Usuario' WHERE ID_Usuario=$id";
// CALL ModificarCurso($id, $Niveles_curso, $Costo_Curso, '$Descripcion_Curso', '$Calificacion_Curso', '$Foto_Curso', '$Titulo_Curso', '$Foto_Curso2', '$Foto_Curso3', '$Categoria_Curso');
$query ="CALL ModificarCurso($id, $Niveles_Curso, $Costo_Curso, '$Descripcion_Curso', '$Calificacion_Curso', '$Foto_Curso', '$Titulo_Curso', '$Foto_Curso2', '$Foto_Curso3', '$Categoria_Curso')";
$resultado = $conn->query($query);

if($resultado){

header("location:indexMaestro.php");
}else{
echo "No se Inserto";
}



?>