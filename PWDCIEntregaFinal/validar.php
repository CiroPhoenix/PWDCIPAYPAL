

<?php 
include "conexion.php";
error_reporting(0);
session_start();


if(isset($_SESSION["username"]))
{

    header("Location: panel.php");
}

if(isset($_POST['Registrar'])){
  
    
    if(empty($Nombre_Usuario)){
        
    echo "<p> Falta agregar nombre de usuario </p>";
  exit();
 
   
   }

   


   if(empty($NomPatr_Usuario)){
        
    echo "<p> Falta agregar nombre de usuario Paterno </p>";
  exit();
 
   
   }

   

   if(empty($NomMatr_Usuario)){
        
    echo "<p> Falta agregar nombre de usuario Materno </p>";
  exit();
 
   
   }

   





   if(empty($Nombre_usuario_Usuario)){
        
    echo "<p> Falta agregar nombre de nickname</p>";
  exit();
 
   
   }





   if(empty($Correo_Usuario)){
    $errores[] = true;
    echo "<p> Falta agregar correo </p>";
    
    exit();
    
   }else{
    if(!filter_var($Correo_Usuario, FILTER_VALIDATE_EMAIL)){
        echo "<p> Correo no valido </p>";
        exit();
    }
   }

  
  
   if(empty($Contrasena_Usuario)){
    $errores[] = true;
    echo "<p> Falta agregar password </p>";
    exit();
    
   }
   
   if(empty($cContrasena_Usuario)){
    $errores[] = true;
    echo "<p> Falta agregar password de aunteticar </p>";
    exit();
   
   }
    
    
    }
    

