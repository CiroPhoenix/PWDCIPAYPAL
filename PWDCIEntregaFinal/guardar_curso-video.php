<?php 

include "conexion.php";

session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: index.php");
}

$id_usuario = $_SESSION['ID_Usuario'];
$nombre_usuario = $_SESSION["Nombre_usuario_Usuario"];

$query = "SELECT IFNULL(MAX(ID_Curso), 0) + 1 AS siguiente_id FROM  curso WHERE Instructor_Curso = '$id_usuario'";
$resultado = mysqli_query($conn, $query);

if ($resultado->num_rows > 0) {
  $row = $resultado->fetch_assoc();
  $next_id = $row["siguiente_id"] + 1;
} else {
  $next_id = 1;
}

if (!$resultado) {
  die("Error al obtener el siguiente ID para el vídeo: " . mysqli_error($conn));
}
$fila = mysqli_fetch_assoc($resultado);
$id_video = intval($fila["siguiente_id"]);

//Obtener

$Costo_Curso =$_POST['Costo_Curso'];
$Descripcion_Curso =$_POST['Descripcion_Curso'];

$Foto_Curso = addslashes(file_get_contents($_FILES['Foto_Curso']['tmp_name']));
$Titulo_Curso =$_POST['Titulo_Curso'];
$Foto_Curso2 = addslashes(file_get_contents($_FILES['Foto_Curso2']['tmp_name']));
$Foto_Curso3 = addslashes(file_get_contents($_FILES['Foto_Curso3']['tmp_name']));
$Categoria_Curso =$_POST['Categoria_Curso'];
$nombre_video = $_FILES["video"]["name"];
$tipo_video = $_FILES["video"]["type"];
$tamano_video = $_FILES["video"]["size"];
$ruta_video = "videosCurso/" . $nombre_usuario. "/" . $nombre_video;

// Crear la carpeta del usuario si no existe
if (!is_dir("videosCurso/" . $nombre_usuario)) {
    mkdir("videosCurso/" . $nombre_usuario, 0777, true);
  }
  

  // Mover el archivo subido a la carpeta del usuario
if (move_uploaded_file($_FILES["video"]["tmp_name"], $ruta_video)) {
    // Insertar los datos del video en la base de datos

$query ="CALL AgregarCurso('$id_usuario','$Costo_Curso','$Descripcion_Curso','$Foto_Curso','$Titulo_Curso','$Foto_Curso2','$Foto_Curso3','$Categoria_Curso','$ruta_video', '$nombre_video', '$tipo_video', '$tipo_video','$nombre_usuario')";


//$query = "INSERT INTO curso(Instructor_Curso, Niveles_Curso, Costo_Curso, Descripcion_Curso, Calificacion_Curso, Foto_Curso, Titulo_Curso, Foto_Curso2, Foto_Curso3, Categoria_Curso, path_video, nombre_video, type_video, content_type, nombre_usuario) VALUES ('$id_usuario','$Niveles_Curso','$Costo_Curso','$Descripcion_Curso','$Calificacion_Curso','$Foto_Curso','$Titulo_Curso','$Foto_Curso2','$Foto_Curso3','$Categoria_Curso''$ruta_video', '$nombre_video', '$tipo_video', '$tipo_video','$nombre_usuario')";

$resultado = $conn->query($query);
if (!$resultado) {
    die("Error al grabar los datos del video en la base de datos: " . mysqli_error($conn));
  }

  // Mostrar mensaje de éxito
  echo "El vídeo se ha subido con éxito.";
  header("location:indexMaestro.php");

  // Cerrar la conexión a la base de datos
  mysqli_close($conn);
} else {
  // Mostrar mensaje de error
  echo "Error al subir el vídeo.";
}

//$query = "INSERT INTO curso(Instructor_Curso, Niveles_Curso, Costo_Curso, Descripcion_Curso, Calificacion_Curso, Foto_Curso, Titulo_Curso, Foto_Curso2, Foto_Curso3,Categoria_Curso,path_video,nombre_video,type_video,content_type,nombre_usuario) VALUES ('$id_usuario','$Niveles_Curso','$Costo_Curso','$Descripcion_Curso','$Calificacion_Curso','$Foto_Curso','$Titulo_Curso','$Foto_Curso2','$Foto_Curso3','$Categoria_Curso''$ruta_video', '$nombre_video', '$tipo_video', '$tipo_video','$nombre_usuario')";


?>