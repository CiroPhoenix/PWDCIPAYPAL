<?php 

include "conexion.php";

session_start();
        
if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}



$id_usuario= $_SESSION['ID_Usuario'];
$Nombre_Usuario=$_SESSION["Nombre_Usuario"];
    $NomPatr_Usuario=$_SESSION["NomPatr_Usuario"];
    $NomMatr_Usuario=$_SESSION["NomMatr_Usuario"];


$ID= $_REQUEST['Curso'];


$query ="SELECT * FROM curso_comprados where Curso = '$ID'";
        $resultado=$conn->query($query);
        $filas = $resultado->fetch_assoc();
       
        $Nombre_Curso =  $filas['Titulo'];
        $fecha_inscripcion =  $filas['Fecha_Inscripcion'];


     
        



        
      
        $query_total ="SELECT SUM(visto) as 'total_ingresos_curso' FROM subniveles where Alumno = $id_usuario and Curso=$ID";
        $total=mysqli_query($conn,$query_total);
        $data=mysqli_fetch_array($total);
        $caja=$data['total_ingresos_curso'];

        $query2 ="SELECT fecha_nivel FROM Nivel_UltimoVisto  where Alumno=LAST_INSERT_ID($id_usuario)";
        $resultado2=$conn->query($query2);
        $filas2 = $resultado2->fetch_assoc();
       
        $fecha_nivel =  $filas2['fecha_nivel'];


        $query_diploma ="INSERT INTO diplomado (ID_Alumno, ID_Curso, Nombre_Estudiante, NomMatr_Estudiante, NomPatr_Estudiante, Nom_Curso)VALUES('$id_usuario', '$ID','$Nombre_Usuario', ' $NomMatr_Usuario','$NomPatr_Usuario','$Nombre_Curso')";
        $resultado_diploma = $conn->query($query_diploma);
        

$query ="INSERT INTO Cursos_Finalizados (Nombre_Curso,Niveles,fecha_inscripcion,fecha_ultimo_nivel,Alumno,Curso)VALUES('$Nombre_Curso', '$caja', '$fecha_inscripcion','$fecha_nivel','$id_usuario','$ID')";
$resultado = $conn->query($query);



if($resultado){
echo "Ya se ha finalizado curso";
header("Location: kardex.php");
}else{
echo "No se Inserto";

}







?>