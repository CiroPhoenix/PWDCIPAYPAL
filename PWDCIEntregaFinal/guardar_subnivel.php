<?php 

include "conexion.php";

session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: index.php");
}

$id_usuario = $_SESSION['ID_Usuario'];
$nombre_usuario = $_SESSION["Nombre_usuario_Usuario"];
$NivelPadre =$_POST['NivelPadre'];
$ID= $_REQUEST['ID_Curso'];
$vista= '0';
$Alumno='0';

$query = "SELECT IFNULL(MAX(id_video), 0) + 1 AS siguiente_id FROM  Subniveles WHERE  NivelPadre = '$NivelPadre'";
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

$NivelPadre =$_POST['NivelPadre'];
$nombre_video = $_FILES["video"]["name"];
$tipo_video = $_FILES["video"]["type"];
$tamano_video = $_FILES["video"]["size"];
$ruta_video = "Niveles/" . $nombre_usuario. "/" . $nombre_video;

// Crear la carpeta del usuario si no existe
if (!is_dir("Niveles/" . $nombre_usuario)) {
    mkdir("Niveles/" . $nombre_usuario, 0777, true);
  }
  

  // Mover el archivo subido a la carpeta del usuario
if (move_uploaded_file($_FILES["video"]["tmp_name"], $ruta_video)) {
    // Insertar los datos del video en la base de datos

$query ="INSERT INTO Subniveles(NivelPadre, id_video, path_video, nombre_video, type_video, content_type,Curso,visto,Alumno)values('$NivelPadre','$id_video', '$ruta_video', '$nombre_video', '$tipo_video', '$tipo_video','$ID','$vista','$Alumno')";


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