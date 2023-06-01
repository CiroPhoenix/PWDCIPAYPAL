
<?php 
include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}


$id = $_SESSION['ID_Usuario'];

$sql ="SELECT Foto_Usuario from usuario where ID_Usuario=$id";
$mostrarfoto=mysqli_query($conn,$sql);


$sql ="SELECT * from categoria" ;
$result=mysqli_query($conn,$sql);


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Saturno - Inicio</title>
    <link rel="stylesheet" href="css/estilos.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>
   <link rel="stylesheet" 
   href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
   <script src="jquery.js"></script>

<style>

.cards:hover{
  box-shadow: 20px 20px 100px -50px #000;
  transition: 0.3s;

  background: #2079b0;
  background-image: -webkit-linear-gradient(top, #2079b0, #eb94d0);
  background-image: -moz-linear-gradient(top, #2079b0, #eb94d0);
  background-image: -ms-linear-gradient(top, #2079b0, #eb94d0);
  background-image: -o-linear-gradient(top, #2079b0, #eb94d0);
  background-image: linear-gradient(to bottom, #2079b0, #eb94d0);
  text-decoration: none;
       
       
       
       
       
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);

}



.cards{
  background-color: whitesmoke;
  cursor: pointer;

}

</style>

        
</head>

<body style="background-image: url('img/SaturnoBackground.jpg');">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="sub-menu-wrap" id="subMenu">

<div class="sub-menu">
  <div class="user-info">
  



  <?php 
while($foto=mysqli_fetch_assoc($mostrarfoto)){
?>



<img  src= "data:image/jpeg;base64, <?php echo base64_encode($foto['Foto_Usuario']); ?> "/>


   
<?php
}
?>

    
    <p><?php echo $_SESSION['Rol_Usuario']; ?></p>
</br>
    <h3><?php echo $_SESSION['Nombre_Usuario']; ?></h3>
    <h3><?php echo $_SESSION['NomPatr_Usuario']; ?></h3>
    <h3><?php echo $_SESSION['NomMatr_Usuario']; ?></h3>
  
    
  </div>
  <hr>

<a href="editar.php" class="sub-menu-link">

<img src="img/Profile.png">
<p>Editar Perfil</p>
<span>></span>

</a>


<a href="#" class="sub-menu-link">

  <img src="img/Cursos.png">
  <p>Mis cursos</p>
<span>></span>

  </a>


    <a href="logout.php" class="sub-menu-link">

      <img src="img/Logout.png">
      <p>Cerrar Sesion</p>
    <span>></span>
    
      </a>


</div>
</div>
        <div class="container-fluid">
   
        <a class="navbar-brand" href="indexMaestro.php">
            <img src="img/SaturnoLogo.png" alt="logo" width="150px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
           <li class="navbar-nav">
           <a class="navbar-brand" href="indexMaestro.php">
            <img src="img/SaturnoLogo.png" alt="logo" width="150px">
          </a>

           </li>
              <li  class="nav-item" >
                <a class="nav-link active" aria-current="page" href="indexMaestro.php">Home</a>
              </li class="nav-item">
              <li>
                <a class="nav-link" href="#">Link</a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Agregar Curso
                </a>
               
              </li>
              <div class="col-md-6">


<div class="input-group">
<input type="text"  placeholder="¿Que te gustaria aprender?" class="form-control" id="inp">
<div class="input-group-append">
<button type="button" class="btn btn-dark" id="search" >Buscar</button>
</div>
</div>
</div>

<div class="user-pic">
           


             <img src="img/ProfilePicture.png" class="user-pic" onclick="toggleMenu()" >
           
           
           
            </div>
          
            </ul>
            <form class="d-flex">
             


           

            </form>

         
          </div>
        </div>





      </nav>





     



    
    
      </div>









</div>





<div class="container p-5 mt-2" style="background-image: url('img/Galaxia.jpg'); background-repeat: no-repeat; background-size: cover;   border-color: rgb(255, 102, 151) rgb(120, 0, 74) rgb(255, 102, 151) rgb(120, 0, 74); border-width: 35px;
border-style: solid;color: white;" >
  <div class="row d-flex justify-content-center">



<h5>Agregar Curso</h5>

<div class="contenedor">

<form class="formulario" action="guardar_curso-video.php"  method="POST" id="form" enctype="multipart/form-data">
<div class="input-contenedor">
<label for="">Titulo del Curso</label>
<input type="text" name="Titulo_Curso" id="Titulo_Curso" placeholder="Titulo del curso">
</div>



<div class="input-contenedor">
<label for="">Categoria</label>
<select name="Categoria_Curso" id="Categoria_Curso" required>
                    <option value="0">Lista De Categoria</option>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <option value="<?php echo $row['ID_Categoria'];?>"><?php echo $row['Titulo_Categoria']; ?></option>
                    <?php } ?>
                   

                    </select>
</div>









<div class="contenedor">
            <div class="input-contenedor">
            <label for="">Foto del Curso</label>
                <input type="file" name="Foto_Curso" id="Foto_Usuario" class="foto" required  accept="image/png, image/jpeg" required>
                
                
                <div id="preview" class="styleImage">
                
                </div>


            </div>

            <div class="contenedor">
            <div class="input-contenedor">
            <label for="">Foto del Curso2</label>
                <input type="file" name="Foto_Curso2" id="Foto_Usuario2" class="foto" required  accept="image/png, image/jpeg" required>
                
                
                <div id="preview2" class="styleImage">
                
                </div>


            </div>

            <div class="contenedor">
            <div class="input-contenedor">
            <label for="">Foto del Curso3</label>
                <input type="file" name="Foto_Curso3" id="Foto_Usuario3" class="foto" required  accept="image/png, image/jpeg" required>
                
                
                <div id="preview3" class="styleImage">
                
                </div>


            </div>


 <div class="input-contenedor">
 <label for="">Descripcion del Curso</label>
 <textarea id="w3review" name="Descripcion_Curso" rows="4" cols="50"></textarea>
</div>


<div class="input-contenedor">
<label for="">Precio del Curso</label>
<input type="number" name="Costo_Curso" id="Costo_Curso" placeholder="Precio del curso">
</div>


<h1>video</h1></label> <input type="file" name="video" id="video"><br><br>

<input type="submit" value="AgregarCurso"  name="AgregarCurso"  class="button">

</form>




</div>
  


</div>


</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<script src="Foto.js"></script>
<script src="Foto2.js"></script>
<script src="Foto3.js"></script>
</html>


