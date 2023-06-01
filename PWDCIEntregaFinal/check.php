<?php 

include "conexion.php";

include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}


$ID= $_REQUEST['id_video'];
$id= $_SESSION['ID_Usuario'];
$cumplido='1';

$sql ="SELECT * from Subniveles where id_video=$ID";
$result=mysqli_query($conn,$sql);
$filas2 = $result->fetch_assoc();


$checked = $filas2['visto'];

$uChecked = $checked ? 0 : 1;

$query="UPDATE Subniveles SET visto=$uChecked, Alumno=$id WHERE id_video=$ID";

$result = $conn->query($query);


$query2="INSERT INTO Nivel_UltimoVisto (Alumno,Nivel) VALUES ('$id','$ID')";
$result2=mysqli_query($conn,$query2);

if($result){
echo "Si se habilito";
}else{
echo "No se Inserto";
}



?>