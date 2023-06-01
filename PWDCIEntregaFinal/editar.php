<?php 
include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}


if(isset($_POST["Editar"])){
    $id = $_SESSION['ID_Usuario'];
    $Foto_Usuario = addslashes(file_get_contents($_FILES["Foto_Usuario"]["tmp_name"]));
    $Nombre_Usuario=$_POST["Nombre_Usuario"];
    $NomPatr_Usuario=$_POST["NomPatr_Usuario"];
    $NomMatr_Usuario=$_POST["NomMatr_Usuario"];
   
    $Genero_Usuario=$_POST["Genero_Usuario"];
    $Nacimiento_Usuario=$_POST["Nacimiento_Usuario"];
    $Correo_Usuario=$_POST["Correo_Usuario"];
    $Nombre_usuario_Usuario=$_POST["Nombre_usuario_Usuario"];
    $Contrasena_Usuario=$_POST["Contrasena_Usuario"];
    $cContrasena_Usuario=$_POST["cContrasena_Usuario"];
    

    if($Contrasena_Usuario==$cContrasena_Usuario){
        $sql="SELECT * FROM usuario WHERE 
        Correo_Usuario='$Correo_Usuario' OR Nombre_usuario_Usuario='$Nombre_usuario_Usuario' ";
        $result=mysqli_query($conn,$sql);
        if(!$result->num_rows > 0){



            // CALL EditarUsuario('$Foto_Usuario', '$Nombre_Usuario', '$NomPatr_Usuario', ' $NomMatr_Usuario', ' $Rol_Usuario', '$Genero_Usuario', '$Nacimiento_Usuario', '$Correo_Usuario', ' $Nombre_usuario_Usuario', '$Contrasena_Usuario', '$id');
            // UPDATE usuario set Foto_Usuario= '$Foto_Usuario',Nombre_Usuario='$Nombre_Usuario', NomPatr_Usuario = '$NomPatr_Usuario', NomMatr_Usuario = '$NomMatr_Usuario',Rol_Usuario='$Rol_Usuario',Rol_Usuario='$Rol_Usuario',Genero_Usuario='$Genero_Usuario',Nacimiento_Usuario='$Nacimiento_Usuario',Correo_Usuario='$Correo_Usuario',Nombre_usuario_Usuario='$Nombre_usuario_Usuario',Contrasena_Usuario='$Contrasena_Usuario' WHERE ID_Usuario=$id
            $sql=" CALL EditarUsuario('$Foto_Usuario', '$Nombre_Usuario', '$NomPatr_Usuario', ' $NomMatr_Usuario',  '$Genero_Usuario', '$Nacimiento_Usuario', '$Correo_Usuario', ' $Nombre_usuario_Usuario', '$Contrasena_Usuario', '$id')";
            $result=mysqli_query($conn,$sql);

            if($result){
                echo "<script>alert('Usuario 
                registrado')</script>";
                $Foto_Usuario="";
                $$Nombre_Usuario="";
                $NomPatr_Usuario="";
                $NomMatr_Usuario="";
                $Rol_Usuario="";
                $Genero_Usuario="";
                $Nacimiento_Usuario="";
                $Correo_Usuario="";
                $Nombre_usuario_Usuario="";
                $_POST["Contrasena_Usuario"]="";
                $_POST["cContrasena_Usuario"]="";
                session_destroy();
                header("Location: login.php");
             
            }else{
                echo "<script>alert('Hubo un error')
                </script>";
            }
        }else{
            echo "<script>alert('El correo o el usuario ya existe')
            </script>";
        }
    }else{
        echo "<script>alert('Las contraseñas no se coinciden')
        </script>";
    }
}






?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/estilo-registrer-login.css" />
    

    <style>



    </style>
</head>
<body style="background-image: url('img/PLanetsBackground.webp'); background-repeat: no-repeat; background-size: cover;">
    <form class="formulario" action="" method="POST" id="form" enctype="multipart/form-data">




        <h1>Editar</h1>
       
        <div class="contenedor">
            <div class="input-contenedor">
                <input type="file" name="Foto_Usuario" id="Foto_Usuario" class="foto" required  accept="image/png, image/jpeg" required value="<?php echo $_SESSION['Foto_Usuario']; ?>">
                
                
                <div id="preview" class="styleImage">
                
                </div>


            </div>

       
       
       
       
       
        <div class="contenedor">
            <div class="input-contenedor">
                <input type="text" name="Nombre_Usuario" id="Nombre_Usuario" placeholder="Nombre de usuario"value="<?php echo $_SESSION['Nombre_Usuario']; ?>">
                <input type="text" name="NomPatr_Usuario" id="NomPatr_Usuario" placeholder="Nombre de usuario Paterno"value="<?php echo $_SESSION['NomPatr_Usuario']; ?>">
                <input type="text" name="NomMatr_Usuario" id="NomMatr_Usuario" placeholder="Nombre de usuario Materno"value="<?php echo $_SESSION['NomMatr_Usuario']; ?>">
            </div>


            
            
            
            
            
            
            <div class="contenedor">
                <div class="input-contenedor">
                    
                    <select name="Genero_Usuario" id="Genero_Usuario" required value="<?php echo $_SESSION['Genero_Usuario']; ?>">
                        <option value="0">Selecciona su genero..</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>

                    </select>

                </div>


            




    
               
           
           
           
           
            <div class="contenedor">
                <div class="input-contenedor">
                    <input type="date" id="Nacimiento_Usuario" name="Nacimiento_Usuario" required value="<?php echo $_SESSION['Nacimiento_Usuario']; ?>">
    
                </div>

            

            <div class="contenedor">
                <div class="input-contenedor">
                    <input type="text" name="Correo_Usuario" id="Correo_Usuario" placeholder="Correo Electronico"   pattern="(\W|^)[\w.\-]{0,25}@(yahoo|hotmail|gmail)\.com(\W|$)"  required value="<?php echo $_SESSION['Correo_Usuario']; ?>">
    
                </div>



                <div class="contenedor">
            <div class="input-contenedor">
                <input type="text" name="Nombre_usuario_Usuario" id="Nombre_usuario_Usuario" placeholder="Nickname"  required value="<?php echo $_SESSION['Nombre_usuario_Usuario']; ?>">
      
            </div>


                <div class="contenedor">
                    <div class="input-contenedor">
                        <input type="text" name="Contrasena_Usuario" id="Contrasena_Usuario" placeholder="Contraseña" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8}[^'\s]" required value="<?php echo $_SESSION['Contrasena_Usuario']; ?>">
        
                    </div>



                    <div class="contenedor">
                    <div class="input-contenedor">
                        <input type="text" name="cContrasena_Usuario" id="cContrasena_Usuario" placeholder="Contraseña" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8}[^'\s]" required value="<?php echo $_SESSION['Contrasena_Usuario']; ?>">
        
                    </div>


                    
          

              <input type="submit" value="Editar"  name="Editar"  class="button">
              <p class="warnings" id="warnings"></p>
              <p>Al registrarse aceptas nuestras condiciones de uso y politica de privacidad.</p>
              <p>¿Ya tienes cuenta?<a class="link" href="login.php">Iniciar Sesion</a></p>

        </div>
    </form>
   
</body>

</html>