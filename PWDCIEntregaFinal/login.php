<?php  
include "conexion.php";
session_start();
error_reporting(0);

if(isset($_SESSION["Nombre_Usuario"]))
{
    header("Location: index.php");
}


if(isset($_POST["submit"])){
    $Correo_Usuario=$_POST["Correo_Usuario"];
    $Contrasena_Usuario=($_POST["Contrasena_Usuario"]);

    $sql="SELECT * FROM usuario WHERE 
    Correo_Usuario='$Correo_Usuario' AND Contrasena_Usuario='$Contrasena_Usuario'";
    $result= mysqli_query($conn,$sql);
     

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['ID_Usuario'] = $row['ID_Usuario'];
        $_SESSION['Foto_Usuario'] =base64_encode($row[3]);
        $_SESSION['Nombre_Usuario'] = $row['Nombre_Usuario'];
        $_SESSION['NomPatr_Usuario'] = $row['NomPatr_Usuario'];
        $_SESSION['NomMatr_Usuario'] = $row['NomMatr_Usuario'];
        $_SESSION['Rol_Usuario'] = $row['Rol_Usuario'];
        $_SESSION['Genero_Usuario'] = $row['Genero_Usuario'];
        $_SESSION['Nacimiento_Usuario'] = $row['Nacimiento_Usuario'];
        $_SESSION['Nombre_usuario_Usuario'] = $row['Nombre_usuario_Usuario'];
        $_SESSION['Correo_Usuario'] = $row['Correo_Usuario'];
        $_SESSION['Contrasena_Usuario'] = $row['Contrasena_Usuario'];
    
        switch($_SESSION['Rol_Usuario']){
            case 'Estudiante':
                header('location: index.php');
            break;

            case 'Maestro':
                header('location: indexMaestro.php');
            break;
            
            case 'Administrador':
                header('location: indexAdministrador.php');
            break;
            default:
            break;
        }
    }else{
        echo "<script>alert('La contraseña o el email son incorrectos')</script>";
       
    }



}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/estilo-registrer-login.css" />
</head>
<body style="background-image: url('img/PLanetsBackground.webp'); background-repeat: no-repeat; background-size: cover;">
    <form class="formulario"  action="" method="POST">

        <h1>Login</h1>
      

            <div class="contenedor">
                <div class="input-contenedor">
                    <input type="text" placeholder="Correo Electronico" name="Correo_Usuario" value="<?php echo $Correo_Usuario; ?>">
    
                </div>


                <div class="contenedor">
                    <div class="input-contenedor">
                        <input type="text" placeholder="Contraseña" name="Contrasena_Usuario" value="<?php echo $Contrasena_Usuario; ?>">
        
                    </div>

              <input type="submit" value="Iniciar Sesion" class="button" name="submit">
              <p>Al registrarse aceptas nuestras condiciones de uso y politica de privacidad.</p>
              <p>¿No tienes cuenta?<a class="link" href="register.php">Registrarse</a></p>

        </div>
    </form>
</body>
</html>