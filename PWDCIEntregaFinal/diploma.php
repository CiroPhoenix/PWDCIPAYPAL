<?php 
include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}
//$sql="SELECT * FROM usuario WHERE Correo_Usuario='$Correo_Usuario' AND Contrasena_Usuario='$Contrasena_Usuario'";

$sql="SELECT concat_ws(' ', Nombre_Estudiante, NomPatr_Estudiante, NomMatr_Estudiante) AS Nombre_Completo, Fecha_terminacion_curso, Nom_Curso, ID_Curso FROM diplomado ORDER BY Fecha_terminacion_curso DESC LIMIT 1;";
    $result= mysqli_query($conn,$sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $Nombre_Completo = $row['Nombre_Completo'];
        $Fecha_terminacion_curso = $row['Fecha_terminacion_curso'];
        $Nom_Curso = $row['Nom_Curso'];
        $ID_Curso = $row['ID_Curso'];
    
    }else{
        echo "<script>alert('Ocurrio un error')</script>";
       
    }


    $sql="SELECT Instructor_Curso FROM curso WHERE ID_Curso=".$ID_Curso.";";
    $result= mysqli_query($conn,$sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $Instructor_Curso = $row['Instructor_Curso'];
    
    }else{
        echo "<script>alert('Ocurrio un error')</script>";
       
    }

    $sql="SELECT concat_ws(' ', Nombre_Usuario, NomPatr_Usuario, NomMatr_Usuario) AS Nombre_Completo_Docente FROM usuario WHERE ID_Usuario=".$Instructor_Curso.";";
    $result= mysqli_query($conn,$sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $Nombre_Completo_Docente = $row['Nombre_Completo_Docente'];
    
    }else{
        echo "<script>alert('Ocurrio un error')</script>";
       
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Diploma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/diploma-estilo.css" />
</head>
<body >
    
<div class="diploma-contenedor" style=" background-image: url('img/SaturnoBackgroundExplosion.jpg');">
    
    
    <div class="imagen-diploma">
        <img src="img/SaturnoLogo.png">
    </div>
    
    
    <h1 style="font-family: 'Brush Script MT', cursive;  font-size: 80px;" >Diploma</h1>
    
    
    <h3 style="font-family: 'Brush Script MT', cursive;  font-size: 75px;">Otorgado a:</h3>
    
    <h1 style="font-family: 'Brush Script MT', cursive;  font-size: 75px;" ><?php echo $Nombre_Completo; ?></h1>
    <h1 >_____________________________________________________________________</h1>
    
    
    <h2 style=" font-size: 35px;">Por haber completado satisfactoriamente a nuestros mejores cursos de este portal de la academia Saturno</h2>
   
<br>
<br>
    <div class="fecha-terminacion">
        <p style=" font-size: 20px;">Fecha de terminacion del curso: <?php echo $Fecha_terminacion_curso; ?></p>
    </div>
   
    <div class="fecha-terminacion">
        <p style=" font-size: 20px;">Nombre del Curso: <?php echo $Nom_Curso; ?></p>
    </div>
   
    
    <div class="pie-diploma-izq">
        <p ALIGN=left style="font-size: 20px;">Firma del Docente:<?php echo $Nombre_Completo_Docente; ?></p>
        

    </div>
  
    <div class="pie-diploma-derech">
       
        <p ALIGN=right style=" font-size: 20px;">Firma del alumno:<?php echo $Nombre_Completo; ?></p>

    </div>




</div>





</body>
</html>


</div>


