<?php 
include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}


$id = $_SESSION['ID_Usuario'];



$query ="SELECT * from usuario";
    $resultado=$conn->query($query);



    if(isset($_POST['filtro'])){
      switch($_POST['filtro']){
          case "todos":
              $sql ="SELECT * from usuario";
              $resultado=mysqli_query($conn,$sql);
              break;
          case "recientes":
              $sql ="SELECT * from usuario ORDER BY Nombre_usuario_Usuario asc";
              $resultado=mysqli_query($conn,$sql);
              break;
          case "antiguos":
              $sql ="SELECT * from usuario ORDER BY Nombre_usuario_Usuario desc";
              $resultado=mysqli_query($conn,$sql);
              break;
              case "estudiantes":
                $sql ="SELECT * from usuario where `Rol_Usuario` = 'Estudiante'";
                $resultado=mysqli_query($conn,$sql);
                break;
                case "maestros":
                  $sql ="SELECT * from usuario where `Rol_Usuario` = 'Maestro'";
                  $resultado=mysqli_query($conn,$sql);
                  break;
                  case "administradores":
                    $sql ="SELECT * from usuario where `Rol_Usuario` = 'Administrador'";
                    $resultado=mysqli_query($conn,$sql);
                    break;
  

             
        
      }
  }else{
      $sql ='SELECT * from usuario';
      $resultado=mysqli_query($conn,$sql);
  }




$sql ="SELECT Foto_Usuario from usuario where ID_Usuario=$id";
$mostrarfoto=mysqli_query($conn,$sql);

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Saturno - Inicio-Administrador</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/tabla.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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




    <a href="logout.php" class="sub-menu-link">

      <img src="img/Logout.png">
      <p>Cerrar Sesion</p>
    <span>></span>
    
      </a>


</div>
</div>
        <div class="container-fluid">
   
        <a class="navbar-brand" href="index.php">
            <img src="img/SaturnoLogo.png" alt="logo" width="150px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
           <li class="navbar-nav">
           <a class="navbar-brand" href="index.php">
            <img src="img/SaturnoLogo.png" alt="logo" width="150px">
          </a>

           </li>
              <li  class="nav-item" >
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li class="nav-item">
              <li>
                <a class="nav-link" href="#">Link</a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cursos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Ptyhon</a></li>
                  <li><a class="dropdown-item" href="#">Desarrollo De Videojuegos</a></li>
                  <li><a class="dropdown-item" href="#">Dibujo</a></li>
                  <li><a class="dropdown-item" href="#">Graficas 3D</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Otros</a></li>
                </ul>
              </li>
              <div class="col-md-6">


<div class="input-group">
  
<form action="" method="get">
<input type="text"  placeholder="Buscar Usuario" class="form-control" name="busqueda" id="inp">
<div class="input-group-append">
<button type="submit" class="btn btn-dark" name="search" id="search" >Buscar</button>
</form>


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
border-style: solid; color:white;" >
 

















 <h1>Mis Cursos</h1>
    
    


<table summary="Los grupos de música punk más famosos del Reino Unido">
 
  <thead>
    <tr>
      <th scope="col">Nombre Del Curso</th>
     
    </tr>
  </thead>
  <tbody>
  <?php 



$query ="SELECT * FROM curso_comprados where Usuario =$id";
$resultado=$conn->query($query);

while($filas = $resultado->fetch_assoc()){

?>
    <tr>
   
      <td><?php echo $filas['Titulo']?></td>
      <td><a href="Micurso.php?Curso=<?php echo $filas['Curso']?>">Ver Curso</a></td>

    </tr>
   
    <?php

}


?>

  </tbody>
 
</table>    
    

    
    
  
	</div>

	<script>
		$(document).ready(function(){
			$("#txtbusca").keyup(function(){
				var parametros="txtbusca="+$(this).val()
				$.ajax({
	                data:  parametros,
	                url:   'buscador.php',
	                type:  'post',
	                beforeSend: function () { },
	                success:  function (response) {                	
	                    $(".salida").html(response);
	                },
	                error:function(){
	                	alert("error")
	                }
            	});
			})
		})
	</script>





 
  
  

  
 
  </div>



  




</div>

</div>







 </div>

</div>



<div class="row pr-md-5 d-flex justify-content-center justify-content-md-end bg-info">
<div class="col-md-6 col-lg-4 mr-lg-5 border p-3 pb-4 rounded-lg bg-white ml-md-0" id="cart" style="position:
absolute;z-index: 1;top: 80px;overflow: auto;">


<div class="d-flex">
<div class="col-md-3">
<h5>Productos</h5>
</div>
<div class="col-md-3 d-flex flex-wrap align-content-center">
<h5>Title</h5>
</div>
<div class="col-md-3 d-flex flex-wrap align-content-center">
<h5>Qty</h5>
</div>
<div class="col-md-2 d-flex flex-wrap align-content-center">
<h5>Price</h5>
</div>
<div class="col-md-1"></div>


</div>

<div id="order" style="overflow: auto;height: 250px;">


</div>
<div id="cart_footer" >
<div id="order_btn" class="text-center text-white w-100 bg-dark p-2 font-weight-bold" style="letter-spacing: 
1.2px; font-size: 20px;">
  Order
</div>

</div>


</div>

</div>

<script>

  let subMenu = document.getElementById("subMenu");

  function toggleMenu(){

subMenu.classList.toggle("open-menu");

  }


</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


